function deleteTrack(productId){
    $.ajax({url: "./userBackend/deleteTrack.php", type: 'POST', data:{product: productId}, success: function(response){
        alert("This tracked item has been removed");
        window.location.reload();
        }
    });
}