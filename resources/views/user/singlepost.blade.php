@extends('layouts.user.masterpost')

    @section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-10 mx-auto">
          <h3 class="mt-4">{{ $post->title }} <span class="lead"> by <a href="#"> {{ $post->user->name }} </a></span> </h3>
          <p>Posted {{ $post->created_at->diffForHumans() }} </p>
          <hr>
          <img class="img-fluid rounded card-img-top" src=" {!! !empty($post->image) ? '/storage/uploads/images/' . $post->image :  '' !!} ">
          
          <div>
            <p class="card-text">{{ $post->body }}</p>
            <hr>
          </div>

          @auth
          <Comments
              :post-id='@json($post->id)' 
              :user-name='@json(auth()->user()->name)'>
          </Comments>
          @endauth
        </div>
      </div>
    </div>
    @endsection