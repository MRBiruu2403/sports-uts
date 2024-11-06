<!-- resources/views/facility/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Daftar Fasilitas</h1>

    <!-- Tombol Tambah Fasilitas -->
    <a href="{{ route('facilities.create') }}" class="btn btn-primary mb-3">Tambah Fasilitas Baru</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabel Daftar Fasilitas -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Fasilitas</th>
                <th>Deskripsi</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($facilities as $facility)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $facility->name }}</td>
                    <td>{{ $facility->description }}</td>
                    <td>{{ $facility->location }}</td>
                    <td>
                        <a href="{{ route('facilities.edit', $facility->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('facilities.destroy', $facility->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus fasilitas ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada fasilitas yang tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
