<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use App\Http\Resources\News as NewsResource;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get News
        $news = News::orderBy('created_at', 'desc')->paginate(10);

        // Return collection
        return NewsResource::collection($news);
    }

    public function news($p)
    {
        // Get Latest News
        $news = News::where('category_id', '!=', 1)->where('category_id', '!=', 3)->where('published', 1)->orderBy('created_at', 'desc')->paginate($p);

        // Return collection
        return NewsResource::collection($news);
    }

    public function featured_events($p)
    {
        // Get Featured Events
        $news = News::where('category_id', 1)->where('published', 1)->where('featured', 1)->orderBy('created_at', 'desc')->paginate($p);

        // Return collection
        return NewsResource::collection($news);
    }

    public function academic_news($p)
    {
        // Get Academic News
        $news = News::where('category_id', 2)->where('published', 1)->orderBy('created_at', 'desc')->paginate($p);

        // Return collection
        return NewsResource::collection($news);
    }

    public function events($p)
    {
        // Get News Categories
        $news = News::where('category_id', 1)->where('published', 1)->orderBy('created_at', 'desc')->paginate($p);

        // Return collection
        return NewsResource::collection($news);
    }

    public function activities($p)
    {
        // Get News Categories
        $news = News::where('category_id', 3)->where('published', 1)->orderBy('created_at', 'desc')->paginate($p);

        // Return collection
        return NewsResource::collection($news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $news = $request->isMethod('put') ? News::where('uid', $request->uid)->first() : new News;

        $news->uid = $request->isMethod('put') ? $news->uid : strtolower(str_random(11));
        //$news->id = $request->input('id');
        $news->category_id = $request->input('newscategory_id');
        $news->title = $request->input('title');
        $news->url = $request->input('url');
        $news->headline = $request->input('headline');
        $news->content = $request->input('content');
        //$file       = $request->file('poster');
        //$fileName   = $file->getClientOriginalName();
        //$request->file('poster')->move("poster/", $fileName);
        $news->poster = $request->input('poster');
        //$news->featured = $request->input('featured');
        //$news->published = $request->input('published');
        $news->created_by = $request->isMethod('put') ? $news->created_by : $request->input('user_id');
        //$news->updated_by = $request->isMethod('put') ? $request->input('user_id') : NULL;
        $news->updated_by = $request->input('user_id');

        if($news->save()) {
            return new NewsResource($news);
        }
    }

    public function feature($uid){
        $news = News::where('uid', $uid)->first();
        $news->feature();
        return new NewsResource($news);
        
    }

    public function publish($uid){
        $news = News::where('uid', $uid)->first();
        $news->publish();
        return new NewsResource($news);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show($uid)
    {
        // Get Single News
        $news = News::where('uid', $uid)->first();

        // Return as resource
        return new NewsResource($news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($uid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($uid)
    {
        // Get Single News
        $news = News::where('uid', $uid)->first();

        if($news->delete()) {
            return new NewsResource($news);
        }
    }
}
