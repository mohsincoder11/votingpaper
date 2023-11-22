@extends('layout')
@section('content')
<input type="hidden" id="entityrecordid" value="{{$singledata->id}}">
<div class="slim-mainpanel">
  <div class="container">
    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('addentity')}}">Entity</a></li>
        <li class="breadcrumb-item">Add Entity</li>
      </ol>
      <h6 class="slim-pagetitle">Add Entity</h6>
    </div><!-- slim-pageheader -->

    <div class="section-wrapper mg-t-5">

      <div id="wizard2">
        <h3>Entity Information</h3>
        <section>
          <h5 class="text-primary">Entity Id : {{$singledata->entityid}}</h5>

          <div class="row">
           <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
              <label class="form-control-label">Type Of Entity <span class="tx-danger">*</span></label>
              <select class="form-control select2" name="entitytype" id="entitytype" data-placeholder="Choose country"  required="">
                <option value="{{$singledata->entitytype}}">{{$singledata->entitytype}}</option>
                <option value="Company">Company</option>
                <option value="Society">Society</option>
                <option value="School">School</option>
                <option value="College">College</option>
                <option value="University">University</option>
                <option value="Association of Persons">Association of Persons</option>
                <option value="Clubs">Clubs</option>
                <option value="Body of Individuals (BOI)">Body of Individuals (BOI)</option>
                <option value="Local Authority">Local Authority</option>
                <option value="Trust">Trust</option>
                <option value="FIRM">FIRM</option>
                <option value="Other">Other</option>

              </select>
            </div>
          </div><!-- col-4 -->
          <div class="col-lg-4" id="otherinput">
            <div class="form-group mg-b-10-force">
              <label class="form-control-label">Specify Name <span class="tx-danger">*</span></label>
              <input class="form-control" value="" placeholder="Specify Name" name="specifyname" id="specifyname"> 
              <label class="tx-danger" id="specifynamelabel"></label>

            </div>
          </div><!-- col-4 -->
          <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
             <label class="form-control-label">Name of Entity<span class="tx-danger">*</span></label>
             <input id="entityname" class="form-control" value="{{$singledata->entityname}}"  name="entityname" placeholder="Enter Name Of Entity" type="text" required="">

           </div>
         </div><!-- col-4 -->
         <div class="col-lg-4">
          <div class="form-group mg-b-10-force">
           <label class="form-control-label">Date of Registration <span class="tx-danger">*</span></label>
           <input id="dateofreg" class="form-control" value="{{$singledata->dateofreg}}" name="dateofreg"  type="date" required="">

         </div>
       </div><!-- col-4 -->
       <div class="col-lg-4">
        <div class="form-group mg-b-10-force">
         <label class="form-control-label">Registration No <span class="tx-danger">*</span></label>
         <input id="regno" class="form-control" value="{{$singledata->regno}}"   name="regno" placeholder="Enter Registration No" type="text" required="">

       </div>
     </div><!-- col-4 -->
     <div class="col-lg-4">
      <div class="form-group mg-b-10-force">
       <label class="form-control-label">PAN No <span class="tx-danger">*</span></label>
       <input id="panno" class="form-control tx-uppercase" value="{{$singledata->panno}}"  name="panno" placeholder="Enter PAN No" type="text" required="">
       <label class="tx-danger" id="pan_card_error"></label>

     </div>
   </div><!-- col-4 -->
   <div class="col-lg-4">
    <div class="form-group mg-b-10-force">
     <label class="form-control-label">GST No </label>
     <input id="gst_no" class="form-control tx-uppercase" name="gst_no" placeholder="Enter GST No" type="text" required="" value="{{$singledata->gst_no}}">

     <label class="tx-danger" id="gst_error"></label>


   </div>
 </div><!-- col-4 -->
</div>       


</section>
<h3>Address</h3>
<section>
  <h5 class="text-primary">Entity Id : {{$singledata->entityid}}</h5>


  <div class="row">

    <div class="col-lg-4">
      <div class="form-group mg-b-10-force">
       <label class="form-control-label">Line 1<span class="tx-danger">*</span></label>
       <input id="streeta1" class="form-control" value="{{$singledata->streeta1}}"  name="streeta1" placeholder="Enter Street" type="text" required>

     </div>
   </div><!-- col-4 --> 
   <div class="col-lg-4">
    <div class="form-group mg-b-10-force">
     <label class="form-control-label">Line 2<span class="tx-danger">*</span></label>
     <input id="streeta2" class="form-control" value="{{$singledata->streeta2}}"  name="streeta2" placeholder="Enter Street" type="text" required>

   </div>
 </div><!-- col-4 -->
 <div class="col-lg-4">
  <div class="form-group mg-b-10-force">
   <label class="form-control-label">Landmark<span class="tx-danger">*</span></label>
   <input id="landmark1" class="form-control" value="{{$singledata->landmark1}}"  name="landmark1" placeholder="Enter Landmark" type="text" required>

 </div>
