  @if(session('message'))
   <div class="alert alert-success">
     {{session('message')}}
   </div>
   @elseif(session('trash-message'))
   <?php list($message, $postId) = session('trash-message') ?>
   {{Form::open(['method' => 'PUT', 'route' => ['blog.restore', $postId] ])}}
   <div class="alert alert-danger">
     {{ $message }}
     <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-undo"></i> Undo</button>
     {{Form::close()}}
   </div>
  @endif
