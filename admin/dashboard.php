<?php
$login_session="" ;
 $url="";
 $status="";
 include('lock.php');

?>
<?php 
$today=date("Y-m-d");
$remcreditamt=0;
//count participant user
$sql = "SELECT * FROM showroom_user WHERE status = 1";
$query = $conn->query($sql);
$countpuser = $query->num_rows;
//Colunt end user
$sql = "SELECT * FROM model_details WHERE status=1";
$query = $conn->query($sql);
$countbusiness = $query->num_rows;
//Colunt total photos
$sql = "SELECT * FROM offers WHERE status=1";
$query = $conn->query($sql);
$countoffers = $query->num_rows;
//Colunt today photos
$sql = "SELECT * FROM model_details WHERE regdate='$today'";
$query = $conn->query($sql);
$counttodaybusiness = $query->num_rows;
//Colunt today member
$sql = "SELECT * FROM feedback WHERE status=1 AND comm_date='$today'";
$query = $conn->query($sql);
$counttodaycomment = $query->num_rows;
$conn->close();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>MyBike.com</title>
  <link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

 <link rel="stylesheet" href="./resources/bootstrap-3.3.6-dist/css/bootstrap.min.css">
  <script src="./resources/bootstrap-3.3.6-dist/js/jquery.min.js"></script>
  <script src="./resources/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
  
   <script src="./activemenu.js"></script>
   
   
<!-- fullCalendar 2.2.5 -->
<script src="./stock/assests/plugins/moment/moment.min.js"></script>
<script src="./stock/assests/plugins/fullcalendar/fullcalendar.min.js"></script>


<script type="text/javascript">
	$(function () {
			// top bar active
	$('#navDashboard').addClass('active');

      //Date for the calendar events (dummy data)
      var date = new Date();
      var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear();

      $('#calendar').fullCalendar({
        header: {
          left: '',
          center: 'title'
        },
        buttonText: {
          today: 'today',
          month: 'month'          
        }        
      });


    });
</script>

<style type="text/css">
	.ui-datepicker-calendar {
		display: none;
	}
	.card{
	width: 100%;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	text-align: center;
	}
	.cardHeader{
		background-color: #4CAF50;
		color: white; 
		padding: 10px; 
		font-size: 40px;
	}
	.cardContainer{
		padding: 10px;
	}
		
</style>

<!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="./stock/assests/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="./stock/assests/plugins/fullcalendar/fullcalendar.print.css" media="print">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body id="dashboard">
<?php
include('./header.php');
?>

 <div class="container" style="margin-top: 10px">
<div class="row">
	
	<div class="col-md-4">
		<div class="panel panel-success">
			<div class="panel-heading">
				
				<a href="#" style="text-decoration:none;color:black;">
					Total Showroom User
					<span class="badge pull pull-right"><?php echo $countpuser; ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
	</div> <!--/col-md-4-->

		<div class="col-md-4">
			<div class="panel panel-info">
			<div class="panel-heading">
				<a href="#" style="text-decoration:none;color:black;">
					Total Models
					<span class="badge pull pull-right"><?php echo $countbusiness; ?></span>
				</a>
					
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		</div> <!--/col-md-4-->

	<div class="col-md-4">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<a href="approvephoto.php" style="text-decoration:none;color:black;">
					Total Running Offers
					<span class="badge pull pull-right"><?php echo $countoffers; ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
	</div> <!--/col-md-4-->


	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading"> <i class="glyphicon glyphicon-calendar"></i> MyBike.com</div>
			<div class="panel-body">
				<img src="images/dashboard.png" class="img-responsive"/>				
			</div>	
		</div>
		
	</div>
	
		<div class="col-md-4">
		<div class="card">
		  <div class="cardHeader" >
		    <h1><?php echo date('d'); ?></h1>
		  </div>

		  <div class="cardContainer">
		    <p><?php echo date('l') .' '.date('d').', '.date('Y'); ?></p>
		  </div>
		</div> 
		<br/>

		<div class="card">
		  <div class="cardHeader" style="background-color:#245580;">
		    <h1><?php if($counttodaybusiness) {
		    	echo $counttodaybusiness;
				
		    	} else {
		    		echo '0';
		    		} ?></h1>
		  </div>

		  <div class="cardContainer">
		    <p> Today's Models</p>
		  </div>
		</div> 
		<br/>
		
		<div class="card">
		  <div class="cardHeader" style="background-color:#623b65;">
		    <h1><?php if($counttodaycomment) {
		    	echo $counttodaycomment;
		    	} else {
		    		echo '0';
		    		} ?></h1>
		  </div>

		  <div class="cardContainer">
		    <p> Today's Comments</p>
		  </div>
		</div>

	</div>

	
</div> <!--/row-->

</div> <!-- Close Container -->

<?php
include('./footer.php');
?>
</body>
</html>