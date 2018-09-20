<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;
use App\Http\Resources\About as AboutResource;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Abouts
        $abouts = About::orderBy('created_at', 'desc')->paginate(10);

        // Return collection
        return AboutResource::collection($abouts);
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
        $about = $request->isMethod('put') ? About::where('uid', $request->uid)->first() : new About;

        $about->uid = $request->isMethod('put') ? $about->uid : strtolower(str_random(11));
        // $about->id = $request->input('id');
        $about->title = $request->input('title');
        $about->content = $request->input('content');
        $about->created_by = $request->isMethod('put') ? $about->created_by : $request->input('user_id');
        // $about->updated_by = $request->isMethod('put') ? $request->input('user_id') : NULL;
        $about->updated_by = $request->input('user_id');

        if($about->save()) {
            return new AboutResource($about);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get Single About
        $about = About::findOrFail($id);

        // Return as resource
        return new AboutResource($about);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
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
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get Single About
        $about = About::findOrFail($id);

        if($about->delete()) {
            return new AboutResource($about);
        }
    }
}
