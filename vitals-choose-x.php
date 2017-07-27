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

//Get witch Vitamin should be shown, saved in the vit variable, given from the previous page in the URL
$vit = $_GET["vit"];

//Create connection to db
$con = new mysqli($servername, $username, $password, $dbname);
$con->set_charset("utf8");

//Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

//sql query for the information of the vitamin/mineral
$sql = "SELECT * FROM inhaltsstoff WHERE Inhaltsstoff = '$vit'";
$result = mysqli_query($con, $sql);

//Content
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $vitalText = $row['Infotext'];
    $vitalUnit = $row['Einheit']; //measured unit
    $vitalCategory = $row['Kategorie'];
}

//Arrays for saving fruitdata
$fruits = array();
$fruitdata = array();

//sql query for fruitdata
$sql = "SELECT * FROM frucht ORDER BY $vit DESC LIMIT 4";
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $fruits[] = $row['Fruchtname'];
    $fruitdata[] = $row[$vit];
}

//Array for Seasons
$seasons = array();

//sql query for fruitdata
//wäre auch als einfache Abfrage nur über Tabelle saison möglich, hier zur Übung Join
//einfache Abfrage: SELECT MonatID FROM saison WHERE Frucht = '$fruits[$i]';
//SELECT * FROM wäre möglich in Verbindung mit mysqli_fetch_array und $row['MonatID']

for ($i = 0; $i < 4; $i++) {
    $sql = "SELECT MonatID FROM frucht, fruchtsaison WHERE Fruchtname = Frucht and Frucht = '$fruits[$i]'";
    $result = mysqli_query($con, $sql);

    while ($row = $result->fetch_row()) {
        $seasons[$i][] = $row[0];
    }
}

//Close connection
$result->close();

$con->close();

//save arrays in json format
//fruit json
file_put_contents("json/fruits.json", json_encode($fruits, JSON_NUMERIC_CHECK));

//fruitdata json
file_put_contents("json/fruitdata.json", json_encode($fruitdata, JSON_NUMERIC_CHECK));

//seasons json
file_put_contents("json/seasons.json", json_encode($seasons, JSON_NUMERIC_CHECK));


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

                    <?php
                        //Vitamin or Mineral nav activ
                        if($vitalCategory == "Vitamin") {
                            echo "<li class='active'><a href='/vitals/vitamins.php'>Vitamine <span class='sr-only'>(current)</span></a></li>";
                            echo "<li><a href='/vitals/mineral-spurenelement.php'>Mineralstoffe & Spurenelemente</a></li>";
                        }
                        else {
                            echo "<li><a href='/vitals/vitamins.php'>Vitamine <span class='sr-only'>(current)</span></a></li>";
                            echo "<li class='active'><a href='/vitals/mineral-spurenelement.php'>Mineralstoffe & Spurenelemente</a></li>";
                        }
                    ?>

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
        <div class="col-md-1 col-lg-2"></div>
        <div class="col-md-10 col-lg-8">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-8" style="margin-bottom:20px;">
                    <?php
                    //Heading
                    echo "<h2>$vitalCategory $vit</h2>";

                    //Text
                    echo $vitalText;
                    ?>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <canvas id="chart" width="200%" style="margin-top:25px; margin-bottom: 10px; margin-left: 20px"></canvas>
                    <?php
                    //Subtitel of chart
                    echo "<p style='text-align: center; margin-left: 35px'>Gehalt in $vitalUnit pro 100g</p>";
                    ?>

                </div>

                <div class="row" >
                    <div style="margin-left: 30px">

                            <div class="fruitbox">
                                <div class="col-md-12">

                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-xs-12 col-sm-12 col-md-3 fruitcolorbox border5">
                                            <?php
                                            $fruitname = "fruitpics/" . $fruits[0] . ".png";
                                            echo '<img src='.$fruitname.' title='.$fruits[0].' class="fruitimg">';
                                            ?>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-9" style="text-align: left">
                                            <?php
                                            echo "<h3>$fruits[0] : Saison</h3>";
                                            ?>
                                            <canvas id="season1" class="seasonstyle"></canvas>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-xs-12 col-sm-12 col-md-3 fruitcolorbox border4">
                                            <?php
                                            $fruitname = "fruitpics/" . $fruits[1] . ".png";
                                            echo '<img src='.$fruitname.' title='.$fruits[1].' class="fruitimg">';
                                            ?>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-9" style="text-align: left">
                                            <?php
                                            echo "<h3>$fruits[1] : Saison</h3>";
                                            ?>
                                            <canvas id="season2" class="seasonstyle"></canvas>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-xs-12 col-sm-12 col-md-3 fruitcolorbox border3">
                                            <?php
                                            $fruitname = "fruitpics/" . $fruits[2] . ".png";
                                            echo '<img src='.$fruitname.' title='.$fruits[2].' class="fruitimg">';
                                            ?>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-9" style="text-align: left">
                                            <?php
                                            echo "<h3>$fruits[2] : Saison</h3>";
                                            ?>
                                            <canvas id="season3" class="seasonstyle"></canvas>
                                        </div>
                                    </div>

                                   <!-- <div class="row" style="margin-bottom: 10px">
                                        <div class="col-xs-12 col-sm-12 col-md-3 fruitcolorbox border2">
                                            <?php
/*                                            $fruitname = "fruitpics/" . $fruits[3] . ".png";
                                            echo '<img src='.$fruitname.' title='.$fruits[3].' class="fruitimg">';
                                            */?>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-9" style="text-align: left">
                                            <?php
/*                                            echo "<h3>$fruits[3] : Saison</h3>";
                                            */?>
                                            <canvas id="season4" class="seasonstyle"></canvas>
                                        </div>
                                    </div>-->

                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1 col-lg-2"></div>
    </div>
    <script src="js/season.js"></script>
    <script src="js/chart.js"></script>
</div>
</body>
</html>