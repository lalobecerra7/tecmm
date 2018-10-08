$(document).ready(function(){
	 var tablaUsuarios= $('#tablaUsuarios').DataTable( {
	 	"info":     false,
 	 dom: 'Bfrtip',
        buttons: [
        {
            extend: 'pdfHtml5',
            className: 'btn btn-outline-primary',
            title: 'Lista de Usuarios',
            text: '<img src="../../Imagenes/pdf.png" class="botonImprimir">',
            exportOptions: {
                columns: [ 2, 3, 4, 5]
            }
        },
        {
                extend: 'excelHtml5',
                className: 'btn btn-outline-primary',
	             title: 'Lista de Usuarios',
	            text: '<img src="../../Imagenes/excel.png" class="botonImprimir">',
	            exportOptions: {
	                columns: [ 2, 3, 4, 5]
	            }
        },
        {
                extend: 'print',
                className: 'btn btn-outline-primary',
	             title: 'Lista de Usuarios',
	            text: '<img src="../../Imagenes/print.png" class="botonImprimir">',
	            exportOptions: {
	                columns: [ 2, 3, 4, 5]
	            }
        },
    ],
    "fixedHeader": true,
      "pageLength": 5,
        "ajax": "tablaUsuarios.php",

					  "columns": [
					      {
					        "data": "Acciones",
					        "defaultContent": "<button class='btn btn-danger CancelarUsuario'><img src='../../Imagenes/garbage.png' style='width: 17px;'/></button> <button class='btn btn-primary' id='editarUsuario' data-toggle='modal' data-target='#ModalEditarUsuario'><img src='../../Imagenes/configurar.png' style='width: 17px;'/></button>",
					        "targets": 0
					      },
					      { "data": "ID",
					      	"visible":false,
					      	"searchable":true
					  		},
					      { "data": "Nombre completo" },
						  { "data": "Nombre" },
						  { "data": "Contraseña" },
						  { "data": "Tipo" }
					      ],

         "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
         "lengthChange": false,

});
	$("#FormUsuario").submit(function(e) {
		if ($("#tipoUsuario option:selected").val()=="0") {
			 alertify.alert().setHeader('Error').set('message', 'Seleccione un tipo de usuario').show(); 
			$("#tipoUsuario").focus();
			return false;
		}
		e.preventDefault();	
		$.ajax({
			type:"POST",
			url:"funcionesUsuarios.php",
			data:({
				funcion: "InsertarUsuario",
				Nombre : $("#NombreCompletoUsuario").val(),
				Usuario : $("#NombreUsuario").val(),
				Contra : $("#ContraUsuario").val(),
				Tipo : $("#tipoUsuario option:selected").val()
			}),
			dataType : "html",
			success: function(msg){
				if (msg == "Error al guardar") {
				alertify.error(msg);
				}else{
				alertify.success(msg);
				tablaUsuarios.ajax.reload();
				$("#NombreCompletoUsuario").val("");
				$("#NombreUsuario").val("");
				$("#ContraUsuario").val("");
				$("#tipoUsuario").val("0");
				}
				
			}
		});		
	});

$(document).on("click", ".CancelarUsuario",function(){
	 var data1 = tablaUsuarios.row( $(this).parents('tr') ).data()["ID"];
	var id = data1;
 alertify.confirm("El Usuario será eliminado", function (e) {
        if (e) {
		    	$.ajax({
				type: "POST",
				url: "funcionesUsuarios.php",
				data:({
				funcion: "EliminarUsuario",
				id: id
				}),
				dataType: "html",
				success: function(msg){
				if (msg == "Error al guardar") {
				alertify.error(msg);
				}else{
				alertify.success(msg);
				tablaUsuarios.ajax.reload();
				}
				}
			})
        }
    }).setHeader('Eliminar Usuario').set({labels:{ok:'Ok', cancel: 'Cancelar'}});
	});

$(document).on('click', '#editarUsuario', function() {
	 var data1 = tablaUsuarios.row( $(this).parents('tr') ).data()["ID"];
		var id = data1;
	$.ajax({
		url: 'funcionesUsuarios.php',
		type: 'POST',
		data: {
			ID: id, 
			funcion: "MostrarUsuario"
		}
	})
	.done(function(res) {
		$("#datosUsuario").html(res);
	})
	.fail(function() {
		console.log("error");
	});
});

$("#FormUsuarioEditar").submit(function(e) {
		if ($("#tipoUsuarioE option:selected").val()=="0") {
			 alertify.alert().setHeader('Error').set('message', 'Seleccione un tipo de usuario').show(); 
			$("#tipoUsuarioE").focus();
			return false;
		}
		e.preventDefault();	
		$.ajax({
			type:"POST",
			url:"funcionesUsuarios.php",
			data:({
				funcion: "ModificarUsuario",
				Nombre : $("#NombreCompletoUsuarioE").val(),
				Usuario : $("#NombreUsuarioE").val(),
				Contra : $("#ContraUsuarioE").val(),
				Tipo : $("#tipoUsuarioE option:selected").val(),
				ID: $("#IDUsu").val()
			}),
			dataType : "html",
			success: function(msg){
				if (msg == "Error al guardar") {
				alertify.error(msg);
				}else{
				alertify.success(msg);
				tablaUsuarios.ajax.reload();
				$("#ModalEditarUsuario").modal('toggle');
				$("#NombreCompletoUsuario").val("");
				$("#NombreUsuario").val("");
				$("#ContraUsuario").val("");
				$("#tipoUsuario").val("0");
				}
				
			}
		});		
	});


});