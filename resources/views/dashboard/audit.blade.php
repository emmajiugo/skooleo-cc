@extends('layouts.dash-layout')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Audit Logs</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Audit Logs
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body"><!-- Bar charts section start -->
                <section id="chartjs-bar-charts">
                    <!-- Column Chart -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Search with Reference/User email</h4>
                                    <a class="heading-elements-toggle">
                                        <i class="la la-ellipsis-v font-medium-3"></i>
                                    </a>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="row" action="{{ route('audit.search') }}" method="POST">
                                            @csrf
                                            <div class="col-md-7 form-group">
                                                <input type="text" name="searchquery" class="form-control" placeholder="Reference/User email" autofocus>
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <input type="submit" class="btn btn-danger" value="Search">
                                            </div>
                                        </form>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content collapse show">
                                    {{-- <div class="card-body">
                                        <br><br>
                                    </div> --}}
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">User</th>
                                                    <th scope="col">Action</th>
                                                    <th scope="col">Request</th>
                                                    <th scope="col">Response</th>
                                                    <th scope="col">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @isset($data)
                                                    @foreach ($data as $log)
                                                    <tr>
                                                        <td>
                                                            @php
                                                                $name = explode("@", $log->email); echo $name[0];
                                                            @endphp
                                                        </td>
                                                        <td>{{ $log->action }}</td>
                                                        <td style="font-family:Courier; background-color:#F5F5F5; color:#000">
                                                            @php
                                                                $response = json_decode($log->payload, true);
                                                                unset($response['_token']);
                                                                echo json_encode($response, JSON_PRETTY_PRINT);
                                                            @endphp
                                                        </td>
                                                        <td style="font-family:Courier; background-color:#e8e8e8; color:#000">
                                                            @php
                                                                $response = json_decode($log->response, true);
                                                                echo json_encode($response, JSON_PRETTY_PRINT);
                                                            @endphp
                                                        </td>
                                                        <td>{{ date("Y/m/d", strtotime($log->created_at)) }}</td>
                                                    </tr>
                                                    @endforeach
                                                @endisset
                                            </tbody>
                                        </table>
                                    </div>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table head options end -->

                </section>
            </div>
        </div>
    </div>

@endsection
