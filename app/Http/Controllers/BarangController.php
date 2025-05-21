<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class BarangController extends Controller
{
    //
    public function index(): View
    {
        // get all barang
        $barangs = Barang::latest()->paginate(5);

        // menampilkan data barang
        return view('barangs.index', compact('barangs'));
    }

    public function create(): View
    {
        return view('barangs.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // validate form
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'harga_satuan' => 'required|numeric',
            'jumlah' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        // upload gambar
        $image = $request->file('foto');
        $image->storeAs('barangs', $image->hashName());

        //create barang
        Barang::create([
            'nama_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'harga_satuan' => $request->harga_satuan,
            'jumlah' => $request->jumlah,
            'foto' => $image->hashName()
        ]);

        // redirect to index
        return redirect()->route('barangs.index')->with('success', 'Barang berhasil ditambahkan');
    }

    public function show(string $id): View
    {
        // get barang by id
        $barang = Barang::findOrFail($id);

        // menampilkan data barang
        return view('barangs.show', compact('barang'));
    }

    public function edit(string $id): View
    {
        // get barang by id
        $barang = Barang::findOrFail($id);

        // menampilkan data barang
        return view('barangs.edit', compact('barang'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'harga_satuan' => 'required|numeric',
            'jumlah' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        // get barang by id
        $barang = Barang::findOrFail($id);

        // cek jika ada gambar diupload
        if($request->hasFile('foto')){
            // delete old image
            Storage::delete('barangs/'.$barang->foto);

            // upload new image
            $image = $request->file('foto');
            $image->storeAs('barangs', $image->hashName());

            // update barang
            $barang->update([
                'nama_barang' => $request->nama_barang,
                'deskripsi' => $request->deskripsi,
                'harga_satuan' => $request->harga_satuan,
                'jumlah' => $request->jumlah,
                'foto' => $image->hashName()
            ]);


        } else {
            // update barang without image
            $barang->update([
                'nama_barang' => $request->nama_barang,
                'deskripsi' => $request->deskripsi,
                'harga_satuan' => $request->harga_satuan,
                'jumlah' => $request->jumlah,
            ]);
        }

        // redirect to index
        return redirect()->route('barangs.index')->with('success', 'Barang berhasil diupdate');

    }

    public function destroy($id) : RedirectResponse
    {
        // get barang by id
        $barang = Barang::findOrFail($id);

        // delete image
        Storage::delete('barangs/'. $barang->foto);

        // delete barang
        $barang->delete();

        // redirect to index
        return redirect()->route('barangs.index')->with('success', 'Barang berhasil dihapus');
    }
}
