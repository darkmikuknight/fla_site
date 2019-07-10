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

  <link rel="shortcut icon" href="logotopdjsapp.ico" type="image/x-icon"/>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>TOPDJ$</title>

  <!-- Custom fonts for this theme -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="css/freelancer.min.css" rel="stylesheet">
  <!-- tema https://startbootstrap.com/themes/freelancer/ -->
  

   
</head>

<body id="page-top">

<style>

.search_param:active{
   outline: none;
}

#search_param{
    background-color: #373725  !important;
    font-size: 16px;
    padding: 9px;
    margin: 1px -2px; 
    border: none !important;
    outline: none !important;
    box-shadow: none;
}



 .search_param:hover {

    color: #fff;
    background-color: #cdca27 !important;
    border-color: #cdca27;
}

 button:hover {

    color: #fff;
    background-color: #cdca27 !important;
    border-color: #cdca27;
}
	

#butn{
    background-color: #373725;  
    padding: 7px;
    margin: 1px -1px;
    border: none;
}
 #butn:hover {

    color: #fff;
    background-color: #cdca27 !important;
    border-color: #cdca27;
}

#suporte{
    color: #130cf3  !important;

}

#btnEnviar{
    border: none !important;
}

#parte_cima{
     background-color: #cdca27  !important;
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
      <a class="navbar-brand js-scroll-trigger" href="#page-top">TOPDJ$APP</a>
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
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">Sobre</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Contato</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header id="parte_cima" class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

      <!-- Masthead Avatar Image -->
      <img class="masthead-avatar mb-5" src="img/avataaars.svg" alt="">

      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0">Busque por um DJ</h1>
      <br />

      
   <?php /*   
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
*/ ?>

