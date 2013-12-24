function checkEmail(){
    var x=document.getElementById("email");
    var y=document.getElementById("oklep-email");
    var reg=/^([a-zA-Z0-9_\.-]+)@([a-zA-Z0-9\.-]+)\.([a-zA-Z\.]{2,5})$/;
	var result=reg.test(x.value);
	
	if(!result){
		x.value="";
		y.style.boxShadow="0px 0px 6px red";
		y.style.border="1px solid #aa7777";
		return false;
	}
	return true;
}
function checkPassword(){
    var x=document.getElementById("password");
	var y=document.getElementById("oklep-password");
    var reg=/^[a-zA-Z0-9]{3,20}$/;
	var result=reg.test(x.value);
	
	if(!result){
		x.value="";
		y.style.boxShadow="0px 0px 6px red";
		y.style.border="1px solid #aa7777";
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
	if(checkEmail() && checkPassword()){
		$("#form-login").submit();
	}else{
		checkEmail();
		checkPassword();
			
		if (!document.getElementById('napaka')) {
			var para=document.createElement("label");
			para.setAttribute("id", "napaka");
			var node=document.createTextNode("Your email or password is wrong.");
			para.appendChild(node);
			para.style.color="red";

			var element=document.getElementById("form-login");
			var child=document.getElementById("login");
			element.insertBefore(para,child);
		}
	}
}

email=document.getElementById("email");
password=document.getElementById("password");
login=document.getElementById("login");

email.addEventListener("focus",function(){select("oklep-email")},false);
email.addEventListener("blur",function(){reverse("oklep-email")},false);

password.addEventListener("focus",function(){select("oklep-password")},false);
password.addEventListener("blur",function(){reverse("oklep-password")},false);

login.addEventListener("click",validation,false);
