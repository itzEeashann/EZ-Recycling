<?php
	include 'protected.php';
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.css">
	<title>Recyclable Item List</title>
	<style>
		main{
            height: 50px;
            margin: 0 0 4% 24%;
            padding-top: 2%; 
            font-family: system-ui;
            color: white;
            width: 60%;
            font-size: 40px;
        }
		
		#main-content {
			width: 76%;
			display: inline-block;
			margin-left: 23%;
		}

		#table_list {
			border-collapse: collapse;
			width: 100%;
		}
		#table_list td, #table_list th {
			border: 1px solid #ddd;
			padding: 5px;
		}

		#table_list tr{
			background-color: #202836;
			color: white;
			width: 100%;
		}
		
		#table_list th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #202836;
			color: #f0b159;
		}
		
		.box {
			display: flex;
			justify-content: space-between;
			margin: 20px;
		}
		
		div a{
			text-decoration: none;
			width: 100px;
			align: center;		
			height: 40px; 
			color: 	#0000ff;
			border-radius: 7px;
		}
        body{
        background: -webkit-linear-gradient(left, #0072ff, #00c6ff);
        font-family: 'Poppins';
        }
        .contact-form{
        background: #fff;
        margin-top: 10%;
        margin-bottom: 5%;
        width: 70%;
        }
        .contact-form .form-control{
        border-radius:1rem;
        }
        .contact-image{
        text-align: center;
        }
        .contact-image img{
        border-radius: 6rem;
        width: 11%;
        margin-top: -3%;
        }
        .contact-form form{
        padding: 14%;
        }
        .contact-form form .row{
        margin-bottom: -7%;
        }
        .contact-form h3{
        margin-bottom: 8%;
        margin-top: -10%;
        text-align: center;
        color: #0062cc;
        }
        .contact-form .btnContact {
        width: 50%;
        border: none;
        border-radius: 1rem;
        padding: 1.5%;
        background: #dc3545;
        font-weight: 600;
        color: #fff;
        cursor: pointer;
        }
        .btnContactSubmit
        {
        width: 50%;
        border-radius: 1rem;
        padding: 1.5%;
        color: #fff;
        background-color: #0062cc;
        border: none;
        cursor: pointer;
        }
        h2{
        text-align: center;
        font-size: 35px;
        font-family: Georgia, 'Times New Roman', Times, serif;
        color: #33110a;
        }
        table {
        border-collapse: collapse;
        width: 100%;
        position: relative;
        max-width: 700px;
        margin: 0 auto 100px;
        padding: 105px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        th, td {
        text-align: center;
        padding: 8px;
        color:black;
        }

        tr{background-color: #f2f2f2}

        th {
        background-color: #33110a;
        color: white;
        text-align: center;
        }


        button {
        background-color: #33110a;
        border: 1px solid rgba(27, 31, 35, .15);
        border-radius: 6px;
        color: #fff;

        }

        button:focus:not(:focus-visible):not(.focus-visible) {
        box-shadow: none;
        outline: none;
        }

        button:hover {
        background-color: #803e31fe;
        }

        button:active {
        background-color: #33110a;
        }
	</style>
</head>

<body>
	<div><?php include_once('adminheader.php');?></div> 
	<main>
		<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
  			<path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
		</svg>
    <span>Query Page</span>
	</main>
    <?php
        include("conn.php");
        $sql = "SELECT * FROM queries";
        $que = mysqli_query($con,$sql);
        $result = mysqli_fetch_assoc($que)           
    ?>
        <form method="post">
            <h3>Query Page</h3>
            <div class="row">
            <body>
                <link href="assets/css/HOME.css" rel="stylesheet">
                <?php
                    include_once('conn.php');
                    $query="SELECT * FROM queries where status='pending';";
                    $result= mysqli_query($con, $query);
                ?>
                    <table>
                    <tr>
                        <th hidden>#</th>
                        <th>Query Type</th>
                        <th>Username</th>
                        <th>Description</th>
                    </tr>
                    <?php
                    while($row=mysqli_fetch_assoc($result))
                    {
                    ?>
                    <tr>
                        <td hidden><?php echo $row['query_id'] ?></td>
                        <td><?php echo $row['query_type'] ?></td>
                        <td ><?php echo $row['username'] ?></td>
                        <td ><a href="feedback&description.php?query_id=<?php echo $row["query_id"];?>" >View Description</a></td>
                    </tr>
                    <?php  
                    }
                    ?>
                    </table>
            </body>
            </div>
        </form>
</body>
</html>