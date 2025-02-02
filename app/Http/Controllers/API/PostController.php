<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;




class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()   //DONE
    {
        $newestPosts = Post::where('confirm',1)->orderBy('created_at', 'desc')->with('category')->take(5)->get(); 
        $popularPosts = Post::where('confirm',1)->orderBy('views', 'desc')->with('category')->take(5)->get(); 

        return response()->json([
            'newestPosts'=>$newestPosts,
            'popularPosts'=>$popularPosts
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)  //DONE
    {


        $post = new Post();


        if ($request->hasFile('home_image')) {
            $image = $request->file('home_image');
            $imagePath = $image->store('uploads/posts', 'public');
            $post->post_image = $imagePath;
        }
        $post->user_id = auth('sanctum')->user()->id;
        $post->category_id= $request->category_id;
        $post->post_title = $request->main_title;
        $post->post_article = $request->main_article;
        $post->post_title2 = $request->low_title1;
        $post->post_article2 = $request->low_article1;
        $post->save();


        return response()->json([
            'message'=>'Post Başarıyla Oluşturuldu!',
            'post'=>$post
        ]);

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)  
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $post->views=$post->views+1;
        $post->save();
        return response()->json([
            'post'=>$post]);
    }

    public function post_update(Post $post){
        return response()->json([
            'post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        

        if ($request->hasFile('home_image')) {
            $image = $request->file('home_image');
            $imagePath = $image->store('uploads/posts', 'public');
            $post->post_image = $imagePath;
        }
        $post->confirm=$request->confirm;
        $post->category_id=$request->category_id;
        $post->post_title=$request->post_title;
        $post->post_article=$request->post_article;
        $post->post_title2=$request->post_title2;
        $post->post_article2=$request->post_article2;
        $post->save();
        return response()->json([
            'message'=>"Başarıyla Güncellendi!",
            'data'=>$post
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json([
            'message'=>'Post silindi'
        ]);
    }

   public function categories($category)
    {
    try {
        $posts = Post::where('category_id', $category)->where('confirm',1)->with('category')->get();
        
        if ($posts->isEmpty()) {
            return response()->json(['message' => 'No posts found'], 404);
        }

        return response()->json([
            'posts' => $posts, 
        ]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
    }



    public function user_posts(){
        try {
            $userId = auth('sanctum')->user()->id;
    
            $posts = Post::where('user_id', $userId)->paginate(6);
    
            $unconfirm_posts = Post::where('user_id', $userId)->where('confirm', 0)->get();
    
            if ($posts->isEmpty() && $unconfirm_posts->isEmpty()) {
                return response()->json(['message' => 'No posts found'], 404);
            }
    
            return response()->json([
                'posts' => $posts,
                'unconfirm_posts' => $unconfirm_posts,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred.',
                'details' => $e->getMessage(),
            ], 500);
        }
    }

    public function unconfirm(){
        $posts=Post::where('confirm','0')->paginate(10);
        return response()->json($posts, 200);
    }
}
