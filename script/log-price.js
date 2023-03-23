/*window.addEventListener("load", function(){
    document.getElementById("priceLog").addEventListener("submit", function(e){
        console.log("hi");
        var field = document.getElementById("new-price");
        if(field.value == "")
        {
            e.preventDefault();
            alert("Please enter a price");
        }
        else{
            submitPrice();
        }
    });
});

function submitPrice(){
    $.ajax({url: "userBackend/logprice.php", type: 'POST', data: $('#new-price').value(), success: function(response){
            alert("Thank you for updating this item's price!");
        }
    });
}*/