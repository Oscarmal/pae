/*O3M*/
function modal0(idObjeto){
    $("#"+idObjeto).dialog({
        width: 500,
        height: 300,
        show: "scale",
        hide: "scale",
        resizable: "false",
        position: "center"     
    });
}

function modal1(idObjeto){
    $("#"+idObjeto).dialog({ 
        width: 500, 
        height: 300,
        show: "scale", 
        hide: "scale", 
        resizable: "false", 
        position: "center",
        modal: "true" 
    });
}

function modal2(idObjeto){
    $("#"+idObjeto).dialog({
        width: 500,
        height: 300,
        show: "blind",
        hide: "shake",
        resizable: "false",
        position: "center"     
    });
}
/*O3M*/