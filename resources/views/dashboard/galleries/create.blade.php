@extends('adminlte::page')

@section('title', 'Create Galeri')

@section('content_header')
    <h1>Create Galeri</h1>
@stop

@section('plugins.BsCustomFileInput', true)

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('dashboard.galleries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <x-adminlte-input-file name="img" label="Image" fgroup-class="col-md-6"
                        placeholder="Choose a file..." />
                    <x-adminlte-select label="Type" name="type" fgroup-class="col-md-6">
                        <option value="slideshow">Slideshow</option>
                        <option value="column">Column</option>
                    </x-adminlte-select>
                </div>
                <x-adminlte-button theme='primary' type="submit" label="Submit" />
            </form>
        </div>
    </div>
@stop
