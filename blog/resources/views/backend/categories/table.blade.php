<table id="example2" class="table table-bordered table-hover">
  <thead>
  <tr>
    <td>Category Name</td>
    <td width="120">Post Count</td>
    <td>Action</td>
  </tr>
</thead>
<tbody>
    @foreach ($categories as $category)
  <tr>
    <td>{{ $category->title}}</td>
    <td>{{ $category->posts->count()}}</td>
    <td>
      {{Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $category->id]])}}
      <a href="{{ route('categories.edit', $category->id)}}" class="btn btn-xs btn-default">
        <i class="fa fa-edit"></i>
      </a>
      @if($category->id == config('cms.default_category_id'))
        <button type="submit" onclick="return false" class="btn btn-xs btn-danger disabled">
          <i class="fa fa-trash"></i>
        </button>
      @else
        <button type="submit" onclick="return confirm('You are about to delete a category. Are you sure?')" class="btn btn-xs btn-danger">
          <i class="fa fa-trash"></i>
        </button>
      @endif

      {{Form::close()}}
    </td>
  </tr>
@endforeach
</tbody>
</table>
