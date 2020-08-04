$(document).ready(function() {
    $('#logout_btn').click(function() {
        var url = '/logout';
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       $.ajax({
          url: url,
          type: 'POST',
          success: function(res) {
              window.location.href = '/login';
          },
          error: function (err){
              alert("Error : " + err);
          },
       });
    });
});
