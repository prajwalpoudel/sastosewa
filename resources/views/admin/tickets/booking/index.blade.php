
@extends('metronics.layouts.master')

@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                        </span>
                <h3 class="kt-portlet__head-title">
                    Ticket Booking Detail
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table
                class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer"
                width="100%" id="ticket-booking-detail-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Ticket Brand</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Status</th>
                    <th>Payment Status</th>
                    <th style="text-align: center">Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('script')
    <script type="application/javascript">
        var url = '{{ route('admin.ticket.booking.index') }}';
        var taxiDetailTable = $('#ticket-booking-detail-table').DataTable({
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
                {data: 'bookable_name', name: 'bookable_name'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'from', name: 'from'},
                {data: 'to', name: 'to'},
                {data: 'status', name: 'status'},
                {data: 'payment_status', name: 'payment_status'},
                {data: 'action', 'name': 'action', searchable: false, orderable: false, className: 'dt-body-center'}
            ],
        });
    </script>
@endpush


