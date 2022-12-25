<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::latest()->paginate(10);

        return view('dashboard.news.index', compact('news'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.news.create');
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
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'excerpt' => ['required', 'string'],
            'hero_img' => ['required', File::types(['jpg', 'jpeg', 'png', 'webp'])->max(5 * 1024)],
            'img_2' => ['required', File::types(['jpg', 'jpeg', 'png', 'webp'])->max(5 * 1024)],
            'img_3' => ['required', File::types(['jpg', 'jpeg', 'png', 'webp'])->max(5 * 1024)],
        ]);

        $validatedData['excerpt'] = str($request->excerpt)->limit(252);
        $validatedData['subcapt'] = str(strip_tags($request->content))->limit(200);
        $validatedData['slug'] = str($request->title)->slug() . '-' . str()->random(5);

        $validatedData['hero_img'] = $request->file('hero_img')->store('upload');
        $validatedData['img_2'] = $request->file('img_2')->store('upload');
        $validatedData['img_3'] = $request->file('img_3')->store('upload');

        News::create($validatedData);

        return to_route('dashboard.news.index')->with('success', 'Berhasil menambah berita baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('dashboard.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $rules = [
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
        ];

        if ($request->file()) {
            foreach ($request->file() as $key => $value) {
                $rules[$key] = [File::types(['jpg', 'jpeg', 'png', 'webp'])->max(5 * 1024)];
            }
        }

        $validatedData = $request->validate($rules);

        $validatedData['excerpt'] = str(strip_tags($request->content))->limit(200);
        $validatedData['slug'] = str($request->title)->slug() . '-' . str()->random(5);

        if ($request->file()) {
            foreach ($request->file() as $key => $value) {
                $validatedData[$key] = $request->file($key)->store('upload');
                Storage::delete($news[$key]);
            }
        }

        $news->update($validatedData);

        return to_route('dashboard.news.index')->with('success', 'Berhasil mengedit berita');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        Storage::delete($news->hero_img);
        Storage::delete($news->img_2);
        Storage::delete($news->img_3);
        $news->delete();

        return to_route('dashboard.news.index')->with('success', 'Berhasil menghapus berita');
    }
}
