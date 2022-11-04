@extends('adminlte::page')

@section('title', 'Edit Berita ' . $news->title)

@section('content_header')
    <h1>Edit Berita {{ $news->title }}</h1>
@stop

@section('plugins.BsCustomFileInput', true)

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('dashboard.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-adminlte-input name="title" type="text" label="Title" enable-old-support="true"
                    value="{{ $news->title }}" />
                <x-adminlte-input-file name="hero_img" label="Hero Image" placeholder="Choose a file..." />
                <div class="row">
                    <x-adminlte-input-file name="img_2" label="Image 2" fgroup-class="col-md-6"
                        placeholder="Choose a file..." />
                    <x-adminlte-input-file name="img_3" label="Image 3" fgroup-class="col-md-6"
                        placeholder="Choose a file..." />
                </div>
                <input id="content" type="hidden" name="content" value="{{ old('content', $news->content) }}">
                <div class="mb-3">
                    <trix-editor input="content" class="@error('content') border border-danger @enderror"></trix-editor>
                    @error('content')
                        <span class="text-danger block">{{ $message }}</span>
                    @enderror
                </div>
                <x-adminlte-button theme='primary' type="submit" label="Submit" />
            </form>
        </div>
    </div>
@stop
