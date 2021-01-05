@extends('layouts.dash-layout')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Invoices</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Invoices
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
                            <div class="card-header">
                                <h4 class="card-title">Invoices</h4>
                                <a class="heading-elements-toggle">
                                    <i class="la la-ellipsis-v font-medium-3"></i>
                                </a>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <table id="transactions" class="display table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th><b>Invoice Reference</b></th>
                                                <th><b>Student Name</b></th>
                                                <th><b>Section</b></th>
                                                <th><b>Class</b></th>
                                                <th><b>Term</b></th>
                                                <th><b>Session</b></th>
                                                <th><b>Total Paid</b></th>
                                                <th><b>Status</b></th>
                                                <th><b>Date</b></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="transaction-body">
                                            @foreach ($invoices as $invoice)
                                            <tr>
                                                <td>#{{ $invoice->invoice_reference }}</td>
                                                <td>{{ $invoice->studentname }}</td>
                                                <td>{{ $invoice->section }}</td>
                                                <td>{{ $invoice->class }}</td>
                                                <td>{{ $invoice->term }}</td>
                                                <td>{{ $invoice->session }}</td>
                                                <td>{{ ($invoice->amount + $invoice->skooleo_fee) }}</td>
                                                <td>
                                                    {!! ($invoice->status=='PAID') ? '<button class="btn btn-success btn-sm">PAID</button>' : '<button class="btn btn-danger btn-sm">UNPAID</button>'  !!}
                                                </td>
                                                <td>{{ date("d-M-Y", strtotime($invoice->created_at)) }}</td>
                                                <td>
                                                    @if ($invoice->status=='UNPAID')
                                                        <a href="" class="btn btn-sm btn-secondary">Verify</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