<br />
<form  method="get" action="?go=buscar#portfolio">
<div class="input-group">
    <div class="input-group-btn search-panel">
		 <select name="search_param" id="search_param" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                <option value="filtrar">Filtrar por:</option>
                <option value="cidade">Cidade</option>
                <option value="estado">Estado</option>
                <option value="todos">Todos</option>
        </select>
  </div>

	<input type="text" size="100" class="form-control" name="texto_busca" placeholder="Buscar..." id="search_key" value="">
	<span class="input-group-btn">

			<button class="btn btn-info" id="butn" type="submit"> Buscar </button>
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
      <p class="masthead-subheading font-weight-light mb-0">Você pode buscar por cidade, estado.</p>

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
   

      $cont_port=1; // conta quantos djs foram carregados do banco para exibir ao clicar neles (usado na parte de baixo do código)
      $i = 0; // numero de linhas na busca da tabela "djs"
      $texto_b = $_GET['texto_busca'];
       
      //echo '<td> "PASO="'.$texto_b.'</td>'; 
       
      // aqui comeca a verificacao dos filtros
      
      if((!(isset($_GET['search_param'])) || $_GET['search_param'] == "filtrar" || $_GET['search_param'] == "todos") && (isset($_GET['texto_busca']))){ // não foi usado nenhum filtro e qualquer texto de busca
      
          $query = "SELECT * from djs WHERE LOWER(nome_real) LIKE LOWER('%$texto_b%') OR LOWER(nome_art) LIKE LOWER('%$texto_b%') OR LOWER(descricao) LIKE LOWER('%$texto_b%') ";
          $result = pg_query($query);
          
          $num_lin = pg_num_rows($result);
          //echo '<td> "Num linhas2="'.$num_lin.'</td>';
          
          if(pg_num_rows($result) == 0){
          echo '<td> <h2>Desculpe! Não foi encontrado nenhum DJ cadastrado no sistema relacionado com "'.$texto_b.'"</h2></td>';
          }
      }
      
      elseif((isset($_GET['search_param'])) && $_GET['search_param'] == "cidade"){ //busca filtrada por cidade
      
          if(isset($_GET['texto_busca']) && empty($_GET['texto_busca']) == false){ // digitou algo na barra de busca
              $texto_b = $_GET['texto_busca'];
              echo '<td> "cidade"'.$texto_b.'</td>'; 
              //$query = "SELECT * from djs WHERE LOWER(cidade) LIKE LOWER('%$texto_b%') ";
              $query = "SELECT * from djs WHERE LOWER(cidade) = LOWER((SELECT cidade_nome FROM lista_sigla WHERE LOWER(cidade_nome) LIKE LOWER('%$texto_b%') OR LOWER(sigla_cidade) = LOWER('$texto_b'))) "; 
              $result = pg_query($query);
          }
          
          //$num_lin = pg_num_rows($result);
          //echo '<td> "Num linhas1="'.$num_lin.'</td>';
          
          elseif(empty($_GET['texto_busca'])){ // nao foi digitado nenhum texto na busca
            
            //$exbirPorCidade = true;
            $query = "SELECT * from djs ORDER BY cidade"; 
            $result = pg_query($query); 
          }
          
          
          if(pg_num_rows($result) < 1){
          echo '<td> <h2>Desculpe! Não foi encontrado nenhum DJ cadastrado da cidade "' .$texto_b. '".</h2></td>';
          }
          
          if(pg_num_rows($result) == -1){
          echo '<td> <h4>Houve algum erro na busca - Linha 261".</h4></td>';
          }
          
      }
      
      elseif((isset($_GET['search_param'])) && $_GET['search_param'] == "estado"){ //busca filtrada por estado
      
          if(isset($_GET['texto_busca']) && empty($_GET['texto_busca']) == false){ // digitou algo na barra de busca
          
              $texto_b = $_GET['texto_busca'];
              //echo '<td> "estaddo"'.$texto_b.'</td>'; 
              //$query = "SELECT * from djs WHERE LOWER(estado) LIKE LOWER('%$texto_b%') ";
              $query = "SELECT * from djs WHERE LOWER(estado) = LOWER((SELECT DISTINCT estado_nome FROM lista_sigla WHERE LOWER(estado_nome) LIKE LOWER('%$texto_b%') OR LOWER(sigla_estado) = LOWER('$texto_b'))) "; 
              $result = pg_query($query);
          }
          
          //$num_lin = pg_num_rows($result);
          //echo '<td> "Num linhas1="'.$num_lin.'</td>';
          
          elseif(empty($_GET['texto_busca'])){ // nao foi digitado nenhum texto na busca
            
            //$exbirPorEstado = true;
            $query = "SELECT * from djs ORDER BY estado"; 
            $result = pg_query($query); 
          }
          
          
          if(pg_num_rows($result) < 1){
          echo '<td> <h2>Desculpe! Não foi encontrado nenhum DJ cadastrado do estado "' .$texto_b. '".</h2></td>';
          }
          
          if(pg_num_rows($result) == -1){
          echo '<td> <h4>Houve algum erro na busca - Linha 291".</h4></td>';
          }
          
      }
  
      else{ // busca somente pelo texto de busca
          
          $query = "SELECT * from djs";
          $result = pg_query($query);
          
          $num_lin = pg_num_rows($result);
          //echo '<td> "Num linhas-1="'.$num_lin.'</td>';
          
          if(pg_num_rows($result) == 0){
          echo '<td> <h2>Desculpe! Não foi encontrado nenhum DJ cadastrado no sistema.</h2></td>';
          }
          
      }
        
        
        // pg_num_rows — Returns the number of rows in a result
        
        
      while (pg_fetch_row($result)){ //percorrendo as consulta do banco de dados e salvando nas respesctivas variaveis
      

        $nome_real = pg_fetch_result($result, $i, "nome_real"); 
        $nome_art = pg_fetch_result($result, $i, "nome_art"); 
        $telefone = pg_fetch_result($result, $i, "telefone"); 
        $telefone2 = pg_fetch_result($result, $i, "telefone2"); 
        $cidade = pg_fetch_result($result, $i, "cidade"); 
        $estado = pg_fetch_result($result, $i, "estado"); 
        $descricao = pg_fetch_result($result, $i, "descricao"); 
        $img_nome= pg_fetch_result($result, $i, "img_nome");
        $email= pg_fetch_result($result, $i, "email");
        $website= pg_fetch_result($result, $i, "website");
        
        $vetorDj[$i] =  array($nome_real, $nome_art, $telefone, $cidade, $estado, $img_nome, $descricao, $email, $website); //armazena as informacoes para serem usadas ao clicar nos portifolios        
        
       
        //echo '<h3>Estado: printou foi esse </h3>';        
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
      <h2 class="page-section-heading text-center text-uppercase text-white">Sobre</h2>

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
          <p class="lead">Somos uma plataforma que se propõem a juntar Djs e clientes para negociar livremente. E não nos responsabilizamos pelo serviço prestado pelos mesmos. Apenas facilitamos o encontro dos mesmos.</p>
        </div>
        <div class="col-lg-4 mr-auto">
          <p class="lead">Esse aplicativo foi criado por Flávio Romano dos Santos (Flavinho DJ JF) com o intuíto de facilitar negócios. Para maiores dúvidas temos nosso suporte técnico. </p> <!--<a id="suporte" href="https://chat.whatsapp.com/KwrG06SudzfFprIB21p0hl">Acessar Suporte</a></p> -->
        </div>
      </div>

      <!-- About Section Button -->
      <div class="text-center mt-4">
        <a id="suporte" class="btn btn-xl btn-outline-light" href="https://chat.whatsapp.com/KwrG06SudzfFprIB21p0hl">
          <i class="fas fa-comments mr-2"></i>
          Acessar Suporte
        </a>
      </div>

    </div>
  </section>

  <!-- Contact Section -->
  <section class="page-section" id="contact">
    <div class="container">

      <!-- Contact Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contato</h2>

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
                <label>Nome</label>
                <input class="form-control" id="name" type="text" placeholder="Nome" required="required" data-validation-required-message="Digite o seu nome.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Endereço de e-mail</label>
                <input class="form-control" id="email" type="email" placeholder="Endereço de e-mail">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Número de telefone (whatsapp)</label>
                <input class="form-control" id="phone" type="tel" placeholder="Número de telefone (whatsapp)" required="required" data-validation-required-message="Por favor digite seu telefone (whatsapp).">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Mensagem</label>
                <textarea class="form-control" id="message" rows="5" placeholder="Mensagem" required="required" data-validation-required-message="Digite uma mensagem."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button id="btnEnviar" type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Enviar</button>
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
          <h4 class="text-uppercase mb-4">Outros canais de comunicação:</h4>
          <a class="btn btn-outline-light btn-social mx-1" href="https://www.facebook.com/flavinhodjjf/">
            <i class="fab fa-fw fa-facebook-f"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="https://twitter.com/flavinhodjjf">
            <i class="fab fa-fw fa-twitter"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="https://www.instagram.com/flavinhodjjf/">
            <i class="fab fa-fw fa-instagram"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="https://www.youtube.com/flavinhodjjf">
            <i class="fab fa-fw fa-youtube"></i>
          </a>
           <a class="btn btn-outline-light btn-social mx-1" href="https://www.flavinhodjjf.net/">
            <i class="fab fa-fw fa-dribbble"></i>
          </a>
        </div>

        <!-- Footer About Text -->
        <div class="col-lg-4">
          <h4 class="text-uppercase mb-4">Ignorar</h4>
          <p class="lead mb-0">Freelance is a free to use, MIT licensed Bootstrap theme created by
            <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
        </div>

      </div>
    </div>
  </footer>

  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; TOPDJ$APP 2019</small>
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
                    $email2=print_r($vetorDj[$j][7], true);
                    $website2=print_r($vetorDj[$j][8], true);
                    //preg_match_all('!\d+!', print_r($vetorDj[$j][2], true), $telefone_2);
                    $tele=print_r($vetorDj[$j][2], true);
                    //$telefone_2=(int) filter_var($tele, FILTER_SANITIZE_NUMBER_INT);
                    $telefone_2 = preg_replace('/\D/', '', $tele); //transforma a string em numero (inclusive caracteres especiais)

                    //echo '<img class="img-fluid rounded mb-5" src="../img_djs/'.$nome_img2.'" alt="">';
                    echo '<a href="https://api.whatsapp.com/send?phone=55'.$telefone_2.'&amp;amp;text='.$nome_art2.'"><img class="img-fluid rounded mb-5" src="../img_djs/'.$nome_img2.'" alt=""></a>';
                    //echo '<a href="https://api.whatsapp.com/send?phone=5532988614906&amp;amp;text=FLAVINHO DJ JF" target="_blank"><img src="../img_djs/'.$nome_img2.'" alt=""></a>';
                            
                    echo '<br />';
                    echo '<a href="https://api.whatsapp.com/send?phone=55'.$telefone_2.'&amp;amp;text='.$nome_art2.'"><font size="5
                        "> Clique aqui para conversar no Whatsapp </font></a>';
                    echo '<!-- Portfolio Modal - Text -->'; //'.$cont_port.'/'.$cont_dj.'/'.$nome_img2.' '.$telefone_2.'
                    echo '<p class="mb-4">
                    
                    <b>Nome:</b>  '.$nome_art2.' &nbsp &nbsp<b>Telefone:</b> '.$tele.'<br />
                    <b>Cidade:</b> '.$cidade2.'  &nbsp &nbsp<b>Estado:</b> '.$estado2.'<br />';
                    if(!empty($descricao2)){
                        echo '<b>Descrição:</b> '.$descricao2.' ';
                        echo '<br />';
                    }
                    
                    if(!empty($email2)){
                        echo '<b>E-mail: </b><a href="mailto:'.$email2.'"> '.$email2.'</a>';
                        echo ' &nbsp &nbsp';
                    }
                    if(!empty($website2)){
                        echo '<b>Website: </b><a href="'.$website2.'"> '.$website2.'</a></p>';
                        //echo '<br />';
                    }
                    
                    
                    ?>
                    <br />
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
