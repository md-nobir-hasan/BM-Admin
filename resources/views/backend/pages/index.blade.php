@extends('backend.layouts.app')

@section('content')


@if($errors->any())
    <div aria-live="polite" aria-atomic="true" style="position: fixed; top: 1rem; right: 1rem; z-index: 9999;">
        <div class="toast show errorToast"  data-delay="3000" style="min-width: 250px;">
            <div class="toast-header bg-danger text-white">
                <strong class="mr-auto">Error</strong>
                <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                {{ $errors->first() }} | try again
            </div>
        </div>
    </div>
@endif

    <div class="container-fluid">

        <!-- Header with Add Balance Button -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3>Overview</h3>
                <p>Hello Iftekhar Niloy, 👋🏻 This is your regular dashboard!</p>
            </div>
            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#depositWizardModal">Add Balance &nbsp; <i
                    class="fas fa-arrow-right"></i></button>
        </div>

        <!-- Summary Cards (6 small cards in a row) -->
        <div class="row mb-4">
            <div class="col-6 col-md-2 mb-2">
                <div class="card text-white bg-danger h-100">
                    <div class="card-body p-2 d-flex align-items-center">
                        <i class="fas fa-plus-square fa-lg mr-2"></i>
                        <div>
                            <div style="font-size: 14px;">Pending Deposit</div>
                            <div style="font-size: 20px; font-weight: bold;">0</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-2 mb-2">
                <div class="card text-white bg-success h-100">
                    <div class="card-body p-2 d-flex align-items-center">
                        <i class="fab fa-facebook-messenger fa-lg mr-2"></i>
                        <div>
                            <div style="font-size: 14px;">Pending Accounts</div>
                            <div style="font-size: 20px; font-weight: bold;">0</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-2 mb-2">
                <div class="card text-white bg-purple h-100" style="background: #8e44ad;">
                    <div class="card-body p-2 d-flex align-items-center">
                        <i class="fas fa-ad fa-lg mr-2"></i>
                        <div>
                            <div style="font-size: 14px;">Share & Remove Ad Acc Requests</div>
                            <div style="font-size: 20px; font-weight: bold;">0</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-2 mb-2">
                <div class="card text-white bg-primary h-100">
                    <div class="card-body p-2 d-flex align-items-center">
                        <i class="fas fa-wrench fa-lg mr-2"></i>
                        <div>
                            <div style="font-size: 14px;">Ad Accounts in Review</div>
                            <div style="font-size: 20px; font-weight: bold;">2</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-2 mb-2">
                <div class="card text-white bg-warning h-100">
                    <div class="card-body p-2 d-flex align-items-center">
                        <i class="fas fa-dollar-sign fa-lg mr-2"></i>
                        <div>
                            <div style="font-size: 14px;">Low Balance</div>
                            <div style="font-size: 20px; font-weight: bold;">2</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-2 mb-2">
                <div class="card text-white bg-danger h-100">
                    <div class="card-body p-2 d-flex align-items-center">
                        <i class="fas fa-ban fa-lg mr-2"></i>
                        <div>
                            <div style="font-size: 14px;">Restricted by Meta</div>
                            <div style="font-size: 20px; font-weight: bold;">1</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Info Cards -->
        <div class="row mb-4">
            <div class="col-md-3 mb-2">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-wallet fa-2x text-primary mr-2"></i>
                            <span>Wallet Balance</span>
                        </div>
                        <h4>${{$wallet->sum('amount')}}</h4>
                        @php
                            $lastDeposit = $wallet->sortByDesc('created_at')->first();
                        @endphp
                        <small>Last deposit: {{ $lastDeposit ? $lastDeposit->created_at->format('d M Y') : 'N/A' }}</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-2">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-dollar-sign fa-2x text-info mr-2"></i>
                            <span>Current USD Rate</span>
                        </div>
                        <h4>৳128.00/USD</h4>
                        <small>Expires on: 30 Apr 2025</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-2">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fab fa-facebook fa-2x text-purple mr-2"></i>
                            <span>Total Ad Accounts Balance</span>
                        </div>
                        <h4>299.17</h4>
                        <small>Including Closed Ad Accounts</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-2">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-ad fa-2x text-success mr-2"></i>
                            <span>Active Ad Accounts</span>
                        </div>
                        <h4>1</h4>
                        <small>3 Total</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ad Accounts Table -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Ad Accounts</h5>
                    <div>
                        <input type="text" class="form-control d-inline-block" style="width: 200px;"
                            placeholder="Search ad accounts">
                        <button class="btn btn-primary ml-2" data-toggle="modal" data-target="#createAdAccountModal">Create
                            Ad Account +</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Ad Account</th>
                                <th>Connected BM</th>
                                <th>Balance</th>
                                <th>Total Spent</th>
                                <th>Limit</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Top Up</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ad_accounts as $ad_account)
                                <tr>
                                    <td>
                                        {{$ad_account->name}}<br>
                                        <small>id - {{$ad_account->bm_id}}</small><br>
                                        <a href="{{$ad_account->fb_page_link1}}" target="_blank">Page 1</a>
                                    </td>
                                    <td>
                                        Business Clinic BM<br>
                                        1141985384140636<br>
                                        Health Industries<br>
                                        3291046091166528
                                    </td>
                                    <td>${{$ad_account->balance}}</td>
                                    <td>${{$ad_account->total_spent}}</td>
                                    <td>${{$ad_account->limit}}</td>
                                    <td><span class="badge @if ($ad_account->status == 1) badge-success @else badge-danger @endif">{{$ad_account->status_formatted}}</span></td>
                                    <td>
                                        <button class="btn btn-light btn-sm"><i class="fas fa-ellipsis-h"></i></button>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm topup-btn @if ($ad_account->status == 1) badge-primary @else  btn-secondary @endif"
                                            @if ($ad_account->status == 1)
                                                data-account="{{$ad_account->name}} - {{$ad_account->bm_id}}" data-toggle="modal"
                                                data-target="#topupModal" data-balanceid='{{$ad_account->id}}'
                                            @else
                                                disabled
                                            @endif>
                                            Top Up
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Deposit Wizard Modal -->
    <div class="modal fade" id="depositWizardModal" tabindex="-1" role="dialog" aria-labelledby="depositWizardModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 12px;">
                <div class="modal-body" style="background: #f7f9fb;">
                    <div id="depositWizard">
                        <!-- Stepper -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center"
                                style="max-width: 600px; margin: 0 auto;">
                                <div class="text-center flex-fill">
                                    <div id="step1Circle" class="wizard-circle active">1</div>
                                    <div>Bank Info</div>
                                </div>
                                <div class="wizard-line"></div>
                                <div class="text-center flex-fill">
                                    <div id="step2Circle" class="wizard-circle">2</div>
                                    <div>Payment Info</div>
                                </div>
                                <div class="wizard-line"></div>
                                <div class="text-center flex-fill">
                                    <div id="step3Circle" class="wizard-circle">3</div>
                                    <div>Check & Finish</div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <!-- Left: Main Content -->
                            <div class="col-md-8 card p-3">
                                <form action="{{route('wallet.balance.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <!-- Step 1: Bank Info -->
                                    <div class="wizard-step" id="wizardStep1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6>Select Bank</h6>
                                                <div id="bankList">
                                                    <input type="hidden" name="bank_type" id="bank_type">
                                                    <!-- Example banks, replace with dynamic if needed -->
                                                    <div class="bank-card mb-2 p-3"
                                                        data-bank='{"id":"PA13","name":"Dutch Bangla Bank","acc":"1201100188003","branch":"Khulna","logo":"https://i.ibb.co/6b8Qw7d/dbbl.png"}'>
                                                        <div class="d-flex align-items-center">
                                                            <img src="https://i.ibb.co/6b8Qw7d/dbbl.png" alt="DBBL"
                                                                width="36" class="mr-2">
                                                            <div>
                                                                <div class="text-muted" style="font-size:12px;">ID: PA13</div>
                                                                <div class="font-weight-bold">Dutch Bangla Bank</div>
                                                                <div style="font-size:13px;">1201100188003</div>
                                                                <div class="text-muted" style="font-size:12px;">Khulna</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bank-card mb-2 p-3"
                                                        data-bank='{"id":"PA08","name":"United Commercial","acc":"0612112000005521","branch":"KHULNA > khanjan Ali","logo":"https://i.ibb.co/0jQw7dC/ucb.png"}'>
                                                        <div class="d-flex align-items-center">
                                                            <img src="https://i.ibb.co/0jQw7dC/ucb.png" alt="UCB"
                                                                width="36" class="mr-2">
                                                            <div>
                                                                <div class="text-muted" style="font-size:12px;">ID: PA08</div>
                                                                <div class="font-weight-bold">United Commercial</div>
                                                                <div style="font-size:13px;">0612112000005521</div>
                                                                <div class="text-muted" style="font-size:12px;">KHULNA &gt;
                                                                    khanjan Ali</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h6>Bank Details</h6>
                                                <div id="bankDetails" class="p-3"
                                                    style="background:#fff; border-radius:8px; min-height:120px;">
                                                    <span class="text-muted">Select a bank to see details.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right mt-4">
                                            <button class="btn btn-primary" id="toStep2" disabled>Next &rarr;</button>
                                        </div>
                                    </div>

                                    <!-- Step 2: Payment Info -->
                                    <div class="wizard-step d-none" id="wizardStep2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Amount in BDT <span class="text-danger">*</span> </label>
                                                    <input type="number" name="amount" value="{{old('amount')}}"
                                                     class="form-control" id="amountBdt"
                                                        placeholder="৳ Amount">
                                                    @error('amount')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                    <small id="amountWords" class="form-text text-muted"></small>
                                                </div>
                                                <div class="form-group">
                                                    <label>Trx ID or Reference <span class="text-danger">*</span></label>
                                                    <input type="text" name="trx_id" value="{{old('trx_id')}}" class="form-control" id="trxId"
                                                        placeholder="Transaction ID">
                                                    @error('trx_id')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Receipt copy or screenshot</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="ss" class="custom-file-input" id="receiptFile">
                                                        <label class="custom-file-label" for="receiptFile">Choose file</label>
                                                        @error('ss')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <small id="fileName" class="form-text text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label>You will receive the amount in USD:</label>
                                                <div class="p-4"
                                                    style="background:#f4f8fc; border:1.5px solid #bcd2f7; border-radius:8px;">
                                                    <div style="font-size:2rem; font-weight:600;" id="usdAmount">$0.00</div>
                                                    <div class="text-muted" style="font-size:14px;">
                                                        Your current USD rate is <span id="usdRate">128</span> BDT/USD and
                                                        will expire on <span id="usdRateExpire">4/30/2025</span>.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-4">
                                            <button class="btn btn-secondary" id="backToStep1">&larr; Back</button>
                                            <button class="btn btn-primary" id="toStep3" disabled>Next &rarr;</button>
                                        </div>
                                    </div>
                                    <!-- Step 3: Check & Finish -->
                                    <div class="wizard-step d-none" id="wizardStep3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6>Bank</h6>
                                                <div id="summaryBank"></div>
                                                <hr>
                                                <div><b>Amount in BDT</b><br>৳ <span id="summaryBdt"></span></div>
                                                <div class="mt-2"><b>Trx ID or Reference</b><br><span
                                                        id="summaryTrx"></span></div>
                                                <div class="mt-2"><b>Receipt copy or screenshot</b><br>
                                                    <span id="summaryFile"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h6>USD Amount:</h6>
                                                <div style="font-size:2rem; font-weight:600;" id="summaryUsd">$0.00</div>
                                                <div class="text-muted">Based on your current USD rate</div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-4">
                                            <button class="btn btn-secondary" id="backToStep2">&larr; Back</button>
                                            <button class="btn btn-primary" id="finishWizard">Finish &rarr;</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Right: Tips -->
                            <div class="col-md-4">
                                <div class="p-3" style="background:#fffbe6; border-radius:8px;">
                                    <b><i class="fas fa-lightbulb"></i> Tips</b>
                                    <div class="mt-2" style="font-size:15px;">
                                        <b>Here's how to proceed with your deposit:</b>
                                        <ol style="font-size:14px;">
                                            <li>Review the USD rate.</li>
                                            <li>Select your preferred payment method.</li>
                                            <li>Check payment details in the deposit wizard.</li>
                                            <li>Fill out the required information in the form.</li>
                                            <li>Complete the wizard.</li>
                                            <li>Your account will be credited once verified by Salaf LLC Admin.</li>
                                        </ol>
                                        Need assistance? Feel free to reach out to our <a href="#">support</a> team.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create New Ad Account Modal -->
    <div class="modal fade" id="createAdAccountModal" tabindex="-1" role="dialog"
        aria-labelledby="createAdAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 18px; max-width: 430px; margin: auto;">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title w-100 text-center font-weight-bold" id="createAdAccountModalLabel"
                        style="font-size: 1.5rem;">Create new ad account</h5>
                    <button type="button" class="close position-absolute" style="right: 18px;" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true" style="font-size: 2rem;">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-0">
                    <form id="adAccountForm" autocomplete="off" action="{{route('ad_account.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="mb-1">Suggested Ads Account Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{old('name')}}"
                                class="form-control" placeholder="Insert suggested ads account name"
                                required>
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        {{-- BM ID --}}
                        <div class="form-group">
                            <label class="mb-1">Client's BM ID<span class="text-danger">*</span></label>
                            <input type="text" name="bm_id" value="{{old('bm_id')}}"
                                 class="form-control" placeholder="Insert BM ID of client" required>
                            @error('bm_id')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        {{-- Credit line --}}
                        <div class="form-group">
                            <label class="mb-1">Credit Line<span class="text-danger">*</span></label>
                            <input type="text" name="credit_line" value="{{old('credit_line')}}"
                                 class="form-control" placeholder="Insert Credit Line Here" required>
                            @error('credit_line')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        {{-- Card Line --}}
                        <div class="form-group">
                            <label class="mb-1">Card Line<span class="text-danger">*</span></label>
                            <input type="text" name="card_line" value="{{old('card_line')}}"
                                 class="form-control" placeholder="Insert Card Line Here" required>
                            @error('card_line')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label class="mb-1">Timezone</label>
                            <select class="form-control" required>
                                <option value="">Choose timezone...</option>
                                <option value="Asia/Dhaka">Asia/Dhaka (GMT+6)</option>
                                <option value="Asia/Kolkata">Asia/Kolkata (GMT+5:30)</option>
                                <option value="America/New_York">America/New_York (GMT-5)</option>
                                <!-- Add more as needed -->
                            </select>
                        </div> --}}

                        {{-- FB Page Link1 --}}
                        <div class="form-group">
                            <label class="mb-1">FB Page Link 1<span class="text-danger">*</span></label>
                            <input type="url" name="fb_page_link1" value="{{old('fb_page_link1')}}"
                                 class="form-control" placeholder="Insert fb page link here" required>
                            @error('fb_page_link1')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        {{-- FB Page Link2 --}}
                        <div class="form-group">
                            <label class="mb-1">FB Page Link 2</label>
                            <input type="url" name="fb_page_link2" value="{{old('fb_page_link2')}}"
                                 class="form-control" placeholder="Insert fb page link here" >
                            @error('fb_page_link2')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        {{-- FB Page Link3 --}}
                        <div class="form-group">
                            <label class="mb-1">FB Page Link 3</label>
                            <input type="url" name="fb_page_link3" value="{{old('fb_page_link3')}}"
                                 class="form-control" placeholder="Insert fb page link here" >
                            @error('fb_page_link3')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        {{-- FB Page Link4 --}}
                        <div class="form-group">
                            <label class="mb-1">FB Page Link 4</label>
                            <input type="url" name="fb_page_link4" value="{{old('fb_page_link4')}}"
                                 class="form-control" placeholder="Insert fb page link here" >
                            @error('fb_page_link4')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        {{-- FB Page Link5 --}}
                        <div class="form-group">
                            <label class="mb-1">FB Page Link 5</label>
                            <input type="url" name="fb_page_link5" value="{{old('fb_page_link5')}}"
                                 class="form-control" placeholder="Insert fb page link here">
                            @error('fb_page_link5')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        {{-- Website Link 1 --}}
                        <div class="form-group">
                            <label class="mb-1">Website Link 1<span class="text-danger">*</span></label>
                            <input type="url" name="website_link1" value="{{old('website_link1')}}"
                                 class="form-control" placeholder="Insert website link here" required>
                            @error('website_link1')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        {{-- Website Link 2 --}}
                        <div class="form-group">
                            <label class="mb-1">Website Link 2</label>
                            <input type="url" name="website_link2" value="{{old('website_link2')}}"
                                 class="form-control" placeholder="Insert website link here">
                            @error('website_link2')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label class="mb-1">Monthly Budget<span class="text-danger">*</span> </label>
                            <input type="number" name="monthly_budget" value="{{old('monthly_budget')}}" class="form-control" placeholder="$" min="0" required>
                            @error('monthly_budget')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="mb-1">Campaign Start Date</label>
                            <input type="date" name="campaign_start_date" value="{{old('campaign_start_date')}}" class="form-control"
                                placeholder="Enter the campaign start date for the ad account">
                            @error('campaign_start_date')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block font-weight-bold"
                            style="font-size: 1.1rem;">
                            Submit Request &nbsp; <i class="fas fa-arrow-right"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Up Account Balance Modal -->
    <div class="modal fade" id="topupModal" tabindex="-1" role="dialog" aria-labelledby="topupModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 18px; max-width: 500px; margin: auto;">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title w-100 text-center font-weight-bold" id="topupModalLabel"
                        style="font-size: 1.3rem;">Top up account balance</h5>
                    <button type="button" class="close position-absolute" style="right: 18px;" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true" style="font-size: 2rem;">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-0">
                    <form id="topupForm" action="{{route('ad_account.topup')}}" method="POST" autocomplete="off">
                        @csrf
                        <input type="hidden" name="balance_id" id="balance_id" >
                        <div class="form-group">
                            <label class="mb-1">Add Account</label>
                            <input type="text" class="form-control" id="topupAccount" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-1">Amount</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" name="amount" class="form-control" id="topupAmount" placeholder="Enter amount"
                                    min="0" required>
                                @error('amount')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary font-weight-bold"
                            style="font-size: 1.1rem;">
                            Top Up
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Wizard Stepper Styles -->
@endsection

