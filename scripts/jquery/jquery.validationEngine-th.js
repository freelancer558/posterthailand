(function($) {
	$.fn.validationEngineLanguage = function() {};
	$.validationEngineLanguage = {
		newLang: function() {
			$.validationEngineLanguage.allRules = 	{"required":{    			// Add your regex rules here, you can take telephone as an example
						"regex":"none",
						"alertText":"* เป็นค่าว่างไม่ได้",
						"alertTextCheckboxMultiple":"* กรุณาเลือก",
						"alertTextCheckboxe":"* เลือกเป็น On เท่านั้น"},
					"length":{
						"regex":"none",
						"alertText":"* ระหว่าง ",
						"alertText2":" ถึง ",
						"alertText3": " ตัวอักษรเท่านั้น"},
					"maxCheckbox":{
						"regex":"none",
						"alertText":"* เลือกเกินกว่าที่ทำหนดไว้"},	
					"minCheckbox":{
						"regex":"none",
						"alertText":"* กรุณาเลือก ",
						"alertText2":" ออพชัน"},	
					"confirm":{
						"regex":"none",
						"alertText":"* ข้อมูลไม่ตรงกัน"},		
					"telephone":{
						"regex":"/^[0-9\-\(\)\ ]+$/",
						"alertText":"* หมายเลขโทรศัพท์ไม่ถูกต้อง"},	
					"email":{
						"regex":"/^[a-zA-Z0-9_\.\-]+\@([a-zA-Z0-9\-]+\.)+\.[a-zA-Z0-9]{2,4}$/",
						"alertText":"* อีเมลไม่ถูกต้อง"},	
					"date":{
                         "regex":"/^[0-9]{4}\-\[0-9]{1,2}\-\[0-9]{1,2}$/",
                         "alertText":"* วันที่ไม่ถูกต้อง, จะต้องอยู่ในรูปแบบ YYYY-MM-DD เท่านั้น"},
					"onlyNumber":{
						"regex":"/^[0-9\ ]+$/",
						"alertText":"* เฉพาะตัวเลข"},	
					"noSpecialCaracters":{
						"regex":"/^[0-9a-zA-Z]+$/",
						"alertText":"* เป็นภาษาอังกฤษหรือตัวเลขเท่านั้น"},	
					"ajaxUser":{
						"file":"validateUser.php",
						"extraData":"name=admin",
						"alertTextOk":"* ชื่อผู้ใช้นี้สามารถใช้งานได้",	
						"alertTextLoad":"* กำลังโหลด..., โปรดรอสักครู่",
						"alertText":"* คุณไม่สามารถใช้ชื่อนี้ได้"},	
					"ajaxName":{
						"file":"validateUser.php",
						"alertText":"* ชื่อนี้มีผู้ใช้แล้ว",
						"alertTextOk":"* ชื่อนี้สามารถใช้งานได้",	
						"alertTextLoad":"* กำลังโหลด..., รอสักครู่"},		
					"onlyLetter":{
						"regex":"/^[a-zA-Z\ \']+$/",
						"alertText":"* ตัวอักษรภาษาอังกฤษเท่านั้น"},
					"validate2fields":{
    					"nname":"validate2fields",
    					"alertText":"* คุณจะต้องกรอกชื่อ  และนามสกุลด้วยนะค่ะ"}	
					}	
					
		}
	}
})(jQuery);

$(document).ready(function() {	
	$.validationEngineLanguage.newLang()
});