@extends('layout.template')
@section('container')
<div class="container mt-2">
    <h1 class="has-text-centered h1 is-size-1">TAMBAH NOTES</h1>
    <form method="POST" action="{{ request()->routeIs('add-note') ? route('save-note') : route('save-edit-note', $data->id)}}" class="field">
        <div class="title">
            <label class="label" for="title">
                Title
            </label>
            <input class="input" type="text" id="title" name="title" value="{{ request()->routeIs('edit-note') ? $data->title : ''}}">
        </div>
        <div class="content">
            <label class="label" for="">Content</label>
            <textarea class="input" name="content" id="" cols="30" rows="10">{{ request()->routeIs('edit-note') ? $data->content : '' }}</textarea>
        </div>
        @csrf
        @if (request()->routeIs('add-note'))
            @method('POST')
        @elseif (request()->routeIs('edit-note'))
            @method('PUT')
        @endif
        <a href="{{ route('note-lists') }}" class="button is-warning">Kembali</a>
        <input type="submit" value="SUBMIT" class="button is-success">
    </form>
</div>
@endsection