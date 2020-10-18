@extends('layouts.backend.backend')

@section('title', 'MyBlog | Edit User')
@section('content')

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Users
        <small>Edit User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="{{route('users.index')}}">User</a></li>
        <li class="active">Edit User</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        {{ Form::open(['route' => ['users.update', $user->id], 'method' => 'PUT', 'files' => TRUE, 'id' => 'user-form']) }}
        <div class="col-xs-9">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                 {{ Form::label('name') }}
                 {{ Form::text('name', $user->name, ['class' => 'form-control'])}}
                 @if($errors->has('name'))
                 <span class="help-block">{{ $errors->first('title')}}</span>
                 @endif
                 </div>

                 <div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
                 {{ Form::label('slug') }}
                 {{ Form::text('slug', $user->slug, ['class' => 'form-control'])}}
                 @if($errors->has('slug'))
                 <span class="help-block">{{ $errors->first('slug')}}</span>
                 @endif
                 </div>

                 <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                 {{ Form::label('email') }}
                 {{ Form::text('email',  $user->email, ['class' => 'form-control'])}}
                 @if($errors->has('email'))
                 <span class="help-block">{{ $errors->first('email')}}</span>
                 @endif
                 </div>
                 <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                 {{ Form::label('password') }}
                 {{ Form::password('password', ['class' => 'form-control'])}}
                 @if($errors->has('password'))
                 <span class="help-block">{{ $errors->first('password')}}</span>
                 @endif
                 </div>

                 <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                 {{ Form::label('password_confirmation') }}
                 {{ Form::password('password_confirmation', ['class' => 'form-control'])}}
                 @if($errors->has('password_confirmation'))
                 <span class="help-block">{{ $errors->first('password_confirmation')}}</span>
                 @endif
                 </div>
                 <div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
                 {{ Form::label('role') }}
                 @if ($user->exists && $user->id == config('cms.default_user_id'))
                 {{Form::hidden('role', $user->roles->first()->id)}}
                  <p class="form-control-static"> {{$user->roles->first()->display_name }} </p>
                 @else
                 {{ Form::select('role', \App\Role::pluck('display_name', 'id'), $user->roles->first()->id, ['class' => 'form-control', 'placeholder' => 'Choose a role...'])}}
                  @endif
                    @if($errors->has('role'))
                    <span class="help-block">{{ $errors->first('role')}}</span>
                 @endif
                 </div>
                 <div class="form-group {{ $errors->has('bio') ? 'has-error' : ''}}">
                 {{ Form::label('bio') }}
                 {{ Form::textarea('bio', $user->bio, ['rows' => '10', 'cols' => '10', 'class' => 'form-control'])}}
                 @if($errors->has('bio'))
                 <span class="help-block">{{ $errors->first('bio')}}</span>
                 @endif
                 </div>

            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">{{ $user->exists ? 'Update' : 'Save'}}</button>
              <a href="{{route('users.index')}}" class="btn btn-default">Cancel</a>
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