@push('page_scripts')
    <script>
        $(function() {
            // Wizard state
            let selectedBank = null,
                amountBdt = '',
                trxId = '',
                fileName = '',
                usdRate = 128,
                usdRateExpire = '4/30/2025';

            // Bank selection
            $('#bankList .bank-card').click(function() {
                $('#bankList .bank-card').removeClass('selected');
                $(this).addClass('selected');
                selectedBank = $(this).data('bank');
                $('#bank_type').val(selectedBank.name);
                $('#bankDetails').html(`
                    <div class="d-flex align-items-center mb-2">
                        <img src="${selectedBank.logo}" width="36" class="mr-2">
                        <div>
                        <div class="text-muted" style="font-size:12px;">ID: ${selectedBank.id}</div>
                        <div class="font-weight-bold">${selectedBank.name}</div>
                        <div style="font-size:13px;">${selectedBank.acc}</div>
                        <div class="text-muted" style="font-size:12px;">${selectedBank.branch}</div>
                        </div>
                    </div>
                `);
                $('#toStep2').prop('disabled', false);
            });

            // Step navigation
            function setStep(step) {
                $('.wizard-step').addClass('d-none');
                $('#wizardStep' + step).removeClass('d-none');
                $('.wizard-circle').removeClass('active completed');
                for (let i = 1; i <= 3; i++) {
                    if (i < step) $('#step' + i + 'Circle').addClass('completed');
                    else if (i === step) $('#step' + i + 'Circle').addClass('active');
                }
            }
            $('#toStep2').click(function(e) {
                e.preventDefault();
                setStep(2);
            });
            $('#backToStep1').click(function(e) {
                e.preventDefault();
                setStep(1);
            });
            $('#toStep3').click(function(e) {
                e.preventDefault();
                // Fill summary
                $('#summaryBank').html(`
            <div class="d-flex align-items-center mb-2">
                <img src="${selectedBank.logo}" width="36" class="mr-2">
                <div>
                <div class="text-muted" style="font-size:12px;">ID: ${selectedBank.id}</div>
                <div class="font-weight-bold">${selectedBank.name}</div>
                <div style="font-size:13px;">${selectedBank.acc}</div>
                <div class="text-muted" style="font-size:12px;">${selectedBank.branch}</div>
                </div>
            </div>
            `);
                $('#summaryBdt').text(amountBdt);
                $('#summaryTrx').text(trxId);
                $('#summaryFile').html(fileName ? `<i class="fas fa-file-alt"></i> ${fileName}` : '');
                $('#summaryUsd').text($('#usdAmount').text());
                setStep(3);
            });
            $('#backToStep2').click(function(e) {
                e.preventDefault();
                setStep(2);
            });

            // Amount in words (simple, for demo)
            function numberToWords(num) {
                // You can use a library for full conversion, this is a placeholder
                if (!num) return '';
                return num.toLocaleString('en-US');
            }
            $('#amountBdt').on('input', function() {
                amountBdt = $(this).val();
                $('#amountWords').text(numberToWords(amountBdt));
                // USD calculation
                let usd = 0;
                if (amountBdt && usdRate) usd = (parseFloat(amountBdt) / usdRate).toFixed(2);
                $('#usdAmount').text('$' + usd);
                $('#toStep3').prop('disabled', !(amountBdt && trxId));
            });
            $('#trxId').on('input', function() {
                trxId = $(this).val();
                $('#toStep3').prop('disabled', !(amountBdt && trxId));
            });
            $('#receiptFile').on('change', function(e) {
                fileName = e.target.files[0] ? e.target.files[0].name + ' (' + (e.target.files[0].size /
                    1024 / 1024).toFixed(2) + ' MB)' : '';
                $('#fileName').text(fileName);
            });

            // Finish
            // $('#finishWizard').click(function() {
            //     // Submit logic here
            //     $('#depositWizardModal').modal('hide');
            //     // Optionally reset wizard
            //     setStep(1);
            //     $('#bankList .bank-card').removeClass('selected');
            //     $('#bankDetails').html('<span class="text-muted">Select a bank to see details.</span>');
            //     $('#amountBdt, #trxId').val('');
            //     $('#amountWords, #fileName').text('');
            //     $('#usdAmount').text('$0.00');
            //     $('#toStep2, #toStep3').prop('disabled', true);
            //     selectedBank = null;
            //     amountBdt = '';
            //     trxId = '';
            //     fileName = '';
            // });

            // Initial state
            setStep(1);

            // When Top Up button is clicked, fill the modal with the account info
            $('.table').on('click', '.topup-btn', function() {
                var account = $(this).data('account');
                var balance_id = $(this).data('balanceid');
                $('#topupAccount').val(account);
                $('#balance_id').val(balance_id);
                $('#topupAmount').val('');
            });

            // Handle form submission (AJAX or just close modal for now)
            // $('#topupForm').on('submit', function(e) {
            //     e.preventDefault();
            //     // You can add AJAX here
            //     $('#topupModal').modal('hide');
            //     // Optionally, show a success message
            //     alert('Top up request submitted!');
            // });
        });

        $(document).ready(function(){
            setTimeout(function(){
                $('.errorToast').toast('hide');
            }, 4000);
        });
    </script>
