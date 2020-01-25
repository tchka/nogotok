var rusBig = new Array( "Э", "Ч", "Ш", "Ё", "Ё", "Ж", "Ю", "Ю", "\Я", "\Я", "А", "Б", "В", "Г", "Д", "Е", "З", "И", "Й", "К", "Л", "М", "Н", "О", "П", "Р", "С", "Т", "У", "Ф", "Х", "Ц", "Щ", "Ъ", "Ы", "Ь");
var rusSmall = new Array("э", "ч", "ш", "ё", "ё","ж", "ю", "ю", "я", "я", "а", "б", "в", "г", "д", "е", "з", "и", "й", "к", "л", "м", "н", "о", "п", "р", "с", "т", "у", "ф", "х", "ц", "щ", "ъ", "ы", "ь" );
var engBig = new Array("E\'", "CH", "SH", "YO", "JO", "ZH", "YU", "JU", "YA", "JA", "A","B","V","G","D","E", "Z","I","J","K","L","M","N","O","P","R","S","T","U","F","H","C", "SCH","~","Y", "\'");
var engSmall = new Array("e\'", "ch", "sh", "yo", "jo", "zh", "yu", "ju", "ya", "ja", "a", "b", "v", "g", "d", "e", "z", "i", "j", "k", "l", "m", "n", "o", "p", "r", "s",  "t", "u", "f", "h", "c", "sch", "~", "y", "\'");
var rusRegBig = new Array( /Э/g, /Ч/g, /Ш/g, /Ё/g, /Ё/g, /Ж/g, /Ю/g, /Ю/g, /Я/g, /Я/g, /А/g, /Б/g, /В/g, /Г/g, /Д/g, /Е/g, /З/g, /И/g, /Й/g, /К/g, /Л/g, /М/g, /Н/g, /О/g, /П/g, /Р/g, /С/g, /Т/g, /У/g, /Ф/g, /Х/g, /Ц/g, /Щ/g, /Ъ/g, /Ы/g, /Ь/g);
var rusRegSmall = new Array( /э/g, /ч/g, /ш/g, /ё/g, /ё/g, /ж/g, /ю/g, /ю/g, /я/g, /я/g, /а/g, /б/g, /в/g, /г/g, /д/g, /е/g, /з/g, /и/g, /й/g, /к/g, /л/g, /м/g, /н/g, /о/g, /п/g, /р/g, /с/g, /т/g, /у/g, /ф/g, /х/g, /ц/g, /щ/g, /ъ/g, /ы/g, /ь/g);
var engRegBig = new Array( /E'/g, /CH/g, /SH/g, /YO/g, /JO/g, /ZH/g, /YU/g, /JU/g, /YA/g, /JA/g, /A/g, /B/g, /V/g, /G/g, /D/g, /E/g, /Z/g, /I/g, /J/g, /K/g, /L/g, /M/g, /N/g, /O/g, /P/g, /R/g, /S/g, /T/g, /U/g, /F/g, /H/g, /C/g, /SCH/g, /~/g, /Y/g, /'/g);
var engRegSmall = new Array(/e'/g, /ch/g, /sh/g, /yo/g, /jo/g, /zh/g, /yu/g, /ju/g, /ya/g, /ja/g, /a/g, /b/g, /v/g, /g/g, /d/g, /e/g, /z/g, /i/g, /j/g, /k/g, /l/g, /m/g, /n/g, /o/g, /p/g, /r/g, /s/g, /t/g, /u/g, /f/g, /h/g, /c/g, /sch/g, /~/g, /y/g, /'/g);

function translit(input, mode) {
	var textar = input;
	var res = "";

	if(mode == "E_TO_R") {
		if (textar) {
			for (i=0; i<engRegSmall.length; i++) {
				textar = textar.replace(engRegSmall[i], rusSmall[i])  
			}
			for (var i=0; i<engRegBig.length; i++) {
				textar = textar.replace(engRegBig[i], rusBig[i])  
				textar = textar.replace(engRegBig[i], rusBig[i])  
			} 
			res = textar;
		}
	}

	if(mode == "R_TO_E") {
		if (textar) {
			for (i=0; i<rusRegSmall.length; i++) {
				textar = textar.replace(rusRegSmall[i], engSmall[i])  
			}
			for (var i=0; i<rusRegBig.length; i++) {
//				textar = textar.replace(rusRegBig[i], engBig[i])  
				textar = textar.replace(rusRegBig[i], engSmall[i])  
			} 
			res = textar.toLowerCase();
		}
	}

	//
	res = res.replace(/[\/\\'\.,\t\|\+&\?%#@\:!"]*/g, "");
	res = res.replace(/[ ]+/g, "-");
	//

	//document.post.message.value = res;
	return res;
}

function translitUrl(input_from, input_to) {
	var s = $(input_from).val();
	var s = translit(s, 'R_TO_E');

	s = s.replace(/[^a-z^0-9^_^\.^\-]*/g, "");

	$(input_to).val( s );
}