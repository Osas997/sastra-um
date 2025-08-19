<x-layouts.guest>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- Hero --}}
    <section id="hero" style="background-image: url('/assets/img/Artboard11.svg');" class="pt-4 d-flex flex-column">
        @include('components.navbar')
        <div class="flex-grow-1 d-flex flex-column justify-content-center">
                <div class="mx-5">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="d-inline-flex rounded-pill align-items-center border border-dark border-2 px-2">
                                <div class="dot me-2"></div>
                                <span>#ceritasegalarasa</span>
                            </div>
                            <h1 class="fw-bold mt-3" style="font-size: 64px;">
                                Telusuri makna, imaji, dan gaya dalam setiap kata.
                            </h1>
                        </div>
                        <div class="col-md-6 input-sastra p-5">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle dropdown-toggle-lp w-100 d-flex align-items-center justify-content-between border-none rounded-pill" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Pilih Jenis Kamar Data
                                        <img src="{{ asset('assets/img/iconDropdown.svg')}}" alt="">
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown my-4">
                                    <button class="btn btn-secondary dropdown-toggle dropdown-toggle-lp w-100 d-flex align-items-center justify-content-between border-none rounded-pill" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Pilih Kategori
                                        <img src="{{ asset('assets/img/iconDropdown.svg')}}" alt="">
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                                    <button type="submit" class="w-100 border-0 search-kamar-btn text-center fw-semibold text-light py-4 rounded-pill">
                                        Telusuri sekarang
                                    </button>
                        </div>
                    </div>
                </div>
        </div>
        <div class="row g-3 mx-5">
            <div class="col-md-4">
                <div class="d-flex align-items-center">
                    <div class="p-3 data-img-container me-3">
                        <img src="{{ asset('assets/img/messages.svg') }}" alt="">
                    </div>
                    <span class="fw-semibold" style="font-size: 48px">166</span>
                </div>
                <h3 class="data-title mt-3 fw-semibold">Konotatif</h3>
                <p class="data-desc">Temukan makna tersembunyi di balik setiap diksi konotatif yang menggetarkan rasa.</p>
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-center">
                    <div class="p-3 data-img-container me-3">
                        <img src="{{ asset('assets/img/eye.svg') }}" alt="">
                    </div>
                    <span class="fw-semibold" style="font-size: 48px">196</span>
                </div>
                <h3 class="data-title mt-3 fw-semibold">Citraan</h3>
                <p class="data-desc">Urai setiap citraan yang memvisualkan perasaan dalam karya sastra.</p>
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-center">
                    <div class="p-3 data-img-container me-3">
                        <img src="{{ asset('assets/img/messages.svg') }}" alt="">
                    </div>
                    <span class="fw-semibold" style="font-size: 48px">201</span>
                </div>
                <h3 class="data-title mt-3 fw-semibold">Gaya Bahasa</h3>
                <p class="data-desc">Telusuri majas dan gaya bahasa yang membentuk keindahan kekuatan narasi.</p>
            </div>
        </div>
    </section>

    {{-- Selanyang Pandang --}}
    <section id="selayang-pandang" class="m-5">
        <div class="selayang-pandang-container">
            <div class="row g-3">
                <div class="col-md-4 d-flex flex-column justify-content-between">
                    <h4 class="fw-semibold">Selanyang Pandang</h4>
                    <img src="{{ asset('assets/img/Thumnail.svg') }}" alt="" class="img-fluid w-50">
                </div>
                <div class="col-md-8">
                    <p style="font-size: 32px">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    </p>
                        <div class="selayang-pandang-btn d-flex justify-content-between my-5 px-4 py-3" data-bs-toggle="modal" data-bs-target="#selayangModal">
                            Lihat Detail
                            <img src="{{ asset('assets/img/arrow-right.svg') }}" alt="">
                        </div>
                    <div class="selayang-pandang-name">
                        <h4 class="fw-semibold p-0 m-0">Prof. Dr. Yuni Pratiwi, M.Pd.</h4>
                        <p class="fw-normal p-0 m-0">Ketua Tim Peneliti Fakultas Sastra Universitas Negeri Malang</p>
                        <p class="fw-lighter p-0 m-0">2022 - Sekarang</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Selayang Modal --}}
        <div class="modal fade" id="selayangModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-body">
                <h2 class="fw-bold">Selayang Pandang</h2>
                <div class="mt-3">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
                <img src="{{ asset('assets/img/selanyang.svg') }}" alt="" class="mt-4">
                <div class="selayang-pandang-name mt-4">
                        <h4 class="fw-semibold p-0 m-0">Prof. Dr. Yuni Pratiwi, M.Pd.</h4>
                        <p class="fw-normal p-0 m-0">Ketua Tim Peneliti Fakultas Sastra Universitas Negeri Malang</p>
                        <p class="fw-lighter p-0 m-0">2022 - Sekarang</p>
                    </div>
            </div>
            </div>
        </div>
        </div>
    </section>

    {{-- Tentang Kamar --}}
    <section id="tentang-kamar" class="m-5">
        <div class="tentang-vid d-flex align-items-center justify-content-center position-relative" style="height: 500px;">
            <img src="{{ asset('assets/img/tentang-vid.jpg') }}"
                alt=""
                class="w-100 h-100 object-fit-cover object-position-center rounded">
            <div class="vid-btn d-flex align-items-center justify-content-center position-absolute top-50 start-50 translate-middle p-3 fw-semibold text-white">
                Tentang Kami
                <img src="{{ asset('assets/img/video-circle.svg') }}" class="ms-2" alt="">
            </div>
        </div>
        <div class="my-5">
            <h1 class="fw-semibold">Kamar Data, Ruang <br> Eksplorasi Makna</h1>
            <p>Kamar Data adalah ruang yang memungkinkan siapa saja untuk menyelami makna kata dari sisi sastra, yang disajikan lengkap dengan pemaknaan konotatif, citraan, dan gaya bahasa, agar bahasa tak hanya dipahami, tapi juga dialami.</p>
        </div>
        <div class="jenis-kamar-data">
            <div class="row g-3">
                <div class="col-md-4">
                    <a href="/kamar-data?index=1" class="text-decoration-none">
                        <div class="position-relative jenis-kamar-item">
                            <img src="{{ asset('assets/img/konotatif.jpg') }}" alt="" class="jenis-item-bg">

                            <div class="overlay"></div>
                            <span class="position-absolute bottom-0 start-0 text-white p-3">Konotatif</span>

                            <div class="overlay-hover position-absolute justify-content-end text-white p-3 h-100 flex-column hidden">
                                <h3 class="mb-4">Mengungkap makna di luar makna leksikal</h3>
                                <div class="d-flex align-items-center">
                                    Telusuri
                                    <img src="{{ asset('assets/img/arrow-right-white.svg')}}"
                                        alt=""
                                        style="width:20px; height:20px;" class="ms-2">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="/kamar-data?index=2" class="text-decoration-none">
                        <div class="position-relative jenis-kamar-item">
                            <img src="{{ asset('assets/img/citraan.jpg') }}" alt="" class="jenis-item-bg">

                            <div class="overlay"></div>
                            <span class="position-absolute bottom-0 start-0 text-white p-3">Citraan</span>

                            <div class="overlay-hover position-absolute justify-content-end text-white p-3 h-100 flex-column hidden">
                                <h3 class="mb-4">Menangkap unsur visual, auditif, hingga kinestetik</h3>
                                <div class="d-flex align-items-center">
                                    Telusuri
                                    <img src="{{ asset('assets/img/arrow-right-white.svg')}}"
                                        alt=""
                                        style="width:20px; height:20px;" class="ms-2">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="/kamar-data?index=3" class="text-decoration-none">
                        <div class="position-relative jenis-kamar-item">
                            <img src="{{ asset('assets/img/gayaBahasa.jpg') }}" alt="" class="jenis-item-bg">

                            <div class="overlay"></div>
                            <span class="position-absolute bottom-0 start-0 text-white p-3">Gaya Bahasa</span>

                            <div class="overlay-hover position-absolute justify-content-end text-white p-3 h-100 flex-column hidden">
                                <h3 class="mb-4">Menampilkan bentuk retoris dan majas yang menyertainya.</h3>
                                <div class="d-flex align-items-center">
                                    Telusuri
                                    <img src="{{ asset('assets/img/arrow-right-white.svg')}}"
                                        alt=""
                                        style="width:20px; height:20px;" class="ms-2">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Narasi --}}
    <section id="narasi" class="mx-5 my-5">
        <h1 class="fw-semibold">Narasi Kami, Cerita <br> Sastra</h1>
        <div class="d-flex align-items-center justify-content-between">
            <p>Dari ruang kampus hingga ruang baca Anda, kami berbagi cerita, ulasan, <br> dan refleksi yang merawat semangat sastra dan literasi Indonesia.</p>
            <a href="/artikel-berita-agenda" class="text-decoration-none">
                <div class="d-flex align-items-center narasi-btn px-3 py-2">
                    Selengkapnya
                    <img src="{{ asset('assets/img/arrow-right.svg')}}" alt="" style="width:20px; height:20px;" class="ms-2">
                </div>
            </a>
        </div>

