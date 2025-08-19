<nav class="navbar navbar-expand-lg bg-light mx-5 ">
            <div class="container-fluid justify-content-between">
                <a class="navbar-brand" href="/">
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
                        <button class="menu-btn border-0 d-flex align-items-center px-3 py-2 ms-3" id="menu-btn">
                            <div class="fw-semibold">Menu</div>
                            <img src="{{ asset('assets/img/menu.svg')}}" alt="" class="ms-2">
                        </button>
                </div>
                </div>
            </div>
        </nav>

<div class="nav-pop-up px-5">
    <div class="d-flex justify-content-around nav-pop-up-container p-4 w-100">
        <a href="#tentang-kamar"class="text-decoration-none">
            <div class="d-flex align-items-center">
            <img src="{{ asset('assets/img/konotatif.jpg') }}" alt="" class="object-fit-cover rounded" width="120" height="56">
            <span class="text-white ms-3">Kamar Data</span>
        </div>
        </a>
        <a href="#narasi" class="text-decoration-none">
            <div class="d-flex align-items-center">
            <img src="{{ asset('assets/img/citraan.jpg') }}" alt="" class="object-fit-cover rounded" width="120" height="56">
            <span class="text-white ms-3">Cerita & Narasi</span>
        </div>
        </a>
        <a href="#redaksi" class="text-decoration-none">
            <div class="d-flex align-items-center">
            <img src="{{ asset('assets/img/gradien.png') }}" alt="" class="object-fit-cover rounded" width="120" height="56">
            <span class="text-white ms-3">Tim Redaksi</span>
        </div>
        </a>
    </div>
</div>


<script>
const menuBtn = document.getElementById("menu-btn");
const navPopUp = document.querySelector(".nav-pop-up");
const navLinks = document.querySelectorAll(".nav-pop-up a");

// Toggle buka/tutup dari tombol
menuBtn.addEventListener("click", function () {
    navPopUp.classList.toggle("show");
});

// Tutup popup ketika klik salah satu link
navLinks.forEach(link => {
    link.addEventListener("click", function () {
        navPopUp.classList.remove("show");
    });
});

// Tutup popup ketika klik area luar (overlay)
navPopUp.addEventListener("click", function (e) {
    if (!e.target.closest(".nav-pop-up-container")) {
        navPopUp.classList.remove("show");
    }
});
</script>


