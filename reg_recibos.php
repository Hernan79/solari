<?php
 		session_start();
    include('php_conexion.php'); 
    if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='u'){
    }else{
      header('location:error.php');
    }
		
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Nuevos Usuarios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="description" content="Blueprint: Blueprint: Responsive Multi-Column Form" />
    <meta name="keywords" content="responsive form, inputs, html5, responsive, multi-column, fluid, media query, template" />
    <meta name="author" content="Codrops" />
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <script src="js/modernizr.custom.js"></script>

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link href="js/google-code-prettify/prettify.css" rel="stylesheet">
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
    <script src="js/bootstrap-affix.js"></script>
    <script src="js/holder/holder.js"></script>
    <script src="js/google-code-prettify/prettify.js"></script>
    <script src="js/application.js"></script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

</head>
<body>
    <div class="container" >
      <header class="clearfix">
        <span>Blueprint <span class="bp-icon bp-icon-about" data-content="The Blueprints are a collection of basic and minimal website concepts, components, plugins and layouts with minimal style for easy adaption and usage, or simply for inspiration."></span></span>
        <h1>Responsive Multi-Column Form</h1>
        <nav>
          <a href="http://tympanus.net/Blueprints/TooltipMenu/" class="bp-icon bp-icon-prev" data-info="previous Blueprint"><span>Previous Blueprint</span></a>
          <a href="http://tympanus.net/Blueprints/AnimatedHeader/" class="bp-icon bp-icon-next" data-info="next Blueprint"><span>Next Blueprint</span></a>
          <a href="http://tympanus.net/codrops/?p=15320" class="bp-icon bp-icon-drop" data-info="back to the Codrops article"><span>back to the Codrops article</span></a>
          <a href="http://tympanus.net/codrops/category/blueprints/" class="bp-icon bp-icon-archive" data-info="Blueprints archive"><span>Go to the archive</span></a>
        </nav>
      </header> 
      <div class="main">
        <form class="cbp-mc-form">
          <div class="cbp-mc-column">
            <label for="first_name">First Name</label>
              <input type="text" id="first_name" name="first_name" placeholder="Jonathan">
              <label for="last_name">Last Name</label>
              <input type="text" id="last_name" name="last_name" placeholder="Doe">
              <label for="email">Email Address</label>
              <input type="text" id="email" name="email" placeholder="jon@doe.com">
              <label for="country">Country</label>
              <select id="country" name="country">
                <option>Choose a country</option>
                <option>France</option>
                <option>Italy</option>
                <option>Portugal</option>
              </select>
              <label for="bio">Biography</label>
              <textarea id="bio" name="bio"></textarea>
            </div>
            <div class="cbp-mc-column">
              <label for="phone">Phone Number</label>
              <input type="text" id="phone" name="phone" placeholder="+351 999 999">
            <label for="affiliations">Affiliations</label>
              <textarea id="affiliations" name="affiliations"></textarea>
              <label>Occupation</label>
              <select id="occupation" name="occupation">
                <option>Choose an occupation</option>
                <option>Web Designer</option>
                <option>Web Developer</option>
                <option>Hybrid</option>
              </select>
              <label for="cat_name">Cat's name</label>
              <input type="text" id="cat_name" name="cat_name" placeholder="Kitty">
              <label for="gagdet">Favorite Gadget</label>
              <input type="text" id="gagdet" name="gagdet" placeholder="Annoy-a-tron">
            </div>
            <div class="cbp-mc-column">
              <label>Type of Talent</label>
              <select id="talent" name="talent">
                <option>Choose a talent</option>
                <option>Ninja silence</option>
                <option>Sumo power</option>
                <option>Samurai precision</option>
              </select>
            <label for="drink">Favorite Drink</label>
              <input type="text" id="drink" name="drink" placeholder="Green Tea">
              <label for="power">Special power</label>
              <input type="text" id="power" name="power" placeholder="Anti-gravity">
              <label for="weapon">Weapon of choice</label>
              <input type="weapon" id="weapon" name="weapon" placeholder="Lightsaber">
              <label for="comments">Comments</label>
              <textarea id="comments" name="comments"></textarea> 
            </div>
            <div class="cbp-mc-submit-wrap"><input class="cbp-mc-submit" type="submit" value="Send your data" /></div>
        </form>
      </div>
    </div>
  </body>
</html>