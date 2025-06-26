<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::with('kategori')->get();
        return view('buku.index', [
            'buku' => $buku
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = \App\Models\Kategori::all();
        return view('buku.create', [
            'kategoris' => $kategoris
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_kategori' => 'required|integer',
            'gambar' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'judul' => 'required|min:5',
            'deskripsi' => 'required|min:10'
        ]);

        //upload image 
        $gambar = $request->file('gambar');
        $gambar->storeAs('buku', $gambar->hashName(), 'public');

        //create buku
        Buku::create([
            'id_kategori' => $request->id_kategori,
            'gambar' => $gambar->hashName(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi
        ]);

        //redirect to index
        return redirect(route('daftarBuku'))->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        $kategoris = \App\Models\Kategori::all();
        $buku = Buku::findOrFail($buku->id);
        return view('buku.edit', [
            'buku' => $buku,
            'kategoris' => $kategoris
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $this->validate($request, [
            'id_kategori' => 'required|integer',
            'gambar' => 'image|mimes:jpeg,jpg,png|max:2048',
            'judul' => 'required|min:5',
            'deskripsi' => 'required|min:10'
        ]);

        //untuk mengambil ID Buku
        $buku = Buku::findOrFail($buku->id);

        //Cek apabila gambar akan di upload
        if ($request->hasFile('gambar')) {

            //upload gambar baru 
            $gambar = $request->file('gambar');
            $gambar->storeAs('buku', $gambar->hashName(), 'public');

            //hapus gambar lama 
            Storage::disk('public')->delete('buku/' . $buku->gambar);

            //update buku dengan gambar baru
            $buku->update([
                'id_kategori' => $request->id_kategori,
                'gambar' => $gambar->hashName(),
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi
            ]);

        } else {

            //update buku tanpa gambar
            $buku->update([
                'id_kategori' => $request->id_kategori,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi
            ]);

        }

        //mengarahkan ke halaman index buku
        return redirect(route('daftarBuku'))->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $buku = Buku::findOrFail($buku->id);

        Storage::disk('public')->delete('buku/' . $buku->gambar);

        $buku->delete();
        return redirect(route('daftarBuku'))->with('success', 'Data Berhasil Dihapus');
    }
}