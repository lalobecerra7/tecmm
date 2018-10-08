$(document).ready(function() {
buscarMatGrupo();
buscarLaboratorio();
function buscarMatGrupo(){
    $.ajax({
        url:"../Practicas/funcionesPracticas.php",
        type: "POST",
        data:({
            funcion: "DataListGrupoCarrera",
            IDMaestro: $("#IDMaestro").val()
        }),
    })
    .done(function(msg){
	$("#datalistGrupoCarreraP").html(msg);
    })
    .fail(function(){
        alert(msg);
    });
}

function buscarLaboratorio(){
    $.ajax({
        url:"../Practicas/funcionesPracticas.php",
        type: "POST",
        data:({
            funcion: "datalistLaboratorio"
        }),
    })
    .done(function(msg){
	$("#datalistLaboratorio").html(msg);
    })
    .fail(function(){
        alert(msg);
    });
}
$(document).on("change", "#datalistGrupoCarreraP",function(){
		var IDGrupoCarrera = $(this).val();
		$.ajax({
        url:"../Practicas/funcionesPracticas.php",
        type: "POST",
        data:({
            funcion: "DataListMateria",
            IDGrupoCarrera: IDGrupoCarrera,
            IDMaestro: $("#IDMaestro").val()
        }),
	    })
	    .done(function(msg){
		$("#datalistMateriaP").html(msg);
	    })
	    .fail(function(){
	        alert(msg);
	    });
});
});