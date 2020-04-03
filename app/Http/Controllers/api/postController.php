<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Http\Resources\PostResource;
use App\Http\Requests\StorePostRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class postController extends Controller
{
    //

    public function index(){
        $posts= Post::all();
        $postResource=PostResource::collection($posts);
        return $postResource;
    }


     public function show($post)
    {
        return new PostResource(
            Post::find($post)
        );
    }
    public function store(StorePostRequest $request)
    {
      
        return new PostResource(Post::create([
            'title' => $request->title,
            'description' =>  $request->description,
            'user_id' =>  $request->user_id,

        ]));
    }
}













