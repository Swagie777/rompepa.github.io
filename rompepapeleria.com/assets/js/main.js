// main.js
$(document).ready(function(){
    $("#link-inicio").click(function(){
        $("#inicio").animatescroll({scrollSpeed:800});
    });
    $("#link-productos").click(function(){
        $("#productos").animatescroll({scrollSpeed:800});
    });
    $("#link-servicios").click(function(){
        $("#servicios").animatescroll({scrollSpeed:800});
    });
    $("#link-ofertas").click(function(){
        $("#ofertas").animatescroll({scrollSpeed:800});
    });
    $("#link-contacto").click(function(){
        $("#contacto").animatescroll({scrollSpeed:800});
    });
});
