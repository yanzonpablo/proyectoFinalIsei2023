function confirmaUsuario() {
    const res = confirm("Confirma borrar usuario");
    if (res == true) {
        return true;
    } else {
        return false;
    }
}