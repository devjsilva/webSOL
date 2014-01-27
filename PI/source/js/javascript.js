function lightImg(img){
	document.getElementById(img).src="source/img/icons/light_icons/light_"+img+".png";
}
function normalImg(img){
	document.getElementById(img).src="source/img/icons/normal_icons/normal_"+img+".png";
}
function darkImg(img){
	document.getElementById(img).src="source/img/icons/dark_icons/dark_"+img+".png";
}

function darkText(text){
	document.getElementById(text).style.color="#333";
}
function normalText(text){
	document.getElementById(text).style.color="#999";
}
function lightText(text){
	document.getElementById(text).style.color="white";
}


function darkCaret(caret){
	document.getElementById(caret).style.borderTop="4px solid #333";
}
function normalCaret(caret){
	document.getElementById(caret).style.borderTop="4px solid #999";
}
function lightCaret(caret){
	document.getElementById(caret).style.borderTop="4px solid white";
}

function displayShortcuts(color,img,id){
    var item = document.getElementById(id);
    if( item.style.display=="none"){
	   document.getElementById(img).src="source/img/icons/"+color+"_icons/"+color+"_arrow_up.png";
	    item.style.display="block";
    }
    else{
	   document.getElementById(img).src="source/img/icons/"+color+"_icons/"+color+"_arrow_down.png";
	    item.style.display="none";
    }
    
}

function help(){
    alert("hello!");
}