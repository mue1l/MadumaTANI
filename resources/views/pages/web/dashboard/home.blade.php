<x-web-layout title="Home">
    <div class="banner-area content-less text-center">
        <div id="bootcarousel" class="carousel large-text text-light slide carousel-fade animate_text" data-ride="carousel">
            <div class="carousel-inner carousel-zoom">
                <div class="carousel-item active">
                    <div class="slider-thumb bg-fixed" style="background-image: url('{{ ('images/Bg3.jpeg') }}')"></div>
                    <div class="box-table">
                        <div class="box-cell shadow dark-hard">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="content">
                                            <h3 data-animation="animated zoomInRight">Maduma Tani</h3>
                                            <h2 data-animation="animated fadeInUp">Kelompok Maduma Tani adalah sebuah organisasi yang didirikan oleh masyarakat di desa sipituhuta, berdiri pada tahun 2018. Kelompok Tani ini dibangun untuk kelangsungan pertanian guna meningkatkan pendapatan. Struktur organisasinya terdiri dari Ketua, wakil ketua, sekretaris, dan bendahara.</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <div class="slider-thumb bg-fixed" style="background-image: url('{{ ('images/Bg4.jpeg') }}')"></div>
                    <div class="box-table">
                        <div class="box-cell shadow dark-hard">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="content">
                                            <h3 data-animation="animated slideInLeft">Maduma Tani</h3>
                                            <h2 data-animation="animated slideInRight">Visi: Meningkatkan hasil tani dengan kualitas dan mutu yang berkualitas.  <br>Misi: Memproduktifkan lahan pertanian, menambah pengetahuan sistem Pertanian.</h2>
                                            <div class="button animated fadeInUp">
                                                <a class="btn btn-gradient green circle effect btn-md" href="{{ url('/pengurus') }}">Pengurus MadumaTani</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="left carousel-control shadow light" href="#bootcarousel" data-slide="prev">
                <i class="ti-angle-left"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control shadow light" href="#bootcarousel" data-slide="next">
                <i class="ti-angle-right"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</x-web-layout>