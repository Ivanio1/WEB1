function validate() {
    let x = document.forms["input-form"]["xval"].value;
    let y = document.forms["input-form"]["yval"].value;
    let r = document.forms["input-form"]["rval"].value;

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


$(function () {
    $('#input-form').on('submit', function (event) {
        event.preventDefault();
        $.ajax({
            url: 'check.php',
            method: 'GET',
            data: $(this).serialize() + '&timezone=' + new Date().getTimezoneOffset(),
            dataType: "json",
            beforeSend: function () {
                $('.button').attr('disabled', 'disabled');
            },
            success: function (data) {
                $('.button').attr('disabled', false);
                if (data.validate) {
                    newRow = '<tr>';
                    newRow += '<td>' + data.xval + '</td>';
                    newRow += '<td>' + data.yval + '</td>';
                    newRow += '<td>' + data.rval + '</td>';
                    newRow += '<td>' + data.curtime + '</td>';
                    newRow += '<td>' + data.exectime + '</td>';
                    newRow += '<td>' + data.hitres + '</td>';
                    $('#result-table').append(newRow);

                }
            }
        });
    });
});