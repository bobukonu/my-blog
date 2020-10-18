
<style media="screen">
/**
* Oscuro: #283035
* Azul: #03658c
* Detalle: #c7cacb
* Fondo: #dee1e3
----------------------------------*/
* {
  margin: 0;
  padding: 0;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

a {
  color: #03658c;
  text-decoration: none;
}

ul {
  list-style-type: none;
}

/** ====================
* Lista de Comentarios
=======================*/
.comments-container {
  margin: 60px auto 15px;
  width: 100%;
}

.comments-container h1 {
  font-size: 36px;
  color: #283035;
  font-weight: 400;
}

.comments-container h1 a {
  font-size: 18px;
  font-weight: 700;
}

.comments-list {
  margin-top: 30px;
  position: relative;
}

/**
* Lineas / Detalles
-----------------------*/
.comments-list:before {
  content: '';
  width: 2px;
  height: 100%;
  background: #c7cacb;
  position: absolute;
  left: 32px;
  top: 0;
}

.comments-list:after {
  content: '';
  position: absolute;
  background: #c7cacb;
  bottom: 0;
  left: 27px;
  width: 7px;
  height: 7px;
  border: 3px solid #dee1e3;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
}

.reply-list:before, .reply-list:after {display: none;}
.reply-list li:before {
  content: '';
  width: 60px;
  height: 2px;
  background: #c7cacb;
  position: absolute;
  top: 25px;
  left: -55px;
}


.comments-list li {
  margin-bottom: 15px;
  display: block;
  position: relative;
}

.comments-list li:after {
  content: '';
  display: block;
  clear: both;
  height: 0;
  width: 0;
}

.reply-list {
  padding-left: 88px;
  clear: both;
  margin-top: 15px;
}
/**
* Avatar
---------------------------*/
.comments-list .comment-avatar {
  width: 65px;
  height: 65px;
  position: relative;
  z-index: 99;
  float: left;
  border: 3px solid #FFF;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
  -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
  box-shadow: 0 1px 2px rgba(0,0,0,0.2);
  overflow: hidden;
}

.comments-list .comment-avatar img {
  width: 100%;
  height: 100%;
}

.reply-list .comment-avatar {
  width: 50px;
  height: 50px;
}

.comment-main-level:after {
  content: '';
  width: 0;
  height: 0;
  display: block;
  clear: both;
}
/**
* Caja del Comentario
---------------------------*/
.comments-list .comment-box {
  width: 680px;
  float: right;
  position: relative;
  -webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.15);
  -moz-box-shadow: 0 1px 1px rgba(0,0,0,0.15);
  box-shadow: 0 1px 1px rgba(0,0,0,0.15);
}

.comments-list .comment-box:before, .comments-list .comment-box:after {
  content: '';
  height: 0;
  width: 0;
  position: absolute;
  display: block;
  border-width: 10px 12px 10px 0;
  border-style: solid;
  border-color: transparent #FCFCFC;
  top: 8px;
  left: -11px;
}

.comments-list .comment-box:before {
  border-width: 11px 13px 11px 0;
  border-color: transparent rgba(0,0,0,0.05);
  left: -12px;
}

.reply-list .comment-box {
  width: 610px;
}
.comment-box .comment-head {
  background: #FCFCFC;
  padding: 10px 12px;
  border-bottom: 1px solid #E5E5E5;
  overflow: hidden;
  -webkit-border-radius: 4px 4px 0 0;
  -moz-border-radius: 4px 4px 0 0;
  border-radius: 4px 4px 0 0;
}

.comment-box .comment-head i {
  float: right;
  margin-left: 14px;
  position: relative;
  top: 2px;
  color: #A6A6A6;
  cursor: pointer;
  -webkit-transition: color 0.3s ease;
  -o-transition: color 0.3s ease;
  transition: color 0.3s ease;
}

.comment-box .comment-head i:hover {
  color: #03658c;
}

.comment-box .comment-name {
  color: #283035;
  font-size: 14px;
  font-weight: 700;
  float: left;
  margin-right: 10px;
  text-decoration: inherit;
}

