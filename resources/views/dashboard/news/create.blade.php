@extends('adminlte::page')

@section('title', 'Create Berita')

@section('content_header')
    <h1>Create Berita</h1>
@stop

@section('plugins.BsCustomFileInput', true)

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('dashboard.news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-adminlte-input name="title" type="text" label="Title" enable-old-support="true" />
                <x-adminlte-input-file name="hero_img" label="Hero Image" placeholder="Choose a file..." />
                <div class="row">
                    <x-adminlte-input-file name="img_2" label="Image 2" fgroup-class="col-md-6"
                        placeholder="Choose a file..." />
                    <x-adminlte-input-file name="img_3" label="Image 3" fgroup-class="col-md-6"
                        placeholder="Choose a file..." />
                </div>
                <input id="content" type="hidden" name="content" value="{{ old('content') }}">
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
