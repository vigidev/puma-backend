<?php

namespace App\Http\Controllers;

use App\Download;
use Illuminate\Http\Request;
use App\Http\Resources\Download as DownloadResource;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Downloads
        $downloads = Download::orderBy('created_at', 'desc')->paginate(10);

        // Return collection
        return DownloadResource::collection($downloads);
    }
    
    public function it($p)
    {
        // Get Downloads
        $downloads = Download::where('category_id', 1)->orderBy('created_at', 'desc')->paginate($p);

        // Return collection
        return DownloadResource::collection($downloads);
    }
    
    public function is($p)
    {
        // Get Downloads
        $downloads = Download::where('category_id', 2)->orderBy('created_at', 'desc')->paginate($p);

        // Return collection
        return DownloadResource::collection($downloads);
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
        $download = $request->isMethod('put') ? Download::where('uid', $request->uid)->first() : new Download;

        $download->uid = $request->isMethod('put') ? $download->uid : strtolower(str_random(11));
        //$download->id = $request->input('id');
        $download->downloadcategory_id = $request->input('downloadcategory_id');
        $download->title = $request->input('title');
        $download->url = $request->input('url');
        //$download->featured = $request->input('featured');
        $download->created_by = $request->isMethod('put') ? $download->created_by : $request->input('user_id');
        //$download->updated_by = $request->isMethod('put') ? $request->input('user_id') : NULL;
        $download->updated_by = $request->input('user_id');

        if($download->save()) {
            return new DownloadResource($download);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function show($uid)
    {
        // Get Single Download
        $download = Download::where('uid', $uid)->first();

        // Return as resource
        return new DownloadResource($download);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Download  $download
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
     * @param  \App\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function destroy($uid)
    {
        // Get Single Download
        $download = Download::where('uid', $uid)->first();

        if($download->delete()) {
            return new DownloadResource($download);
        }
    }
}
