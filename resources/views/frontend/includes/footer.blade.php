        <footer class="footer-area">
            <div class="footer-top-3 black-bg pt-75 pb-25">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-6 col-xl-4 d-flex justify-content-center">
                            <div class="footer-widget mb-40">
                                <h3 class="footer-widget-title-3">
                                    Contact Us
                                </h3>
                                <div class="footer-info-wrapper-2">
                                    <div class="footer-address-electro">
                                        <div class="footer-info-icon2">
                                            <span>Address:</span>
                                        </div>
                                        <div class="footer-info-content2">
                                            <p>
                                                {{(!empty(setting()->address)) ? setting()->address : ''}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="footer-address-electro">
                                        <div class="footer-info-icon2">
                                            <span>Phone:</span>
                                        </div>
                                        <div class="footer-info-content2">
                                            <p>
                                                {{(!empty(setting()->phone)) ? setting()->phone : '' }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="footer-address-electro">
                                        <div class="footer-info-icon2">
                                            <span>Email:</span>
                                        </div>
                                        <div class="footer-info-content2">
                                            <p>
                                                <a href="#">{{(!empty(setting()->email))? setting()->email : ''}}</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-6 col-xl-4 d-flex justify-content-center">
                            <div class="footer-widget mb-40">
                                <h3 class="footer-widget-title-3">
                                    My Account
                                </h3>
                                <div class="footer-widget-content-3">
                                    <ul>
                                        <li>
                                            <a href="{{route('login')}}">Login</a>
                                        </li>
                                        <li>
                                            <a href="{{route('register')}}">Sign Up</a>
                                        </li>
                                        <li>
                                            <a href="{{route('home')}}">
                                                Order History</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-6 col-xl-4 d-flex justify-content-center">
                            <div class="footer-widget mb-40">
                                <h3 class="footer-widget-title-3">
                                    Information
                                </h3>
                                <div class="footer-widget-content-3">
                                    <ul>
                                        @foreach (pages() as $page)
                                            
                                        <li>
                                            <a href="{{route('page.single', $page->slug)}}">{{ucfirst($page->name)}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-middle black-bg-2 pt-35 pb-35">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="footer-services-wrapper m-auto">
                                <div class="footer-services-icon">
                                    <i class="pe-7s-car"></i>
                                </div>
                                <div class="footer-services-content">
                                    <h3>Free Shipping</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="footer-services-wrapper m-auto">
                                <div class="footer-services-icon">
                                    <i class="pe-7s-shield"></i>
                                </div>
                                <div class="footer-services-content">
                                    <h3>Money Guarentee</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="footer-services-wrapper m-auto">
                                <div class="footer-services-icon">
                                    <i class="pe-7s-headphones"></i>
                                </div>
                                <div class="footer-services-content">
                                    <h3>Online Support</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom black-bg pt-25 pb-30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 pull-right">
                            <div class="copyright f-right mrg-5">
                                <p>
                                    Copyright ©
                                    <a href="https://guruuniform.com/"
                                        >Guru Uniform</a
                                    >
                                    2020 . All Right Reserved.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- all js here -->
        <script src="{{asset('frontend/assets/js/vendor/jquery-1.12.0.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/popper.js')}}"></script>
        <script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/waypoints.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/ajax-mail.js')}}"></script>
        <script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/plugins.js')}}"></script>
        <script src="{{asset('frontend/assets/js/main.js')}}"></script>
        <script src="{{asset('frontend/assets/js/toastr.min.js')}}"></script>
        {{-- Massage alert Toastr --}}
        <script>
            // Cart Message
            @if(Session::has('success'))
                toastr.success("{{session()->get('success')}}","",
                {
                "positionClass": "toast-bottom-left",
                });
            @endif
            @if(session()->has('fail'))
                toastr.error("{{session()->get('fail')}}","",
                {
                "positionClass": "toast-top-center",
                // "progressBar" = "true",

                });
            @endif
            // Order Message
            @if (Session::has('order-success')) 
                toastr.success("{{Session::get('order-success')}}","",
                {
                    "positionClass": "toast-top-full-width",
                    "closeButton": true,
                });
            @endif
        </script>

        @yield('js')
        
    </body>
</html>
