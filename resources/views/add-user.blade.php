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
                                    Add User
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
                                <h4 class="card-title">Add User</h4>
                                <a class="heading-elements-toggle">
                                    <i class="la la-ellipsis-v font-medium-3"></i>
                                </a>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    {{-- @isset($message) --}}
                                        <p style="color:green">{{ Session::get("message") }}</p>
                                        <br>
                                    {{-- @endisset --}}
                                    <form class="row" action="{{ route('adduser.post') }}" method="POST">
                                        @csrf
                                        <div class="col-md-7 form-group">
                                            <label for="">Flutterwave Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="Flutterwave Email" required>
                                        </div>
                                        <div class="col-md-7 form-group">
                                            <label>Add User Role</label>
                                            <select name="role" class="form-control" id="role">
                                                <option value="">-- select user role --</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ ucwords($role->name) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-7 form-group">
                                            <input type="submit" class="btn btn-danger btn-block" value="Add User">
                                        </div>
                                    </form>

                                    <br>
                                    <span>
                                        <strong>NB: </strong>Only Admins have the permission to <code>Add Users</code> and view <code>Audit Logs</code>
                                    </span>
                                    <br><br>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">User Email</th>
                                                    <th scope="col">Role</th>
                                                    <th scope="col">Added By</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @isset($users)
                                                    @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ ucwords($user->role->name) }}</td>
                                                        <td>
                                                            @php
                                                                $name = explode("@", $user->added_by); echo $name[0];
                                                            @endphp
                                                        </td>
                                                        <td>
                                                            <form action="{{route('adduser.delete', $user->id)}}" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                {!! ($user->role->name!="super admin") ? '<input type="submit" name="revoke" class="btn btn-sm btn-danger" value="Revoke">':'' !!}
                                                            </form>
                                                        </td>
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
            </div>
        </div>
    </div>

@endsection
