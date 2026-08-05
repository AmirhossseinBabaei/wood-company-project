<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('modules/auth/css/login.css') }}">
</head>
<body>

<section class="login-page">
    <div id="particles"></div>
    <div class="container position-relative z-2">
        <div class="container">

            <div class="row justify-content-center align-items-center min-vh-100">

                <div class="col-xl-4 col-lg-5 col-md-6 col-12">
                    <div class="login-card">
                        <div class="text-center mb-4">
                            <div class="logo">
                                <i class="bi bi-person"></i>
                            </div>

                            <h2 class="fw-bold mt-3">
                                {{ __('Auth::words.welcome') }}
                            </h2>

                            <p class="text-muted">
                                {{ __('Auth::words.sign_in') }}
                            </p>

                        </div>

                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif

                        @if(session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-danger">{{ session('success') }}</div>
                        @endif

                        <form method="post" action="{{ route('auth.login')  }}">
                            @csrf
                            <div class="mb-3">

                                <label class="form-label">
                                    {{ __('Auth::words.email') }}
                                </label>

                                <input type="email" name="email" class="form-control" placeholder="example@gmail.com">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">
                                    {{ __('Auth::words.password') }}
                                </label>
                                <div class="password-box">
                                    <input name="password" id="password" type="password" class="form-control"
                                           placeholder="{{ __('Auth::words.password') }}">
                                    <button type="button" onclick="showPassword()">
                                        👁
                                    </button>
                                </div>
                            </div>
                            <button type="submit" class="btn login-btn w-100">
                                {{ __('Auth::words.login') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="module" src="script.js"></script>
<script>
    function showPassword() {

        let pass = document.getElementById("password");


        if (pass.type === "password") {
            pass.type = "text";
        }
        else {
            pass.type = "password";
        }

    }
</script>
</body>
</html>
