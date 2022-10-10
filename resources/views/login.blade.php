<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BENINDOS</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- Fontawesome CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- Datetime Picker Libs --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>
    <!-- CSS SELECT2-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Script SELECT2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
    <form action="{{ route('postlogin') }}" method="post">
        <section class="vh-100 bg-img">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <img src="/img/logo-swifect-logo.png" alt=""></img>
                        <h1 style="font-weight: bold; color: #2B58AF">BENINDO MOTOR REPORTING</h1>
                    </div>
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                {{-- <h3 class="mb-5">IT INVENTORY ONLINE BC</h3> --}}

                                <div class="form-outline mb-3 text-start">
                                    <label class="form-label" for="name">Username</label>
                                    <input type="text" id="name" class="form-control form-control-lg"
                                        placeholder="Username" name="name" required="required" autofocus />
                                </div>

                                <div class="form-outline mb-3 text-start">
                                    <label class="form-label" for="typePasswordX-2">Password</label>
                                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg"
                                        placeholder="Password" name="password" required="required" autofocus />
                                </div>

                                <!-- Checkbox -->
                                {{-- <div class="form-check d-flex justify-content-start mb-4">
                                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                                    <label class="form-check-label" for="form1Example3"> Remember password </label>
                                </div> --}}
                                <br>
                                <button class="btn btn-primary btn-lg btn-block" style="width:100%;"
                                    type="submit">Login</button>
                                <div class="py-2"></div>
                                <hr>
                                {{-- <div class="login-form pt-2">
                                    Don't have an account?<a href="{{ 'register' }}">Register Here</a>
                                </div> --}}
                                <div class="login-form pt-2">
                                    <a href="https://swifect.com/" target="_blank">PT.Swifect Solusi Indonesia 2022
                                        ©</a>
                                </div>
                                <div class="login-form pt-2">
                                    Go to Swifect Repository page click <a href="https://repository.swiapps.com/"
                                        target="_blank">Here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</body>

</html>