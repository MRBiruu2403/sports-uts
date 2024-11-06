<!-- resources/views/bookings/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Detail Pemesanan</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Pengguna:</strong> {{ $booking->user->name }}</p>
            <p><strong>Fasilitas:</strong> {{ $booking->facility->name }}</p>
            <p><strong>Tanggal Pemesanan:</strong> {{ $booking->booking_date }}</p>
            <p><strong>Waktu Mulai:</strong> {{ $booking->start_time }}</p>
            <p><strong>Waktu Selesai:</strong> {{ $booking->end_time }}</p>
            <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
        </div>
    </div>

    <a href="{{ route('bookings.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Pemesanan</a>
@endsection
