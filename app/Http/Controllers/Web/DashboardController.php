<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.web.dashboard.home');
    }

    public function edukasi()
    {
        return view('pages.web.edukasi.edukasi');
    }

    public function edukasi1()
    {
        return view('pages.web.edukasi..edukasi1');
    }
    public function pengurus()
    {
        return view('pages.web.dashboard.pengurus');
    }
    public function contact()
    {
        return view('pages.web.contact.contact');
    }
    public function proyektani()
    {
        return view('pages.web.proyek.proyektani');
    }
    public function peminjaman()
    {
        return view('pages.web.pinjam.peminjaman');
    }
    public function barang()
    {
        return view('pages.web.barang.barang');
    }
}