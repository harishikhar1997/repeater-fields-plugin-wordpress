<?php

 //////////////////////Add New Form Ajax request //////////////////////////////////////////

$("#submit_add_new_form").on("click",function(e){
var $textarea = $('.insert-here').val();
var url = my_plugin_ajax.ajax_url;
$('#addNewEditor').submit(function(e){
e.preventDefault();
    $.ajax({
    type: 'POST',  
    url: url, 
    data: $(this).serialize(), 
    success: function(data) {
        var response = jQuery.parseJSON(data);        
                if(response.status == '1'){
                //alert('success');
                          jQuery(".succes-message").text(response.message); 
                }else if(response.status == '0'){
                         jQuery(".succes_message").html(response.message);
                } 
                } 
    });
        });

    });

    //////////////////////Add New Form Ajax request Ends //////////////////////////////////////////



a:25:{i:0;a:3:{s:5:"title";s:12:"facebook url";s:3:"des";s:0:"";s:6:"select";s:4:"text";}i:1;a:3:{s:5:"title";s:12:"facebook url";s:3:"des";s:0:"";s:6:"select";s:4:"text";}i:2;a:3:{s:5:"title";s:3:"das";s:3:"des";s:0:"";s:6:"select";s:4:"text";}i:3;a:3:{s:5:"title";s:12:"facebook url";s:3:"des";s:0:"";s:6:"select";s:4:"text";}i:4;a:3:{s:5:"title";s:12:"facebook url";s:3:"des";s:0:"";s:6:"select";s:4:"text";}i:5;a:3:{s:5:"title";s:2:"aa";s:3:"des";s:0:"";s:6:"select";s:4:"text";}i:6;a:3:{s:5:"title";s:12:"facebook url";s:3:"des";s:0:"";s:6:"select";s:4:"text";}i:7;a:3:{s:5:"title";s:12:"facebook url";s:3:"des";s:0:"";s:6:"select";s:4:"text";}i:8;a:3:{s:5:"title";s:12:"facebook url";s:3:"des";s:0:"";s:6:"select";s:4:"text";}i:9;a:3:{s:5:"title";s:3:"das";s:3:"des";s:0:"";s:6:"select";s:4:"text";}i:10;a:3:{s:5:"title";s:12:"facebook url";s:3:"des";s:0:"";s:6:"select";s:8:"textarea";}i:11;a:3:{s:5:"title";s:12:"facebook url";s:3:"des";s:0:"";s:6:"select";s:4:"text";}i:12;a:3:{s:5:"title";s:3:"aas";s:3:"des";s:0:"";s:6:"select";s:8:"textarea";}i:13;a:3:{s:5:"title";s:12:"facebook url";s:3:"des";s:0:"";s:6:"select";s:4:"text";}i:14;a:3:{s:5:"title";s:4:"hari";s:3:"des";s:0:"";s:6:"select";s:4:"text";}i:15;a:3:{s:5:"title";s:10:"sdsdharish";s:3:"des";s:0:"";s:6:"select";s:8:"textarea";}i:16;a:3:{s:5:"title";s:11:"tiwtter url";s:3:"des";s:0:"";s:6:"select";s:4:"text";}i:17;a:3:{s:5:"title";s:9:"instagram";s:3:"des";s:0:"";s:6:"select";s:4:"text";}i:18;a:3:{s:5:"title";s:2:"sa";s:3:"des";s:0:"";s:6:"select";s:4:"text";}i:19;a:3:{s:5:"title";s:9:"messenger";s:3:"des";s:0:"";s:6:"select";s:4:"text";}i:20;a:3:{s:5:"title";s:5:"hello";s:3:"des";s:0:"";s:6:"select";s:4:"text";}i:21;a:3:{s:5:"title";s:11:"sasaqqqqqqq";s:3:"des";s:0:"";s:6:"select";s:4:"text";}i:22;a:3:{s:5:"title";s:10:"fgdfbqqqqq";s:3:"des";s:0:"";s:6:"select";s:4:"text";}i:23;a:3:{s:5:"title";s:11:"qqqqqqqqqqq";s:3:"des";s:0:"";s:6:"select";s:4:"text";}i:24;a:3:{s:5:"title";s:5:"asada";s:3:"des";s:0:"";s:6:"select";s:4:"text";}}


a:25:{i:0;s:12:"facebook url";i:1;s:12:"facebook url";i:2;s:3:"das";i:3;s:12:"facebook url";i:4;s:12:"facebook url";i:5;s:2:"aa";i:6;s:12:"facebook url";i:7;s:12:"facebook url";i:8;s:12:"facebook url";i:9;s:3:"das";i:10;s:12:"facebook url";i:11;s:12:"facebook url";i:12;s:3:"aas";i:13;s:12:"facebook url";i:14;s:4:"hari";i:15;s:10:"sdsdharish";i:16;s:11:"tiwtter url";i:17;s:9:"instagram";i:18;s:2:"sa";i:19;s:9:"messenger";i:20;s:5:"hello";i:21;s:11:"sasaqqqqqqq";i:22;s:10:"fgdfbqqqqq";i:23;s:11:"qqqqqqqqqqq";i:24;s:5:"asada";}



