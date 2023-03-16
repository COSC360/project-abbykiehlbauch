/*window.addEventListener("load", function(){
    document.getElementById("log-price-form").addEventListener("submit", function(e){
        var moreInfo = document.getElementById("more-info");
        moreInfo.style.visibility = "visible";
    });
});*/
window.addEventListener("load", function(){
    document.getElementById("priceLog").addEventListener("submit", function(e){
        console.log("hi");
        var fields = document.getElementsByTagName("priceLog input");
        for(let i = 0; i < fields.length; i++){
            if(fields[i].value == "")
            {
                e.preventDefault();
            }
        }
    });
});