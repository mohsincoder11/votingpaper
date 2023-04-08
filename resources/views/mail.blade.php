<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type="text/css">
	.card-header{
  background-color: #e6e5e1;
  padding-left: 20px;padding-right: 20px;padding-top:0px;
		 padding-bottom:0px;
	}
	.card-body
	{
		padding-left: 20px;padding-right: 20px;padding-top:10px;
		 padding-bottom:10px;
  margin-bottom: 0;
  background-color: #fff;


	}
	.card
	{
		  background-color: #e6e5e1;

		 border: 1px solid #cccbc8;
      border-radius: 4px;
	}
</style>
</head>
<body>

	<div class="container" style="padding-top: 1%;padding-left: 1%;max-width: 98%;">
		
		<div class="card" >
  <h2 class="card-header">VotingPaper Email Verification.</h2>
  <div class="card-body">
    <h4 class="card-text">Hi {{ucfirst($info['name'])}}, OTP for email verification is <b>{{$info['otp']}}</b>. </h4>
  </div>
</div>
		
	
</div>
</body>
</html>