</div><!-- col-4 -->
<div class="col-lg-4">
  <div class="form-group mg-b-10-force">
   <label class="form-control-label">Country<span class="tx-danger">*</span></label>
   <input id="country1" class="form-control" value="{{$singledata->country1}}"  name="country1" placeholder="Enter Country" type="text" required="">

 </div>
</div><!-- col-4 -->
<div class="col-lg-4">
  <div class="form-group mg-b-10-force">
   <label class="form-control-label">Select State<span class="tx-danger">*</span></label>
   <select class="form-control select2-show-search selectpicker" data-live-search="true" data-placeholder="Select State" id="state1" name="state1" required="">
    <option value="{{$singledata->state1}}">{{$singledata->statename1}}</option>


  </select>             
</div>
</div><!-- col-4 -->
<div class="col-lg-4">
  <div class="form-group mg-b-10-force">
   <label class="form-control-label">City / Town<span class="tx-danger">*</span></label>
 <select class="form-control select2-show-search selectpicker" data-live-search="true" data-placeholder="Select City" id="city1" name="city1" required="">
        <option value="{{$singledata->city1}}">{{$singledata->city1}}</option>
      </select>
 </div>
</div><!-- col-4 -->
</div>

<div class="row">

 <div class="col-lg-4">
  <div class="form-group mg-b-10-force">
   <label class="form-control-label">Pincode<span class="tx-danger">*</span></label>
   <input id="pincode1" class="form-control" value="{{$singledata->pincode1}}"  name="pincode1" placeholder="Enter Pincode" type="number" required>
   <label for="" ><span class="tx-danger" id="pincodelabel1"></span></label>


 </div>
</div><!-- col-4 -->

</div>

<div class="row pt-2">
  <div class="col-lg-12">
    <label class="ckbox">
      <input type="checkbox"  id="sameaddresscheckbox" class="sameaddresscheckbox"><span> Is the correspondence address same as permanent Address?</span>
    </label>


  </div><!-- col-3 -->

</div><!-- row -->

<div class="row pt-2">

 <div class="col-lg-4">
  <div class="form-group mg-b-10-force">
   <label class="form-control-label">Line 1<span class="tx-danger">*</span></label>
   <input id="streetb1" class="form-control" value="{{$singledata->streetb1}}"  name="streetb1" placeholder="Enter Street" type="text" required="">

 </div>
</div><!-- col-4 -->
<div class="col-lg-4">
  <div class="form-group mg-b-10-force">
   <label class="form-control-label">Line 2<span class="tx-danger">*</span></label>
   <input id="streetb2" class="form-control" value="{{$singledata->streetb2}}"  name="streetb2" placeholder="Enter Street" type="text" required="">

 </div>
</div><!-- col-4 -->
<div class="col-lg-4">
  <div class="form-group mg-b-10-force">
   <label class="form-control-label">Landmark<span class="tx-danger">*</span></label>
   <input id="landmark2" class="form-control" value="{{$singledata->landmark2}}"  name="landmark2" placeholder="Enter Landmark" type="text" required="">

 </div>
</div><!-- col-4 -->
<div class="col-lg-4">
  <div class="form-group mg-b-10-force">
   <label class="form-control-label">Country<span class="tx-danger">*</span></label>
   <input id="country2" class="form-control" value="{{$singledata->country2}}"  name="country2" placeholder="Enter Country" type="text" required="">

 </div>
</div><!-- col-4 -->
<div class="col-lg-4">
  <div class="form-group mg-b-10-force">
   <label class="form-control-label">Select State<span class="tx-danger">*</span></label>
   <select class="form-control select2-show-search selectpicker" data-live-search="true" data-placeholder="Select State" id="state2" name="state2" required="">
    <option value="{{$singledata->state2}}">{{$singledata->statename2}}</option>
  </select>             
