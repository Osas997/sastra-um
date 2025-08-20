let slides = [];
let slideToDelete = null;
const maxSlides = 1;

// Setup CSRF token for AJAX requests
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(document).ready(function () {
    loadCurrentSlideshow();
    setupEventListeners();
});

function loadCurrentSlideshow() {
    $.ajax({
        url: "/cms/slideshow/current",
        type: "GET",
        success: function (response) {
            if (response.data && response.data.length > 0) {
                slides = response.data.map((slide) => ({
                    id: slide.id,
                    headline: slide.headline,
                    deskripsi: slide.deskripsi,
                    image: `/storage/${slide.files}`,
                    files: slide.files,
                }));
            } 

            $("#loadingState").hide();
            $("#slideshowGrid").show();
            renderSlides();
        },
        error: function (xhr, status, error) {
            $("#loadingState").hide();
            $("#slideshowGrid").show();
            showAlert("Gagal memuat data slideshow: " + error, "danger");
            renderSlides();
        },
    });
}

function setupEventListeners() {
    // Save button
    $("#saveBtn").on("click", saveSlideshow);

    // Modal save button
    $("#saveSlideBtn").on("click", saveSlide);

    // Image input change
    $("#imageInput").on("change", handleImageSelect);

    // Form validation
    $("#slideHeadline").on("input", validateHeadline);
    $("#slideDeskripsi").on("input", validateDeskripsi);

    // Delete confirmation button
    $("#buttonDelete").on("click", confirmDeleteSlide);
}

function renderSlides() {
    const grid = $("#slideshowGrid");
    grid.empty();

    for (let i = 0; i < maxSlides; i++) {
        if (slides[i]) {
            // Show existing slide
            grid.append(createSlideElement(slides[i], i));
        } else {
            // Show upload area
            grid.append(createUploadElement(i));
        }
    }
}

function createSlideElement(slide, index) {
    return `
                <div class="${maxSlides === 1 ? 'col-md-12' : 'col-md-6'}">
                    <div class="slide-container">
                        <div class="slide-number">${index + 1}</div>
                        <button class="delete-btn" onclick="deleteSlide(${index}, ${
        slide.id || "null"
    })">
                            <i class="fas fa-trash fa-sm"></i>
                        </button>
                        <img src="${slide.image}" alt="Slide ${
        index + 1
    }" class="slide-image">
                        <div class="camera-icon">
                            <i class="fas fa-camera"></i>
                        </div>
                        <div class="mt-3">
                            <h6 class="fw-bold mb-1">${
                                slide.headline || "Tanpa Judul"
                            }</h6>
                            <p class="text-muted small mb-2">${
                                slide.deskripsi || "Tanpa deskripsi"
                            }</p>
                        </div>
                        <button class="btn btn-primary w-100" onclick="editSlide(${index})">
                            Edit
                        </button>
                    </div>
                </div>
            `;
}

function createUploadElement(index) {
    return `
                <div class="${maxSlides === 1 ? 'col-md-12' : 'col-md-6'}">
                    <div class="upload-area" onclick="addNewSlide(${index})">
                        <div class="upload-icon">
                            <i class="fas fa-image"></i>
                        </div>
                        <h6 class="fw-semibold mb-2">Unggah gambar, atau <span class="text-primary">telusuri</span></h6>
                        <p class="text-muted small mb-0">Ukuran 1920×1080px diperbolehkan dalam format PNG atau JPG saja.</p>
                        <button class="btn btn-primary mt-3">Tambah</button>
                    </div>
                </div>
            `;
}

function addNewSlide() {
    if (slides.length >= maxSlides) {
        showAlert("Maksimal " + maxSlides + " slide diperbolehkan", "warning");
        return;
    }

    // Reset form
    $("#editForm")[0].reset();
    $("#slideId").val("");
    $("#imagePreview").html(`
                <i class="fas fa-image fa-3x text-muted"></i>
                <p class="text-muted mt-2">Klik untuk pilih gambar</p>
                <small class="text-muted">Format: JPG, JPEG, PNG | Maks: 2MB</small>
            `);

    // Clear errors
    $(".error-text").text("");

    // Show modal
    $("#editModalLabel").text("Tambah Slide Baru");
    $("#editModal").modal("show");
}

function editSlide(index) {
    const slide = slides[index];

    // Populate form
    $("#slideId").val(slide.id || "");
    $("#slideHeadline").val(slide.headline || "");
    $("#slideDeskripsi").val(slide.deskripsi || "");

    // Show image preview
    $("#imagePreview").html(`
                <img src="${slide.image}" class="img-fluid rounded" style="max-height: 200px;">
                <div class="mt-2">
                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeImage()">
                        <i class="fas fa-trash me-1"></i> Hapus
                    </button>
                </div>
            `);

    // Clear errors
    $(".error-text").text("");

    // Show modal
    $("#editModalLabel").text("Edit Slideshow");
    $("#editModal").modal("show");
}

