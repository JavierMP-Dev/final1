function apareceScroll(){
    var html= documet.getElementByTagName("html")[0];
    var elementoAparece = document.getElementsByClassName("aparece");

    document.addEventListener("wheel", function(){
        var topVent = html.apareceScrollTop;
        for(i=0; i<elementoAparece.length; i++){
            var topelemaparece = elementoAoarece[i].offsetTop;
            if(topVent > topelemaparece - 400){
                elementoAparece[i].getElementsByClassName.opacity = 1;
            }
        }
    })
}
/*Codigo para animar las imagenes dentro de la pagina web*/ 
apareceScroll();





