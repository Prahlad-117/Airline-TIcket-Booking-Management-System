<?php include_once 'helpers/helper.php'; ?>
<?php subview('header.php'); ?>
<link rel="stylesheet" href="assets/css/login.css">
<style>
@font-face {
font-family: 'product sans';
src: url('assets/css/Product Sans Bold.ttf');
}
h1{
font-family :'product sans' !important;
font-size:48px !important;
margin-top:20px;
text-align:center;
}
body {
background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.login-form {
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
border-radius: 0px;
}
</style>
<?php
if(isset($_GET['err']) || isset($_GET['pwd'])) {
if($_GET['err'] === 'pwdnotmatch') {
echo '<script>alert("Passwords do not match");</script>';
} else if($_GET['err'] === 'sqlerr') {
echo '<script>alert("An error occured");</script>';
} else if($_GET['pwd'] === 'updated') {
echo '<script>alert("Your password has been updated");</script>';
}
41
exit();
}
?>
<div class="flex-container">
<div class="login-form mt-4" style="height: 300px;">
<h1 class="text-primary mb-3 text-center">Reset Password</h1>
<?php
$selector = $_GET['selector'];
$validator = $_GET['validator'];
if(empty($selector) || empty($validator)){
// echo $_GET;
echo '<script>alert("Could not validate your request")</script>';
} else {
if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
?>
<form method="POST" action="includes/reset-password.inc.php">
<input type="hidden" name="selector" value="<?php echo $selector ?>">
<input type="hidden" name="validator" value="<?php echo $validator ?>">
<div class="flex-container">
<div>
<i class="fa fa-lock text-primary"></i>
</div>
<div>
<input type="password" name="password" class="form-input"
placeholder="Enter password"
required pattern="(?=.\d)(?=.[a-z])(?=.*[A-Z]).{8,}"
title="Must contain at least one number and one uppercase and lowercase letter,
and at least 8 or more characters">
</div>
</div>
<div class="flex-container">
<div>
<i class="fa fa-lock text-primary"></i>
</div>
<div>
<input type="password" name="password_repeat" class="form-input"
placeholder="Confirm password" required>
</div>
42
</div>
<div class="submit">
<button name="new-pwd-submit" type="submit" class="button">
Submit</button>
</div>
</form>
<?php
}
}
?>
</div>
</div>
<?php subview('footer.php'); ?>
<?php include_once 'helpers/helper.php'; ?>
<?php subview('header.php'); ?>
<link rel="stylesheet" href="assets/css/form.css">
<style>
.rating {
display: inline-block;
position: relative;
height: 50px;
line-height: 50px;
font-size: 50px;
}
.rating label {
position: absolute;
top: 0;
left: 0;
height: 100%;
cursor: pointer;
}
.rating label:last-child {
position: static;
}
43
.rating label:nth-child(1) {
z-index: 5;
}
.rating label:nth-child(2) {
z-index: 4;
}
.rating label:nth-child(3) {
z-index: 3;
}
.rating label:nth-child(4) {
z-index: 2;
}
.rating label:nth-child(5) {
z-index: 1;
}
.rating label input {
position: absolute;
top: 0;
left: 0;
opacity: 0;
}
.rating label .icon {
float: left;
color: transparent;
}
.rating label:last-child .icon {
color: #000;
}
.rating:not(:hover) label input:checked ~ .icon,
.rating:hover label:hover input ~ .icon {
44
color: #09f;
}
.rating label input:focus:not(:checked) ~ .icon:last-child {
color: #000;
text-shadow: 0 0 5px #09f;
}
@font-face {
font-family: 'product sans';
src: url('assets/css/Product Sans Bold.ttf');
}
h1 {
font-size: 50px !important;
margin-bottom: 20px;
color: #393939;
font-family :'product sans' !important;
text-align: center;
}
textarea {
color: cornflowerblue !important;
border :3px solid #31B0D5 !important;
background-color: whitesmoke !important;
font-weight: bold !important;
}
textarea:focus {
outline-style: none !important;
outline: none !important;
}
*:focus {
outline: none !important;
}
input {
border :0px !important;
border-bottom: 2px solid #31B0D5 !important;
color :cornflowerblue !important;
border-radius: 0px !important;
45
font-weight: bold !important;
border: none;
border-bottom: 2px solid #31B0D5;
}
label {
color : #79BAEC !important;
font-size: 19px;
}
div.form-group label {
color: cornflowerblue !important;
font-weight: bold;
}
div.rating label{
font-size: 40px !important;
}
.input-group {
position: relative;
display: inline-block;
width: 100%;
}
.form-box {
padding: 40px;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
</style>
<main>
<?php
if(isset($_GET['error'])) {
if($_GET['error'] === 'invalidemail') {
echo '<script>alert("Invalid email")</script>';
} else if($_GET['error'] === 'sqlerror') {
echo"<script>alert('Database error')</script>";
} else if($_GET['error'] === 'success') {
echo"<script>alert('Thank you for your Feedback')</script>";
}
}
?>
46
<div class="container mb-4">
<h1> <i class="far fa-comment-alt"></i> FEEDBACK</h1>
<div class="row justify-content-center">
<div class="col-md-6 bg-light form-box">
<form action="includes/feedback.inc.php" method="POST">
<div class="row justify-content-center">
<div class="col-12 ">
<div class="input-group">
<label for="user_id">Email</label>
<input type="text" name="email" id="user_id" required >
</div>
</div>
<div class="col-12 mt-4">
<div class="form-group">
<label for="exampleFormControlTextarea1">What was your first impression
when you entered the website?</label>
<textarea class="form-control" id="exampleFormControlTextarea1" name="1"
rows="3" required></textarea>
</div>
</div>
<div class="col-12 mt-4">
<div class="form-group">
<select class="mt-4" name="2" style="border: 0px; border-bottom:
2px solid #31B0D5; background-color: whitesmoke !important;
font-weight: bold !important;color :cornflowerblue !important;
width:100%" required>
<option selected disabled>How did you first hear about us?</option>
<option >Search Engine</option>
<option >Social Media</option>
<option >Friend/Relative</option>
<option >Word of Mouth</option>
<option >Television</option>
<option>Other</option>
</select>
</div>
</div>
47
<div class="col-12 mt-4">
<div class="form-group">
<label for="exampleFormControlTextarea1">Is there anything missing on this page?</label>
<textarea class="form-control" id="exampleFormControlTextarea1" name="3"
rows="3" required></textarea>
</div>
</div>
</div>
<div class="row">
<div class="rating ml-3">
<label>
<input type="radio" name="stars" value="1" required />
<span class="icon">★</span>
</label>
<label>
<input type="radio" name="stars" value="2" required />
<span class="icon">★</span>
<span class="icon">★</span>
</label>
<label>
<input type="radio" name="stars" value="3" required />
<span class="icon">★</span>
<span class="icon">★</span>
<span class="icon">★</span>
</label>
<label>
<input type="radio" name="stars" value="4" required />
<span class="icon">★</span>
<span class="icon">★</span>
<span class="icon">★</span>
<span class="icon">★</span>
</label>
<label>
<input type="radio" name="stars" value="5" required />
<span class="icon">★</span>
48
<span class="icon">★</span>
<span class="icon">★</span>
<span class="icon">★</span>
<span class="icon">★</span>
</label>
</div>
</div>
<div class="row">
<div class="col text-center">
<button name="feed_but" type="submit"
class="btn btn-primary mt-3">
<div style="font-size: 1.5rem;">
<i class="fa fa-lg fa-arrow-right"></i>
</div>
</button>
</div>
</div>
</form>
</div>
</div>
</div>
<?php subview('footer.php'); ?>
<script>
$(document).ready(function(){
$('.input-group input').focus(function(){
me = $(this) ;
$("label[for='"+me.attr('id')+"']").addClass("animate-label");
}) ;
$('.input-group input').blur(function(){
me = $(this) ;
if ( me.val() == ""){
$("label[for='"+me.attr('id')+"']").removeClass("animate-label");
}
}) ;
// $('#test-form').submit(function(e){
// e.preventDefault() ;
// alert("Thank you") ;
49
// })
});
</script>
</main>
<footer>
<em><h5 class=" text-center p-0 brand mt-2">
<img src="assets/images/plane-logo.png"
height="40px" width="40px" alt="">
</h5></em>
<p class=" text-center">&copy; <?php echo date('Y');?> - Online Flight Booking</p>
th {
font-size: 22px;
/* font-family: 'Courier New', Courier, monospace; */
}
td {
margin-top: 10px !important;
font-size: 16px;
font-weight: bold;
/* color: #3931af; */
color: #424242;
}
</style>
<main>
<?php if(isset($_POST['search_but'])) {
$dep_date = $_POST['dep_date'];
$ret_date = isset($_POST['ret_date'])? $_POST['ret_date'] : '';
$dep_city = $_POST['dep_city'];
$arr_city = $_POST['arr_city'];
$type = $_POST['type'];
$f_class = $_POST['f_class'];
$passengers = $_POST['passengers'];
if($dep_city === $arr_city){
header('Location: index.php?error=sameval');
exit();
}
50
<?php include_once 'helpers/helper.php'; ?>
<?php subview('header.php');
require 'helpers/init_conn_db.php';
?>
<link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200&display=swap" rel="stylesheet">
<style>
table {
background-color: white;
}
@font-face {
font-family: 'product sans';
src: url('assets/css/Product Sans Bold.ttf');
}
h1{
font-family :'product sans' !important;
color:#424242 ;
font-size:40px !important;
margin-top:20px;
text-align:center;
}
th {
font-size: 22px;
/* font-family: 'Courier New', Courier, monospace; */
}
td {
margin-top: 10px !important;
font-size: 16px;
font-weight: bold;
/* color: #3931af; */
color: #424242;
}
</style>
51
<main>
<?php if(isset($_POST['search_but'])) {
$dep_date = $_POST['dep_date'];
$ret_date = isset($_POST['ret_date'])? $_POST['ret_date'] : '';
$dep_city = $_POST['dep_city'];
$arr_city = $_POST['arr_city'];
$type = $_POST['type'];
$f_class = $_POST['f_class'];
$passengers = $_POST['passengers'];
if($dep_city === $arr_city){
header('Location: index.php?error=sameval');
exit();
}
if($dep_city === '0') {
header('Location: index.php?error=seldep');
exit();
}
if($arr_city === '0') {
header('Location: index.php?error=selarr');
exit();
}
?>
<div class="container-md mt-2">
<h1 class="display-4 text-center "
>FLIGHTS FROM: <br> <?php echo $dep_city; ?>
to <?php echo $arr_city; ?> </h1>
<table class="table table-striped table-bordered table-hover">
<thead>
<tr class="text-center">
<th scope="col">Airline</th>
<th scope="col">Departure</th>
<th scope="col">Arrival</th>
<th scope="col">Status</th>
<th scope="col">Fare</th>
<th scope="col">Buy</th>
52
</tr>
</thead>
<tbody>
<?php
$sql = 'SELECT * FROM Flight WHERE source=? AND Destination =? AND
DATE(departure)=? ORDER BY Price';
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt,$sql);
mysqli_stmt_bind_param($stmt,'sss',$dep_city,$arr_city,$dep_date);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
while ($row = mysqli_fetch_assoc($result)) {
$price = (int)$row['Price']*(int)$passengers;
if($type === 'round') {
$price = $price*2;
}
if($f_class == 'B') {
$price += 0.5*$price;
}
if($row['status'] === '') {
$status = "Not yet Departed";
$alert = 'alert-primary';
} else if($row['status'] === 'dep') {
$status = "Departed";
$alert = 'alert-info';
} else if($row['status'] === 'issue') {
$status = "Delayed";
$alert = 'alert-danger';
} else if($row['status'] === 'arr') {
$status = "Arrived";
$alert = 'alert-success';
}
echo "
<tr class='text-center'>
<td>".$row['airline']."</td>
53
<td>".$row['departure']."</td>
<td>".$row['arrivale']."</td>
<td>
<div>
<div class='alert ".$alert." text-center mb-0 pt-1 pb-1'
role='alert'>
".$status."
</div>
</div>
</td>
<td>$ ".$price."</td>
";
if(isset($_SESSION['userId']) && $row['status'] === '') {
echo " <td>
<form action='pass_form.php' method='post'>
<input name='flight_id' type='hidden' value=".$row['flight_id'].">
<input name='type' type='hidden' value=".$type.">
<input name='passengers' type='hidden' value=".$passengers.">
<input name='price' type='hidden' value=".$price.">
<input name='ret_date' type='hidden' value=".$ret_date.">
<input name='class' type='hidden' value=".$f_class.">
<button name='book_but' type='submit'
class='btn btn-success mt-0'>
<div style=''>
<i class='fa fa-lg fa-check'></i>
</div>
</button>
</form>
</td>
";
} elseif (isset($_SESSION['userId']) && $row['status'] === 'dep') {
echo "<td>Not Available</td>";
} else {
echo "<td>Login to continue</td>";
}
54
echo '</tr> ';
}
?>
</tbody>
</table>
</div>
<?php } ?>
</main>
<?php subview('footer.php'); ?>
<footer style="
position: absolute;
bottom: 0;
width: 100%;
height: 2.5rem;
">
<em><h5 class=" text-center p-0 brand mt-2">
<img src="assets/images/plane-logo.png"
height="40px" width="40px" alt="">
</h5></em>
<p class=" text-center">&copy; <?php echo date('Y');?> - Online Flight Booking</p>
</footer>
<?php include_once 'helpers/helper.php'; ?>
<?php subview('header.php'); ?>
<?php if(isset($_SESSION['userId'])) {
require 'helpers/init_conn_db.php';
?>
<style>
body {
background: transparent; /* fallback for old browsers */
}
55
@font-face {
font-family: 'product sans';
src: url('assets/css/Product Sans Bold.ttf');
}
div.out {
padding: 30px;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
border-top-left-radius: 20px;
border-bottom-right-radius: 20px;
}
.city {
font-size: 24px;
}
p {
margin-bottom: 10px;
font-family: product sans;
}
.alert {
/* font-family: 'Courier New', Courier, monospace; */
font-weight: bold;
}
.date {
font-size: 24px;
}
.time {
font-size: 27px;
margin-bottom: 0px;
}
.stat {
font-size: 17px;
}
h1 {
font-weight: lighter !important;
font-size: 45px !important;
margin-bottom: 20px;
56
font-family :'product sans' !important;
font-weight: bolder;
}
.row {
background-color: white;
}
@font-face {
font-family: 'product sans';
src: url('assets/css/Product Sans Bold.ttf');
}
</style>
<main>
<div class="container">
<h1 class="text-center mt-4 mb-4">FLIGHT STATUS</h1>
<?php
$stmt_t = mysqli_stmt_init($conn);
$sql_t = 'SELECT * FROM Ticket WHERE user_id=?';
$stmt_t = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt_t,$sql_t)) {
header('Location: ticket.php?error=sqlerror');
exit();
} else {
mysqli_stmt_bind_param($stmt_t,'i',$_SESSION['userId']);
mysqli_stmt_execute($stmt_t);
$result_t = mysqli_stmt_get_result($stmt_t);
while($row_t = mysqli_fetch_assoc($result_t)) {
$stmt = mysqli_stmt_init($conn);
$sql = 'SELECT * FROM Passenger_profile WHERE passenger_id=?';
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)) {
header('Location: my_flights.php?error=sqlerror');
exit();
} else {
mysqli_stmt_bind_param($stmt,'i',$row_t['passenger_id']);
57
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if ($row = mysqli_fetch_assoc($result)) {
$sql_f = 'SELECT * FROM Flight WHERE flight_id=? ';
$stmt_f = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt_f,$sql_f)) {
header('Location: my_flights.php?error=sqlerror');
exit();
} else {
mysqli_stmt_bind_param($stmt_f,'i',$row_t['flight_id']);
mysqli_stmt_execute($stmt_f);
$result_f = mysqli_stmt_get_result($stmt_f);
if($row_f = mysqli_fetch_assoc($result_f)) {
$date_time_dep = $row_f['departure'];
$date_dep = substr($date_time_dep,0,10);
$time_dep = substr($date_time_dep,10,6) ;
$date_time_arr = $row_f['arrivale'];
$date_arr = substr($date_time_arr,0,10);
$time_arr = substr($date_time_arr,10,6) ;
if($row_f['status'] === '') {
$status = "Not yet Departed";
$alert = 'alert-primary';
} else if($row_f['status'] === 'dep') {
$status = "Departed";
$alert = 'alert-info';
} else if($row_f['status'] === 'issue') {
$status = "Delayed";
$alert = 'alert-danger';
} else if($row_f['status'] === 'arr') {
$status = "Arrived";
$alert = 'alert-success';
}
echo '
<div class="row out mb-5 ">
<div class="col-md-4 order-lg-3 order-md-1"> ';
58
if($row_f['status'] === 'arr') {
echo '
<div class="row">
<div class="col-1 p-0 m-0">
<i class="fa fa-circle mt-4 text-success"
style="float: right;"></i>
</div>
<div class="col-10 p-0 m-0 mt-3" style="float: right;">
<hr class="bg-success">
</div>
<div class="col-1 p-0 m-0">
<i class="fa fa-2x fa-fighter-jet mt-3 text-success"
></i>
</div>
</div>
';
} else {
echo '
<div class="row">
<div class="col-1 p-0 m-0">
<i class="fa fa-2x fa-fighter-jet mt-3 text-success"
style="float: right;"></i>
</div>
<div class="col-10 p-0 m-0 mt-3" style="float: right;">
<hr style="background-color: lightgrey;">
</div>
<div class="col-1 p-0 m-0">
<i class="fa fa-circle mt-4"
style="color: lightgrey;"></i>
</div>
</div>
';
}
echo '
</div>
59
<div class="col-md-3 col-6 order-md-2 pl-0 text-center
order-lg-2 card-dep">
<p class="city">'.$row_f['source'].'</p>
<p class="stat">Scheduled Departure:</p>
<p class="date">'.$date_dep.'</p>
<p class="time">'.$time_dep.'</p>
</div>
<div class="col-md-3 col-6 order-md-4 pr-0 text-center
order-lg-4 card-arr"
style="float: right;">
<p class="city">'.$row_f['Destination'].'</p>
<p class="stat">Scheduled Arrival:</p>
<p class="date">'.$date_arr.'</p>
<p class="time">'.$time_arr.'</p>
</div>
<div class="col-lg-2 order-md-12">
<div class="alert '.$alert.' mt-5 text-center"
role="alert">
'.$status.'
</div>
</div>
</div> ';
}
}
}
}
}
}
?>
</div>
</main>
<?php } ?>
<?php subview('footer.php'); ?>