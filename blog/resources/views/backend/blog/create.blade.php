@extends('layouts.backend.backend')

@section('title', 'MyBlog | Add New Post')
@section('content')

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Blog
        <small>Create New Post</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="{{route('blog.index')}}">Blog</a></li>
        <li class="active">Add New Post</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        {{ Form::open(['route' => 'blog.store', 'method' => 'POST', 'files' => TRUE, 'id' => 'post-form']) }}
        <div class="col-xs-9">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add New Post</h3>
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

                 <div class="form-group">
                 {{ Form::label('excerpt') }}
                 {{ Form::textarea('excerpt', null, ['class' => 'form-control'])}}
                 </div>
                 <div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
                 {{ Form::label('body') }}
                 {{ Form::textarea('body', null, ['class' => 'form-control'])}}
                 @if($errors->has('body'))
                 <span class="help-block">{{ $errors->first('body')}}</span>
                 @endif
                 </div>

            </div>
          </div>
        </div>

        <div class="col-xs-3">
          <div class="box">
            <div class="box-header">
              <h3>Publish</h3>
            </div>
            <div class="box-body">
              <div class="form-group {{ $errors->has('published_at') ? 'has-error' : ''}}">
              {{ Form::label('published_at', 'Publish Date') }}
                <div class='input-group date' id='datetimepicker1'>
                  {{ Form::text('published_at', null, ['class' => 'form-control'])}}
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                @if($errors->has('published_at'))
                <span class="help-block">{{ $errors->first('published_at')}}</span>
                @endif
            </div>
          </div>
            <div class="box-footer">
              <div class="pull-left">
              <a href="" id="draft-btn" class="btn btn-default">Save Draft</a>
            </div>
            <div class="pull-right">
              {{Form::submit('Publish', ['class' => 'btn btn-primary'])}}
            </div>
            </div>
          </div>

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Category</h3>
            </div>
            <div class="box-body text-center">
              <div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
             {{ Form::select('category_id', App\Category::pluck('title', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Choose Category'])}}
             @if($errors->has('category_id'))
             <span class="help-block">{{ $errors->first('category_id')}}</span>
             @endif
             </div>

            </div>
          </div>

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Image</h3>
            </div>
            <div class="box-body text-center">
              <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
               <div class="fileinput fileinput-new" data-provides="fileinput">
                 <div class="fileinput-new img-thumbnail" style="width: 200px; height: 150px;">
                   <img src="/backend/plugins/Jasny/img/download.svg"  alt="...">
                 </div>
                 <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                 <div>
                   <span class="btn btn-success btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>{{ Form::file('image',  null)}}</span>
                   <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                 </div>
               </div>
               @if($errors->has('image'))
               <span class="help-block">{{ $errors->first('image')}}</span>
               @endif
               </div>

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
    $('ul.pagination').addClass('no-marign pagination-sm');

    $("#title").on('blur', function () {
        var theTitle = this.value.toLowerCase().trim(),
            slugInput = $("#slug");
            theSlug = theTitle.replace(/&/g, '-and-')
                              .replace(/[^a-z0-9-]+/g, '-')
                              .replace(/\-\-+/g, '-')
                              .replace(/^-+|-+$/g, '');

            slugInput.val(theSlug);
    })

    $("#draft-btn").click(function(e){
      e.preventDefault();
      $("#published_at").val("");
      $("#post-form").submit();
    });
  </script>
@endsection
