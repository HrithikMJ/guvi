
    $("#signUp").click(function (e) {
        e.preventDefault();
        if ( $("input[name=email]").val()===""){
            console.log("error")
        }
        else{
        $.ajax({
            url: 'http://localhost:9000/register.php',
            crossDomain: true,
            type: 'post',
            data: $('form#registerForm').serialize(),
            success: function (response) {//response is value returned from php (for your example it's "bye bye"
               
                document.getElementById("signUp").innerHTML = response
                console.log(response)
            }, 
        });}

    });
