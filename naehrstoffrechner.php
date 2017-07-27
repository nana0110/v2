<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vitals</title>

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery.circliful.js"></script>
    <link rel="stylesheet" href="css/jquery.circliful.css">
    <script src="js/bootstrap-select.js"></script>
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/style.css">

 </head>
 <body>
 <nav class="navbar navbar-default navbar-fixed-top top">
     <div class="container-fluid ">
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
                    <li><a href="/vitals/vitamins.php">Vitamine<span class="sr-only">(current)</span></a></li>
                    <li><a href="/vitals/mineral-spurenelement.php">Mineralstoffe & Spurenelemente</a></li>
                    <li class="active"><a href="/vitals/naehrstoffrechner.php">Nährstoffrechner</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
         <div class="col-md-1">
         </div>
    </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid">
    <div class="row" style="margin-left: 5px">

        <div class="col-md-1">
        </div>
         <div class="col-md-6">
             <div class="row" style="margin-right: 30px">
                 <div class="col-md-12">
                     <h3>Vitamine</h3>

                     <div class="col-xs-3 col-sm-2 col-md-3 col-lg-2">
                         <div id="vitA"></div>
                     </div>
                     <div class="col-xs-3 col-sm-2 col-md-3 col-lg-2">
                         <div id="vitB1"></div>
                     </div>
                     <div class="col-xs-3 col-sm-2 col-md-3 col-lg-2">
                         <div id="vitB2"></div>
                     </div>
                     <div class="col-xs-3 col-sm-2 col-md-3 col-lg-2">
                         <div id="vitB3"></div>
                     </div>
                     <div class="col-xs-3 col-sm-2 col-md-3 col-lg-2">
                         <div id="vitB5"></div>
                     </div>
                     <div class="col-xs-3 col-sm-2 col-md-3 col-lg-2">
                         <div id="vitB6"></div>
                     </div>
                     <div class="col-xs-3 col-sm-2 col-md-3 col-lg-2">
                         <div id="vitB7"></div>
                     </div>
                     <div class="col-xs-3 col-sm-2 col-md-3 col-lg-2">
                         <div id="vitB9"></div>
                     </div>
                     <div class="col-xs-3 col-sm-2 col-md-3 col-lg-2">
                         <div id="vitC"></div>
                     </div>
                     <div class="col-xs-3 col-sm-2 col-md-3 col-lg-2">
                         <div id="vitE"></div>
                     </div>
                     <div class="col-xs-3 col-sm-2 col-md-3 col-lg-2">
                         <div id="vitK"></div>
                     </div>
                 </div>
             </div>

             <div class="row" style="margin-right: 30px">

                     <div class="col-md-6">
                         <h3>Mineralien</h3>
                         <div class="progress rechnerBar">
                             <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                                  aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                 <p class="text-justify progressText">Calcium</p>
                             </div>
                         </div>
                         <div class="progress rechnerBar">
                             <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                                  aria-valuemin="0" aria-valuemax="100" style="width:15%">
                                 <p class="text-justify progressText">Kalium</p>
                             </div>
                         </div>
                         <div class="progress rechnerBar">
                             <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                                  aria-valuemin="0" aria-valuemax="100" style="width:35%">
                                 <p class="text-justify progressText">Magnesium</p>
                             </div>
                         </div>
                         <div class="progress rechnerBar">
                             <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                                  aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                 <p class="text-justify progressText">Phosphor</p>
                             </div>
                         </div>
                     </div>


                     <div class="col-md-6">
                         <h3>Spurenelemente</h3>
                         <div class="progress rechnerBar">
                             <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                                  aria-valuemin="0" aria-valuemax="100" style="width:60%">
                                 <p class="text-justify progressText">Eisen</p>
                             </div>
                         </div>
                         <div class="progress rechnerBar">
                             <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                                  aria-valuemin="0" aria-valuemax="100" style="width:30%">

                                 <p class="text-justify progressText">Kupfer</p>
                             </div>
                         </div>
                     </div>


             </div>


         </div>
         <div class="col-md-4">

             <!--<select class="selectpicker" id="PersonentypButton">
                 <option>Mann</option>
                 <option>Frau</option>
                 <option>Schwanger</option>
                 <option>Stillend</option>
             </select>-->


             <div class="dropdown buttonSettings">
                 <button class="btn rechnerButton btn-primary dropdown-toggle" id="dropdownPerson" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     Personentyp
                     <span class="caret"></span>
                 </button>
                 <ul class="dropdown-menu" aria-labelledby="dropdownPerson">
                     <li><a href="#">Mann</a></li>
                     <li><a href="#">Frau</a></li>
                     <li><a href="#">Schwanger</a></li>
                     <li><a href="#">Stillend</a></li>
                 </ul>
             </div>

             <div class="btn-group btn-group-justified buttonSettings" role="group" aria-label="hello">
                 <div class="btn-group" role="group">
                     <button class="btn rechnerButton btn-primary dropdown-toggle" id="dropdownFrucht" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Obst & Gemüse
                         <span class="caret"></span>
                     </button>
                     <ul class="dropdown-menu">
                         <li><a href="#">nur Gemüse</a></li>
                         <li><a href="#">nur Obst</a></li>
                     </ul>
                 </div>
                 <div class="btn-group" role="group">
                     <button class="btn rechnerButton btn-primary dropdown-toggle" id="dropdownZucker" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Fruchtzucker
                         <span class="caret"></span>
                     </button>
                     <ul class="dropdown-menu">
                         <li><a href="#">niedriger Gehalt</a></li>
                         <li><a href="#">mittlerer Gehalt</a></li>
                         <li><a href="#">hoher Gehalt</a></li>
                         <li><a href="#">alle</a></li>
                     </ul>
                 </div>
             </div>
             <div class="panel panel-primary rechnerFruitsBox" style="margin-top: 15px;">

             </div>

         </div>
        <div class="col-md-1">
        </div>
     </div>
    <script>
            $('.selectpicker').selectpicker({
                style: 'btn-primary'
            });
    </script>
    <script src="js/RechnerCharts.js"></script>
 </div>
 </body>
 </html>