
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
				file = 'show_all_scribbles.php',
				offset = 0,
				length = 1;

			if(vals['filter'] !== undefined)
			{
				file = 'filter.php'
				userID = vals['filter'];
			}

			if(vals['offset'] !== undefined)
				length = vals['offset'];

			$.ajax({
				url:file,
				type:"get",
				data:{
					'length':length,
					'userID':userID
				},
				success: function(resp){
					
				},
				error: function(err){
					
				}
			});
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

	$(window).on('scroll', function(){
		
		if(topOfPage())
			console.log("Top of the page");
		else if(bottomOfPage())
			console.log("Bottom of the page");

	});

});
