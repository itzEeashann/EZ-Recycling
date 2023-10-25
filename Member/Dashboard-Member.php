<?php
session_start();
include("db.php");
	if (isset($_SESSION['username'])) {
		$result = mysqli_query($conn,"SELECT * from accounts where username='".$_SESSION['username']."'");
        $row = mysqli_fetch_array($result);
	}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<style>
    body {
        background-color: #D9AFD9;
        background-image: linear-gradient(0deg, #D9AFD9 0%, #97D9E1 100%);
        background-repeat: no-repeat;
    }
</style>
<body>
    <?php
        include("db.php");
        $result = mysqli_query($conn,"SELECT * FROM accounts");
        $row = mysqli_fetch_array($result);
            mysqli_close($conn);
    ?>
    <main class="l-main">
        <section class="home bd-grid" id="home">
            <div class="home__data">
                <h1 class="home__title">Hi,<br>Welcome <span class="home__title-color"><?php echo $_SESSION['username'];?></span></h1>
                <a href="profile.php" class="button">View Profile</a>
            </div>
        </section>

        <section class="about section " id="about">
            <h2 class="section-title">Order Product</h2>
            <div class="about__container bd-grid">
                <div class="about__img" href="profile.php">
                    <a href="product.php" class="work__img">
                        <img src="img/product.png" alt="">
                    </a>
                </div>
                
                <div>
                    <h2 class="about__subtitle">Welcome to our Product Line</h2>
                    <p class="about__text">Welcome to your product line where you can see endless trash being recyclced into products. Click on the image to view our product line.</p>           
                </div>                                   
            </div>
        </section>
        <section class="about section " id="about">
            <h2 class="section-title">Event</h2>
            <div class="about__container bd-grid">
                <div class="about__img" href="profile.php">
                    <a href="event.php" class="work__img">
                        <img src="img/temp.jpg" alt="">
                    </a>
                </div>
                <div>
                    <h2 class="about__subtitle">Welcome to our Event Page</h2>
                    <p class="about__text">Welcome to your event page where have a list of all of our upcoming events. Click on the image to view our upcoming event.</p>           
                </div>                                   
            </div>
        </section>
        <section class="about section " id="about">
            <h2 class="section-title">Query</h2>
            <div class="about__container bd-grid">
                <div class="about__img" href="querypage.php">
                    <a href="query.php" class="work__img">
                        <img src="img/query.jpg" alt="">
                    </a>
                </div>
                <div>
                    <h2 class="about__subtitle">Welcome to our Query Page</h2>
                    <p class="about__text">Welcome to your query page where you can ask various question and give feedbacks to our admin. Click on the image to view our query page.</p>           
                </div>                                   
            </div>
        </section>
    </main>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
        window.addEventListener("beforeunload", function () {
        document.body.classList.add("animate-out");
        });
    </script>
</body>

