function setVarsFromUrl(force)
{
	if(window.vals != undefined && window.vals != null && !force)
		return;

	var values = [], vals, url = window.location.href;

	var val = url.slice(url.indexOf('?') + 1).split('&');

	for (var i = val.length - 1; i >= 0; i--) 
	{
		vals = val[i].split('=');
		values.push(vals[0]);
		if(isNaN(parseInt(vals[1])))
			vals[1] = 0;
		values[vals[0]] = parseInt(vals[1]);
	}
	window.vals = values;
}

function Vals(name, value)
{
	if(value == undefined)
		return window.vals[name] || "";
	else
		window.vals[name] = parseInt(value);
}

function startAutoUpdating()
{
	if(window.ajaxUpdateTimer == undefined || window.ajaxUpdateTimer == null)
		window.ajaxUpdateTimer = setInterval(function(){
			if(topOfPage() && !mutex('autoUpdate'))
			{
				var userID = 0,
					length = 1;

				if(vals['filter'] !== undefined)
				{
					userID = Vals("filter");
				}

				if(vals['offset'] !== undefined)
					length = Vals("offset") + Vals("length");
				alert();
				$.ajax({
					url:"scribbles.php",
					type:"get",
					data:{
						length:length,
						filter:userID
					},
					success:function(result){
						var toUpdate = $('.scribble-wrapper').find('ul');
						toUpdate.html(result);
						Vals("length", length);
						Vals("offset", "0");
						setMutex('autoUpdate', 1000);
					}
				});
			}
		}, 5000);
}

function stopAutoUpdating()
{
	clearInterval(window.ajaxUpdateTimer);
	window.ajaxUpdateTimer = null;
}

$(document).ready(function(){
	setVarsFromUrl();
	startAutoUpdating();
	$(window).on('scroll', function(){

		if(bottomOfPage() && !mutex('ajaxLock'))
		{

			setMutex('ajaxLock');
			offset = Vals('offset');
			filter = Vals('filter');
			$.ajax({
				url:"scribbles.php",
				type:"get",
				data:{
					offset:offset,
					filter:filter
				},
				success:function(result){
					var toUpdate = $('.scribble-wrapper').find('ul');
					toUpdate.append(result);
					Vals("length", parseInt(Vals("length")) + 1);
					unlockMutex('ajaxLock');
				}
			});
		}
	});

});


//helper functions
function setMutex(name,time){
	if(name == undefined)
		return;
	clearTimeout(window[name]);
	if(time === undefined)
	{
		window[name] = true;
		return;
	}
	
	window[name] = setTimeout(function(){
		window[name] = null;
	}, time);
}

function unlockMutex(name)
{
	if(name == undefined)
		return;
	clearTimeout(window[name]);
	window[name] = null;
}

function mutex(name)	{ return !(window[name] == null || window[name] == undefined); }
function topOfPage()	{ return ($(window).scrollTop() <= 0); }
function bottomOfPage()	{ return (($(window).scrollTop() + $(window).height()) >= ($(document).height())); }
