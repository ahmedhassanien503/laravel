
@extends('layouts.app')
@section('content')

<div class="card" style="width: 18rem;">
  <div class="card-body">
<!--     <h5 class="card-title">{{$post->title}}</h5>
 -->    <h6 class="card-subtitle mb-2 text-muted">{{$post->createdAt}}</h6>
    <p class="card-text">{{$post->description}}</p>
   
  </div>
</div>
@endsection


