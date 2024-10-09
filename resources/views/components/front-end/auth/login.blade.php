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
                    Don't have an account? <a href="{{ url('/register') }}">Sign Up</a>
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
                        <h1 class="mb-1 h2 fw-bold">Sign in to FreshCart</h1>
                        <p>Welcome back to FreshCart! Enter your email to get started.</p>
                    </div>

                    <div>
                        <div class="row g-3">
                            <!-- row -->

                            <div class="col-12">
                                <!-- input -->
                                <input type="email" class="form-control" id="email" placeholder="Email" required>
                            </div>
                            <div class="col-12">
                                <!-- input -->
                                <input type="password" class="form-control" id="password" placeholder="Password"
                                    required>
                            </div>
                            <div class="d-flex justify-content-between">
                                <!-- form check -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault">
                                    <!-- label --> <label class="form-check-label" for="flexCheckDefault">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                            <!-- btn -->
                            <div class="col-12 d-grid"> <button type="submit" class="btn btn-primary"
                                    onclick="login()">Sign In</button>
                            </div>
                            <!-- link -->
                            <div>Forgot your password? <a href="{{ url('/reset-password') }}"> Reset Password</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        //select div email, password and remember me


        async function login() {
            try {
                showLoader();

                let email = document.getElementById("email").value;
                let password = document.getElementById("password").value;
                let remember = document.getElementById("flexCheckDefault");

                let response = await axios.post('{{ route('api.user.login') }}', {
                    'email': email,
                    'password': password,
                    'remember': remember.checked
                });


                if (response.data.status == 'success') {
                    successToast(response.data.message);

                    // redirect after 2 second
                    setTimeout(() => {
                        // window.location.href = "{{ route('profile') }}";

                    }, 2000);
                }

            } catch (error) {
                let data = error.response.data;
                if (data.errors) {
                    Object.values(data.errors).forEach(messages => {
                        messages.forEach(errorToast);
                    });
                } else {
                    errorToast(data.message);
                }
            } finally {
                hideLoader();
            }
        }
    </script>

</x-layouts.master>