@endpush

@push('page_css')
    <style>
        .wizard-circle {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #fff;
            border: 2.5px solid #23408e;
            color: #23408e;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 1.2rem;
            margin: 0 auto 6px auto;
            transition: background 0.2s, color 0.2s;
        }

        .wizard-circle.active,
        .wizard-circle.completed {
            background: #23408e;
            color: #fff;
        }

        .wizard-line {
            flex: 1;
            height: 2.5px;
            background: #23408e;
        }

        .bank-card {
            background: #f4f8fc;
            border-radius: 8px;
            cursor: pointer;
            border: 2px solid transparent;
            transition: border 0.2s;
        }

        .bank-card.selected,
        .bank-card:hover {
            border: 2px solid #23408e;
            background: #eaf1fb;
        }

        .wizard-step {
            min-height: 340px;
        }

        .md-border-right {
            border-bottom: 1px solid #28a745 !important;
        }

        @media (min-width: 768px) {
            .md-border-right {
                border-bottom: none !important;
                border-right: 1px solid #28a745 !important;
                /* Bootstrap's success color */
            }
        }

        #createAdAccountModal .modal-content {
            box-shadow: 0 8px 32px rgba(60, 60, 100, 0.18);
            border-radius: 18px;
        }

        #createAdAccountModal .form-control:focus {
            border-color: #23408e;
            box-shadow: 0 0 0 0.1rem rgba(35, 64, 142, .15);
        }

        #createAdAccountModal .btn-primary {
            background: #23408e;
            border-color: #23408e;
            border-radius: 8px;
        }

        #topupModal .modal-content {
            box-shadow: 0 8px 32px rgba(60, 60, 100, 0.18);
            border-radius: 18px;
        }

        #topupModal .form-control:focus {
            border-color: #23408e;
            box-shadow: 0 0 0 0.1rem rgba(35, 64, 142, .15);
        }

        #topupModal .btn-primary {
            background: #23408e;
            border-color: #23408e;
            border-radius: 8px;
        }
    </style>
@endpush
