<div class="col-md-4">
  <form action="{{ route('blog')}}">
    <div class="input-group mb-3">
      <input class="form-control input-lg" name="term" value="{{request('term')}}" type="text" placeholder="Search....">
      <div class="input-group-append">
        <button type="submit" name="button" class="input-group-text"><i class="fa fa-search"></i></button>
      </div>
  </form>
  </div>

<div class="card">
  <div class="card-header">
    <h4>Categories</h4>
  </div>
  <div class="widget-body">
    <ul class="list-group">
      @foreach ($categories as $category)
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="{{ route('category', $category->slug)}}" class="widget-body"><i class="fa fa-angle-right"></i>{{ $category->title}}</a>
           <span class="badge badge-dark badge-pill"> {{ $category->posts->count()}}</span>
         </li>
      @endforeach
    </ul>
  </div>
</div><br><br>


    <div class="card">
      <div class="card-header">
        <h4>Popular Post</h4>
      </div>
      <div class="widget-body">
        <ul class="list-group">
          @foreach ($popularPost as $post)

          <li class="list-group-item d-flex justify-content-between ">
              @if ($post->image_url)
                <div class="post_images">
                  <a href="{{ route('blog.shows', $post->slug)}}">
                    <img src="{{$post->image_url}}" alt="" width="50" height="50">
                  </a>
                </div>
                @endif
            <div class="post-body">
                <h6><a href="{{ route('blog.shows', $post->slug)}}" class="widget-body"> {{ $post->title}}</a></h6>
              <div class="post-meta">
                <span class="badge badge-dark badge-pill">{{ $post->date}}</span>
              </div>
            </div>
             </li>

          @endforeach
        </ul>
      </div>
</div>
<div class="card">
  <div class="card-header">
    <h4>Tags</h4>
  </div>
  <div class="widget-body">
    <ul>


        @foreach ($tags as $tag)
        <a href="{{ route('tag', $tag->slug)}}" class="badge badge-dark badge-pill"> {{ $tag->name}} </a>
        @endforeach
      <!-- @foreach ($categories as $category) -->
      <!-- <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="{{ route('category', $category->slug)}}" class="widget-body"><i class="fa fa-angle-right"></i></a>
           <span class="badge badge-dark badge-pill"> </span>
         </li> -->
      <!-- @endforeach -->
      </ul>
  </div>
</div><br><br>

<div class="card">
  <div class="card-header">
    <h4>Archives</h4>
  </div>
  <div class="widget-body">
    <ul class="list-group">
      @foreach ($archives as $archive)
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="{{route('blog', ['month' => $archive->month, 'year' => $archive->year])}}">{{$archive->month  . " " . $archive->year}} </a>
        <span class="badge badge-dark badge-pill"> {{ $archive->post_count}}</span>
      </li>
      @endforeach
    </ul>
  </div>
</div><br><br>

</div>