function deleteSlide(index, slideId) {
    slideToDelete = { index: index, id: slideId };
    $("#modalDelete").modal("show");
}

function confirmDeleteSlide() {
    if (!slideToDelete) return;

    const { index, id } = slideToDelete;

    // If slide has ID (exists in database), delete from server
    if (id) {
        $("#buttonDelete")
            .prop("disabled", true)
            .html(
                '<span class="spinner-border spinner-border-sm me-2"></span>Menghapus...'
            );

        $.ajax({
            url: `/cms/slideshow/${id}`,
            type: "DELETE",
            success: function (response) {
                $("#modalDelete").modal("hide");
                showAlert("Slide berhasil dihapus", "success");

                // Reload page after successful delete
                setTimeout(() => {
                    window.location.reload();
                }, 1500);
            },
            error: function (xhr, status, error) {
                showAlert("Gagal menghapus slide: " + error, "danger");
                $("#buttonDelete").prop("disabled", false).text("Ya, Hapus!");
            },
        });
    } else {
        // Just remove from local array if no ID
        slides.splice(index, 1);
        renderSlides();
        $("#modalDelete").modal("hide");
        showAlert("Slide berhasil dihapus", "success");
    }

    slideToDelete = null;
}

function selectImage() {
    $("#imageInput").click();
}

function handleImageSelect(event) {
    const file = event.target.files[0];
    if (!file) return;

    // Validate file
    if (!validateImageFile(file)) return;

    // Show preview
    const reader = new FileReader();
    reader.onload = function (e) {
        $("#imagePreview").html(`
                    <img src="${e.target.result}" class="img-fluid rounded" style="max-height: 200px;">
                    <div class="mt-2">
                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeImage()">
                            <i class="fas fa-trash me-1"></i> Hapus
                        </button>
                    </div>
                `);
    };
    reader.readAsDataURL(file);
}

function removeImage() {
    $("#imageInput").val("");
    $("#imagePreview").html(`
                <i class="fas fa-image fa-3x text-muted"></i>
                <p class="text-muted mt-2">Klik untuk pilih gambar</p>
                <small class="text-muted">Format: JPG, JPEG, PNG | Maks: 2MB</small>
            `);
}

function validateImageFile(file) {
    const allowedTypes = ["image/jpeg", "image/jpg", "image/png"];
    const maxSize = 2 * 1024 * 1024; // 2MB

    if (!allowedTypes.includes(file.type)) {
        $("#filesError").text(
            "Format file tidak didukung. Gunakan JPG, JPEG, atau PNG."
        );
        return false;
    }

    if (file.size > maxSize) {
        $("#filesError").text("Ukuran file terlalu besar. Maksimal 2MB.");
        return false;
    }

    $("#filesError").text("");
    return true;
}

function validateHeadline() {
    const headline = $("#slideHeadline").val().trim();
    if (headline.length < 5) {
        $("#headlineError").text("Judul minimal 5 karakter.");
        return false;
    }
    $("#headlineError").text("");
    return true;
}

function validateDeskripsi() {
    const deskripsi = $("#slideDeskripsi").val().trim();
    if (deskripsi.length > 500) {
        $("#deskripsiError").text("Deskripsi maksimal 500 karakter.");
        return false;
    }
    $("#deskripsiError").text("");
    return true;
}