a:29:{i:0;s:4:"text";i:1;s:4:"text";i:2;s:4:"text";i:3;s:4:"text";i:4;s:4:"text";i:5;s:4:"text";i:6;s:4:"text";i:7;s:4:"text";i:8;s:4:"text";i:9;s:4:"text";i:10;s:8:"textarea";i:11;s:4:"text";i:12;s:8:"textarea";i:13;s:4:"text";i:14;s:4:"text";i:15;s:8:"textarea";i:16;s:4:"text";i:17;s:4:"text";i:18;s:4:"text";i:19;s:4:"text";i:20;s:4:"text";i:21;s:4:"text";i:22;s:4:"text";i:23;s:4:"text";i:24;s:4:"text";i:25;s:4:"text";i:26;s:8:"textarea";i:27;s:8:"textarea";i:28;s:4:"text";}










a:6:{i:0;s:4:"text";i:1;s:4:"text";i:2;s:8:"textarea";i:3;s:4:"text";i:4;s:8:"textarea";i:5;s:4:"text";}




a:6:{i:0;a:3:{s:5:"title";s:3:"asd";s:3:"des";s:8:"  dfgdfg";s:6:"select";s:4:"text";}i:1;a:3:{s:5:"title";s:3:"asd";s:3:"des";s:10:"   dfgdfg ";s:6:"select";s:4:"text";}i:2;a:3:{s:5:"title";s:12:"facebook url";s:3:"des";s:8:"  fb.com";s:6:"select";s:8:"textarea";}i:3;a:3:{s:5:"title";s:3:"adf";s:3:"des";s:8:"  sdfsdf";s:6:"select";s:4:"text";}i:4;a:3:{s:5:"title";s:4:"Hari";s:3:"des";s:9:"Shikhar  ";s:6:"select";s:8:"textarea";}i:5;a:3:{s:5:"title";s:6:"sharma";s:3:"des";s:11:"sharma ji  ";s:6:"select";s:4:"text";}}





a:6:{i:0;s:8:"  dfgdfg";i:1;s:10:"   dfgdfg ";i:2;s:8:"  fb.com";i:3;s:8:"  sdfsdf";i:4;s:9:"Shikhar  ";i:5;s:11:"sharma ji  ";}






a:6:{i:0;s:3:"asd";i:1;s:3:"asd";i:2;s:12:"facebook url";i:3;s:3:"adf";i:4;s:4:"Hari";i:5;s:6:"sharma";}











a:8:{i:0;s:8:"textarea";i:1;s:4:"text";i:2;s:4:"text";i:3;s:4:"text";i:4;s:8:"textarea";i:5;s:4:"text";i:6;s:8:"textarea";i:7;s:4:"text";}



a:7:{i:0;a:3:{s:5:"title";s:3:"asd";s:3:"des";s:8:"  dfgdfg";s:6:"select";s:8:"textarea";}i:1;a:3:{s:5:"title";s:3:"asd";s:3:"des";s:10:"   dfgdfg ";s:6:"select";s:4:"text";}i:2;a:3:{s:5:"title";s:12:"facebook url";s:3:"des";s:8:"  fb.com";s:6:"select";s:4:"text";}i:3;a:3:{s:5:"title";s:3:"adf";s:3:"des";s:8:"  sdfsdf";s:6:"select";s:4:"text";}i:4;a:3:{s:5:"title";s:4:"Hari";s:3:"des";s:9:"Shikhar  ";s:6:"select";s:8:"textarea";}i:5;a:3:{s:5:"title";s:6:"sharma";s:3:"des";s:11:"sharma ji  ";s:6:"select";s:4:"text";}i:6;a:3:{s:5:"title";s:7:"Heading";s:3:"des";s:21:"Heading Description  ";s:6:"select";s:8:"textarea";}}




a:7:{i:0;s:8:"  dfgdfg";i:1;s:10:"   dfgdfg ";i:2;s:8:"  fb.com";i:3;s:8:"  sdfsdf";i:4;s:9:"Shikhar  ";i:5;s:11:"sharma ji  ";i:6;s:21:"Heading Description  ";}



a:7:{i:0;s:3:"asd";i:1;s:3:"asd";i:2;s:12:"facebook url";i:3;s:3:"adf";i:4;s:4:"Hari";i:5;s:6:"sharma";i:6;s:7:"Heading";}
















a:13:{i:0;s:4:"text";i:1;s:4:"text";i:2;s:4:"text";i:3;s:8:"textarea";i:4;s:4:"text";i:5;s:4:"text";i:6;s:8:"textarea";i:7;s:4:"text";i:8;s:4:"text";i:9;s:4:"text";i:10;s:4:"text";i:11;s:4:"text";i:12;s:4:"text";}




