@extends('layout.template')
@section('container')

<div class="container">
    <h1 class="has-text-centered h1 is-size-1">TODO LIST ME</h1>
    <a href="{{ route('recycle_bin') }}" class="button is-info m-3">Tong sampah</a>
    <a href="{{ route('add-note') }}" rel="noopener noreferrer" class="button is-info m-3">Tambah</a>
    <table cellpadding="10" border="1" class="table is-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Content</th>
            <th>Edit</th>
        </tr>
        @foreach ($notes as $note )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $note->title }}</td>
            <td>{{ $note->content }}</td>
            <td>
            <button class="button is-warning m-3"><a href="{{ route('edit-note', ['id' => $note->id]) }}" rel="noopener noreferrer">Edit</a></button>
            <form method="POST" action="{{ route('delete-note', $note->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="button is-danger" onclick="confirm('Apakah anda yakin mau hapus data?')">Delete</button>  
            </form>
            </td>
        </tr>
        @endforeach
    </table>
    
</div>

@endsection