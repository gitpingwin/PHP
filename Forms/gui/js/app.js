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
});