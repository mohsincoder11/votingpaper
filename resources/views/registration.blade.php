<!DOCTYPE html>
<html>
<head>
	<title></title>
	
  <link rel="stylesheet" href="{{asset('public/registration/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">

  <style>
  	body
  	{
  		background-color: #53c947;
  	}
  	.side
  	{
   border-top-left-radius: 10px;border-bottom-left-radius: 10px; background: url('public/registration/images/bg-heading-02.jpg') top left/cover no-repeat;

  	}
    .contentset
    {
      border-radius: 10px;margin-top: 30px;margin-bottom: 30px;width: 98%;padding-left: 3%;
    }

    .form-control input:focus{
      outline: none;
      
    } 
    .form-group input{
      outline: none;
      border:none;
      border-bottom:1px solid #e6e4e1;
    } 
    .form-group select{
      outline: none;
      border:none;
      border-bottom:1px solid #e6e4e1;
    }

    .form-group 
    {
      padding-top: 20px;
    }
     .input-group
    {
            margin-top: 20px;

    }
    .input-group input{
      outline: none;
      border:none;
      border-bottom:1px solid #e6e4e1;
    }
     .input-group input:read-only{
      outline: none;
      border:none;
      border-bottom:1px solid #e6e4e1;
      background-color: #fff;
    }
    .maincontent
    {
      background:#fff;border-top-right-radius: 10px;border-bottom-right-radius: 10px;
    }
    .maincontent h2
    {
      padding-top: 30px;font-size: 30px;padding-left: 10px;
    }
    .pad
    {
      padding-left:20px;padding-right:20px;
    }
    .form-group label
    {
      padding-left: 10px;
    }
    

  </style>
</head>

<body>
<div class="container-fluid" >
  <div class="col-md-12 contentset" > 
  <div class="row">
    <div class="col-md-3 side">
        </div>
    <div class="col-md-9 maincontent" >
 <div class="row">
          <div class="col-md-6">
             <strong><h2 class="title">REGISTRATION INFO</h2> </strong>
          </div>
          <div class="col-md-6">
            @php $successcode=Session::get('successcode') @endphp
            <input type="hidden" id="error" value="{{$successcode ?? ''}}">
           <div class="alert alert-success alert-dismissible" id="errormsg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Registration Successfull. Check Your Mail and SMS.
</div>

          </div>
          
        </div>

         <div class="row pad" >
 <form method="POST" action="{{url('register')}}" class="form-horizontal" name="form" id="form" enctype="multipart/form-data">
@csrf           <div class="row" style="padding-top: 30px;">
              <div class="col-md-3">
                 <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
    <input class="form-control" type="text" data-date-viewmode="years" readonly />
    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>

              </div>
              <div class="col-md-3">
                 <div class="form-group">
    <input class="form-control"  type="text"
