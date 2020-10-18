<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use App\Http\Requests\CommentsStoreRequest;

class CommentsController extends Controller
{
    public function store(Post $post, CommentsStoreRequest $request)
    {
      // $data = $request->all();
      // $data['post_id'] = $post->id;
      //
      // Comment::create($data);

      $post->createComments($request->all());

      return redirect()->back()->with('message', "Your comments has been sent successfully");
    }
}
