function confirmaInscripto() {
    const res = confirm("Confirma borrar usuario inscripto");
    if (res == true) {
        return true;
    } else {
        return false;
    }
}