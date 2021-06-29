@extends('backend.layout.app')
@section('css')
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
        <form method="POST" action="{{ route('panel.image.store') }}" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="file">Foto</label>
                            <div class="input-group @if($errors->has('file')) is-invalid @endif">
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="inputGroupFile04">
                                    <label class="custom-file-label" for="inputGroupFile04">Pilih file</label>
                                </div>
                            </div>
                            @error('file')
                                <div class="invalid-feedback" role="feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description" class="text-md-right">{{ __('Deskripsi/Caption') }}</label>
                            <textarea id="description" class="form-control" name="desctiption" rows="8" placeholder="Sekilas deskripsi Foto">{{ old('desctiption') }} </textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-alien waves-effect waves-light">Unggah Foto</button>
                </div>
            </div>
        </form>
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
