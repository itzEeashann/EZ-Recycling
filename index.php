<!DOCTYPE html>
<html>
    <head>
        <title>HOMEPAGE</title>
        <link href="css/homepage.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
         integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
         crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="Environmentalist/bootstrap.css">
 <style>
    body{
    background: linear-gradient(115deg, #a1c4fd  10%, #c2e9fb 90%);
    width:100%;
}
.content2{
    position: absolute;
    margin-top: 400px;
    left: 50PX;
    transform: translateY(-50%);
}
 </style>
    </head>
    <body>
        <div class="top">
            <nav>
                <h2 class="tt">EZ RECYCLING</h2>
                <ul>
                    <li><a href="#" >HOME</a></li>
                    <li><a href="#aboutus" >ABOUT US</a></li>
                    <li><a href="#services" >SERVICES</a></li>
                    <li><a href="#products" >PRODUCTS</a></li>
                    <li><a href="#events" >EVENTS</a></li>
                </ul>
                <a href="login.php" class="btn">LOGIN</a>
            </nav>
            <div class="content">
                <h1 style='font-size:2.5rem;font-weight:400;'>LET'S HELP OUR MOTHER EARTH</h1>
                <h1>GREEN AND CLEAN</h1>
                <br>
                <h4>REDUCE.REUSE.RECYCLE.</h4>
            </div>
            <div style='background:linear-gradient(360deg, #d57eeb  10%, #38f9d7 90%); padding :20px; border-radius:20px; width:750px; text-align:center;' class="content2">
                <h1 style='font-size:2.5rem;font-weight:600;'>Enjoy Exclusive Products and Events</h1>
                <h1 style='font-size:2.5rem;font-weight:600;'>By Being A Part Of Us</h1>
            </div>
        </div>

        <session class="about"  >
            <div class="main"style='background:linear-gradient(180deg, #fef9d7 30%, #84fab0 70%); border-radius:30px;margin:20px; width:98%; border:none;' >
                <img style='height:700px; width:700px;'src= "images/ttt1.png" >
                <div class="about-content" id="aboutus" style='width:600px; ;padding-bottom:50px; '>
                    <center><h2 style='padding-top:20px;color:black;font-size:4rem; font-weight:600;'>ABOUT US</h2></center><br>
                    <h5 style='text-align:justify;'>There is a dilemma with the world's garbage because of overconsumption and a throwaway society. Even sophisticated waste can potentially be recycled, but most materials are not worth recycling. As a result, while new resources are being mined from the soil to make new things, garbage builds up in landfills and pollutes the environment.
                        Our goal at EZ RECYCLING is to eliminate the concept of waste. We aim to work with organisations and individuals around the us to prevent rubbish from going to landfills or being burned and put into better use instead.</h5>
                    <br>
                    <p style='text-align:justify;'>The population of Malaysia is expected to reach 32.8 million in 2021, and as a result, there will be an enormous amount of solid waste produced, amounting to an estimated 38,427 metric tonnes per day (1.17 kg/capita/day). 82.5 percent of which is dumped in landfills. By 2022, there will be 14 million metric tonnes of MSW collected 
                        annually, which is enough to fill the Petronas Twin Towers every seven days.</p>
                        
                </div>
            </div>
        </session>

        <div class="service" id="services" style='background:  linear-gradient(180deg, #84fab0  10%, #8fd3f4 90%) ;  border-radius:30px;margin:20px;margin-top:none; width:98%;'>
            <div class="title">
                <h2 style='font-weight:900; -webkit-text-stroke-width: 2px;
    -webkit-text-stroke-color: black; font-size:10rem; margin-top:0; padding-top:0;'>Our Services</h2>
            </div>

            <div class="box" >
                <div class="c" >
                    <div class="button">
                        <i style='font-size:3rem;'class="fa-solid fa-recycle"></i>
                        <h5>AIMS</h5>
                        <div class="paragraph">
                            <p>The EZ RECYCLING working group's aim has been to concentrate on recycling and waste reduction in both residential and non-residential establishments. </p>
                        </div>
                    </div>
                </div>
                <div class="c" >
                    <div class="button">
                        <i style='font-size:3rem;'class="fa-solid fa-recycle"></i>
                        <h5>GOALS</h5>
                        <div class="paragraph">
                            <p>We hope to encourage, support and boost local businesses', people's, and government organisations' recycling initiatives  </p>
                        </div>
                    </div>
                </div>
                <div class="c" >
                    <div class="button">
                        <i style='font-size:3rem;'class="fa-solid fa-recycle"></i>
                        <h5>OBJECTIVES</h5>
                        <div class="paragraph">
                            <p>Our fundraising campaign is a continuous, year-round recycling initiative. We want recycling waste disposal to become routine behaviour!  </p>
                        </div>
                    </div>
                </div>
                
                </div>

                

                
            </div>
        </div>
        <div class="events" id="events" style='background: linear-gradient(180deg, #8fd3f4  10%, #d57eeb 90%)  ;  border-radius:30px;margin:20px; width:98%; padding-top:20px;' >
            <div >
                <center><h1 style='font-size:5rem; font-weight:bolder;'>Events</h1></center>
            </div>
                <div class="row mt-2 pb-3 ml-3  " style='padding-left:250px;'>
                    <?php
                        include 'testconfig.php';
                        $stmt = $conn->prepare('SELECT * FROM events where status=1');
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while ($row = $result->fetch_assoc()):
                    ?>
                    <div class="card"
                        style="width: 18rem; margin:1rem;padding:20px; border:solid black; border-radius:20px;background: linear-gradient(360deg, #43e97b  10%, #38f9d7 90%);">
                        <img style="width: 15rem;height: 10rem; " src="Environmentalist/uploads/<?= $row['event_pic'] ?>" class="card-img-top mb-2"
                            alt="Event Pic">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                <?= $row['Event_Name'] ?>
                            </h5>
                            <p class="card-text" style="text-align:left;">
                            <h5 style='margin-bottom:10px;'>Venue : &nbsp;&nbsp;
                                <?= $row['Venue'] ?>
                            </h5>
                            <h5 style='margin-bottom:10px;'>Date &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;
                                <?= $row['Date'] ?>
                            </h5>
                            <h5 style='margin-bottom:10px;'>Time &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;
                                <?= $row['Time'] ?>
                            </h5>
                            </p>
                            <br>
                            
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <div class="products" id="products" style='background:linear-gradient(180deg, #d57eeb  10%, #38f9d7 90%);   border-radius:30px;margin:20px; width:98%; padding-top:20px;' >
            <div >
                <center><h1 style='font-size:5rem; font-weight:bolder;'>Products</h1></center>
            </div>
                <div class="row mt-2 pb-3 ml-3  " style='padding-left:250px;'>
                    <?php
                        $select_products = mysqli_query($conn, "SELECT * FROM `product`");
                        if(mysqli_num_rows($select_products) > 0){
                        while($fetch_product = mysqli_fetch_assoc($select_products)){
                        ?>
                        <div class="card"
                        style="width: 18rem; margin:1rem;padding:20px; border:solid black; border-radius:20px;background: linear-gradient(360deg, #ff8b01 10%, yellow 90%);">
                            <img style="width: 15rem;height: 10rem; " src="img/<?php echo $fetch_product['product_image']; ?>" alt="">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                <?php echo $fetch_product['product_name']; ?>
                            </h5>
                            <p class="card-text" style="text-align:left;">
                            <h5 style='margin-bottom:10px;'>Price : &nbsp;&nbsp;
                                $<?php echo $fetch_product['product_price']; ?>/-
                            </h5>
                            <h5 style='margin-bottom:10px;'>Decs : &nbsp;&nbsp;
                                <?php echo $fetch_product['description']; ?>
                            </h5>
                            
                            </p>
                            <br>
                            
                        </div>
                        </div>

                        
                    <?php
                            };
                        };
                    ?>
                </div>
        </div>
        
        <div class="quotes" style='background:linear-gradient(180deg, #38f9d7 30%, #84fab0 70%); border-radius:30px;margin:20px; width:98%; height:200px; padding-top:20px; border:solid black;padding:10px; ' >
            <p style='font-size:3rem; -webkit-text-stroke-color: black; -webkit-text-stroke-width: .5px;'>"Let's Nurture The Nature</p> 
            <p style='font-size:3rem; -webkit-text-stroke-color: black; -webkit-text-stroke-width: .5px;'>So That We Can Have A Better Future"</p>
        </div>
        <footer style='border-radius: 0 0 20px 20px; '>
            <div class="fc">
                <div class="left">
                    <div class="logo">
                        <i class="fa-solid fa-leaf"></i>
                        <span class="logott">EZ RECYCLING</span>
                        <br>
                        <span class="copyright"> Copyright 2022. All Rights Reserved</span>
                    </div>
                    <div class="media" style="padding-right:40px">
                        <a href="https://www.facebook.com/profile.php?id=100084484185624"><i class="fa-brands fa-facebook"></i></a>
                        <a href="https://www.instagram.com/ez_recycling/"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://twitter.com/Jonatha87081554"><i class="fa-brands fa-twitter"></i></a>
                        <a href="mailto:ezrecycling02@gmail.com"><i class="fa-solid fa-envelope"></i></a>
                        <a href="https://www.youtube.com/channel/UCWrOJLcphEvxLYln732LE2Q/featured"><i class="fa-brands fa-youtube"></i></a>
                    </div>  
                </div>
            </div>        
        </footer>
        <a style='border:solid black;color:black;' class="btt" href="#"><i class="fa-solid fa-arrow-up"></i></a>
    </body>
</html>