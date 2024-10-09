<x-layouts.master>

    <!-- navigation -->
    <div class="border-bottom shadow-sm">
        <nav class="navbar navbar-light py-2">
            <div class="container justify-content-center justify-content-lg-between">
                <a class="navbar-brand" href="{{ route('index') }}">
                    <img src="{{ asset('images/freshcart-logo.svg') }}" alt=""
                        class="d-inline-block align-text-top">
                </a>
                <span class="navbar-text">
                    Admin Login Pannel
                </span>
            </div>
        </nav>
    </div>


    <!-- section -->
    <section class="my-lg-14 my-8">
        <div class="container">
            <!-- row -->
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
                    <!-- img -->
                    <img src="{{ asset('images/signin-g.svg') }}" alt="" class="img-fluid">
                </div>
                <!-- col -->
                <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1">
                    <div class="mb-lg-9 mb-5">
                        <h1 class="mb-1 h2 fw-bold">Sign in to FreshCart Admin</h1>
                        <p>Welcome back to FreshCart! Enter your email to get started.</p>
                    </div>

                    <div>
                        <form method="POST" action="{{ route('admin.login') }}" class="row g-3">
                            <!-- row -->
                            @csrf

                            <div class="col-12">
                                <!-- input -->
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Email" required>
                            </div>
                            <div class="col-12">
                                <!-- input -->
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Password" required>
                            </div>
                            <div class="d-flex justify-content-between">
                                <!-- form check -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" value=""
                                        id="flexCheckDefault">
                                    <!-- label --> <label class="form-check-label" for="flexCheckDefault">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                            <!-- btn -->
                            <div class="col-12 d-grid"> <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>
                            <!-- link -->
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

</x-layouts.master>
