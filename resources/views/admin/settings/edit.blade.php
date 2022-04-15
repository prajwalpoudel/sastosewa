@extends('metronics.layouts.master')
    <section id="settings-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                        </span>
                    <h3 class="kt-portlet__head-title">Edit Setting</h3>
                </div>
            </div>
            {!! Form::model($setting, ['route' => ['admin.setting.update',$setting->id], 'method' => 'patch', 'files' => 'true', 'class' => 'kt-form kt-form--label-right', 'id' => 'setting-form']) !!}
            @include('admin.settings.form', ['formAction' => 'Update'])
            {!! Form::close() !!}
        </div>
    </section>
@section('content')
@endsection
