<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Login</title>
  </head>
<body class=" landing-header">
<div class="container-fluid">
    <div class="vh-100">
        <div class="row h-100 d-flex justify-content-center align-items-center">
            <div class="col d-flex justify-content-center align-items-center">
                <img class="w-75" src="../assets/vector/vektor-login-register.png" alt="">
            </div>
            <div class="col h-100 bg-white d-flex flex-column overflow-y-auto overflow-x-hidden">
                <h2 class="text-center" style="margin-top: 100px;">Sign In</h2>
                <div class="border rounded-4 m-5 p-4">
                    <form class="mb-3 p-3" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">
                                <h5 class="px-2 mt-3">Email address</h5 class="px-2 mt-3">
                            </label>
                            <input type="email" class="form-control  @error('email') is-invalid @enderror"
                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@gmail.com"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password" id="exampleInputPassword1"
                                placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="exampleInputPassword1" class="form-label">
                                <h3>Password</h3>
                            </label>
                        </div>
                        <div class="mb-3 form-check d-flex justify-content-between">
                            <div class="">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="exampleCheck1"> {{ __('Remember Me') }} </label>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary rounded-pill" style="padding: 10px 40px;">
                            {{ __('Login') }}
                        </button>
                    </form>
                    @if (Route::has('register'))
                        <small class="mt-3">Don't have account? <a
                                href="{{ route('register') }}">{{ __('Register') }}</a></small>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
</body>
</html>

