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

        $( '.remove-row1' ).on('click', function() {
            $(this).parents('tr').remove();
            return false;
        });


    // $('#submit').click(function(e){
    //   //alert("Hello");
    //   var formData1 = jQuery('#save-form').serialize();
    //   $.ajax({
    //     type: 'post',
    //     url : ajaxloadpostajax.ajaxurl,
    //     data : {'data' : formData1,'action' : 'title_check'},
    //     success : function(resp){
    //       console.log(resp);
    //     }
    //   });

    // });


    $('.upload_image_button').click(function(e) {
        id1=(this).id;
        //alert(id1);
        // var i;
      
      
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
            //var k=1;
            $('#img'+id1).val(attachment.url);
        });

        //Open the uploader dialog
        custom_uploader.open();
    });


     $('#boxclose').click(function(){
        document.getElementById("#image1").style.display = "none";


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
            //window.location.reload(true);
            //console.log(res);
            setTimeout(function(){location.reload();},2000);
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
    data : {'data' : formData,'action' : 'update_data'},
    success : function(ans){

      //swal("Wonderful!", "Data has been updated", "success");
      // window.location.reload(true);
      setTimeout(function(){location.reload();},2000);
      console.log(ans);
    }
  });

}else{
  swal("Warning", "Data is not Updated!", "error");
}
});
}


function removeRows(){
  // alert("Hello");

  swal({
    title: "Are you sure?",
    text: "Do you want to delete the selected row(s)?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {

    var favorite = [];
  $.each($("input[name='checkbox']:checked"), function(){            
      favorite.push($(this).val());
  });
  var len = favorite.length;
  var jsonString = JSON.stringify(favorite);
  jQuery.ajax({
    type : 'post',
    url : ajaxloadpostajax.ajaxurl,
    data : {'arr' : jsonString,'action' : 'remove_rows'},
    success : function(reply){

      var response = jQuery.parseJSON(reply);

      if(response.code==200)
      {
        swal("Wonderful!", "Selected row(s) have been deleted", "success");
        setTimeout(function(){location.reload();},2000);
      }
      else{
        swal("Warning", "Please select row(s) for mass delete action!", "error");
      }
      //console.log(reply);
    }
  });

}else{
  swal("Warning", "Data is not Deleted", "error");
}
});

  //alert("My favourite sports are: " + favorite.join(";"));
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




