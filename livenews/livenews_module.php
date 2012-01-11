
		
<!-- 		<style type="text/css">
	div.scroller{
		position:relative;
		height:24px;
		width:200px;
		display:block;
		overflow:hidden;
		border:#CCCCCC 1px solid;
	}
	div.scrollingtext{
		position:absolute;
		white-space:nowrap;
		font-family:'Trebuchet MS',Arial;
		font-size:18px;
		font-weight:bold;
		color:#000000;
	}
</style> -->
<!-- <script src="../jquery/jquery-1.7.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../jquery/jquery.marquee.js"></script> -->
<!-- <script type="text/javascript">
   $(function () {
       $('div.caption marquee').marquee();
});
</script> -->

	<link rel="stylesheet" href="livenews/livenews_module.css" />
<!-- <script src="jquery/jquery-1.7.1.min.js" type="text/javascript"></script>   -->

<script type="text/javascript">
var headline_count;
var headline_interval;
var old_headline = 0;
var current_headline = 0;

$(document).ready(function(){
  headline_count = $("div.headline").size();
  $("div.headline:eq("+current_headline+")").css('top','0px')
     .siblings().css('top','210px');
  
  headline_interval = setInterval(headline_rotate,5000); //time in milliseconds
  $('#scrollup').hover(function() {
    clearInterval(headline_interval);
  }, function() {
    headline_interval = setInterval(headline_rotate,5000); //time in milliseconds
    headline_rotate();
  });
});

function headline_rotate() {
  current_headline = (old_headline + 1) % headline_count; 
  $("div.headline:eq(" + old_headline + ")").animate({top: -205},"slow", function() {
    $(this).css('top','210px');
    });
  $("div.headline:eq(" + current_headline + ")").show().animate({top: 0},"slow");  
  old_headline = current_headline;
}

</script>

	




<!-- 
<script type="text/javascript">
$(document).ready(function() {

	$('.scrollingtext').bind('marquee', function() {
		var ob = $(this);
		var tw = ob.width();
		var ww = ob.parent().width();
		ob.css({ up: -tw });
		ob.animate({ left: ww }, 20000, 'linear', function() {
			ob.trigger('marquee');
		});
	}).trigger('marquee');

});
</script>
		 -->
		

		
		    <div id="scrollup" onmousedown="window.location='./acces.php'">
		    	
       <?php

				include("livenews/livenews.php");

				?>  
			
				
    <!--   <div class="headline"> ... </div>  
      <div class="headline"> ... </div>  
      <div class="headline"> ... </div>   -->  
     

    </div>


		
		
		
		
		
		
	<!-- 	
		<div class="scroller">
	<div class="scrollingtext">
		scrolling text scrolling text scrolling text scrolling text scrolling text
	</div>
</div>
		
		<div>
			<marquee behavior="alternate" direction="up" scrollamount="1" scrolldelay="100" style="height:48px;width:100%;border:solid #B4C1D3 1px;background:#FFFDE6;padding:1px;" height="48" width="100%">
				<?php

				include("livenews.php");

				?>
			</marquee>
			<noscript>
				<a href="http://www.editeurjavascript.com/">ajax</a>
			</noscript>
		</div> -->
	
