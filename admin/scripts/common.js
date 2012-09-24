
function resetForm(formId){
	document.getElementById(formId).reset();	
}

function toggle(menuId) {
	var menuObj = document.getElementById(menuId);
	menuObj.style.display = menuObj.style.display == "none" ? "block" : "none";
}

function validateForm(){
	if(document.getElementById("b_name").value == ""){
		window.alert("图书名称为必填项 ");
		return false;
	}
	
	if(document.getElementById("b_price").value == ""){
		window.alert("图书价格为必填项");
		return false;
	}
	return true;	
}
