$(document).ready(function () {
    if (!localStorage.loggedin) {
        // alert("hi")
        window.history.href = "/";
        return
    }

    $.ajax({
        url: 'http://localhost:9000/profile.php',
        crossDomain: true,
        type: 'post',
        data: { "email": localStorage.getItem("email"), },
        success: function (response) {
            resp = JSON.parse(response)

            document.getElementById("name").value = resp["name"];
            document.getElementById("dob").value = resp["dob"];
            document.getElementById("age").value = resp["age"];
            document.getElementById("phone").value = resp["phone"];

            document.getElementById("em").value = localStorage.getItem("email");


        },
    })
    $("#logout").click(function (e) {
        $.ajax({
            url: 'http://localhost:9000/logout.php',
            crossDomain: true,
            type: 'get',
            success: function (response) {
                if (response === "logged out") {
                    localStorage.clear();
                    Swal.fire({
                        icon: 'success',
                        title: 'Succesfully Logged out !',
                        showConfirmButton: true,
                        timer: 1500
                    }).then(() => { window.location.href = "/login.html" })
                }
            },
        })
    })

    $("#submitEdit").click(function (e) {

        console.log($('form#editProfileForm').serialize())
        $.ajax({
            url: 'http://localhost:9000/edit.php',
            crossDomain: true,
            type: 'post',
            data: $('form#editProfileForm').serialize(),
            success: function (response) {
                if (response) {
                    document.getElementById("editProfileForm").style.display = "none";
                    document.getElementById("submitEdit").style.display = "none";
                    Swal.fire({
                        icon: 'success',
                        title: 'Edit Successfull!',
                        showConfirmButton: true,
                        timer: 1500,
                    }).then(()=>{location.reload()});

                }

            },
        })
    })
})