function saveSlide() {
    // Validate form
    const isHeadlineValid = validateHeadline();
    const isDeskripsiValid = validateDeskripsi();
    const imageFile = $("#imageInput")[0].files[0];
    const slideId = $("#slideId").val();

    // Check if image is required (for new slides or if current slide has no image)
    let isImageValid = true;
    if (!slideId && !imageFile) {
        $('#filesError').text('Gambar wajib diupload.');
        isImageValid = false;
    } else if (imageFile && !validateImageFile(imageFile)) {
        isImageValid = false;
    } else {
        $("#filesError").text("");
    }

    if (!isHeadlineValid || !isDeskripsiValid || !isImageValid) {
        return;
    }

    // Show loading
    $("#saveSlideBtn .loading-spinner").show();
    $("#saveSlideBtn").prop("disabled", true);

    const headline = $("#slideHeadline").val().trim();
    const deskripsi = $("#slideDeskripsi").val().trim();

    if (!slideId) {
        // Add new slide to local array
            const reader = new FileReader();
            reader.onload = function (e) {
                slides.push({
                    headline: headline,
                    deskripsi: deskripsi,
                    image: e.target.result,
                    files: imageFile,
                    isNew: true,
                });
                renderSlides();
                $("#editModal").modal("hide");

                // Hide loading
                $("#saveSlideBtn .loading-spinner").hide();
                $("#saveSlideBtn").prop("disabled", false);
            };

            reader.readAsDataURL(imageFile);
    } else {
        // Update existing slide in local array
        const index = slides.findIndex((slide) => slide.id == slideId);
        if (index !== -1) {
            slides[index].headline = headline;
            slides[index].deskripsi = deskripsi;
            slides[index].isModified = true;

            if (imageFile) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    slides[index].image = e.target.result;
                    slides[index].files = imageFile;
                    renderSlides();
                    $("#editModal").modal("hide");

                    // Hide loading
                    $("#saveSlideBtn .loading-spinner").hide();
                    $("#saveSlideBtn").prop("disabled", false);
                };
                reader.readAsDataURL(imageFile);
            } else {
                renderSlides();
                $("#editModal").modal("hide");

                // Hide loading
                $("#saveSlideBtn .loading-spinner").hide();
                $("#saveSlideBtn").prop("disabled", false);
            }
        }
    }
}

function saveSlideshow() {
    if (slides.length === 0) {
        showAlert("Tambahkan minimal 1 slide sebelum menyimpan", "warning");
        return;
    }

    if(slides.length > maxSlides){
        showAlert("Maksimal " + maxSlides + " slide diperbolehkan", "warning");
        return;
    }

    // Show loading
    $("#saveBtn .loading-spinner").show();
    $("#saveBtn").prop("disabled", true);

    // Prepare FormData
    const formData = new FormData();

    slides.forEach((slide, index) => {
        if (slide.id) {
            formData.append(`slides[${index}][id]`, slide.id);
        }
        formData.append(`slides[${index}][headline]`, slide.headline || "");
        formData.append(`slides[${index}][deskripsi]`, slide.deskripsi || "");

        // Only append file if it's new or modified
        if (slide.files instanceof File) {
            formData.append(`slides[${index}][files]`, slide.files);
        }
    });

    // Send AJAX request
    $.ajax({
        url: "/cms/slideshow",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            showAlert("Slideshow berhasil disimpan", "success");

            // Reload data from server
            setTimeout(() => {
                loadCurrentSlideshow();
            }, 1000);
        },
        error: function (xhr, status, error) {
            let errorMessage = "Gagal menyimpan slideshow";

            if (xhr.responseJSON && xhr.responseJSON.errors) {
                const errors = xhr.responseJSON.errors;
                const firstError = Object.values(errors)[0];
                errorMessage = Array.isArray(firstError)
                    ? firstError[0]
                    : firstError;
            } else if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            }

            showAlert(errorMessage, "danger");
        },
        complete: function () {
            // Hide loading
            $("#saveBtn .loading-spinner").hide();
            $("#saveBtn").prop("disabled", false);
        },
    });
}

function showAlert(message, type) {
    const alertClass =
        type === "success"
            ? "text-bg-success"
            : type === "warning"
            ? "text-bg-warning"
            : "text-bg-danger";

    $("#toast").find(".toast-body").text(message);
    $("#toast").addClass(alertClass);
    $("#toast").toast("show");

    // Auto dismiss after 3 seconds for success messages
    if (type === "success") {
        setTimeout(() => {
            $("#toast").toast("hide");
        }, 3000);
    }
}

// Drag and drop functionality
$(document).on("dragover", ".upload-area", function (e) {
    e.preventDefault();
    $(this).addClass("border-primary bg-light");
});

$(document).on("dragleave", ".upload-area", function (e) {
    e.preventDefault();
    $(this).removeClass("border-primary bg-light");
});

$(document).on("drop", ".upload-area", function (e) {
    e.preventDefault();
    $(this).removeClass("border-primary bg-light");

    const files = e.originalEvent.dataTransfer.files;
    if (files.length > 0) {
        const file = files[0];
        if (validateImageFile(file)) {
            // Trigger add new slide with this file
            addNewSlide();
            // Set the file to input
            const dt = new DataTransfer();
            dt.items.add(file);
            $("#imageInput")[0].files = dt.files;
            handleImageSelect({ target: { files: [file] } });
        }
    }
});

// Hide modal loading on modal hide
$("#editModal").on("hidden.bs.modal", function () {
    $("#saveSlideBtn .loading-spinner").hide();
    $("#saveSlideBtn").prop("disabled", false);
});

// Hide delete modal loading on modal hide
$("#modalDelete").on("hidden.bs.modal", function () {
    $("#buttonDelete").prop("disabled", false).text("Ya, Hapus!");
    slideToDelete = null;
});
