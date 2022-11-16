@extends('metronics.layouts.master')

@section('content')
    <section id="labor-document-edit-media">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Edit Labor Document Media</h3>
                </div>
            </div>
            {!! Form::model($media, ['route' => ['admin.labor.document.media.update',$media->id], 'method' => 'patch', 'class' => 'kt-form kt-form--label-right', 'id' => 'labor-document-media-form', 'files' => true]) !!}
            @include('admin.labor.document.media.form', ['formAction' => 'Update', 'isEdit' => true])
            {!! Form::close() !!}
        </div>
    </section>
@endsection
@push('script')
    <script>
    </script>
@endpush
