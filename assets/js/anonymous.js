$(document).ready(function (){

  // Login
$("#anonymousLogin").submit(function (e) {
  e.preventDefault();
  $('#anonymousProcess').attr("hidden", false);
  $('#anonymousProcess').html('Verifying your account...');
   $.ajax({
        type:"POST",
        url: 'controller/login.php',     //
        data: $(this).serialize(),
        success: function(data){
         // $('#anonymousProcess').html(data);
          if (data=='yes') {
             $('#anonymousProcess').html('<p class="alert alert-success">Account Verification completed. Login successful. Redirecting...</p>');
             window.location='dashboard.html';
          } else {
            $('#anonymousProcess').html('<p class="alert alert-danger">Login Failed. Try again or create account if you do not have one</p>');
          }
         },
         error: function(xhr, ajaxOptions, thrownError){
          $('#anonymousProcess').html(ajaxOptions+'! Failed. Try again. Message: '+thrownError);
         }
    });

});

// Register
$("#anonymousRegister").submit(function (e) {
  e.preventDefault();
  $('#anonymousProcess').attr("hidden", false);
  $('#anonymousProcess').html('Creating new account, please wait...');
   $.ajax({
        type:"POST",
        url: 'controller/register.php',     //
        data: $(this).serialize(),
        success: function(data){

         // $('#anonymousProcess').html(data);
          if (data=='registration is successful') {
             $('#anonymousProcess').html('<p class="alert alert-success">New account created successfully, you can now login</p>');
              $("#anonymousRegister").trigger('reset');
              setTimeout(function() { window.location='index.html'; }, 4000);
          } else {
            $('#anonymousProcess').html('<p class="alert alert-danger">failed to create account. Try a different Nickname/ Email</p>');
          }
         },
         error: function(xhr, ajaxOptions, thrownError){
          $('#anonymousProcess').html(ajaxOptions+'! Registration failed. Try again. Message: '+thrownError);
         }
    });

});

// New Message
$("#anonymousNewMessage").submit(function (e) {
  e.preventDefault();
  $('#anonymousProcess').attr("hidden", false);
  $('#anonymousProcess').html('Sending message. please wait...');
   $.ajax({
        type:"POST",
        url: 'controller/save_comments.php',     //
        data: $(this).serialize(),
        success: function(data){
         // $('#anonymousProcess').html(data);
          if (data=='comments successfully saved') {
             $('#anonymousProcess').html('<p class="alert alert-success">Message sent</p>');
             $("#anonymousNewMessage").trigger('reset');
          } else {
            $('#anonymousProcess').html('<p class="alert alert-danger">Failed to send. Try again</p>');
          }
         },
         error: function(xhr, ajaxOptions, thrownError){
          $('#anonymousProcess').html(ajaxOptions+'! failed. Try again. Message: '+thrownError);
         }
    });


});


// verify same password
    var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirmPassword");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;


// Change Password
$("#anonymousPassword").submit(function (e) {
  e.preventDefault();
  $('#anonymousProcess').attr("hidden", false);
  $('#anonymousProcess').html('Processing please wait...');
   $.ajax({
        type:"POST",
        url: 'controller/change_password.php',     //
        data: $(this).serialize(),
        success: function(data){

         // $('#anonymousProcess').html(data);
          if (data=='Password change is successful') {
             $('#anonymousProcess').html('<p class="alert alert-success">Password change is successful</p>');
              $("#anonymousPassword").trigger('reset');

          } else {
            $('#anonymousProcess').html('<p class="alert alert-danger">'+data+'</p>');
          }
         },
         error: function(xhr, ajaxOptions, thrownError){
          $('#anonymousProcess').html(ajaxOptions+'! Failed. Try again. Message: '+thrownError);
         }
    });

});


}); // document load


//GET ULR PARAMETER

// https://stackoverflow.com/questions/19491336/how-to-get-url-parameter-using-jquery-or-plain-javascript
var anonymousURL = function anonymousURL(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};



// fetch Login details
           function fetchLoginDetails() {

             $.ajax({
              url: 'controller/fetch_login.php',

              //success
               success: function(data){

          data=JSON.parse(data);
          $.each(data, function(i, fetchAll){
            var fetchData= data[i];

        $('#displayUsername').html(fetchData.nickname);
        $('#displayEmail').html(fetchData.email);
        var newURL = 'https://anon.hwcalc.ga/new.html?user='+fetchData.nickname+'&ref='+fetchData.id;
        var newURLTwo = 'https://anon.hwcalc.ga/new.html?user='+fetchData.nickname+'%26ref='+fetchData.id;
        $('#displayURL').val(newURL);

        //socialmedia sharing
         $('#whatsapp').attr("href", 'whatsapp://send?text='+encodeURI('Click and Send any message to me and i will not know it was you ')+newURLTwo);
          $('#twitter').attr("href", 'https://twitter.com/share?url='+encodeURI('Click and Send any message to me and i will not know it was you ')+newURLTwo);
          $('#facebook').attr("href", 'https://www.facebook.com/sharer/sharer.php?=&text ='+encodeURI('Click and Send any message to me and i will not know it was you')+newURLTwo);
          });
          //console.log(data);

        //$('#displayURL').html(data.url);

             }

           });

}

// fetch Messages
           function fetchData() {
            $('#displayMessages').html('<div class="alert alert-info">Loading messages...</div>');
            $('#messages').click();
             $.ajax({
              url: 'controller/fetch_comments.php',

              //success
               success: function(data){

         if (data=='please login') {
          window.location='./';
          console.log(data);
         }
         else{

          var $fetch ='';
          var component ='';


          //https://stackoverflow.com/questions/3710204/how-to-check-if-a-string-is-a-valid-json-string-in-javascript-without-using-try/3710226
          if (/^[\],:{}\s]*$/.test(data.replace(/\\["\\\/bfnrtu]/g, '@').
replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').
replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {
            data=JSON.parse(data);
          console.log(data);

           $.each(data, function(i, fetchAll){
            var fetchData= data[i];

  $fetch += '<div class="row"> <div class="pull-left alert col-md-2"><img src="assets/img/anon.jpg" style=" width: 50px; height: 50px;  border-radius:50%; box-shadow: 0 3px 2px rgba(0, 0, 0, 0.3); border: 5px solid #2c2c2c;"></div><div class="alert col-md-7" style="margin-left:0px; color:#2c2c2c;">' +fetchData.description
         +'</div> <div class="col-md-3 alert pull-right"><span style="color: black;" class="fa fa-clock"></span><br><text style="color: black; font-size:10px;"> ';
         $fetch+=fetchData.date_created+'</text></div></div>';

        });

          } else {

            $fetch +='<div class="alert alert-danger">No anonymous messages received yet.</div>';
          console.log(fetch);
          $('#displayMessages').html($fetch)
         }

        $('#displayMessages').html($fetch);
             }

           }

           });

}

//copy
function myCopy() {
     var copyText = document.getElementById("displayURL");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied");
      }
