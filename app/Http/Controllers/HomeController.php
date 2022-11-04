<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Galery;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $news = News::latest()->take(6)->get();
        $galeries = Galery::latest()->where('type', 'column')->get();

        return view('index', compact('news', 'galeries'));
    }

    public function about()
    {
        return view('tentang');
    }

    public function news()
    {
        $news = News::latest()->get();

        return view('berita', compact('news'));
    }

    public function galery()
    {
        $slideshows = Galery::latest()->where('type', 'slideshow')->get();
        $columns = Galery::latest()->where('type', 'column')->get();

        return view('galeri', compact('slideshows', 'columns'));
    }

    public function contact()
    {
        return view('kontak');
    }

    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'subject' => ['required', 'string'],
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'message' => ['required', 'string'],
        ]);

        Contact::create($validatedData);

        return to_route('contact')->with('success', 'Pesanmu berhasil dikirim!');
    }

    public function showNews(News $news)
    {
        return view('show', compact('news'));
    }
}
