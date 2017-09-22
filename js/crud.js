$("#productList").on('click','tr',function(e){
    e.preventDefault();
    var id = $(this).attr('value');
    $(this).closest('tr').children('td.name').text();

    alert(id);

s}); 
