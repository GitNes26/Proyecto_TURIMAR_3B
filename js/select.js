$(document).ready(function(e){
    $("#selectEstado").change(function(){
        alert("ok");
    })

    // $.ajax({
    //     data: parametros,
    //     url: '../tours.php',
    //     type: 'post',
    //     beforeSend: function(){
    //         $("#selecCiudad").html("Procesando, espere por favor...");
    //     },
    //     success: function(response){
    //         $("#selecCiudad").html(response);
    //     }
    // });
    
})

/*ESTRUCTURA BASICA*/
// $(document).ready(function(e){
//     $("#selectPais").click(function(){
//         mostrarProvincias("arequipa")
//     })
//     $("#deCurso").click(function(){
//         mostrarProvincias("cursos")
//     })
//     function mostrarProvincias(valor){
//         var parametros = {
//             "valor" : valor,
//         };
//         $.ajax({
//             data: parametros,
//             url: '../tours.php',
//             type: 'post',
//             beforeSend: function(){
//                 $("#resultado").html("Procesando, espere por favor...");
//             },
//             success: function(response){
//                 $("#resultado").html(response);
//             }
//         });
//     }
// })



//iiopas
// function selectEstado(IDestado)
// {
//     var ID=IDestado
//     // alert(ID)
//     $.ajax({
//         URL: "../prueba.php",
//         method:"POST",
//         data: {
//             "ID":ID
//         },
//         success: function(respuesta){
//             console.log(respuesta)
//             $("#ciudades").html(respuesta)
//         }
//     })
// }