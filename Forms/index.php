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
	<link href="js/datepicker/jquery-ui.css" rel="stylesheet">     

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
  <div class="user-id"><?php echo $_SESSION["id"]; ?></div>


    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Neurogear</a>		  	
		  <a id="add-car" href="#" class="btn btn-success" data-toggle="modal" data-target=".fade" role="button">Dodaj samochód</a>


<!-- modal w ktorym jest lista abonamentow dla danego auta -->	
<div class="modal lista-abonamentow">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Abonamenty</h4>
       </div>
     <div class="col-md-12">
		<div class="abonament-list"></div>
        <div>
        <button id="new-abo" class="btn btn-primary">Nowy abonament</button>		                      
        </div>
     </div>  
      <div class="modal-footer">  
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
		  
<!-- formularz dla dodania samochodu-->	
<div class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Neurogear</h4>
       </div>
     <div class="col-md-8">
          <h2>Nowy samochód</h2>
          <hr/>          
          <form id="auto-form" method="post">
            <div class="form-group">
              <label for="nr_rej">Numer rejestracyjny</label>
              <input type="text" name="nr_rej" class="form-control" id="nr_rej" placeholder="Wpisz numer rejestracyjny">
            </div>
            <div class="form-group">
              <label for="marka">Marka</label>
              <input type="text" name="marka" class="form-control" id="marka" placeholder="Wpisz markę">
            </div>
            <div class="form-group">
              <label for="model">Model</label>
              <input type="text" name="model" class="form-control" id="model" placeholder="Wpisz model">
            </div>  
			<div class="form-group">
              <input type="hidden" name="user_id" class="form-control" value="	<?php echo $_SESSION["id"] ?>">
            </div>			
			<br>
				<button type="submit" class="btn btn-primary">Dodaj</button>		
          </form>                 
     </div>  
      <div class="modal-footer">  
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
			  


			  
<!-- formularz dla dodania abonamentu-->			
<div class="modal dodaj_abonament">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
          <h4 class="modal-title">Dodaj abonament</h4>
       </div>
     <div class="col-md-8">
          <form id="payment-form" method="post">
            <div class="form-group">
              <label for="nr_rej">Ważny od</label>
              <input type="text" name="wazny_od" class="form-control datepicker" placeholder="Wpisz date rozpoczęcia abonamentu">
            </div>
			
            <div class="form-group">
              <label for="marka">Ważny do</label>
              <input type="text" name="wazny_do" class="form-control datepicker" placeholder="Wpisz date końca abonamentu">
            </div>
            
			<div class="form-group">
              <input type="hidden" name="czy_aktywny" class="form-control" value=1>
            </div>	

              <div class="form-group">
              <input type="hidden" name="auto_id" class="form-control" value=1>
            </div>				
			<br>
				<button type="submit" class="btn btn-primary">Zapisz zmiany</button>		
				<button type="submit" class="btn btn-default" data-dismiss="modal">Zamknij</button> 
          </form>                 
     </div>  
      <div class="modal-footer">  
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



</div>
		
        <div id="navbar" class="navbar-collapse collapse">
          <div class="person-info navbar-right">
				<?php echo "Witaj, " . $_SESSION["imie"] . " " . $_SESSION["nazwisko"]; ?>
                <button id="logout" type="button" class="btn btn-xs btn-default">Wyloguj</button>
          </div>
        </div><!--/.navbar-collapse -->
      </div>
	  
</nav>
    
<!-- wyswietlenie tabeli z autami-->	   
    <div id="main-content">
      <div class="row">
		 <h2>Twoje samochody</h2>
          <p>Tabela wyświetla wszystkie samochody klienta  <?php echo " " . $_SESSION["imie"] . " " . $_SESSION["nazwisko"]; ?> </p>  
        <div class="cars-list"></div>  
		
		
	
      </div>    
    </div>
    
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-3.3.4/js/bootstrap.min.js"></script>
	<script src="js/datepicker/jquery-ui.js"></script>
    <script type="text/javascript">	
	  //initialize datepicker
	  $(".datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
    </script>   
    <script src="js/app.js"></script>
  </body>
</html>