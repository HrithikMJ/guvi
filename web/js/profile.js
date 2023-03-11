$(document).ready(function () {
    if (!localStorage.loggedin) {
        // alert("hi")
        window.history.back()
    }
    $("#logout").click(function (e) {
        localStorage.clear();
        window.history.back()

    })
}) 