<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Connexion | LaraBarber</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

        <style>
            :root {
                --primary-color: #4e73df;
                --secondary-color: #224abe;
                --glass-bg: rgba(255, 255, 255, 0.9);
            }

            body {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                font-family: 'Poppins', sans-serif;
                margin: 0;
                padding: 20px;
            }

            .login-container {
                background: var(--glass-bg);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                border-radius: 24px;
                box-shadow: 0 20px 40px rgba(0,0,0,0.2);
                width: 100%;
                max-width: 420px;
                padding: 40px;
                border: 1px solid rgba(255, 255, 255, 0.3);
            }

            .brand-logo {
                width: 70px;
                height: 70px;
                background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
                border-radius: 18px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 20px;
                color: white;
                font-size: 32px;
                box-shadow: 0 10px 20px rgba(78, 115, 223, 0.3);
            }

            .login-header h2 {
                font-weight: 700;
                color: #2d3436;
                margin-bottom: 5px;
            }

            .form-label {
                color: #636e72;
                margin-bottom: 8px;
            }

            .input-group-text {
                background-color: #f8f9fa;
                border-right: none;
                color: #b2bec3;
            }

            .form-control {
                border-radius: 12px;
                padding: 12px 15px;
                border-left: none;
                background-color: #f8f9fa;
                font-size: 0.95rem;
            }

            .form-control:focus {
                box-shadow: none;
                border-color: #dee2e6;
                background-color: #fff;
            }

            .input-group:focus-within .input-group-text {
                border-color: var(--primary-color);
                color: var(--primary-color);
            }

            .input-group:focus-within .form-control {
                border-color: var(--primary-color);
            }

            .btn-login {
                background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
                border: none;
                border-radius: 12px;
                padding: 14px;
                font-weight: 600;
                color: white;
                transition: all 0.3s ease;
                margin-top: 10px;
            }

            .btn-login:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 20px rgba(78, 115, 223, 0.4);
                opacity: 0.9;
            }

            .invalid-feedback {
                font-size: 0.8rem;
                margin-top: 5px;
            }

            /* Responsive adjustments */
            @media (max-width: 480px) {
                .login-container {
                    padding: 30px 20px;
                }
            }
        </style>
    </head>
    <body>

        <div class="login-container">
            <div class="login-header text-center">
                <div class="brand-logo">
                    <i class="bi bi-scissors"></i>
                </div>
                <h2>LaraBarber</h2>
                <p class="text-muted small mb-4">Accédez à votre espace de gestion</p>
            </div>


            <form action="{{ route('login') }}" method="POST">

                @csrf

                @if (session('error'))
                    <div class="alert alert-danger border-0 small py-2 animate__animated animate__shakeX">
                        <i class="bi bi-exclamation-circle me-2"></i> {{ session('error') }}
                    </div>
                @endif

                @if(session('success'))
                    <div id="success-alert" class="alert alert-success alert-dismissible fade show border-0 shadow-sm text-center py-3 mt-4 fs-6" role="alert">
                        <strong><i class="bi bi-check-circle-fill me-2"></i></strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <div class="mb-3">
                    <label for="email" class="form-label small fw-bold text-uppercase">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="exemple@mail.com" value="{{ old('email') }}" required autofocus>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label small fw-bold text-uppercase">Mot de passe</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="••••••••" required>
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember">
                        <label class="form-check-label small text-muted" for="remember">Rester connecté</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 btn-login">
                    SE CONNECTER
                </button>
            </form>

            <div class="text-center mt-4">
                <p class="small text-muted mb-0">LaraBarber v1.0 &copy; 2026</p>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>