<?php

namespace App\Http\Controllers;

use App\DownloadCategory;
use Illuminate\Http\Request;
use App\Http\Resources\DownloadCategory as DownloadCategoryResource;

class DownloadCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Download Categories
        $downloadcategories = DownloadCategory::orderBy('created_at', 'desc')->paginate(10);

        // Return collection
        return DownloadCategoryResource::collection($downloadcategories);
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
        $downloadcategory = $request->isMethod('put') ? DownloadCategory::where('uid', $request->uid)->first() : new DownloadCategory;

        $downloadcategory->uid = $request->isMethod('put') ? $downloadcategory->uid : strtolower(str_random(11));
        //$downloadcategory->id = $request->input('id');
        $downloadcategory->title = $request->input('title');
        $downloadcategory->created_by = $request->isMethod('put') ? $downloadcategory->created_by : $request->input('user_id');
        //$downloadcategory->updated_by = $request->isMethod('put') ? $request->input('user_id') : NULL;
        $downloadcategory->updated_by = $request->input('user_id');

        if($downloadcategory->save()) {
            return new DownloadCategoryResource($downloadcategory);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DownloadCategory  $downloadCategory
     * @return \Illuminate\Http\Response
     */
    public function show($uid)
    {
        // Get Single Download Category
        $downloadcategory = DownloadCategory::where('uid', $request->uid)->first();

        // Return as resource
        return new DownloadCategoryResource($downloadcategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DownloadCategory  $downloadCategory
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
     * @param  \App\DownloadCategory  $downloadCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DownloadCategory  $downloadCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($uid)
    {
        // Get Single DownloadCategory
        $downloadcategory = DownloadCategory::where('uid', $uid)->first();

        if($downloadcategory->delete()) {
            return new DownloadCategoryResource($downloadcategory);
        }
    }
}
