window.addEventListener('load', () => {

    const titleQuestions = [...document.querySelectorAll('.preguntas_title')];
    
    titleQuestions.forEach((question) => {
      question.addEventListener('click', () => {
        let height = 0;
  
        //La propiedad nextElementSibling devuelve el siguiente elemento en el mismo nivel de árbol. Solo lectura.
        let answer = question.nextElementSibling;
        let addPadding = question.parentElement.parentElement;
  
        addPadding.classList.toggle('preguntas_padding--add');
  
        question.children[0].classList.toggle('preguntas_arrow--rotate');
  
        /*
        La propiedad clientHeight devuelve la altura visible(el height asignado) de un elemento en píxeles, incluido el relleno, pero no el borde, la barra de desplazamiento o el margen.
        */
        if(answer.clientHeight === 0) {
          /*
          La propiedad scrollHeight devuelve la altura real de un elemento apartir de su contenido, no incluiye el padding, bordes, barras de desplazamiento o márgenes.
          La propiedad scrollHeight devuelve la altura en píxeles. Es de solo lectura.
          */
          height = answer.scrollHeight;
        }
  
        answer.style.height = `${height}px`;
      });
    });
  });