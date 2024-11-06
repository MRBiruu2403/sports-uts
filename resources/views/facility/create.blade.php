<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen</title>
</head>
<body>
    <!-- resources/views/facilities/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Tambah Fasilitas Baru</h1>

    <form action="{{ route('facilities.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="location">Lokasi:</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection

</body>
</html>
