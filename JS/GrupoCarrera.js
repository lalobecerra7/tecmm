$(document).ready(function() {
 var tablaGrupoCarrera= $('#tablaGrupoCarrera').DataTable( {
        "info":     false,
     dom: 'Bfrtip',
        buttons: [
        {
            extend: 'pdfHtml5',
            className: 'btn btn-outline-primary',
            title: 'Lista de Grupo - Carrera',
            text: '<img src="../../Imagenes/pdf.png" class="botonImprimir">',
            exportOptions: {
                columns: [ 2, 3]
            }
        },
        {
                extend: 'excelHtml5',
                className: 'btn btn-outline-primary',
                 title: 'Lista de Grupo - Carrera',
                text: '<img src="../../Imagenes/excel.png" class="botonImprimir">',
                exportOptions: {
                    columns: [ 2, 3]
                }
        },
        {
                extend: 'print',
                className: 'btn btn-outline-primary',
                 title: 'Lista de Grupo - Carrera',
                text: '<img src="../../Imagenes/print.png" class="botonImprimir">',
                exportOptions: {
                    columns: [ 2, 3]
                }
        },
    ],
    "fixedHeader": true,
      "pageLength": 5,
        "ajax": "tablaGrupoCarrera.php",

                      "columns": [
                          {
                            "data": "Acciones",
                            "defaultContent": "<button class='btn btn-danger CancelarGrupoCarrera'><img src='../../Imagenes/garbage.png' style='width: 17px;'/></button> <button class='btn btn-primary' id='editarGrupoCarrera' data-toggle='modal' data-target='#ModalEditarUsuario'><img src='../../Imagenes/configurar.png' style='width: 17px;'/></button>",
                            "targets": 0
                          },
                          { "data": "ID",
                            "visible":false,
                            "searchable":true
                            },
                          { "data": "Grupo" },
                          { "data": "Carrera" }
                          ],

         "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
         "lengthChange": false,

});

buscarGrupo();
buscarCarrera();
	function buscarGrupo(){
    $.ajax({
        url:"../GrupoCarrera/funcionesGrupoCarrera.php",
        type: "POST",
        data:({
            funcion: "DataListGrupo",
        }),
    })
    .done(function(msg){
	$("#datalistGrupo").html(msg);
    })
    .fail(function(){
        alert(msg);
    });
}

    function buscarCarrera(){
    $.ajax({
        url:"../GrupoCarrera/funcionesGrupoCarrera.php",
        type: "POST",
        data:({
            funcion: "DataListCarrera",
        }),
    })
    .done(function(msg){
    $("#datalistCarrera").html(msg);
    })
    .fail(function(){
        alert(msg);
    });
}

    $(document).on("click", "#guardarGruCar",function(){
        if ($("#datalistGrupo option:selected").val()=="0") {
                 alertify.alert().setHeader('Error').set('message', 'Seleccione un Grupo').show(); 
                $("#datalistGrupo").focus();
                return false;
        }
        if ($("#datalistCarrera option:selected").val()=="0") {
                 alertify.alert().setHeader('Error').set('message', 'Seleccione una Carrera').show(); 
                $("#datalistCarrera").focus();
                return false;
        }
        $.ajax({
                type:"POST",
                url:"../GrupoCarrera/funcionesGrupoCarrera.php",
                data:({
                    funcion: "InsertarRelacion",
                    grupo : $("#datalistGrupo").val(),
                    carrera : $("#datalistCarrera").val()
                }),
                dataType : "html",
                success: function(msg){
                    var res = $.trim(msg);
                if (res == "Error al guardar") {
                alertify.error(res);
                }else{
                alertify.success(res);
                tablaGrupoCarrera.ajax.reload();
                $("#datalistGrupo").val("0");
                $("#datalistCarrera").val("0");
                }
                
            }
            }); 
    });

    $(document).on("click", ".CancelarGrupoCarrera",function(){
     var data1 = tablaGrupoCarrera.row( $(this).parents('tr') ).data()["ID"];
    var id = data1;
     alertify.confirm("La relación Grupo - Carrera será eliminada", function (e) {
            if (e) {
                    $.ajax({
                    type: "POST",
                    url: "funcionesGrupoCarrera.php",
                    data:({
                    funcion: "EliminarGrupoCarrera",
                    id: id
                    }),
                    dataType: "html",
                    success: function(msg){
                    if (msg == "Error al guardar") {
                    alertify.error(msg);
                    }else{
                    alertify.success(msg);
                    tablaGrupoCarrera.ajax.reload();
                    }
                    }
                })
            }
        }).setHeader('Eliminar Grupo - Carrera').set({labels:{ok:'Ok', cancel: 'Cancelar'}});
        });

});