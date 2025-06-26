<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Kategori;
use App\Models\Buku;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     * Hanya user dengan role 'user' yang bisa akses
     */
    public function __construct()
    {
        $this->middleware(['auth', 'user']);
    }

    /**
     * Show the USER dashboard.
     * Dashboard khusus untuk user biasa (read-only)
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        // Data untuk dashboard user (informasi umum saja)
        $totalKategori = Kategori::count() ?? 0;
        $totalBuku = Buku::count() ?? 0;
        $bukuTerbaru = Buku::with('kategori')->latest()->take(8)->get() ?? collect();

        // Kategori dengan jumlah buku terbanyak
        $kategoriPopuler = DB::table('buku')
            ->join('kategori', 'buku.id_kategori', '=', 'kategori.id')
            ->select('kategori.nama_kategori', 'kategori.id', DB::raw('COUNT(*) as jumlah_buku'))
            ->groupBy('kategori.id', 'kategori.nama_kategori')
            ->orderBy('jumlah_buku', 'desc')
            ->take(5)
            ->get();

        // Data tambahan untuk dashboard
        $bukuTerbanyak = $kategoriPopuler->first()->nama_kategori ?? 'Belum Ada Data';
        $kategoriTerbanyak = $kategoriPopuler->first()->nama_kategori ?? 'Belum Ada Data';

        // Statistik reading untuk user ini
        $userStats = [
            'last_login' => Auth::user()->updated_at ?? now(),
            'total_categories_available' => $totalKategori,
            'total_books_available' => $totalBuku,
        ];

        return view('user.user', compact(
            'totalKategori',
            'totalBuku',
            'bukuTerbaru',
            'kategoriPopuler',
            'userStats',
            'bukuTerbanyak',
            'kategoriTerbanyak'
        ));
    }

    /**
     * View kategori - User hanya bisa melihat daftar kategori
     * Hanya menampilkan data kategori: id, nama_kategori, deskripsi
     */
    public function viewKategori(Request $request)
    {
        $search = $request->get('search');

        // Query sederhana hanya untuk data kategori
        $kategori = Kategori::select('id', 'nama_kategori', 'deskripsi')
            ->when($search, function ($query, $search) {
                return $query->where('nama_kategori', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%");
            })
            ->orderBy('nama_kategori', 'asc')
            ->paginate(10);

        return view('user.kategori', compact('kategori', 'search'));
    }

    /**
     * View buku - User hanya bisa melihat daftar buku
     */
    public function viewBuku(Request $request)
    {
        $search = $request->get('search');
        $kategori_filter = $request->get('kategori');

        $buku = Buku::with('kategori')
            ->when($search, function ($query, $search) {
                return $query->where('judul', 'like', "%{$search}%")
                    ->orWhere('penulis', 'like', "%{$search}%")
                    ->orWhere('isbn', 'like', "%{$search}%");
            })
            ->when($kategori_filter, function ($query, $kategori_filter) {
                return $query->where('id_kategori', $kategori_filter);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $kategori = Kategori::orderBy('nama_kategori', 'asc')->get();

        return view('user.buku', compact('buku', 'kategori', 'search', 'kategori_filter'));
    }
}