<x-web-layout title="Pinjam">
    <div class="breadcrumb-area text-center shadow dark bg-fixed text-light"
        style="background-image: url('{{ asset('images/Bg5.jpeg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>MadumaTani</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/barang') }}"><i class="fas fa-home"></i> Barang</a></li>
                        <li class="active">Tani</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-area default-padding">
        @if (session()->has('success'))
            <div class="row justify-content-center my-2 container-full">
                <div class="alert alert-danger text-center col-lg-5" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="container-full">
            <div class="contact-items">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="form-content">
                            <h2 class="text-center">Pinjam Disini</h2>

                            <form action="{{ route('pinjam.store') }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <div class="form-floating">
                                            <label for="nik">Nama Alat</label>
                                            <input class="form-control" id="nama" name="namaalat"
                                                placeholder="nama alat" type="text"
                                                value="{{ $barang->nama }}"readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <div class="form-floating">
                                            <label for="Stok" class="form-label">Pinjam Alat</label>
                                            <input class="form-control" id="nama" name="jumlah" placeholder="Stok"
                                                type="number" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <div class="form-floating">
                                            <label for="rencana peminjaman">Rencana Peminjaman Barang: </label>
                                            <input class="form-control" id="rencana peminjaman"
                                                name="tanggal_peminjaman" placeholder="rencana peminjaman"
                                                type="date">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <div class="form-floating">
                                            <label for="rencana pemulangan">Rencana Pemulangan Barang: </label>
                                            <input class="form-control" id="rencana pemulangan"
                                                name="tanggal_pemulangan" placeholder="rencana pemulangan"
                                                type="date">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button type="submit" class="px-5 btn btn-primary">Konfirmasi</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-web-layout>
