$(function ()
{
$("#cropsearch").keyup(function(){


      var search = $(this).val();

      if(search == ""){
          $("#result").html("No result found");
          return false ;
      }
		$.ajax({
		type: "POST",
		url: "https://www.farmcrowdy.com/farmapp/farmers/croplist",
		data: "crop="+search,

		success: function(data){
			$("#result").show();
			$("#result").html(data);
			$("#cropsearch").css("background","#fefefe");
		},

      error: function(xhr, textStatus, errorThrown) {

    $("#result").html(xhr.status+": "+errorThrown);
 }

		});
	});


  $('#states').change(function(){
    var option = $(this).val();


        if(option == ""){
            $("#showlocal").html("No result found");
            return false ;
        }
  		$.ajax({
  		type: "POST",
  		url: "https://www.farmcrowdy.com/farmapp/farmers/local",
  		data: "local="+option,

  		success: function(data){

  			$("#showlocal").html(data);

  		},

      error: function(xhr, textStatus, errorThrown) {

    $("#showlocal").html(xhr.status+": "+errorThrown);
 }

  		});
  	});

  });
