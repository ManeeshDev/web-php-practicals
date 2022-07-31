function resetmsg() {
	var msg = document.getElementById("Terr");
	msg.style.display = "none";
}

function cleartxt() {
	var txtbxID = document.getElementById("captcha");
	var valmsg = "CAPTCHA Verification failed";
	if (txtbxID.value==valmsg) {
		txtbxID.style.color ="black";
		txtbxID.value = null;
	}
}

function validate() {
	if (isNaN(FrmRegister.tele.value)) {
		var msg = document.getElementById("Terr");
		msg.style.display = "block";
		msg.innerHTML = "Invalid Characters";
		return false;
	}

	var teleID = document.getElementById("tele");
	if (FrmRegister.tele.value.length < 10) {
		var msg = document.getElementById("Terr");
		msg.style.display = "block";
		msg.innerHTML = "Please Enter Valid Mobile No. ex:0777777777";
		teleID.focus();
		return false;
	}else{
		var msg = document.getElementById("Terr");
		msg.style.display = "none";
	}

	if ((FrmRegister.tele.value.length > 12) || (FrmRegister.tele.value.length == 11)) {
			var msg = document.getElementById("Terr");
			msg.style.display = "block";
			msg.innerHTML = "Please Enter Valid Mobile No. ex:+94777777777";
			teleID.focus();
			return false;
	}else{
		var msg = document.getElementById("Terr");
		msg.style.display = "none";
	}

	const captcha = "Hate CAPTCHA";
	var txtbxID = document.getElementById("captcha");
	if (txtbxID.value!=captcha) {
		txtbxID.value ="CAPTCHA Verification failed";
		txtbxID.style.color ="red";
		return false;
	}
}

var queryString = window.location.search;
var urlParams = new URLSearchParams(queryString);
var msg = urlParams.get('msg');
var err = urlParams.get('err');
if (msg=='success') {
	alert('Record Added successful');
}

if (msg=='failed') {

	if (err==null) {
		alert('Record Added failed');
	}else{
		alert('Record Added failed --> '+err);
	}

}

if (msg=='access denied') {
	alert('access denied');
}



