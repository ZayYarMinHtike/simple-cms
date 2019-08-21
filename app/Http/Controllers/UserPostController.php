<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use Auth;
use App\Post;
use App\User;



class UserPostController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() 
    {   
        $post = Auth::id();
        $PostId = Post::latest()->where('user_id', [$post])->paginate(5);
        return PostResource::collection($PostId);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'user_id' => 'required',            
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
            ]);
            
            $post = new Post;
            
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = str_slug($request->title).'.'.$image->getClientOriginalExtension();
                $destinationPath = storage_path('/app/public/uploads/images');
                $imagePath = $destinationPath . "/" . $name;
                $image->move($destinationPath, $name);
                $post->image = $name;
            }
            
            $post->user_id = $request->user_id;
            $post->title = $request->title;
            $post->body = $request->body;
            $post->save();
            
            return new PostResource($post);
    }
        
        /**
        * Display the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function show($id)
        {
            return new PostResource($post);
        }
        
        /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function edit($id)
        {
            //
        }
        
        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function update(Request $request, Post $post)
        {
            $this->validate($request, [
                'title' => 'required',
                'body' => 'required',
                ]);
                
                $post->update($request->only(['title', 'body']));
                
                return new PostResource($post);
            }
            
            /**
            * Remove the specified resource from storage.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function destroy(Post $post)
            {
                $post->delete();
                
                return response()->json(null, 204);
            }
        }
        