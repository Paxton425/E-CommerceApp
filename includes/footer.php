    <footer class="text-center col-md-12" id="footer">&copy; Copyright 2020-2022 Digital Veritas Shop</footer>
  </div>
</div>
<script>
function detailsmodal(id){
  var data = {"id" : id};
  $.ajax({
    url : '/../details-modal.php',
    method : "post",
    data : data,
    success : function(data){
      $('body').append(data);
      $('#details-'+id).modal('toggle');
    },
    error : function(){
      alert("Something went wrong.");
    }
  });
}

function update_cart(mode,edit_id,edit_size){
   var data = {"mode" : mode, "edit_id" : edit_id, "edit_size" : edit_size};
   jQuery.ajax({
     url : '/../Admin/parsers/update_cart.php',
     method : "post",
     data : data,
     success : function(){location.reload();},
     error : function(){alert("Something went wrong.");},
   });
 }

 function add_to_cart(){
  jQuery('#modal_errors').html("");
  var size = jQuery('#size').val();
  var quantity = jQuery('#quantity').val();
  var available = jQuery('#available').val();
  var error = '';
  var data = jQuery('#add_product_form').serialize();
  if(size == '' || quantity == '' || quantity == 0){
    error += '<p class="text-danger text-center">You must choose a size and quantity.</p>';
    jQuery('#modal_errors').html(error);
    return;
  }else if(quantity > available){
    error += '<p class="text-danger text-center">There are only '+available+' available.</p>';
    jQuery('#modal_errors').html(error);
    return;
  }else{
    jQuery.ajax({
      url : '/../Admin/parsers/add_cart.php',
      method : 'post',
      data : data,
      success : function(){
        alert("Added to cart");
        location.reload();
      },
      error : function(){alert("Something went wrong");}
    });
  }
 }
</script>
