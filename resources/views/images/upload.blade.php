@extends('layouts.master')
@section('style')
@endsection
@section('content')
<div class="nk-main">
    <div id="top">
        <div class="nk-gap-6"></div>
        <div class="nk-gap"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    @include('layouts.allert')
                    <h1 class="h2 text-center">Upload Foto</h1>  
                </div>
            </div>
        </div>
        <div class="nk-gap-2"></div>
    </div>
    <div id="login" class="mb-30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('layouts.menu')
                    <div class="d-block w-100 py-4">
                        <form method="POST" action="{{ route('images.store') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
    
                            <div class="form-group">
                                <div class="custom-file @error('file') is-invalid @enderror">
                                    <input type="file" class="custom-file-input required @error('file') is-invalid @enderror" id="file" name="file" accept="image/*" required/>
                                    <label class="custom-file-label" for="customFile">Pilih file</label>
                                </div>

                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            <div class="form-group">
                                <label for="description" class="text-md-right">{{ __('Deskripsi/Caption') }}</label>
                                <textarea id="description" class="form-control" name="desctiption" rows="8" placeholder="Sekilas tentang Anda">{{ old('desctiption') }} </textarea>

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
                                            {{ __('Upload') }}
                                        </button>
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
<script>
    $(window).on('load', function(){
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    });
</script>
@endsection
