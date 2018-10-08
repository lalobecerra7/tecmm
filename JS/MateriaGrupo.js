$(document).ready(function() {

    /*::::::::::::::::::::::::::::::::::::::::::::DATATABLE DE MATERIA-GRUPO:::::::::::::::::::::::::::::::::::::::::::*/
     var tablaMateriaGrupo= $('#tablaMateriaGrupo').DataTable( {
        "ajax": {
                "url": "tablaMateriaGrupo.php",
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
            title: 'Lista de Materia - Grupo',
            text: '<img src="../../Imagenes/pdf.png" class="botonImprimir">',
            exportOptions: {
                columns: [ 2, 3, 4, 5, 6]
            }
        },
        {
                extend: 'excelHtml5',
                className: 'btn btn-outline-primary',
                 title: 'Lista de Materia - Grupo',
                text: '<img src="../../Imagenes/excel.png" class="botonImprimir">',
                exportOptions: {
                    columns: [ 2, 3, 4, 5, 6]
                }
        },
        {
                extend: 'print',
                className: 'btn btn-outline-primary',
                 title: 'Lista de Materia - Grupo',
                text: '<img src="../../Imagenes/print.png" class="botonImprimir">',
                exportOptions: {
                    columns: [ 2, 3, 4, 5, 6]
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
                          { "data": "Maestro" },
                          { "data": "Carrera" },
                          { "data": "Grupo" },
                          { "data": "Materia" },
                          { "data": "Cantidad" }
                          ],

         "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
         "lengthChange": false,

});

     /*:::::::::::::::::::::::::::::::::::::FUNCIONES DE SELECT PARA GRUPO CARRERA Y MATERIA:::::::::::::::::::::::::*/
buscarGrupoCarrera();
buscarMateria();
	function buscarGrupoCarrera(){
    $.ajax({
        url:"../MateriaGrupo/funcionesMateriaGrupo.php",
        type: "POST",
        data:({
            funcion: "DataListGrupoCarrera"
        }),
    })
    .done(function(msg){
	$("#datalistGrupoCarrera").html(msg);
    })
    .fail(function(){
        alert(msg);
    });
}

    function buscarMateria(){
    $.ajax({
        url:"../MateriaGrupo/funcionesMateriaGrupo.php",
        type: "POST",
        data:({
            funcion: "DataListMateria",
        }),
    })
    .done(function(msg){
    $("#datalistMateria").html(msg);
    })
    .fail(function(){
        alert(msg);
    });
}

    $(document).on("click", "#GuardarMatGrupo",function(){
        if ($("#datalistGrupoCarrera option:selected").val()=="0") {
                 alertify.alert().setHeader('Error').set('message', 'Seleccione un Grupo y Carrera').show(); 
                $("#datalistGrupoCarrera").focus();
                return false;
        }
        if ($("#datalistMateria option:selected").val()=="0") {
                 alertify.alert().setHeader('Error').set('message', 'Seleccione una Materia').show(); 
                $("#datalistMateria").focus();
                return false;
        }
        $.ajax({
                type:"POST",
                url:"../MateriaGrupo/funcionesMateriaGrupo.php",
                data:({
                    funcion: "InsertarRelacion",
                    IDGruCarr : $("#datalistGrupoCarrera").val(),
                    IDMate : $("#datalistMateria").val(),
                    IDMaestro : $("#IDMaestro").val(),
                    Cantidad: $("#CantidadMatGrupo").val()
                }),
                dataType : "html",
                success: function(msg){
                    var res = $.trim(msg);
                if (res == "Error al guardar") {
                alertify.error(res);
                }else{
                alertify.success(res);
                tablaMateriaGrupo.ajax.reload();
                $("#datalistGrupoCarrera").val("0");
                $("#datalistMateria").val("0");
                $("#CantidadMatGrupo").val("0");
                }
                
            }
            }); 
    });

    $(document).on("click", ".CancelarMateriaGrupo",function(){
        var data1 = tablaMateriaGrupo.row( $(this).parents('tr') ).data()["ID"];
        var id = data1;
        alertify.confirm("La relación Materia - Grupo será eliminada <b style ='color:red'>NO SE PODRÁ RECUPERAR<b>", function (e) {
        if (e) {
                $.ajax({
                type: "POST",
                url: "../MateriaGrupo/funcionesMateriaGrupo.php",
                data:({
                funcion: "EliminarMatGrupo",
                id: id
                }),
                dataType: "html",
                success: function(msg){
                if (msg == "Error al eliminar") {
                alertify.error(msg);
                }else{
                alertify.success(msg);
                tablaMateriaGrupo.ajax.reload();
                }
                }
            })
        }
        }).setHeader('Eliminar Materia - Grupo').set({labels:{ok:'Ok', cancel: 'Cancelar'}});
        });

});