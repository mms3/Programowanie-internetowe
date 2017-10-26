/* encoding="UTF-8" */

function check_form()
	{
    if (!checkName(document.getElementById('firstname').value)){
      alert("Niepoprawnie wypełnione pole 'Imię'");
			return false;
    }

    if (!checkName(document.getElementById('lastname').value)){
      alert("Niepoprawnie wypełnione pole 'Nazwisko'");
			return false;
    }

    if (!checkAge(document.getElementById('birthdate').value)){
      alert("Niepoprawnie wypełnione pole 'Data urodzenia' (yyyy-mm-dd)");
			return false;
    }

    var pesel = document.getElementById('pesel').value;
    if (pesel != "" && pesel != null) {
			if(!checkPESEL(document.getElementById('pesel').value)){
        return false;
      }
		}

    var photo = document.getElementById('uploadfile').value;
		var extension = photo.substring(photo.lastIndexOf('.') + 1).toLowerCase();
		if (extension != "jpg" && extension != "tif" && extension != "png" && extension != "") {
			alert("Nieprawidłowe rozszerzenie pliku");
			return false;
		}
    
    var agreed = document.getElementById("agreed");
		if (agreed.checked == false) {
			alert("Zgoda na przetwarzanie danych osobowych jest obowiązkowa");
			return false;
		}

	  return true;
	}

function checkName(s){
  var reg = new RegExp("^[A-Z][a-z]+$");
	if (reg.test(s) == false) {
	  return false;
	}
  return true;
}

function checkAge(s){
  var reg = new RegExp("^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$");
  if (reg.test(s) == false){
	  return false;
	}
  return true;
}

function checkPESEL(s){
  var reg = new RegExp("^[0-9]{11}$");
  if (reg.test(s) == false){
    alert ("Niepoprawnie wypełnione pole 'PESEL'");
	  return false;
	}
  var pesel = document.getElementById('pesel').value;
  var control = parseInt(pesel.charAt(0))+3*parseInt(pesel.charAt(1))+7*parseInt(pesel.charAt(2))+9*parseInt(pesel.charAt(3))+parseInt(pesel.charAt(4))
    +3*parseInt(pesel.charAt(5))+7*parseInt(pesel.charAt(6))+9*parseInt(pesel.charAt(7))+parseInt(pesel.charAt(8))+3*parseInt(pesel.charAt(9));
  var rest = control%10;
  if (rest != 0){
     rest = 10-rest;
  }
  if (rest != parseInt(pesel.charAt(10))){
     alert ("Nieprawidłowy PESEL");
     return false;
  }

  var peselYear = parseInt(pesel.slice(0,2));
  var peselMonth = parseInt(pesel.slice(2,4));
  var peselDay = parseInt(pesel.slice(4,6));

  var birth = document.getElementById('birthdate').value;
  var birthdateYear = parseInt(birth.slice(0,4));
  var birthdateMonth = parseInt(birth.slice(5,7));
  var birthdateDay = parseInt(birth.slice(8,10));

  if (peselMonth >= 81 && peselMonth <=92){
     peselYear += 1800;
     peselMonth -= 80;
  } else if (peselMonth >= 1 && peselMonth <= 12){
     peselYear += 1900;
  } else if (peselMonth >= 21 && peselMonth <= 32){
     peselYear += 2000;
     peselMonth -= 20;
  } else if (peselMonth >= 41 && peselMonth <= 52){
     peselYear += 2100;
     peselMonth -= 40;
  } else if (peselMonth >= 61 && peselMonth <= 72){
     peselYear += 2200;
     peselMonth -= 60;
  } else {
     alert ("Nieprawidłowy PESEL");
     return false;
  }  

  if (peselYear != birthdateYear || peselMonth != birthdateMonth || peselDay != birthdateDay){
     alert ("PESEL nie zgadza się z datą urodzenia");
     return false;
  }

  return true;
}


function countChars(size) {
	comment = document.getElementById('comment');
	if(comment.value.length > size) {
     before = comment.value.substring(0,size);
     comment.value = before;
	}
	document.getElementById('charsLeft').value = size - comment.value.length;
}


function countAge() {
  var reg = new RegExp("^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$");
  if (reg.test(form.birthdate.value) == true){
    var birthday = new Date(document.getElementById("birthdate").value);
    var age = Math.floor((Date.now() - birthday)/31557600000);
    if (age < 0){
      document.getElementById("age").value = "0";
    } else{
      document.getElementById("age").value = age;
    }  
  }
}

