
<!DOCTYPE html>
<html>
<head>
	<title>Entity Information</title>
	<style>
		body
		{
			width: 100%;
		}
		p
		{
			font-size: 14px;
			color: #787373;
		}
		 td{
  font-size: 16px;
  font-weight: normal;
  padding-right: 5px;
  padding-top: 3px;
  color: #474545;  	
}
.head
{
	border-bottom: 1px solid #d9d2d2;
  		padding-bottom: 5px;


}
.head p
{
	color: #2b2a2a;
	font-size: 16px;
	font-weight: bold;
}	
	</style>

</head>
<body>
	<div>
		<h2 style="text-align: center;">Voting Paper</h2>
		<hr>
	<table class="table">
                		<tr class="head">
                			<td style="border-top-color: #fff;
"><b><p>Entity Information</p></b></td>

                		</tr>
                		<tr>
                			<td>Entity Id : {{$singledata['entityid']}}</td>
                			<td>Entity Type : {{$singledata['entitytype']}}</td>
                			<td>Entity Name : {{$singledata['entityname']}}</td>
                			
                		</tr>
                		<tr>
                			<td>Date Of Registration : {{$singledata['dateofreg']}}</td>
                			<td>Registration Number : {{$singledata['regno']}}</td>
                			<td>Pan No : {{$singledata['panno']}}</td>
                			
                		</tr>
                		<tr class="head">
                			<td><b><p>Permanent Address</p></b></td>
                		</tr>
                		<tr>
                			<td>Street : {{$singledata['street1']}}</td>
                			<td>Landmark : {{$singledata['landmark1']}}</td>
                			<td>City : {{$singledata['city1']}}</td>
                		</tr>
                		<tr>
                			<td>Pincode : {{$singledata['pincode2']}}</span></td>
                			<td>State : {{$singledata['state2']}}</td>
                			<td>Country : {{$singledata['country2']}}</td>
                		</tr>
                		<tr class="head">
                			<td><b><p>Correspondence Address</p></b></td>
                		</tr>
                		<tr>
                			<td>Street : {{$singledata['street2']}}</td>
                			<td>Landmark : {{$singledata['landmark2']}}</td>
                			<td>City : {{$singledata['city2']}}</td>
                		</tr>
                		<tr>
                			<td>Pincode : {{$singledata['pincode2']}}</span></td>
                			<td>State : {{$singledata['state2']}}</td>
                			<td>Country : {{$singledata['country2']}}</td>
                		</tr>
                		<tr class="head">
                			<td><b><p>Authorised Person/ Contact Person</p></b></td>
                		</tr>
                		<tr>
                			<td>Authorized Person Name : {{$singledata['pername']}}</td>
                			<td>Designation : {{$singledata['designation']}}</td>
                			<td>Email : {{$singledata['email']}}</td>
                		</tr>
                		<tr>
                			<td>Alternate Email : {{$singledata['altemail']}}</td>
                			<td>Mobile No : {{$singledata['mobno']}}</td>
                			<td>Alternate Mobile No : {{$singledata['altmobno']}}</span></td>
                		</tr>
                		<tr class="head">
                			<td><b><p>KYC Document</p></b></td>
                		</tr>
                		<tr>
                			<td>ID : {{$singledata['idproof']}}</span></td>
                			<td>Address : {{$singledata['addressproof']}}</td>
                			<td>Business : {{$singledata['businessproof']}}</td>
                		</tr>
                		
                		
                	</table>
                	</div>

</body>
</html>