window.addEventListener("load", function(){
    document.getElementById("logout").addEventListener("click", function(e){
        window.location.assign("login.html");
    });
    document.getElementById("main-site").addEventListener("click", function(e){
        window.location.assign("search.html");
    });
});