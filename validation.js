document.querySelector('#Username').addEventListener('change', UN_validation);

function UN_validation() {

    var Username = document.getElementById("Username").value;
    var Usernames = document.getElementById("Usernames");
    var counter = 0;

    for (i = 0; i < Usernames.length; i++) {
        if (Username == Usernames[i].innerHTML) {
            document.getElementById("UN_msg").innerHTML = "Username taken.";
            counter++;
        }
    }

    if (counter == 0) {

        document.getElementById("UN_msg").innerHTML = "";
        return true;
    }
    else {
        document.getElementById("Username").innerHTML = "";
        return false;
    }
}

function allLetter(inputtxt) {
    var letters = /^[A-Za-z]+$/;
    if (inputtxt.value.match(letters)) {
        return true;
    }
    else {
        return false;
    }
}

function FN_validation() {

    var Firstname = document.getElementById("Firstname").value;

    if (!(allLetter(Firstname))) {

        document.getElementById("FN_msg").innerHTML = "A name must only contain letters.";
    }
    else if (Firstname.length > 10) {
        document.getElementById("FN_msg").innerHTML = "A name may only be 10 letter long.";
    }
    else { return true; }
	
	return false;
}

function SN_validation() {

    var Surname = document.getElementById("Firstname").value;

    if (!allLetter(Surname)) {

        document.getElementById("SN_msg").innerHTML = "A name must only contain letters.";
        return false;
    }
    else if (Surname.length > 10) {
        document.getElementById("SN_msg").innerHTML = "A name may only be 10 letter long.";
        return false;
    }
    else { return true; }

}

$("form").submit(function (e) {
    var validation = UN_validation();
    if (!validation) {
        e.preventDefault();
        return false;
    }
}); 