required="" name="cbname" placeholder="Name of Cilent/Business" autocomplete="off">
  </div>
              </div>
              <div class="col-md-3">
                 <div class="form-group">
    
    <input type="number" required="" placeholder="Mobile Number" name="mobile1" id="mobile1" class="form-control" autocomplete="off">
  </div>
              </div>
              <div class="col-md-3">
                 <div class="form-group">
    <input type="email" placeholder="E-mail" required="" name="email1" class="form-control" autocomplete="off">
  </div>
              </div>
            </div>
            <div class="row" style="">
              <div class="col-md-3">
                 <div class="form-group">
    <input type="text" placeholder="Contact Person Name" required="" name="pername" class="form-control" autocomplete="off">
  </div>
              </div>
              <div class="col-md-3">
                 <div class="form-group">
    <input type="number"  placeholder="Mobile Number" required="" name="mobile2" id="mobile2" class="form-control" autocomplete="off">
  </div>
              </div>
              <div class="col-md-3">
                 <div class="form-group">
    <input type="email" placeholder="E-mail" required="" name="email2" class="form-control" autocomplete="off">
  </div>
              </div>
              <div class="col-md-3">
                 <div class="form-group">
    <input type="text" placeholder="Business Location" required="" name="location" class="form-control" autocomplete="off">
  </div>
              </div>
            </div>
            <div class="row" style="">
              <div class="col-md-3">
                 <div class="form-group">
    <input type="text" placeholder="City" name="city" required="" class="form-control" autocomplete="off">
  </div>
              </div>
              <div class="col-md-3">
                 <div class="form-group">
    <input type="number" placeholder="Pincode" name="pincode" id="pincode" required="" class="form-control" autocomplete="off">
  </div>
              </div>

              <div class="col-md-3">
                 <div class="form-group" style="padding-top: 33px;">
    <select name="state" id="" required="" >
       <option disabled="disabled" selected="selected"  ><label style="color: red;">Select State</label></option>
                                            <option>Andhra Pradesh</option>
                                            <option>Andaman and Nikobar Islands</option>
                                            <option>Assam</option>
                                            <option>Bihar</option>
                                            <option>Chandigarh</option>
                                            <option>Chhattisgarh</option>
                                            <option>Dadar and Nagar Haveli</option>
                                            <option>Daman and Diu</option>
                                            <option>Delhi</option>
                                            <option>Lakshadweep</option>
                                            <option>Puducherry</option>
                                            <option>Goa</option>
                                            <option>Gujarat</option>
                                            <option>Haryana</option>
                                            <option>Himachal Pradesh</option>
                                            <option>Jammu and Kashmir</option>
                                            <option>Jharkhand</option>
                                            <option>Karnataka</option>
                                            <option>Kerla</option>
                                            <option>Madhya Pradesh</option>
                                            <option>Maharashtra</option>
                                            <option>Manipur</option>
                                            <option>Meghalaya</option>
                                            <option>Mizoram</option>
                                            <option>Nagaland</option>
                                            <option>Odisha</option>
                                            <option>Punjab</option>
                                            <option>Rajasthan</option>
                                            <option>Sikkim</option>
                                            <option>Tamil Nadu</option>
                                            <option>Telangana</option>
                                            <option>Tripura</option>
                                            <option>Uttar Pradesh</option>
                                            <option>Uttarakhand</option>
                                            <option>West Bengal</option>
      
    </select>
  </div>
              </div>
              <div class="col-md-3">
                 <div class="form-group">
    <input type="text" placeholder="Enter plan Name" required="" name="planname" class="form-control" autocomplete="off">
  </div>
              </div>
            </div>
            <div class="row" style="">
              <div class="col-md-3">
                 <div class="form-group">
    <label for="email">Business Proof :</label>
    <input required="" type="file" name="businessproof" class="form-control" required="">
  </div>
              </div>
              <div class="col-md-3">
                 <div class="form-group">
    <label for="email">ID Proof :</label>
    <input required="" type="file" name="idproof" class="form-control" required="">
  </div>
              </div>
              <div class="col-md-3">
                 <div class="form-group">
    <label for="email">Address Proof :</label>
    <input required="" type="file" name="addressproof" class="form-control"required="" >
  </div>
              </div>
             <!--  <div class="col-md-3">
                 <div class="form-group">
    <label for="email">&nbsp;</label>
    <input type="text" placeholder="Total Cost " name="totalcost" class="form-control" required="" >
  </div>
              </div> -->
            </div>
            <div class="row" style="padding-left: 20px;">
                               <div class="form-group">

      <label style="padding-right: 20px;"> <strong>I agree to terms and conditions.</strong></label><input type="checkbox" name="terms" required>
  </div>
            </div>
            <div class="row" style="padding-top: 20px;padding-left: 5px;padding-bottom: 140px;">
                               

                            <div class="col-md-3">

              <button type="submit" class="btn btn-success col-md-12 submit"> REGISTER</button>
            </div>
            </div>
            
          </form>
        </div>
    </div>
    </div>
  </div>
</div>
 <script src="{{asset('public/registration/js/jquery.min.js')}}"></script>
  <script src="{{asset('public/registration/js/popper.min.js')}}"></script>
  <script src="{{asset('public/registration/js/bootstrap.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js">
  </script>

<script src="{{asset('public/registration/js/jquery.validate.min.js')}}"></script>
  <script>
$(document).ready( function () {

  $(function () {
  $("#datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date()).datepicker({ dateFormat: "dd-mm-yyyy" });;
});
//                          $(".submit").click(function(){
//     if($('input[name="terms"]').is(':checked'))
// {
  
// }else
// {
//  alert('accept terms and condition');
// }
// });

                          $("#form").validate({
                              rules :{
        mobile1: {
            required : true,
                            minlength: 10,
                            maxlength: 10,
                                    },
                                    mobile2 : {
            required : true,
                            minlength: 10,
                            maxlength: 10,
                                    },
                                     pincode : {
            required : true,
                            minlength: 6,
                            maxlength: 6,
                                    },     
    },
    messages :{
        mobile1: {
            required : 'Enter Valid 10 Digit Mobile Number'
        },      
        mobile2 : {
            required : 'Enter Valid 10 Digit Mobile Number'
        },
        pincode : {
            required : 'Pincode Should Be 6 Digit'
        },        
    }
    });
});

 $(document).ready( function () {
      var err = $("#error").val();
      if(err==1)
      {
        $('#errormsg').fadeOut(5000)

     }
     if(err==0)
        {
        $('#errormsg').hide()

     }

 } );
</script>

</body>
</html>