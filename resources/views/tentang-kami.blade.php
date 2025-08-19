<x-layouts.guest>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section id="tentang-kami" class="pt-4">
        @include('components.navbar')

        <div class="mx-5">
            <h2 class="fw-semibold mt-5">Struktur Organisasi</h2>
            <div class="d-flex align-item-center justify-content-center w-100 mt-4">
                <img src="{{ asset('assets/img/struktur-organisasi.svg') }}" alt="" class="img-fluid">
            </div>
        </div>
        <div class="mx-3 my-5">
            <h2 class="fw-semibold mt-5">Struktur Organisasi</h2>
            <div class="row g-3">
                @for ($i = 0; $i < 100; $i++)
                    <div class="col-md-3">
                        <img src="{{ asset('assets/img/timRedaksiProfile.jpg') }}" alt="" class="w-100 rounded-top" height="350">
                        <div class="mx-3 mt-3">
                            <h5 class="fw-bold">Prof. Dr. Yuni Pratiwi, M.Pd.</h5>
                            <p class="p-0 m-0">Pemimpin Umum</p>
                            <button class="biodata-redaksi-btn d-inline-flex border-0 px-3 mt-2 py-1"  data-bs-toggle="modal" data-bs-target="#detailTimRedaksiModal">
                                LIHAT DETAIL BIODATA
                                <img src="{{ asset('assets/img/arrow-right.svg') }}" alt="" class="ms-2">
                            </button>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>

        {{-- Detail Tim Redaksi Modal --}}
        <div class="modal fade" id="detailTimRedaksiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body p-5">
                    <div class="row g-3">
                        <div class="col-md-6">
                             <img src="{{ asset('assets/img/timRedaksiProfile.jpg') }}" alt="" class="img-fluid rounded" >
                        </div>
                        <div class="col-md-6">
                            <h1 class="fw-bold">Prof. Dr. Yuni Pratiwi, M.Pd.</h1>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <span class="detail-title">Jabatan</span>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <ul class="p-0 m-0 list-unstyled">
                                        <li>Pemimpin Umum</li>
                                    </ul>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <span class="detail-title">Tugas dan Fungsi</span>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <ul class="ps-2 ms-2">
                                       <li>Bertanggung jawab penuh atas keseluruhan operasional, keuangan, dan keberlanjutan website.
                                       </li>
                                       <li>Biasanya pemilik ide atau ketua tim proyek.</li>
                                    </ul>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <span class="detail-title">Riwayat Pendidikan</span>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <ul class="p-0 m-0 list-unstyled">
                                       <li>S-1 IKIP Malang</li>
                                       <li>S-2 IKIP Malang</li>
                                       <li>S-3 Universitas Negeri Malang </li>
                                    </ul>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <span class="detail-title">Pengalaman</span>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <ul class="ps-2 ms-2">
                                       <li>Ketua Laboratorium Drama</li>
                                       <li>Kepala Pusat Studi Wanita</li>
                                       <li>Kepala Pusat Penelitian Gender</li>
                                       <li>Koordinator Pascasarjana</li>
                                    </ul>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <span class="detail-title">Publikasi Karya</span>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <ul class="p-0 m-0 list-unstyled">
                                       <li>Menulis Kreatif dengan Imaji Fantastis</li>
                                       <li>Teori Drama dan Pembelajarannya</li>
                                       <li>Membaca Estetik Puisi</li>
                                       <li>Metode Penelitian Sastra Lisan Kontekstual</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    @include('components.footer')
</x-layouts.guest>
