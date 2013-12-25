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
    var reg=/^(070|051|050|041|040|031)[\s-]?[0-9]{3}[\s-]?[0-9]{3}$/;
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
	if(checkName() && checkSurname() && checkAddress() && checkCity() && checkPost() && checkEmail() && checkPhone()){
		$("#forma-editprofile").submit();
	}else{
		checkName();
		checkSurname();
		checkAddress();
		checkCity();
		checkPost();
		checkEmail();
		checkPhone();
		
		if (!document.getElementById('napaka')) {
			var para=document.createElement("label");
			para.setAttribute("id", "napaka");
			var node=document.createTextNode("Please, fill correctly the form.");
			para.appendChild(node);
			para.style.color="red";

			var element=document.getElementById("forma-editprofile");
			var child=document.getElementById("save");
			element.insertBefore(para,child);
		}
	}
}

name2=document.getElementById("name");
surname=document.getElementById("surname");
address=document.getElementById("address");
city=document.getElementById("city");
post=document.getElementById("post");
email=document.getElementById("email");
phone=document.getElementById("phone");
save=document.getElementById("save");

name2.addEventListener("focus",function(){select("oklep-name")},false);
name2.addEventListener("blur",function(){reverse("oklep-name")},false);

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

save.addEventListener("click",validation,false);