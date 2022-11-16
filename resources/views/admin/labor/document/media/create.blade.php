@extends('metronics.layouts.master')

@section('content')
    <section id="labor-document-media-create">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Crete Labor Document Media</h3>
                </div>
            </div>
            {!! Form::model(null, ['route' => ['admin.labor.document.media.store'], 'method' => 'post', 'class' => 'kt-form kt-form--label-right', 'id' => 'labor-document-media-form', 'files' => true]) !!}
            @include('admin.labor.document.media.form', ['formAction' => 'Save'])
            {!! Form::close() !!}

            <div class="kt-portlet__body">
                <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer"
                       width="100%" id="labor-document-media-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Media</th>
                        <th style="text-align: center">Actions</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script type="application/javascript">
        var url = '{{ route('admin.labor.document.media.index') }}';
        var laborDocumentId = @json($laborDocumentId);
        var mediaTable = $('#labor-document-media-table').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            searching: true,
            stateSave: true,
            ajax: {
                url: url,
                data: {
                    'laborDocumentId' : laborDocumentId
                }
            },
            order: [[1, 'asc']],
            columns: [
                {data: 'DT_RowIndex', searchable: false, orderable: false, width: '5%'},
                {data: 'media', name: 'media', searchable: false, orderable: false, className: 'dt-body-center'},
                {data: 'action', 'name': 'action', searchable: false, orderable: false, className: 'dt-body-center'}
            ],
        });
    </script>
@endpush
