<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slideshow</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/slideshow.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="breadcrumb-custom">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted">Slideshow</a></li>
                <li class="breadcrumb-item active" aria-current="page">Atur Slideshow</li>
            </ol>
        </nav>

        <!-- Header -->
        <div class="row align-items-center mb-4">
            <div class="col">
                <h4 class="fw-bold mb-0">Atur Slideshow</h4>
            </div>
            <div class="col-auto">
                <button class="btn btn-primary shadow-sm" id="saveBtn">
                    <span class="loading-spinner spinner-border spinner-border-sm me-2" role="status"></span>
                    <i class="fas fa-save me-2"></i> Simpan
                </button>
            </div>
        </div>

        <!-- Alert Messages -->
        <div id="alertContainer"></div>

        <!-- Loading State -->
        <div id="loadingState" class="text-center py-5">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-3 text-muted">Memuat data slideshow...</p>
        </div>

        <!-- Slideshow Grid -->
        <div class="row g-4" id="slideshowGrid" style="display: none;">
            <!-- Upload New Slide akan ditambahkan di sini -->
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold" id="editModalLabel">Edit Slideshow</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" id="slideId" name="id">
                        <div class="mb-3">
                            <label for="slideHeadline" class="form-label fw-semibold">Judul Slide <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="slideHeadline" name="headline"
                                placeholder="Masukkan judul slide (minimal 5 karakter)">
                            <div class="error-text" id="headlineError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="slideDeskripsi" class="form-label fw-semibold">Deskripsi</label>
                            <textarea class="form-control" id="slideDeskripsi" name="deskripsi" rows="3"
                                placeholder="Tambahkan deskripsi"></textarea>
                            <div class="error-text" id="deskripsiError"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Gambar <span class="text-danger">*</span></label>
                            <div class="upload-preview" onclick="selectImage()">
                                <div id="imagePreview">
                                    <i class="fas fa-image fa-3x text-muted"></i>
                                    <p class="text-muted mt-2">Klik untuk pilih gambar</p>
                                    <small class="text-muted">Format: JPG, JPEG, PNG | Maks: 2MB</small>
                                </div>
                            </div>
                            <input type="file" id="imageInput" name="files" accept=".jpg,.jpeg,.png" hidden>
                            <div class="error-text" id="filesError"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="saveSlideBtn">
                        <span class="loading-spinner spinner-border spinner-border-sm me-2" role="status"></span>
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <x-ui.delete-confirm />

    <!-- Toast -->
    <x-ui.boostrap-toast />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/slideshow.js') }}"></script>
</body>

</html>