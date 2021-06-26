@extends('layouts.master')

@section('content')
<div class="nk-main">

    <!-- START: About -->
    <div id="top">
        <div class="nk-gap-6"></div>
        <div class="nk-gap"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    @if (is_login())
                    <h1 class="h2 text-center">{{ Auth::user()->name }}</h1>                        
                    @endif

                    <div class="nk-gap mnt-7"></div>

                    <p class="text-center">Seorang pengembara</p>

                    <div class="text-center">
                        <a href="#" class="nk-btn nk-btn-xs nk-btn-circle nk-btn-color-gray-5 text-gray m-5">Edit Profil</a>
                        <a href="#" class="nk-btn nk-btn-xs nk-btn-circle nk-btn-color-gray-5 text-gray m-5">Unggah Foto</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nk-btn nk-btn-xs nk-btn-circle nk-btn-color-gray-5 text-gray m-5">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-gap-4"></div>
    </div>
    <!-- END: About -->
    <div id="lists">

        <div class="nk-portfolio-list nk-isotope nk-isotope-3-cols">
            <div class="nk-isotope-item" data-filter="Branding">
                <div class="nk-portfolio-item nk-portfolio-item-square nk-portfolio-item-info-style-1">
                    <a href="demo-creative-portfolio-work-single.html" class="nk-portfolio-item-link"></a>
                    <div class="nk-portfolio-item-image"><div style="background-image: url({{ asset('assets/images/demo-creative-agency-work-1.jpg') }});"></div></div>
                    <div class="nk-portfolio-item-info nk-portfolio-item-info-center text-center" style="background-color: #69b88b">
                        <div>
                            <h2 class="nk-portfolio-item-title h3">Various Illustrations</h2>
                            <div class="nk-portfolio-item-letter display-extra-big">V</div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="nk-isotope-item" data-filter="Branding">
                <div class="nk-portfolio-item nk-portfolio-item-square nk-portfolio-item-info-style-1">
                    <a href="demo-creative-portfolio-work-single.html" class="nk-portfolio-item-link"></a>
                    <div class="nk-portfolio-item-image"><div style="background-image: url({{ asset('assets/images/demo-creative-agency-work-2.jpg') }});"></div></div>
                    <div class="nk-portfolio-item-info nk-portfolio-item-info-center text-center" style="background-color: #962444">
                        <div>
                            <h2 class="nk-portfolio-item-title h3">Creative Shapes</h2>
                            <div class="nk-portfolio-item-letter display-extra-big">C</div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="nk-isotope-item" data-filter="Print">
                <div class="nk-portfolio-item nk-portfolio-item-square nk-portfolio-item-info-style-1">
                    <a href="demo-creative-portfolio-work-single.html" class="nk-portfolio-item-link"></a>
                    <div class="nk-portfolio-item-image"><div style="background-image: url({{ asset('assets/images/demo-creative-agency-work-3.jpg') }});"></div></div>
                    <div class="nk-portfolio-item-info nk-portfolio-item-info-center text-center" style="background-color: #fa7f21">
                        <div>
                            <h2 class="nk-portfolio-item-title h3">Raympnd Coller</h2>
                            <div class="nk-portfolio-item-letter display-extra-big">R</div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="nk-isotope-item" data-filter="Photography">
                <div class="nk-portfolio-item nk-portfolio-item-square nk-portfolio-item-info-style-1">
                    <a href="demo-creative-portfolio-work-single.html" class="nk-portfolio-item-link"></a>
                    <div class="nk-portfolio-item-image"><div style="background-image: url({{ asset('assets/images/demo-creative-agency-work-4.jpg') }});"></div></div>
                    <div class="nk-portfolio-item-info nk-portfolio-item-info-center text-center" style="background-color: #2a54e0">
                        <div>
                            <h2 class="nk-portfolio-item-title h3">Allen Carter</h2>
                            <div class="nk-portfolio-item-letter display-extra-big">A</div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="nk-isotope-item" data-filter="Design">
                <div class="nk-portfolio-item nk-portfolio-item-square nk-portfolio-item-info-style-1">
                    <a href="demo-creative-portfolio-work-single.html" class="nk-portfolio-item-link"></a>
                    <div class="nk-portfolio-item-image"><div style="background-image: url({{ asset('assets/images/demo-creative-agency-work-5.jpg') }});"></div></div>
                    <div class="nk-portfolio-item-info nk-portfolio-item-info-center text-center" style="background-color: #251a5d">
                        <div>
                            <h2 class="nk-portfolio-item-title h3">Album Cover</h2>
                            <div class="nk-portfolio-item-letter display-extra-big">A</div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="nk-isotope-item" data-filter="Print">
                <div class="nk-portfolio-item nk-portfolio-item-square nk-portfolio-item-info-style-1">
                    <a href="demo-creative-portfolio-work-single.html" class="nk-portfolio-item-link"></a>
                    <div class="nk-portfolio-item-image"><div style="background-image: url({{ asset('assets/images/demo-creative-agency-work-6.jpg') }});"></div></div>
                    <div class="nk-portfolio-item-info nk-portfolio-item-info-center text-center" style="background-color: #e47d87">
                        <div>
                            <h2 class="nk-portfolio-item-title h3">Creative Portrait</h2>
                            <div class="nk-portfolio-item-letter display-extra-big">C</div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="nk-isotope-item" data-filter="Design">
                <div class="nk-portfolio-item nk-portfolio-item-square nk-portfolio-item-info-style-1">
                    <a href="demo-creative-portfolio-work-single.html" class="nk-portfolio-item-link"></a>
                    <div class="nk-portfolio-item-image"><div style="background-image: url({{ asset('assets/images/demo-creative-agency-work-7.jpg') }});"></div></div>
                    <div class="nk-portfolio-item-info nk-portfolio-item-info-center text-center" style="background-color: #882fa8">
                        <div>
                            <h2 class="nk-portfolio-item-title h3">In the Night</h2>
                            <div class="nk-portfolio-item-letter display-extra-big">I</div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="nk-isotope-item" data-filter="Design">
                <div class="nk-portfolio-item nk-portfolio-item-square nk-portfolio-item-info-style-1">
                    <a href="demo-creative-portfolio-work-single.html" class="nk-portfolio-item-link"></a>
                    <div class="nk-portfolio-item-image"><div style="background-image: url({{ asset('assets/images/demo-creative-agency-work-8.jpg') }});"></div></div>
                    <div class="nk-portfolio-item-info nk-portfolio-item-info-center text-center" style="background-color: #cc325e">
                        <div>
                            <h2 class="nk-portfolio-item-title h3">Paper Mockup</h2>
                            <div class="nk-portfolio-item-letter display-extra-big">P</div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="nk-isotope-item" data-filter="Mockup">
                <div class="nk-portfolio-item nk-portfolio-item-square nk-portfolio-item-info-style-1">
                    <a href="demo-creative-portfolio-work-single.html" class="nk-portfolio-item-link"></a>
                    <div class="nk-portfolio-item-image"><div style="background-image: url({{ asset('assets/images/demo-creative-agency-work-9.jpg') }});"></div></div>
                    <div class="nk-portfolio-item-info nk-portfolio-item-info-center text-center" style="background-color: #291eff">
                        <div>
                            <h2 class="nk-portfolio-item-title h3">Shapes Illustration</h2>
                            <div class="nk-portfolio-item-letter display-extra-big">S</div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
    @include('layouts.work')
</div>
@endsection
