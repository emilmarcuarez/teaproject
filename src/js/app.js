document.addEventListener('DOMContentLoaded', function() {

    // eventListeners();
    // darkMode();
    limitarCaracteres();
	limitarCaracteres2();
	limitarCaracteres3();
	crearGaleria();
	// ocultar();
	let btnExito=document.querySelectorAll('.alerta');
	
	btnExito.forEach(exito => {
			setTimeout(function(){
			exito.style.display = "none";
			console.log('1');
		},5000);
	  });
});
// function darkMode() {

//     const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

//     // console.log(prefiereDarkMode.matches);

//     if(prefiereDarkMode.matches) {
//         document.body.classList.add('dark-mode');
//     } else {
//         document.body.classList.remove('dark-mode');
//     }

//     prefiereDarkMode.addEventListener('change', function() {
//         if(prefiereDarkMode.matches) {
//             document.body.classList.add('dark-mode');
//         } else {
//             document.body.classList.remove('dark-mode');
//         }
//     });

//     const botonDarkMode = document.querySelector('.dark-mode-boton');
//     botonDarkMode.addEventListener('click', function() {
//         document.body.classList.toggle('dark-mode');
//     });
// }

// // menu de hamburguesas

// function eventListeners() {
//     const mobileMenu = document.querySelector('.mobile-menu');

//     mobileMenu.addEventListener('click', navegacionResponsive);
// }


// function navegacionResponsive() {
//     const navegacion = document.querySelector('.navegacion');

//     navegacion.classList.toggle('mostrar')
// }
function limitarCaracteres() {
    var parrafos = document.querySelectorAll(".descripcion");
  
    parrafos.forEach(parrafo => {
      var texto = parrafo.innerHTML;
      var limite = 150; // Define el número máximo de caracteres que deseas mostrar
  
      if (texto.length > limite) {
        // En el caso específico de la función slice(0, limite), el valor 0 indica que se desea comenzar desde el primer carácter de la cadena original. El parámetro limite representa el índice final, es decir, el carácter justo antes del cual deseas cortar la cadena.
        var nuevoTexto = texto.slice(0, limite) + "...";
        parrafo.innerHTML = nuevoTexto;
      }
    });
  }
function limitarCaracteres2() {
    var parrafos = document.querySelectorAll(".descripcion2");
  
    parrafos.forEach(parrafo => {
      var texto = parrafo.innerHTML;
      var limite = 50; // Define el número máximo de caracteres que deseas mostrar
  
      if (texto.length > limite) {
        // En el caso específico de la función slice(0, limite), el valor 0 indica que se desea comenzar desde el primer carácter de la cadena original. El parámetro limite representa el índice final, es decir, el carácter justo antes del cual deseas cortar la cadena.
        var nuevoTexto = texto.slice(0, limite) + "...";
        parrafo.innerHTML = nuevoTexto;
      }
    });
  }
