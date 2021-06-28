<?php $rut = request()->route();?>
<div class="text-center">
    <?php
        $class_show = 'nk-btn-color-gray-5';
        if($rut->named('home'))
        {
            $class_show = 'nk-btn-color-light-1';
        }
    ;?>
    <a href="{{ route('home') }}" class="nk-btn nk-btn-xs nk-btn-circle {{ $class_show }} text-gray m-5">Profil Saya</a>
    <?php
        $class_show = 'nk-btn-color-gray-5';
        if($rut->named('user.index'))
        {
            $class_show = 'nk-btn-color-light-1';
        }
    ;?>
    <a href="{{ route('user.index') }}" class="nk-btn nk-btn-xs nk-btn-circle {{ $class_show }} text-gray m-5">Edit Profil</a>
    <?php
        $class_show = 'nk-btn-color-gray-5';
        if($rut->named('images.create'))
        {
            $class_show = 'nk-btn-color-light-1';
        }
    ;?>
    <a href="{{ route('images.create') }}" class="nk-btn nk-btn-xs nk-btn-circle {{ $class_show }} text-gray m-5">Unggah Foto</a>
    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nk-btn nk-btn-xs nk-btn-circle nk-btn-color-gray-5 text-gray m-5">Logout</a>
</div>