</div>
</div><!-- col-4 -->
<div class="col-lg-4">
  <div class="form-group mg-b-10-force">
   <label class="form-control-label">City / Town<span class="tx-danger">*</span></label>
   <select class="form-control select2-show-search selectpicker" data-live-search="true" data-placeholder="Select State" id="city2" name="city2" required="">
        <option value="{{$singledata->city2}}">{{$singledata->city2}}</option>
      </select>


 </div>
</div><!-- col-4 -->


<div class="col-lg-4">
  <div class="form-group mg-b-10-force">
   <label class="form-control-label">Pincode<span class="tx-danger">*</span></label>
   <input id="pincode2" class="form-control" value="{{$singledata->pincode2}}"  name="pincode2" placeholder="Enter Pincode" type="number" required="">
   <label for="" ><span class="tx-danger" id="pincodelabel2"></span></label>


 </div>
</div><!-- col-4 -->

</div>
</section>
<h3>Authorised Person/ Contact Person</h3>
<section>
  <h5 class="text-primary">Entity Id : {{$singledata->entityid}}</h5>

  <div class="row">

    <div class="col-lg-4">
      <div class="form-group mg-b-10-force">
        <label class="form-control-label">Authorized Person Name <span class="tx-danger">*</span></label>
        <input id="pername" class="form-control" value="{{$singledata->pername}}"  name="pername" placeholder="Enter Name " type="text" required="">

      </div>
    </div><!-- col-4 -->
    <div class="col-lg-4">
      <div class="form-group mg-b-10-force">
       <label class="form-control-label">Designation <span class="tx-danger">*</span></label>
       <input id="designation" class="form-control" value="{{$singledata->designation}}" name="designation" placeholder="Enter Designation" type="text" required="">

     </div>
   </div><!-- col-4 -->
   <div class="col-lg-4">
    <div class="form-group mg-b-10-force">
     <label class="form-control-label">Email<span class="tx-danger">*</span></label>
     <input id="email" class="form-control" value="{{$singledata->email}}" name="email" placeholder="Enter Email" type="email" required="">

   </div>
 </div><!-- col-4 -->

 <div class="col-lg-4">
  <div class="form-group mg-b-10-force">
   <label class="form-control-label">Alternate Email </label>
   <input id="altemail" class="form-control" value="{{$singledata->altemail}}" name="altemail" placeholder="Enter Alternate Email" type="email" >

 </div>
</div><!-- col-4 -->
<div class="col-lg-4">
  <div class="form-group mg-b-10-force">
   <label class="form-control-label">Mobile No <span class="tx-danger">*</span></label>
   <input id="mobno" class="form-control" value="{{$singledata->mobno}}" name="mobno" placeholder="Enter Mobile No" type="number" required="">
   <label for="" ><span class="tx-danger"  id="mobnolabel"></span></label>
 </div>
</div><!-- col-4 --> 
<div class="col-lg-4">
  <div class="form-group mg-b-10-force">
   <label class="form-control-label">Alternate Mobile No </label>
   <input id="altmobno" class="form-control"  name="altmobno" placeholder="Enter Altername Mobile No" type="number" value="{{$singledata->altmobno}}">
   <label for="" ><span class="tx-danger" id="altmobnolabel"></span></label>
 </div>
</div><!-- col-4 -->

<div class="col-lg-1">
  <div class="form-group mg-b-10-force">
   <label class="form-control-label">&nbsp;</label>

   <button class="btn btn-success sendotp_btn">Send Otp</button> 
 </div>
</div><!-- col-4 -->

<div class="col-lg-3">
  <div class="form-group mg-b-10-force">
   <label class="form-control-label">Verify Email OTP </label>
   <input id="email_otp" class="form-control fourdigit"  placeholder="Enter Email OTP" type="number" >
 </div>
</div><!-- col-4 -->
<div class="col-lg-3">
  <div class="form-group mg-b-10-force">
   <label class="form-control-label">Verify Mobile OTP </label>
   <input id="mob_otp" class="form-control fourdigit"  placeholder="Enter Mobile OTP" type="number" >
 </div>
</div><!-- col-4 -->
</div> 
<p id="allfield_error" class="text-danger tx-12"></p>

