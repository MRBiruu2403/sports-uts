@extends('layouts.app')

@section('content')
    <h1>Pemesanan Fasilitas</h1>

    <!-- Tambah Pemesanan -->
    <a href="{{ route('bookings.create') }}" class="btn btn-primary mb-3">Buat Pemesanan Baru</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabel Daftar Pemesanan -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Pengguna</th>
                <th>Fasilitas</th>
                <th>Tanggal Pemesanan</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $booking)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->facility->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->end_time)->format('H:i') }}</td>
                    <td>
                        <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pemesanan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada pemesanan ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
