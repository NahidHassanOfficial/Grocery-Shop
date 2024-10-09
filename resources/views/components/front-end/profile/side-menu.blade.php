<x-front-end.layouts.master>
    <section>
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center d-md-none py-4">
                        <!-- heading -->
                        <h3 class="fs-5 mb-0">Account Setting</h3>
                        <!-- button -->
                        <button class="btn btn-outline-gray-400 text-muted d-md-none btn-icon btn-sm ms-3" type="button"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasAccount" aria-controls="offcanvasAccount">
                            <i class="bi bi-text-indent-left fs-3"></i>
                        </button>
                    </div>
                </div>
                <!-- col -->
                <div class="col-lg-3 col-md-4 col-12 border-end d-none d-md-block">
                    <div class="pt-10 pe-lg-10">
                        <!-- nav -->
                        <ul class="nav flex-column nav-pills nav-pills-dark">
                            <!-- nav item -->
                            <li class="nav-item">
                                <!-- nav link -->
                                <a class="nav-link @if (Route::is('profile')) active @endif" aria-current="page"
                                    href="{{ route('profile') }}">
                                    <i class="feather-icon icon-shopping-bag me-2"></i>
                                    Your Orders
                                </a>
                            </li>
                            <!-- nav item -->
                            <li class="nav-item">
                                <a class="nav-link  @if (Route::is('profile.setting')) active @endif"
                                    href="{{ route('profile.setting') }}">
                                    <i class="feather-icon icon-settings me-2"></i>
                                    Settings
                                </a>
                            </li>
                            <!-- nav item -->
                            <li class="nav-item">
                                <a class="nav-link @if (Route::is('profile.address')) active @endif"
                                    href="{{ route('profile.address') }}">
                                    <i class="feather-icon icon-map-pin me-2"></i>
                                    Address
                                </a>
                            </li>
                            <!-- nav item -->
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="feather-icon icon-credit-card me-2"></i>
                                    Payment Method
                                </a>
                            </li>
                            <!-- nav item -->
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="feather-icon icon-bell me-2"></i>
                                    Notification
                                </a>
                            </li>
                            <!-- nav item -->
                            <li class="nav-item">
                                <hr />
                            </li>
                            <!-- nav item -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}">
                                    <i class="feather-icon icon-log-out me-2"></i>
                                    Log out
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{ $slot }}

            </div>
        </div>
    </section>




    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasAccount" aria-labelledby="offcanvasAccountLabel">
        <!-- offcanvas header -->
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasAccountLabel">Offcanvas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <!-- offcanvas body -->
        <div class="offcanvas-body">
            <ul class="nav flex-column nav-pills nav-pills-dark">
                <!-- nav item -->
                <li class="nav-item @if (Route::is('profile')) active @endif">
                    <a class="nav-link active" aria-current="page" href="{{ route('profile') }}">
                        <i class="feather-icon icon-shopping-bag me-2"></i>
                        Your Orders
                    </a>
                </li>
                <!-- nav item -->
                <li class="nav-item @if (Route::is('profile.setting')) active @endif">
                    <a class="nav-link" href="{{ route('profile.setting') }}">
                        <i class="feather-icon icon-settings me-2"></i>
                        Settings
                    </a>
                </li>
                <!-- nav item -->
                <li class="nav-item @if (Route::is('profile.address')) active @endif">
                    <a class="nav-link" href="{{ route('profile.address') }}">
                        <i class="feather-icon icon-map-pin me-2"></i>
                        Address
                    </a>
                </li>
                <!-- nav item -->
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="feather-icon icon-credit-card me-2"></i>
                        Payment Method
                    </a>
                </li>
                <!-- nav item -->
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="feather-icon icon-bell me-2"></i>
                        Notification
                    </a>
                </li>
            </ul>
            <hr class="my-6" />
            <div>
                <!-- nav  -->
                <ul class="nav flex-column nav-pills nav-pills-dark">
                    <!-- nav item -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">
                            <i class="feather-icon icon-log-out me-2"></i>
                            Log out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-front-end.layouts.master>
