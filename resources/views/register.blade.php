<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-page {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f7f9fc;
        }
        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 2rem;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin: 1rem;
        }
        .form-control {
            border-radius: 50px;
        }
        .login-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .login-button {
            width: 100%;
            padding: 0.5rem;
        }
        .login-footer {
            text-align: center;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="login-page">
        <div class="login-container">
            <h2 class="login-header">Register</h2>
            <form action="/register" method="POST">
                @csrf
                <div class="mb-4 position-relative">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" required value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback position-absolute ms-3" style="top: 90%">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4 position-relative">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username" required value="{{ old('username') }}">
                    @error('username')
                    <div class="invalid-feedback position-absolute ms-3" style="top: 90%">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4 position-relative">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" required value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback position-absolute ms-3" style="top: 90%">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4 position-relative">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                    @error('password')
                    <div class="invalid-feedback position-absolute ms-3" style="top: 90%">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-dark rounded-pill mt-2 login-button">Register</button>
            </form>
            <div class="login-footer">
                <p>Already have an account? <a href="/login">Login</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
