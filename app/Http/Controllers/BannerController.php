<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $banner = new Banner();
        $banner->name = $request->name;
        $banner->title = $request->title;
        $banner->sub_title = $request->sub_title; 
        $imageName = time().'.'.$request->image->extension(); 
        $request->image->move(public_path('image/banner'), $imageName);
        $url ='image/banner/'.$imageName;
        $banner->image = $url;
        $banner->save();
        return redirect()->route('banner.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banner::find($id);
        return view('admin.banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $banner = Banner::find($id);
        $banner->name = $request->name;
        $banner->title = $request->title;
        $banner->sub_title = $request->sub_title;
        if ($request->hasFile('image')){
        unlink($banner->image);
        $imageName = time().'.'.$request->image->extension(); 
        $request->image->move(public_path('image/banner'), $imageName);
        $url ='image/banner/'.$imageName;
        $banner->image = $url;
        }
        $banner->save();
        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $banner = Banner::find($id);
        unlink($banner->image);
        $banner->delete();
        return redirect()->back();
    }
}
