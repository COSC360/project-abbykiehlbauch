window.addEventListener("load", function(){
    document.getElementById("see-more").addEventListener("click", function(e){
        var moreInfo = document.getElementById("more-info");
        moreInfo.style.visibility = "visible";
    });
   
});
function results(){
    var str = document.getElementById("searchbar").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            document.getElementById("results").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "adminBackend/getUserSearch.php?q="+str);
    xmlhttp.send();
    return false;
}
function viewMore(username){
    var moreInfo = document.getElementById("more-info");
    moreInfo.style.visibility = "visible";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            document.getElementById("user-info").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "adminBackend/moreinfo.php?q="+username);
    xmlhttp.send();
}