<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="./imgs/geral/logo.png">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&family=Roboto+Slab:wght@100..900&display=swap"
    rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/home.css" />
    <link rel="stylesheet" href="css/main.css" />

  <title>HOME</title>
</head>

<body>
  <br>
  <br>
  <nav class="navbar fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="imgs/geral/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top" />
      </a>
      <div class="container-navbaritem">
        <a style="text-decoration: none" href="#">
          <li class="item">Inicio</li>  
        </a>
        <a style="text-decoration: none" href="#noticia">
          <li class="item">Noticias</li>
        </a>
        <a style="text-decoration: none" href="#servicos">
          <li class="item">Serviços</li>
        </a>
        <a style="text-decoration: none" href="#sobre">
          <li class="item">Sobre</li>
        </a>
        <a style="text-decoration: none" href="#contato">
          <li class="item">Contato</li>
        </a>
        <a class='btnRel' href='relatos.php'>
          <li>Relatos</li>
          <img src="./imgs/home/icone relato.png" alt="">
        </a>
        <?php
        session_start();
        if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['password']) == true)) {
          unset($_SESSION['email']);
          unset($_SESSION['password']);
          echo
          "<a class='btnNav' href='./login/login.php'>
              <li>Login</li>
            </a>";
        } else {
          echo "  <a href='./perfil.php'>
            <img class='iconePerfil' src='./imgs/geral/iconePerfil.png' alt=''>
          </a>";
        }

        ?>
      </div>
    </div>
  </nav>



  <header class="partSuperior">
    <div class="inicio">
      <img src="imgs/home/banner.jpeg" alt="" class="banner w-100">
      <h1 class="textInicio">Toda criança merece uma<br>
        infância segura e <br>
        protegida
        <br>
        <a href="" style="text-decoration: none;"><button class="btnInicio">
            Denuncie Já
          </button></a>
      </h1>

    </div>

    <header class="myContainer">
      <div class="containerInter">
        <div class="boxRelogio">
          <img src="imgs/home/relogio.gif" alt="" class="imgRelogio">
          <p class="textRelogio">320 crianças e adolescentes sofrem situações de exploração sexual a cada 24 horas.</p>

        </div>
        <div class="separar"></div>
        <div class="boxNumerov">
          <p class="contador">0</p>

          <div class="textPor">das vítimas são meninas e, em sua maioria, negras.</div>
        </div>

      </div>

    </header>

    <br id="noticia">

    <div class="containerNoticias myContainer">
      <div class="boxTtl">
        <h1 class="ttlNoticias">Anjos da Guarda <h1 class="ttlNoticias"> News</h1>
        </h1>
      </div>
      <div class="boxNoticias">

        <div class="cardNot">
          <div class="boxcard">
            <h3 class="ttlCard">
              PF faz operação contra pornografia infantil pela internet em Santa Catarina </h3>
            <p class="descCad">
              Ator de 72 anos foi condenado a 1 ano e 10 dias de reclusão em regime aberto, além de multa; ele foi preso em flagrante acusado de guardar 240 fotos e vídeos de pornografia infantil. </p>
            <a href="https://www.cnnbrasil.com.br/nacional/operacao-da-pf-faz-operacao-contra-pornografia-infantil-pela-internet/"><button class="btnNoticia">
                <p class="textBtn">LEIA MAIS</p>
              </button>
            </a>
          </div>
        </div>
        <div class="cardNot">
          <h3 class="ttlCard">
            Justiça mantém condenação de ator José Dumont por armazenamento de pornografia infantil
          </h3>
          <p class="descCad">
            Ator de 72 anos foi condenado a 1 ano e 10 dias de reclusão em regime aberto, por ter pornografia infantil no celular.
          </p>
          <a href="https://www.cnnbrasil.com.br/nacional/justica-mantem-condenacao-de-ator-jose-dumont-por-armazenamento-de-pornografia-infantil/"><button class="btnNoticia">
              <p class="textBtn">LEIA MAIS</p>
            </button>
          </a>
        </div>
        <div class="cardNot">
          <div class="boxcard">
            <h3 class="ttlCard">
              MP faz operação contra suspeito de gravar vídeos de pornografia infantil
            </h3>
            <p class="descCad">
              Polícia Civil do Paraná cumpriram mandado de busca e apreensão contra um suspeito de produzir pornografia infantil em um clube tradicional
            </p>
            <a href="https://www.cnnbrasil.com.br/nacional/mp-faz-operacao-contra-suspeito-de-gravar-videos-de-pornografia-infantil-em-club/"><button class="btnNoticia">
                <p class="textBtn">LEIA MAIS</p>
              </button>
            </a>
          </div>
        </div>

      </div>
    </div>

    <div class="containerMvv myContainer">
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./imgs/home/missao.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./imgs/home/visao.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./imgs/home/valores.png" class="d-block w-100" alt="...">
          </div>
        </div>
      </div>
    </div>

    <div class="containerServ myContainer" id="servicos">
      <h2 id="servicos" class="ttl-categorias">SERVIÇOS</h2>
      <div class="boxCardServ">
        <a href="./sevicos.php#ONGs" class="e-card playing" style="text-decoration: none;">
          <div>
            <div class="image"></div>

            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>

            <div class="infotop">
              <img class="imgCradServ" src="imgs/home/planeta.png" alt="" />
              <br />
              UI / EX Designer
              <br />
              <div class="name">
                Área de ONG’s parceiras que oferecem ajuda e aceitam doações
              </div>
            </div>
          </div>
        </a>
        <a href="./sevicos.php#Psicologos" class="e-card playing" style="text-decoration: none;">
          <div>
            <div class="image"></div>

            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>

            <div class="infotop">
              <img class="imgCradServ" src="imgs/home/iconPsi.png" alt="" /><br />
              UI / EX Designer
              <br />
              <div class="name">
                Área de assistência psicológica com profissionais voluntários
              </div>
            </div>
          </div>
        </a>
        <a href="./sevicos.php#app" class="e-card playing" style="text-decoration: none;">
          <div>
            <div class="image"></div>

            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>

            <div class="infotop">
              <img class="imgCradServ" src="imgs/home/iconeDeske.png" alt="" /><br />
              UI / EX Designer
              <br />
              <div class="name">
                Temos como plataforma o site online e um app como facilitador
              </div>
            </div>
          </div>
        </a>

      </div>
    </div>
  </header>

  <div class="containerContato myContainer" id="contato">
    <div class="cardCont">
      <h2 class="ttlCont">
        Precisa de ajuda?<br />
        Entre em contato conosco!
        <br />
      </h2>
      <p class="textCont">
        Entre em contato com a gente da ADG,<br />
        estamos sempre dispostos a te ajudar e ouvir.<br />
        Nos contate em caso de perigo ou outras situações.
      </p>
      <div class="boxbtnCont">
        <div src="" alt="" class="imgbtnCont"></div>
        <a href="https://wa.me/5511910702803?text=Oi%20preciso%20de%20ajuda!!!" style="text-decoration: none;">
          <p class="textbtnCont">Entrar em contato</p>
        </a>
      </div>
    </div>

    <div class="boxformasCont">
      <li class="itemformCont">
        <img src="imgs/home/iconeTell.png" alt="" class="imgItemCont" />
        (11) 98284-3964
      </li>
      <li class="itemformCont">
        <img src="imgs/home/iconeEmail.png" alt="" class="imgItemCont" />
        adguardas@gmail.com
      </li>
      <li class="itemformCont">
        <img src="imgs/home/iconeLocal.png" alt="" class="imgItemCont" />
        R. Igarapé Água Azul, 70
      </li>
    </div>
  </div>
  <br><br>

  <footer class="rodape">
    <div class="boxlogo">
      <a href="" style="text-decoration: none;"><img class="rodLogo" src="imgs/geral/logo.png" alt="" /></a>
    </div>
    <div class="boxList">
      <div class="list">
        <li class="itemlistTTl">Sua Historia</li>
        <br />
        <a href="./relatos.php" style="text-decoration: none;">
          <li class="itemlist">Relatos</li>
        </a>
        <a href="./perfil.php" style="text-decoration: none;">
          <li class="itemlist">Perfil</li>
        </a>
        <a href="./relatos.php" style="text-decoration: none;">
          <li class="itemlist">Escrever</li>
        </a>
      </div>
      <div class="list">
        <li class="itemlistTTl">Serviços</li>
        <br />
        <a href="./sevicos.php#ONGs" style="text-decoration: none;">
          <li class="itemlist">Ong´s</li>
        </a>
        <a href="./sevicos.php#Psicologos" style="text-decoration: none;">
          <li class="itemlist">Psicologos</li>
        </a>
        <a href="./sevicos.php#app" style="text-decoration: none;">
          <li class="itemlist">Aplicativo</li>
        </a>
      </div>
      <div class="list">
        <li class="itemlistTTl">Fale Conosco</li>
        <br />
        <a href="https://wa.me/5511910702803?text=Oi%20preciso%20de%20ajuda!!!" style="text-decoration: none;">
          <li class="itemlist">Telefone</li>
        </a>
        <a href="./home.php#contato" style="text-decoration: none;">
          <li class="itemlist">E-email</li>
        </a>
        <a href="https://www.instagram.com/somos_adg?igsh=MTcxamdwMmRlcnNnYw==" style="text-decoration: none;">
          <li class="itemlist">Instagram</li>
        </a>
      </div>
    </div>
    <div class="redesSociais">
      <div class="cardRodape">
        <a class="social-link1" href="https://www.instagram.com/somos_adg?igsh=MTcxamdwMmRlcnNnYw==">
          <svg viewBox="0 0 16 16" class="bi bi-instagram" fill="currentColor" height="16" width="16"
            xmlns="http://www.w3.org/2000/svg" style="color: white">
            <path fill="white"
              d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
            </path>
          </svg>
        </a>
        <a class="social-link2" href="">
          <svg viewBox="0 0 16 16" class="bi bi-twitter" fill="currentColor" height="16" width="16"
            xmlns="http://www.w3.org/2000/svg" style="color: white">
            <path fill="white"
              d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z">
            </path>
          </svg>
          </a>
        <a class="social-link3" href="">
          <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" fill="#fff">
            <path
              d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z">
            </path>
          </svg>
        </a>
        <a class="social-link4" href="https://wa.me/5511910702803?text=Oi%20preciso%20de%20ajuda!!!">
          <svg viewBox="0 0 16 16" class="bi bi-whatsapp" fill="currentColor" height="16" width="16"
            xmlns="http://www.w3.org/2000/svg" style="color: white">
            <path fill="white"
              d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z">
            </path>
          </svg>
        </a>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="js/home.js"></script>
</body>

</html>