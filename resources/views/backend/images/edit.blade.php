@extends('backend.layout.app')
@section('css')
<link href="{{asset('backend/libs/magnific-popup/magnific-popup.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="container-fluid">
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
        @include('backend.layout.allert')
        <form method="POST" action="{{ route('panel.image.update', $row) }}">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="description" class="text-md-right">{{ __('Deskripsi/Caption') }}</label>
                                    <textarea id="description" class="form-control" name="desctiption" rows="8" placeholder="Sekilas deskripsi Foto">{{ $row->desctiption }} </textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-md-right">{{ __('Preview') }}</label>
                                    <a href="{{ asset($row->path) }}" class="image-popup">
                                        <img src="{{ asset($row->path) }}" class="d-block w-100"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-alien waves-effect waves-light">Unggah Foto</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
<script src="{{asset('backend/libs/magnific-popup/magnific-popup.min.js')}}"></script>
    <script type="application/javascript">
        $(window).on('load', function(){
            $('.image-popup').magnificPopup({
                type: 'image',
                closeOnContentClick: false,
                closeBtnInside: false,
                mainClass: 'mfp-with-zoom mfp-img-mobile',
                image: {
                    verticalFit: true,
                    titleSrc: function(item) {
                        return item.el.attr('title');
                    }
                },
                gallery: {
                    enabled: false
                },
                zoom: {
                    enabled: true,
                    duration: 300,
                    opener: function(element) {
                        return element.find('img');
                    }
                }
            });
        });
    </script>
@endsection
