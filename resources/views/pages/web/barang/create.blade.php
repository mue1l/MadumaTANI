<x-web-layout title="Create">
    <div class="breadcrumb-area text-center shadow dark-hard bg-fixed text-light"
        style="background-image: url('{{ asset('images/Bg5.jpeg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>Maduma Tani</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/barang') }}"><i class="fas fa-home"></i> Barang</a></li>
                        <li class="active">Tani</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="form-content">
                    <h2 class="text-center">Tambah Alat</h2>
                    <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Barang</label>
                            <div class="col-sm-10">
                                <input name="nama" type="text"
                                    class="form-control @error('nama') is-invalid @enderror" id="nama"
                                    placeholder="Nama Barang" autocomplete="off">
                            </div>
                        </div>
                        @error('nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group row">
                            <label for="jumlah" class="col-sm-2 col-form-label">Stok</label>
                            <div class="col-sm-10">
                                <input name="jumlah" type="number"
                                    class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                                    placeholder="Jumlah Barang" autocomplete="off">
                            </div>
                        </div>
                        @error('jumlah')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group row">
                            <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                    id="gambar"name="gambar">
                            </div>
                        </div>
                        @error('gambar')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="row justify-content-center my-5">
                            <button type="submit" class="px-5 btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-web-layout>
