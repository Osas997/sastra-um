<x-layouts.guest>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section id="kamar-data-konotatif" class="min-vh-100 m-5">
        <div class="d-flex justify-content-between align-items-center">
            <a href="/"  class="text-decoration-none">
                <button class="border-0 d-flex align-items-center kamar-data-kembali-btn p-3">
                    <img src="{{ asset('assets/img/arrow-left.svg')}}" alt="" class="me-2">
                    KEMBALI
                </button>
            </a>
            <div class="d-flex">
                <button class="narsi-btn" data-index="1">Konotasi</button>
                <button class="narsi-btn mx-3" data-index="2">Citraan</button>
                <button class="narsi-btn" data-index="3">Gaya Bahasa</button>
            </div>
        </div>
        {{-- konotatif --}}
        <div class="kamar-data-konten mt-5" data-index="1">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="fw-semibold">Konotatif</h2>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle dropdown-toggle-kamar-data w-100 d-flex align-items-center justify-content-between border-none rounded-pill me-5" type="button" data-bs-toggle="dropdown" aria-expanded="false">Pilih Kategori
                    <img src="{{ asset('assets/img/km-data-icon-dropdown.svg')}}" alt="" width="40" height="40" class="ms-5">
                    </button>
                        <ul class="dropdown-menu dropdown-menu-km px-3">
                            <li><a class="dropdown-item dropdown-item-km p-3" href="#">Nomina + Nomina</a></li>
                            <li><a class="dropdown-item dropdown-item-km p-3" href="#">Nomina + Verba</a></li>
                            <li><a class="dropdown-item dropdown-item-km p-3" href="#">Nomina + Adjektiva</a></li>
                            <li><a class="dropdown-item dropdown-item-km p-3" href="#">Nomina + Adverbia</a></li>
                        </ul>
                </div>
            </div>
            <div class="mt-5">
                <input type="text" class="border-0 w-100 py-2 search-kamar-data" placeholder="Tulis kata apapun untuk di telaah...">
                <img src="{{ asset('assets/img/close-circle.svg') }}" alt="" class="toggle-close">
            </div>
            <div class="mt-4">
                <table class="table">
                   <thead class="table-dark kamar-data-thead">
                        <tr class="border-0">
                            <th class="text-center align-middle">No</th>
                            <th class="text-center align-middle">Nomina</th>
                            <th class="text-center align-middle">Nomina</th>
                            <th class="text-center align-middle">Kata Konotatif</th>
                            <th class="text-center align-middle">Contoh<br>Penggunaan</th>
                            <th class="text-center align-middle">Makna</th>
                            <th class="text-center align-middle">Fungsi</th>
                            <th class="text-center align-middle">Konteks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="mb-2">
                            <td class="align-middle">1</td>
                            <td class="align-middle">Udara</td>
                            <td class="align-middle">Teknologi</td>
                            <td class="align-middle">Udara Teknologi</td>
                            <td class="align-middle">Udara Teknologi (Puisi: Di Sebuah Kota Industri Suatu Pagi L.K, Ara)</td>
                            <td class="align-middle">Udara tercemar oleh lembah industri</td>
                            <td class="align-middle">Menggambarkan dampak negatif industri yang tidak dikelola dengan baik</td>
                            <td class="align-middle">Menggambarkan dampak negatif industri yang tidak dikelola dengan baik</td>
                        </tr>
                        {{-- @empty
                                <tr>
                                    <td colspan="8" class="text-center align-middle">
                                        <div class="py-5">
                                            <img src="{{ asset('assets/img/Inbox_empty.svg') }}" alt="">
                                            <h6 class="fw-semibold mt-3" style="color: rgba(9, 0, 46, 1);">Opss! pilih kategori<br> terbih dahulu</h6>
                                        </div>
                                    </td>
                                </tr>
                        @endforelse --}}
                        {{-- @empty
                                <tr>
                                    <td colspan="8" class="text-center align-middle">
                                        Tidak Ada Data
                                    </td>
                                </tr>
                        @endforelse --}}
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Citraan --}}
        <div class="kamar-data-konten mt-5" data-index="2">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="fw-semibold">Citraan</h2>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle dropdown-toggle-kamar-data w-100 d-flex align-items-center justify-content-between border-none rounded-pill me-5" type="button" data-bs-toggle="dropdown" aria-expanded="false">Pilih Kategori
                    <img src="{{ asset('assets/img/km-data-icon-dropdown.svg')}}" alt="" width="40" height="40" class="ms-5">
                    </button>
                        <ul class="dropdown-menu dropdown-menu-km px-3">
                            <li><a class="dropdown-item dropdown-item-km p-3" href="#">Visual</a></li>
                            <li><a class="dropdown-item dropdown-item-km p-3" href="#">Auditori</a></li>
                            <li><a class="dropdown-item dropdown-item-km p-3" href="#">Olfaktori</a></li>
                            <li><a class="dropdown-item dropdown-item-km p-3" href="#">Gustatori</a></li>
                            <li><a class="dropdown-item dropdown-item-km p-3" href="#">Taktil</a></li>
                            <li><a class="dropdown-item dropdown-item-km p-3" href="#">Kinestik</a></li>
                            <li><a class="dropdown-item dropdown-item-km p-3" href="#">Organik</a></li>
                        </ul>
                </div>
            </div>
            <div class="mt-5">
                <input type="text" class="border-0 w-100 py-2 search-kamar-data" placeholder="Tulis kata apapun untuk di telaah...">
                <img src="{{ asset('assets/img/close-circle.svg') }}" alt="" class="toggle-close">
            </div>
            <div class="mt-4">
                <table class="table">
                   <thead class="table-dark kamar-data-thead">
                        <tr class="border-0">
                            <th class="text-center align-middle">No</th>
                            <th class="text-center align-middle">Lanskap</th>
                            <th class="text-center align-middle">Kategori</th>
                            <th class="text-center align-middle">Data</th>
                            <th class="text-center align-middle">Dominan Sumber/Makna</th>
                            <th class="text-center align-middle">Dominan Target/Fungsi</th>
                            <th class="text-center align-middle">Konteks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="mb-2">
                            <td class="align-middle">1</td>
                            <td class="align-middle">Langit</td>
                            <td class="align-middle">Visual</td>
                            <td class="align-middle">Langit Senja membukakan jendela malam yang bakal masuk ke dalam kamar.... </td>
                            <td class="align-middle">Kesempatan untuk intropeksi dan refleksi mendalam saat malam tiba....</td>
                            <td class="align-middle">Menggambarkan latar waktu manusia untuk dapat merefleksi diri ketika malam tiba</td>
                            <td class="align-middle">Memanfaatkan latar waktu yaitu langit senja untuk....</td>
                        </tr>
                        {{-- @empty
                                <tr>
                                    <td colspan="7" class="text-center align-middle">
                                        <div class="py-5">
                                            <img src="{{ asset('assets/img/Inbox_empty.svg') }}" alt="">
                                            <h6 class="fw-semibold mt-3" style="color: rgba(9, 0, 46, 1);">Opss! pilih kategori<br> terbih dahulu</h6>
                                        </div>
                                    </td>
                                </tr>
                        @endforelse --}}
                        {{-- @empty
                                <tr>
                                    <td colspan="7" class="text-center align-middle">
                                        Tidak Ada Data
                                    </td>
                                </tr>
                        @endforelse --}}
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Gaya Bahasa --}}
        <div class="kamar-data-konten mt-5" data-index="3">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="fw-semibold">Gaya Bahasa</h2>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle dropdown-toggle-kamar-data w-100 d-flex align-items-center justify-content-between border-none rounded-pill me-5" type="button" data-bs-toggle="dropdown" aria-expanded="false">Pilih Kategori
                    <img src="{{ asset('assets/img/km-data-icon-dropdown.svg')}}" alt="" width="40" height="40" class="ms-5">
                    </button>
                        <ul class="dropdown-menu dropdown-menu-km px-3">
                            <li><a class="dropdown-item dropdown-item-km p-3" href="#">Simile</a></li>
                            <li><a class="dropdown-item dropdown-item-km p-3" href="#">Metafora</a></li>
                            <li><a class="dropdown-item dropdown-item-km p-3" href="#">Hiperbola</a></li>
                            <li><a class="dropdown-item dropdown-item-km p-3" href="#">Personifikasi</a></li>
                            <li><a class="dropdown-item dropdown-item-km p-3" href="#">Ironi</a></li>
                            <li><a class="dropdown-item dropdown-item-km p-3" href="#">Paradoks</a></li>
                            <li><a class="dropdown-item dropdown-item-km p-3" href="#">Klimaks</a></li>
                            <li><a class="dropdown-item dropdown-item-km p-3" href="#">Anti Klimaks</a></li>
                            <li><a class="dropdown-item dropdown-item-km p-3" href="#">Litotes</a></li>
                            <li><a class="dropdown-item dropdown-item-km p-3" href="#">Eufemisme</a></li>
                        </ul>
                </div>
            </div>
            <div class="mt-5">
                <input type="text" class="border-0 w-100 py-2 search-kamar-data" placeholder="Tulis kata apapun untuk di telaah...">
                <img src="{{ asset('assets/img/close-circle.svg') }}" alt="" class="toggle-close">
            </div>
            <div class="mt-4">
                <table class="table">
                   <thead class="table-dark kamar-data-thead">
                        <tr class="border-0">
                            <th class="text-center align-middle">No</th>
                            <th class="text-center align-middle">Contoh Kalimat</th>
                            <th class="text-center align-middle">Frasa Kunci</th>
                            <th class="text-center align-middle">Frasa Tipe</th>
                            <th class="text-center align-middle">Makna Kiasa (Simile)</th>
                            <th class="text-center align-middle">Keterangan Konteks/Sumber</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="mb-2">
                            <td class="align-middle">1</td>
                            <td class="align-middle">Langit bagai tenunan tangan gelap coklat tua</td>
                            <td class="align-middle">Bagai tenunan tangan gelap coklat tua</td>
                            <td class="align-middle">Simile</td>
                            <td class="align-middle">Penyair membawakan warna langit yang tertutup mendung sehingga suasana alam menjadi gelap seperti warna coklat tua pada kain tenun Sumba</td>
                            <td class="align-middle">Puisi “Beri Daku Sumba” karya Taufiq Ismali, dalam antologi Malu Aku Jadi Orang Indonesia </td>
                        </tr>
                        {{-- @empty
                                <tr>
                                    <td colspan="6" class="text-center align-middle">
                                        <div class="py-5">
                                            <img src="{{ asset('assets/img/Inbox_empty.svg') }}" alt="">
                                            <h6 class="fw-semibold mt-3" style="color: rgba(9, 0, 46, 1);">Opss! pilih kategori<br> terbih dahulu</h6>
                                        </div>
                                    </td>
                                </tr>
                        @endforelse --}}
                        {{-- @empty
                                <tr>
                                    <td colspan="6" class="text-center align-middle">
                                        Tidak Ada Data
                                    </td>
                                </tr>
                        @endforelse --}}
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    @include('components.footer')

<script>
document.addEventListener("DOMContentLoaded", function () {
  const navItems = document.querySelectorAll('.narsi-btn');
  const contentItems = document.querySelectorAll('.kamar-data-konten');

  function showContent(index) {
    navItems.forEach(item => item.classList.remove('active'));
    const activeNav = document.querySelector(`.narsi-btn[data-index="${index}"]`);
    if (activeNav) activeNav.classList.add('active');

    contentItems.forEach(item => item.style.display = 'none');
    const activeContent = document.querySelector(`.kamar-data-konten[data-index="${index}"]`);
    if (activeContent) activeContent.style.display = 'block';
  }

  // Default index
  let defaultIndex = '1';

  // Ambil parameter dari URL
  const params = new URLSearchParams(window.location.search);
  if (params.has('index')) {
    defaultIndex = params.get('index');
  }

  // Inisialisasi tampilan
  showContent(defaultIndex);

  navItems.forEach(item => {
    item.addEventListener('click', function () {
      const index = this.getAttribute('data-index');
      showContent(index);
    });
  });
});

</script>
</x-layouts.guest>
