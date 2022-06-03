<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <section class="vh-100" style="background-color: #E9EEF5;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form action="{{route('client.register')}}" method="post">
                                        @csrf

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0"><b>TS</b>20</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Daftar Akun Baru
                                        </h5>
                                        {{-- show error --}}
                                        @if ($errors->any())
                                        <div class="alert alert-danger mb-4">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif

                                        <div class="form-outline mb-4">
                                            <input type="text" id="form2Example17" name="name"
                                                class="form-control form-control-lg" value="{{ old('name') }}" />
                                            <label class="form-label" for="form2Example17">Nama</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="email" id="form2Example17" name="email"
                                                class="form-control form-control-lg" value="{{ old('email') }}" />
                                            <label class="form-label" for="form2Example17">Email address</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="form2Example27" name="password"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example27">Password</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="form2Example27" name="password_confirmation"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example27">Password</label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Daftar</button>
                                        </div>

                                        <p class="pb-lg-2" style="color: #393f81;">Sudah punya akun? <a
                                                href="{{ route('client.login') }}" style="color: #393f81;">Login</a></p>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
