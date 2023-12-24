
; /* Start:"a:4:{s:4:"full";s:86:"/bitrix/templates/test/components/bitrix/system.auth.form/auth/script.js?1652340749324";s:6:"source";s:72:"/bitrix/templates/test/components/bitrix/system.auth.form/auth/script.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/

 ShowLoginForm()
{
	var div = document.getElementById("login-form-window");
	if (!div)
		return;
	div.style.display = "block";
	document.body.appendChild(div);
	return false;
}


 CloseLoginForm()
{
	var div = document.getElementById("login-form-window");
	if (!div)
		return;

	div.style.display = "none";
	return false;
}
/* End */
;; /* /bitrix/templates/test/components/bitrix/system.auth.form/auth/script.js?1652340749324*/
