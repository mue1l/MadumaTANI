<?php

namespace App\Http\Controllers\Web;

use App\Models\Barang;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $barang = Barang::where('nama', 'like', '%' . $request->search . '%')
            ->orWhere('jumlah', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'DESC')
            ->paginate(3);
        return view('pages.web.barang.barang', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.web.barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
        ]);
        $file = $request->file('gambar');
        $namaFile = $file->getClientOriginalName();
        $tujuanFile = 'asset/gambar';

        $file->move($tujuanFile, $namaFile);

        $barang = new Barang;
        $barang->nama = $request->nama;
        $barang->jumlah = $request->jumlah;
        $barang->gambar = $namaFile;

        // dd($request->all());
        $barang->save();
        return redirect('barang')->with('success', 'Barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        return view('pages.web.barang.pinjam1', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        return view('pages.web.barang.edit', ['data' => $barang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $barang)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required',
            'gambar' => 'image|mimes:jpg,png,jpeg,gif,svg'
        ]);
        if ($request->hasfile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = $file->getClientOriginalName();
            $tujuanFile = 'asset/gambar';

            $file->move($tujuanFile, $namaFile);

            Barang::where('id', $barang)->update([
                'nama' => $request->nama,
                'jumlah' => $request->jumlah,
                'gambar' =>  $namaFile,
            ]);
        } else {
            Barang::where('id', $barang)->update([
                'nama' => $request->nama,
                'jumlah' => $request->jumlah,
            ]);
        }

        return redirect("barang")->with('status', 'Barang berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect('barang')->with('success', 'Barang berhasil dihapus');
    }
}
