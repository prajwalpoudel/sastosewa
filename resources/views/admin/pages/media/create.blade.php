@extends('metronics.layouts.master')

@section('content')
    <section id="media-create">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Add {{ ($section->page->title ?? null) . '(' . $section->page_title .')' }} Media</h3>
                </div>
            </div>
            {!! Form::model(null, ['route' => ['admin.page.media.store'], 'method' => 'post', 'class' => 'kt-form kt-form--label-right', 'id' => 'section-form', 'files' => true]) !!}
            @include('admin.pages.media.form', ['formAction' => 'Save'])
            {!! Form::close() !!}

            <div class="kt-portlet__body">
                <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer"
                    width="100%" id="media-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Type</th>
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
        var url = '{{ route('admin.page.media.index') }}';
        var sectionId = @json($section->id);
        var mediaTable = $('#media-table').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            searching: true,
            stateSave: true,
            ajax: {
                url: url,
                data: {
                    'sectionId' : sectionId
                }
            },
            order: [[1, 'asc']],
            columns: [
                {data: 'DT_RowIndex', searchable: false, orderable: false, width: '5%'},
                {data: 'type', name: 'type'},
                {data: 'media', name: 'media'},
                {data: 'action', 'name': 'action', searchable: false, orderable: false, className: 'dt-body-center'}
            ],
        });
    </script>
    @stack('form-script')
@endpush
