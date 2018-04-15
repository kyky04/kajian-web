<li class="{{ Request::is('mosques*') ? 'active' : '' }}">
    <a href="{!! route('mosques.index') !!}"><i class="fa fa-edit"></i><span>Mosques</span></a>
</li>

<li class="{{ Request::is('kajians*') ? 'active' : '' }}">
    <a href="{!! route('kajians.index') !!}"><i class="fa fa-edit"></i><span>Kajians</span></a>
</li>

<li class="{{ Request::is('jadwals*') ? 'active' : '' }}">
    <a href="{!! route('jadwals.index') !!}"><i class="fa fa-edit"></i><span>Jadwals</span></a>
</li>

