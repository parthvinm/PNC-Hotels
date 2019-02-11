<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<style type="text/css">
  #contenar{
    height: 100%;
    width: 100%;
    
  }

  </style>
  
  <link rel="stylesheet" type="text/css" href="css/style1.css">
     
</head>

<body>
<?php
include('connectdb.php');
session_start();
if(isset($_POST['sub']))
{
$username=$_POST['username'];
$roomtype=$_POST['field_1'];
$startdate=$_POST['startdate'];
$enddate=$_POST['enddate'];
$room_nos=$_POST['room_nos'];
$amount=$_POST['roomprice'];

$checkroom= "select count(*) from roomdetail where room_type='".$roomtype."' ";
$check=mysqli_query($con,$checkroom) or die (mysqli_error($con));
$roomcount=mysqli_fetch_array($check);
 $checkcount=$roomcount[0];
if($checkcount>=10)
{
?> <script>alert("Sorry Rooms Are not Available :( please try another Option !!");</script>
<?php }
else{
$s1="INSERT INTO roomdetail (username,checkin_date,checkout_date,room_type,no_of_room,amount)VALUES('".$username."','".$startdate."','".$enddate."','".$roomtype."','".$room_nos."','".$amount."')";
mysqli_query($con,$s1) or die (mysqli_error($con));
header("location:success.php");
}
}
?>

<div id="contenar">

  <div>
    <div class="header">
      <h2>Book A Room</h2>
    </div>
  <form action="registration.php" method="POST">
        <div class="input-group">
          <label>Check in Date</label>
          <input name="startdate1" type="date"  value="<?php if(isset($_POST['startdate1'])){ echo $_POST['startdate1']; }?>" />
        </div>
        <div class="input-group">
          <label>Check out Date</label>
          <input name="enddate1" type="date" value="<?php if(isset($_POST['enddate1'])){ echo $_POST['enddate1']; }?>" onchange='this.form.submit()' />
        </div>       
  
       <div class="input-group">
          
          <input name="startdate" type="hidden" value=" <?php if(isset($_POST['startdate1'])){ echo $_POST['startdate1']; }?> " />
        </div>
        <div class="input-group">
          
          <input name="username" type="hidden" value="<?php session_start(); if(isset($_SESSION['username'])){ echo $_SESSION['username']; } ?>"  />
              <input name="enddate" type="hidden" value=" <?php if(isset($_POST['enddate1'])){ echo $_POST['enddate1']; }?> "  />
        </div>  

        <div class="input-group">
          <label>Room Type</label>
          <select class="text_select" id="field_1" name="field_1" > 
            <option value="00">- Select -</option>   
<?php if(isset($_POST['startdate1'])){
$paymentDate = $_POST['startdate1'];
$contractDateBegin = '2018-12-20';
$contractDateEnd ='2019-03-25';

if (($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd))
{
 $s2="select * from roomtype where room_seson ='high season' ";
$s3=mysqli_query($con,$s2);
}
else
{
$s2="select * from roomtype where room_seson='low season' ";
$s3=mysqli_query($con,$s2);
}


?>

<?php while($catdata=mysqli_fetch_array($s3)) { ?>  <option value="<?php echo $catdata['room_price']; ?>"><?php echo $catdata['room_type']; ?></option>
<?php } ?>
<?php } ?>
          </select>
        </div>     
        <div class="input-group">
          <label>Price per Room</label>
          <span id="a1"  ></span>$
        </div>
        <div class="input-group">
          <label>No. of Guest per Room</label>
          <input name="guest" type="text " size="10"/>
        </div>
        <div class="input-group">
          <label>No. of Rooms</label>
          <input name="room_nos" id="room_nos" type="text " size="10" onChange="gettotal1()" />
        </div>
        <div class="input-group">
          <label>Total Amount To Pay</label>
          <input type="text" name="roomprice" id="total1"  size="10px" readonly="" />
        </div>
        
        <div class="input-group">
          <button type="submit" class="btn" name="sub">Pay & Book</button>
        </div>
       
    </form>
    
    <script language="javascript" type="text/javascript">
function notEmpty(){

var e = document.getElementById("field_1");
var strUser = e.options[e.selectedIndex].value;
var strUser=document.getElementById('a1').innerHTML=strUser;




}
notEmpty()
    
    document.getElementById("field_1").onchange = notEmpty;


   function gettotal1(){
      var gender1=document.getElementById('a1').innerHTML;
      var gender2=document.getElementById('room_nos').value;
      var gender3=parseFloat(gender1)* parseFloat(gender2);
      
      document.getElementById('total1').value=gender3;
  
   }
    </script>
 
    
  </div>
</div>
</body>
</html>