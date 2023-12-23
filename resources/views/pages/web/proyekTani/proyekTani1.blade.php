<x-web-layout title="Selengkapnya">
    <div class="breadcrumb-area text-center shadow dark-hard bg-fixed text-light" style="background-image: url('{{asset('images/Bg5.jpeg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>Maduma Tani</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/proyekTani') }}"><i class="fas fa-home"></i>Proyek Tani</a></li>
                        <li class="active">Tani</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-area single full-blog full-blog default-padding">
        <div class="container">
            <div class="blog-items">
                <div class="row">
                    <div class="blog-content wow fadeInUp col-lg-10 offset-lg-1 col-md-12">
                        <div class="item">
                            <div class="blog-item-box">
                                <div class="thumb">
                                    <img src="{{ asset('asset/gambar/'.$proyekTani->gambar) }}" alt="{{ $proyekTani->judul }}" width="100%" height="350">
                                </div>
                                <div class="info">
                                    <h3>{{ $proyekTani->judul }}</h3>
                                    <p>
                                        <p>{!! $proyekTani->deskripsi !!}</p>                                         
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-web-layout>