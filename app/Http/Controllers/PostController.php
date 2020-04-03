<?php

namespace App\Http\Controllers;
use \Cviebrock\EloquentSluggable\Services\SlugService;


use Illuminate\Http\Request;
use App\post;
use App\User;



class PostController extends Controller
{
	public function index(){
// 		$myposts=[
// [
// 	'id'=>'1',
// 	'title'=>'first post',
// 	'createdAt'=>'1995-04-21',
// ],
// [ 
// 	'id'=>'2',
// 	'title'=>'second post',
// 	'createdAt'=>'2018-05-01',
// ],
// [
// 	'id'=>'3',
// 	'title'=>'third post',
// 	'createdAt'=>'2019-06-01',
// ],
// ];
		$posts =post::all();


    return view('posts.index',[  
    'posts'=>$posts,
]);
	}

	public function show()
	{
		$request = request();//global function return request object
		//dd($request->post);
		$postId=$request->post;

		$post=post::find($postId);
		//dd($post);//return single object

		return view('posts.show',['post'=>$post]);
	}


	public function create(){
		$users =user::all();
		return view('posts.create',['users'=>$users]);
			
         
    }
 public function store( Request $request){ 
        
            
          $request=request();
          $validatedData = $request->validate([
              'title' => 'required|min:5',
              'createdAt'=>'required',
              'description' => 'required|min:10',
    ],[
    	'title.min'=>'please the title is min 5 char',
    	'description.min'=>'please the title must be atleast 10 char'
    ]);

    // The blog post is valid...

    
        Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'createdAt'=>$request->createdAt,
            'user_id'=>$request->user_id,
             'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
        ]);
        return redirect()->route('posts.index');
    }




	public function edit()
	    {
	        $users = User::all();
	        $post_id = request('post');
	        $post = Post::find($post_id);
	        return view('posts.edit', ['post' => $post, 'users' => $users]);
	    }


    
    public function update($request)
    {
        $request=request();
        $postId = $request->post;
        // dd($request->post);
        $post = Post::find($postId);
          $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        $data = $request->only(['title', 'description', 'user_id']);
        $post->update($data);

        return redirect()->route('posts.show', ['post' => $request->post]);
    }

    
    
    public function destroy(){
        $request=request();
        $postId=$request->post;
        $post=Post::find($postId);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
