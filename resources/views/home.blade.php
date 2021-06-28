@extends('layouts.master')
@section('style')
    <style>
        .nk-portfolio-list .nk-portfolio-item.nk-portfolio-item-info-style-1:hover .nk-portfolio-item-info{
            opacity: 0.8
        }
        .nk-box{
            height: auto;
        }
    </style>
@show
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
                    @include('layouts.allert')
                    <h1 class="h2 text-center">{{ Auth::user()->name }}</h1>                        
                    @endif

                    <div class="nk-gap mnt-7"></div>

                    <p class="text-center">Seorang pengembara</p>

                    @include('layouts.menu')
                </div>
            </div>
        </div>
        <div class="nk-gap-4"></div>
    </div>
    <!-- END: About -->
    @if ($lists)
    <div id="lists">

        <div class="nk-portfolio-list nk-isotope nk-isotope-3-cols">
            @foreach ($lists as $item)
                <div class="nk-isotope-item" data-filter="Branding">
                    <div class="nk-portfolio-item nk-portfolio-item-square nk-portfolio-item-info-style-1">
                        <a href="#" class="nk-portfolio-item-link"></a>
                        <div class="nk-portfolio-item-image"><div style="background-image: url({{ asset($item->path) }});"></div></div>
                        <div class="nk-portfolio-item-info nk-portfolio-item-info-center text-center" style="background-color: #d50d16">
                            <div>
                                <h2 class="nk-portfolio-item-title h3">Various Illustrations</h2>
                                <div class="nk-portfolio-item-letter display-extra-big">V</div>
                            </div>
                        </div>
                    </div>
                </div>                
            @endforeach       
        </div>
    </div>        
    @else
        <div class="d-block mx-auto text-center py-4">
            <h2 class="d-block mx-auto text-center">
                Anda belum mengunggah foto
            </h2>
        </div>
    @endif
    @include('layouts.work')
</div>
@endsection
