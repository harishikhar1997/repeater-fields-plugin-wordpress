    jQuery(document).ready(function( $ ){
        $( '#add-row' ).on('click', function() {
            var row = $( '.empty-row.screen-reader-text' ).clone(true);
            row.removeClass( 'empty-row screen-reader-text' );
            row.insertBefore( '#repeatable-fieldset-one tbody>tr:last' );
            return false;
        });

        

        $( '.remove-row' ).on('click', function() {
            $(this).parents('tr').remove();
            return false;
        });
    });

    function remove(index){
        
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this Field!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
    if (willDelete) {
        jQuery.ajax({
        type : 'post',
        url : ajaxloadpostajax.ajaxurl,
        data : {'index' : index,'action' : 'my_action_callback'},
        success : function(res){
           // alert(res); 
            swal("Field Removed!", "Your Field is removed permanently!", "success");
            console.log(res);
            }
        }); 


    } else {
        swal("Warning", "Field is not removed!", "error"); 
    }
    });
 }



function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
//document.getElementById("defaultOpen").click();