.comment-box .comment-name a {
  color: #283035;
}

.comment-box .comment-head span {
  float: left;
  color: #999;
  font-size: 13px;
  position: relative;
  top: 1px;
}

.comment-box .comment-content {
  background: #FFF;
  padding: 12px;
  font-size: 15px;
  color: #595959;
  -webkit-border-radius: 0 0 4px 4px;
  -moz-border-radius: 0 0 4px 4px;
  border-radius: 0 0 4px 4px;
}

.comment-box .comment-name.by-author, .comment-box .comment-name.by-author a {color: #03658c;}
.comment-box .comment-name.by-author:after {
  content: 'autor';
  background: #03658c;
  color: #FFF;
  font-size: 12px;
  padding: 3px 5px;
  font-weight: 700;
  margin-left: 10px;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
}

/** =====================
* Responsive
========================*/
@media only screen and (max-width: 766px) {
  .comments-container {
      width: 480px;
  }

  .comments-list .comment-box {
      width: 390px;
  }

  .reply-list .comment-box {
      width: 320px;
  }
}

</style>
<!-- Contenedor Principal -->
    <div class="comments-container card" id="post-comments">
      <div class="card-header text-center">
      <h3><i class="fa fa-comment"></i> {{$post->commentNumber('Comment')}} </h3>
    </div>

        <ul id="comments-list" class="comments-list">
          @foreach ($postComments as $comment)
            <li>
                <div class="comment-main-level">
                    <!-- Avatar -->
                    <!-- <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div> -->
                    <!-- Contenedor del Comentario -->
                    <div class="comment-box">
                        <div class="comment-head">
                          <h6 class="comment-name"><a href="#">{{$comment->author_name}}</a></h6>
                            <span>{{$comment->date}}</span>
                            <i class="fa fa-reply"></i>
                            <i class="fa fa-heart"></i>
                        </div>
                        <div class="comment-content">
                          {!! $comment->body_html !!}
                        </div>
                    </div>
                </div>

              </li>
          @endforeach

        </ul>
        <div class="card-body">
          <nav class="align-center">
            {{ $postComments->links()}}
          </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
          <h3>
              Leave a Comment
          </h3>
        </div>
        @if (session('message'))

        <div class="alert alert-info" role="alert">
          {{session('message')}}
        </div>

        @endif
          <div class="card-body">
          {{Form::open(['route' => ['blog.comments', $post->slug], 'novalidate'])}}
          @csrf

          <div class="form-group">
              <label for="comment_name">Name:</label>
              <input id="author_name" type="text" class="form-control @error('author_name') is-invalid @enderror" name="author_name" required autofocus>

              <!-- {{Form::text('author_name', null, ['class' => 'form-control  @error("author_name") is-invalid @enderror'])}} -->
              @error('author_name')
                  <div class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </div>
              @enderror
          </div>

          <div class="form-group">
              <label for="email">E-mail :</label>
              <input id="author_email" type="text" class="form-control @error('author_email') is-invalid @enderror" name="author_email" required autofocus>


              <!-- {{Form::email('author_email', null, ['class' => 'form-control @error("author_email") is-invalid @enderror'])}} -->
              @error('author_email')
                  <div class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </div>
              @enderror
          </div>

          <div class="form-group">
              <label for="email">Website :</label>
              {{Form::text('author_url', null, ['class' => 'form-control'])}}
          </div>
          <div class="form-group ">
          <label for="">Comment:</label>
          <textarea name="body" class=" @error('author_email') is-invalid @enderror form-control" rows="8" cols="80"></textarea>
          @if($errors->has('body'))

        <div class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('body')}}</strong>
          </div>
          @endif
          </div>

          <input type='hidden' name='parent_id' value="0" id='parent_id' />
          <input type='hidden' name='post_id'  id='parent_id'/>

          <div id='submit_button'>
              <input class="btn btn-outline-success" type="submit" name="submit" value="Add comment"/>
          </div>
          {{Form::close()}}
            </div>
    </div>
