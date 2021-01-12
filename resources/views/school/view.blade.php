@extends('layouts.dash-layout')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">School Details</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    School Details
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
                                                                <h3 class="font-large-2 white">&#8358; {{ $school->total_amount  }}</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="card pull-up bg-gradient-directional-success">
                                                <div class="card-header bg-hexagons-success">
                                                    <h4 class="card-title white">Paid Invoices</h4>
                                                </div>
                                                <div class="card-content show bg-hexagons-primary">
                                                    <div class="card-body">
                                                        <div class="media d-flex">
                                                            <div class="media-body text-left mt-1">
                                                                <h3 class="font-large-2 white">{{ $invoices['paid']  }}</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="card pull-up bg-gradient-directional-danger">
                                                <div class="card-header bg-hexagons-danger">
                                                    <h4 class="card-title white">Unpaid Invoices</h4>
                                                </div>
                                                <div class="card-content show bg-hexagons-primary">
                                                    <div class="card-body">
                                                        <div class="media d-flex">
                                                            <div class="media-body text-left mt-1">
                                                                <h3 class="font-large-2 white">{{ $invoices['unpaid']  }}</h3>
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
                                        </div>
                                        <div class="col-6 space-20">
                                            <h4><u>School Name</u></h4>
                                            <p>{{ $school->schoolname }}</p>
                                        </div>
                                        <div class="col-6 space-20">
                                            <h4><u>Status</u></h4>
                                            {!! ($school->verifystatus==1) ? '<button class="btn btn-success btn-sm">Active</button>' : '<button class="btn btn-danger btn-sm">Not Active</button>'  !!}

                                            @if ($school->verifystatus==0)
                                                <a href="{{ route('school.activate', $school->id) }}" class="btn btn-secondary btn-sm">Activate Account</a>
                                            @else
                                                <a href="{{ route('school.disable', $school->id) }}" class="btn btn-secondary btn-sm">Disable Account</a>
                                            @endif
                                        </div>
                                        <div class="col-6 space-20">
                                            <h4><u>School Email</u></h4>
                                            <p>{{ $school->schoolemail }}</p>
                                        </div>
                                        <div class="col-6 space-20">
                                            <h4><u>School Contact</u></h4>
                                            <p>{{ $school->schoolphone }}</p>
                                        </div>
                                        <div class="col-12 space-20">
                                            <h4><u>School Address</u></h4>
                                            <p>{{ $school->schooladdress }}</p>

                                            <br><hr>
                                        </div>
                                        <div class="col-6 space-20">
                                            <h4><u>Registered By</u></h4>
                                            <p>{{ $school->registeredby }}</p>
                                        </div>
                                        <div class="col-6 space-20">
                                            <h4><u>Registrar Status</u></h4>
                                            <p>{{ $school->registrarstatus }}</p>
                                        </div>

                                        <div class="col-6 space-20">
                                            <h4><u>Corporate Account Name</u></h4>
                                            <p>{{ $school->corporate_acctname }}</p>
                                        </div>
                                        <div class="col-6 space-20">
                                            <h4><u>Corporate Account Number</u></h4>
                                            <p>{{ $school->corporate_acctno }} [{{ $school->bankname }}]</p>
                                        </div>
                                        <div class="col-12 space-20">
                                            <hr><br>
                                            <h4><u>Government Approved Document(s)</u></h4>
                                            <p><a href="{{ $school->govt_doc }}" target="_blank" class="btn btn-sm btn-secondary">View Docs</a></p>
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
