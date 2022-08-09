document.forms["forma"]["offset"].value = new Date().getTimezoneOffset();

function validate() {
    let x = document.forms["forma"]["x"].value;
    let y = document.forms["forma"]["y"].value;
    let r = document.forms["forma"]["r"].value;

    if (isNaN(x) || x === "") {
        document.getElementById("trouble").innerHTML = "Выберите корректное значение Х";
        return false;
    }

    if (y === "" || isNaN(y) || y>5||y<-3) {
        document.getElementById("trouble").innerHTML = "Выберите корректное значение Y";
        return false;
    }if (y !== "" || !isNaN(y) || y<=5||y>=-3) {
        document.getElementById("trouble").innerHTML = "";
        return true;
    }

    if (isNaN(r) || r === "") {
        document.getElementById("trouble").innerHTML = "Выберите корректное значение R";
        return false;
    }
}

function OnClick2(value, id) {
    document.getElementById("MyEdit2").value = value;
}