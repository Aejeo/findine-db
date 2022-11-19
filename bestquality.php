<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Quality Restaurant</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/fave.ico" type="image/x-icon">

    <!-- Font awesome -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">   
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">    
    <!-- Date Picker -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datepicker.css">   
     <!-- Gallery Lightbox -->
    <link href="assets/css/magnific-popup.css" rel="stylesheet"> 
    <!-- Theme color -->
    <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">     

    <!-- Main style sheet -->
    <link href="style.css" rel="stylesheet">    

   
    <!-- Google Fonts -->

    <!-- Prata for body  -->
    <link href='https://fonts.googleapis.com/css?family=Prata' rel='stylesheet' type='text/css'>
    <!-- Tangerine for small title -->
    <link href='https://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>   
    <!-- Open Sans for title -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        h3, table, td, th {
            text-align: center;
            padding: 25px;
            margin: 10;
            font-family: "Prata";
        }
        form{
          padding: 25px;
        }
        b{
          padding-left: 2.5px;
        }

        h3{
          margin-top: 27%;
        }

        img{
          height: 360px;
          width: 1080px;
        }
    </style>
  </head>
  <body>
  <?php
        include 'dbconnect.php';
        include 'function.php';
    ?>

  <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>
    </a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header section -->
  <header id="mu-header">  
    <nav class="navbar navbar-default mu-main-navbar" role="navigation">  
      <div class="container">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <!-- LOGO -->       

           <!--  Text based logo  -->
          <a class="navbar-brand" href="./index.php">FinD<span>INE</span></a> 

		      <!--  Image based logo  -->
          <!-- <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" alt="Logo img"></a>  -->
         

        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right mu-main-nav">
            <li><a href="./index.php">HOME</a></li>
            <li><a href="./index.php#mu-about-us">ABOUT US</a></li>
            <li><a href="./index.php#mu-contact">CONTACT</a></li> 
            <li><a href="./search.php">DISCOVER RESTO</a></li>
            <li><a href="./bestquality.php">QUALITY RESTO</a></li>                 
          </ul>                           
        </div><!--/.nav-collapse -->       
      </div>          
    </nav> 
  </header>
  <!-- End header section -->
  <?php    
        include 'dbconnect.php';
        include 'function.php';
        $quality = [['$unwind' => ['path' => '$grades']], ['$project' => ['name' => 1, 'GTE90' => ['$cond' => ['if' => ['$gt' => ['$grades.score', 90]], 'then' => true, 'else' => false]], 'grades' => 1, 'borough' => 1, 'cuisine' => 1]], ['$match' => ['GTE90' => true]], ['$sort' => ['grades.score' => 1]]];
        $cursor = $collection->aggregate($quality);
    ?>
      
  <section id="mu-slider">
    <div class="mu-slider-area"> 

      <!-- Top slider -->
      <div class="mu-top-slider">

        <!-- Top slider single slide -->
        <div class="mu-top-slider-single">
          <img src="assets/img/slider/indian.jpg" alt="img">
          <!-- Top slider content -->
          <div class="mu-top-slider-content">
          <span class="mu-slider-small-title">Find</span>
            <h2 class="mu-slider-title">your DINE <span style="color: #FFA500">QUALITY</h2>
            <p>Know the best quality restaurants only here with us</p>        
          </div>
          <!-- / Top slider content -->
         </div>

      </div>
    </div>
  </section>  
    
    
    
    </br></br></br></br>
  <h3>Quality Restaurants</h3>
    <form method="post">
        <b>Search Keyword:</b> <input type="text" name="keyword" placeholder="Enter a Keyword"></input>
         <input type="submit" class="btn btn-primary" name="name" value="Name"></input>
         <input type="submit" class="btn btn-primary" name="cuisine" value="Cuisine"></input><br/></br>
        <b>Borough: </b> <input type="submit" class="btn btn-info" name="brooklyn" value="Brooklyn"></input>
        <input type="submit" class="btn btn-secondary" name="queens" value="Queens"></input>
        <input type="submit" class="btn btn-success" name="manhattan" value="Manhattan"></input>
        <input type="submit" class="btn btn-danger" name="bronx" value="Bronx"></input>
        <input type="submit" class="btn btn-warning" name="staten" value="Staten Island"></input>
    </form>
    <table class="table">
        <th>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Borough</th>
                <th scope="col">Cuisine</th>
                <th scope="col">Grades</th>
            </tr>
        </th>
        <?php
        foreach ($cursor as $document) {               
            ?>
             <tr>
                <td scope="row"><?php echo $document['name']; ?> </td>
                 <td><?php echo $document['borough']; ?> </td>
                 <td><?php echo $document['cuisine']; ?> </td>
                 <td><?php echo $document['grades']['date'], "<br>", $document['grades']['grade'], "<br>", $document['grades']['score']; ?> </td>
            </tr>
        <?php
            }
        ?>
    </table>
    </div>
  

  <!-- Start Footer -->
  <footer id="mu-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <div class="mu-footer-area">
           <div class="mu-footer-social">
            <a href="#"><span class="fa fa-facebook"></span></a>
            <a href="#"><span class="fa fa-twitter"></span></a>
            <a href="#"><span class="fa fa-google-plus"></span></a>
            <a href="#"><span class="fa fa-linkedin"></span></a>
            <a href="#"><span class="fa fa-youtube"></span></a>
          </div>
          <div class="mu-footer-copyright">
            <p>&copy; Copyright <a rel="nofollow" href="http://markups.io">markups.io</a>. All right reserved.</p>
          </div>         
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- End Footer -->
  
  <!-- jQuery library -->
  <script src="assets/js/jquery.min.js"></script>  
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="assets/js/bootstrap.js"></script>   
  <!-- Slick slider -->
  <script type="text/javascript" src="assets/js/slick.js"></script>
  <!-- Counter -->
  <script type="text/javascript" src="assets/js/simple-animated-counter.js"></script>
  <!-- Gallery Lightbox -->
  <script type="text/javascript" src="assets/js/jquery.magnific-popup.min.js"></script>
  <!-- Date Picker -->
  <script type="text/javascript" src="assets/js/bootstrap-datepicker.js"></script> 
  <!-- Ajax contact form  -->
  <script type="text/javascript" src="assets/js/app.js"></script>
 
  <!-- Custom js -->
  <script src="assets/js/custom.js"></script> 

  </body>
</html>


