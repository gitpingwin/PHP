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
  
  $("#logout").bind("click", function() {
	  $.post('php/authorization/logout.php', function() {
		  location.reload();
	  }); 
  });
     
});