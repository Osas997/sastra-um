<x-layouts.guest>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section id="hero" style="background-image: url('/assets/img/background.png');" class="pt-4 d-flex flex-column">
        <nav class="navbar navbar-expand-lg bg-light mx-5 ">
            <div class="container-fluid justify-content-between">
                <a class="navbar-brand" href="#">
                    <div class="d-flex">
                        <img src="{{ asset('assets/img/Lambang-UM 1.svg') }}" alt="">
                        <img src="{{ asset('assets/img/Logo Sastra.svg') }}" alt="" class="mx-3">
                        <img src="{{ asset('assets/img/logo.svg') }}" alt="">
                    </div>
                </a>
                {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup"> --}}
                <div class="navbar-nav">
                    <a href="" class="text-dark text-decoration-none">
                        <div class="contact-btn d-flex align-items-center px-3 py-2">
                            <img src="{{ asset('assets/img/whatsapp.svg')}}" alt="" class="me-2">
                            <div class="fw-semibold">Contact Us</div>
                        </div>
                    </a>
                        <div class="menu-btn d-flex align-items-center px-3 py-2 ms-3">
                            <div class="fw-semibold">Menu</div>
                            <img src="{{ asset('assets/img/menu.svg')}}" alt="" class="ms-2">
                        </div>
                </div>
                </div>
            </div>
        </nav>

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
                    <div class="col-md-6 input-sastra -5">
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
    </section>

</x-layouts.guest>
