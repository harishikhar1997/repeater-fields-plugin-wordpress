    var imgurl=null;
    var repi=null;
    function addimg(rep){
      repi=rep;//2
      //alert(repi);
    }

    jQuery(document).ready(function( $ ){
        $( '#add-row' ).on('click', function() {
            var row = $( '.empty-row.screen-reader-text' ).clone(true);
            row.removeClass( 'empty-row screen-reader-text' );
            row.insertBefore( '#repeatable-fieldset-one tbody>tr:last' );
            return false;
        });

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();

        $( '.remove-row' ).on('click', function() {
            $(this).parents('tr').remove();
            return false;
        });


      // var i;
      // var rep1=repi-1;//1
      // for(i=rep1;i>=0;i--)
      // {
    

    $('.upload_image_button').click(function(e) {
        id1=this.id;
        alert(id1);
        var i;
      
      
        var custom_uploader;
        e.preventDefault();
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }

        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Select Image'
            },
            multiple: false
        });

        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            console.log(custom_uploader.state().get('selection').toJSON());
            attachment = custom_uploader.state().get('selection').first().toJSON();
            //$('.upload_image').val(attachment.url);
            //document.getElementById('image1').src = attachment.url;
            imgurl=attachment.url;
        });

        //Open the uploader dialog
        custom_uploader.open();
      
    

    });

//}
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
        swal("Warning", "Field is not removed!Refresh the page to get it back", "error"); 
    }
    });
 }

//  setInterval(function(){
//    updateData()
// },1000);

 function updateData()
 {
    //alert(imgurl);

    swal({
    title: "Are you sure?",
    text: "Do you want to update the data?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
  var formData = jQuery('#update-form').serialize();
  jQuery.ajax({
    type : 'post',
    url : ajaxloadpostajax.ajaxurl,
    data : {'data' : formData,'imgurl' : imgurl,'action' : 'update_data'},
    success : function(ans){

      swal("Wonderful!", "Data has been updated", "success");
      console.log(ans);
    }
  });

}else{
  swal("Warning", "Data is not Updated!", "error");
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




