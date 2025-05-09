<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Megantronik') }}</title>

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Custom Styles -->
        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background-color: #f8f9fa;
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .auth-card {
                max-width: 450px;
                width: 100%;
                padding: 2rem;
                border-radius: 10px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                background-color: #fff;
            }
            .auth-logo {
                text-align: center;
                margin-bottom: 2rem;
            }
            .auth-logo img {
                height: 60px;
            }
            .btn-primary {
                background-color: #0d6efd;
                border-color: #0d6efd;
                padding: 0.5rem 1.5rem;
                font-weight: 500;
            }
            .btn-primary:hover {
                background-color: #0b5ed7;
                border-color: #0a58ca;
            }
            .form-control:focus {
                border-color: #0d6efd;
                box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
            }
            .auth-footer {
                text-align: center;
                margin-top: 2rem;
                color: #6c757d;
                font-size: 0.875rem;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="auth-card">
                        <div class="auth-logo">
                            <a href="{{ route('home') }}">
                                <img src="https://placehold.co/200x80/0066cc/ffffff?text=Megantronik" alt="Megantronik Logo">
                            </a>
                        </div>

                        {{ $slot }}

                        <div class="auth-footer">
                            &copy; {{ date('Y') }} {{ config('app.name', 'Megantronik') }}. All rights reserved.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
