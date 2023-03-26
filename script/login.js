window.addEventListener("load", function(){
    document.getElementById("login").addEventListener("submit", function(e){
        var email = document.getElementById("email");
        const emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if(!email.value.match(emailRegex))
        {
            e.preventDefault();
        }else if(document.getElementById("password").value == "")
        {
            e.preventDefault();
            alert("Please enter a password");
        }
    });
    document.getElementById("switch").addEventListener("click", function(e){
        console.log(window.location.pathname)
        if(window.location.pathname == "/abbyk02/project-abbykiehlbauch/adminLogin.php")
            window.location.assign("login.php");
        else if(window.location.pathname == "/abbyk02/project-abbykiehlbauch/login.php")
            window.location.assign("adminLogin.php");
    });
});

