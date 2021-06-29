<?php $rut = request()->route();?>
<div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <div id="sidebar-menu">
            <ul id="side-menu">
                <li>
                    <a href="{{ route('panel.home') }}" title="Dashboard">
                        <i data-feather="airplay"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <?php
                    $class_show = '';
                    $class_menuitem = '';
                    if($rut->named('panel.image.index') || $rut->named('panel.image.search') || $rut->named('panel.image.create') || $rut->named('panel.image.edit'))
                    {
                        $class_show = 'show';
                        $class_menuitem = 'menuitem-active';
                    }
                ;?>
                <li class="{{ $class_menuitem }}">
                    <a href="{{ route('panel.image.index') }}" title="Foto">
                        <i data-feather="image"></i>
                        <span> Foto </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" title="Logout">
                        <i data-feather="log-out"></i>
                        <span> Logout </span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>