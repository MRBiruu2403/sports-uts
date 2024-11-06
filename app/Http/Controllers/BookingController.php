<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Models\Facility;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Menampilkan daftar semua pemesanan
    public function index()
    {
        $bookings = Booking::with(['user', 'facility'])->get(); // Mengambil semua pemesanan beserta relasinya
        return view('bookings.index', compact('bookings')); // Menampilkan view dengan data pemesanan
    }

    // Menampilkan form untuk membuat pemesanan baru
    public function create()
    {
        $users = User::all(); // Mengambil semua pengguna
        $facilities = Facility::all(); // Mengambil semua fasilitas
        return view('bookings.create', compact('users', 'facilities')); // Menampilkan form dengan data pengguna dan fasilitas
    }

    // Menyimpan pemesanan yang baru
    public function store(Request $request)
    {
        // Validasi inputan form
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'facility_id' => 'required|exists:facilities,id',
            'booking_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'status' => 'required|in:pending,confirmed,canceled'
        ]);

        // Tentukan data yang boleh di-assign
        $validatedData = $request->only(['user_id', 'facility_id', 'booking_date', 'start_time', 'end_time']);
        $validatedData['status'] = $request->input('status', 'pending'); // Menetapkan status default jika tidak diinput

        // Simpan pemesanan
        Booking::create($validatedData);

        // Redirect ke halaman daftar pemesanan dengan pesan sukses
        return redirect()->route('bookings.index')->with('success', 'Pemesanan berhasil dibuat.');
    }

    // Menampilkan detail pemesanan
    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking')); // Menampilkan detail pemesanan
    }

    // Menampilkan form untuk mengedit pemesanan
    public function edit(Booking $booking)
    {
        $users = User::all(); // Mengambil semua pengguna
        $facilities = Facility::all(); // Mengambil semua fasilitas
        return view('bookings.edit', compact('booking', 'users', 'facilities')); // Menampilkan form edit dengan data pemesanan, pengguna dan fasilitas
    }

    // Memperbarui pemesanan
    public function update(Request $request, Booking $booking)
    {
        // Validasi inputan form
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'facility_id' => 'required|exists:facilities,id',
            'booking_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'status' => 'required|in:pending,confirmed,canceled'
        ]);

        // Update data pemesanan dengan inputan yang valid
        $booking->update($request->only(['user_id', 'facility_id', 'booking_date', 'start_time', 'end_time', 'status']));

        // Redirect ke halaman daftar pemesanan dengan pesan sukses
        return redirect()->route('bookings.index')->with('success', 'Pemesanan berhasil diperbarui.');
    }

    // Menghapus pemesanan
    public function destroy(Booking $booking)
    {
        // Hapus pemesanan
        $booking->delete();

        // Redirect ke halaman daftar pemesanan dengan pesan sukses
        return redirect()->route('bookings.index')->with('success', 'Pemesanan berhasil dihapus.');
    }
}
