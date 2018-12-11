$(function(){
	//For user Registration
 $("#registersubm").click(function(){
        var name     = $("#name").val();
        var userName = $("#userName").val();
        var password = $("#password").val();
        var email    = $("#email").val();
        var dataString = 'name='+name+'&userName='+userName+'&password='+password+'&email='+email;
        $.ajax({
          type:"POST",
          url:"getregister.php",
          data:dataString,
          success:function(data){
          	$("#state").html(data);
          }
        });
        return false;
 });

 $("#loginsubm").click(function(){
     var email      = $("#email").val();
     var password   = $("#password").val();
     var dataString = 'email='+email+'&password='+password;
     $.ajax({
        type:"POST",
        url:"getlogin.php",
        data:dataString,
        success:function(data){
        	if ($.trim(data) == "empty") {
               $(".empty").show();
               setTimeout(function(){
                $(".empty").fadeOut();
               },20000);
        	} else if($.trim(data) == "disable"){
               $(".disable").show();
               setTimeout(function(){
                  $(".disable").fadeOut();
               },20000);
        	} else if($.trim(data) == "error"){
               $(".error").show();
               setTimeout(function(){
                $(".error").fadeOut();
               },20000);
        	}else{
                window.location = "exam.php";
        	}
        }
     });
     return false;
 });
});