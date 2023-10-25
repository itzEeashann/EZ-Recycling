<?php 
	include('dbcon.php'); 
	include('../inc/session.php'); 

	if (isset($_SESSION['username'])) {
		$result = mysqli_query($con,"select * from accounts where username='".$_SESSION['username']."'");
        $row = mysqli_fetch_array($result);
	}
                        
?>





<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width,
initial-scale=1.0">
    <title>Collection</title>
    <script src="https://kit.fontawesome.com/8557daf5de.js" crossorigin="anonymous"></script>
</head>
<link rel="stylesheet" href="navbar.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">


<style>
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



<body >
    <!--Nav Bar Starts-->
    <h1 class='copyrite' style='text-align:right;'>EZ Recycling<sup><i style='font-size:small;' class="fa-solid fa-copyright"></i> </sup></h1>
        <div class="container">
        <div class="navigation">
            <div class="profile-pic">
                <img src="../uploads/<?php echo $row['picture']; ?>">
                <h1><?php echo $row['username'];?> </h1>
                <h3>Environmentalist</h3>
            </div>
            <ul>
                <li class="list ">
                    <a href="Dashboard.php">
                        <span class="icon"><i class="fa-solid fa-house-chimney"></i></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="list ">
                    <a href="Profile.php">
                        <span class="icon"><i class="fa-solid fa-user"></i></span>
                        <span class="title">Profile</span>
                    </a>
                </li>
                <li class="list ">
                    <a href="Event.php">
                        <span class="icon"><i class="fa-solid fa-calendar-check"></i></span>
                        <span class="title">Events</span>
                    </a>
                </li>
                <li class="list ">
                    <a href="ReqEvent.php">
                        <span class="icon"><i class="fa-solid fa-calendar-plus"></i></span>
                        <span class="title">Request Events</span>
                    </a>
                </li>
                <li class="list_active ">
                    <a href="Collection.php">
                        <span class="icon"><i class="fa-solid fa-recycle"></i></span>
                        <span class="title">Collection</span>
                    </a>
                </li>
                <li class="list ">
                    <a href="Delivery.php">
                        <span class="icon"><i class="fa-solid fa-truck"></i></span>
                        <span class="title">Delivery</span>
                    </a>
                </li>
                <center>
                <li class="list exit ">
                    <!-- <a href="Delivery.php"> -->
                            <button class="exit_btn" onclick="location.href='../inc/testlogout.php'" type="button"><i class="fa-solid fa-right-from-bracket"></i></button>
                    </a>
                </li>
                </center>
            </ul>
        </div>
    </div>
    <div class="official">
        <div class="mainbox animate-in">
            <div class="content">
                <strong><h1 style='font-weight:bold;text-align:center;'> Collections</h1></strong>

                <div class="pic"  style="text-align:center;">
                    <img style='width:350px; height:300px' src="../uploads/pic1.png" alt="">
                    <img style='width:350px; height:300px' src="../uploads/pic2.png" alt="">
                    <img style='width:350px; height:300px' src="../uploads/pic3.png" alt="">
                </div><br>
                <!-- Add New Modal -->
                <div class="modal fade" id="collection-model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New Collection</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post">
                                    <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                                    <div class="form-group">
                                        <label for="completedate">Date</label>
                                        <input type="date" class="form-control" id="completedate" name='date' required>
                                    </div><br>
                                    <label >Type Of Material</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="material_type"  value="Plastic"  required="required">
                                        <label class="form-check-label" >
                                            Plastic
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="material_type"  value="Glass" required="required">
                                        <label class="form-check-label" >
                                            Glass
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="material_type"  value="Paper" required="required">
                                        <label class="form-check-label" >
                                            Paper
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="material_type"  value="Cardboard" required="required">
                                        <label class="form-check-label" >
                                            Cardboard
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="completeqty">Amount (Kg)</label>
                                        <input type="number" name='amount' class="form-control" id="completeqty" placeholder='Total Amount Collected (Kg)'required>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="completedesc">Description</label>
                                        <textarea style='height:100px;' name="description" class="form-control" id="completedesc" required placeholder=' Location : &#10 Additional Descriptions :'></textarea>
                                    </div><br>
                                    
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" name='savedata'value='savedata'>Submit </button>
                                        <button type="button" class="btn btn-danger"data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            <!--################################################################################################################################## -->


            

            <!-- ######################################################################################################################################### -->

            <!-- Delete Modal -->
                <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                        <div class="modal-dialog" >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Collection Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post">

                                        <input type="hidden" name="delete_id" id="delete_id">

                                        <h4> Are You Sure To Delete This Entry</h4>
                                        
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" name='deletedata'value='savedata'>Yes </button>
                                            <button type="button" class="btn btn-danger"data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


            <!-- ######################################################################################################################################### -->



                <!-- content -->
                <div class="container my-3">
                    <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#collection-model">
                        Add Collection
                    </button>

                    <!-- Table -->
                    <div class="card" style='font-weight:bolder;'>
                        <div class="card-body">
                                     
                            <table id='datatableid' style='border-color:black;'class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Type of Material</th>
                                        <th scope="col">Amount (Kg)</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <?php

                                $sql = "SELECT * FROM recyclable_items_stock WHERE username='".$_SESSION['username']."'";
                                $que = mysqli_query($con,$sql);
                                while ($result = mysqli_fetch_assoc($que)) {
                                ?>  
                                <tbody>
                                    <tr>
                                    <td><?php echo $result['Recycle_stockID']; ?></td>
                                    <td><?php echo $result['date']; ?></td>
                                    <td><?php echo $result['material_type']; ?></td>
                                    <td><?php echo $result['amount']; ?> Kg</td>
                                    <td><?php echo $result['description']; ?></td>
                                    <td>
                                        <button STYLE='border:solid black; color:black;'type="button" class="btn btn-danger deletebtn"><i class="fa-solid  fa-trash"></i></button>
                                    </td>
                                    </tr>
                                </tbody>
                            <?php    
                                    }
                            ?>

                            </table>
                        </div>

                    </div>
                </div>
            </div>                   
        </div>                   
    </div>                   




