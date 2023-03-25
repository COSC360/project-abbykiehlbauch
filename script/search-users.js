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
            console.log(username);
        }
    };
    xmlhttp.open("GET", "adminBackend/moreinfo.php?q="+username);
    xmlhttp.send();
}

function deleteComment(username, date){
    $.ajax({url: "adminBackend/deleteComment.php", type: 'POST', data:{user: username, date:date}, success: function(response){
        alert("This comment has been deleted");
        $(".activity").load(location.href + " .activity");
        }
    });
}
function deleteUser(username){
    $.ajax({url: "adminBackend/deleteUser.php", type: 'POST', data:{user: username}, success: function(response){
        alert("This user has been deleted");
        $("#main").load(location.href + " #main");
        }
    });
}