<!DOCTYPE html>

<html lang="en" dir="ltr">

    <head>

        <meta charset="uft-8">

        <title>Login</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <link rel ="stylesheet" href="{{asset('login')}}/stylelogin.css">

        <link rel="shortcut icon" href="https://undangandigital.org/wp-content/uploads/2021/12/WDP-IKON-01-1.png" type="image/x-icon">

    </head>

    <body>

        @if (session()->has('loginError'))



        <div class="alert alert-danger alert-dismissible fade show" role="alert">

          {{ session('loginError') }}



          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

        </div>





        @endif

        <div class="center">

            <center> <img src="{{asset('FreeDash-lite-master/src')}}/assets/images/logo.png" alt="logo" class="img-fluid" style="width: 175px;"> </center>
            <hr>
            <h1 class="mt-3">Login</h1>
            <form action="/admin/auth" method="post">

                @csrf

                <div class="txt_field">

                    <input type="text" required name="username" id="username">

                    <span></span>

                    <label for="Username">Username </label>

                    </div>

                    <div class="txt_field">

                        <input type="password" required name="password" id="password">

                        <span></span>

                        <label>Password</label>

                    </div>

                    <button id="submit_btn" type="submit">Login</button>

                </div>

            </form>

        </div>

    </body>

</html>
