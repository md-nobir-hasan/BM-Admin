@extends('backend.layouts.app')

@section('title', 'Wallet Management')

@push('third_party_stylesheets')
    <link href="{{ asset('assets/backend/js/DataTable/datatables.min.css') }}" rel="stylesheet">
@endpush

@push('page_css')
@endpush

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>View Wallet</h4>
                        </span>
                        <span class="float-right @if (!check('Wallet')->add) d-none @endif">
                            {{-- <a href="{{ route('wallet.balance.create') }}" class="btn btn-info">Add new Shipping</a> --}}
                        </span>
                    </div>

                    {{-- Pending balances --}}
                    <div class="card-body">
                        <h1>Pending Balances</h1>
                        <div class="table-responsive">
                            <table id="table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Cusomter Name</th>
                                        <th>Amount</th>
                                        <th>Receipt copy</th>
                                        <th>Trx ID or Reference</th>
                                        <th>Status</th>
                                        <th class="@if (!check('Wallet')->edit && !check('Wallet')->delete) d-none @endif" id="action">Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($pending_balances as $key => $pbalance)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $pbalance->user->name }}</td>
                                            <td>{{ $pbalance->amount }}</td>
                                            <td>
                                                <img src="/storage/{{ $pbalance->ss }}" alt="Receipt"
                                                    class="img-thumbnail rounded shadow-sm"
                                                    style="width: 48px; height: 48px; object-fit: cover; cursor: pointer;"
                                                    data-toggle="modal" data-target="#imageModal{{ $pbalance->id }}">
                                            </td>
                                            <td>{{ $pbalance->trx_id }}</td>
                                            <td>{{ $pbalance->status_formatted }}</td>
                                            <td
                                                class="text-middle py-0 align-middle @if (!check('Wallet')->edit && !check('Wallet')->delete) d-none @endif">
                                                <div class="btn-group">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-dark btnEdit @if (!check('Wallet')->edit) d-none @endif"
                                                        data-id="{{ $pbalance->id }}" data-amount="{{ $pbalance->amount }}"
                                                        data-trx_id="{{ $pbalance->trx_id }}"
                                                        data-status="{{ $pbalance->status }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    {{-- @endif --}}
                                                    {{-- @if (Auth::user()->can('delete Wallet') || Auth::user()->role->id == 1) --}}
                                                    {{-- <a href="{{ route('wallet.balance.destroy', $pbalance->id) }}"
                                                        class="btn btn-danger btnDelete @if (!check('Wallet')->delete) d-none @endif"><i class="fas fa-trash"></i></a> --}}
                                                    {{-- @endif --}}
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Image Modal -->
                                        <div class="modal fade" id="imageModal{{ $pbalance->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="imageModalLabel{{ $pbalance->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content bg-transparent border-0">
                                                    <div class="modal-body text-center p-0">
                                                        <img src="/storage/{{ $pbalance->ss }}" alt="Receipt"
                                                            class="img-fluid rounded" style="max-height: 80vh;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                    {{-- All balances withut pending --}}
                    <div class="card-body">
                        <h1>All Transections</h1>
                        <div class="table-responsive">
                            <table id="table2" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Cusomter Name</th>
                                        <th>Amount</th>
                                        <th>Receipt copy</th>
                                        <th>Trx ID or Reference</th>
                                        <th>Status</th>
                                        <th class="@if (!check('Wallet')->edit && !check('Wallet')->delete) d-none @endif" id="action">Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($all_balances as $bkey => $balance)
                                    <tr>
                                        <td>{{ $bkey + 1 }}</td>
                                        <td>{{ $balance->user->name }}</td>
                                        <td>{{ $balance->amount }}</td>
                                        <td>
                                            <img src="/storage/{{ $balance->ss }}" alt="Receipt"
                                                class="img-thumbnail rounded shadow-sm"
                                                style="width: 48px; height: 48px; object-fit: cover; cursor: pointer;"
                                                data-toggle="modal" data-target="#imageModal{{ $balance->id }}">
                                        </td>
                                        <td>{{ $balance->trx_id }}</td>
                                        <td>{{ $balance->status_formatted }}</td>
                                        <td
                                            class="text-middle py-0 align-middle @if (!check('Wallet')->edit && !check('Wallet')->delete) d-none @endif">
                                            <div class="btn-group">
                                                <a href="javascript:void(0);"
                                                    class="btn btn-dark btnEdit @if (!check('Wallet')->edit) d-none @endif"
                                                    data-id="{{ $balance->id }}" data-amount="{{ $balance->amount }}"
                                                    data-trx_id="{{ $balance->trx_id }}"
                                                    data-status="{{ $balance->status }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                {{-- @endif --}}
                                                {{-- @if (Auth::user()->can('delete Wallet') || Auth::user()->role->id == 1) --}}
                                                {{-- <a href="{{ route('wallet.balance.destroy', $balance->id) }}"
                                                    class="btn btn-danger btnDelete @if (!check('Wallet')->delete) d-none @endif"><i class="fas fa-trash"></i></a> --}}
                                                {{-- @endif --}}
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Image Modal -->
                                    <div class="modal fade" id="imageModal{{ $balance->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="imageModalLabel{{ $balance->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content bg-transparent border-0">
                                                <div class="modal-body text-center p-0">
                                                    <img src="/storage/{{ $balance->ss }}" alt="Receipt"
                                                        class="img-fluid rounded" style="max-height: 80vh;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Edit Wallet Modal -->
    <div class="modal fade" id="editWalletModal" tabindex="-1" role="dialog" aria-labelledby="editWalletModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div id="editWalletErrors" class="alert alert-danger d-none"></div>
            <form id="editWalletForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editWalletModalLabel">Edit Wallet</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="wallet_id" name="wallet_id">
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" required>
                        </div>
                        <div class="form-group">
                            <label for="trx_id">Trx ID</label>
                            <input type="text" class="form-control" id="trx_id" name="trx_id" required>
                        </div>
                        <div class="form-group">
                            <label for="status">is approved</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="2">Pending</option>
                                <option value="1">Approved</option>
                                <option value="3">Rejected</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection



@push('third_party_scripts')
    <script src="{{ asset('assets/backend/js/DataTable/datatables.min.js') }}"></script>
@endpush

@push('page_scripts')
    <script>
        $(document).ready(function() {
            $('#table2').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'pdfHtml5',
                        title: 'District Management',
                        download: 'open',
                        orientation: 'potrait',
                        pagesize: 'LETTER',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    }, 'pageLength'
                ]
            });

            // Open modal and fill data
            $('.btnEdit').on('click', function() {
                var id = $(this).data('id');
                var amount = $(this).data('amount');
                var trx_id = $(this).data('trx_id');
                var status = $(this).data('status');

                $('#wallet_id').val(id);
                $('#amount').val(amount);
                $('#trx_id').val(trx_id);
                $('#status').val(status);

                $('#editWalletErrors').addClass('d-none').empty();

                $('#editWalletModal').modal('show');
            });

            // AJAX form submit
            $('#editWalletForm').on('submit', function(e) {
                e.preventDefault();
                var id = $('#wallet_id').val();
                var formData = $(this).serialize();

                $.ajax({
                    url: '/wallet/' + id + '/ajax-update',
                    type: 'POST',
                    data: formData + '&_method=PUT',
                    success: function(response) {
                        $('#editWalletModal').modal('hide');
                        var row = $('a[data-id="' + id + '"]').closest('tr');
                        row.find('td').eq(2).text($('#amount').val());
                        row.find('td').eq(4).text($('#trx_id').val());
                        row.find('td').eq(5).text(statusText($('#status').val()));
                        showToast('Wallet updated successfully!', 'success');
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            // Validation error
                            var errors = xhr.responseJSON.errors;
                            var errorHtml = '<ul>';
                            $.each(errors, function(key, value) {
                                errorHtml += '<li>' + value[0] + '</li>';
                            });
                            errorHtml += '</ul>';
                            $('#editWalletErrors').removeClass('d-none').html(errorHtml);
                        } else {
                            $('#editWalletErrors').removeClass('d-none').html(
                                'Something went wrong!');
                        }
                    }
                });
            });
        });

        function showToast(message, type = 'success') {
            var toast = $('<div class="toast align-items-center text-white bg-' + (type === 'success' ? 'success' :
                    'danger') +
                ' border-0" role="alert" aria-live="assertive" aria-atomic="true" style="position: fixed; top: 1rem; right: 1rem; z-index: 9999;">' +
                '<div class="d-flex">' +
                '<div class="toast-body">' + message + '</div>' +
                '<button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close" style="background: none; border: none;"><span aria-hidden="true">&times;</span></button>' +
                '</div></div>');
            $('body').append(toast);
            toast.toast({
                delay: 3000
            });
            toast.toast('show');
            setTimeout(function() {
                toast.remove();
            }, 3500);
        }

        // Helper function to convert status value to text
        function statusText(status) {
            switch (parseInt(status)) {
                case 1:
                    return 'Approved';
                case 2:
                    return 'Pending';
                case 3:
                    return 'Rejected';
                default:
                    return '';
            }
        }
    </script>
@endpush
