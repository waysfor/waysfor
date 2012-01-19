if (window.attachEvent){
	window.attachEvent("onload",searchSelect);
}
else{
	window.addEventListener("load",searchSelect,false);
}

function $$(str){
	if (str.indexOf("#") != -1){
		return document.getElementById(str.substring(1));
	}
	else if(str.indexOf("#") == -1 && str.indexOf(".") == -1){
		return document.getElementsByTagName(str);
	}
	else if(str.indexOf(".") != -1){
		var aTemp = [];
		var o = document.getElementsByTagName("*");
		for (var i = 0; i < o.length; i++){
			if (o[i].className.indexOf(str.substring(1)) != -1){
				aTemp.push(o[i]);
			}
		}
		return aTemp
	}
}

function searchSelect(){
	var typebtn = $$("#search_type");
	var typelist = $$("#typelist");
	var checked = $$("#checked");
	var option = $$("#option");
	var typeitem = typelist.getElementsByTagName("li");
	var oBody = $$("body")[0];
	typebtn.onclick = function(ev){
		oEvent = ev || window.event;
		typelist.style.display = "block";
		oEvent.cancelBubble = true;
	}
	oBody.onclick = function(){
		typelist.style.display = "none";
	}
	for (var i = 0; i < typeitem.length; i++){
		typeitem[i].onclick = function(){
			option.innerHTML = this.innerHTML;
			checked.value = this.innerHTML;
		}
	}
}