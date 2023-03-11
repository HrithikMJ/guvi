
$("#signUp").click(function (e) {
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
            url: 'http://localhost:9000/register.php',
            crossDomain: true,
            type: 'post',
            data: $('form#registerForm').serialize(),
            success: function (response) {//response is value returned from php (for your example it's "bye bye"
                // alert(response);
                if (response === "error" || response === "This email is already taken") {
                    // document.getElementById("signUp").innerHTML = response
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: response,
                    });


                }
                else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Successfully Registered!',
                        showConfirmButton: true,
                        timer: 1500
                    }).then(() => { window.location.href = "/login.html" })
                }
            },
        });
    }

});
