@extends('layouts.backend.backend')

@section('title', 'MyBlog | Blog Index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Blog
              <small>Display all Blog Post</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="/admin/dashboard"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
              <li><a href="{{route('blog.index')}}">Blog</a></li>
              <li class="active">All Post</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
               <div class="row">
                 <div class="col-xs-12">
                   <div class="box">
                     <div class="box-header">

                       <div class="pull-right">
                         <a href="{{route('blog.create')}}" class="btn btn-primary"><i class="fa fa-pencil-alt"></i> Add Post</a>
                       </div>
                       <div class="pull-left">
                         <?php $links = [] ?>
                         @foreach($statusList as $key => $value)
                          @if ($value)
                          <?php $selected = Request::get('status')  == $key ? 'selected-status' : '' ?>
                            <?php $links[] = "<a class=\"{$selected}\" href=\"?status={$key}\">" . ucwords($key) ." ({$value})</a>" ?>
                          @endif
                         @endforeach
                         {!! implode(' | ', $links) !!}
                       </div>
                     </div>
                     <!-- /.box-header -->
                     <div class="box-body">
                      @include('backend.blog.message')
                       @if ( ! $posts->count())
                         <div class="alert alert-danger">
                           <strong>No Record Found</strong>
                         </div>
                       @else
                        @if($onlyTrashed)
                          @include('backend.blog.table-trash')
                        @else
                          @include('backend.blog.table')
                        @endif
                       @endif
                     </div>
                     <!-- /.box-body -->
                     <div class="box-footer">
                       <ul class="pagination">
                       <div class="pull-left">
                         <small>{{ $postCount }} {{str_plural('Item', $postCount)}}</small>
                       </div>
                       </ul>
                       <div class="pull-right">
                         {{$posts->appends( Request::query() )->render()}}
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
