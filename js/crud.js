$("#productList").on('click','tr',function(e){
    e.preventDefault();
    /*var id = $(this).attr('value');*/
    var id = $(this).closest('tr').children('td.name').text();

    alert(id);

}); 
