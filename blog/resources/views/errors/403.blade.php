@extends('layouts.backend.backend')


@section('content')
    <style>
    .page-not-found{
      border: 1px solid #e7e7e7;
      box-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
      text-align: center;
      padding: 60px 0;
    }
    .page-not-found h2{
      font-size: 6em;
      letter-spacing: -4px;
    }
    .page-not-found p{
      font-size: 4em;
      letter-spacing: -4px;
    }
    </style>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content">
        <div class="col-md-12 page-not-found">
          <h2>Forbidden</h2>
          <p class="lead">
          You cannot access this page, please contact the Admin
          </p>
        </div>

      </section>
      </div>


@endsection
