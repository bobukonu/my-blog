<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Category;
use Intervention\Image\Facades\Image;

class BlogController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     protected $uploadPath;


     public function __construct()
     {
       parent::__construct();
       $this->uploadPath = public_path('blog/imgs');
     }

    public function index(Request $request)
    {
        $onlyTrashed = FALSE;

      if (($status = $request->get('status')) && $status == 'trash'){
        $posts        = Post::onlyTrashed()->with('category', 'author')->latest()->paginate($this->limit);
        $postCount    = Post::onlyTrashed()->count();
        $onlyTrashed  = TRUE;
      }
      elseif($status == 'published'){

      $posts = Post::published()->with('category', 'author')->latest()->paginate($this->limit);
      $postCount = Post::published()->count();

    }
    elseif($status == 'scheduled'){

    $posts = Post::scheduled()->with('category', 'author')->latest()->paginate($this->limit);
    $postCount = Post::scheduled()->count();

    }
    elseif($status == 'draft'){

    $posts = Post::draft()->with('category', 'author')->latest()->paginate($this->limit);
    $postCount = Post::draft()->count();

  }
  elseif($status == 'own'){

  $posts = $request->user()->posts()->with('category', 'author')->latest()->paginate($this->limit);
  $postCount = $request->user()->posts()->count();

}
    else{

    $posts = Post::with('category', 'author')->latest()->paginate($this->limit);
    $postCount = Post::count();


  }
    $statusList = $this->statusList($request);
      return view('backend.blog.index', compact('statusList'))->with('posts', $posts)->with('postCount', $postCount)->with('onlyTrashed', $onlyTrashed);

    }

    private function statusList($request)
    {
      return[
        'own' => $request->user()->posts()->count(),
        'all' => Post::count(),
        'published' => Post::published()->count(),
        'scheduled' => Post::scheduled()->count(),
        'draft' => Post::draft()->count(),
        'trash' => Post::onlyTrashed()->count(),
      ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $post = new Post();
        return view('backend.blog.create')->with('post', $post);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     private function handleRequest($request)
     {
       $data = $request->all();

       if ($request->hasFile('image')) {
         $image =$request->file('image');
         $fileName = $image->getClientOriginalName();

         $destination = $this->uploadPath;

        $successUploaded =  $image->move($destination, $fileName);

        if ($successUploaded) {

          $extension = $image->getClientOriginalExtension();
          $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);
          Image::make($destination . '/' . $fileName)
                 ->resize(250, 170)
                 ->save($destination . '/' . $thumbnail);
        }
          $data['image'] = $fileName;
       }
       return $data;
     }

    public function store(Requests\PostRequest $request)
    {
        $data = $this->handleRequest($request);

        $request->user()->posts()->create($data);

        return redirect('/admin/blog')->with('message', 'Your Post was created successfully');

    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post = Post::find($id);
        return view('backend.blog.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PostRequest $request, $id)
    {
        $post = Post::find($id);
        $oldImage = $post->image;
        $data = $this->handleRequest($request);
        $post->update($data);
        if ($oldImage !== $post->image) {
          $this->removeImage($oldImage);
        }

        return redirect('/admin/blog')->with('message', 'Your Post was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Post::find($id)->delete();
      return redirect('/admin/blog')->with('trash-message', ['Your post was moved to trash', $id]);
    }

    public function restore($id)
    {
      $post = Post::onlyTrashed()->find($id);
      $post->restore();

      return redirect()->back()->with('message', 'Your Post has been restored from the trash');
    }

    public function forceDestroy($id)
    {
    $post = Post::withTrashed()->find($id);
    $post->forceDelete();

    $this->removeImage($post->image);

      return redirect('/admin/blog?status=trash')->with('message', 'Your post has been permanently deleted');
    }

    private function removeImage($image)
    {
      if ( ! empty($image)) {
        $imagePath = $this->uploadPath . '/' . $image;
        $ext = substr(strrchr($image, '.'), 1);
        $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $image);
        $thumbnailPath = $this->uploadPath . '/' . $thumbnail;

        if ( file_exists($imagePath) ) unlink($imagePath);
        if ( file_exists($thumbnailPath) ) unlink($thumbnailPath);
      }
    }
}
