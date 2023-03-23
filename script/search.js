function initializeListener(){
    document.getElementById("submitBtn").addEventListener("click",function(e){
        console.log("hi");
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
}

function submitPrice(itemPrice){
    console.log(itemPrice);
    $.ajax({url: "userBackend/logprice.php", type: 'POST', data:{newprice: itemPrice}, success: function(response){
            alert("Thank you for updating this item's price!");
        }
    });
}