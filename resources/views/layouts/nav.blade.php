<nav class="nk-navbar nk-navbar-full nk-navbar-full-style-2 nk-navbar-align-center nk-navbar-items-effect-1 nk-navbar-drop-effect-2" id="nk-full">    
    <div class="nk-nav-table">
        <div class="nk-nav-row">
            <div class="container">
                <div class="nk-nav-header">
                    <div class="nk-nav-close nk-navbar-full-toggle">
                        <span class="nk-icon-close"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-nav-row-full nk-nav-row">
            <div class="container">
                <div class="row vertical-gap text-left">
                    <div class="col-md-6 col-lg-4 offset-lg-2">
                        <div class="nk-gap-3"></div>
                        <ul class="nk-nav">
                            
                            <li class="active">
                                <a href="demo-creative-portfolio.html">
                                    Home
                                    
                                </a>
                            </li>
                            <li class=" nk-drop-item">
                                <a href="demo-creative-portfolio-portfolio.html">
                                    Portfolio
                                    
                                </a><ul class="dropdown">
                                        
                            <li>
                                <a href="demo-creative-portfolio-portfolio.html">
                                    Portfolio
                                    
                                </a>
                            </li>
                            <li>
                                <a href="demo-creative-portfolio-work-single.html">
                                    Single
                                    
                                </a>
                            </li>
                                    </ul>
                            </li>
                            <li class=" nk-drop-item">
                                <a href="demo-creative-portfolio-blog.html">
                                    Blog
                                    
                                </a><ul class="dropdown">
                                        
                            <li>
                                <a href="demo-creative-portfolio-blog.html">
                                    Blog
                                    
                                </a>
                            </li>
                            <li>
                                <a href="demo-creative-portfolio-blog-single.html">
                                    Single
                                    
                                </a>
                            </li>
                                    </ul>
                            </li>
                            <li>
                                <a href="demo-creative-portfolio-about.html">
                                    About
                                    
                                </a>
                            </li>
                            <li>
                                <a href="demo-creative-portfolio-contact.html">
                                    Contact
                                    
                                </a>
                            </li>
                            @guest
                                <li>
                                    <a href="{{ route('login') }}">
                                        Login
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @endguest
                        </ul>
                        <div class="nk-gap-3 d-none d-lg-block"></div>
                        <div class="nk-gap-3"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="nk-gap-3 d-none d-md-block"></div>
                        <div class="nk-widget">
                            <h4 class="nk-widget-title">Find Us</h4>
                            <p>10111 Santa Monica Boulevard, <br> Los Angeles</p>
                        </div>
                        <div class="nk-widget">
                            <h4 class="nk-widget-title">Contact Us</h4>
                            <p>+44 987 065 908 <br> info@Example.com</p>
                            <div class="nk-social nk-social-left pt-10">
                                <ul>
                                    <li><a class="nk-social-twitter" href="https://twitter.com/"><span><span class="nk-social-front fa fa-twitter"></span><span class="nk-social-back fa fa-twitter"></span></span></a></li>
                                    <li><a class="nk-social-facebook" href="https://www.facebook.com/"><span><span class="nk-social-front fa fa-facebook"></span><span class="nk-social-back fa fa-facebook"></span></span></a></li>
                                    <li><a class="nk-social-dribbble" href="https://dribbble.com/"><span><span class="nk-social-front fa fa-dribbble"></span><span class="nk-social-back fa fa-dribbble"></span></span></a></li>
                                    <li><a class="nk-social-instagram" href="https://www.instagram.com/"><span><span class="nk-social-front fa fa-instagram"></span><span class="nk-social-back fa fa-instagram"></span></span></a></li>
                                    <li><a class="nk-social-behance" href="https://behance.com/"><span><span class="nk-social-front fa fa-behance"></span><span class="nk-social-back fa fa-behance"></span></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="nk-gap-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>