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
    document.getElementById("comment").addEventListener("click",function(e){
        var field = document.getElementById("comment-text");
        if(field.value == "")
        {
            e.preventDefault();
            alert("Please write a comment!");
        }
        else{
            writeComment(field.value);
        }
    });
}

function submitPrice(itemPrice){
    $.ajax({url: "userBackend/logprice.php", type: 'POST', data:{newprice: itemPrice}, success: function(response){
            alert("Thank you for updating this item's price!");
            document.getElementById("priceLog").reset();
            document.getElementById("see-more").click();
        }
    });
}

function trackPrice(itemPrice){
    $.ajax({url: "userBackend/trackprice.php", type: 'POST', data:{trackprice: itemPrice}, success: function(response){
        alert("You are now tracking this item! Go to your profile to see all of your tracked items.");
    }
});
}

function writeComment(field){
    $.ajax({url: "userBackend/insertComment.php", type: 'POST', data:{comment: field}, success: function(response){
        alert("Your comment has been published.");
        document.getElementById("write-comment").reset();
        document.getElementById("see-more").click();


    }
});
}

function deleteItem(productId){
    $.ajax({url: "adminBackend/deleteItem.php", type: 'POST', data:{product: productId}, success: function(response){
        alert("This item has been deleted");
        $("#main").load(location.href + " #main");
        }
    });
}