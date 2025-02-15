<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\User;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


       protected $limit = 2;

    public function index()
    {

      $posts = Post::with('author', 'tags', 'category', 'comments')
                ->latestFirst()
                ->published()
                ->filter(request()->only(['term', 'year', 'month']))
                ->simplePaginate($this->limit);
       return view('blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category(Category $category)
    {
      $categoryName = $category->title;

      $posts = $category->posts()
                        ->with('author', 'tags', 'comments')
                        ->latestFirst()
                        ->published()
                        ->simplePaginate($this->limit);

       return view('blog.index', compact('posts', 'categoryName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function author(User $author)
    {
      $authorName = $author->name;

      $posts = $author->posts()
                        ->with('category', 'tags', 'comments')
                        ->latestFirst()
                        ->published()
                        ->simplePaginate($this->limit);

       return view('blog.index', compact('posts', 'authorName'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function tag(Tag $tag)
     {
       $tagName = $tag->title;

       $posts = $tag->posts()
                         ->with('author', 'tags', 'comments')
                         ->latestFirst()
                         ->published()
                         ->simplePaginate($this->limit);

        return view('blog.index', compact('posts', 'tagName'));
     }

    public function show(Post $post)
    {
      //update post set view_count = view_count + 1 where id = ?
      // #1
      //   $viewCount = $post->view_count + 1;
      //   $post->update(['view_count' => $viewCount]);
      //

      #2
      $post->increment('view_count');

      $postComments = $post->comments()->latest()->simplePaginate(3);

        return view('blog.show', compact('post', 'postComments'));
    }


}
      