<div class="row mt-4 g-3 align-items-stretch berita-container ">
    <!-- Kolom kiri -->
    <div class="col-md-8 h-100">
        <div class="w-100 h-100 position-relative">
            <img src="{{ asset('assets/img/berita.png') }}"
            alt=""
            class="w-100 h-100 object-fit-cover border rounded position-absolute">
            <div class="position-absolute bottom-0 start-0 p-4">
                <h4 class="fw-semibold w-75 text-white">HMD Sastra Indonesia Sukses Gelar LENTERA 2025, cetak Maha...</h4>
                <p class="m-0 p-0 author-text-item">16 Agustus, 2024</p>
            </div>
        </div>
    </div>
    <!-- Kanan -->
    <div class="col-md-4 d-flex flex-column gap-3 h-100 berita-wrapper">
        <!-- berita-item -->
        <div class="berita-item d-flex flex-grow-1 align-items-center">
            <div class="col-4 p-0 h-100">
                <img src="{{ asset('assets/img/berita.png') }}"
                    class="w-100 h-100 object-fit-cover border rounded">
            </div>
            <div class="col-8 ms-3 d-flex flex-column">
                <h4 class=" berita-title-item text-truncate-3">
                    Judul berit...
                </h4>
                    <p class="m-0 p-0 author-text-item">16 Agustus, 2024</p>
            </div>
        </div>
        <div class="berita-item d-flex flex-grow-1 align-items-center">
            <div class="col-4 p-0 h-100">
                <img src="{{ asset('assets/img/berita.png') }}"
                    class="w-100 h-100 object-fit-cover border rounded">
            </div>
            <div class="col-8 ms-3 d-flex flex-column">
                <h4 class="berita-title-item text-truncate-3">
                    Judul berita pertama pertamapertamapertamapertamapertama...
                </h4>
                <p class="m-0 p-0 author-text-item">16 Agustus, 2024</p>
            </div>
        </div>
        <div class="berita-item d-flex flex-grow-1 align-items-center">
            <div class="col-4 p-0 h-100">
                <img src="{{ asset('assets/img/berita.png') }}"
                    class="w-100 h-100 object-fit-cover border rounded">
            </div>
            <div class="col-8 ms-3 d-flex flex-column">
                <h4 class="berita-title-item text-truncate-3">
                    Judul berita pertama pertamapertamapertamapertamapertamapertamapertam apertamapertamapertama...
                </h4>
                    <p class="m-0 author-text-item">16 Agustus, 2024</p>
            </div>
        </div>
        <div class="berita-item d-flex flex-grow-1 align-items-center">
            <div class="col-4 p-0 h-100">
                <img src="{{ asset('assets/img/berita.png') }}"
                    class="w-100 h-100 object-fit-cover border rounded">
            </div>
            <div class="col-8 ms-3 d-flex flex-column">
                <h4 class=" berita-title-item text-truncate-3">
                    Judul berita pertama pertamapertamapertamapertamapertama...
                </h4>
                <p class="m-0 p-0 author-text-item">16 Agustus, 2024</p>
            </div>
        </div>
    </div>
