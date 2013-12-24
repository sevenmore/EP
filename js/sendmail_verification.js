function checkName(){
	var x=document.getElementById("sendmail-name");
	
	if(x.value==""){
		x.style.boxShadow="0px 0px 6px red";
		x.style.border="1px solid #aa7777";
		return false;
	}
	return true;
}
function checkEmail(){
	var x=document.getElementById("sendmail-email");
    var reg=/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
	var result=reg.test(x.value);
	
	if(!result){
		x.value="";
		x.style.boxShadow="0px 0px 6px red";
		x.style.border="1px solid #aa7777";
		return false;
	}
	
	if(x.value==""){
		x.style.boxShadow="0px 0px 6px red";
		x.style.border="1px solid #aa7777";
		return false;
	}
	return true;
}
function checkPhone(){
	var x=document.getElementById("sendmail-phone");
	
	if(x.value==""){
		x.style.boxShadow="0px 0px 6px red";
		x.style.border="1px solid #aa7777";
		return false;
	}
	return true;
}
function checkMessage() {
	var x=document.getElementById("sendmail-message");
	
	if(x.value==""){
		x.style.boxShadow="0px 0px 6px red";
		x.style.border="1px solid #aa7777";
		return false;
	}
	return true;
}
function select(kos) {
    var y=document.getElementById(kos);
	y.style.boxShadow="0px 0px 6px blue";
	y.style.border="1px solid #7777aa";
}
function reverse(kos){
	var y=document.getElementById(kos);
	y.style.border="1px solid rgba(0,0,0,0.3)";
	y.style.boxShadow="1px 1px 1px #cccccc";
}
function validation(){
	if(checkName() && checkEmail() && checkPhone() && checkMessage()){
		//window.location = "../contact.php";
		$("#forma").submit();
	}else{
		checkName();
		checkEmail();
		checkPhone();
		checkMessage();
		//alert("You did not fill correctly the send form.");
		if (!document.getElementById('napaka')) {
			var para=document.createElement("label");
			para.setAttribute("id", "napaka");
			para.setAttribute("class", "error-send");
			var node=document.createTextNode("Please, fill correctly the form.");
			para.appendChild(node);
			para.style.color="red";

			var element=document.getElementById("forma");
			var child=document.getElementById("sendmail-send");
			element.insertBefore(para,child);
			var br=document.createElement("br");
			element.insertBefore(br,child);
		}
	}
}
document.getElementById("sendmail-name").addEventListener("focus",function(){select("sendmail-name")},false);
document.getElementById("sendmail-name").addEventListener("blur",function(){reverse("sendmail-name")},false);

document.getElementById("sendmail-email").addEventListener("focus",function(){select("sendmail-email")},false);
document.getElementById("sendmail-email").addEventListener("blur",function(){reverse("sendmail-email")},false);

document.getElementById("sendmail-phone").addEventListener("focus",function(){select("sendmail-phone")},false);
document.getElementById("sendmail-phone").addEventListener("blur",function(){reverse("sendmail-phone")},false);

document.getElementById("sendmail-message").addEventListener("focus",function(){select("sendmail-message")},false);
document.getElementById("sendmail-message").addEventListener("blur",function(){reverse("sendmail-message")},false);

document.getElementById("sendmail-send").addEventListener("click",validation,false);