$(document).ready(function () {
    if (localStorage.loggedin) {
        window.location.href = "/profile.html";
    }
    $("#signIn").click(function (e) {
        e.preventDefault();
        if ($("input[name=email]").val() === "" || $("input[name=password]").val() === "") {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Please enter a valid Email and Password!',
            })
        }

        else {
            $.ajax({
                url: 'http://localhost:9000/login.php',
                crossDomain: true,
                type: 'post',
                data: $('form#loginForm').serialize(),
                success: function (response) {//response is value returned from php (for your example it's "bye bye"
                    resp = JSON.parse(response)
                    // document.getElementById("signIn").innerHTML = response
                    console.log(resp)
                    if (resp["loggedin"]) {
                        localStorage.setItem("loggedin", true);
                        localStorage.setItem("email", resp["email"]);
                        Swal.fire({
                            icon: 'success',
                            title: 'Login Successfull!',
                            showConfirmButton: true,
                            timer: 1500
                        }).then(() => { window.location.href = "/profile.html" })



                    }
                },
            });
        }

    });
})
