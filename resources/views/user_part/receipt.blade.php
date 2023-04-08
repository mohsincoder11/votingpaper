@extends('user_part.user_layout')
@section('content')

  <div class="slim-mainpanel">
    <div class="container">
      <div class="slim-pageheader">
        <ol class="breadcrumb slim-breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="electiondetails.html">Receipt

            </a></li>
          <li class="breadcrumb-item active" aria-current="page">Receipt</li>
        </ol>
        <h6 class="slim-pagetitle">Receipt</h6>
      </div><!-- slim-pageheader -->


      <div class="row row-sm mg-t-20">
        <div class="col-lg-6">
          <div class="card card-info">
            <div class="card-body pd-40text-algin-start">
              <table width="100%">
                <tr>
                  <td style="padding:5px;text-align:left">
                    <label><b>Voting ID :</b>1234</label>
                  </td>
                  <td style="padding:5px;text-align:center">
                    <label><b>Voting Start Date :</b> 24/01/2021</label>
                  </td>
                </tr>

                <tr>
                  <td style="padding:5px;text-align:left">
                    <label><b>Total Candidates :</b> 24</label>
                  </td>
                  <td style="padding:5px;text-align:center">
                    <label><b>Voting End Date :</b> 24/05/2021</label>
                  </td>
                </tr>
              </table>

            </div><!-- card-body -->
          </div><!-- card -->
        </div><!-- col-4 -->
        <div class="col-lg-6 mg-t-20 mg-lg-t-0">
          <div class="card card-info">
            <div class="card-body pd-40text-algin-start">
              <table width="100%">
                <tr>
                  <td style="padding:5px;text-align:left">
                    <label><b>Voting ID :</b>1234</label>
                  </td>
                  <td style="padding:5px;text-align:center">
                    <label><b>Voting Start Date :</b> 24/01/2021</label>
                  </td>
                </tr>

                <tr>
                  <td style="padding:5px;text-align:left">
                    <label><b>Total Candidates :</b> 24</label>
                  </td>
                  <td style="padding:5px;text-align:center">
                    <label><b>Voting End Date :</b> 24/05/2021</label>
                  </td>
                </tr>
              </table>
            </div><!-- card-body -->
          </div><!-- card -->
        </div><!-- col-4 -->
      </div><!-- row -->

      <div class="row row-sm mg-t-20">
        <div class="col-lg-6">
          <div class="card card-info">
            <div class="card-body pd-40text-algin-start">
              <table width="100%">
                <tr>
                  <td style="padding:5px;text-align:left">
                    <label><b>Voting ID :</b>1234</label>
                  </td>
                  <td style="padding:5px;text-align:center">
                    <label><b>Voting Start Date :</b> 24/01/2021</label>
                  </td>
                </tr>

                <tr>
                  <td style="padding:5px;text-align:left">
                    <label><b>Total Candidates :</b> 24</label>
                  </td>
                  <td style="padding:5px;text-align:center">
                    <label><b>Voting End Date :</b> 24/05/2021</label>
                  </td>
                </tr>
              </table>
            </div><!-- card-body -->
          </div><!-- card -->
        </div><!-- col-4 -->
        <div class="col-lg-6 mg-t-20 mg-lg-t-0">
          <div class="card card-info">
            <div class="card-body pd-40text-algin-start">
              <table width="100%">
                <tr>
                  <td style="padding:5px;text-align:left">
                    <label><b>Voting ID :</b>1234</label>
                  </td>
                  <td style="padding:5px;text-align:center">
                    <label><b>Voting Start Date :</b> 24/01/2021</label>
                  </td>
                </tr>

                <tr>
                  <td style="padding:5px;text-align:left">
                    <label><b>Total Candidates :</b> 24</label>
                  </td>
                  <td style="padding:5px;text-align:center">
                    <label><b>Voting End Date :</b> 24/05/2021</label>
                  </td>
                </tr>
              </table>
            </div><!-- card-body -->
          </div><!-- card -->
        </div><!-- col-4 -->
      </div><!-- row -->
    </div><!-- container -->
  </div><!-- slim-mainpanel -->
 @stop


 
@section('js')
<script>
  $("document").ready(function() {
  $("#receipttab").addClass('active');
  })
  </script>
  @stop