<!doctype html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>ProgrammeContenu</title>
        <style type="text/css" media="screen">@import "jqtouch/jqtouch.min.css";</style>
        <style type="text/css" media="screen">@import "themes/theme.css";</style>
		<script type="text/javascript" src="jquery/jquery-1.7.1.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
			    $(".tabContent").each(function(i){
			        this.id = "#" + this.id;
			    });
			
			    $(".tabContent:not(:first)").hide();
			    $(".tabContent").not(":first").hide();
			
			    $("#listSites a").click(function() {
			        var idTab = $(this).attr("href");
			        $(".tabContent").hide();
			        $("div[id='" + idTab + "']").fadeIn();
			        return false;
			    });    
			});
		</script>

    </head>
    <body>
		<div id="listSites">
		    <a href="#logicielsLibres">Sites sur les logiciels libres</a><br/>
		    <a href="#sitesInformations">Sites d'information</a>
		</div>
		
		<div class="tabContent" id="logicielsLibres">
		    <strong>Framasoft.net, Planet-libre.org ...</strong>
		</div>
		
		<div class="tabContent" id="sitesInformations">
		    <strong>Smashingmagazine.com, Blog.kryzalid.net ...</strong>
		</div>
	</body>
</html>