@extends('layouts.dash-layout')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">School Withdrawals</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    School Withdrawals
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card" style="min-height:400px">
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-4">
                                            <div class="card pull-up bg-gradient-directional-primary">
                                                <div class="card-header bg-hexagons-primary">
                                                    <h4 class="card-title white">Available Balance</h4>
                                                </div>
                                                <div class="card-content show bg-hexagons-primary">
                                                    <div class="card-body">
                                                        <div class="media d-flex">
                                                            <div class="media-body text-left mt-1">
                                                                <h3 class="font-large-2 white">&#8358;{{ $school['total_amount'] }}</h3>
                                                                <span>.</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="card pull-up bg-gradient-directional-success">
                                                <div class="card-header bg-hexagons-success">
                                                    <h4 class="card-title white">Total Paid Invoices</h4>
                                                </div>
                                                <div class="card-content show bg-hexagons-primary">
                                                    <div class="card-body">
                                                        <div class="media d-flex">
                                                            <div class="media-body text-left mt-1">
                                                                <h3 class="font-large-2 white">&#8358;{{ $totalPaidInvoice }}</h3>
                                                                <span>.</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="card pull-up bg-gradient-directional-danger">
                                                <div class="card-header bg-hexagons-danger">
                                                    <h4 class="card-title white">Total Successful Withdraws</h4>
                                                </div>
                                                <div class="card-content show bg-hexagons-primary">
                                                    <div class="card-body">
                                                        <div class="media d-flex">
                                                            <div class="media-body text-left mt-1">
                                                                <h3 class="font-large-2 white">
                                                                    &#8358;{{ $totalSuccessWithdraws }}
                                                                </h3>
                                                                <span style="font-size:14px; color:#fff">FEES: &#8358;{{ $totalSuccessWithdrawFee }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <br><br>

                                            <table id="transactions" class="display table table-striped" style="width:100%">
                                                <thead>
                                                    <th>S/N</th>
                                                    <th>Reference</th>
                                                    <th>Amount</th>
                                                    <th>Bank</th>
                                                    <th>Account Name</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                </thead>
                                                <tbody>
                                                    @forelse ($withdraws as $withdraw)
                                                    <tr>
                                                        <td>#</td>
                                                        <td>{{ $withdraw->reference }}</td>
                                                        <td>{{ $withdraw->currency }} {{ $withdraw->amount }}</td>
                                                        <td>{{ $withdraw->bank_name }}</td>
                                                        <td>{{ $withdraw->fullname }}</td>
                                                        <td>
                                                            <button class="btn btn-sm
                                                            @php
                                                                if ($withdraw->status == "FAILED") echo 'btn-danger';
                                                                if ($withdraw->status == "PENDING") echo 'btn-warning';
                                                                if ($withdraw->status == "SUCCESSFUL") echo 'btn-success';
                                                            @endphp
                                                            ">{{ $withdraw->status }}</button>
                                                        </td>
                                                        <td><a href="" class="btn btn-sm btn-secondary">View</a></td>
                                                    </tr>
                                                    @empty
                                                        <div class="alert alert-warning">
                                                            <strong>Ouch!</strong> No withdrawal yet on the account.
                                                        </div>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-12 space-60"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
