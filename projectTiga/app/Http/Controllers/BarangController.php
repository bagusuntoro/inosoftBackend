<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Barang::latest()->get();
        $title= 'Master Data';
        return response()->json([
            'data' => $data
        ]);
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
    $validatedData = $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|numeric',
        'description' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'video' => 'required|mimes:mp4|max:10240' // set a reasonable maximum limit for video file size
    ]);

    if ($request->hasFile('image') && $request->hasFile('video')) {
        $image = $request->file('image');
        $video = $request->file('video');

        $image->storeAs('public/image', $image->hashName());
        $video->storeAs('public/video', $video->hashName());

        $barang = new Barang();
        $barang->name = $request->name;
        $barang->price = $request->price;
        $barang->stock = $request->stock;
        $barang->description = $request->description;
        $barang->image = $image->hashName(); // simpan path gambar ke database
        $barang->video = $video->hashName(); // simpan path video ke database
        $barang->save();

        return response()->json([
            'data' => $barang
        ]);
    } else {
        return response()->json([
            'message' => 'Please provide both image and video files'
        ], 400);
    }
}






    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $barangs = Barang::find($id);
        return response()->json([
            'data' =>$barangs
        ]);
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
        $barangs = Barang::find($id);
        $barangs->name = $request->name;
        $barangs->price = $request->price;
        $barangs->stock = $request->stock;
        $barangs->description = $request->description;
        $barangs->image = $request->image;

        $barangs->save();
        return response()->json([
            'data' => $barangs
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangs = Barang::findOrFail($id);
        $barangs->delete();
        return response()->json([
            'message' => 'Barang deleted'
        ]);
    }
}
