function addCart(id){
    $.ajax({
        url: '/addcart/'+id,
        type: 'GET',

    }).done(function(response){
        console.log(response);
        location.reload();
        $('#change-item-cart').empty();
        $('#change-item-cart').html(response);
        alertify.success('Add thanh cong');
        
        // console.log(id);

    });

    
} 
function DeleteItemCart(id){
    $.ajax({
        url: '/deleteitemcart/'+id,
        type: 'GET',

    }).done(function(response){
        console.log(response);
        location.reload();
        $('#list-cart').empty();
        $('#list-cart').html(response);
        // alertify.success('Add thanh cong');
        
        // console.log(id);

    });
}
function UpdateItemCart(id){
    $.ajax({
        url: '/listcart/'+id,
        type: 'GET',

    }).done(function(response){
        // console.log(response);
        location.reload();
        $("#count-cart").text($("#c-cart").val());
        // $('#list-cart').empty();
        // $('#list-cart').html(response);
        // alertify.success('Add thanh cong');
        
        // console.log(id);

    });
}
$('#change-item-cart').on("click",".order-close i",function(){
    $.ajax({
        url: '/deletecart/'+$(this).data("id"),
        type: 'GET',

    }).done(function(response){
        console.log(response);
        location.reload();
        $('#change-item-cart').empty();
        $('#change-item-cart').html(response);
        $("#count-cart").text($("#c-cart").val());
        alertify.success('Xoa thanh cong');
        
        // console.log(id);

    });
});