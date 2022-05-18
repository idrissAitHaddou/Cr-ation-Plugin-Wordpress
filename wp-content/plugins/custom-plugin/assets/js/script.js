// this is our script code




(function($) {
    $(document).ready(function() {

        
        $("#frmCheck").submit(function(e){
              e.preventDefault();

              var email = 0;
              var name = 0;
              if( $('#checkEmail').is(':checked') ){
                email = 1;
              }

              if( $('#checkName').is(':checked') ){
                name = 1;
              }

              var postparams = "action=custom_plugin_library&param=saveparams&email="+email+"&name="+name;
              $.ajax({
                type: "POST",
                url: ajaxurl,
                data: postparams,
                success: function(response){
                    console.log(response);
                },
              });
              
        });


            //   if( $('#checkEmail').is(':checked') ){
            //     console.log('checked email');
            //   }else{
            //     console.log('not checked email');
            //   }

            //   if( $('#checkName').is(':checked') ){
            //     console.log('checked name');
            //   }else{
            //     console.log('not checked name');
            //   }

            //   let isCheckedEmail = $('#checkEmail').checked();

            //   var name=$("#textName").val();
            //   var email=$("#textEmail").val();
            //   var postdata = "action=custom_plugin_library&param=savedata&email="+email+"&name="+name;
            //   $.ajax({
            //     type: "POST",
            //     url: ajaxurl,
            //     data: postdata,
            //     success: function(response){
            //         console.log(response);
            //     },
            //   });

            //   $("#textName").val('');
            //   $("#textEmail").val('');



        // $(".btnClick").click(function(){
        //       var post_data = "action=custom_plugin_library&param=get_message";
        //       $.ajax({
        //         type: "POST",
        //         url: ajaxurl,
        //         data: post_data,
        //         success: function(response){
        //             console.log(response);
        //         },
        //       });

        // });

        // $('#frmPost').submit(function(e){
        //     e.preventDefault();
        //     var post_data = $("#frmPost").serialize()+"&action=custom_plugin_library&param=post_from_data";
        //      $.ajax({
        //         type: "POST",
        //         url: ajaxurl,
        //         data: post_data,
        //         success: function(response){
        //             var data = $.parseJSON(response);
        //             console.log("Name: "+data.txtName+"  and Email: "+data.txtEmail);
        //         },
        //       });
        // });


        // $('#frmPostOtherPage').submit(function(e){
        //     e.preventDefault();
        //     var post_data = $("#frmPostOtherPage").serialize()+"&action=custom_ajax_req";
        //      $.ajax({
        //         type: "POST",
        //         url: ajaxurl,
        //         data: post_data,
        //         success: function(response){
        //             var data = $.parseJSON(response);
        //             console.log("Name: "+data.textName+"  and Email: "+data.textEmail);
        //         },
        //       });
        // });


    });
})(jQuery);


