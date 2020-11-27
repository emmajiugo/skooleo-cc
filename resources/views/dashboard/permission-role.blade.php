@extends('layouts.dash-layout')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Add User</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Assign Permissions to Roles
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
                                    <h4 class="card-title">Assign Permissions to Roles</h4>
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
                                        <form class="row" action="{{ route('assign.roles.permissions') }}" method="POST">
                                            @csrf
                                            <div class="col-md-7 form-group">
                                                <label>Select Role</label>
                                                <select name="role" class="form-control" required>
                                                    <option value="">-- select user role --</option>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->name }}">{{ ucwords($role->name) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-7 form-group">
                                                <label>Set Permissions for this role</label>
                                                <br>
                                                <div class="row">
                                                    @isset($permissions)

                                                        @foreach ($permissions as $permission)
                                                            <div class="col-md-6">
                                                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}">
                                                                <b>{{ ucwords($permission->name) }}</b>
                                                            </div>
                                                        @endforeach

                                                    @endisset
                                                </div>
                                            </div>
                                            <div class="col-md-7 form-group">
                                                <label>Assign/Revoke</label>
                                                <select name="action" class="form-control" required>
                                                    <option value="">--select action--</option>
                                                    <option value="assign">Assign Permissions</option>
                                                    <option value="revoke">Revoke Permissions</option>
                                                </select>
                                            </div>
                                            <div class="col-md-7 form-group">
                                                <input type="submit" class="btn btn-danger btn-block" value="Assign/Revoke Permission">
                                            </div>
                                            <br><br>
                                        </form>

                                        <br>
                                        <span><strong>NB: </strong>Only Super-Admins can assign <code>Permissions</code> to <code>Roles</code> </span>
                                        <br><br>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th scope="col">Roles</th>
                                                        <th scope="col">Permissions for the Role</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($role_with_permission)
                                                        @php
                                                            $sn = 0;
                                                        @endphp
                                                        @foreach ($role_with_permission as $data)
                                                            @if ($data['role'] != "super admin")
                                                                <tr>
                                                                    <td>{{ ++$sn }}</td>
                                                                    <td>{{ ucwords($data['role']) }}</td>
                                                                    <td>
                                                                        @foreach ($data['permissions'] as $permission)
                                                                            <button style="margin:2px" class="btn btn-sm btn-secondary">{{ $permission['name'] }}</button>
                                                                        @endforeach
                                                                    </td>
                                                                </tr>
                                                            @endif
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
