@extends('layouts.backend.backend')

@section('title', 'MyBlog | Edit account')
@section('content')

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Account
        <small>Edit account</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
        <li class="active">Edit account</li>
      </ol>
    </section>

    <section class="content">
      @include('backend.home.message')
      <div class="row">

        {{ Form::open(['url' => '/admin/edit-account', 'method' => 'PUT', 'id' => 'user-form']) }}

        @include('backend.home.form', ['hideRoleDropdown' => true])

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
