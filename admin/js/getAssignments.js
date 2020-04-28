var url=new URLSearchParams(window.location.search);
		var ab=url.get('class');

		(function self(argument) {
		  myfunction(argument);
		})(ab);

		function myfunction(argument) {
			var url=new URLSearchParams(window.location.search);
		var ab=url.get('class');
		
		argument=ab;
		var a=document.getElementById('subjects').value;
		a=a.toLowerCase();

		if (argument<11) {

			if (a=="none") {
					query="?class="+argument;
				}
			else
			var query="?class="+argument+"&sub="+a;
		}
		else{
					var stream=url.get('stream');

					if (a=="none") {
					
					query="?class="+argument+"&stream="+stream;
				}
			else{
			var query="?class="+argument+"&stream="+stream+"&sub="+a;
		}


		}



				

			var ajax=new XMLHttpRequest();
			ajax.addEventListener("load",completeHandler,false);
			ajax.open("POST","js/getAssignments.php"+query);
			ajax.send();
		}
		function completeHandler(event){

		document.getElementById("res1").innerHTML=event.target.responseText;
		}