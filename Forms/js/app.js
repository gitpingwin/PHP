$(function() {
	
   //funkcje uruchamiane po wczytaniu strony
   list_cars();
   
	//dodanie nowego klienta
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
  //dodanie nowego auta
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
  
  //wyswietlenie listy abonamentow dla danego auta
  $('body').on('click', 'a#list-ab', function() {
	var id = $(this).data("autoid");
	//ustawiam id auta w formularzu dodawania nowego abonamentu
	$('#payment-form input[name="auto_id"]').val(id);
	
	$(".abonament-list").load("php/list_abonamenty.php",{"id":	id});
  });
  
  //nowy abonament
  $("#new-abo").bind("click", function() {
	//zamknij aktualny modal
	$('.lista-abonamentow').modal('hide');
	//otworz modal dodawania nowego abonamentu
	$('.dodaj_abonament').modal('show');
  });  
  
    //dodanie nowego abonamentu
   $("#payment-form").submit(function(e){	
	$.post('php/payment.php',$("#payment-form").serialize(), function(data) {
		
	  //zamknij aktualny modal
	  $('.dodaj_abonament').modal('hide');
	  
	  //otworz modal z lista abonamentow dla danego auta
	  //najpierw odswiez dane
	  var auto_id = $('#payment-form input[name="auto_id"]').val();
	  $(".abonament-list").load("php/list_abonamenty.php",{"id":	auto_id});
	  
	  $('.lista-abonamentow').modal('show');		
		
	}); 
  	e.preventDefault();
  })
  
  
  
  //logowanie
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
  //wylogowanie
  $("#logout").bind("click", function() {
	  $.post('php/authorization/logout.php', function() {
		  location.reload();
	  }); 
  });
  
  //lista aut
  function list_cars() {
	var id = $(".user-id").text();	
	$(".cars-list").load("php/list_cars.php",{"id":	id});
  } 
     
});