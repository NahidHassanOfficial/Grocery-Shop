<x-layouts.master>
    <div class="border-bottom shadow-sm">
        <nav class="navbar navbar-light py-2">
            <div class="container justify-content-center justify-content-lg-between">
                <a class="navbar-brand" href="{{ route('index') }}">
                    <img src="{{ asset('images/freshcart-logo.svg') }}" alt=""
                        class="d-inline-block align-text-top">
                </a>
                <span class="navbar-text">
                    Already have an account? <a href="{{ url('/login') }}">Sign in</a>
                </span>
            </div>
        </nav>
    </div>


    <!-- section -->
    <section class="my-lg-14 my-8">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
                    <!-- img -->
                    <img src="{{ asset('images/signup-g.svg') }}" alt="" class="img-fluid">
                </div>
                <!-- col -->
                <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1">
                    <div class="mb-lg-9 mb-5">
                        <h1 class="mb-1 h2 fw-bold">Get Start Shopping</h1>
                        <p>Welcome to FreshCart! Enter your email to get started.</p>
                    </div>
                    <!-- form -->
                    <div>
                        <div class="row g-3">
                            <!-- col -->
                            <div class="col">
                                <!-- input --><input type="text" class="form-control" placeholder="First name"
                                    aria-label="First name" id="fname" required>
                            </div>
                            <div class="col">
                                <!-- input --><input type="text" class="form-control" placeholder="Last name"
                                    aria-label="Last name" id="lname" required>
                            </div>
                            <div class="col-12">

                                <!-- input --><input type="email" class="form-control" id="email"
                                    placeholder="Email" required>
                            </div>
                            <div class="col-12">

                                <!-- input --><input type="text" class="form-control" id="phone"
                                    placeholder="Phone Number" maxlength="11" required>
                            </div>
                            <div class="col-12">

                                <!-- input --><input type="password" class="form-control" id="password"
                                    placeholder="Password" required>
                            </div>
                            <!-- btn -->
                            <div class="col-12 d-grid"> <button type="submit" class="btn btn-primary"
                                    onclick="register()">Register</button>
                            </div>

                            <!-- text -->
                            <p><small>By continuing, you agree to our <a href="#!"> Terms of Service</a> & <a
                                        href="#!">Privacy
                                        Policy</a></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        //select div fname, lname, email, password

        async function register() {
            try {
                showLoader();

                let fname = document.getElementById('fname').value;
                let lname = document.getElementById('lname').value;
                let email = document.getElementById('email').value;
                let phone = document.getElementById('phone').value;
                let password = document.getElementById('password').value;

                let response = await axios.post('{{ route('api.user.register') }}', {
                    'firstName': fname,
                    'lastName': lname,
                    'email': email,
                    'phone': phone,
                    'password': password
                });

                if (response.data.status == 'success') {
                    successToast(response.data.message);

                    // redirect after 2 second
                    setTimeout(() => {
                        window.location.href = "{{ route('login') }}";
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
