<?php //https://www.youtube.com/watch?v=rHPWkoXFIKM
include "../db_postConfig.php";

global $cont_dj;
$cont_dj=0;
global  $vetorDj;

$vetorDj = array();
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Freelancer - Start Bootstrap Theme</title>

  <!-- Custom fonts for this theme -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="css/freelancer.min.css" rel="stylesheet">
  
  

   
</head>

<body id="page-top">

<style>

  #search_param{
   background-color: #1F85DE  !important;
   }


</style>

<script>
 
$(function(){
    
    $(".input-group-btn .dropdown-menu li a").click(function(){

        var selText = $(this).html();
    
        //working version - for single button //
       //$('.btn:first-child').html(selText+'<span class="caret"></span>');  
       
       //working version - for multiple buttons //
       $(this).parents('.input-group-btn').find('.btn-search').html(selText);

   });

});
</script>


  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Start Bootstrap</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Portfolio</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

      <!-- Masthead Avatar Image -->
      <img class="masthead-avatar mb-5" src="img/avataaars.svg" alt="">

      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0">Start Bootstrap</h1>
      <br />

      
   <?php /*   

<div class="container" style="margin-top: 8%;">
<div class="col-md-6 col-md-offset-3">     
<div class="row">
<form align="center" role="form" id="form-buscar">
<div class="form-group">
<div class="input-group">
<input id="1" class="form-control" type="text" name="search" placeholder="Search..." required/>
<span class="input-group-btn">
<button class="btn btn-success" type="submit">
<i class="glyphicon glyphicon-search" aria-hidden="true"></i> Search
</button>
</span>
</div>
</div>
</form>
</div>            
</div>
</div>   


<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


*/ ?>


<form  method="get" action="?go=buscar">
<div class="input-group">
    <div class="input-group-btn search-panel">
		 <select name="search_param" id="search_param" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <option value="all">All</option>
                            <option value="username">Username</option>
                            <option value="email">Email</option>
                            <option value="studentcode">Student Code</option>
                        </select>
  </div>

	<input type="text" size="100" class="form-control" name="texto_busca" placeholder="Buscar..." id="search_key" value="">
	<span class="input-group-btn">

			<button class="btn btn-info" type="submit">  Buscar  </button>
	</span>
