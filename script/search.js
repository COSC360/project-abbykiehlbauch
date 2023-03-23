function initializeListener(){
    document.getElementById("submitBtn").addEventListener("click",function(e){
        var field = document.getElementById("new-price");
        if(field.value == "")
        {
            e.preventDefault();
            alert("Please enter a price");
        }
        else{
            submitPrice(field.value);
        }
    });

    document.getElementById("trackBtn").addEventListener("click",function(e){
        var field = document.getElementById("target-price");
        if(field.value == "")
        {
            e.preventDefault();
            alert("Please enter a price");
        }
        else{
            trackPrice(field.value);
        }
    });
}

function submitPrice(itemPrice){
    $.ajax({url: "userBackend/logprice.php", type: 'POST', data:{newprice: itemPrice}, success: function(response){
            alert("Thank you for updating this item's price!");
        }
    });
}

function trackPrice(itemPrice){
    $.ajax({url: "userBackend/trackprice.php", type: 'POST', data:{trackprice: itemPrice}, success: function(response){
        alert("You are now tracking this item! Go to your profile to see all of your tracked items.");
    }
});
}