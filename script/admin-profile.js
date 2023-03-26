window.addEventListener("load", function(){
    document.getElementById("logout").addEventListener("click", function(e){
        window.location.assign("login.php");
    });
    document.getElementById("main-site").addEventListener("click", function(e){
        window.location.assign("search.php");
    });
});