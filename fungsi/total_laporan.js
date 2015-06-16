var xhr;
function ajaxpost2(){
	if(window.XMLHttpRequest){
		xhr = new XMLHttpRequest();
	} else if (window.ActiveXObject){
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	if(xhr == null){
		alert("browser tidak support ajax");
	}
	xhr.onreadystatechange = stateChanged;
	var url="total_laporan.php";
	
	xhr.open("POST",url,true);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send();
}
function stateChanged() {
	if (xhr.readyState == 4){
		document.getElementById("result").innerHTML = xhr.responseText;
	}
}