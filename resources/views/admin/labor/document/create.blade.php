@extends('metronics.layouts.master')

@section('content')
    <section id="labor-document-create">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Crete Labor Document</h3>
                </div>
            </div>
            {!! Form::model(null, ['route' => ['admin.labor.document.store'], 'method' => 'post', 'class' => 'kt-form kt-form--label-right', 'id' => 'labor-document-form']) !!}
            @include('admin.labor.document.form', ['formAction' => 'Save'])
            {!! Form::close() !!}

            <div class="kt-portlet__body">
                <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer"
                       width="100%" id="labor-document-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
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
        var url = '{{ route('admin.labor.document.index') }}';
        var laborId = @json($laborId);
        var mediaTable = $('#labor-document-table').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            searching: true,
            stateSave: true,
            ajax: {
                url: url,
                data: {
                    'laborId' : laborId
                }
            },
            order: [[1, 'asc']],
            columns: [
                {data: 'DT_RowIndex', searchable: false, orderable: false, width: '5%'},
                {data: 'title', name: 'title'},
                {data: 'action', 'name': 'action', searchable: false, orderable: false, className: 'dt-body-center'}
            ],
        });
    </script>
@endpush
