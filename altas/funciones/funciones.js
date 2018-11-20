function valHoraMateria1(numero){
  if (!/^([0-9])*$/.test(numero))
    alert("El valor " + numero + " no es un número");
     $('#Horas').val('');
}
function validaN(){
  if($("#Horas").val()<1){
    $("#Horas").val(1);

  }else if($("#Horas").val()>8){
    $("#Horas").val(8);
  }
    tecla = (document.all) ? e.keyCode : e.which;
    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
		function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8, 37, 39, 46];

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}



				function autocomplete(inp, arr) {
				  /*the autocomplete function takes two arguments,
				  the text field element and an array of possible autocompleted values:*/
				  var currentFocus;
				  /*execute a function when someone writes in the text field:*/
				  inp.addEventListener("input", function(e) {
				      var a, b, i, val = this.value;
				      /*close any already open lists of autocompleted values*/
				      closeAllLists();
				      if (!val) { return false;}
				      currentFocus = -1;
				      /*create a DIV element that will contain the items (values):*/
				      a = document.createElement("DIV");
				      a.setAttribute("id", this.id + "autocomplete-list");
				      a.setAttribute("class", "autocomplete-items");
				      /*append the DIV element as a child of the autocomplete container:*/
				      this.parentNode.appendChild(a);
				      /*for each item in the array...*/
				      for (i = 0; i < arr.length; i++) {
				        /*check if the item starts with the same letters as the text field value:*/
				        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
				          /*create a DIV element for each matching element:*/
				          b = document.createElement("DIV");
				          /*make the matching letters bold:*/
				          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
				          b.innerHTML += arr[i].substr(val.length);
				          /*insert a input field that will hold the current array item's value:*/
				          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
				          /*execute a function when someone clicks on the item value (DIV element):*/
				          b.addEventListener("click", function(e) {
				              /*insert the value for the autocomplete text field:*/
				              inp.value = this.getElementsByTagName("input")[0].value;
				              /*close the list of autocompleted values,
				              (or any other open lists of autocompleted values:*/
				              closeAllLists();
				          });
				          a.appendChild(b);
				        }
				      }
				  });
				  /*execute a function presses a key on the keyboard:*/
				  inp.addEventListener("keydown", function(e) {
				      var x = document.getElementById(this.id + "autocomplete-list");
				      if (x) x = x.getElementsByTagName("div");
				      if (e.keyCode == 40) {
				        /*If the arrow DOWN key is pressed,
				        increase the currentFocus variable:*/
				        currentFocus++;
				        /*and and make the current item more visible:*/
				        addActive(x);
				      } else if (e.keyCode == 38) { //up
				        /*If the arrow UP key is pressed,
				        decrease the currentFocus variable:*/
				        currentFocus--;
				        /*and and make the current item more visible:*/
				        addActive(x);
				      } else if (e.keyCode == 13) {
				        /*If the ENTER key is pressed, prevent the form from being submitted,*/
				        e.preventDefault();
				        if (currentFocus > -1) {
				          /*and simulate a click on the "active" item:*/
				          if (x) x[currentFocus].click();
				        }
				      }
				  });
				  function addActive(x) {
				    /*a function to classify an item as "active":*/
				    if (!x) return false;
				    /*start by removing the "active" class on all items:*/
				    removeActive(x);
				    if (currentFocus >= x.length) currentFocus = 0;
				    if (currentFocus < 0) currentFocus = (x.length - 1);
				    /*add class "autocomplete-active":*/
				    x[currentFocus].classList.add("autocomplete-active");
				  }
				  function removeActive(x) {
				    /*a function to remove the "active" class from all autocomplete items:*/
				    for (var i = 0; i < x.length; i++) {
				      x[i].classList.remove("autocomplete-active");
				    }
				  }
				  function closeAllLists(elmnt) {
				    /*close all autocomplete lists in the document,
				    except the one passed as an argument:*/
				    var x = document.getElementsByClassName("autocomplete-items");
				    for (var i = 0; i < x.length; i++) {
				      if (elmnt != x[i] && elmnt != inp) {
				        x[i].parentNode.removeChild(x[i]);
				      }
				    }
				  }
				  /*execute a function when someone clicks in the document:*/
				  document.addEventListener("click", function (e) {
				      closeAllLists(e.target);
				  });
				}

				/*An array containing all the country names in the world:*/
				var countries = [
					"Giovana Berenice Torres Huerta",
					"Luis Francisco Garcia Lopez",
					"Arturo X. Ibarra Castillon",
					"Javier Isaac Contreras Ochoa",
					"Abraham Hernandez Cobarrubias",
					"Adrian Salvador Garcia",
					"Agustin Jaime Delgadillo Mercado",
					"Araceli Ortiz Godinez",
					"Carlos Omar Garcia Esparza",
					"Cruz Rodolfo Mulgado Campos",
					"Denicia Guadalupe Orozco Valadez",
					"Eduardo Augusto Aleman Hernandez",
					"Eduardo Couder Pimentel",
					"Erick Ibarra Gomez",
					"Francisco Miguel Gonzalez Jimenez",
					"Guillermo Rodriguez Nuñez",
					"Jose Guadalupe Lopez Jauregui",
					"Jose Salvador Barragan Hernandez",
					"Luis Alonso Aguayo Vazquez ",
					"Luis Ernesto Lopez Gonzalez",
					"Mayra Lopez Garcia",
					"Misael Adrian Arias Andrade",
					"Norberto Santiago Olivares",
					"Rocio Ramirez Navarro",
					"Rosendo Velazquez Ortiz",
					"Saul Garcia Jimenez",
					"Sergio Hugo Cruz Sanchez",
					"Dalia Yahaira Oropeza Dominguez",
					"Andres Salomon Enriquez Ochoa",
					"Antonio Daniel Garcia Gutierrez",
					"Enrique Esqueda Perez",
					"Georgina Anguiano Hernandez",
					"Gerardo Abel agurre Espinoza",
					"Hugo Filiberto Sotelo Marquez",
					"Jose Luis Gonzalez Martinez",
					"Jose Trinidad Navarro Coronado",
					"Juan Alberto Lopez Hernandez",
					"Maria Oliva Perez Cervantes",
					"Maritza Macias Cordero",
					"Noemi Alejandra Garcia Gamiño",
					"Ruben Padilla Arriaga",
					"Sandra Brambila Ramirez",
					"Sergio Escobedo Reyes",
					"Victor Alonso Quiroz Rivas",
					"Celina Beltran Hernandez",
					"Fabiola Guadalupe Arriaga Lopez",
					"Isela Sanchez Ramirez",
					"Maira Bibiana Plascencia Garcia",
					"Maria del Pilar Camacho Vazquez del Mercado",
					"Rocio del Carmen Parra Torres",
					"Rosa Maria Chavez Camarena",
					"Edgardo Martinez Orozco",
					"Gustavo Rene Arias Partida",
					"Jose Miguel Vazquez",
					"Julian Gonzalez Gonzalez",
					"Lorenzo Zamorano Olvera",
					"Luis Alberto Gonzalez Vivanco",
					"Rafael Morales Morales",
					"Ricardo Padilla Rolon",
					"Roberto Jose Velasco Monroy",
					"Victor Hugo Hernandez Vargas",
					"Ramiro Morales Galindo",
					"Paola Jea"
				];

				/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
				autocomplete(document.getElementById("Maestros"), countries);



        $(document).ready(function() {
          $('#limpiarCarrera').click(function() {
          $('#Carrera').val('');
          });
          $('#LimMaestro1').click(function() {
          $('.LimMaestro1').val('');
          });
          $('#LimMaestro2').click(function() {
            $('.LimMaestro2').val('');
          });

        });
