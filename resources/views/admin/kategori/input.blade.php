@extends('layouts.admin')

@section('content')
    <h1>Edit Kategori: {{ $kategori->judul }}</h1>

    <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Untuk mengupdate data -->

        <div class="form-group">
            <label for="judul">Judul Kategori</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $kategori->judul }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
