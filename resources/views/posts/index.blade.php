
@extends('layouts.app')
@section('content')

    <div class="container m-5">
<table class="table" >
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Slug</th>
      <th scope="col">created at</th>
      <th scope="col">user name</th>
      <th scope="col">description</th>
       <th scope="col">All Actions</th>

    </tr>
  </thead>
  <tbody>
    <div>
    <h1 style="display: inline;">Ahmed Mahmoud</h1>
    <a href="{{route('posts.create')}}" class="btn btn-outline-success mb-4" style="margin-left: 300px">Create post</a>
  </div>
    @foreach($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{ $post->slug }}</td>
      <td>{{$post->createdAt}}</td>
       <td>{{ $post->user ? $post->user->name:'not exist'}}</td>
      <td>{{$post->description}}</td>
      <td><a href="{{route('posts.show',['post'=>$post->id])}}" class="btn btn-outline-primary">details</a>
      <td><a href="{{route('posts.edit',['post'=>$post->id]) }}" class="btn btn-outline-warning">edit</a>
      
  <form action="{{ route('posts.destroy',['post'=>$post->id]) }}" method="POST" class="d-inline">
      @csrf
      @method('DELETE')
      <button  class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post ?')">Delete</button>
        </form>
   
      </td>
    </div>
    @endforeach

  </tbody>
</table>

</div>
@endsection