<!-- JS  -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js" ></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"> </script>   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

    <!-- data tables -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>                            
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>                            
    <script>
        $(document).ready(function() {
            $('#datatableid').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                }
            });
        });
    </script>
    

    <script>
        $(document).ready(function() {
            $('.deletebtn').on('click',function(){

                $('#deletemodal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function() {
                    return $(this).text();
                    }).get();
                    
                    console.log(data);
                    $('#delete_id').val(data[0]);

            })      
        });

    </script>



</body>
</html>

<?php 
// savedata
	if (isset($_POST['savedata']))
    {
		$username = $_POST['username'];
		$date = $_POST['date'];
		$material_type = $_POST['material_type'];
		$amount = $_POST['amount'];
		$description = $_POST['description'];
		
		$sql = "INSERT INTO recyclable_items_stock(username,date,material_type,amount,description)
        
        VALUES
        
        ('$username','$date','$material_type','$amount','$description')";

        // echo $sql;

		$run = mysqli_query($con,$sql);

		if($run == true)
        {
			
			echo "<script> alert('Collection Inserted');
            window.open('collection.php','_self');</script>";

		}else{
			echo "<script> 
			alert('Failed to Insert Collection');
			</script>";
		}
	}






// Delete data
	if (isset($_POST['deletedata']))
    {

        $Recycle_stockID = $_POST['delete_id'];

        $sql = "DELETE FROM recyclable_items_stock WHERE Recycle_stockID='$Recycle_stockID'";
        $run = mysqli_query($con,$sql);

		if($run == true)
        {
			
			echo "<script> alert('Collection Data Deleted');
            window.open('collection.php','_self');</script>";

		}else{
			echo "<script> 
			alert('Failed to Delete Data');
			</script>";
		}
	}
	
 ?>
                
                