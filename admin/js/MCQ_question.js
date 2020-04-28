/*written by saquib naseem, 6springBytes*/



function addQuestion(){
var urls=new URLSearchParams(window.location.search);
var class1=urls.get('class');

var desp=_("desp").value;
 var ques=_("ques").value;
 var op1=_("op1").value;
 var op2=_("op2").value;
 var op3=_("op3").value;
 var op4=_("op4").value;
 var ans=_("ans").value;
  var e=_('add_test_q').textContent;

var query="?class="+class1+"&desp="+desp+"&ques="+ques+"&op1="+op1+"&op2="+op2+"&op3="+op3+"&op4="+op4+"&ans="+ans;

 if (e=='Add New') {
 		var listOptions=_("testpapers").value;
 		query+="&papername="+listOptions;

 }
 else{

 	var papername=_("papername").value;
 	//alert(papername);
 	query+="&papername="+papername;


 }



 

if (class1>=11) {
	var stream=urls.get('stream');
	query+="&stream="+stream;
 }

 sendAjaxRequest(query);

}
function _(str){
	return document.getElementById(str);
}

function sendAjaxRequest(query){

	var urls=new URLSearchParams(query);
	var class1=urls.get('req');

	if (class1!=null) {
		
	var ajax=new XMLHttpRequest();
	ajax.addEventListener("load",completeHandler1,false);
	ajax.open("POST","js/getListOptions.php"+query);
	ajax.send();

	}

	else{
	var ajax=new XMLHttpRequest();
	ajax.addEventListener("load",completeHandler,false);
	ajax.open("POST","js/SaveQuestion.php"+query);
	ajax.send();	
	}


	

	
}
function completeHandler(event){
	
	var snackbar=_("snackbar");
	snackbar.innerHTML="1 question inserted";/*event.target.responseText;*/
	snackbar.className="show";
	setTimeout(function(){
		snackbar.className=snackbar.className.replace("show", " ");
	},3000);

	var total=_("total_ques");
	var a=JSON.parse(event.target.responseText);
		/*alert(a[2]);*/
	total.innerHTML=a[2]+" Questions ";


	var listOption=_("testpapers");
	listOption.innerHTML=a[3];
	
	


	/*var optionList=*/
	/*_("testpapers").innerHTML=a[3];*/

}

function completeHandler1(event){

	var listOption=_("testpapers");
	listOption.innerHTML=event.target.responseText;
	

}