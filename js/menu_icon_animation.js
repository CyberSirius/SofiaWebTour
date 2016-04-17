function changeClass() {
	
	var getClassOf = Function.prototype.call.bind(Object.prototype.toString);
	
    if (document.getElementById("nav-icon1").className.match(/(?:^|\s)open(?!\S)/)) {
        document.getElementById("nav-icon1").className =
            document.getElementById("nav-icon1").className.replace
            (/(?:^|\s)open(?!\S)/g, '')
        document.getElementById("main_container").style.marginLeft = "0px";
        var cards = document.getElementsByClassName("card__container");
        for (i = 0; i < cards.length; i++) { 
       	 if(!hasClass(cards[i], "card__container--closed")){
            	cards[i].style.marginLeft = "0px";
            }
       }
    }
    else {
        document.getElementById("nav-icon1").className += " open";
        var container = document.getElementById("main_container");
        container.style.marginLeft = "250px";
        var obf = document.getElementsByClassName("mdl-layout__obfuscator");
        var layout = document.getElementById("layout");
        obf[0].style.height = layout.offsetHeight;
        var cards = document.getElementsByClassName("card__container");
        for (i = 0; i < cards.length; i++) { 
        	 if(!hasClass(cards[i], "card__container--closed")){
             	cards[i].style.marginLeft = "150px";
             }
        }
       
    }
}

function hasClass(element, cls) {
    return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
}

function addMethodToObf() {
	
	var obf = document.getElementsByClassName("mdl-layout__obfuscator");
	obf[0].addEventListener("click", changeClass);
}



