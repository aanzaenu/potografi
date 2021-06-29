@extends('backend.layout.app')
@section('css')

<link href="{{asset('backend/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('backend/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
<style>
    .is-invalid .select2-container .select2-selection--single .select2-selection__rendered {
        border: 1px solid #dc3545;
    }
    .select2-container .select2-selection--single .select2-selection__rendered {
        padding: 7px 22px;
        font-size: .95rem;
        font-weight: 400;
        background-color: #FFFFFF;
        border: 1px solid #ced4da;
        line-height: 1.2;
        color: #8a8a8a;
        height: calc(1.5em + .75rem + 2px);
        width: 100%;
        background-clip: padding-box;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .select2-container .select2-selection--single{
        height: auto;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 5px;
        right: 5px;
    }
    .select2-container--default .select2-selection--single {
        background-color: #FFFFFF;
        border: 1px solid #ced4da;
    }
    .form-control:disabled, .form-control[readonly] {
        background-color: #FFFFFF;
        opacity: 1;
    }
    .is-invalid .invalid-feedback{
        display: block;
    }
</style>
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
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('panel.user.update', $row) }}" class="register-form">
                    @csrf
                    @method('PUT')
        
                    <div class="form-group">
                        <label for="name" class="text-md-right">{{ __('Nama') }}</label>
                        <input id="name" type="text" class="form-control required @error('name') is-invalid @enderror" name="name" value="{{ $row->name }}"  autocomplete="name" placeholder="Nama Anda" autofocus required>
        
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
        
                    <div class="form-group">
                        <label for="email" class="text-md-right">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control required @error('email') is-invalid @enderror" name="email" value="{{ $row->email }}"  autocomplete="email" placeholder="Email Anda" required>
        
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
        
                    <div class="form-group">
                        <label for="password" class="text-md-right">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" placeholder="Password Anda">
        
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone" class="text-md-right">{{ __('No.Telepon') }}</label>
                        <input id="phone" type="text" class="form-control required @error('phone') is-invalid @enderror" name="phone" value="{{ $row->phone }}"  placeholder="No.Telepon Anda" data-method="number" required>
        
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dob" class="text-md-right">{{ __('Tempat Tanggal Lahir') }}</label>
                        <input id="dob" type="text" class="form-control required @error('dob') is-invalid @enderror" name="dob" value="{{ $row->dob }}"  placeholder="Tempat Tanggal Lahir Anda" data-method="datepicker" readonly required>
        
                        @error('dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group @error('phone_name') is-invalid @enderror">
                        <label for="phone_name" class="text-md-right">{{ __('Merk Handphone/Smartphone') }}</label>
                        <select name="phone_name" id="phone_name" class="custom-select  @error('phone_name') is-invalid @enderror"  data-method="select2">
                            <option value="">Pilih Merk Handphone/Smartphone</option>
                            @foreach ($brands as $item)
                                <option value="{{$item['brand'] }}" {{ $row->phone_name == $item['brand'] ? 'selected' : '' }}>{{ $item['brand'] }}</option>
                            @endforeach
                        </select>
        
                        @error('phone_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group @error('phone_series') is-invalid @enderror">
                        <label for="phone_series" class="text-md-right">{{ __('Seri Handphone/Smartphone') }}</label>
                        <div class="phoneseries">
                            @if ($row->phone_name == 'Merk Lainnya')
                                <input name="phone_series" id="phone_series" class="form-control  @error('phone_series') is-invalid @enderror" placeholder="Seri Hanphone/Smarphone Anda" value="{{ $row->phone_series }}"/>
                            @else
                                <select name="phone_series" id="phone_series" class="custom-select  @error('phone_series') is-invalid @enderror"  data-method="select2">
                                    <option value="">Seri Hanphone/Smarphone Anda</option>
                                    @if ($row->phone_series)
                                        <option value="{{ $row->phone_series }}" {{ $row->phone_series ? 'selected' : '' }}>{{ $row->phone_series }}</option>                                                
                                    @endif
                                </select>                                    
                            @endif
                        </div>
        
                        @error('phone_series')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description" class="text-md-right">{{ __('Deskripsi') }}</label>
                        <textarea id="description" class="form-control" name="description" rows="8" placeholder="Sekilas tentang Anda">{{ $row->description }} </textarea>
        
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-alien">
                            {{ __('Update') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{asset('backend/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('backend/libs/select2/select2.min.js')}}"></script>
<script>
    $(window).on('load', function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('input[data-method="datepicker"]').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
        });
        $('select[data-method="select2"]').select2();        
        $('input[data-method="number"]').keypress(function(value) {
            if (String.fromCharCode(value.keyCode).match(/[^0-9]/g)) return false;
        });
        $('select[name="phone_name"]').on('change', function(){
            var val = $(this).val();
            setPhoneSeries(val);
        });
        function setPhoneSeries(val)
        {
            if(val)
            {
                $.ajax({
                    data: {
                        query: val,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('json.getphone') }}",
                    method: 'post',
                    success: function(response){
                        if(response)
                        {
                            $('select[name="phone_series"]').select2('destroy');
                            $('select[name="phone_series"]').html('<option value="">Seri Hanphone/Smarphone Anda</option>');
                            if(val == 'Merk Lainnya')
                            {
                                $('select[name="phone_series"]').val('-');
                                $('.phoneseries').html('<input name="phone_series" id="phone_series" class="form-control" placeholder="Seri Hanphone/Smarphone Anda"/>');
                            }else{
                                var htms = '<select name="phone_series" id="phone_series" class="custom-select" data-method="select2">';
                                htms += '<option value="">Seri Hanphone/Smarphone Anda</option>';
                                for(var i=0; i < response.length; i++)
                                {
                                    htms += '<option value="'+response[i].name+'">'+response[i].name+'</option>';
                                }
                                htms += '</select>';
                                $('.phoneseries').html(htms);
                                @if($row->phone_name !== 'Merk Lainnya' && $row->phone_name !== '')
                                var pseries = "{{ $row->phone_series }}";
                                    $('select[name="phone_series"]').val(pseries);                                
                                @endif
                                $('select[name="phone_series"]').select2();
                            }
                        }
                    }
                });
            }
        }
        @if($row->phone_name !== 'Merk Lainnya' && $row->phone_name !== '')
        var val = "{{ $row->phone_name }}";
            setPhoneSeries(val);
        @endif
    });
</script>
@endsection
