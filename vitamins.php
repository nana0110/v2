<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Vitals</title>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.min.js"></script>
</head>
<body>

<?php

//Data for Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vitalsdb";

//Create connection to db
$con = new mysqli($servername, $username, $password, $dbname);
$con->set_charset("utf8");

//Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

//sql query for vitaminname
$sql = "SELECT Inhaltsstoff FROM inhaltsstoff WHERE Kategorie = 'Vitamin'";
$result = mysqli_query($con, $sql);

$vitamins = array();

//Content
while($row = $result->fetch_row()) {
    $vitamins[] = $row[0];
}

//Close connection
$result->close();

$con->close();

?>

<nav class="navbar navbar-default navbar-fixed-top top">
    <div class="container-fluid">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/vitals">VITALS</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#">Vitamine<span class="sr-only">(current)</span></a></li>
                    <li><a href="/vitals/mineral-spurenelement.php">Mineralstoffe & Spurenelemente</a></li>
                    <li><a href="/vitals/naehrstoffrechner.php">Nährstoffrechner</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
        <div class="col-md-1">
        </div>
    </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="row">

                <?php
                //Card for each vitamin in the database
                for($i = 0; $i < count($vitamins); $i++){
                    echo '<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">';
                    echo '<div class="flip">';
                    echo '<div class="card">';
                    echo '<div class="face front">';
                    $href = "/vitals/vitals-choose-x.php?vit=" . $vitamins[$i] ;
                    echo "<a href= $href>";
                    echo '<div class="box maingreen">';
                    echo "<h2>$vitamins[$i]</h2>";
                    echo '</div>';
                    echo '</a>';
                    echo ' </div>';
                    echo '<div class="face back">';
                    echo "<a href= $href>";
                    echo '<div class="box maingray greenborder">';
                    echo '<p>Mehr erfahren</p>';
                    echo '</div>';
                    echo '</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>

            </div>
        </div>
        <script type="text/javascript">
            $('.flip').on('mouseenter', function(){
                $(this).find('.card').toggleClass('flipped');
            });
            $('.flip').on('mouseleave', function(){
                $(this).find('.card').toggleClass('flipped');
            });
        </script>
        <div class="col-md-2"></div>
    </div>
</div>
</body>
</html>