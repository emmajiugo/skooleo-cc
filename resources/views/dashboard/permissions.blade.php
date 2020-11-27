@extends('layouts.dash-layout')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Permissions</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                        Permissions
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
                            <div class="card" style="min-height:400px">
                                <div class="card-header">
                                    <h4 class="card-title">Setup Permissions</h4>
                                    <a class="heading-elements-toggle">
                                        <i class="la la-ellipsis-v font-medium-3"></i>
                                    </a>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        @isset($message)
                                            <p style="color:green">{{ $message }}</p>
                                            <br>
                                        @endisset
                                        <form class="row" action="{{ route('set.permissions') }}" method="POST">
                                            @csrf
                                            <div class="col-md-7 form-group">
                                                <label for="">Enter Permission</label>
                                                <input type="text" name="permission" class="form-control" placeholder="Enter Permission" required>
                                            </div>
                                            <div class="col-md-7 form-group">
                                                <input type="submit" class="btn btn-danger btn-block" value="Set Permission">
                                            </div>
                                        </form>

                                        <br>
                                        <span><strong>NB: </strong>Only Super-Admins have the permission to set <code>Roles</code> and <code>Permissions</code></span>
                                        <br><br>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">S/N</th>
                                                        <th scope="col">Permissions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($permissions)

                                                        @php
                                                            $sn = 0;
                                                        @endphp

                                                        @foreach ($permissions as $permission)
                                                        <tr>
                                                            <td>{{ ++$sn }}</td>
                                                            <td>{{ ucwords($permission->name) }}</td>
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
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection
