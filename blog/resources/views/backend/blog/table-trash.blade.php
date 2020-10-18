<table id="example2" class="table table-bordered table-hover">
  <thead>
  <tr>
    <td>Title</td>
    <td>Author</td>
    <td width="150">Category</td>
    <td>Action</td>
  </tr>
</thead>
<tbody>
  <?php $request = request(); ?>
    @foreach ($posts as $post)
  <tr>
    <td>{{ $post->title}}</td>
    <td>{{ $post->author->name}}</td>
    <td>{{ $post->category->title}}</td>

    <td>
      {{Form::open(['style' => 'display:inline-block', 'method' => 'PUT', 'route' => ['blog.restore', $post->id]])}}

      @if (check_user_permissions($request, "Blog@restore", $post->id))
          <button title="Restore" class="btn btn-xs btn-default">
            <i class="fas fa-redo fa-rotate-180"></i>
          </button>
      @else
          <button title="Restore" onclick="return false" class="btn btn-xs btn-default" disabled>
            <i class="fas fa-redo fa-rotate-180"></i>
          </button>
        @endif
      {{Form::close()}}
      {{Form::open(['style' => 'display:inline-block', 'method' => 'DELETE', 'route' => ['blog.force-destroy', $post->id]])}}

    @if (check_user_permissions($request, "Blog@forceDestroy", $post->id))
          <button title="Delete Permanent" onclick="return confirm('You are about to delete a post permanently. Are you sure?')" type="submit" class="btn btn-xs btn-danger">
            <i class="fa fa-times"></i>
          </button>
        @else
          <button title="Delete Permanent" onclick="return false" type="button" disabled class="btn btn-xs btn-danger">
            <i class="fa fa-times"></i>
          </button>
      @endif
      {{Form::close()}}
    </td>
  </tr>
@endforeach
</tbody>
</table>
