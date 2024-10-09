<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4">
            <div class="modal-header border-0">
                <h5 class="modal-title fs-3 fw-bold" id="userModalLabel">Log In</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email address"
                            required="">
                    </div>

                    <div class="mb-5">
                        <!-- input -->
                        <label for="password" class="form-label">Password</label>

                        <input type="password" class="form-control" id="password" placeholder="Password" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <!-- form check -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <!-- label --> <label class="form-check-label" for="flexCheckDefault">
                                Remember me
                            </label>
                        </div>
                    </div>
                    <!-- btn -->
                    <div class="col-12 d-grid"> <button type="submit" class="btn btn-primary" onclick="login()">Sign
                            In</button>
                    </div>
                    <!-- link -->
                    <div>Forgot your password? <a href="{{ url('/reset-password') }}"> Reset Password</a></div>
                </div>
            </div>
            <div class="modal-footer border-0 justify-content-center">

                Don't have an account? <a href="{{ url('/register') }}">Sign Up</a>
            </div>
        </div>
    </div>
</div>

<script>
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
