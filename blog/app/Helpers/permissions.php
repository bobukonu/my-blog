<?php

 function check_user_permissions($request, $actionName = NULL, $id = NULL)
{
  //get current user
  $currentUser = $request->user();

  //get action name
  if ($actionName) {
    $currentActionName = $actionName;
  }
  else {
    $currentActionName = $request->route()->getActionName();

  }
    list($controller, $method) = explode('@', $currentActionName);
    $controller = str_replace(["App\\Http\\Controllers\\Admin\\", "Controller"], "", $controller);

    $crudPermissionMap = [
      // 'create' => ['create', 'store'],
      // 'update' => ['edit', 'update'],
      // 'delete' => ['destroy', 'restore', 'forceDestroy'],
      // 'read' => ['index', 'view']

      'crud' => ['create', 'store', 'edit', 'update', 'destroy', 'restore', 'forceDestroy', 'index', 'view']
    ];

    $classesMap = [
      'Blog' => 'post',
      'Categories' => 'category',
      'Users' => 'user'
    ];

    foreach ($crudPermissionMap as $permisssion => $methods) {
      // if current method exist in the method list
      //we"ll check the permissions
      if (in_array($method, $methods) && isset($classesMap[$controller])) {

        $classesName = $classesMap[$controller];

        if ($classesName == 'post' && in_array($method, ['edit', 'update', 'destroy', 'restore', 'forceDestroy'])){

          $id = !is_null($id) ? $id : $request->route("blog");

          //if the current user has not update-other-post/delete-other-post permissions
          //make sure he/she only modify his/her own post
          if ($id &&
              (!$currentUser->can('update-others-post') || !$currentUser->can('delete-others-post'))) {

            $post = \App\Post::withTrashed()->find($id);

            if($post->author_id != $currentUser->id){

              return false;

            }
          }

        }

        //if the user has no permission don't allow next request
        elseif ( ! $currentUser->can("{$permisssion}-{$classesName}")) {
          return false;
        }
        break;

      }
    }

    return true;
}
