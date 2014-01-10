<?php /* Smarty version 2.6.26, created on 2014-01-10 12:31:37
         compiled from index_default.tpl */ ?>
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
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="templates/main/template/css/jquery-ui-1.10.3.custom.min.css" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="templates/main/template/css/jquery-ui-1.10.3.custom.css" />
  <link rel="icon" type="image/x-icon" href="./img/favicon.ico" />
  <title>CarPooling</title>
  <script src="js/jquery-1.10.2.min.js"></script>
  <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
  <script src="js/jqxcore.js"></script>
  <script src="js/jqxrating.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/jquery.form.min.js"></script>
  <script src="js/index.js"></script>
</head>

<!-- Global IE fix to avoid layout crash when single word size wider than column width -->
<!--[if IE]><style type="text/css"> body </style><![endif]-->

<body>
  <!-- Main Page Container -->
  <div class="page-container">
<noscript><h2>Il tuo browser non supporta JavaScript oppure è disabilitato. Attiva JavaScript per permettere il funzionamento del sito web.</h2></noscript>
    <!-- For alternative headers START PASTE here -->

    <!-- A. HEADER -->      
    <div class="header">
      
      <!-- A.1 HEADER TOP -->
      <div class="header-top">
        
        <!-- Sitelogo and sitename -->
        <div class="sitename">
          <h1>Car&bull;Pooling</h1>
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
            <li id="prova"><?php if (( ! $this->_tpl_vars['registrato'] )): ?>
                <a href="?controller=registrazione&task=registra">Registrati</a></li>
                <?php else: ?>
            <a href="#">Account</a>
                 <ul id="menu_account">
                    <li><a class="visualizza pulsante">Profilo</a></li>
                    <li><a class="gestisci pulsante">Gestisci</a></li>
                    <li><a class="gestisci_viaggi_personali pulsante">I miei viaggi</a></li>
                 </ul> 
                <?php endif; ?>
                <?php if (( $this->_tpl_vars['amministratore'] )): ?>
                <li><a id="amministra" class="pulsante">Amministra</a>
                    <ul id="menu_amministrazione">
                        <li><a id="amm_viaggi" class="pulsante">Viaggi</a></li>
                        <li><a id="amm_utenti" class="pulsante">Utenti</a></li>
                    </ul>
                <?php endif; ?>
                </li>
          </ul>          

          <!-- Navigation item -->
          
        </div>
	  </div>
          

      <!-- A.4 HEADER BREADCRUMBS -->


</div>
    <!-- For alternative headers END PASTE here -->
	
    <!-- B. MAIN -->
    <div class="main">
  
      <!-- B.1 MAIN CONTENT -->
      <div class="main-content" >
          <div id="pagina_parziale"><?php echo $this->_tpl_vars['corpo_centrale']; ?>
</div>
          <div id="form_veicolo"></div>
          <div id="ricerca_utenti"></div>
          <div id="ricerca_viaggi"></div>
      </div> 
        <!-- Content unit - Two columns -->

        <!-- Content unit - Three columns -->

	<!-- fine main content -->

      <!-- B.2 MAIN NAVIGATION -->
      <div class="main-navigation">

        <!-- Login -->
        <?php if (( $this->_tpl_vars['registrato'] )): ?>
         <h3><?php echo $this->_tpl_vars['colonna_laterale']; ?>
</h3>
         <?php echo $this->_tpl_vars['menu_laterale']; ?>

         <?php else: ?>
        <?php echo $this->_tpl_vars['colonna_laterale']; ?>

        <?php endif; ?>
      </div>
       

        
      </div>
    <!-- C. FOOTER AREA -->      

	<div class="footer">
      
    </div> 
</div>
</body>
</html>


