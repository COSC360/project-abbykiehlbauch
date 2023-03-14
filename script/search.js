window.addEventListener("load", function(){
    /*document.getElementById("see-more").addEventListener("click", function(e){
        var moreInfo = document.getElementById("more-info");
        moreInfo.style.visibility = "visible";
    });*/
    this.document.getElementById("search_bar").addEventListener("submit", function (e){
        var str = document.getElementById("searchbar").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                document.getElementById("results").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getSearch.php?q="+str);
        xmlhttp.send();
    });
});