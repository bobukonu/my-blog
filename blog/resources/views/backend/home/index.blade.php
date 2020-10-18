@extends('layouts.backend.backend')

@section('title', 'MyBlog | Dashboard')
@section('content')
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Dashboard
              <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-tachometer-alt"></i> Home</a></li>
              <li class="active">Dashboard</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="container">
              <div class="container">
                  <div class="row ">

                    <div class="col-md-11">
                        <div class="panel panel-default">
                            <div class="panel-heading">Dashboard</div>

                            <div class="panel-body">
                                <h2>Welcome to my Blog</h2>
                                <p class="lead">Hello {{Auth::user()->name}}</p>

                                <h5>Get Started</h5>
                                <a href="{{ route('blog.create')}}" type="button" class="btn btn-primary">Write Your First Blog Post</a>
                            </div>
                        </div>
                    </div>
            </div>
            </div>
            </div>

          </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
@endsection
