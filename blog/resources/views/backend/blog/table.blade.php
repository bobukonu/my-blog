<table id="example2" class="table table-bordered table-hover">
  <thead>
  <tr>
    <td>Title</td>
    <td width="120">Author</td>
    <td width="150">Category</td>
    <td width="180">Date</td>
    <td width="120">Action</td>
  </tr>
</thead>
<tbody>
  <?php $request = request();  ?>
    @foreach ($posts as $post)
  <tr>
    <td>{{ $post->title}}</td>
    <td>{{ $post->author->name}}</td>
    <td>{{ $post->category->title}}</td>
    <td>
      <abbr title="{{$post->dateFormatted(true)}}">{{$post->dateFormatted()}}</abbr> |
      {!! $post->publicationLabel()!!}
    </td>
    <td>
      {{Form::open(['method' => 'DELETE', 'route' => ['blog.destroy', $post->id]])}}
      @if (check_user_permissions($request, "Blog@edit", $post->id))
      <a href="{{ route('blog.edit', $post->id)}}" class="btn btn-xs btn-default">
        <i class="fa fa-edit"></i>
      </a>
      @else
      <a href="#" class="btn btn-xs btn-default disabled ">
        <i class="fa fa-edit"></i>
      </a>
      @endif

      @if (check_user_permissions($request, "Blog@destroy", $post->id))
      <button type="submit" class="btn btn-xs btn-danger">
        <i class="fa fa-trash"></i>
      </button>
      @else
      <button type="button" onclick="return false" disabled class="btn btn-xs btn-danger">
        <i class="fa fa-trash"></i>
      </button>
      @endif
      {{Form::close()}}
    </td>
  </tr>
@endforeach
</tbody>
</table>
