<table id="example2" class="table table-bordered table-hover">
  <thead>
  <tr>
    <td>Name</td>
    <td>Email</td>
    <td>Role</td>
    <td>Action</td>
  </tr>
</thead>
<tbody>
  <?php $currentUser = auth()->user();?>
    @foreach ($users as $user)
  <tr>
    <td>{{ $user->name}}</td>
    <td>{{ $user->email}}</td>
    <td>{{ $user->roles->first()->display_name }}</td>
    <td>
      <a href="{{ route('users.edit', $user->id)}}" class="btn btn-xs btn-default">
        <i class="fa fa-edit"></i>
      </a>
      @if($user->id == config('cms.default_user_id') || $user->id == $currentUser->id)
        <button type="submit" onclick="return false" class="btn btn-xs btn-danger disabled">
          <i class="fa fa-trash"></i>
        </button>
      @else
        <a href="{{ route('users.confirm', $user->id) }}" class="btn btn-xs btn-danger">
          <i class="fa fa-trash"></i>
        </a>
      @endif
    </td>
  </tr>
@endforeach
</tbody>
</table>
