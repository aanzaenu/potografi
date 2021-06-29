@extends('backend.layout.app')
@section('css')
<link href="{{asset('backend/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
    
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('panel.home') }}">{{ env('APP_NAME', 'Panel') }}</a></li>
                            <li class="breadcrumb-item active">{{ $pagetitle }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ $pagetitle }}</h4>
                </div>
            </div>
        </div>     
        <!-- end page title -->         
        
        @include('backend.layout.allert')
        <div class="row justify-content-center">
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card-box">
                    <a href="{{ route('main') }}">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                    <i class="fe-home font-22 avatar-title text-info"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="mt-1"><span >Halaman</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Utama</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </a>
                </div> <!-- end widget-rounded-circle-->
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card-box">
                    <a href="{{ route('panel.user.index') }}">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                    <i class="fe-user font-22 avatar-title text-info"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="mt-1"><span >Edit</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Profil</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </a>
                </div> <!-- end widget-rounded-circle-->
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card-box">
                    <a href="{{ route('panel.image.create') }}">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                    <i class="fe-image font-22 avatar-title text-info"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="mt-1"><span >Unggah</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Foto</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </a>
                </div> <!-- end widget-rounded-circle-->
            </div>
        </div>
        <!-- end row -->
        
    </div> <!-- container -->
@endsection

@section('script')
<script src="{{asset('backend/libs/flatpickr/flatpickr.min.js')}}"></script>
<script>
    $('.datetime-datepicker').flatpickr({
        dateFormat: "Y-m-d"
    });
</script>
@endsection