</div>
</section>

{{-- FAQ --}}
<section id="faq" class="my-5 p-5">
    <div class="">
        <h4 class="fw-semibold">Isu yang Sering Ditanya</h4>
        <div class="mt-5">
            <div class="border-bottom pb-4 mb-4 row justify-content-between align-items-center d-flex">
                <div class="col-md-3 fw-semibold">
                    (01)
                </div>
                <div class="col-md-6">
                    <h4 class="fw-semibold">Apa itu Rumah Data Sastra?</h4>
                </div>
                <div class="col-md-3 align-items-center justify-content-end d-flex">
                    <img src="{{ asset('assets/img/add-circle.svg')}}" alt="">
                </div>
            </div>
            <div class="border-bottom pb-4 mb-4 row justify-content-between align-items-center d-flex">
                <div class="col-md-3 fw-semibold">
                    (02)
                </div>
                <div class="col-md-6">
                    <h4 class="fw-semibold">Apakah data di Kamar Data bisa digunakan untuk penelitian?</h4>
                </div>
                <div class="col-md-3 align-items-center justify-content-end d-flex">
                    <img src="{{ asset('assets/img/add-circle.svg')}}" alt="">
                </div>
            </div>
            <div class="border-bottom pb-4 mb-4 row justify-content-between align-items-center d-flex">
                <div class="col-md-3 fw-semibold">
                    (03)
                </div>
                <div class="col-md-6">
                    <h4 class="fw-semibold">Apakah saya bisa mengusulkan kata baru untuk dianalisis?</h4>
                </div>
                <div class="col-md-3 align-items-center justify-content-end d-flex">
                    <img src="{{ asset('assets/img/add-circle.svg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Suara Redaksi --}}
