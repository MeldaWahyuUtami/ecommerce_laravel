<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('assets/templates/user/img/fav.png') }}">
    <meta name="author" content="CodePixar">
    <meta charset="UTF-8">
    <title>Merch Store</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/templates/user/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/user/css/main.css') }}">
</head>
<body>
    @include('sweetalert::alert')

    <!--================ Register Box Area =================-->
    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <!-- Gambar kiri -->
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="img-fluid" src="{{ asset('assets/templates/user/img/login.jpg') }}" alt="">
                        <div class="hover">
                            <p>Silakan buat akun baru untuk melanjutkan.</p>
                        </div>
                    </div>
                </div>

                <!-- Form Register -->
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Register new account</h3>
                        <form class="row login_form" action="{{ route('post.register') }}" method="POST" id="contactForm" novalidate="novalidate">
                            @csrf
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" class="primary-btn">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Register Box Area =================-->

    <!-- JS -->
    <script src="{{ asset('assets/templates/user/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/templates/user/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/templates/user/js/main.js') }}"></script>
</body>
</html>
