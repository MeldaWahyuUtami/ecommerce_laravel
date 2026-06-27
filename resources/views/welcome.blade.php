<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
    <title>Merch Store</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/templates/user/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/user/css/main.css') }}">
</head>
<body>

@include('sweetalert::alert')

<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">

            <!-- Gambar -->
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="{{ asset('assets/templates/user/img/login.jpg') }}" alt="">
                    <div class="hover">
                        <h4>New to our website?</h4>
                        <p>Join us and create your account now.</p>
                        <a class="primary-btn" href="{{ route('register') }}">
                            Create an Account
                        </a>
                    </div>
                </div>
            </div>

            <!-- SATU FORM LOGIN -->
            <div class="col-lg-6">
                <div class="login_form_inner">

                    <h3>Login</h3>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form class="row login_form" action="{{ route('post.login') }}" method="POST">
                        @csrf

                        <div class="col-md-12 form-group">
                            <input
                                type="email"
                                class="form-control"
                                name="email"
                                placeholder="Email"
                                value="{{ old('email') }}"
                                required
                            >
                        </div>

                        <div class="col-md-12 form-group">
                            <input
                                type="password"
                                class="form-control"
                                name="password"
                                placeholder="Password"
                                required
                            >
                        </div>

                        <div class="col-md-12 form-group">
                            <button type="submit" class="primary-btn">
                                Login
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- JS -->
<script src="{{ asset('assets/templates/user/js/vendor/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('assets/templates/user/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/templates/user/js/main.js') }}"></script>

</body>
</html>