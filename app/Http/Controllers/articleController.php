<?php

namespace App\Http\Controllers;

use App\Models\article;
use App\Models\category;
use App\Models\comment;
use Illuminate\Http\Request;
class articleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category_id=$request->category_id;
        $category=category::all();
        if($category_id){
            $articles=article::all()->where('category_id',$category_id);
        }else{
            $articles=article::all();
        }
        return view('index',compact('articles','category'));
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
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('img'), $imageName);
        $post =article::create([
            'title'=>$request->title,
            'category_id'=>$request->category_id,
            'user_id'=>$request->user_id,
            'image'=>$imageName,
            'body'=>$request->body
        ]);
        return back();
    }
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment=comment::all()->where('article_id',$id);
        $category=category::all();
        $article=article::find($id);
        return view('post',compact('article','category','comment'));
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
