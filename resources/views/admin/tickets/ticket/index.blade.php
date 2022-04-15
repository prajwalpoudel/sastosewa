@extends('metronics.layouts.master')

@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                        </span>
                <h3 class="kt-portlet__head-title">
                    Ticket
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions">
                    <a href="{{ route('admin.ticket.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Create
                    </a>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table
                class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer"
                width="100%" id="ticket-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Total Price</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th style="text-align: center">Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('script')
    <script type="application/javascript">
        var url = '{{ route('admin.ticket.index') }}';
        var gradeTable = $('#ticket-table').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            searching: true,
            stateSave: true,
            ajax: {
                url: url,
            },
            order: [[1, 'asc']],
            columns: [
                {data: 'DT_RowIndex', searchable: false, orderable: false, width: '5%'},
                {data: 'name', name: 'name'},
                {data: 'category.name', name: 'category.name'},
                {data: 'price', name: 'price'},
                {data: 'date', name: 'date'},
                {data: 'status', name: 'status'},
                {data: 'action', 'name': 'action', searchable: false, orderable: false, className: 'dt-body-center'}
            ],
        });
    </script>
@endpush
