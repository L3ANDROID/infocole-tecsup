<?php
require_once 'variables.php';
require_once 'funciones.php';
$alm = new partido();
$model = new partidoModel();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
<style type="text/css">
  body{
    background-size: 1370px 637px;
    background:black;
  }
  #contenedor{
      background: transparent;
      position: absolute;/*dejarlo posicionado*/
      margin: auto;/*centrar automaticamente todo*/
      top: 10px;/*arriba*/
      right: 0;
      bottom: 0;
      left: 0;
      border-radius: 10px;
      width: 360px;
      height: 400px;
      text-align: center;
      border-style: solid;
      border-color: #FFFFFF;
      border-width: 1px;
  }
  #page{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    /*background: radial-gradient(circle,#673ab7 , #311b92);*/
    justify-content: center;
    align-items: center;
    color: white;
    flex-direction: column;
    z-index: 10000;
  }
  #page2{
  height: 100%;
  position: absolute;
  width: 100%;
  display: none;
  }
  #logo{
  margin-top: -60px;
  }
  .fc-caption{
  margin-bottom:70px ;
  font-size: 24px;
  opacity: 0.9;
  }
  .fc-login-button{
  width: 300px;
  height: 50px;
  margin-bottom: 20px;
  }

  .fc-sign-in-button{
  margin-left: 10px;
  color: red;
  }

  html, body {
  font-family: 'Roboto', 'Helvetica', sans-serif;
  }
  .demo-avatar {
  top: -3px;
  position: relative;
  display: inline-block;
  background-image: url('/images/profile_placeholder.png');
  background-repeat: no-repeat;
  width: 60px;
  height: 60px;
  background-size: 60px;
  border-radius: 20px;
  }
  .demo-layout .demo-header .mdl-textfield {
  padding: 0px;
  margin-top: 41px;
  }
  .demo-layout .demo-header .mdl-textfield .mdl-textfield__expandable-holder {
  bottom: 19px;
  }
  .demo-layout .mdl-layout__header .mdl-layout__drawer-button {
  color: rgba(0, 0, 0, 0.54);
  }
  .mdl-layout__drawer .avatar {
  margin-bottom: 16px;
  }
  .demo-drawer {
  border: none;
  }
  /* iOS Safari specific workaround */
  .demo-drawer .mdl-menu__container {
  z-index: -1;
  }
  .demo-drawer .demo-navigation {
  z-index: -2;
  }
  /* END iOS Safari specific workaround */
  .demo-drawer .mdl-menu .mdl-menu__item {
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
  }
  .demo-drawer-header {
  box-sizing: border-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column;
  -webkit-justify-content: flex-end;
      -ms-flex-pack: end;
          justify-content: flex-end;
  padding: 16px;
  height: 151px;
  }
  .demo-avatar-dropdown {
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  position: relative;
  -webkit-flex-direction: row;
      -ms-flex-direction: row;
          flex-direction: row;
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
  width: 100%;
  }

  .demo-navigation {
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1;
  }
  .demo-layout .demo-navigation .mdl-navigation__link {
  display: -webkit-flex !important;
  display: -ms-flexbox !important;
  display: flex !important;
  -webkit-flex-direction: row;
      -ms-flex-direction: row;
          flex-direction: row;
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
  color: rgba(255, 255, 255, 0.56);
  font-weight: 500;
  }
  .demo-layout .demo-navigation .mdl-navigation__link:hover {
  background-color: #00BCD4;
  color: #37474F;
  }
  .demo-navigation .mdl-navigation__link .material-icons {
  font-size: 24px;
  color: rgba(255, 255, 255, 0.56);
  margin-right: 32px;
  }

  .demo-content {
  max-width: 1080px;
  }

  .demo-charts {
  -webkit-align-items: center;
      -ms-flex-align: center;
              -ms-grid-row-align: center;
          align-items: center;
  }
  .demo-chart:nth-child(1) {
  color: #ACEC00;
  }
  .demo-chart:nth-child(2) {
  color: #00BBD6;
  }
  .demo-chart:nth-child(3) {
  color: #BA65C9;
  }
  .demo-chart:nth-child(4) {
  color: #EF3C79;
  }
  .demo-graphs {
  padding: 16px 32px;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column;
  -webkit-align-items: stretch;
      -ms-flex-align: stretch;
          align-items: stretch;
  }
  /* TODO: Find a proper solution to have the graphs
 * not float around outside their container in IE10/11.
 * Using a browserhacks.com solution for now.
 */
  _:-ms-input-placeholder, :root .demo-graphs {
  min-height: 664px;
  }
  _:-ms-input-placeholder, :root .demo-graph {
  max-height: 300px;
  }
  /* TODO end */
  .demo-graph:nth-child(1) {
  color: #00b9d8;
  }
  .demo-graph:nth-child(2) {
  color: #d9006e;
  }

  .demo-cards {
  -webkit-align-items: flex-start;
      -ms-flex-align: start;
              -ms-grid-row-align: flex-start;
          align-items: flex-start;
  -webkit-align-content: flex-start;
      -ms-flex-line-pack: start;
          align-content: flex-start;
  }
  .demo-cards .demo-separator {
  height: 32px;
  }
  .demo-cards .mdl-card__title.mdl-card__title {
  color: white;
  font-size: 24px;
  font-weight: 400;
  }
  .demo-cards ul {
  padding: 0;
  }
  .demo-cards h3 {
  font-size: 1em;
  }
  .demo-updates .mdl-card__title {
  min-height: 200px;
  background-image: url('images/dog.png');
  background-position: 90% 100%;
    background-repeat: no-repeat;
  }
  .demo-cards .mdl-card__actions a {
  color: #00BCD4;
  text-decoration: none;
  }

  .demo-options h3 {
  margin: 0;
  }
  .demo-options .mdl-checkbox__box-outline {
  border-color: rgba(255, 255, 255, 0.89);
  }
  .demo-options ul {
  margin: 0;
  list-style-type: none;
  }
  .demo-options li {
  margin: 4px 0;
  }
  .demo-options .material-icons {
  color: rgba(255, 255, 255, 0.89);
  }
  .demo-options .mdl-card__actions {
  height: 64px;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  box-sizing: border-box;
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
  }
 /*++++++++++++++++++++ESTILOS CONTENIDO++++++++++++++++++++*/
 #contenido{
  margin-left: 265px;
  margin-top: -30px;
 }
 #pag1, #pag2, #pag3, #pag4 {
  width:1000px;
  padding: 30px;
}

