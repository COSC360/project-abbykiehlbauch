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
});