<section class="my-5" id="redaksi">
        <div class="px-5">
            <h4 class="fw-semibold">Suara Dari Redaksi</h4>
             <div class="slider-buttons d-flex justify-content-end">
                    <button class="slide-btn-left" onclick="slideLeft()">
                        <img src="{{ asset('assets/img/arrow-left.svg') }}" alt="">
                    </button>
                    <button class="slide-btn-right" onclick="slideRight()">
                        <img src="{{ asset('assets/img/arrow-right.svg') }}" alt="">
                    </button>
            </div>
        </div>
        <div class="mt-3">
            <div class="slider-redaksi-wrapper">
            <div class="slider-redaksi" id="slider-redaksi">
                <div class="slide-track-redaksi">
                @for ($i = 0; $i < 100; $i++)
                <div class="slide-redaksi border p-4">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('assets/img/redaksi-profile.png') }}" alt="" width="48" height="48" class="object-fit-cover rounded">
                        <div class="ms-2">
                            <h6  class="fw-semibold p-0 m-0 redaksi-title">Yoyok</h6>
                            <P class="p-0 m-0 redaksi-job">Art Director</P>
                        </div>
                    </div>
                    <p class="redaksi-desc">
                        “Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua“
                    </p>
                </div>
                @endfor
                </div>
            </div>
        </div>
</section>

{{-- Footer --}}
@include('components.footer')


<script>
    const slider = document.getElementById('slider-redaksi');

    function slideLeft() {
        console.log("Scroll kiri");
        slider.scrollBy({ left: -220, behavior: 'smooth' });
    }

    function slideRight() {
        console.log("Scroll kanan");
        slider.scrollBy({ left: 220, behavior: 'smooth' });
    }

    document.getElementById("year").textContent = new Date().getFullYear();

</script>
</x-layouts.guest>
