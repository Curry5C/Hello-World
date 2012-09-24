
function resetForm(formId){
	document.getElementById(formId).reset();	
}

function toggle(menuId) {
	var menuObj = document.getElementById(menuId);
	menuObj.style.display = menuObj.style.display == "none" ? "block" : "none";
}

function validateForm(){
	if(document.getElementById("room").value == ""){
		window.alert("此项为必填项 ");
		return false;
	}
	
	if(document.getElementById("day").value == ""){
		window.alert("此项为必填项");
		return false;
	}
	return true;	
}
function checkeNO(NO){
var str=NO;
//在JavaScript中，正则表达式只能使用"/"开头和结束，不能使用双引号
var Expression=/\d{17}[\d|X]|\d{15}/;
var objExp=new RegExp(Expression);
if(objExp.test(str)==true){
   return true;
}else{
   return false;
}
} 
  
function check(){
if(form1.identify_card.value==""){
   alert("请输入身份证号码!");form1.identify_card.focus();return false;
}
if(!(form1.identify_card.value.length==15 || form1.identify_card.value.length==18)){
   alert("身份证号只能为15位或18位!");form1.identify_card.focus();return false;

}
if(!checkeNO(form1.identify_card.value)){
   alert("您输入身份证号码不正确!");form1.identify_card.focus();return false;
}
}