</div>
</form>








      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Masthead Subheading -->
      <p class="masthead-subheading font-weight-light mb-0">Graphic Artist - Web Designer - Illustrator</p>

    </div>
  </header>

  <!-- Portfolio Section -->
  <section class="page-section portfolio" id="portfolio">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Portfolio</h2>

            <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>
    

     <!-- Portfolio Grid Items -->
    <div class="row" >
          
  <?php     
   
      $vetorCarac = array();
      $query = 'SELECT * from djs';
      $result = pg_query($query);
      $cont_port=1;
      $i = 0;
      
      while (pg_fetch_row($result)) //percorrendo as consulta do banco de dados e salvando nas respesctivas variaveis
      {
        //echo '<tr>';
        //$count = count($row);
        //$y = 0;
        
        /*while ($y < $count)
        {
          $c_row = current($row);
          echo '<td>' . $c_row . '</td>';
                
          next($row);
          $y = $y + 1;
        }*/
        
        $nome_real = pg_fetch_result($result, $i, "nome_real"); 
        $nome_art = pg_fetch_result($result, $i, "nome_art"); 
        $telefone = pg_fetch_result($result, $i, "telefone"); 
        $telefone2 = pg_fetch_result($result, $i, "telefone2"); 
        $cidade = pg_fetch_result($result, $i, "cidade"); 
        $estado = pg_fetch_result($result, $i, "estado"); 
        $descricao = pg_fetch_result($result, $i, "descricao"); 
        $img_nome= pg_fetch_result($result, $i, "img_nome");
        
        $vetorDj[$i] =  array($nome_real, $nome_art, $telefone, $cidade, $estado, $img_nome, $descricao); //armazena as informaoes para serem usadas ao clicar nos portifolios        
                 
          echo '<!-- Portfolio Item '.$cont_port.' -->';
          echo '<div   class="col-md-6 col-lg-4">';
            echo '<div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal'.$cont_port.'">'; 
             echo '<div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">';
                echo '<div class="portfolio-item-caption-content text-center text-white">';
                  echo '<i class="fas fa-plus fa-3x"></i>';
                echo '</div>';
              echo '</div>';
              
              echo '<img class="img-fluid" src="../img_djs/'.$img_nome.'" alt="">';
             
             echo '</div>';
          echo '</div>';
         
       $cont_dj = $cont_dj + 1;
       $cont_port = $cont_port + 1;   
       $i = $i + 1;
         //echo '</tr>';
      }
      pg_free_result($result);
    
  ?>
    </div>
      <!-- /.row -->

    </div>
   </section>
   
   
 
    
  <!-- About Section -->
  <section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">

      <!-- About Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-white">About</h2>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- About Section Content -->
      <div class="row">
        <div class="col-lg-4 ml-auto">
          <p class="lead">Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete source files including HTML, CSS, and JavaScript as well as optional SASS stylesheets for easy customization.</p>
        </div>
        <div class="col-lg-4 mr-auto">
          <p class="lead">You can create your own custom avatar for the masthead, change the icon in the dividers, and add your email address to the contact form to make it fully functional!</p>
        </div>
      </div>

      <!-- About Section Button -->
      <div class="text-center mt-4">
        <a class="btn btn-xl btn-outline-light" href="https://startbootstrap.com/themes/freelancer/">
          <i class="fas fa-download mr-2"></i>
          Free Download!
        </a>
      </div>

    </div>
  </section>

  <!-- Contact Section -->
  <section class="page-section" id="contact">
    <div class="container">

      <!-- Contact Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contact Me</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Contact Section Form -->
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          <form name="sentMessage" id="contactForm" novalidate="novalidate">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Name</label>
                <input class="form-control" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Email Address</label>
                <input class="form-control" id="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Phone Number</label>
                <input class="form-control" id="phone" type="tel" placeholder="Phone Number" required="required" data-validation-required-message="Please enter your phone number.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Message</label>
                <textarea class="form-control" id="message" rows="5" placeholder="Message" required="required" data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Send</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </section>

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">

        <!-- Footer Location -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Location</h4>
          <p class="lead mb-0">2215 John Daniel Drive
            <br>Clark, MO 65243</p>
        </div>

        <!-- Footer Social Icons -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Around the Web</h4>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-facebook-f"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-twitter"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-linkedin-in"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-dribbble"></i>
          </a>
        </div>

        <!-- Footer About Text -->
        <div class="col-lg-4">
          <h4 class="text-uppercase mb-4">About Freelancer</h4>
          <p class="lead mb-0">Freelance is a free to use, MIT licensed Bootstrap theme created by
            <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
        </div>

      </div>
    </div>
  </footer>

  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; Your Website 2019</small>
    </div>
  </section>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

 
   <!-- Portfolio AQUI --> 
     <!-- Portfolio Modals -->     
  <?php 
  
   $j=0;
   $cont_port = 1;
   while($j <= $cont_dj){
       
    echo '<!-- Portfolio Modal '.$cont_port.' -->';
    echo '<div class="portfolio-modal modal fade" id="portfolioModal'.$cont_port.'" tabindex="-1" role="dialog" aria-labelledby="portfolioModal'.$cont_port.'Label" aria-hidden="true">'; 
    ?>
        <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">
                <i class="fas fa-times"></i>
            </span>
            </button>
            <div class="modal-body text-center">
            <div class="container">
                <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Portfolio Modal - Title -->
                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0"> <?php print_r ($vetorDj[$j][0]); ?> </h2>
                    <!-- Icon Divider -->
                    <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="divider-custom-line"></div>
                    </div>

                    <!-- Portfolio Modal - Image -->
                    <?php

                    $nome_img2=print_r($vetorDj[$j][5], true);
                    //$nome_real=print_r($vetorDj[$j][0], true);
                    $nome_art2=print_r($vetorDj[$j][1], true);
                    $cidade2=print_r($vetorDj[$j][3], true);
                    $estado2=print_r($vetorDj[$j][4], true);
                    $descricao2=print_r($vetorDj[$j][6], true);
                    //preg_match_all('!\d+!', print_r($vetorDj[$j][2], true), $telefone_2);
                    $tele=print_r($vetorDj[$j][2], true);
                    //$telefone_2=(int) filter_var($tele, FILTER_SANITIZE_NUMBER_INT);
                    $telefone_2 = preg_replace('/\D/', '', $tele); //transforma a string em numero (inclusive caracteres especiais)

                    //echo '<img class="img-fluid rounded mb-5" src="../img_djs/'.$nome_img2.'" alt="">';
                    echo '<a href="https://api.whatsapp.com/send?phone=55'.$telefone_2.'&amp;amp;text='.$nome_art2.'"><img class="img-fluid rounded mb-5" src="../img_djs/'.$nome_img2.'" alt=""></a>';
                    //echo '<a href="https://api.whatsapp.com/send?phone=5532988614906&amp;amp;text=FLAVINHO DJ JF" target="_blank"><img src="../img_djs/'.$nome_img2.'" alt=""></a>';
                            
                   // echo '<br />';
                    echo '<a href="https://api.whatsapp.com/send?phone=55'.$telefone_2.'&amp;amp;text='.$nome_art2.'"><font size="5
                        "> Clique aqui para conversar no Whatsapp </font></a>';
                    echo '<!-- Portfolio Modal - Text -->'; //'.$cont_port.'/'.$cont_dj.'/'.$nome_img2.' '.$telefone_2.'
                    echo '<p class="mb-5">
                    
                    <b>Nome:</b>  '.$nome_art2.' <br />
                    <b>Cidade:</b> '.$cidade2.'  &nbsp &nbsp<b>Estado:</b>'.$estado2.'<br />
                    <b>Descrição:</b> '.$descricao2.'</p>';
                    
                    ?>
                
                    <button class="btn btn-primary" href="#" data-dismiss="modal">
                    <i class="fas fa-times fa-fw"></i>
                    Fechar Janela
                    </button>               
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    
    <?php 
    
        //$cont_dj = $cont_dj + 1;
        $cont_port = $cont_port + 1;   
        $j = $j + 1;
        
        }
    ?>
 
   

  
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>

</body>

</html>
