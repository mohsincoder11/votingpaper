@extends('user_part.user_layout')
@section('content')


<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="myprofile.html">My Account

            </a></li>
            <li class="breadcrumb-item active" aria-current="page">My Account</li>
            </ol>
            <h6 class="slim-pagetitle">My Account</h6>
        </div><!-- slim-pageheader -->


                <div class="form-card-wrapper section-wrapper mg-t-20">
                <div class="card wd-350 shadow-base">
                    <div class="card-body pd-x-20 pd-xs-40">
                    <h5 class="tx-xs-24 tx-normal tx-gray-900 mg-b-15">My Profile</h5>
                    <div class="form-group">
                        <input class="form-control" type="text" name="fullname" placeholder="Enter your fullname">
                      </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="email" placeholder="Enter email address">
                    </div><!-- form-group -->
                    <div class="form-group">
                        <input class="form-control" type="text" name="mobile" placeholder="Enter Mobile">
                    </div><!-- form-group -->
                    <button class="btn btn-primary btn-block">Update Profile</button>
                    </div><!-- card-body -->
                </div><!-- card -->
                </div><!-- form-card-wrapper -->
        </div>
    </div> 
    @stop