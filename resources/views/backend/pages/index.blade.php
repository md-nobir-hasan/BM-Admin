@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="mb-4">
        <h3>Overview</h3>
        <p>Hello Iftekhar Niloy, 👋🏻 This is your regular dashboard!</p>
    </div>

    <!-- Summary Cards -->
    <div class="row mb-4">
        <div class="col-md-2 mb-2">
            <div class="card text-white bg-danger h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-plus-square fa-2x mr-2"></i>
                        <div>
                            <div>Pending Deposit</div>
                            <h4 class="mb-0">0</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 mb-2">
            <div class="card text-white bg-success h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fab fa-facebook-messenger fa-2x mr-2"></i>
                        <div>
                            <div>Pending Accounts</div>
                            <h4 class="mb-0">0</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Repeat for other summary cards, changing colors/icons/text as needed -->
        <!-- ... -->
        <div class="col-md-2 mb-2">
            <div class="card text-white bg-primary h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-wrench fa-2x mr-2"></i>
                        <div>
                            <div>Ad Accounts in Review</div>
                            <h4 class="mb-0">2</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add more cards for Low Balance, Restricted by Meta, etc. -->
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
                    <h4>$0.00</h4>
                    <small>Last deposit: 05 Jun 2025</small>
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
                    <input type="text" class="form-control d-inline-block" style="width: 200px;" placeholder="Search ad accounts">
                    <button class="btn btn-primary ml-2">Create Ad Account +</button>
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
                        <tr>
                            <td>
                                #10306-ebc~Shefa_Khana<br>
                                <small>id - 882382637182705</small><br>
                                <a href="#">https://www.facebook.com/share/1J981ZBm8L/</a>
                            </td>
                            <td>
                                Business Clinic BM<br>
                                1141985384140636<br>
                                Health Industries<br>
                                3291046091166528
                            </td>
                            <td>$0.01</td>
                            <td>$0</td>
                            <td>$0.01</td>
                            <td><span class="badge badge-danger">Closed</span></td>
                            <td>
                                <button class="btn btn-light btn-sm"><i class="fas fa-ellipsis-h"></i></button>
                            </td>
                            <td>
                                <button class="btn btn-secondary btn-sm" disabled>Top Up</button>
                            </td>
                        </tr>
                        <!-- Repeat for other ad accounts -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
