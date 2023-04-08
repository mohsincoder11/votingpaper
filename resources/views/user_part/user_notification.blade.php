@extends('user_part.user_layout')
@section('content')

  <div class="slim-mainpanel">
    <div class="container">
      <div class="slim-pageheader">
        <ol class="breadcrumb slim-breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="notification.html">Notification

            </a></li>
          <li class="breadcrumb-item active" aria-current="page">Notification</li>
        </ol>
        <h6 class="slim-pagetitle">Notification</h6>
      </div><!-- slim-pageheader -->
      <div class="section-wrapper mg-t-20">

        <div class="row">
          <div class="col-md-5">
            <div class="card bd-0">
              <div class="card-header tx-medium bd-0 tx-white bg-primary">
                Notification
              </div><!-- card-header -->
              <div class="card-body bd bd-t-0">
                <p class="card-link tx-back-7 hover-white" style="margin-left: 65%;">Date: 21/10/21</p>
                <p class="mg-b-0">Some quick example text to build on the card title and make up the bulk of the card's
                  content. Lorem ipsum dolor sit amet consictetur...</p>
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col -->
          <div class="col-md-5 mg-t-20 mg-md-t-0">
            <div class="card bd-0">
              <div class="card-header tx-medium bd-0 tx-white bg-primary">
                Notification
              </div><!-- card-header -->
              <div class="card-body bd bd-t-0">
                <p class="card-link tx-back-7 hover-white" style="margin-left: 65%;">Date: 21/10/21</p>
                <p class="mg-b-0">Some quick example text to build on the card title and make up the bulk of the card's
                  content. Lorem ipsum dolor sit amet consictetur...</p>
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- section-wrapper -->
    </div>
  </div>
 @stop