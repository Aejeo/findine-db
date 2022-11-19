<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>List of Restaurant</title>

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
          margin-top: 25.5%;
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
    <!-- Start slider  -->
  <section id="mu-slider">
    <div class="mu-slider-area"> 

      <!-- Top slider -->
      <div class="mu-top-slider">

        <!-- Top slider single slide -->
        <div class="mu-top-slider-single">
          <img src="assets/img/slider/food.jpg" alt="img">
          <!-- Top slider content -->
          <div class="mu-top-slider-content">
            <span class="mu-slider-small-title">Discover</span>
            <h2 class="mu-slider-title">your <span style="color: #FFA500">DINE</span></h2>
            <p>Find the best restaurant, cafe, and shop to fill your satisfaction</p>           
          </div>
          <!-- / Top slider content -->
         </div>

      </div>
    </div>
  </section>
  <!-- End slider  -->
  </br></br></br></br></br>
    <h3>List of Restaurants</h3>
    <form method="post">
        <b>Search Keyword:</b> <input type="text" name="keyword" placeholder="Enter a Keyword"></input> 
        <input type="submit" class="btn btn-primary" name="name" value="Name"></input>
        <input type="submit" class="btn btn-primary" name="cuisine" value="Cuisine"></input><br/></br>
        <input type="submit" class="btn btn-info" name="brooklyn" value="Brooklyn"></input>
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
                <th scope="col">Address</th>
                <th scope="col">Grades</th>
            </tr>
        </th>
        <?php
        foreach ($cursor as $document) { 
            $grades = count($document['grades']); 
            for ($ctr = 0; $ctr < $grades ; $ctr++) {                
            ?>
             <tr>
                <td scope="row"><?php echo $document['name']; ?> </td>
                 <td><?php echo $document['borough']; ?> </td>
                 <td><?php echo $document['cuisine']; ?> </td>
                 <td><?php echo $document['address']['building'], '<br>', $document['address']['street'], '<br>', $document['address']['zipcode'], '<br>'?> </td>
                 <td><?php echo $document['grades'][$ctr]['date'], "<br>", $document['grades'][$ctr]['grade'], "<br>", $document['grades'][$ctr]['score']; ?> </td>
            </tr>
        <?php
            }
        };
        ?>
    </table>
    </div>
</body>
</html>