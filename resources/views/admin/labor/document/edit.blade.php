@extends('metronics.layouts.master')

@section('content')
    <section id="labor-document-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Edit Labor Document</h3>
                </div>
            </div>
            {!! Form::model($document, ['route' => ['admin.labor.document.update',$document->id], 'method' => 'patch', 'class' => 'kt-form kt-form--label-right', 'id' => 'labor-document-form']) !!}
            @include('admin.labor.document.form', ['formAction' => 'Update', 'isEdit' => true])
            {!! Form::close() !!}
        </div>
    </section>
@endsection
@push('script')
    <script>
    </script>
@endpush
