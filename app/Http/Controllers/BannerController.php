<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::paginate(1);
        return view('Admin.Banners', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Banner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBannerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBannerRequest $request)
    {
        $path = $request->file('image')->store('public');
        $file_name = pathinfo($path, PATHINFO_BASENAME);

        try {
            Banner::create([
                'user_id' => auth()->id(),
                'caption' => $request->caption,
                'path' => 'storage/' . $file_name
            ]);

            return redirect()->back()->with('banner added successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('faild');
        }
    }

    public function showBanner(Banner $banner)
    {
        try {
            $banner->update([
                'show' => true
            ]);
            return redirect()->back()->with('banner updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('faild');
        }
    }

    public function dontShowBanner(Banner $banner)
    {

        try {
            $banner->update([
                'show' => false
            ]);
            return redirect()->back()->with('banner updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('faild');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('Admin.BannerEdit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBannerRequest  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        try {
            $path = $request->file('image')->store('public');
            $file_name = pathinfo($path, PATHINFO_BASENAME);
            $lastPath = $banner->path;
            $banner->update([
                'caption' => $request->caption,
                'path' => 'storage/' . $file_name
            ]);
            unlink($lastPath);
            return redirect()->back()->with('banner updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('faild');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        try {
            unlink($banner->path);
            $banner->delete();
            return redirect()->back()->with('banner deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('faild');
        }
    }
}
