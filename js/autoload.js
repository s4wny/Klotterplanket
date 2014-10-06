
function getUrlVars()
{
	var values = [], vals, url = window.location.href;

	var val = url.slice(url.indexOf('?') + 1).split('&');

	for (var i = val.length - 1; i >= 0; i--) 
	{
		vals = val[i].split('=');
		values.push(vals[0]);
		values[vals[0]] = vals[1];
	}
	return values;
}

function startAutoUpdating()
{
	window.ajaxUpdateTimer = setInterval(function(){

		if(topOfPage())
		{

			var vals = getUrlVars(),
				userID = 0,
				length = 1;

			if(vals['filter'] !== undefined)
			{
				userID = vals['filter'];
			}

			if(vals['offset'] !== undefined)
				length = vals['offset'];

			$.ajax({
				url:"scribbles.php",
				type:"get",
				data:{
					length:length,
					userID:userID
				},
				success:function(result){
			    	console.log(result);
				}
			});

			/*$.ajax({
				url:'scribbles.php',
				type:"get",
				data:{
					'length':length,
					'userID':userID
				}
			}).done(function(){
				var toUpdate = $('.scribble-wrapper').find('ul');
				console.log(resp);
			});*/

			alert();
		}
	}, 2000);
}

function topOfPage()
{
	if($(window).scrollTop() < 20)
		return true;
	else
		return false;
}

function bottomOfPage()
{
	if(($(window).scrollTop() + $(window).height()) > ($(document).height() - 20))
		return true;
	else
		return false;
}


$(document).ready(function(){

	startAutoUpdating();
	$(window).on('scroll', function(){
		
		if(topOfPage())
			console.log("Top of the page");
		else if(bottomOfPage())
			console.log("Bottom of the page");

	});

});
