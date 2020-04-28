function uploadFile2(argument) {

		var sub=_('sub').value;
		var desp=_('desp').value;
		//alert("gya");
		var file = _("file1").files[0];

		var query="?sub="+sub;
		query+="&desp="+desp+"&class="+argument;
	// alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
	formdata.append("file1", file);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "js/uploadvideofile.php"+query);
	ajax.send(formdata);
	

}



	function progressHandler(event){
		var c=bytesConversion(event.total);
		var d=bytesConversion(event.loaded);
		
	_("loaded_n_total").innerHTML = "Uploaded "+d+" of "+c;
	var percent = (event.loaded / event.total) * 100;
	/*_("progressBar").value = Math.round(percent);
	_("status").innerHTML = Math.round(percent)+"% uploaded... please wait";*/
	_("pp").style.width = Math.round(percent)+"%";
	_("pp").innerHTML = Math.round(percent)+"% uploaded... please wait";
}
function completeHandler(event){
	_("pp").innerHTML = event.target.responseText;
	//_("progressBar").value = 0;
}
function errorHandler(event){
	_("status").innerHTML = "Upload Failed";x6 
}
function abortHandler(event){
	_("status").innerHTML = "Upload Aborted";
}
function _(str){
	return document.getElementById(str);
}
function bytesConversion(bytes){
	var sizes=['Bytes','KB','MB','GB','TB'];
	if (bytes==0) {
		return 'null';
	}
	var i= parseInt(Math.floor(Math.log(bytes)/Math.log(1024)));
	if(i==0){
		return bytes+' '+sizes[i];
	}

	return (bytes/Math.pow(1024,i)).toFixed(1)+' '+sizes[i]; 
}