<p class="text-danger tx-12" id="otp_error">
</p>
</section>
<h3>KYC Document</h3>
<section>
  <h5 class="text-primary">Entity Id : {{$singledata->entityid}}</h5>

  <form action="{{url('ibcentitykycupdate')}}/{{$singledata->id}}" id="form" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <input type="hidden"  value="{{$singledata->id}}" name="kycupdateid">
      <input type="hidden" id="idproofedit" name="idproofedit" value="{{$singledata->idproof}}">
      <input type="hidden" id="businessproofedit" name="businessproofedit" value="{{$singledata->businessproof}}">
      <input type="hidden" id="addressproofedit" name="addressproofedit" value="{{$singledata->addressproof}}">
      <div class="col-lg-3">
        <div class="form-group mg-b-10-force">
         <label class="form-control-label">ID Proof <span class="tx-danger">*</span>&nbsp;&nbsp;<div class="ibutton" id="ibutton1"><i class="fas fa-info"></i></div></label>
         <div class="custom-file">
          <input type="file" class="custom-file-input" id="idproof" name="idproof" @php  if($singledata->idproof) echo 'disabled'; @endphp>
          <label class="custom-file-label custom-file-label-primary" for="customFile" id="idlabel">Choose file</label>
        </div><!-- custom-file -->
        <p id="idproof_size_error" class="text-danger tx-12"></p>

      </div>
    </div><!-- col-4 -->
    <div class="col-lg-3">
      <div class="form-group mg-b-10-force">
       <label class="form-control-label">Address Proof <span class="tx-danger">*</span>&nbsp;&nbsp;<div class="ibutton" id="ibutton2"><i class="fas fa-info"></i></div></label>
       <div class="custom-file">
        <input type="file" class="custom-file-input" id="addressproof" name="addressproof" @php  if($singledata->addressproof) echo 'disabled'; @endphp>
        <label class="custom-file-label custom-file-label-primary" for="customFile" id="addresslabel">Choose file</label>
      </div><!-- custom-file -->
      <p id="addressproof_size_error" class="text-danger tx-12"></p>

    </div>
  </div><!-- col-4 -->

  <div class="col-lg-3">
    <div class="form-group mg-b-10-force">
     <label class="form-control-label">Business Proof <span class="tx-danger">*</span>&nbsp;&nbsp;<div class="ibutton" id="ibutton3"><i class="fas fa-info"></i></div></label>
     <div class="custom-file">
      <input type="file" class="custom-file-input" id="businessproof" name="businessproof" @php  if($singledata->businessproof) echo 'disabled'; @endphp> 
      <label class="custom-file-label custom-file-label-primary" for="customFile" id="businesslabel">Choose file</label>
    </div><!-- custom-file -->
    <p id="businessproof_size_error" class="text-danger tx-12"></p>

  </div>
</div><!-- col-4 -->
<div class="col-lg-3">
  <div class="form-group mg-b-10-force pt-4" style="margin-top: 3px;">
    <button type="submit" class="btn btn-primary  " id="resolutionformbutton"><i class="fa fa-upload"></i> &nbsp;&nbsp;Upload </button>
  </div>
</div><!-- col-4 -->

</div>

</form>
</section>

</div>


</div><!-- section-wrapper -->





</div><!-- container -->
</div><!-- slim-mainpanel -->

