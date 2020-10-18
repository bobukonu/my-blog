@extends('layout.app')

@section('content')
<div class="col-md-8">


      <article class="card">
        @if ($post->image_url)

        <div class="card-img-top">
            <img src="{{ $post->image_url}}" alt="{{ $post->title}}" class="card-img post-image" >
        </div>
        @endif


        <div class="card-body">
          <div class="padding-10">
            <h1 class="post-titles">{{ $post->title}}</h1>
          </div>

<br>
        <div class="post-meta">
            <div class="post-meta-group">
            <a href="{{ route('author', $post->author->slug)}}"><i class="fa fa-user"></i> {{ $post->author->name}}</a>
            <a href="#"><i class="fa fa-clock"></i> {{ $post->date }}</a>
            <a href="{{route('category', $post->category->slug)}}"><i class="fa fa-folder"></i> {{ $post->category->title}}</a>
              <i class="fa fa-tag"></i> {!! $post->tags_html !!}
            <a href="#post-comments"><i class="fa fa-comments"></i> {{$post->commentNumber()}}</a>
          </div>
        </div>
        <br>

        <p>{!! $post->body_html !!}</p>
      </div>

      </article>

      <br>

      <article class="card">
        <div class="card-body">
        <div class="media">
          <?php $author = $post->author; ?>
      <img src="/blog/imgs/author.jpg" class="mr-3 rounded-circle image" alt="...">
      <div class="media-body">
        <div class="post-meta">
        <h5 class="mt-0 "><a href="{{ route('author', $author->slug)}}">{{ $author->name}}</a></h5>
        <div class="post-author-count">
          <a href="{{ route('author', $author->slug)}}">
          <i class="fa fa-clone"></i>
          <?php $postCount = $author->posts()->published()->count() ?>
          {{ $postCount}} {{ str_plural('post', $postCount)}}
          </a>
        </div>

      </div><br>
      <p>{!! $author->bio_html !!}</p>
      </div>
    </div>
      </div>
  </article>
  <br><br>
  @include('blog.comments')

</div>


@include('inc.sidebar')

@endsection
