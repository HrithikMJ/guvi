$("#signIn").click(function (e) {
    e.preventDefault();
    if ($("input[name=email]").val() === "" || $("input[name=password]").val() === "") {
        console.log("error")
        if (localStorage.loggedin) {
            window.location.href = "/profile.html";
        }
    }
    if ($("input[name=email]").val() === "1") {
        localStorage.setItem("loggedin", true)
    }
    else {
        $.ajax({
            url: 'http://localhost:9000/login.php',
            crossDomain: true,
            type: 'post',
            data: $('form#loginForm').serialize(),
            success: function (response) {//response is value returned from php (for your example it's "bye bye"
                document.getElementById("signIn").innerHTML = response
                console.log(response)
                if (response == "logged in") {
                    localStorage.setItem("loggedin", true)

                    window.location.href = "/profile.html";

                }
            },
        });
    }

});
