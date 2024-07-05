<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Grayrids">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('slick/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to bottom, #a8edea, #fed6e3);
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .contact-form {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .section-header {
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }
        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        .toggle-password {
            position: absolute;
            top: 73%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6c757d;
            font-size: 1.2em;
            z-index: 2;
        }
        .form-control {
            padding-right: 35px;
        }
        .alert-danger {
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="contact-form">
        <div class="section-header text-center">
            <h2 class="section-title">Admin Login</h2>
        </div>
        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group position-relative">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <span class="toggle-password fa fa-fw fa-eye-slash"></span>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <form action="{{ route('landing_page') }}">
            <button type="submit" class="btn btn-secondary">Kembali</button>
        </form>
    </div>
    <script src="{{ asset('slick/js/jquery-min.js') }}"></script>
    <script src="{{ asset('slick/js/bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".toggle-password").click(function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).closest(".form-group").find("input"));
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        });
    </script>
</body>
</html>
