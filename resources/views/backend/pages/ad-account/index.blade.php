@extends('backend.layouts.app')

@section('title', 'Ad Account Management')

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
                            <h4>View Ad Account</h4>
                        </span>
                        <span class="float-right @if (!check('Ad Account')->add) d-none @endif">
                            {{-- <a href="{{ route('balance.create') }}" class="btn btn-info">Add new Shipping</a> --}}
                        </span>
                    </div>
                    {{-- Pending ad accounts --}}
                    <div class="card-body">
                        <h1>Pending Ad accounts</h1>
                        <div class="table-responsive">
                            <table id="table" class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Customer Name</th>
                                        <th>Account Name</th>
                                        <th>Account Type</th>
                                        <th>Dollar Rate</th>
                                        <th>BM ID</th>
                                        <th>Monthly Budget</th>
                                        <th>FB Page Links</th>
                                        <th>Website Links</th>
                                        <th>Status</th>
                                        <th class="@if (!check('Ad Account')->edit && !check('Ad Account')->delete) d-none @endif" id="action">Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($pending_ad_accounts as $key => $pad_account)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $pad_account->user->name }}</td>
                                            <td>{{ $pad_account->name }}</td>
                                            <td>{{ $pad_account->account_type_formatted }}</td>
                                            <td>{{ $pad_account->dollar_rate }}</td>
                                            <td> {{$pad_account->bm_id}} </td>
                                            <td>{{ $pad_account->monthly_budget }}</td>
                                            <td>
                                                <a target="_blank" href="{{ $pad_account->fb_page_link1 }}">Page 1</a>
                                                @if ($pad_account->fb_page_link2), <a href="{{$pad_account->fb_page_link2}}" target="_blank">Page 2</a> @endif
                                                @if ($pad_account->fb_page_link3), <a href="{{$pad_account->fb_page_link3}}" target="_blank">Page 3</a> @endif
                                                @if ($pad_account->fb_page_link4), <a href="{{$pad_account->fb_page_link4}}" target="_blank">Page 4</a> @endif
                                                @if ($pad_account->fb_page_link5), <a href="{{$pad_account->fb_page_link5}}" target="_blank">Page 5</a> @endif
                                            </td>
                                            <td>
                                                <a target="_blank" href="{{ $pad_account->website_link1 }}">Website 1</a>
                                                @if ($pad_account->website_link2), <a href="{{$pad_account->website_link2}}" target="_blank">Website 2</a> @endif

                                            </td>
                                            <td>{{ $pad_account->status_formatted }}</td>
                                            <td
                                                class="text-middle py-0 align-middle @if (!check('Ad Account')->edit && !check('Ad Account')->delete) d-none @endif">
                                                <div class="btn-group">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-dark btnEdit @if (!check('Ad Account')->edit) d-none @endif"
                                                        data-id="{{ $pad_account->id }}"
                                                        data-accountname="{{ $pad_account->name }}"
                                                        data-dollar_rate="{{ $pad_account->dollar_rate }}"
                                                        data-status="{{ $pad_account->status }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    {{-- @endif --}}
                                                    {{-- @if (Auth::user()->can('delete Ad Account') || Auth::user()->role->id == 1) --}}
                                                    {{-- <a href="{{ route('balance.destroy', $pad_account->id) }}"
                                                        class="btn btn-danger btnDelete @if (!check('Ad Account')->delete) d-none @endif"><i class="fas fa-trash"></i></a> --}}
                                                    {{-- @endif --}}
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card">
                    {{-- All Ad Account withut pending --}}
                    <div class="card-body">
                        <h1>All Ad accounts</h1>
                        <div class="table-responsive">
                            <table id="table2" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Customer Name</th>
                                        <th>Account Name</th>
                                        <th>Account Type</th>
                                        <th>Dollar Rate</th>
                                        <th>BM ID</th>
                                        <th>Monthly Budget</th>
                                        <th>FB Page Links</th>
                                        <th>Website Links</th>
                                        <th>Status</th>
                                        <th class="@if (!check('Ad Account')->edit && !check('Ad Account')->delete) d-none @endif" id="action">Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($ad_accounts as $bkey => $ad_account)
                                    <tr>
                                        <td>{{ $bkey + 1 }}</td>
                                        <td>{{ $ad_account->user->name }}</td>
                                        <td>{{ $ad_account->name }}</td>
                                        <td>{{ $ad_account->account_type_formatted }}</td>
                                        <td>{{ $ad_account->dollar_rate }}</td>
                                        <td> {{$ad_account->bm_id}} </td>
                                        <td>{{ $ad_account->monthly_budget }}</td>
                                        <td>
                                            <a target="_blank" href="{{ $ad_account->fb_page_link1 }}">Page 1 <x-copybtn/> </a>
                                            @if ($ad_account->fb_page_link2), <a href="{{$ad_account->fb_page_link2}}" target="_blank">Page 2</a> @endif
                                            @if ($ad_account->fb_page_link3), <a href="{{$ad_account->fb_page_link3}}" target="_blank">Page 3</a> @endif
                                            @if ($ad_account->fb_page_link4), <a href="{{$ad_account->fb_page_link4}}" target="_blank">Page 4</a> @endif
                                            @if ($ad_account->fb_page_link5), <a href="{{$ad_account->fb_page_link5}}" target="_blank">Page 5</a> @endif
                                        </td>
                                        <td>
                                            <a target="_blank" href="{{ $ad_account->website_link1 }}">Website 1</a>
                                            @if ($ad_account->website_link2), <a href="{{$ad_account->website_link2}}" target="_blank">Website 2</a> @endif

                                        </td>
                                        <td>{{ $ad_account->status_formatted }}</td>
                                        <td
                                            class="text-middle py-0 align-middle @if (!check('Ad Account')->edit && !check('Ad Account')->delete) d-none @endif">
                                            <div class="btn-group">
                                                <a href="javascript:void(0);"
                                                    class="btn btn-dark btnEdit @if (!check('Ad Account')->edit) d-none @endif"
                                                    data-id="{{ $ad_account->id }}"
                                                    data-accountname="{{ $ad_account->name }}"
                                                    data-dollar_rate="{{ $ad_account->dollar_rate }}"
                                                    data-status="{{ $ad_account->status }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                {{-- @endif --}}
                                                {{-- @if (Auth::user()->can('delete Ad Account') || Auth::user()->role->id == 1) --}}
                                                {{-- <a href="{{ route('balance.destroy', $ad_account->id) }}"
                                                    class="btn btn-danger btnDelete @if (!check('Ad Account')->delete) d-none @endif"><i class="fas fa-trash"></i></a> --}}
                                                {{-- @endif --}}
                                            </div>
                                        </td>
                                    </tr>
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



    <!-- Edit Ad Account Modal -->
    <div class="modal fade" id="editAdAccountModel" tabindex="-1" role="dialog" aria-labelledby="editAdAccountModelLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div id="editAccountErrors" class="alert alert-danger d-none"></div>
            <form id="editAccountForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAdAccountModelLabel">Edit Ad Account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="ad_account_id" name="ad_account_id">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="dollar_rate">Name</label>
                            <input type="number" class="form-control" id="dollar_rate" name="dollar_rate" required>
                        </div>
                        <div class="form-group">
                            <label for="status">is approved</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="1">Approved</option>
                                <option value="2">Pending</option>
                                <option value="3">Disclose</option>
                                <option value="3">Close</option>
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
                var account_name = $(this).data('accountname');
                var dollar_rate = $(this).data('dollar_rate');
                var status = $(this).data('status');

                $('#ad_account_id').val(id);
                $('#name').val(account_name);
                $('#dollar_rate').val(Number(dollar_rate));
                $('#status').val(status);

                $('#editAccountErrors').addClass('d-none').empty();

                $('#editAdAccountModel').modal('show');
            });

            // AJAX form submit
            $('#editAccountForm').on('submit', function(e) {
                e.preventDefault();
                var id = $('#ad_account_id').val();
                var formData = $(this).serialize();

                $.ajax({
                    url: '/ad-account/' + id + '/ajax-update',
                    type: 'POST',
                    data: formData + '&_method=PUT',
                    success: function(response) {
                        $('#editAdAccountModel').modal('hide');
                        var row = $('a[data-id="' + id + '"]').closest('tr');
                        row.find('td').eq(2).text($('#name').val());
                        row.find('td').eq(4).text($('#dollar_rate').val());
                        row.find('td').eq(9).text(statusText($('#status').val()));
                        // Update data-attributes on the edit button
                        var btnEdit = row.find('.btnEdit');
                            btnEdit.data('accountname', $('#name').val());
                            btnEdit.data('dollar_rate', $('#dollar_rate').val());
                            btnEdit.data('status', $('#status').val());

                        showToast('Account updated successfully!', 'success');
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
                            $('#editAccountErrors').removeClass('d-none').html(errorHtml);
                        } else {
                            $('#editAccountErrors').removeClass('d-none').html(
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
                    return 'Disclose';
                case 4:
                    return 'Close';
                default:
                    return '';
            }
        }
    </script>
@endpush
