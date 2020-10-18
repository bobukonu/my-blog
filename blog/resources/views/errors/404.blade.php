@extends('layout.app')


@section('content')
       <style>
       .page-not-found{
         border: 1px solid #e7e7e7;
         box-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
         text-align: center;
         padding: 60px 0;
       }
       .page-not-found h2{
         font-size: 5em;
         letter-spacing: -4px;
       }
       .page-not-found p{
         font-size: 3em;
         letter-spacing: -4px;
       }
     </style>
  <div class="container">
    <div class="row">
      <div class="col-md-12 page-not-found">
        <h2>Page Not Found</h2>
        <p class="lead">
          Sorry the page that you are looking for couldn't be found
        </p>
      </div>
    </div>
  </div>

@endsection
