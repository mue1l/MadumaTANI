<?php

namespace App\Http\Controllers\Web;

use App\Models\Barang;
use App\Models\Peminjaman;
use App\Http\Requests\StoreEdukasiRequest;
use App\Http\Requests\UpdateEdukasiRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::user()->role=="admin"){
            $search = $request->search;
            $pinjam = Peminjaman::where('nama', 'like', '%' . $request->search . '%')
            ->orWhere('alamat', 'like', '%' . $request->search . '%')
            ->orWhere('namaalat', 'like', '%' . $request->search . '%')
            ->orWhere('jumlah', 'like', '%' . $request->search . '%')
            ->orWhere('status', 'like', '%' . $request->search . '%')
            ->orWhere('tanggal_peminjaman', 'like', '%' . $request->search . '%')
            ->orWhere('tanggal_pemulangan', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'DESC')
            ->paginate(4);
            return view('pages.web.pinjam.peminjaman',compact('pinjam'));
        }else{
            $barang = Barang::paginate(10);
            return view('pages.web.pinjam.peminjaman',compact('barang'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang=Barang::where('nama', $request->namaalat)->first();
        // dd($barang);
        $request->validate([
            'namaalat' => 'required',
            'jumlah' => 'required',
            'tanggal_peminjaman' => 'required',
            'tanggal_pemulangan' => 'required'
        ]);

        if($request->jumlah > $barang->jumlah){
            return back()->with('success', 'Stok yang tersedia kurang');
        }
        else{
            $pinjam=new Peminjaman;
            $pinjam->nama= auth::user()->name;
            $pinjam->alamat= auth::user()->alamat;
            $pinjam->namaalat= $request->namaalat;
            $pinjam->jumlah= $request->jumlah;
            $pinjam->tanggal_peminjaman= $request->tanggal_peminjaman;
            $pinjam->tanggal_pemulangan= $request->tanggal_pemulangan;
            $pinjam->status='pending';
            $pinjam->user_id=Auth::user()->id;
            $pinjam->save();
            return redirect('barang')->with('success', 'Permintaan pinjaman anda dikirim');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::where('id',$id)->first();
        return view('pages.web.pinjam.pinjam1',compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
       //
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
        //
    }

    public function destroy(Barang $barang)
    {
        //
    }

    public function terima(Peminjaman $pinjam)
    {
        $pinjam->status='terima';
        $pinjam->pemberitahuan='Permintaan Peminjaman Anda Diterima , Silahkan kembalikan barang Tepat Waktu Keterlambatan Pengembalian Barang Akan dikenakan Denda';
        $pinjam->update();
        $barang = Barang::where('nama', $pinjam->namaalat)->first();
        $barang->jumlah = $barang->jumlah - $pinjam->jumlah;
        $barang->update();
        return redirect('pinjam')->with('success', 'Permintaan pinjaman anda dikirim');
    }

    public function tolak(Peminjaman $pinjam)
    {
        $pinjam->status='tolak';
        $pinjam->pemberitahuan='Permintaan Peminjaman Anda Ditolak';
        $pinjam->update();
        return redirect('pinjam')->with('success', 'Permintaan pinjaman anda dikirim');
    }

    public function denda(Peminjaman $pinjam)
    {
        $pinjam->status='denda';
        $pinjam->pemberitahuan='Anda dikenakan denda, silahkan hubungi pengurus tani untuk konfirmasi jumlah denda yang dikenakan';
        $pinjam->update();
        return redirect('pinjam')->with('success', 'Permintaan pinjaman anda dikirim');
    }
}
