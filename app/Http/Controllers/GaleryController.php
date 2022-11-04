<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Galery::latest()->paginate(10);

        return view('dashboard.galleries.index', compact('galleries'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.galleries.create');
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
            'type' => ['required', Rule::in(['slideshow', 'column'])],
            'img' => ['required', File::types(['jpg', 'jpeg', 'png', 'webp'])->max(5 * 1024)],
        ]);

        $validatedData['img'] = $request->file('img')->store('gallery');

        Galery::create($validatedData);

        return to_route('dashboard.galleries.index')->with('success', 'Berhasil menambah gambar baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function show(Galery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function edit(Galery $gallery)
    {
        return view('dashboard.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galery $gallery)
    {
        $rules = [
            'type' => ['required', Rule::in(['slideshow', 'column'])],
        ];

        if ($request->file('img')) $rules['img'] = ['required', File::types(['jpg', 'jpeg', 'png', 'webp'])->max(5 * 1024)];

        $validatedData = $request->validate($rules);

        if ($request->file('img')) {
            $validatedData['img'] = $request->file('img')->store('gallery');
            Storage::delete($gallery->img);
        }

        $gallery->update($validatedData);

        return to_route('dashboard.galleries.index')->with('success', 'Berhasil mengedit gambar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galery $gallery)
    {
        Storage::delete($gallery->img);
        $gallery->delete();

        return to_route('dashboard.galleries.index')->with('success', 'Berhasil menghapus gambar');
    }
}
