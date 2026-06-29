<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('assets/templates/user/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/user/css/main.css') }}">
</head>
<body>

<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">

            <div class="col-lg-6">
                <img class="img-fluid" src="{{ asset('assets/templates/user/img/login.jpg') }}">
            </div>

            <div class="col-lg-6">
                <div class="login_form_inner">

                    <h3>Register</h3>

                    {{-- 🔥 ERROR VALIDATION --}}
                    @if ($errors->any())
                        <div style="color:red; margin-bottom:10px;">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('post.register') }}">
                        @csrf

                        <input type="text" name="name" placeholder="Name" class="form-control"><br>

                        <input type="email" name="email" placeholder="Email" class="form-control"><br>

                        <input type="password" name="password" placeholder="Password (min 8)" class="form-control"><br>

                        <button type="submit" class="primary-btn">Create Account</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

</body>
</html>