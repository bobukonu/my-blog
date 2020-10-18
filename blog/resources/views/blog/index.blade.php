@extends('layout.app')

@section('content')

    <div class="col-md-8">
      @if (! $posts->count())
      <div class="alert alert-warning">
        No Post Found
      </div>
      @else

        @include('blog.alert')

        @foreach ($posts as $post)

        <article class="card">
          @if ($post->image_url)
          <div class="card-image">
            <a href="{{ route('blog.shows', $post->slug) }}">
              <img src="{{ $post->image_url}}" alt="" class="card-img-top post-image" >
            </a>
          </div>
          @endif
          <div class="card-body">
            <div class="padding-10">
              <h2><a href="{{ route('blog.shows', $post->slug)}}" class="post-title">{{ $post->title}}</a></h2>
              {!! $post->excerpt_html !!}
            </div>
          </div>

          <div class="post-meta padding-10 card-footer">
            <div class="float-left">
              <div class="post-meta-group">
              <a href="{{ route('author', $post->author->slug)}}"><i class="fa fa-user"></i> {{ $post->author->name}}</a>
              <a href="#"><i class="fa fa-clock"></i> {{ $post->date }}</a>
              <a href="{{route('category', $post->category->slug)}}"><i class="fa fa-folder"></i> {{ $post->category->title}}</a>

              
                <i class="fa fa-tag"></i> {!! $post->tags_html !!}

              <!-- <i class="fa fa-tag"></i>
              @foreach ($post->tags as $tag)
              <a href="{{route('tag', $tag->slug)}}">{{$tag->name}}</a>
              @endforeach -->

              <a href="{{ route('blog.shows', $post->slug)}}#post-comments"><i class="fa fa-comments"></i> {{$post->commentNumber()}}</a>
              </div>
            </div>
            <div class="float-right">
              <a href="{{ route('blog.shows', $post->slug)}}" class="">Continue Reading &raquo;</a>
            </div>
          </div>


        </article>

        <br>

        @endforeach

      @endif


  <nav>
    {{ $posts->appends(request()->only(['term', 'month', 'year']))->links()}}
  </nav>


  </div>
  @include('inc.sidebar')
@endsection
