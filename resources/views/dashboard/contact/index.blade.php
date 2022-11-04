@extends('adminlte::page')

@section('title', 'Contact')

@section('content_header')
    <h1>Contact</h1>
@stop

@section('content')
    <div class="dashboard__gallery mt-3">
        @forelse ($contacts as $contact)
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <span class="badge bg-primary">{{ $contact->email }}</span>
                        <span>{{ $contact->name }}</span>
                    </div>
                </div>
                <div class="card-body">
                    {{ $contact->message }}
                </div>
            </div>
        @empty
            <p class="text-center col-12">Tidak ada data</p>
        @endforelse
    </div>
@stop
