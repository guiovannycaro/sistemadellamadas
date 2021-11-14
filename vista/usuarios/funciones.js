
function agregardatos(datos) {

    d = datos.split('||');
    $('#idu').val(d[0]);
    $('#nombreu').val(d[1]);
    $('#apellidosu').val(d[2]);
    $('#usuariou').val(d[3]);
    $('#claveu').val(d[4]);
    $('#rolu').val(d[5]);
    $('#correou').val(d[6]);

}