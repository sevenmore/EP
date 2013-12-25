function checkOldPassword(){
	var x=document.getElementById("old-password");
	var y=document.getElementById("oklep-old-password");
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
pass=""
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
	pass=x.value;
	return true;
}
function checkRePassword() {
	var x=document.getElementById("re-password");
	var x2=document.getElementById("password");
	var y=document.getElementById("oklep-re-password");
    var reg=/^[a-zA-Z0-9]{3,20}$/;
	var result=reg.test(x.value);
	
	if(x.value!= pass){
		x.value="";
		x2.value="";
		y.style.boxShadow="0px 0px 6px red";
		y.style.border="1px solid #aa7777";
		return false;
	}
	
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
function skrij(kos){
	$(kos).hide();
}
function validation(){
	if(checkOldPassword() && checkPassword() && checkRePassword()){
		$("#forma-password").submit();
	}else{
		checkOldPassword();
		checkPassword();
		checkRePassword();
		
		if (!document.getElementById('napaka')) {
			var para=document.createElement("label");
			para.setAttribute("id", "napaka");
			var node=document.createTextNode("Please, fill correctly the form.");
			para.appendChild(node);
			para.style.color="red";

			var element=document.getElementById("forma-password");
			var child=document.getElementById("save");
			element.insertBefore(para,child);
		}
	}
}

oldpassword=document.getElementById("old-password");
password=document.getElementById("password");
repassword=document.getElementById("re-password");
save=document.getElementById("save");

oldpassword.addEventListener("focus",function(){select("oklep-old-password"); skrij('.error')},false);
oldpassword.addEventListener("blur",function(){reverse("oklep-old-password")},false);

password.addEventListener("focus",function(){select("oklep-password"); skrij('.error')},false);
password.addEventListener("blur",function(){reverse("oklep-password")},false);

repassword.addEventListener("focus",function(){select("oklep-re-password"); skrij('.error')},false);
repassword.addEventListener("blur",function(){reverse("oklep-re-password")},false);

save.addEventListener("click",validation,false);