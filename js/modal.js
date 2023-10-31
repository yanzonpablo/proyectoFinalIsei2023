document.addEventListener("DOMContentLoaded", function() {
    // Code to be executed when the DOM is ready
    const openModal = document.querySelector('.activaModal');
    const modal = document.querySelector('.modal');
    const closeModal = document.querySelector('.modalClose');
    
    openModal.addEventListener('click',
        modal.classList.add('modalShow')
    );
    
    closeModal.addEventListener('click', (e)=>{
        e.preventDefault();
        modal.classList.remove('modalShow');
        window.location.href="index.php#camarasAdheridas";
        
    });
    
    
}); 

