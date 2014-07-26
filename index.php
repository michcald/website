<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Michael Caldera</title>

    <!-- Bootstrap -->
    <link href="pub/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="pub/css/style.css" rel="stylesheet">
    <link href="pub/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      
      <? include 'menu.php' ?>
      
      <div class="container">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <?
            switch ($_GET['page']):
                case 'work': include 'pages/work.php'; break;
                case 'education': include 'pages/education.php'; break;
                case 'opensource': include 'pages/opensource.php'; break;
                case 'skills': include 'pages/skills.php'; break;
                default: include 'pages/home.php';
            endswitch;
            ?>
        </div>
        <div class="col-md-1"></div>
      </div>
      </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="pub/bootstrap/js/bootstrap.min.js"></script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-39521432-1', 'auto');
  ga('send', 'pageview');
    </script>
  </body>
</html>