$(document).ready(function () {



});

var Catalogos = {

    obtener_catalogo_estado : function(){
        //peticion ajax
        $.ajax({
            type : 'post', //tipo
            //url : '../rutas/empleados.php?peticion=catalogos&funcion=estado',
            url : host_backend+'peticion=catalogos&funcion=estado',
            data : {},//datos del formulario o body-postman
            dataType : 'json', //html, texto, xml, htm, json
            success : function (respuestaAjax){
                console.log(respuestaAjax);
                if(respuestaAjax.success){

                }else{

                }
            },error : function (err){
                alert('error en la peticion de catalogos');
            }
        });
    }

}