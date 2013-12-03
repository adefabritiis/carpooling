<html>

<!--  Version: Multiflex-3.12 / Layout-3                    -->
<!--  Date:    January 20, 2008                             -->
<!--  Design:  www.1234.info                                -->
<!--  License: Fully open source without restrictions.      -->
<!--           Please keep footer credits with the words    -->
<!--           "Design by 1234.info" Thank you!             -->

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="3600" />
  <meta name="revisit-after" content="2 days" />
  <meta name="robots" content="index,follow" />
  <meta name="publisher" content="Your publisher infos here ..." />
  <meta name="copyright" content="Your copyright infos here ..." />
  <meta name="author" content="Design: 1234.info / Modified: Your Name" />
  <meta name="distribution" content="global" />
  <meta name="description" content="Your page description here ..." />
  <meta name="keywords" content="Your keywords, keywords, keywords, here ..." />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="templates/main/template/css/layout3_setup.css" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="templates/main/template/css/layout3_text.css" />
  <link rel="icon" type="image/x-icon" href="./img/favicon.ico" />
  <title>CarPooling</title>
  <script src="js/jquery-1.9.1.js"></script>
  <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
  <script  type="text/javascript">
      {literal}
      $(initmenu);
      function initmenu(){
          $("#prova").hover(slidedown,slideup);
      }
      function slidedown(){
          $("ul#menu_profilo").slideDown("medium");
      } 
      function slideup(){
          $("ul#menu_profilo").slideUp("fast");
      }    
      
      {/literal}
  </script>
  <script src="js/index.js"></script>
</head>

<!-- Global IE fix to avoid layout crash when single word size wider than column width -->
<!--[if IE]><style type="text/css"> body </style><![endif]-->

<body>
  <!-- Main Page Container -->
  <div class="page-container">

    <!-- For alternative headers START PASTE here -->

    <!-- A. HEADER -->      
    <div class="header">
      
      <!-- A.1 HEADER TOP -->
      <div class="header-top">
        
        <!-- Sitelogo and sitename -->
		<a class="sitelogo" href="index.php"></a>
        <div class="sitename">
          <h1>Car&bull;Pooling</a></h1>
        </div>
    
       
        

        <!-- Navigation Level 1 -->
        <div class="nav1">
        </div>              
      </div>
      
      <!-- A.2 HEADER MIDDLE -->
      <div class="header-middle">  
        
	  </div>
       
      
      <!-- A.3 HEADER BOTTOM -->
      
      <div class="header-bottom">
      
        <!-- Navigation Level 2 (Drop-down menus) -->
        <div class="nav2">
	
          <!-- Navigation item -->
          <ul>
            <li><a href="index.php?controller=&task=" >Home</a></li>
            <li><a id="cerca" class="pulsante">Cerca un passaggio</a></li>
            <li><a id="offri" class="pulsante">Offri un passaggio</a></li>
            <li id="prova">{if (!$registrato)}
                <a href="?controller=registrazione&task=registra">Registrati</a></li>
                {else}
            <a href="#">Account</a>
                 <ul id="menu_profilo">
                    <li><a id="visualizza" class="pulsante">Profilo</a></li>
                    <li><a id="gestisci" class="pulsante">Gestisci</a></li>
                    <li><a id="gestisci_viaggi_personali" class="pulsante">I miei viaggi</a></li>
                 </ul>   
                {/if}      
          </ul>          

          <!-- Navigation item -->
          
        </div>
	  </div>
          

      <!-- A.4 HEADER BREADCRUMBS -->

     <br>

</div>
    <!-- For alternative headers END PASTE here -->
	
    <!-- B. MAIN -->
    <div class="main">
  
      <!-- B.1 MAIN CONTENT -->
      <div class="main-content" >
          
          <div id="pagina_parziale">
          
              {$corpo_centrale}
          
          </div>
              <div id="form_veicolo"></div>
      </div>
          
          
              
          
          
        
          
        <!-- Content unit - Two columns -->
       
        
        

        <!-- Content unit - Three columns -->
        
       
      
	  <!-- fine main content -->

      <!-- B.2 MAIN NAVIGATION -->
      <div class="main-navigation">

        <!-- Login -->
        {if ($registrato)}
         <h3>{$colonna_laterale}</h3>
         {$menu_laterale}
         {else}
        {$colonna_laterale}
        {/if}
      </div>
       

        
      </div>
    <!-- C. FOOTER AREA -->      

	<div class="footer">
      <p>Copyright &copy; 2007 Your Company | All Rights Reserved</p>
      <p class="credits">Design by <a href="http://1234.info/" title="Designer Homepage">1234.info</a> | Modified by <a href="#" title="Modifyer Homepage">Your Name</a> | Powered by <a href="#" title="CMS Homepage">Your CMS</a> | <a href="http://validator.w3.org/check?uri=referer" title="Validate XHTML code">XHTML 1.0</a> | <a href="http://jigsaw.w3.org/css-validator/" title="Validate CSS code">CSS 2.0</a></p>
    </div> 
</div>
</body>
</html>



