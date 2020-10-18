<?php

namespace App\Views\Composer;

use Illuminate\View\View;
use App\Category;
use App\Post;
use App\Tag;

class NavigationComposer
{
  public function compose(View $view)
  {
    $this->composeCategories($view);

    $this->composeTags($view);

    $this->composeArchives($view);

    $this->composerPopularPost($view);
  }

  private function composeCategories(View $view)
  {
    $categories = Category::with(['posts' => function($query){
        $query->published();
        }])->orderBy('title', 'asc')->get();

       $view->with('categories', $categories);
  }

    private function composerPopularPost(View $view)
    {
      $popularPost = Post::published()->popular()->take(3)->get();
      $view->with('popularPost', $popularPost);
    }

    private function composeTags(View $view)
    {
      $tags = Tag::has("posts")->get();

      $view->with('tags', $tags);
    }

    private function composeArchives(View $view)
    {
      $archives = Post::archives();

      $view->with('archives', $archives);
    }
}
