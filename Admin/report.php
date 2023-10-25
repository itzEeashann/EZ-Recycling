<?php 
 
	include('protected.php');              
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery</title>
    
    <script src="https://kit.fontawesome.com/8557daf5de.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="bootstrap.css">


    <style>
body{
        background: lightgreen;
    }
        .navigation .profile-pic h1 {
            font-weight: bolder;
            font-size:2rem;
            margin-bottom:0rem;
            color:black;
        }
        .navigation .profile-pic h3 {
            font-weight: bolder;
            margin-bottom:0rem;
            font-size:1.25rem;
            color:black;

        }
        .animate-in {
            -webkit-animation: fadeIn .5s ease-in;
            animation: fadeIn .5s ease-in;
        }

        .animate-out {
            -webkit-transition: opacity .5s;
            transition: opacity .5s;
            opacity: 0;
        }

        @-webkit-keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
    
</head>
<body>
    <!--Nav Bar Starts-->
    <h1 class='copyrite' style='text-align:right;'>EZ Recycling<sup><i style='font-size:small;' class="fa-solid fa-copyright"></i> </sup></h1>
    
    </div>
    <div class="official">

            <div class="content">
                <div class="page-title">
                    <center><h5 style='font-size:2.5rem; font-weight:bolder;margin-bottom:1rem;'>Report</h5></center>
                </div>
                <div class="col-md-2">
					            <label for="" class="control-label">&nbsp;</label>
                                <button class="btn-success btn-sm btn-block col-sm-12" onclick="myFunction()"><i class="fa fa-print"></i>Print</button>
					        </div>
                <br><hr class="mt-2 mb-4">


            
    <!-- ################################################################################################################## -->

    
    
                    <center><h2 style='font-weight:600; margin-bottom:1rem;'>Event Report</h2></center>
                    <div class="container">
                        <div class="row">

                            <table class="table table-bordered table-hover table-striped">
							<thead>
								<th>Event ID </th>
                                <th>Event Name</th>
                                <th>Venue</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Capacity</th>
								<th>Description</th>
                                <th>Picture</th>
                                <th>Username</th>
							</thead>
							 <tbody>
							 	<?php 
                                    include("conn.php");

									$sql = "SELECT * FROM events WHERE status = 1 ";
									$que = mysqli_query($con,$sql);
									$cnt = 1;
									while ($row = mysqli_fetch_assoc($que)) {
									?>

									
							 	<tr>
									<td><?php echo $row['Event_ID'] ?></td>
                                    <td><?php echo $row['Event_Name'] ?></td>
                                    <td><?php echo $row['Venue'] ?></td>
                                    <td><?php echo $row['Date'] ?></td>
                                    <td><?php echo $row['Time'] ?></td>
                                    <td><?php echo $row['capacity'] ?></td>
                                    <td><?php echo $row['descriptions'] ?></td>
                                    <td><?php echo  "<img src=uploads/".$row['event_pic'].' width=100px height="100px">'  ; ?></td>
                                    <td><?php echo $row['Username'] ?></td>
							 	
							 				<?php
							 			
							 			}
							 		 ?>
							 		
							 	</tr>

							 </tbody>
						</table>
                        </div>
                    </div>
                    <button class="btn-success btn-sm btn-block col-sm-1" onclick="window.location.href='admin_dashboard.php'"><i class="fa fa-home"></i>Home</button>
                                    </section>
 </body>
 <script>

	$('#print').click(function(){
		if($('table tbody').find('.item').length <= 0){
			alert_toast("No Data to Print",'warning')
			return false;
		}
		var nw= window.open("","_blank","width=900,heigth=600")
		nw.document.write($('noscript').html())
		nw.document.write($('#printable').html())
		nw.document.close()
		nw.print()
		setTimeout(function(){
			nw.close()
		},700)
	})

function myFunction() {
    window.print();
}

function home() {
    window.location.href = "Dashboard.php";
}
</script>  
 </html> 

 