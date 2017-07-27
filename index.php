<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vitals</title>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top top" style="display:none">
    <div class="container-fluid">

        <div class="col-md-1"></div>
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
                <a class="navbar-brand" href="#">VITALS</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/vitals/vitamins.php">Vitamine<span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Mineralstoffe & Spurenelemente</a></li>
                    <li><a href="#">Nährstoffrechner</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
        <div class="col-md-1"></div>
    </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 welcome">
            <h3 class="visible-xs">VITALS</h3>
            <h2 class="hidden-xs visible-sm">VITALS</h2>
            <h1 class="hidden-xs hidden-sm">VITALS</h1>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="panel panel-default maingreen welcome-tile">
                        <div class="panel-body">
                            <h2><a href="/vitals/vitamins.php">Vitamine</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="panel panel-default maingreen welcome-tile">
                        <div class="panel-body">
                            <h2><a href="/vitals/mineral-spurenelement.php">Mineralstoffe & <br>Spurenelemente</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 card">
                    <div class="panel panel-default maingreen welcome-tile">
                        <div class="panel-body">
                            <h2><a href="/vitals/naehrstoffrechner.php">Nährstoffrechner</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
</body>
</html>