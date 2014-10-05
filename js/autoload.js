
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

function topOfPage()
{
	if($(window).offset().top < 20)
		return true;
	else
		return false;
}

function bottomOfPage()
{
	if(($(window).offset().top + $(window).height()) > ($(document).height() - 20))
		return true;
	else
		return false;
}

/*
$(document).ready(function(){
	console.log($(window));
	console.log($(window).offset());
	$(window).scroll(function(){
		
		if(topOfPage())
			console.log("Top of the page");
		else if(bottomOfPage())
			console.log("Bottom of the page");

	});

});
*/