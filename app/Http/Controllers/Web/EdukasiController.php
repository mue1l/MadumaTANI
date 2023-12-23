<?php

namespace App\Http\Controllers\Web;

use App\Models\Edukasi;
use App\Http\Requests\StoreEdukasiRequest;
use App\Http\Requests\UpdateEdukasiRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class EdukasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $search = $request->search;
        $edukasi = Edukasi::where('judul', 'like', '%' . $request->search . '%')
        ->orderBy('id', 'DESC')
        ->paginate(3);
        return view('pages.web.edukasi.edukasi',compact('edukasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.web.edukasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEdukasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'deskripsi' => 'required'
        ]);
        $file = $request->file('gambar');
        $namaFile = $file->getClientOriginalName();
        $tujuanFile = 'asset/gambar';

        $file->move($tujuanFile, $namaFile);

        $edukasi=new Edukasi;
        $edukasi->judul= $request->judul;
        $edukasi->gambar= $namaFile;
        $edukasi->deskripsi= $request->deskripsi;
        $edukasi->save();
        return redirect('edukasi')->with('success', 'Edukasi berhasil ditambahkan');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Edukasi  $edukasi
     * @return \Illuminate\Http\Response
     */
    public function show(Edukasi $edukasi)
    {
        return view('pages.web.edukasi.edukasi1',compact('edukasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Edukasi  $edukasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Edukasi $edukasi)
    {
        return view('pages.web.edukasi.edit',['data'=>$edukasi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEdukasiRequest  $request
     * @param  \App\Models\Edukasi  $edukasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $edukasi)
    {
        $request->validate([
            'judul' =>'required',
            'deskripsi' =>'required',
            'gambar' =>'image|mimes:jpg,png,jpeg,gif,svg'
        ]);
        if($request->hasfile('gambar')){
            $file = $request->file('gambar');
            $namaFile = $file->getClientOriginalName();
            $tujuanFile = 'asset/gambar';
    
            $file->move($tujuanFile, $namaFile);
    
            Edukasi::where('id',$edukasi)->update([
                'judul' => $request->judul,
                'gambar' =>  $namaFile,
                'deskripsi' =>  $request->deskripsi
            ]);
        }else{
            Edukasi::where('id',$edukasi)->update([
                'judul' => $request->judul,
                'deskripsi' =>  $request->deskripsi
            ]);
        }

        return redirect("edukasi")->with('status','Edukasi berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Edukasi  $edukasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Edukasi $edukasi)
    {
        $edukasi->delete();
        return redirect('edukasi')->with('success', 'Edukasi berhasil dihapus');
    }
}
