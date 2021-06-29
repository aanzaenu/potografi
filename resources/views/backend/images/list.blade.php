@extends('backend.layout.app')
@section('css')
    <link href="{{asset('backend/libs/animate.css/animate.css.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/libs/magnific-popup/magnific-popup.min.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .select2-container .select2-selection--single {
            height: calc(1.5em + 0.9rem + 2px);
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 35px;
            padding-left: 18px;
            color: #6c757d;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 6px;
            right: 9px;
        }
        .select2-container--default .select2-selection--single {
            border: 1px solid #ced4da;
        }
        .gal-box .image-popup .bg{
            padding-top: 100%;
            width: 100%;
            position: relative;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
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
        <div class="row">
            <div class="col-sm-12">
                <div class="d-block w-100 mb-1">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="d-block w-100 mb-2">
                                <a href="{{ route('panel.image.create') }}" class="btn btn-alien waves-effect waves-light">Unggah Foto</a>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <form class="" method="GET" action="{{ route('panel.image.search') }}">
                                <div class="row">
                                    <div class="col-lg-6">
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="input-group">
                                            <input type="text" name="query" class="form-control" placeholder="Cari Sesuatu" value="{{ request()->get('query') }}"/>
                                            <select name="peserta" class="custom-select">
                                                <option value="">Semua Peserta</option>
                                                @foreach ($users as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id == request()->get('peserta') ? 'selected' : '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-append">
                                                <button class="btn btn-alien waves-effect waves-light" type="submit">Cari</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        <div class="row">
            @if(count($lists) > 0)
                @foreach($lists as $key=>$list)
                    <div class="col-sm-6 col-xl-3 filter-item all web illustrator">
                        <div class="gal-box">
                            <a href="{{asset($list->path)}}" class="image-popup position-relative overflow-hidden" title="{{ $list->filename }}">
                                <img src="{{asset($list->path)}}" class="d-none" alt="{{ $list->filename }}">
                                <div class="d-block bg" style="background-image: url({{asset($list->path)}});"></div>
                            </a>
                            <div class="position-absolute" style="top:20px; right: 30px; left: auto;z-index:9">
                                <form class="d-block w-100 text-center deleting{{ $list->id }}" action="{{ route('panel.image.destroy', $list->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('panel.image.edit', $list->id) }}" class="btn btn-alien btn-sm detailpop" >
                                        <i class="fe-info"></i>
                                    </a>
                                    @if ($list->owner == auth()->user()->id)
                                        <button type="button" class="btn btn-danger btn-sm btndelete" data-id="{{ $list->id }}">
                                            <i class="fe-x"></i>
                                        </button>                                            
                                    @endif
                                </form>
                            </div>
                            @if (is_admin())
                                <div class="gall-info">
                                    <div class="d-block w-100">
                                        <h4 class="font-16 mt-0">{{ $list->user->name }}</h4>
                                    </div>
                                </div>                                
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12 text-center">
                    <h3>Data tidak ditemukan</h3>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-sm-12">
                {{ $lists->withQueryString()->links() }}
            </div>
        </div>
    </div>
    @include('backend.layout.ajaxmodal')
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampledeletemodal" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p>Hapus Foto?</p>
                    
                    <button type="button" class="btn btn-light" data-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-alien yes-delete">Ya</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{asset('backend/libs/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('backend/libs/select2/select2.min.js')}}"></script>
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
                    enabled: true
                },
                zoom: {
                    enabled: true,
                    duration: 300,
                    opener: function(element) {
                        return element.find('img');
                    }
                }
            });
            $('.btndelete').on('click', function(){
                $('#deletemodal').modal({
                    backdrop: 'static'
                });
                var id = $(this).data('id');
                $('.yes-delete').attr('data-id', id);
            });
            $('.yes-delete').on('click', function(){
                $('#deletemodal').modal('hide');
                var id = $(this).data('id');
                $('form.deleting'+id).submit();
            });
        });
    </script>
@endsection