function limitarCaracteres3() {
    var parrafos = document.querySelectorAll(".descripcion3");
  
    parrafos.forEach(parrafo => {
      var texto = parrafo.innerHTML;
      var limite = 24; // Define el número máximo de caracteres que deseas mostrar
  
      if (texto.length > limite) {
        // En el caso específico de la función slice(0, limite), el valor 0 indica que se desea comenzar desde el primer carácter de la cadena original. El parámetro limite representa el índice final, es decir, el carácter justo antes del cual deseas cortar la cadena.
        var nuevoTexto = texto.slice(0, limite) + "...";
        parrafo.innerHTML = nuevoTexto;
      }
    });
  }

  function crearGaleria(){
    const galeria=document.querySelector(".galeria-autos");
    for(let i=20; i<=28; i++){
        const imagen=document.createElement("picture");
        imagen.innerHTML=`
        
         <img src="build/img/${i}.png" alt="imagen galeria">
        `;
        imagen.onclick=function(){
            mostrarImagen(i);
        }
        galeria.appendChild(imagen);
    }
}
// Mostrar las imagenes
function mostrarImagen(id){
    const imagen=document.createElement('picture');
    imagen.innerHTML=`
  
    <img width="500" height="500" src="build/img/${id}.png" alt="imagen galeria">
    `;
    // Crear el overlay con la imagen
     const overlay=document.createElement('DIV');
     overlay.appendChild(imagen);
     overlay.classList.add('overlay');
     overlay.onclick=function(){
        const body=document.querySelector('body');
        body.classList.remove('fijar-body');
        overlay.remove();
     }

    //  CREAMOS EL DIV DE FLEXBOX
    const prueba2=document.createElement('DIV');

    //  BOTON DEL LADO izquierdo
        if(id !== 20){
            const izquierdo=document.createElement('P');
            izquierdo.textContent='<';

            izquierdo.classList.add('btn-lado');
            izquierdo.onclick=function(){
                const body=document.querySelector('body');
                body.classList.remove('fijar-body');
                overlay.remove();
                mostrarImagen(id-1);
            }
            prueba2.appendChild(izquierdo);
        }
    
    //  boton para cerrar el modal
    const cerrarModal=document.createElement('P');
    prueba2.classList.add('prueba2');
    cerrarModal.textContent='X';
    cerrarModal.classList.add('btn-cerrar');
    cerrarModal.onclick=function(){
       const body=document.querySelector('body');
       body.appendChild(overlay);
       body.classList.add('fijar-body');
    }
    prueba2.appendChild(cerrarModal);

      //  BOTON DEL LADO derecho
    if(id !== 28){
        const derecho=document.createElement('P');
        derecho.textContent='>';

        derecho.classList.add('btn-lado');
        derecho.onclick=function(){
            const body=document.querySelector('body');
            body.classList.remove('fijar-body');
            overlay.remove();
            mostrarImagen(id+1);
        }
        prueba2.appendChild(derecho);
    }
    
    //  AGREGAMOS LOS BOTONES AL OVERLAY
     overlay.appendChild(prueba2);

     
// añadirlo al html
    const body=document.querySelector('body');
    body.appendChild(overlay);
    // para no darle scroll
    body.classList.add('fijar-body');
}

// slider
$(document).ready(function(){
	var imgItems = $('.slider li').length; // Numero de Slides
	var imgPos = 1;

	// Agregando paginacion --
	for(i = 1; i <= imgItems; i++){
		$('.pagination').append('<li><span class="fa fa-circle"></span></li>');
	} 
	//------------------------

	$('.slider li').hide(); // Ocultanos todos los slides
	$('.slider li:first').show(); // Mostramos el primer slide
	$('.pagination li:first').css({'color': '#24989c'}); // Damos estilos al primer item de la paginacion

	// Ejecutamos todas las funciones
	$('.pagination li').click(pagination);
	$('.right span').click(nextSlider);
	$('.left span').click(prevSlider);


	setInterval(function(){
		nextSlider();
	}, 4000);

	// FUNCIONES =========================================================

	function pagination(){
		var paginationPos = $(this).index() + 1; // Posicion de la paginacion seleccionada

		$('.slider li').hide(); // Ocultamos todos los slides
		$('.slider li:nth-child('+ paginationPos +')').fadeIn(); // Mostramos el Slide seleccionado

		// Dandole estilos a la paginacion seleccionada
		$('.pagination li').css({'color': '#858585'});
		$(this).css({'color': '#24989c'});

		imgPos = paginationPos;

	}

	function nextSlider(){
		if( imgPos >= imgItems){imgPos = 1;} 
		else {imgPos++;}

		$('.pagination li').css({'color': '#858585'});
		$('.pagination li:nth-child(' + imgPos +')').css({'color': '#24989c'});

		$('.slider li').hide(); // Ocultamos todos los slides
		$('.slider li:nth-child('+ imgPos +')').fadeIn(); // Mostramos el Slide seleccionado

	}

	function prevSlider(){
		if( imgPos <= 1){imgPos = imgItems;} 
		else {imgPos--;}

		$('.pagination li').css({'color': '#858585'});
		$('.pagination li:nth-child(' + imgPos +')').css({'color': '#24989c'});

		$('.slider li').hide(); // Ocultamos todos los slides
		$('.slider li:nth-child('+ imgPos +')').fadeIn(); // Mostramos el Slide seleccionado
	}

});
  
  
  