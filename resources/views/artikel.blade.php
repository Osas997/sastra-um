<x-layouts.guest>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section id="narasi" class="pt-4">
        @include('components.navbar')

        <div class="m-5 d-flex">
            <div class="narsi-btn" data-index="1">Artike</div>
            <div class="narsi-btn mx-5" data-index="2">Berita</div>
            <div class="narsi-btn" data-index="3">Agenda</div>
        </div>

        <div class="mx-4 my-5 narasi-konten">
            {{-- Artikel --}}
            <div class="narasi-item" data-index="1">
                <div class="row g-3">
                @for ($i = 0; $i < 100; $i++)
                    <div class="col-4">
                    <a href="/artikel-berita-agenda/detail" class="text-decoration-none">
                        <img src="{{ asset('assets/img/berita.png') }}" alt=""
                            class="rounded object-fit-cover w-100" height="200">
                        <h4 class="text-truncate-2 mt-2 berita-title-item text-dark">Keikutsertaan Mahasiswa MPBIKeikutsertaan Mahasiswa MPBIKeikutsertaan Mahasiswa MPBI pada Seminar RIKSA BAHASA...</h4>
                        <p class="m-0 p-0 author-text-item">16 Agustus, 2024</p>
                    </a>
                    </div>
                @endfor
                </div>
            </div>
            {{-- Berita --}}
            <div class="narasi-item" data-index="2">
                <div class="row g-3">
                @for ($i = 0; $i < 100; $i++)
                    <div class="col-4">
                    <a href="/artikel-berita-agenda/detail" class="text-decoration-none">
                        <img src="{{ asset('assets/img/berita.png') }}" alt=""
                            class="rounded object-fit-cover w-100" height="200">
                        <h4 class="text-truncate-2 mt-2 berita-title-item text-dark">Keikutsertaan Mahasiswa MPBIKeikutsertaan Mahasiswa MPBIKeikutsertaan Mahasiswa MPBI pada Seminar RIKSA BAHASA...</h4>
                        <p class="m-0 p-0 author-text-item">16 Agustus, 2024</p>
                    </a>
                    </div>
                @endfor
                </div>
            </div>
            {{-- Agenda --}}
            <div class="narasi-item" data-index="3">
                <div class="row g-3">
                @for ($i = 0; $i < 100; $i++)
                    <div class="col-4">
                    <a href="/artikel-berita-agenda/detail" class="text-decoration-none">
                        <img src="{{ asset('assets/img/berita.png') }}" alt=""
                            class="rounded object-fit-cover w-100" height="200">
                        <h4 class="text-truncate-2 mt-2 berita-title-item text-dark">Keikutsertaan Mahasiswa MPBIKeikutsertaan Mahasiswa MPBIKeikutsertaan Mahasiswa MPBI pada Seminar RIKSA BAHASA...</h4>
                        <p class="m-0 p-0 author-text-item">16 Agustus, 2024</p>
                    </a>
                    </div>
                @endfor
                </div>
            </div>
        </div>
    </section>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const navItems = document.querySelectorAll('.narsi-btn');
  const contentItems = document.querySelectorAll('.narasi-item');

  function showContent(index) {
    // Hapus class active dari semua nav item
    navItems.forEach(item => item.classList.remove('active'));

    // Tambahkan class active ke nav item yang diklik
    const activeNav = document.querySelector(`.narsi-btn[data-index="${index}"]`);
    if (activeNav) activeNav.classList.add('active');

    // Sembunyikan semua konten
    contentItems.forEach(item => item.style.display = 'none');

    // Tampilkan konten yang sesuai index
    const activeContent = document.querySelector(`.narasi-item[data-index="${index}"]`);
    if (activeContent) activeContent.style.display = 'block';
  }

  // Inisialisasi tampilan pertama (misalnya index 1)
  showContent('1');

  // Tambahkan event listener ke semua nav item
  navItems.forEach(item => {
    item.addEventListener('click', function () {
      const index = this.getAttribute('data-index');
      showContent(index);
    });
  });
});
</script>

</x-layouts.guest>
