function isDecimal(input) {
    var decimalPattern = /^\d+(\.\d+)?$/;
    return decimalPattern.test(input);
  }

  
window.addEventListener("load", function(){
    document.getElementById("submitBtn").addEventListener("click", function(e){
        var fields = document.getElementsByTagName("input");

        console.log(fields);
        var empty = false;
        for(let i = 0; i < fields.length-2; i++){
            if(fields[i].value == "")
            {
                e.preventDefault(); 
                empty = true;
                alert("Please fill out all of the required fields.");
                break;
            }
        }
        if(!isDecimal(document.getElementById("priceid").value)){
            console.log(document.getElementById("priceid").value);
            empty = true;
            alert("Please enter a valid price");
        }

        if(!empty){
            submitForm();
        }
        
    });
});

function submitForm(){
    $.ajax({url: "userBackend/insertItem.php", type: 'POST', data: $('#new-Item').serialize(), success: function(response){
            alert("Thank you for submitting an item!");
            document.getElementById("new-Item").reset();
        }
    });
    }