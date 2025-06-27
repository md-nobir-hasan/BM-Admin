@extends('backend.layouts.app')

@section('title', 'site Management')

@push('page_css')
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                        @include('backend.partial.flush-message')
                        <form action="{{route('setting.site.store')}}" method="POST">
                            @csrf
                            {{-- @foreach ($services as $key => $service) --}}
                            <hr>
                            <h2 class="text-center mb-4">Global Settings</h2>
                            <hr>
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    {{-- <form> --}}
                                        <div class="form-row align-items-center justify-content-center">
                                            <div class="col-auto">
                                                <label for="dollar_rate" class="col-form-label font-weight-bold mr-2">
                                                    <i class="fas fa-dollar-sign text-success"></i> Dollar Rate:
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <input
                                                    type="number"
                                                    name="dollar_rate"
                                                    class="form-control"
                                                    id="dollar_rate"
                                                    value="{{ $site_setting->dollar_rate }}"
                                                    min="0"
                                                    step="0.01"
                                                    placeholder="Enter dollar rate"
                                                    style="max-width: 180px;"
                                                >
                                            </div>
                                        </div>
                                    {{-- </form> --}}
                                </div>
                            </div>
                            <hr class="mt-5">
                            <button type="submit" class="btn btn-info w-100">Save Settings</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
