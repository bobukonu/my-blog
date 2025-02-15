<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('permissions')->delete();

        //crud post
        $crudPost = new Permission();
        $crudPost->name = 'crud-post';
        $crudPost->save();

        //update other post
        $updateOthersPost = new Permission();
        $updateOthersPost->name = 'update-others-post';
        $updateOthersPost->save();

        //delete other post
        $deleteOthersPost = new Permission();
        $deleteOthersPost->name = 'delete-others-post';
        $deleteOthersPost->save();

        //crud category
        $crudCategory = new Permission();
        $crudCategory->name = 'crud-category';
        $crudCategory->save();

        //crud users
        $crudUser = new Permission();
        $crudUser->name = 'crud-user';
        $crudUser->save();

        //attach Role Permission
        $admin =  Role::whereName('admin')->first();
        $editor = Role::whereName('editor')->first();
        $author = Role::whereName('author')->first();

        $admin->detachPermissions([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory, $crudUser]);
        $admin->attachPermissions([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory, $crudUser]);

        $editor->detachPermissions([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory]);
        $editor->attachPermissions([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory]);

        $author->detachPermission($crudPost);
        $author->attachPermission($crudPost);
    }
}
