<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Resources\Setting as SettingResource;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Settings
        $settings = Setting::orderBy('created_at', 'desc')->paginate(10);

        // Return collection
        return SettingResource::collection($settings);
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
        $setting = $request->isMethod('put') ? Setting::findOrFail($request->id) : new Setting;

        $setting->uid = strtolower(str_random(11));
        $setting->id = $request->input('id');
        $setting->page_name = $request->input('page_name');
        $setting->meta_desc = $request->input('meta_desc');
        $setting->meta_key = $request->input('meta_key');
        $setting->main_image = $request->input('main_image');
        $setting->created_by = $request->isMethod('put') ? $setting->created_by : $request->input('user_id');
        $setting->updated_by = $request->isMethod('put') ? $request->input('user_id') : NULL;

        if($setting->save()) {
            return new SettingResource($setting);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        // Get Single Setting
        $setting = Setting::findOrFail($id);

        // Return as resource
        return new SettingResource($setting);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        // Get Single Setting
        $setting = Setting::findOrFail($id);

        if($setting->delete()) {
            return new SettingResource($setting);
        }
    }
}
