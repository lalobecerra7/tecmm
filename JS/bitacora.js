$(document).ready(function() {
 /*::::::::::::::::::::::::::::::::::::::::::::DATATABLE DE MATERIA-GRUPO:::::::::::::::::::::::::::::::::::::::::::*/
     var tablaBitacoras= $('#tablaBitacora').DataTable( {
        "ajax": {
                "url": "tablaBitacoras.php",
                "type": "GET",
            "data": function ( d ) {
              return $.extend( {}, d, {
                IDMA: $('#IDMaestro').val()
              } );
            },
        },
        "info":     false,
     dom: 'Bfrtip',
        buttons: [
        {
            extend: 'pdfHtml5',
            className: 'btn btn-outline-primary',
            title: 'Lista de Bitacoras',
            text: '<img src="../../Imagenes/pdf.png" class="botonImprimir">',
            exportOptions: {
                columns: [ 2, 3, 4, 5, 6, 7, 8, 9, 10]
            }
        },
        {
                extend: 'excelHtml5',
                className: 'btn btn-outline-primary',
                 title: 'Lista de Bitacoras',
                text: '<img src="../../Imagenes/excel.png" class="botonImprimir">',
                exportOptions: {
                    columns: [ 2, 3, 4, 5, 6, 7, 8, 9, 10]
                }
        },
        {
                extend: 'print',
                className: 'btn btn-outline-primary',
                 title: 'Lista de Bitacoras',
                text: '<img src="../../Imagenes/print.png" class="botonImprimir">',
                exportOptions: {
                    columns: [ 2, 3, 4, 5, 6, 7, 8, 9, 10]
                }
        },
    ],
    "fixedHeader": true,
      "pageLength": 5,
                      "columns": [
                          {
                            "data": "Acciones",
                            "defaultContent": "<button class='btn btn-danger CancelarMateriaGrupo'><img src='../../Imagenes/garbage.png' style='width: 17px;'/></button> <button class='btn btn-primary' id='EditarMateriaGrupo' data-toggle='modal' data-target='#ModalEditarMatGrupo'><img src='../../Imagenes/configurar.png' style='width: 17px;'/></button>",
                            "targets": 0
                          },
                          { "data": "ID",
                            "visible":false,
                            "searchable":true
                            },
                          { "data": "Grupo" },
                          { "data": "Carrera" },
                          { "data": "Materia" },
                          { "data": "Alumnos" },
                          { "data": "Programa utilizado" },
                          { "data": "Hora de entrada" },
                          { "data": "Hora de salida" },
                          { "data": "Fecha" },
                          { "data": "Observaciones" }
                          ],

         "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
         "lengthChange": false,

});

buscarMatGrupo();
	function buscarMatGrupo(){
    $.ajax({
        url:"../Bitacora/funcionesBitacora.php",
        type: "POST",
        data:({
            funcion: "DataListGrupoCarrera",
            IDMaestro: $("#IDMaestro").val()
        }),
    })
    .done(function(msg){
	$("#datalistGrupoCarreraB").html(msg);
    })
    .fail(function(){
        alert(msg);
    });
}
$(document).on("change", "#datalistGrupoCarreraB",function(){
		var IDGrupoCarrera = $(this).val();
		$.ajax({
        url:"../Bitacora/funcionesBitacora.php",
        type: "POST",
        data:({
            funcion: "DataListMateria",
            IDGrupoCarrera: IDGrupoCarrera,
            IDMaestro: $("#IDMaestro").val()
        }),
	    })
	    .done(function(msg){
		$("#datalistMateriaB").html(msg);
	    })
	    .fail(function(){
	        alert(msg);
	    });
});

$("#FormBitacora").submit(function(e) {
		if ($("#datalistGrupoCarreraB option:selected").val()=="0") {
			 alertify.alert().setHeader('Error').set('message', 'Seleccione un Grupo y Carrera').show(); 
			$("#datalistGrupoCarreraB").focus();
			return false;
		}
		if ($("#datalistMateriaB option:selected").val()=="0") {
			 alertify.alert().setHeader('Error').set('message', 'Seleccione una Materia').show(); 
			$("#datalistMateriaB").focus();
			return false;
		}
		e.preventDefault();	
		$.ajax({
			type:"POST",
			url:"funcionesBitacora.php",
			data:({
				funcion: "InsertarBitacora",
				IDMaestro: $("#IDMaestro").val(),
				IDGruCarr: $("#datalistGrupoCarreraB option:selected").val(),
				IDMateria: $("#datalistMateriaB option:selected").val(),
				NumAlumno: $("#numeroAlumnos").val(),
				ProgUtili: $("#ProgramaUtilizar").val(),
				FechaBitacora: $("#FechaBitacora").val(),
				EntradaBitacora: $("#EntradaBitacora").val(),
				SalidaBitacora: $("#SalidaBitacora").val(),
				ObservacionesBita:  $("#ObservacionesBita").val()
			}),
			dataType : "html",
			success: function(msg){
				if (msg == "Error al guardar") {
				alertify.error(msg);
				}else{
				alertify.success(msg);
				//tablaUsuarios.ajax.reload();
				$("#datalistGrupoCarreraB").val("0");
				$("#datalistMateriaB").val("0");
				$("#numeroAlumnos").val("");
				$("#ProgramaUtilizar").val("");
				$("#FechaBitacora").val("");
				$("#EntradaBitacora").val("");
				 $("#SalidaBitacora").val("");
				$("#ObservacionesBita").val("");
				}
				
			}
		});		
	});

});