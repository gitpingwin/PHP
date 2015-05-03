<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Logowanie</title>

    <!-- Bootstrap -->
    <link href="../bootstrap-3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

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
      </div>
    </nav>
    
    
    <div id="main-content">
      <div class="row">
        <div class="col-md-6">
          <h1>Logowanie</h1>
          <form id="login-form" method="post">
            <div class="form-group">
              <label for="login">Login</label>
              <input type="text" name="login" class="form-control" id="login" placeholder="Wpisz login">
            </div>
            <div class="form-group">
              <label for="password">Hasło</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Wpisz hasło">
            </div>
            <button type="submit" class="btn btn-primary">Zaloguj</button>
          </form>          
        </div>
        <div class="col-md-6">
          <h1>Rejestracja</h1>
          <h4>Dane użytkownika</h4>
          <hr/>          
          <form id="register-form" method="post">
            <div class="form-group">
              <label for="imie">Imię</label>
              <input type="text" name="imie" class="form-control" id="imie" placeholder="Wpisz imię">
            </div>
            <div class="form-group">
              <label for="nazwisko">Nazwisko</label>
              <input type="text" name="nazwisko" class="form-control" id="nazwisko" placeholder="Wpisz nazwisko">
            </div>
            <div class="form-group">
              <label for="ulica">Ulica</label>
              <input type="text" name="ulica" class="form-control" id="ulica" placeholder="Wpisz ulice">
            </div>    
            <div class="form-group">
              <label for="nr-domu">Numer domu</label>
              <input type="text" name="nr-domu" class="form-control" id="nr-domu" placeholder="Wpisz numer domu">
            </div>
            <div class="form-group">
              <label for="miasto">Miasto</label>
              <input type="text" name="miasto" class="form-control" id="miasto" placeholder="Wpisz miasto">
            </div>            
            <h4>Dane do logowania</h4>
            <hr/>
            <div class="form-group">
              <label for="login-reg">Login</label>
              <input type="text" name="login-reg" class="form-control" id="login-reg" placeholder="Wpisz login">
            </div> 
            <div class="form-group">
              <label for="haslo-reg">Haslo</label>
              <input type="password" name="haslo-reg" class="form-control" id="haslo-reg" placeholder="Wpisz hasło">
            </div>                                                                   
            <button type="submit" class="btn btn-primary">Zarejestruj</button>
          </form>          
        </div>      
      </div>    
    </div>
    
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap-3.3.4/js/bootstrap.min.js"></script>
    <script src="../js/app.js"></script>
  </body>
</html>