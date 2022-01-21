$(document).ready(function () {

    //selector por tag <button>, por id
    $(document).on('click','#btnAgregarEmpleado',function(){
        $('#contenedorFormEmpleado').fadeIn();
        $('#tableroEmpleados').fadeOut();
        //llamar la funcion del js de catalogo -> obtener estado
        Catalogos.obtener_catalogo_estado();
    });

    $(document).on('click','#btnCancelarEmpleado',function(){
        $('#contenedorFormEmpleado').fadeOut();
        $('#tableroEmpleados').fadeIn();
    });

});