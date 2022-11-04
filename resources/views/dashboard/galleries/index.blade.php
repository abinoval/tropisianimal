@extends('adminlte::page')

@section('title', 'Galeri')

@section('content_header')
    <h1>Galeri</h1>
@stop

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <a href="{{ route('dashboard.galleries.create') }}" class="btn btn-primary">Create</a>
        <div class="card-tools">
            {{ $galleries->links() }}
        </div>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="dashboard__gallery mt-3">
        @forelse ($galleries as $galery)
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <a href="{{ route('dashboard.galleries.edit', $galery->id) }}"
                                class="btn btn-warning">Edit</a>
                            <form class="d-inline-block" method="POST"
                                action="{{ route('dashboard.galleries.destroy', $galery->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        <span class="badge bg-primary text-bg-primary">{{ $galery->type }}</span>
                    </div>
                </div>
                <div class="card-body">
                    <img class="w-100" src="/storage/{{ $galery->img }}" alt="asdasd">
                </div>
            </div>
        @empty
            <p class="text-center col-12">Tidak ada data</p>
        @endforelse
    </div>
@stop
