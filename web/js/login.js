$("#signIn").click(function (e) {
    e.preventDefault();
    if ( $("input[name=email]").val()===""){
        console.log("error")
        if(localStorage.loggedin){
        window.location.href = "/profile.html";
    }
    }
    if ( $("input[name=email]").val()==="1"){
        localStorage.setItem("loggedin",true)
    }
    else{
    $.ajax({
        url: 'http://localhost:9000/login.php?f=login',
        crossDomain: true,
        type: 'post',
        data: $('form#registerForm').serialize(),
        success: function (response) {//response is value returned from php (for your example it's "bye bye"
           
            document.getElementById("signUp").innerHTML = response
            console.log(response)
        }, 
    });}

});