a:5:{i:0;a:3:{s:5:"title";s:6:"sharma";s:3:"des";s:11:"sharma ji  ";s:6:"select";s:4:"text";}i:1;a:3:{s:5:"title";s:3:"das";s:3:"des";s:9:"  dasdasd";s:6:"select";s:4:"text";}i:2;a:3:{s:5:"title";s:11:"Twitter Url";s:3:"des";s:17:"www.twitter.com  ";s:6:"select";s:4:"text";}i:3;a:3:{s:5:"title";s:18:"Youtube Video Link";s:3:"des";s:19:"    www.youtube.com";s:6:"select";s:8:"textarea";}i:4;a:3:{s:5:"title";s:3:"wwe";s:3:"des";s:5:"  eew";s:6:"select";s:4:"text";}}




a:5:{i:0;s:11:"sharma ji  ";i:1;s:9:"  dasdasd";i:2;s:17:"www.twitter.com  ";i:3;s:19:"    www.youtube.com";i:4;s:5:"  eew";}




a:5:{i:0;s:6:"sharma";i:1;s:3:"das";i:2;s:11:"Twitter Url";i:3;s:18:"Youtube Video Link";i:4;s:3:"wwe";}
























a:5:{i:0;s:8:"textarea";i:1;s:4:"text";i:2;s:5:"image";i:3;s:5:"image";i:4;s:4:"text";}




a:5:{i:0;a:3:{s:5:"title";s:12:"facebook url";s:3:"des";s:240:"www.facebook.com                                                                                                                                                                                                                                ";s:6:"select";s:8:"textarea";}i:1;a:3:{s:5:"title";s:4:"Name";s:3:"des";s:149:"Alia                                                                                                                                                 ";s:6:"select";s:4:"text";}i:2;a:3:{s:5:"title";s:12:"Client Image";s:3:"des";s:77:"http://localhost/Hari/wordpress/wp-content/uploads/2019/04/about-client-2.png";s:6:"select";s:5:"image";}i:3;a:3:{s:5:"title";s:11:"House Image";s:3:"des";s:85:"http://localhost/Hari/wordpress/wp-content/uploads/2019/04/expertise-finance-full.jpg";s:6:"select";s:5:"image";}i:4;a:3:{s:5:"title";s:3:"wwe";s:3:"des";s:12:"  dfasdfasdf";s:6:"select";s:4:"text";}}





a:5:{i:0;s:240:"www.facebook.com                                                                                                                                                                                                                                ";i:1;s:149:"Alia                                                                                                                                                 ";i:2;s:77:"http://localhost/Hari/wordpress/wp-content/uploads/2019/04/about-client-2.png";i:3;s:85:"http://localhost/Hari/wordpress/wp-content/uploads/2019/04/expertise-finance-full.jpg";i:4;s:12:"  dfasdfasdf";}




a:5:{i:0;s:12:"facebook url";i:1;s:4:"Name";i:2;s:12:"Client Image";i:3;s:11:"House Image";i:4;s:3:"wwe";}
































//key
a:4:{i:0;s:10:"hr_name_27";i:1;s:19:"hr_client_image_211";i:2;s:18:"hr_house_image_214";i:3;s:18:"hr_facebook_url_49";}



//select
a:4:{i:0;s:4:"text";i:1;s:5:"image";i:2;s:5:"image";i:3;s:8:"textarea";}



//Main
a:4:{i:0;a:4:{s:5:"title";s:4:"Name";s:3:"des";s:149:"Alia                                                                                                                                                 ";s:6:"select";s:4:"text";s:3:"key";s:10:"hr_name_27";}i:1;a:4:{s:5:"title";s:12:"Client Image";s:3:"des";s:77:"http://localhost/Hari/wordpress/wp-content/uploads/2019/04/about-client-2.png";s:6:"select";s:5:"image";s:3:"key";s:19:"hr_client_image_211";}i:2;a:4:{s:5:"title";s:11:"House Image";s:3:"des";s:85:"http://localhost/Hari/wordpress/wp-content/uploads/2019/04/expertise-finance-full.jpg";s:6:"select";s:5:"image";s:3:"key";s:18:"hr_house_image_214";}i:3;a:4:{s:5:"title";s:12:"facebook url";s:3:"des";s:43:"   www.facebook.com                        ";s:6:"select";s:8:"textarea";s:3:"key";s:18:"hr_facebook_url_49";}}



//Des
a:4:{i:0;s:149:"Alia                                                                                                                                                 ";i:1;s:77:"http://localhost/Hari/wordpress/wp-content/uploads/2019/04/about-client-2.png";i:2;s:85:"http://localhost/Hari/wordpress/wp-content/uploads/2019/04/expertise-finance-full.jpg";i:3;s:43:"   www.facebook.com                        ";}



//Title
a:4:{i:0;s:4:"Name";i:1;s:12:"Client Image";i:2;s:11:"House Image";i:3;s:12:"facebook url";}