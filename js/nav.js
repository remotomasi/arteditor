/*$(document).ready(function(){
  $("#navLat > li > a").on("click", function(e){
    if($(this).parent().has("ul")) {
      e.preventDefault();
    }
    
    if(!$(this).hasClass("open")) {
      // hide any open menus and remove all other classes
      $("#postSideArt li ul").slideUp(350);
      $("#postSideArt li a").removeClass("open");
      
      // open our new menu and add the open class
      $(this).next("ul").slideDown(350);
      $(this).addClass("open");
    }
    
    else if($(this).hasClass("open")) {
      $(this).removeClass("open");
      $(this).next("ul").slideUp(350);
    }
  });
});*/


$(document).ready(function(){
	$('.postSideArt').hide();	
});

$(function () {
	function runEffect(obj) {
		if (!(obj.is(":visible"))) {
			obj.show('blind', 200);
		}
		else {
			obj.hide('blind', 200);
		}
	};
	
	$('.expandButton').click(function (e) {
		$i = $(this).children("ul").attr('id');
		$cl = $(this).children("ul").attr('class');
		$oggChild = $(this).children("ul#" + $i);
		$oggAll = $(this).nextAll("ul#" + $i);
		$ogg = $("#" + $i);
		runEffect($oggChild);
		runEffect($oggAll);
	});
	
	$(this).click(function (e) {
		e.stopPropagation();
	})
});
