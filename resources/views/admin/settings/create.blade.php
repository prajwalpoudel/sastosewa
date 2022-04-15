@extends('metronics.layouts.master')

@section('content')
    <section id="settings-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
{{--                        <span class="kt-portlet__head-icon">--}}
{{--                        </span>--}}
                    <h3 class="kt-portlet__head-title">Create Setting</h3>
                </div>
            </div>
            {!! Form::model(null, ['route' => ['admin.setting.store'], 'method' => 'post', 'files' => 'true', 'class' => 'kt-form kt-form--label-right', 'id' => 'setting-form']) !!}
                @include('admin.settings.form', ['formAction' => 'Save'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection
