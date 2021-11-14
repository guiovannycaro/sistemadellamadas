
function agregardatos(datos) {

    d = datos.split('||');
    $('#idu').val(d[0]);
    $('#nombreu').val(d[1]);
    $('#apellidosu').val(d[2]);
    $('#rolu').val(d[4]);
    $('#correou').val(d[5]);

}