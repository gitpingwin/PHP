$(function() {
  $("#register-form").submit(function(e){	
	$.post('../php/register.php',$("#register-form").serialize(), function(data) {
	  if(data == 1) {
		  alert("Podziekowanie.")
	  }
	  if(data == 0) {
		  alert("Znaleziono taki sam login");
	  }
	}); 
  	e.preventDefault();
  })
  
   $("#auto-form").submit(function(e){	
	$.post('php/auto.php',$("#auto-form").serialize(), function(data) {
	  if(data == 1) {
		  alert("Pomyślnie dodano.")
		}
	   if(data == 0) {
		  alert("Taki numer rejestracyjny klient już posiada");
		}
	}); 
  	e.preventDefault();
  })
  
  $("#login-form").submit(function(e){	
	$.post('../php/authorization/sing_up.php',$("#login-form").serialize(), function(data) {
	  if(data == 0) {
		  alert("Błędny login lub hasło")
	  }
	  if(data == 1) {
		  window.location.href="../";
	  }
	}); 
  	e.preventDefault();
  })
  
  $("#auto_tab").load(function() {
   $.post('php/auto_tab.php', function() {
		  location.reload();
	  }) 
});
  
  $("#logout").bind("click", function() {
	  $.post('php/authorization/logout.php', function() {
		  location.reload();
	  }); 
  });
     
});