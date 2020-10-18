@extends('layouts.backend.backend')

@section('title', 'MyBlog | Categories')
@section('content')
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Category
              <small>Display All Categories</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="/admin/dashboard"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
              <li><a href="{{route('categories.index')}}">Category</a></li>
              <li class="active">All Category</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
               <div class="row">
                 <div class="col-xs-12">
                   <div class="box">
                     <div class="box-header">

                       <div class="pull-right">
                         <a href="{{route('categories.create')}}" class="btn btn-primary"><i class="fa fa-pencil-alt"></i> Add Category</a>
                       </div>
                       <div class="pull-left">

                       </div>
                     </div>
                     <!-- /.box-header -->
                     <div class="box-body">
                      @include('backend.categories.message')
                       @if ( ! $categories->count())
                         <div class="alert alert-danger">
                           <strong>No Record Found</strong>
                         </div>
                       @else
                          @include('backend.categories.table')
                       @endif
                     </div>
                     <!-- /.box-body -->
                     <div class="box-footer">
                       <ul class="pagination">
                       <div class="pull-left">
                         <small>{{ $categoriesCount }} {{str_plural('Item', $categoriesCount)}}</small>
                       </div>
                       </ul>
                       <div class="pull-right">
                         {{$categories->appends( Request::query() )->render()}}
                       </div>
                     </div>
                   </div>
                   <!-- /.box -->
            </section>
        </div>
        <!-- /.content-wrapper -->
@endsection

@section('script')
  <script type="text/javascript">
    $('ul.pagination').addClass('no-marign pagination-sm')
  </script>
@endsection
