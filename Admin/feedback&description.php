<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/querypage.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<?php
    include("conn.php");
    $query_id = $_GET['query_id'];
    $sql = "SELECT * FROM queries WHERE query_id='".$query_id ."'";
    $que = mysqli_query($con,$sql);
    $result = mysqli_fetch_assoc($que);

    if(isset($_POST['btnSubmit']))
    {    
    $query="UPDATE queries SET feedback='$_POST[feedback]', status='$_POST[status]' WHERE query_id='".$query_id ."'";
    $query_run= mysqli_query($con,$query);
    if($query_run)
    {
        echo ("<script LANGUAGE='JavaScript'> window.alert('Feedback Sent!'); window.location.href='admin-query.php';</script>");
    }
    else
    {
        echo ("<script LANGUAGE='JavaScript'> window.alert('Feedback was unable to send!'); window.location.href='admin-query.php';</script>");                
    }
    }           
?>
    <div class="container contact-form">
        <form method="post">
            <h3>Feedback and Description</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input disabled="disabled" name="description" class="form-control"  style="width: 100%; height: 350px;" value="<?=$result['description']?>"></input>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input name="feedback" class="form-control" placeholder="Your Feedback *" style="width: 100%; height: 150px;"></input>
                        <input name="status" class="form-control" hidden value='1'></input>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>


