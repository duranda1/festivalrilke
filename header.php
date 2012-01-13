
<!--  Méthode de remplissage du texte selon la langue choisie -->
    <script type="text/javascript" language="javascript">
    
    function loadLanguageText() {
  
        $(function () {
        	// the language is recovered from the cookie (if the user previously choosed the language)
        	var language = getCookie();
        	//if the language has not been choosed by the user, the site will look the default language of the browser
        	if((language != "fr") && (language != "de")) {
            	language = '<?PHP echo substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);?>';
            }
            //if the language is neither "fr" nor "de", the site is put in "fr" by default
            if((language != "fr") && (language != "de")) {
            	language = "fr";
            }
                       
            $.ajax({
                url: 'languages.xml',
                success: function(xml) {
                    $(xml).find('translation').each(function(){
                        var id = $(this).attr('id');
                        var text = $(this).find(language).text();
                        $("." + id).html(text);
                    });
                }
            }); 
             
             $.ajax({
                       type: "POST",
                      url: "livenews/livenews_module.php",
                      data: ({"locale": language}),
                      cache: false,
                      dataType: "text",
                       success: function(data) {
                 			  $("#module").html(data);
                    }
             }); 
    	});
    }
    </script>
   
    <!-- Méthode qui change la langue dans le cookie et sur le site -->
    <script type="text/javascript" language="javascript">
        function setLanguage(value) {
        	if(getCookie() == "de")
            	{setCookie("fr");}
            else
            	{setCookie("de");}
            loadLanguageText();
           
        }
    </script>
<!-- Start of first page: #one -->
<!-- <div data-role="page"> -->

	<div data-role="header" data-theme="a">
		<div style="position:absolute; top:1px; right:5px; font-size:small">
		<a style="color:white" onclick='setLanguage()' class="langue"></a>
		</div>
		
		<img src="banniere.jpg" width="100%"></img>	
		<div id="module"></div>
		
		  <?php
		   include("livenews/livenews_module.php");
		   ?>
	</div>
	<!-- </div> -->
	<!-- /header -->