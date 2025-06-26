<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Show the welcome page for guests
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        return view('welcome');
    }

    /**
     * Redirect after login based on user role
     */
    public function redirectAfterLogin()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Redirect berdasarkan userType
        if ($user->userType === 'admin') {
            return redirect()->route('admin.dashboard')->with('success', 'Selamat datang, Admin ' . $user->name . '!');
        } elseif ($user->userType === 'user') {
            return redirect()->route('user.dashboard')->with('success', 'Selamat datang, ' . $user->name . '!');
        }

        // Jika role tidak dikenali, logout dan redirect ke login
        Auth::logout();
        return redirect()->route('login')->with('error', 'Role tidak dikenali. Silakan hubungi administrator.');
    }

    /**
     * Redirect to appropriate dashboard based on user role
     */
    public function redirectToDashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if ($user->userType === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->userType === 'user') {
            return redirect()->route('user.dashboard');
        }

        return redirect()->route('login')->with('error', 'Role tidak dikenali.');
    }

    /**
     * Redirect kategori based on user role
     */
    public function redirectKategori()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if ($user->userType === 'admin') {
            return redirect()->route('admin.daftarKategori');
        } elseif ($user->userType === 'user') {
            return redirect()->route('user.daftarKategori');
        }

        return redirect()->route('login')->with('error', 'Role tidak dikenali.');
    }

    /**
     * Redirect buku based on user role
     */
    public function redirectBuku()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if ($user->userType === 'admin') {
            return redirect()->route('admin.daftarBuku');
        } elseif ($user->userType === 'user') {
            return redirect()->route('user.daftarBuku');
        }

        return redirect()->route('login')->with('error', 'Role tidak dikenali.');
    }

    /**
     * Show the ADMIN dashboard.
     * Hanya bisa diakses oleh admin
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminDashboard()
    {
        // Data untuk dashboard admin
        $totalKategori = \App\Models\Kategori::count() ?? 0;
        $totalBuku = \App\Models\Buku::count() ?? 0;
        $bukuTerbaru = \App\Models\Buku::latest()->take(5)->get() ?? collect();

        // Buku Terbanyak - berdasarkan penulis yang diambil dari kolom judul (setelah tanda "-")
        $bukuTerbanyak = DB::table('buku')
            ->select(DB::raw('TRIM(SUBSTRING_INDEX(judul, "-", -1)) as penulis'), DB::raw('COUNT(*) as jumlah'))
            ->groupBy(DB::raw('TRIM(SUBSTRING_INDEX(judul, "-", -1))'))
            ->orderBy('jumlah', 'desc')
            ->first();

        $bukuTerbanyak = $bukuTerbanyak
            ? $bukuTerbanyak->penulis . ' (' . $bukuTerbanyak->jumlah . ')'
            : 'Belum Ada Data';

        // Kategori Terbanyak - kategori yang paling banyak dipakai di tabel buku
        $kategoriTerbanyak = DB::table('buku')
            ->join('kategori', 'buku.id_kategori', '=', 'kategori.id')
            ->select('kategori.nama_kategori', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('kategori.id', 'kategori.nama_kategori')
            ->orderBy('jumlah', 'desc')
            ->first();

        $kategoriTerbanyak = $kategoriTerbanyak
            ? $kategoriTerbanyak->nama_kategori . ' (' . $kategoriTerbanyak->jumlah . ')'
            : 'Belum Ada Data';

        // Statistik tambahan untuk admin
        $totalUsers = \App\Models\User::where('userType', 'user')->count() ?? 0;
        $totalAdmins = \App\Models\User::where('userType', 'admin')->count() ?? 0;

        return view('home', compact(
            'totalKategori',
            'totalBuku',
            'bukuTerbaru',
            'bukuTerbanyak',
            'kategoriTerbanyak',
            'totalUsers',
            'totalAdmins'
        ));
    }
}