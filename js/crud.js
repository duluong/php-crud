$("#productList").on('click','tr',function(e){
    e.preventDefault();
    /*var id = $(this).attr('value');*/
    var id = $(this).closest('tr').children('td.id').text();
    var name = $(this).closest('tr').children('td.name').text();
    var description = $(this).closest('tr').children('td.description').text();
    var price = $(this).closest('tr').children('td.price').text();


    $("input#prodId").val(id);
    $("input#prodname").val(name);
    $("input#description").val(description);
    $("input#price").val(price);

    $("input#update").show();
    $("input#delete").show();
}); 
