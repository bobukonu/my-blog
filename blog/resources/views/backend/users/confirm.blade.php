@extends('layouts.backend.backend')

@section('title', 'MyBlog | Delete Confirmation')
@section('content')

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        User
        <small>Delete Confirmation</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="{{route('users.index')}}">Users</a></li>
        <li class="active">Delete Confirmation</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        {{ Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']) }}
        <div class="col-xs-9">
          <div class="box">
            <div class="box-body">
              <p>
                You have specified this user for deletion
              </p>
              <p>
                ID #{{$user->id}} : {{$user->name}}
              </p>
              <p>
                What should be done with the content of this user
              </p>
              <p>
                <input type="radio" name="delete_option" value="delete" checked> Delete all Content
              </p>
              <p>
                <input type="radio" name="delete_option" value="attribute"> Attribute content to:
                {{Form::select('selected_user', $users, null)}}
              </p>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-danger">Confirm Deletion</button>
              <a href="{{route('users.index')}}"class="btn btn-default">Cancel</a>
            </div>
          </div>
        </div>

        {{ Form::close() }}

      </div>
    </section>

  </div>



@endsection

@section('script')

  <script type="text/javascript">

    $("#name").on('blur', function () {
        var theName = this.value.toLowerCase().trim(),
            slugInput = $("#slug");
            theSlug = theName.replace(/&/g, '-and-')
                              .replace(/[^a-z0-9-]+/g, '-')
                              .replace(/\-\-+/g, '-')
                              .replace(/^-+|-+$/g, '');

            slugInput.val(theSlug);
    })
  </script>
@endsection
