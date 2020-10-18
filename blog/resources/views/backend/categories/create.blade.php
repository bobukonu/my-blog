@extends('layouts.backend.backend')

@section('title', 'MyBlog | Add New Category')
@section('content')

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Blog
        <small>Create New Category</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="{{route('categories.index')}}">Categories</a></li>
        <li class="active">Add New Category</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        {{ Form::open(['route' => 'categories.store', 'method' => 'POST', 'files' => TRUE, 'id' => 'category-form']) }}
        <div class="col-xs-9">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add New Category</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                 {{ Form::label('title') }}
                 {{ Form::text('title', null, ['class' => 'form-control'])}}
                 @if($errors->has('title'))
                 <span class="help-block">{{ $errors->first('title')}}</span>
                 @endif
                 </div>

                 <div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
                 {{ Form::label('slug') }}
                 {{ Form::text('slug', null, ['class' => 'form-control'])}}
                 <small>If empty would be added automatically</small>
                 @if($errors->has('slug'))
                 <span class="help-block">{{ $errors->first('slug')}}</span>
                 @endif
                 </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">{{ $category->exists ? 'Update' : 'Save'}}</button>
              <a href="{{route('categories.index')}}" class="btn btn-default">Cancel</a>
            </div>
          </div>
        </div>

        {{ Form::close() }}

      </div>
    </section>

  </div>



@endsection


@section('script')
<script>
$(function () {
// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.1
var inscrybmde1 = new InscrybMDE({ element: $("#excerpt")[0] });
var inscrybmde2 = new InscrybMDE({ element: $("#body")[0] });
//bootstrap WYSIHTML5 - text editor

})
</script>
  <script type="text/javascript">

    $("#title").on('blur', function () {
        var theTitle = this.value.toLowerCase().trim(),
            slugInput = $("#slug");
            theSlug = theTitle.replace(/&/g, '-and-')
                              .replace(/[^a-z0-9-]+/g, '-')
                              .replace(/\-\-+/g, '-')
                              .replace(/^-+|-+$/g, '');

            slugInput.val(theSlug);
    });
  </script>
@endsection
