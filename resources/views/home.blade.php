@extends('layouts.app')

@section('left_navbar')
    <li class="nav-item mr-3">
        <a class="btn btn-primary" href="{{ route('new') }}">Add new note</a>
    </li>
@endsection

@section('content')
    <div class="container">
        <div class="d-flex flex-wrap justify-content-center">
            @foreach ($notes as $note)
                @include('note.card')
            @endforeach
        </div>
    </div>
@endsection
