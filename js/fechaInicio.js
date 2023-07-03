window.addEventListener('load',function(){

document.getElementById('fechaInicio').type= 'text';

document.getElementById('fechaInicio').addEventListener('blur',function(){

document.getElementById('fechaInicio').type= 'text';

});

document.getElementById('fechaInicio').addEventListener('focus',function(){

document.getElementById('fechaInicio').type= 'date';

});

});
