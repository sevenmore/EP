function checkName() {
	var x=document.getElementById("name");
    var y=document.getElementById("oklep-name");
    var reg=/^[a-zA-Z\s]{2,20}$/;
	var result=reg.test(x.value);
	
	if(!result){
		x.value="";
		y.style.boxShadow="0px 0px 6px red";
		y.style.border="1px solid #aa7777";
		return false;
	}
	return true;
}
function checkSurname() {
	var x=document.getElementById("surname");
    var y=document.getElementById("oklep-surname");
    var reg=/^[a-zA-Z\s]{2,20}$/;
	var result=reg.test(x.value);
	
	if(!result){
		x.value="";
		y.style.boxShadow="0px 0px 6px red";
		y.style.border="1px solid #aa7777";
		return false;
	}
	return true;
}
function checkAddress() {
	var x=document.getElementById("address");
    var y=document.getElementById("oklep-address");
    var reg=/^[a-zA-Z0-9\s]{2,30}$/;
	var result=reg.test(x.value);
	
	if(!result){
		x.value="";
		y.style.boxShadow="0px 0px 6px red";
		y.style.border="1px solid #aa7777";
		return false;
	}
	return true;
}
function checkCity() {
	var x=document.getElementById("city");
    var y=document.getElementById("oklep-city");
    var reg=/^[a-zA-Z\s]{2,20}$/;
	var result=reg.test(x.value);
	
	if(!result){
		x.value="";
		y.style.boxShadow="0px 0px 6px red";
		y.style.border="1px solid #aa7777";
		return false;
	}
	return true;
}
function checkPost() {
	var x=document.getElementById("post");
    var y=document.getElementById("oklep-post");
    var reg=/^[0-9]{2,6}$/;
	var result=reg.test(x.value);
	
	if(!result){
		x.value="";
		y.style.boxShadow="0px 0px 6px red";
		y.style.border="1px solid #aa7777";
		return false;
	}
	return true;
}
function checkEmail() {
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
function checkPhone() {
	var x=document.getElementById("phone");
    var y=document.getElementById("oklep-phone");
    var reg=/^(070|051|050|041|040|031)[0-9]{6}$/;
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
function checkPassword() {
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
	var y=document.getElementById("oklep-repassword");
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
function validation(){
	if(checkName() && checkSurname() && checkAddress() && checkCity() && checkPost() && checkEmail() && checkPhone() && checkPassword() && checkRePassword()){
		$("#form-signup").submit();
	}else{
		checkName();
		checkSurname();
		checkAddress();
		checkCity();
		checkPost();
		checkEmail();
		checkPhone();
		checkPassword();
		checkRePassword();
		
		if (!document.getElementById('napaka')) {
			var para=document.createElement("label");
			para.setAttribute("id", "napaka");
			var node=document.createTextNode("Please, fill correctly the form.");
			para.appendChild(node);
			para.style.color="red";

			var element=document.getElementById("form-signup");
			var child=document.getElementById("signup");
			element.insertBefore(para,child);
		}
	}
}

name1=document.getElementById("name");
surname=document.getElementById("surname");
address=document.getElementById("address");
city=document.getElementById("city");
post=document.getElementById("post");
email=document.getElementById("email");
phone=document.getElementById("phone");
password=document.getElementById("password");
repassword=document.getElementById("re-password");
signup=document.getElementById("signup");

name1.addEventListener("focus",function(){select("oklep-name")},false);
name1.addEventListener("blur",function(){reverse("oklep-name")},false);

surname.addEventListener("focus",function(){select("oklep-surname")},false);
surname.addEventListener("blur",function(){reverse("oklep-surname")},false);

address.addEventListener("focus",function(){select("oklep-address")},false);
address.addEventListener("blur",function(){reverse("oklep-address")},false);

city.addEventListener("focus",function(){select("oklep-city")},false);
city.addEventListener("blur",function(){reverse("oklep-city")},false);

post.addEventListener("focus",function(){select("oklep-post")},false);
post.addEventListener("blur",function(){reverse("oklep-post")},false);

email.addEventListener("focus",function(){select("oklep-email")},false);
email.addEventListener("blur",function(){reverse("oklep-email")},false);

phone.addEventListener("focus",function(){select("oklep-phone")},false);
phone.addEventListener("blur",function(){reverse("oklep-phone")},false);

password.addEventListener("focus",function(){select("oklep-password")},false);
password.addEventListener("blur",function(){reverse("oklep-password")},false);

repassword.addEventListener("focus",function(){select("oklep-repassword")},false);
repassword.addEventListener("blur",function(){reverse("oklep-repassword")},false);

signup.addEventListener("click",validation,false);