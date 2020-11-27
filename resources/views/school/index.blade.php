@extends('layouts.dash-layout')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Search</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    View
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
                                <h4 class="card-title">View Schools</h4>
                                <a class="heading-elements-toggle">
                                    <i class="la la-ellipsis-v font-medium-3"></i>
                                </a>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <table id="transactions" class="display table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th><b>S/N</b></th>
                                                <th><b>School Number</b></th>
                                                <th><b>School Name</b></th>
                                                <th><b>Status</b></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="transaction-body">
                                            @foreach ($schools as $school)
                                            <tr>
                                                <td>#</td>
                                                <td>{{ $school->school_number }}</td>
                                                <td>{{ $school->schoolname }}</td>
                                                <td>
                                                    {!! ($school->verifystatus==1) ? '<button class="btn btn-success btn-sm">Active</button>' : '<button class="btn btn-danger btn-sm">Not Active</button>'  !!}
                                                </td>
                                                <td><a href="{{ route('schools.view', $school->id) }}" class="btn btn-primary btn-sm">View</a> <a href="{{  route('schools.withdraws', $school->id)  }}" class="btn btn-secondary btn-sm">Withdraws</a></td>
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
