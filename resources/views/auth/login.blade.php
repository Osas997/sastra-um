<x-layouts.guest :title="$title">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,100..900&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            background-image: url("{{ asset('assets/img/bg-login.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
        }


        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0) 37.4%, rgba(0, 0, 0, 0.8) 80.78%);
            z-index: 0;
        }

        body::after {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(20, 20, 20, 0.55);
            backdrop-filter: blur(2px);
            -webkit-backdrop-filter: blur(2px);
            z-index: 1;
        }


        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            max-width: 1112px;
            width: 100%;
            min-height: 585px;
            display: flex;
            z-index: 2;
        }

        .logo-section {
            background: #FFCF00;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 83px 91px;
            position: relative;
            max-width: 548px;
            width: 100%;
        }

        .university-logo {
            width: 306px;
            height: 318px;
        }

        .university-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
        }

        .faculty-title {
            margin-bottom: 24px;
            text-align: center;
            z-index: 2;
            position: relative;
        }

        .form-section {
            flex: 1;
            padding: 39px 24px;
            display: flex;
            gap: 70px;
            flex-direction: column;
            justify-content: center;
        }

        #username.form-control {
            margin-bottom: 24px;
        }

        #password.form-control {
            margin-bottom: 70px;
        }

        .form-group {
            position: relative;
            max-width: 516px;
            width: 100%;
        }

        .form-control {
            width: 100%;
            height: 60px;
            border-radius: 30px;
            border: 1px solid #FFCF00;
            padding: 18px 26px;
            font-size: 14px;
            font-weight: 500;
        }

        .form-control:focus {
            border-color: #FFCF00;
            box-shadow: none;
        }

        .form-control:not(:placeholder-shown) {
            color: #C2C2C2;
            font-weight: 400;
            line-height: 100%;
        }

        /* label placeholder */
        .form-placeholder {
            position: absolute;
            top: 50%;
            left: 26px;
            transform: translateY(-50%);
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            font-weight: 400;
            color: #C2C2C2;
            pointer-events: none;
            transition: opacity 0.2s ease;
        }

        .form-control:focus+.form-placeholder,
        .form-control:not(:placeholder-shown)+.form-placeholder {
            opacity: 0;
        }

        /* Untuk Chrome, Safari, Edge */
        input[type="password"]::-ms-reveal,
        input[type="password"]::-ms-clear,
        input[type="password"]::-webkit-credentials-auto-fill-button,
        input[type="password"]::-webkit-textfield-decoration-container,
        input[type="password"]::-webkit-clear-button,
        input[type="password"]::-webkit-password-toggle-button {
            display: none !important;
            appearance: none !important;
        }

        /* Untuk Firefox */
        input[type="password"]::-moz-password-toggle {
            display: none !important;
        }

        .password-toggle {
            position: absolute;
            right: 26px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: none;
            cursor: pointer;
            font-size: 24px;
            color: #C2C2C2;
        }


        .login-btn {
            background: #022512;
            border: none;
            border-radius: 30px;
            padding: 18px 26px;
            color: white;
            font-size: 14px;
            font-weight: 400;
        }

        .login-btn:hover {
            background: linear-gradient(135deg, #1e3a1a 0%, #022512 100%);
            box-shadow: 0 5px 15px rgba(45, 90, 39, 0.4);
            color: white;
        }

        @media (max-width: 768px) {
            .login-card {
                flex-direction: column;
                max-width: 400px;
            }

            .logo-section {
                padding: 30px 20px;
            }

            .university-logo {
                width: 80px;
                height: 80px;
            }

            .faculty-title {
                margin-bottom: 12px;
            }

            .form-section {
                gap: 32px;
                padding: 30px;
            }

            #password.form-control {
                margin-bottom: 32px;
            }
        }

        .position-relative {
            position: relative;
        }
    </style>

    <div class="login-container">
        <div class="login-card">
            <!-- Logo Section -->
            <div class="logo-section">
                <div class="university-logo">
                    <img src="{{ asset('assets/img/logo-sastra-um.png') }}" alt="">
                </div>
                <h2 class="faculty-title fw-semibold fs-1">Fakultas Sastra</h2>
                <p class="university-name mb-0">Universitas Negeri Malang</p>
            </div>

            <!-- Form Section -->
            <div class="form-section">
                <h3 class="fw-medium fs-3 m-0">Selamat Datang di Fakultas Sastra Universitas Negeri Malang</h3>

                <form id="loginForm" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="text" id="username" class="form-control" placeholder=" " required>
                        <label for="username" class="form-placeholder">
                            <svg width="24" height="24" viewBox="1 0 24 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.125 20.75C6.125 20.75 4.75 20.75 4.75 19.375C4.75 18 6.125 13.875 13 13.875C19.875 13.875 21.25 18 21.25 19.375C21.25 20.75 19.875 20.75 19.875 20.75H6.125Z"
                                    fill="#C2C2C2" />
                                <path
                                    d="M13 12.5C15.2782 12.5 17.125 10.6532 17.125 8.375C17.125 6.09683 15.2782 4.25 13 4.25C10.7218 4.25 8.875 6.09683 8.875 8.375C8.875 10.6532 10.7218 12.5 13 12.5Z"
                                    fill="#C2C2C2" />
                            </svg>
                            Username
                        </label>
                    </div>

                    <div class="form-group mb-3">
                        <input type="password" id="password" class="form-control" placeholder=" " required>
                        <label for="password" class="form-placeholder">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20 12C20 10.897 19.103 10 18 10H17V7C17 4.243 14.757 2 12 2C9.243 2 7 4.243 7 7V10H6C4.897 10 4 10.897 4 12V20C4 21.103 4.897 22 6 22H18C19.103 22 20 21.103 20 20V12ZM9 7C9 5.346 10.346 4 12 4C13.654 4 15 5.346 15 7V10H9V7Z"
                                    fill="#C2C2C2" />
                            </svg>
                            Password
                        </label>
                        <button type="button" class="password-toggle" onclick="togglePassword()">
                            <i class="bi bi-eye-slash" id="toggleIcon"></i>
                        </button>
                    </div>


                    <button type="submit" class="login-btn btn w-100">
                        Masuk
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            }
        }
    </script>
</x-layouts.guest>