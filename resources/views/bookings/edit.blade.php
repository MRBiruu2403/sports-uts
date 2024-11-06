@extends('layouts.app')

@section('content')
    <h1 class="text-center mb-5">Edit Pemesanan</h1>

    <div class="form-container mx-auto">
        <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="user_id">Pengguna:</label>
                <select class="form-control" id="user_id" name="user_id" required>
                    <option value="">Pilih Pengguna</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $booking->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="facility_id">Fasilitas:</label>
                <select class="form-control" id="facility_id" name="facility_id" required>
                    <option value="">Pilih Fasilitas</option>
                    @foreach($facilities as $facility)
                        <option value="{{ $facility->id }}" {{ $facility->id == $booking->facility_id ? 'selected' : '' }}>{{ $facility->name }}</option>
                    @endforeach
                </select>
                @error('facility_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="booking_date">Tanggal Pemesanan:</label>
                <input type="date" class="form-control" id="booking_date" name="booking_date" value="{{ old('booking_date', $booking->booking_date) }}" required>
                @error('booking_date')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="start_time">Waktu Mulai:</label>
                <input type="time" class="form-control" id="start_time" name="start_time" value="{{ old('start_time', $booking->start_time) }}" required>
                @error('start_time')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="end_time">Waktu Selesai:</label>
                <input type="time" class="form-control" id="end_time" name="end_time" value="{{ old('end_time', $booking->end_time) }}" required>
                @error('end_time')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="">Pilih Status</option>
                    <option value="pending" {{ old('status', $booking->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ old('status', $booking->status) == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="canceled" {{ old('status', $booking->status) == 'canceled' ? 'selected' : '' }}>Canceled</option>
                </select>
                @error('status')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-block mt-4">Perbarui Pemesanan</button>
        </form>
    </div>
@endsection

<style>
    .form-container {
        max-width: 500px;
        padding: 2rem;
        border-radius: 8px;
        background-color: #f9f9f9;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 1.8rem;
        color: #333;
    }

    .form-group label {
        font-weight: bold;
        color: #555;
    }

    .form-control {
        height: 45px;
        font-size: 1rem;
        border-radius: 6px;
        border: 1px solid #ccc;
        padding: 0 0.75rem;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        border-color: #5c6bc0;
        box-shadow: 0px 0px 4px rgba(92, 107, 192, 0.3);
    }

    .btn-primary {
        background-color: #5c6bc0;
        border-color: #5c6bc0;
        font-size: 1.1rem;
        padding: 0.6rem;
        border-radius: 6px;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #3949ab;
    }

    .text-center {
        text-align: center;
    }

    .mb-5 {
        margin-bottom: 2rem;
    }

    .mt-4 {
        margin-top: 1.5rem;
    }

    .text-danger {
        font-size: 0.85rem;
    }
</style>
