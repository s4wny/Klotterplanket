

$(document).ready(function(){
	
	$("#filter").on('keyup', function(){
		$.ajax({
			url:"backend/ajax/getUserID.php",
			type:"get",
			data:{
				username:$(this).val()
			},
			success:function(names){
				if (names.length > 0) {
					console.log(names);
					$(".sugg").html("");
					for (var key in names) {
						$("<a href='index.php?filter=" + names[key]['ID'] + "'>" + names[key]['user_name'] + "</a>").appendTo($(".sugg"));
					}
					
				}
			}
		});
	});
});
