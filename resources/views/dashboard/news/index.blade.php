@extends('adminlte::page')

@section('title', 'Berita')

@section('content_header')
    <h1>Berita</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('dashboard.news.create') }}" class="btn btn-primary">Create</a>
            <div class="card-tools">
                {{ $news->links() }}
            </div>
        </div>
        <div class="card-body p-0">
            @if (session()->has('success'))
                <div class="alert alert-success my-3 mx-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Title</th>
                        <th style="width:165px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($news as $new)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $new->title }}</td>
                            <td>
                                <a href="{{ route('dashboard.news.edit', $new->id) }}" class="btn btn-warning me-2">Edit</a>
                                <form class="d-inline-block" method="POST"
                                    action="{{ route('dashboard.news.destroy', $new->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="999">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
