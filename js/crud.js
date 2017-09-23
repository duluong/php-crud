$("#productList").on('click','tr',function(e){
    e.preventDefault();
    /*var id = $(this).attr('value');*/
    var id = $(this).closest('tr').children('td.id').text().trim();
    var name = $(this).closest('tr').children('td.name').text().trim();
    var description = $(this).closest('tr').children('td.description').text().trim();
    var price = $(this).closest('tr').children('td.price').text().trim();


    $("input#prodId").val(id);
    $("input#prodName").val(name);
    $("input#description").val(description);
    $("input#price").val(price);

    $("input#update").removeClass('hidden');
    $("input#delete").removeClass('hidden');
}); 
