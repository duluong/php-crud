<script language = "javascript" type = "text/javascript">

$("#productList").on('click','tr',function(e){
    e.preventDefault();
    var id = $(this).attr('value');
    alert(id);
}); 

</script>