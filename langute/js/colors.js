$(document).ready(function(){
	
		
	$(".color1" ).click(function(){
		$("#colors" ).attr("href", "css/color/color1.css" );
		return false;
	});
	
		
	$(".color2" ).click(function(){
		$("#colors" ).attr("href", "css/color/color2.css" );
		return false;
	});
	
	$(".color3" ).click(function(){
		$("#colors" ).attr("href", "css/color/color3.css" );
		return false;
	});
	
	$(".color4" ).click(function(){
		$("#colors" ).attr("href", "css/color/color4.css" );
		return false;
	});
		
	$(".color5" ).click(function(){
		$("#colors" ).attr("href", "css/color/color5.css" );
		return false;
	});
	
	$(".color6" ).click(function(){
		$("#colors" ).attr("href", "css/color/color6.css" );
		return false;
	});
	
	$(".color7" ).click(function(){
		$("#colors" ).attr("href", "css/color/color7.css" );
		return false;
	});
	
	$(".color8" ).click(function(){
		$("#colors" ).attr("href", "css/color/color8.css" );
		return false;
	});
	
	$('.icon').click (function(event){
		event.preventDefault();
		if( $ (this).hasClass('inOut')  ){
			$('.eduland-color').stop().animate({right:'0px'},500 );
		} else{
			$('.eduland-color').stop().animate({right:'-200px'},500 );
		} 
		$(this).toggleClass('inOut');
		return false;

	}  );

	
	
	
	
} );