#pag1 {
  height:480px;
  background:#afc9ff;
  margin-top: 48px;
}
  
.page-padding {height:20px; width:100%;}

a { color:white; text-decoration:none;}
  
a:hover { text-decoration:underline;}

@media only screen and (max-width: 600px) {
    #pag1, #pag2, #pag3, #pag4 {
      width: 100%;
    }
}

@media only screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
  .topnav.responsive {position: relative;}
  .topnav.responsive a.icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
</style>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<meta name="description" content="Firechat Mensajeria instantanea">
	
	<title>MundiApp</title>

	<link rel="shorcout icon" href="images/icons/favicon.png">
	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
	
	<link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-pink.min.css">  
	
	<link rel="stylesheet" href="css/estilos.css">

  <link rel="stylesheet" type="text/css" href="css/estilos.css" />

  <link href='http://fonts.googleapis.com/css?family=Annie+Use+Your+Telescope' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<script src="https://apis.google.com/js/platform.js" async defer></script>

<script src="https://www.gstatic.com/firebasejs/3.2.1/firebase.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    
<body background="images/">
  <div id="contenedor">
		<section id="page">
      <!--<img src="images/icons/mundiapp.png" width="200px" height="220px" id="logo">
			<h3><i class="material-icons md-48">question_answer</i>
			MundiApp
			</h3>
			<div class="fc-caption">LA APLICACIÓN DEL MUNDIAL RUSIA 2018</div>-->

			<button class="fc-login-button fc-sign-in-button  mdl-button--raised mdl-button mdl-js-button mdl-js-ripple-effect" id="btn-google" >

			<i class="material-icons">account_circle</i>

			Ingresa con Google</button>

			<button class="fc-login-button fc-sign-in-button  mdl-button--raised mdl-button mdl-js-button mdl-js-ripple-effect" id="btn-facebook">

			<i class="material-icons">account_circle</i>

			Ingresa con Facebook</button>

		</section>
  </div>  
<!--...............................................................................................................-->

		<div id="page2" class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title"></span>
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search">
              <label class="mdl-textfield__label" for="search">Enter your query...</label>
            </div>
          </div>
          <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="material-icons">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
            <li class="mdl-menu__item">Acerca</li>
            <li class="mdl-menu__item">Contáctenos</li>
            <li class="mdl-menu__item">Información Legal</li>
          </ul>
        </div>
      </header>
      <!--....................................................-->
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
          <div id="user-pic" class="demo-avatar"></div> 
          <div class="demo-avatar-dropdown">
            <span id="user-name"></span>
            <div class="mdl-layout-spacer"></div>
          </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
          <div id="nav" class="topnav">

          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Inicio</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">inbox</i>Colegios</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>Noticias</a>
          <a class="mdl-navigation__link" href="#estadisticas"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">flag</i>Matriculas 2018</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">forum</i>Foros</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">report</i>Updates</a>
          <a id="cerrar" class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">clear</i>Salir</a>

          <div class="mdl-layout-spacer"></div>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i>Ayuda<span class="visuallyhidden">Help</span></a>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          </div>
        </nav>
      </div>
      <!--....................................................-->
      <div id="contenido">
  
        <div id="pag2">
          <a name="fixture"></a>
          <img src="images/" width="1000px" height="480px">
        </div> <!--END page2-->
      <!--.....................................................-->
  
</div>

 

<!-- Compiled and minified JavaScript -->
 <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
 <script src="js/main.js"></script>
 <script src="js/jquery-3.3.1.min.js"></script>
 <script src="js/script.js"></script>


</body>
</html>
