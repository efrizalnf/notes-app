<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Apps</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
</head>

<body class="container">
    <h1>TODO LIST ME</h1>
    <div class="recyclebin">
        <a href="{{ route('recycle_bin') }}">Tong sampah</a>
    </div>
    <table cellpadding="10" border="1" class="table">
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
    <a href="{{ route('add-note') }}" rel="noopener noreferrer">Tambah</a>
</body>

</html>