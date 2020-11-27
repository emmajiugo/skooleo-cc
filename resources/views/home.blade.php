@extends('layouts.dash-layout')

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    Monthly Payment Statistics

                                    <form class="form-inline" action="" method="POST">
                                        @csrf
                                        <select name="year" class="form-control input-sm">
                                            <option value="">-- select year --</option>
                                            <option value="2021">2021</option>
                                        </select>
                                        <button type="submit" class="btn btn-danger btn-sm">Filter</button>
                                    </form>

                                    {{-- pass data to the script function --}}
                                    {{-- <script>
                                        var year = {{ $year }} || "2020";
                                        var months = {!! json_encode($data) !!};
                                    </script> --}}
                                </h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                        <div class="height-400">
                                    <canvas id="column-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-4">
                        <div class="card pull-up border-top-info border-top-3 rounded-0">
                            <div class="card-header">
                                <h4 class="card-title">Portal Current Users</h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body p-1">
                                    <h4 class="font-large-1 text-bold-400">{{ count(\App\CCUser::all()) }} <i class="ft-users float-right"></i></h4>
                                </div>
                                <div class="card-footer p-1">
                                    <span class="text-muted"><i class="la la-arrow-circle-o-up info"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-8">
                        <div class="card">
                            <div class="card-header p-1">
                                <h4 class="card-title float-left">Project X - <span class="blue-grey lighten-2 font-small-3 mb-0">24 DEC 2017 - 09 APR 2019</span></h4>
                                <span class="badge badge-pill badge-info float-right m-0">Approved</span>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-footer text-center p-1">
                                    <div class="row">
                                        <div class="col-md-3 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                                            <p class="blue-grey lighten-2 mb-0">Tasks</p>
                                            <p class="font-medium-5 text-bold-400">26</p>
                                        </div>
                                        <div class="col-md-3 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                                            <p class="blue-grey lighten-2 mb-0">Completed</p>
                                            <p class="font-medium-5 text-bold-400">58%</p>
                                        </div>
                                        <div class="col-md-3 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                                            <p class="blue-grey lighten-2 mb-0">Pending</p>
                                            <p class="font-medium-5 text-bold-400">42%</p>
                                        </div>
                                        <div class="col-md-3 col-12 text-center">
                                            <p class="blue-grey lighten-2 mb-0">Version</p>
                                            <p class="font-medium-5 text-bold-400">4.5</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <span class="text-muted"><a href="#" class="danger darken-2">Project X</a> Statistics</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection
