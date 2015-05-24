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
		  alert("Pomyślnie dodano.");
		  $('.dodaj-samochod').modal('hide');
		  list_cars();
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
  
    //przedluzenie abonamentu
  $('body').on('click', 'a.przedluz', function() {
	//zamknij aktualny modal
	$('.lista-abonamentow').modal('hide');
	
	var abo_id = $(this).data("aboid");
	$('#abo-renew-form input[name="abonament_id"]').val(abo_id);
	//otworz modal dodawania nowego abonamentu
	$('.przedluz-abonament').modal('show');
  });  
  
    //przedluzenie waznosci abonamentu
   $("#abo-renew-form").submit(function(e){	
	$.post('php/abo_renew.php',$("#abo-renew-form").serialize(), function(data) {
		//zamknij aktualny modal
		$('.przedloz-abonament').modal('hide')
	}); 
  	e.preventDefault();
  })  
  
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