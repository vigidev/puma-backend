<?php

namespace App\Http\Controllers;

use App\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Resources\NewsCategory as NewsCategoryResource;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get News Categories
        $newscategories = NewsCategory::orderBy('created_at', 'desc')->paginate(10);

        // Return collection
        return NewsCategoryResource::collection($newscategories);
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
        //
        $newscategory = $request->isMethod('put') ? NewsCategory::where('uid', $request->uid)->first() : new NewsCategory;

        $newscategory->uid = $request->isMethod('put') ? $newscategory->uid : strtolower(str_random(11));
        //$newscategory->id = $request->input('id');
        $newscategory->title = $request->input('title');
        $newscategory->created_by = $request->isMethod('put') ? $newscategory->created_by : $request->input('user_id');
        //$newscategory->updated_by = $request->isMethod('put') ? $request->input('user_id') : NULL;
        $newscategory->updated_by = $request->input('user_id');

        if($newscategory->save()) {
            return new NewsCategoryResource($newscategory);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function show($uid)
    {
        // Get Single News Category
        $newscategory = NewsCategory::where('uid', $uid)->first();

        // Return as resource
        return new NewsCategoryResource($newscategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NewsCategory  $newsCategory
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
     * @param  \App\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($uid)
    {
        // Get Single NewsCategory
        $newscategory = NewsCategory::where('uid', $uid)->first();

        if($newscategory->delete()) {
            return new NewsCategoryResource($newscategory);
        }
    }
}
