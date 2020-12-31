var pwd = document.getElementById('pwd_stu');
var conf_pwd = document.getElementById('conf_pwd_stu');
function Validate(){
	if(pwd.value != conf_pwd.value){
		conf_pwd.setCustomValidity('Passwords Don\'t Match !');
	}
}
conf_pwd.onChange = Validate; 