<div id="ibutton1modal" class="modal fade ">
  <div class="modal-dialog modal-dialog-vertical-center" role="document">
    <div class="modal-content bd-0 tx-14">
      <div class="modal-header pd-y-20 pd-x-25">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Id Proof List!</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pd-25">
        <h5 class="lh-3 tx-inverse text-center">
          <h5 class="lh-3 tx-inverse">
            <p>Adhar Card</p>
            <p>Passport</p>
            <p>Election Card</p>
            <p>PAN Card</p>
          </h5>
        </div>
        <p class="text-primary tx-16 pd-l-20  pd-r-20 tx-inverse">File Size Should be less than 2MB</p>
        <p class="text-primary tx-16  pd-l-20  pd-r-20 tx-inverse">pdf,jpg,jpeg,png file type is supported.</p>
        <div class="modal-footer">         
          <button type="button" class="btn btn-secondary backbutton" data-dismiss="modal"><i class="fas fa-ban"></i>&nbsp;close</button>
        </div>
      </div>
    </div><!-- modal-dialog -->
  </div><!-- modal -->

  <div id="ibutton2modal" class="modal fade ">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
      <div class="modal-content bd-0 tx-14">
        <div class="modal-header pd-y-20 pd-x-25">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Address Proof List!</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body pd-25">
          <h5 class="lh-3 tx-inverse text-center">
            <h5 class="lh-3 tx-inverse">
              <p>Ration Card</p>
              <p>Passport</p>
              <p>Driving License Card</p>
              <p>Electricity Bill</p>
            </h5>
          </div>
          <p class="text-primary tx-16 pd-l-20  pd-r-20 tx-inverse">File Size Should be less than 2MB</p>
          <p class="text-primary tx-16  pd-l-20  pd-r-20 tx-inverse">pdf,jpg,jpeg,png file type is supported.</p>

          <div class="modal-footer">         
            <button type="button" class="btn btn-secondary backbutton" data-dismiss="modal"><i class="fas fa-ban"></i>&nbsp;close</button>
          </div>
        </div>
      </div><!-- modal-dialog -->
    </div><!-- modal -->

    <div id="ibutton3modal" class="modal fade ">
      <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="modal-content bd-0 tx-14">
          <div class="modal-header pd-y-20 pd-x-25">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Business Proof List!</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body pd-25">
            <h5 class="lh-3 tx-inverse text-center">
              <h5 class="lh-3 tx-inverse">
                <p>Adhar Card</p>
                <p>Passport</p>
                <p>Bank Statement of 6 months</p>
                <p>PAN Card</p>
              </h5>
            </div>
            <p class="text-primary tx-16 pd-l-20  pd-r-20 tx-inverse">File Size Should be less than 2MB</p>
            <p class="text-primary tx-16  pd-l-20  pd-r-20 tx-inverse">pdf,jpg,jpeg,png file type is supported.</p>

            <div class="modal-footer">         
              <button type="button" class="btn btn-secondary backbutton" data-dismiss="modal"><i class="fas fa-ban"></i>&nbsp;close</button>
            </div>
          </div>
        </div><!-- modal-dialog -->
      </div><!-- modal -->
      <div class="loaderpage" id="loaderpage">
        <div class="loadingspinner">
          <div id="square1"></div>
          <div id="square2"></div>
          <div id="square3"></div>
          <div id="square4"></div>
          <div id="square5"></div>
        </div>
        <p class="loaderp"> Loading . . . . .</p>
      </div>

    <div id="snackbarsuccess">   
  <div class="row">
  </div>
  <div class="col-md-10">
    <strong>Success!</strong> <span id="success_msg"></span>  </div>      
  </div>
      @stop
      @section('js')
      <script>
       $( document ).ready(function() {
        var email_otp;
        var mob_otp;
        $("#loaderpage").hide();

        $("#otherinput").hide();

        if($('#idproofedit').val()!='')
        {
          $('#idlabel').text($('#idproofedit').val());

        }
        else
        {
          $('#idlabel').text('Choose File');

        }
        if($('#addressproofedit').val()!='')
        {
          $('#addresslabel').text($('#addressproofedit').val());

        }
        else
        {
          $('#addresslabel').text('Choose File');

        }
        if($('#businessproofedit').val()!='')
        {
          $('#businesslabel').text($('#businessproofedit').val());

        }
        else
        {
          $('#businesslabel').text('Choose File');

        }


        $('#entitytab').addClass('active');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


        $('#wizard2').steps({
          headerTag: 'h3',
          bodyTag: 'section',
          autoFocus: true,
          titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
          onStepChanging: function (event, currentIndex, newIndex) {
            if(currentIndex < newIndex) {
              // Step 1 form validation
              if(currentIndex === 0) {
               var pan=pan_check();
               var gst=gst_check();

               if(pan==2)               
                return; 
              if(gst==2)               
                return;
              
              var entityname = $('#entityname').parsley();
              var regno = $('#regno').parsley();
              var entitytype = $('#entitytype').parsley();
              var dateofreg = $('#dateofreg').parsley();
              var panno = $('#panno').parsley();
              var gst_no = $('#gst_no').parsley();

              if(entityname.isValid() && regno.isValid() && entitytype.isValid() && dateofreg.isValid() && panno.isValid() && gst_no.isValid()) {
                var entityrecordid=$('#entityrecordid').val();   
                var entitytype1=$('#entitytype').val();
                var specifyname=$('#specifyname').val();
                if(specifyname!='')
                {
                  var entitytype=entitytype1+'['+specifyname+']';

                }
                else
                {
                  var entitytype=entitytype1;
                }     
                $.ajax({
                  type: "get",
                  url: "{{Route('ibcentityinfoupdate')}}",
                  data: {_token: CSRF_TOKEN,entityinfoupdateid:entityrecordid,entityname:$('#entityname').val(),regno:$('#regno').val(),entitytype:entitytype,dateofreg:$('#dateofreg').val(),panno:$('#panno').val(),gst_no:$('#gst_no').val()}, 
                  dataType:'json',
                  success:function(data) {
                        //alert(data);
                      }
                    });


                return true;     
              } else {
                entityname.validate();
                entitytype.validate();
                dateofreg.validate();
                regno.validate();
                panno.validate();
                gst_no.validate();
              }
            }

              // Step 2 form validation
              if(currentIndex === 1) {
                var streeta1 = $('#streeta1').parsley();
                var streeta2 = $('#streeta2').parsley();
                var landmark1 = $('#landmark1').parsley();
                var city1 = $('#city1').parsley();
                var state1 = $('#state1').parsley();
                var country1 = $('#country1').parsley();
                var pincode1 = $('#pincode1').parsley();               
                var streetb2 = $('#streetb2').parsley();
                var streetb1 = $('#streetb1').parsley();
                var landmark2 = $('#landmark2').parsley();
                var city2 = $('#city2').parsley();
                var state2 = $('#state2').parsley();
                var country2 = $('#country2').parsley();
                var pincode2 = $('#pincode2').parsley();


                if(streeta1.isValid() && streetb1.isValid() && city1.isValid() && state1.isValid() && country1.isValid() && pincode1.isValid() && landmark1.isValid() && streetb2.isValid() && streeta2.isValid() && city2.isValid() && state2.isValid() && country2.isValid() && pincode2.isValid() && landmark2.isValid()) {
                  var entityrecordid=$('#entityrecordid').val();        


                  $.ajax({
                    type: "get",
                    url: "{{Route('ibcentityaddress')}}",
                    data: {_token: CSRF_TOKEN,entityinfoid:entityrecordid,streeta1:$('#streeta1').val(),streetb1:$('#streetb1').val(),landmark1:$('#landmark1').val(),city1:$('#city1').val(),state1:$('#state1').val(),country1:$('#country1').val(),pincode1:$('#pincode1').val(),streeta2:$('#streeta2').val(),streetb2:$('#streetb2').val(),landmark2:$('#landmark2').val(),city2:$('#city2').val(),state2:$('#state2').val(),country2:$('#country2').val(),pincode2:$('#pincode2').val()}, 
                    dataType:'json',
                    success:function(data) {
      //alert(data);
      

    }
  });

                  return true;
                } else { 
                  streeta1.validate();
                  city1.validate();
                  state1.validate();
                  country1.validate();
                  pincode1.validate();
                  landmark1.validate();
                  street2.validate();
                  city2.validate();
                  state2.validate();
                  country2.validate();
                  pincode2.validate();
                  landmark2.validate();


                }
              }
                            // Step 3 form validation

                            if(currentIndex === 2) {
                              var pername = $('#pername').parsley();
                              var designation = $('#designation').parsley();
                              var mobno = $('#mobno').parsley();
                              var altmobno = $('#altmobno').parsley();
                              var email = $('#email').parsley();
                              var altemail = $('#altemail').parsley();   
                                //console.log(email_otp+','+$("#email_otp").val());
                                //console.log(mob_otp+','+$("#mob_otp").val());

                                if(email_otp==$("#email_otp").val() && mob_otp==$("#mob_otp").val())
                                {

 // console.log(email_otp+','+$("#email_otp").val());
 $("#otp_error").text('');

}
else
{
  $("#otp_error").text('Please enter valid OTP');
  return;
}


if(pername.isValid() && mobno.isValid() && altmobno.isValid() && email.isValid() && altemail.isValid() && designation.isValid()) {
 var entityrecordid=$('#entityrecordid').val();


 $.ajax({
  type: "get",
  url: "{{Route('ibcentityauthperson')}}",
  data: {_token: CSRF_TOKEN,entityaddressid:entityrecordid,pername:$('#pername').val(),designation:$('#designation').val(),mobno:$('#mobno').val(),altmobno:$('#altmobno').val(),email:$('#email').val(),altemail:$('#altemail').val()}, 
  dataType:'json',
  success:function(data) {
      //alert(data);
    }
  });

 return true;
} else { 
  pername.validate();
  designation.validate();
  mobno.validate();
  altmobno.validate();
  email.validate();
  altemail.validate();         


}
}
            // Always allow step back to the previous step even if the current step is not valid.
          } 



          else { return true; }
        }
      });

$.ajax({
  type:'get',
  url: "{{ url('addentity')}}",
  dataType:'json',
  success: function(data) {
    $.each(data.states, function (a, b) {   
      $("#state1").append('<option value="'+b.id+'">'+b.name+'</option>');
      $("#state2").append('<option value="'+b.id+'">'+b.name+'</option>');
    });

    $.each(data.cities, function (a, b) {   
      $("#city1").append('<option value="'+b.id+'">'+b.name+'</option>');
      $("#city2").append('<option value="'+b.id+'">'+b.name+'</option>');
    });
    $('#state1').selectpicker('refresh');
    $('#state2').selectpicker('refresh');
    $('#state1').val($('#state1').val());
    $('#state2').val($('#state2').val());
    $('#state1').selectpicker('refresh');
    $('#state2').selectpicker('refresh');

    $('#city1').selectpicker('refresh');
    $('#city2').selectpicker('refresh');

  }
});

$("#state1").on('change',function()
{
  $.ajax({
    type:'get',
    url: "{{ url('get_city')}}",
    data:{state_id:$("#state1").val()},
    dataType:'json',
    success: function(data) {
//console.table(data);
$("#city1").empty();
$.each(data, function (a, b) {   
  $("#city1").append('<option value="'+b.name+'">'+b.name+'</option>');
});

$('#city1').selectpicker('refresh');

}
});
})  

$("#state2").on('change',function()
{

  $.ajax({
    type:'get',
    url: "{{ url('get_city')}}",
    data:{state_id:$("#state2").val()},
    dataType:'json',
    success: function(data) {
     $("#city2").empty();
     $.each(data, function (a, b) {   
      $("#city2").append('<option value="'+b.name+'">'+b.name+'</option>');
    });

     $('#city2').selectpicker('refresh');

   }
 });
})

$('#sameaddresscheckbox').change(function() {
  if(this.checked) {
   $('#pincode2').val($('#pincode1').val());
   $('#state2').val($('#state1').val());
   $('#country2').val($('#country1').val());
   $('#landmark2').val($('#landmark1').val());
   $('#streetb1').val($('#streeta1').val());
    // console.log($('#state1').val());

    $.ajax({
      type:'get',
      url: "{{ url('get_city')}}",
      data:{state_id:$("#state1").val()},
      dataType:'json',
      success: function(data) {
        $("#city2").empty();
        $.each(data, function (a, b) {   
          $("#city2").append('<option value="'+b.name+'">'+b.name+'</option>');
        });

        $('#city2').selectpicker('refresh');
        $("#city2").val($("#city1").val());
        $('#city2').selectpicker('refresh');


      }
    });



    $('#streetb2').val($('#streeta2').val());
    $('#state2').selectpicker('refresh');
    $('#city2').selectpicker('refresh');


  } else {
  //console.log('uncheck');
  $('#city2').val('');
  $('#pincode2').val('');
  $('#state2').val('');
  $('#country2').val('');
  $('#landmark2').val('');
  $('#streetb1').val('');
  $('#streetb2').val('');
  $('#city2').selectpicker('refresh');
  $('#state2').selectpicker('refresh');

}
})


if($('#city1').val()==$('#city2').val() && $('#pincode1').val()==$('#pincode2').val() && $('#state1').val()==$('#state2').val() && $('#country1').val()==$('#country2').val() &&$('#landmark1').val()==$('#landmark2').val() && $('#streeta1').val()==$('#streetb1').val() && $('#streeta2').val()==$('#streetb2').val())
{
  $('.sameaddresscheckbox').prop('checked',true);
}

$("#addressproof").change(function() {
 var fullPath = $("#addressproof").val();
 var filename = fullPath.replace(/^.*[\\\/]/, '');
 $('#addresslabel').text(filename.substring(0,20));
 $("#addressproof_size_error").text('');
 var extention = filename.split('.').pop();
 if(this.files[0].size/1024/1024>2 )
 {
   $("#addressproof_size_error").text('File size should be less than 2MB');
 }
 if( extention!='jpg' && extention!='png' && extention!='pdf' && extention!='jpeg')
 {
     $("#addressproof_size_error").text('File type must be jpg,png,pdf');
 }
});

$("#idproof").change(function() {
 var fullPath = $("#idproof").val();
 var filename = fullPath.replace(/^.*[\\\/]/, '');
 $('#idlabel').text(filename.substring(0,20));
  var extention = filename.split('.').pop();

 $("#idproof_size_error").text('');
 if(this.files[0].size/1024/1024>2 )
 {
   $("#idproof_size_error").text('File size should be less than 2MB');
 }
 if( extention!='jpg' && extention!='png' && extention!='pdf' && extention!='jpeg')
 {
     $("#idproof_size_error").text('File type must be jpg,png,pdf');
 }
});

$("#businessproof").change(function() {
 var fullPath = $("#businessproof").val();
 var filename = fullPath.replace(/^.*[\\\/]/, '');
 var extention = filename.split('.').pop();
 $('#businesslabel').text(filename.substring(0,20));
 $("#businessproof_size_error").text('');
  if(this.files[0].size/1024/1024>2 )
 {
   $("#businessproof_size_error").text('File size should be less than 2MB');
 }
 if( extention!='jpg' && extention!='png' && extention!='pdf' && extention!='jpeg')
 {
     $("#businessproof_size_error").text('File type must be jpg,png,pdf');
 }

});

$("#pincode1").keyup(function(){

  pincodecheck= $("#pincode1").val();
  if(pincodecheck.length==6)
  {
    $('#pincodelabel1').text('');

  }
  else
  {
    $('#pincodelabel1').text('Pincode Should Be 6 Digit.');
  }
}) 
$("#pincode2").keyup(function(){

  pincodecheck= $("#pincode2").val();
  if(pincodecheck.length==6)
  {
    $('#pincodelabel2').text('');

  }
  else
  {
    $('#pincodelabel2').text('Pincode Number Should Be 6 Digit.');
  }
}) 

$("#mobno").keyup(function(){

  mobnocheck= $("#mobno").val();
  if(mobnocheck.length==10)
  {
    $('#mobnolabel').text('');

  }
  else
  {
    $('#mobnolabel').text('Mobile Number Should Be 10 Digit.');
  }
}) 
$("#altmobno").keyup(function(){

  altmobnocheck= $("#altmobno").val();
  if(altmobnocheck.length==10)
  {
    $('#altmobnolabel').text('');

  }
  else
  {
    $('#altmobnolabel').text('Mobile Number Should Be 10 Digit.');
  }
}) 

$("#panno").keyup(function(){
  pan_check();
})
function pan_check()
{
  $("#panno").val().toLocaleUpperCase(); 
  var regex = /([A-Z]){5}([0-9]){4}([A-Z]){1}$/;
  if (regex.test($("#panno").val().toUpperCase())) 
  {
    $("#pan_card_error").text("");
    return 1;
  }

  else
  {
    $("#pan_card_error").text("please Enter Valid Pan Number");
    return 2;
  }

}
$("#gst_no").keyup(function(){
  gst_check();
})
function gst_check()
{
  var regex = /([0-9]){2}([A-Z]){5}([0-9]){4}([A-Z]){1}([0-9]){1}([A-Z]){1}([0-9]){1}$/;
  var regex2 = /([0-9]){2}([A-Z]){5}([0-9]){4}([A-Z]){1}([0-9]){1}([A-Z]){1}([A-Z]){1}$/;
  if (regex.test($("#gst_no").val().toUpperCase()) || regex2.test($("#gst_no").val().toUpperCase())) 
  {
    $("#gst_error").text("");
    return 1;
  }

  else
  {
    $("#gst_error").text("please Enter Valid GST Number");
    return 2;
  }


}


$(".fourdigit").keyup(function(){
  var id=$(this).attr('id');
  $("#"+id).val($(this).val().slice(0,4));
})

$("#entitytype").on('change',function()
{
  if($("#entitytype").val()=='Other')
  {
    $("#otherinput").show();
  }
  else
  {
        $("#otherinput").hide();

  }
});

$("#specifyname").on('keyup',function()
{
  if(($("#specifyname").val()).length>30)
  {
    $("#specifynamelabel").text('Length Should Be Less Than 30 Letter');
  }
  else
  {
    $("#specifynamelabel").text('');

  }
});

$(".ibutton").on('mouseover',function()
{
  $('#'+this.id+'modal').modal('show');
})

$(".sendotp_btn").on('click',function()
{
  if($("#mobno").val() && $("#email").val())
  {
    $("#allfield_error").text('');

    $("#loaderpage").show();
    $.ajax({
      type:'get',
      url: "{{ url('send_email_mob_otp')}}",
      data:{mobno:$("#mobno").val(),pername:$("#pername").val(),email:$("#email").val(),},
      dataType:'json',
      success: function(data) {
          var x = document.getElementById("snackbarsuccess");
      $("#success_msg").text('OTP Send Successfully.');
      x.className = "show";
      setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
  
       console.log(data);
       email_otp=data.email_otp;
       mob_otp=data.mob_otp;
        email_otp=1111;
 mob_otp=2222;
       $("#loaderpage").hide();


     }
   });
  }
  else
  {
    $("#allfield_error").text('Please fill all required field');
  }

})


});

</script>
@stop