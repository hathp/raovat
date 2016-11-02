@extends('admin.partials.portlet-title')

@section('extends')
    <ul class="nav nav-tabs">
        @for($i = 0; $i < count($setting_groups); $i++)
            <li @if($i == 0) class="active" @endif>
                <a href="#{{ $setting_groups[$i]->slug }}" data-toggle="tab"> {{ $setting_groups[$i]->name }} </a>
            </li>
        @endfor
    </ul>
@endsection