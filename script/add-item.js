window.addEventListener("load", function(){
    document.getElementById("submitBtn").addEventListener("click", function(e){
        var fields = document.getElementsByTagName("input");
        for(let i = 0; i < fields.length-2; i++){
            if(fields[i].value == "")
            {
                e.preventDefault(); 
            }
        }
        
    });
});
function submitForm(){
    $.ajax({url: "userBackend/insertItem.php", type: 'POST', data: $('#newItem').serialize(), success: function(response){
            alert("Thank you for submitting an item");
        }
    });
    }