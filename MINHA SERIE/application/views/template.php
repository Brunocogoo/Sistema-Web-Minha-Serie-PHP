


<head>

    <link rel="shortcut icon" href="<?php echo base_url('assets/Img/favicon.png')?>" />
    <title>Minha Série</title>
</head>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet" type="text/css">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Minha Série</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <!-- jQuery Plugin -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <![endif]-->
</head>

<script type="text/javascript">
    //<![CDATA[
    $(window).on('load', function() { // makes sure the whole site is loaded
        $('#status').fadeOut(); // will first fade out the loading animation
        $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
        $('body').delay(350).css({'overflow':'visible'});
    })
    //]]>
</script>

<body id="Main" ">



<div id="preloader">
    <div id="status">&nbsp;</div>
</div>



<div>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url()?>InicioController"><img border="0" alt="W3Schools" src="<?php echo base_url('assets/Img/minilogo3.png')?>" height="130%" style="margin-bottom:50"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav ">
                    <li><a href="<?php echo base_url()?>RecomendadasController">RECOMENDADAS <span class="sr-only">(current)</span></a></li>
                    <li><a href='<?php echo base_url()?>Top10Controller'>TOP 10</a></li>


                    <li><a href="<?php echo base_url()?>SeriesController">SÉRIES</a></li>

                    <li><a href="<?php echo base_url()?>BuscaController">BUSCAR USUÁRIOS</a></li>

                    <li><a href="<?php echo base_url()?>ContatoController">CONTATO</a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href='<?php echo base_url()?>LoginController/Cadastro'><span class="glyphicon glyphicon-user"></span> CADASTRE-SE</a></li>
                    <li><a href='<?php echo base_url()?>LoginController'><span class="glyphicon glyphicon-log-in"></span> LOGIN</a></li>
                    <p class="navbar-text navbar-right" style="margin-right:30px"> <a href="https://www.facebook.com/CogoDesign/?fref=ts">
                            <img border="0" alt="W3Schools" src="<?php echo base_url('assets/Img/facebook.png')?>" width="25" height="25"></a></p>
                </ul>


            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>






    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>;"></script>



</div>

<div  class="navbar navbar-fixed-bottom " style="background-color:white;">

    <center><font color="#5E5D5D">MINHASÉRIE - Desenvolvido por Bruno Cogo</font></center>


</div>




<?php echo $contents;?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>




</body>

</html>
