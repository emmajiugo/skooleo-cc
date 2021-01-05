@extends('layouts.dash-layout')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Web Settings</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Web Settings
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
                                <h4 class="card-title">Web Settings</h4>
                                <a class="heading-elements-toggle">
                                    <i class="la la-ellipsis-v font-medium-3"></i>
                                </a>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">

                                    <p style="color:green">{{ Session::get("message") }}</p>
                                    <br>

                                    <form class="row" action="{{ route('web.settings.post') }}" method="POST">
                                        @csrf

                                        <input type="hidden" name="id" value="{{ $settings->id }}">
                                        <div class="col-md-6 form-group">
                                            <label for="">Address</label>
                                            <textarea name="address" class="form-control" required>{{ $settings->address }}</textarea>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email" class="form-control" value="{{ $settings->email }}" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="">Phone</label>
                                            <input type="text" name="phone" class="form-control" value="{{ $settings->phone }}" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="">Transaction Fee</label>
                                            <input type="number" name="transaction_fee" class="form-control" value="{{ $settings->transaction_fee }}" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="">Withdrawal Fee</label>
                                            <input type="number" name="withdrawal_fee" class="form-control" value="{{ $settings->withdrawal_fee }}" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="">Ecomm Store</label>
                                            <input type="text" name="ecomm_store" class="form-control" value="{{ $settings->ecomm_store }}" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="">Demo Link</label>
                                            <input type="text" name="demo_link" class="form-control" value="{{ $settings->demo_link }}" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="">Playstore</label>
                                            <input type="text" name="playstore" class="form-control" value="{{ $settings->playstore_link }}" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="">Appstore</label>
                                            <input type="text" name="appstore" class="form-control" value="{{ $settings->appstore_link }}" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="">Facebook</label>
                                            <input type="text" name="facebook" class="form-control" value="{{ $settings->facebook_link }}" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="">Twitter</label>
                                            <input type="text" name="twitter" class="form-control" value="{{ $settings->twitter_link }}" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="">Instagram</label>
                                            <input type="text" name="instagram" class="form-control" value="{{ $settings->instagram_link }}" required>
                                        </div>
                                        <div class="offset-2 col-md-8 form-group">
                                            <input type="submit" class="btn btn-primary btn-block" value="Save">
                                        </div>
                                    </form>
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
