window.addEventListener("load", function(){
    document.getElementById("newItem").addEventListener("submit", function(e){
        var fields = document.getElementsByTagName("input");
        for(let i = 0; i < fields.length-2; i++){
            if(fields[i].value == "")
            {
                e.preventDefault(); 
            }
        }
    });
});
    