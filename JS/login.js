$(document).ready(function() {
	$("#login").submit(function(e){
		e.preventDefault();
		$.ajax({
			type:"POST",
			url:"login.php",
			data:({
				usuario : $.trim($("#usuario").val()),
				contrasena : $("#contrasena").val()
			}),
			dataType: "html",
			beforeSend: function(){
				$("#ingresar").html("Iniciando...");
			},
			success: function(msg){
				if(msg == "Error"){
					$("#ingresar").html("Ingresar");
					$("#incorrecto").slideDown("slow");
					setTimeout(function(){	
						$("#incorrecto").slideUp("slow");					
					},3000);
				}else{
					window.location.href = "Aplicacion/";
				}
			}
		});		
	});
});