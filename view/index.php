<!DOCTYPE html>
<html>
  <head>
    <?php require_once './includes/head.php'?>
  </head>
  <body>
    <!-- INITED VUE -->
    <div id="cas__app">
      <navbar :user_id="user_id" :admin="admin" :username="username"></navbar>
      <div id="colorlib-main">
        <router-view></router-view>
      </div>
    </div>

		<!-- TEMPALTES -->
		<?php include_once './templates/_admin.php'?>
		<?php include_once './templates/_auth.php'?>
		<?php include_once './templates/_navbar.php'?>
		<?php include_once './templates/_home.php'?>
    <?php include_once './templates/_leads.php'?>
    <?php include_once './templates/_categories.php'?>
    <?php include_once './templates/_cat_type.php'?>
    <!-- END TEMPLATES -->

    <?php include_once './includes/scripts.php'?>
    <script src="./js/klefcodes/components/Admin.js"></script>
    <script src="./js/klefcodes/components/Auth.js"></script>
    <script src="./js/klefcodes/components/Navbar.js"></script>
    <script src="./js/klefcodes/components/Home.js"></script>
    <script src="./js/klefcodes/components/Leads.js"></script>
    <script src="./js/klefcodes/components/Categories.js"></script>
    <script src="./js/klefcodes/components/catType.js"></script>
		<script src="./js/klefcodes/main.js"></script>
		<script>
			document.getElementById("date").innerHTML = new Date().getFullYear()
    </script>
    <script type="text/javascript">
        swal ( "Notice" , "Don't use Internet Explorer Browser to run this site" , "warning" )
      </script>
  </body>
</html>
