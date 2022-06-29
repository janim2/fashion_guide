function BtnLoading(elem) {
    $(elem).attr("data-original-text", $(elem).html());
    $(elem).prop("disabled", true);
    $(elem).html('<i class="spinner-border spinner-border-sm"></i> Loading...');
 }
 
 function BtnReset(elem) {
    $(elem).prop("disabled", false);
    $(elem).html($(elem).attr("data-original-text"));
 }

 function alert(message, type = 'error'){
    Swal.fire({
        position: 'top-end',
        icon: type == 'error' ? 'error' : 'success',
        title: message,
        showConfirmButton: false,
        timer: 1500,
    })
 }

 function submitFormQuery(context, url, loading_elem, success_message, page){
     $.ajax({
         url: url,
         method: "POST",
         data: new FormData(context),
         // dataType: "json",
         contentType: false,
         cache: false,
         processData: false,
         beforeSend: function(){
             BtnLoading(loading_elem);
         },
         success: function (data) {
             BtnReset(loading_elem);
             alert(data);
             alert(page);
             if (data == 1) {
                 if(page == "register"){
                     Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: success_message,
                        showConfirmButton: false,
                        timer: 1500,
                        }).then((result) => {
                            location.href = 'index.php';
                        });
                 }
                 else if(page == 'login'){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: success_message,
                        showConfirmButton: false,
                        timer: 1500,
                        }).then((result) => {
                            location.href = 'dashboard.php';
                        });
                }
                // else if(page == 'register_sender_id'){
                //     Swal.fire({
                //         position: 'top-end',
                //         icon: 'success',
                //         title: success_message,
                //         showConfirmButton: false,
                //         timer: 1500,
                //         }).then((result) => {
                //             location.href = 'register-sender-id.php';
                //         });
                // }
                 else{
                     Swal.fire({
                         position: 'top-end',
                         icon: 'success',
                         title: success_message,
                         showConfirmButton: false,
                         timer: 1500,
                       }).then((result) => {
                         location.reload();
                     });
                 }
                 // alert(data);
                 
             } else {
                 // alert(data);
                 Swal.fire({
                   position: 'top-end',
                   icon: 'error',
                   title: data,
                   showConfirmButton: false,
                   timer: 1500,
                 });
               }
             }
       });
 }
 
 function submitQuery(url, loading_elem, success_message, isLogOut = false){
     $.ajax({
         url: url,
         method: "POST",
         beforeSend: function(){
             BtnLoading(loading_elem);
         },
         success: function (data) {
             BtnReset(loading_elem);
             if (data == 1) {
                 // alert(data);
                 // alert(isLogOut);
                 if(isLogOut){
                     Swal.fire({
                         position: 'top-end',
                         icon: 'success',
                         title: success_message,
                         showConfirmButton: false,
                         timer: 1500,
                       }).then((result) => {
                           location.href = 'index.php';
                         })
                 }else{
                     Swal.fire({
                         position: 'top-end',
                         icon: 'success',
                         title: success_message,
                         showConfirmButton: false,
                         timer: 1500,
                       });
                 }
                 
             } else {
                 // alert(data);
                 Swal.fire({
                   position: 'top-end',
                   icon: 'error',
                   title: data,
                   showConfirmButton: false,
                   timer: 1500,
                 });
             }
             }
       });
 }
 
 
//  function deleteItemQuery(url, loading_elem, success_message, should_move = false){
//      $.ajax({
//          url: url,
//          method: "POST",
//          beforeSend: function(){
//              BtnLoading(loading_elem);
//          },
//          success: function (data) {
//              BtnReset(loading_elem);
//              if (data == 1) {
//                  if(should_move){
//                      Swal.fire({
//                          position: 'top-end',
//                          icon: 'success',
//                          title: success_message,
//                          showConfirmButton: false,
//                          timer: 1500,
//                          }).then((result) => {
//                              history.back();
//                          })
//                  }
//                  else{
//                      Swal.fire({
//                          position: 'top-end',
//                          icon: 'success',
//                          title: success_message,
//                          showConfirmButton: false,
//                          timer: 1500,
//                          }).then((result) => {
//                              location.reload();
//                          })
//                  }
                 
//              } else {
//                  // alert(data);
//                  Swal.fire({
//                    position: 'top-end',
//                    icon: 'error',
//                    title: data,
//                    showConfirmButton: false,
//                    timer: 1500,
//                  });
//              }
//              }
//        });
//  }
 
//  function FetchItemQuery(url, item_id/*loading_elem,*/){
//      $.ajax({
//          url: url,
//          method: "POST",
//          dataType: "json",
//          data: {
//              'id' : item_id,
//          },
//          // beforeSend: function(){
//          //     BtnLoading(loading_elem);
//          // },
//          success: function (data) {
//              // BtnReset(loading_elem);
//              $('.the_title').html(data['title']);
//              $('.the_description').html(data['content']);
//          }
//        });
//  }