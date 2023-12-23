<?php

namespace App\Http\Controllers\Web;

use App\Models\ProyekTani;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
class ProyekTaniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $proyekTani = ProyekTani::where('judul', 'like', '%' . $request->search . '%')
        ->orderBy('id', 'DESC')
        ->paginate(2);
        // $search = $request->search;
        // $proyekTani = ProyekTani::orderBy('id','DESC')->when($search, function ($query, $search){
        //     return $query->where('judul','like',"%{$search}%");
        // })->paginate(2);
        return view('pages.web.proyekTani.proyekTani',compact('proyekTani'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.web.proyekTani.create');
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

        $proyekTani=new ProyekTani;
        $proyekTani->judul= $request->judul;
        $proyekTani->gambar= $namaFile;
        $proyekTani->deskripsi= $request->deskripsi;
        $proyekTani->save();
        return redirect('proyekTani')->with('success', 'proyek Tani berhasil ditambahkan');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Edukasi  $edukasi
     * @return \Illuminate\Http\Response
     */
    public function show(ProyekTani $proyekTani)
    {
        return view('pages.web.proyekTani.proyekTani1',compact('proyekTani'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Edukasi  $edukasi
     * @return \Illuminate\Http\Response
     */
    public function edit(ProyekTani $proyekTani)
    {
        return view('pages.web.proyekTani.edit',['data'=>$proyekTani]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEdukasiRequest  $request
     * @param  \App\Models\Edukasi  $edukasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $proyekTani)
    {
        $request->validate([
            'judul' =>'required',
            'deskripsi' =>'required',
            'gambar' => 'image|mimes:jpg,png,jpeg,gif,svg'
        ]);
        if($request->hasfile('gambar')){
            $file = $request->file('gambar');
            $namaFile = $file->getClientOriginalName();
            $tujuanFile = 'asset/gambar';
    
            $file->move($tujuanFile, $namaFile);
    
            ProyekTani::where('id',$proyekTani)->update([
                'judul' => $request->judul,
                'gambar' =>  $namaFile,
                'deskripsi' =>  $request->deskripsi
            ]);
        }else{
            ProyekTani::where('id',$proyekTani)->update([
                'judul' => $request->judul,
                'deskripsi' =>  $request->deskripsi
            ]);
        }

        return redirect("proyekTani")->with('status','proyek Tani berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Edukasi  $edukasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProyekTani $proyekTani)
    {
        $proyekTani->delete();
        return redirect('proyekTani')->with('success', 'proyek Tani berhasil dihapus');
    }
}
