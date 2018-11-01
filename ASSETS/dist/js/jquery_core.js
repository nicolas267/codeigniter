  $(document).ready(function() {
    $(".editar").click(function(e) {
     var user = e.target.accessKey;
     
      $(window.location).attr('href','edit?usersId='+user+''); 

    })

    $(".borrar").click(function(e){
      var user = e.target.accessKey;

      $(window.location).attr('href','destroy?usersId='+user+'');

    })
  
   function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("input[name=userfile]").change(function () {
        readURL(this);
    }

    );

$("#formulario_ajax").submit(function(e)
{
  e.preventDefault();
  $.ajax(
  {
   url: $(this).attr("action"),
             type:"post",
             data:new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
              success: function(data){
                  $(".loader").show('slow');
           }
     });
   });
})
