@extends('layouts.dash-layout')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Academic Session</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Academic Session
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
                                <h4 class="card-title">Academic Session</h4>
                                <a class="heading-elements-toggle">
                                    <i class="la la-ellipsis-v font-medium-3"></i>
                                </a>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">

                                    <p style="color:green">{{ Session::get("message") }}</p>
                                    <br>

                                    <form class="row" action="{{ route('academic.session.post') }}" method="POST">
                                        @csrf
                                        <div class="col-md-7 form-group">
                                            <label for="">Academic Session</label>
                                            <input type="text" name="session" class="form-control" placeholder="e.g. 2019/2020" required>
                                        </div>
                                        <div class="col-md-7 form-group">
                                            <input type="submit" class="btn btn-primary btn-block" value="Add Session">
                                        </div>
                                    </form>

                                    <br><br>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th scope="col">S/N</th>
                                                            <th scope="col">Session</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @forelse ($sessions as $session)
                                                            <tr>
                                                                <td>#</td>
                                                                <td>{{ $session->sessionname }}</td>
                                                            </tr>
                                                        @empty
                                                            <div class="alert alert-danger">
                                                                <strong>Oopss!</strong> Academic session have not been set.
                                                            </div>
                                                        @endforelse

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
            </div>
        </div>
    </div>

@endsection
