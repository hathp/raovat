@extends('hoster-config::layout.main')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                @include('hoster-config::setting.partials.portlet-title')
                <div class="portlet-body">
                    <div class="tab-content">
                        @for($i = 0; $i < count($setting_groups); $i++)
                            <div class="tab-pane @if($i ==0) active @endif" id="{{ $setting_groups[$i]->slug }}">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                    @foreach($setting_groups[$i]->settings as $setting)
                                        <tr>
                                            <td style="width:30%"> {{ $setting->name }} </td>
                                            @if($setting->slug == 'og-image')
                                                {!! Form::model($setting, ['method' => 'post','route' => ['admin.setting.upload', $setting->id], 'files', 'id'=>'form-setting']) !!}
                                                    <td style="width:70%">
                                                        {!! FormHelper::imageInput('Ảnh seo facebook', 'file', isset($setting->value) ? $setting->getCoverImage() : null) !!}
                                                    </td>
                                                {!! Form::close() !!}
                                            @else
                                                <td style="width:70%">
                                                    <a href="javascript:;" class="x-editable" data-type="text" data-pk="{{ $setting->id }}" data-original-title="{{ $setting->name }}" data-url="{{ route('admin.setting.updates') }}">{{ $setting->value }}</a>
                                                </td>
                                            @endif

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-page-script')

    <script src="{{ asset('assets/admin/js/jquery.form.js') }}"></script>

    <script>
        $(':file').change(function(){
            var options = {
                type:"post",
                url: "{{ route('admin.setting.upload')  }}",
                success: function()
                {
                },
            };
            $("#form-setting").ajaxSubmit(options);
        });
    </script>
@endsection