
function agregardatos(datos) {

    d = datos.split('||');
    $('#idu').val(d[0]);
    $('#nombreu').val(d[1]);
    $('#guionu').val(d[2]);
    $('#observacionu').val(d[3]);
}