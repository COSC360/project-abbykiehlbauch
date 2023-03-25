function results(e){
    var str = e.target.value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            document.getElementById("info").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "adminBackend/getActivity.php?q="+str);
    xmlhttp.send();
    return false;
}