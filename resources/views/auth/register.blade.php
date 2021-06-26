@extends('layouts.master')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .is-invalid .select2-container .select2-selection--single .select2-selection__rendered {
        border: 1px solid #dc3545;
    }
    .select2-container .select2-selection--single .select2-selection__rendered {
        padding: 7px 22px;
        font-size: .95rem;
        font-weight: 400;
        background-color: #FFFFFF;
        border: 1px solid #FFFFFF;
        border-radius: 0;
        line-height: 1.2;
        color: #8a8a8a;
        height: calc(1.5em + .75rem + 2px);
        width: 100%;
        background-clip: padding-box;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
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
        border: 1px solid #FFFFFF;
        border-radius: 0;
    }
    .form-control:disabled, .form-control[readonly] {
        background-color: #FFFFFF;
        opacity: 1;
    }
</style>
@endsection
@section('content')
<div class="nk-main">
    <div id="top">
        <div class="nk-gap-6"></div>
        <div class="nk-gap"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h1 class="h2 text-center">Register</h1>  
                </div>
            </div>
        </div>
        <div class="nk-gap-2"></div>
    </div>
    <div id="login" class="mb-30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="d-block w-100 py-4">
                        <form method="POST" action="{{ route('register') }}" class="register-form">
                            @csrf
    
                            <div class="form-group">
                                <label for="name" class="text-md-right">{{ __('Nama') }}</label>
                                <input id="name" type="text" class="form-control required @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nama Anda" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label for="email" class="text-md-right">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control required @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Anda">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label for="password" class="text-md-right">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control required @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password Anda">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone" class="text-md-right">{{ __('No.Telepon') }}</label>
                                <input id="phone" type="text" class="form-control required @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required placeholder="No.Telepon Anda" data-method="number">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="dob" class="text-md-right">{{ __('Tempat Tanggal Lahir') }}</label>
                                <input id="dob" type="text" class="form-control required @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required placeholder="Tempat Tanggal Lahir Anda" data-method="datepicker" readonly>

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group @error('phone_series') is-invalid @enderror">
                                <label for="phone_name" class="text-md-right">{{ __('Merk Handphone/Smartphone') }}</label>
                                <select name="phone_name" id="phone_name" class="custom-select required @error('phone_name') is-invalid @enderror" required data-method="select2">
                                    <option value="">Pilih Merk Handphone/Smartphone</option>
                                    @foreach ($brands as $item)
                                        <option value="{{$item['brand'] }}" {{ old('phone_name') == $item['brand'] ? 'selected' : '' }}>{{ $item['brand'] }}</option>
                                    @endforeach
                                </select>

                                @error('phone_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone_series" class="text-md-right">{{ __('Seri Handphone/Smartphone') }}</label>
                                <select name="phone_series" id="phone_series" class="custom-select required @error('phone_series') is-invalid @enderror" required data-method="select2">
                                    <option value="">Seri Hanphone/Smarphone Anda</option>
                                </select>

                                @error('phone_series')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description" class="text-md-right">{{ __('Deskripsi') }}</label>
                                <textarea id="description" class="form-control" name="description" rows="8" placeholder="Sekilas tentang Anda">{{ old('description') }} </textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="nk-btn nk-btn-color-dark-1 mx-1">
                                            {{ __('Register') }}
                                        </button>
                                        <a href="{{ route('login') }}" class="nk-btn nk-btn-color-light-1 mx-1">
                                            {{ __('Login') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(window).on('load', function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('input[data-method="datepicker"]').datepicker({
            format: 'mm/dd/yyyy'
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
                            for(var i=0; i < response.length; i++)
                            {
                                var htm = '<option value='+response[i].name+'>'+response[i].name+'</option>';
                                $('select[name="phone_series"]').append(htm);
                            }
                            if(val == 'Merk Lainnya')
                            {
                                $('select[name="phone_series"]').val('-');
                            }
                            $('select[name="phone_series"]').select2();
                        }
                    }
                });
            }
        }
    });
</script>
@endsection
