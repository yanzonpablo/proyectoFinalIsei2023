window.addEventListener('load',function(){

document.getElementById('fechaFin').type= 'text';

document.getElementById('fechaFin').addEventListener('blur',function(){

document.getElementById('fechaFin').type= 'text';

});

document.getElementById('fechaFin').addEventListener('focus',function(){

document.getElementById('fechaFin').type= 'date';

});

});