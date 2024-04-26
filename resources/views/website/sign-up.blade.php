@extends('website.layout')
@section('content')
    <div class="user-form-area ptb-100">
        <div class="d-table">
            <div class="d-table-cell">

                <div class="container">
                    <div class="form-item">
                        <form action="{{ route('sign-up-save') }}" method="post">
                            @csrf
                            <h2>Sign Up</h2>
                            <div class="row">

                                <div class="col-lg-12">

                                    <div class="form-group">
                                        <select id="cars" name="country" >
                                            <option disabled selected style="padding-right:526px;">Select Country</option>
                                            <option value="India">India</option>
                                            <option value="USA">USA</option>
                                            <option value="Australia">Australia</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12" style="margin-top:4%;">
                                    <div class="form-group">
                                        <input type="text" name="org_name" class="form-control"
                                            placeholder="Organization Name">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" name="user_name" class="form-control" placeholder="User Id">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="number" name="mobile_no" class="form-control"
                                            placeholder="Mobile Number">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn common-btn" style="width:100%;">
                                        Sign Up
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
