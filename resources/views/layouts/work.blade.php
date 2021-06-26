<!-- START: Let's Work Together -->
<div class="nk-box bg-dark-05 text-center">
    <div class="nk-gap-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h2 class="text-white">Mari Berpartisipasi</h2>
                <div class="nk-gap-1 mnt-20"></div>
                <p class="text-white">Daftarkan diri Anda, lalu unggah foto jepretan terbaik Anda untuk mendapatkan hadiah menarik.</p>
                <div class="nk-gap mnt-9"></div>
                @guest
                    <a href="{{ route('login') }}" class="nk-btn nk-btn-outline nk-btn-color-white nk-btn-hover-color-main">Unggah Foto</a>
                @else
                    <a href="#" class="nk-btn nk-btn-outline nk-btn-color-white nk-btn-hover-color-main">Unggah Foto</a>
                @endguest
            </div>
        </div>
    </div>
    <div class="nk-gap-5"></div>
</div>
<!-- END: Let's Work Together -->