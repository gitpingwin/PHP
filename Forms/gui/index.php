<?php
	session_start();
	require('php/connect.php');
	require('php/authorization/auth.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Neurogear</title>

    <!-- Bootstrap -->
    <link href="bootstrap-3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Neurogear</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <div class="person-info navbar-right">
				<?php echo "Witaj, " . $_SESSION["imie"] . " " . $_SESSION["nazwisko"]; ?>
                <button id="logout" type="button" class="btn btn-xs btn-default">Wyloguj</button>
          </div>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
    
    
    <div id="main-content">
      <div class="row">
		<?php echo "Twoje id to: " . $_SESSION["id"]; ?>
        <div class="cars-list"></div>   
      </div>    
    </div>
    
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-3.3.4/js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>