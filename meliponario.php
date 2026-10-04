<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Meliponário CEEDO | COOPCEEDO</title>

  <?php include 'includes_site/head.php'?>

  <style>

    /* SEÇÕES */

    .meliponario-section {
      padding: 60px 0;
    }

    .meliponario-section h2 {
      font-weight: 700;
      margin-bottom: 25px;
      color: #000000;
    }

    .meliponario-section p {
      color: #000000;
    }

    /* APRESENTAÇÃO */

    .meliponario-apresentacao {
      background: linear-gradient(135deg, #173d2b, #28583c, #173d2b);
      padding: 85px 20px;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .meliponario-apresentacao h1 {
      color: #ffffff;
      font-family: Georgia, "Times New Roman", serif;
      font-size: 48px;
      font-weight: 700;
      margin-bottom: 22px;
      letter-spacing: 1px;
    }

    .meliponario-apresentacao h3 {
      color: #f2d58a;
      font-family: Georgia, "Times New Roman", serif;
      font-size: 25px;
      font-weight: 400;
      line-height: 1.6;
      margin-bottom: 0;
    }

    .meliponario-apresentacao h1::after {
      content: "";
      display: block;
      width: 100px;
      height: 3px;
      background-color: #d9b65d;
      margin: 25px auto 0;
      border-radius: 5px;
    }

    /* NOSSA HISTÓRIA */

    .meliponario-historia {
      padding: 0;
      background-color: #eeeeee;
    }

    .meliponario-historia .row {
      align-items: stretch;
    }

    .meliponario-historia img {
      width: 100%;
      height: 100%;
      min-height: 650px;
      object-fit: cover;
      display: block;
    }

    .meliponario-historia-conteudo {
      padding: 35px 45px;
    }

    .meliponario-historia h2 {
      text-align: center;
      color: #000000;
      font-weight: 700;
      font-size: 48px;
      margin-bottom: 35px;
    }

    .meliponario-historia h5 {
      text-align: center;
      color: #000000;
      margin-bottom: 45px;
      font-size: 20px;
    }

    .meliponario-historia p {
      color: #000000;
      font-size: 17px;
      line-height: 1.4;
      text-align: justify;
      margin-bottom: 20px;
    }

    /* CARROSSEL */

    .meliponario-carrossel {
      max-width: 1320px;
      margin: 0 auto;
      position: relative;
      background-color: #f5f5f5;
      border-radius: 15px;
      overflow: hidden;
    }

    .meliponario-carrossel .carousel-item {
      height: 550px;
      background-color: #f5f5f5;
      border-radius: 15px;
      overflow: hidden;
      text-align: center;
    }

    .meliponario-carrossel .carousel-item img {
      width: 100%;
      height: 100%;
      object-fit: contain;
      object-position: center;
      display: block;
      margin: 0 auto;
    }

    /* SETAS MAIS PRÓXIMAS DAS FOTOS */

    .meliponario-carrossel .carousel-control-prev,
    .meliponario-carrossel .carousel-control-next {
      width: 60px;
      height: 60px;
      top: 50%;
      transform: translateY(-50%);
      opacity: 1;
      background-color: rgba(80, 80, 80, 0.55);
      border-radius: 50%;
      transition: background-color 0.3s ease;
    }

    .meliponario-carrossel .carousel-control-prev {
      left: calc(50% - 320px);
    }

    .meliponario-carrossel .carousel-control-next {
      right: calc(50% - 320px);
    }

    .meliponario-carrossel .carousel-control-prev:hover,
    .meliponario-carrossel .carousel-control-next:hover {
      background-color: rgba(50, 50, 50, 0.85);
    }

    .meliponario-carrossel .carousel-control-prev-icon,
    .meliponario-carrossel .carousel-control-next-icon {
      width: 24px;
      height: 24px;
      background-size: 100%;
    }

    /* MEIO AMBIENTE */

    .meliponario-ambiente {
      background-color: #e9ecef;
      padding: 65px 0;
    }

    .meliponario-ambiente h2 {
      text-align: center;
      color: #000000;
      font-weight: 700;
      margin-bottom: 40px;
    }

    .ambiente-conteudo {
      background-color: #ffffff;
      padding: 25px;
      border-radius: 12px;
      height: 100%;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
    }

    .ambiente-conteudo h4 {
      color: #000000;
      font-weight: 700;
      margin-bottom: 15px;
    }

    .ambiente-conteudo p {
      color: #000000;
      line-height: 1.8;
      text-align: justify;
      margin-bottom: 0;
    }

    /* MELIPONINOS */

    .meliponinos {
      padding: 65px 0;
      background-color: #ffffff;
    }

    .meliponinos h2 {
      text-align: center;
      color: #000000;
      font-weight: 700;
      margin-bottom: 25px;
    }

    .meliponinos p {
      color: #000000;
      font-size: 17px;
      line-height: 1.8;
      text-align: justify;
    }

    /* ALMANAQUE */

    .almanaque {
      background-color: #f8f9fa;
      padding: 55px 20px;
      border-radius: 12px;
      text-align: center;
    }

    .almanaque h2 {
      color: #000000;
      font-weight: 700;
    }

    .almanaque p {
      color: #000000;
    }

    /* RESPONSIVIDADE */

    @media (max-width: 768px) {

      .meliponario-apresentacao {
        padding: 65px 20px;
      }

      .meliponario-apresentacao h1 {
        font-size: 34px;
      }

      .meliponario-apresentacao h3 {
        font-size: 20px;
      }

      .meliponario-historia img {
        height: 400px;
        min-height: 0;
      }

      .meliponario-historia-conteudo {
        padding: 35px 20px;
      }

      .meliponario-historia h2 {
        font-size: 34px;
      }

      .meliponario-historia h5 {
        margin-bottom: 30px;
      }

      .meliponario-historia p {
        font-size: 16px;
      }

      .meliponario-carrossel .carousel-item {
        height: 350px;
      }

      .meliponario-carrossel .carousel-item img {
        width: 100%;
        height: 350px;
        object-fit: contain;
      }

      .meliponario-carrossel .carousel-control-prev,
      .meliponario-carrossel .carousel-control-next {
        width: 42px;
        height: 42px;
      }

      .meliponario-carrossel .carousel-control-prev {
        left: 10px;
      }

      .meliponario-carrossel .carousel-control-next {
        right: 10px;
      }

      .meliponario-section {
        padding: 40px 0;
      }

      .meliponario-ambiente,
      .meliponinos {
        padding: 40px 0;
      }

    }

  </style>

</head>

<body>

  <?php include 'includes_site/header.php'?>

  <main>

    <!-- APRESENTAÇÃO -->

    <section class="meliponario-apresentacao">

      <div class="container">

        <h1>Bem-Vindo ao Meliponário CEEDO</h1>

        <h3>
          Criação de Abelhas sem Ferrão do<br>
          Colégio Dr. Dorvalino Luciano de Souza
        </h3>

      </div>

    </section>

    <!-- NOSSA HISTÓRIA -->

    <section class="meliponario-historia">

      <div class="container-fluid">

        <div class="row g-0">

          <div class="col-12 col-md-5">

            <img
              src="/tcc/midias/abelha.1.jpg"
              alt="Abelhas sem ferrão do Meliponário CEEDO"
            >

          </div>

          <div class="col-12 col-md-7">

            <div class="meliponario-historia-conteudo">

              <h2>Nossa História</h2>

              <h5>Saiba os Fatos</h5>

              <p>
                O Projeto "Doce sabedoria Meliponícola", a partir do qual foi
                implantado o "Meliponário CEEDO", é ideia de alguns professores
                e estudantes após o conhecimento da atividade da meliponicultura
                - cultivo de abelhas sem ferrão. O projeto, que foi inscrito no
                edital do Fundo de Desenvolvimento Regional da Cooperativa de
                Crédito Sicredi em 2022, através do CNPJ do CPM do Colégio
                Estadual Dr. Dorvalino Luciano de Souza, foi contemplado com
                aporte financeiro aproximado de R$ 12.400,00 para sua efetivação.
              </p>

              <p>
                Durante o decorrer do ano de 2022, trabalhou-se na implantação
                do Meliponário. O recurso investido pelo Sicredi foi de extrema
                importância para essa atividade e possibilitou a aquisição de
                máquinas e equipamentos para que o processo todo fosse
                desenvolvido dentro da escola.
              </p>

              <p>
                O espaço físico utilizado para a realização das atividades para
                cultivo e manejo das abelhas, até a data da implantação do
                meliponário, era um galpão que servia como estoque de materiais
                que não possuíam mais utilidade.
              </p>

              <p>
                Com o recurso financeiro do Sicredi e com parcerias de empresas
                locais, foi possível adquirir ferramentas básicas de marcenaria
                e adequar o espaço para instalação de máquinas, bancadas, pia
                e tudo aquilo que auxilia no desenvolvimento de uma atividade
                prática com qualidade e segurança.
              </p>

              <p>
                A finalidade pedagógica dessa atividade na escola está ligada
                a cuidar do meio ambiente, da sustentabilidade e a aproveitar
                os recursos que a escola tem para que se possa desenvolver
                essa cultura com os estudantes.
              </p>

            </div>

          </div>

        </div>

      </div>

    </section>

    <!-- PRIMEIRO CARROSSEL -->

    <section class="meliponario-section">

      <div class="container">

        <h2 class="text-center mb-5">
          Conheça o Meliponário
        </h2>

        <div
          id="carrosselMeliponario"
          class="carousel slide meliponario-carrossel"
          data-bs-ride="false"
        >

          <div class="carousel-inner">

            <!-- PRIMEIRA FOTO -->

            <div class="carousel-item active">

              <img
                src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72uC2WejW3woegtT6g2GWlXp9DwFLk82600NPnKIIr9_fObrNZQ_AaK2eRTBadpCnyfBDGKd2llNq56TVBr70HZrBx9vxtv2V7qO_AW0qFeiHSnL09PARfA1J7RULdI0CT-2sB5Xs2EIlZeQvfa6P781tNjCNLfPe_cm5zhJoKG_O9mzY2bh-2miQHPu=w16383"
                class="d-block w-100"
                alt="Caixa de abelhas sem ferrão do Meliponário CEEDO"
              >

            </div>

            <!-- FOTO 2 -->

            <div class="carousel-item">

              <img
                src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72v52zKAjT8yp7le25Yds_8EUg2rxHPiguv_6RHKaIWBNIhmi15Sf5uVXNICfTgjfxRkSpm1-gth_sYaHb9XSihj_K4IR3oaXjH1dHD5wPjQhC9DD90yC3dZ6gX8BkujJ4bMXTx8W0aa8n4ypgDj5Kj2fyp5k9YuMItnTwiCBNEXE6kjmA12P1q0znwX=w16383"
                class="d-block w-100"
                alt="Meliponário CEEDO - Foto 2"
              >

            </div>

            <!-- FOTO 3 -->

            <div class="carousel-item">

              <img
                src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72vXpVAlwssoSCRQwDBS0U2hcPc-zcUQCZSUxaSKN9tFRBOL_741wiuAyhClBQwnEfWvgNNUq4QW8tf5kwbUq57y_toWcINLmQ3wsDdiYbZsiPn8JQ-ESmXoajFKze9xwzLpWJ6m0xuvHivnuuJcBFImZ5PBLNad4-l6tAPsBLhV1Aol7GAwtZU4GY5zUnQ=w16383"
                class="d-block w-100"
                alt="Meliponário CEEDO - Foto 3"
              >

            </div>

            <!-- FOTO 4 -->

            <div class="carousel-item">

              <img
                src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72s5BT9BR_FG9ZNNpnlPUJw8htomOz87R926BrjZpeBRNAhLLmpDAMm3J3pbvKcstNMKVPxR4T8eDT_7OmVwkBM1cVvDscGaMVJLR2AN1XAnKQilOnC88roCRAvwwXkMZvpUBzgWfsNHAyzs23sepKi1WTxZXLxllpK5lYWRoI2XfsaSoTkpRR-KO4V6lZs=w16383"
                class="d-block w-100"
                alt="Meliponário CEEDO - Foto 4"
              >

            </div>

            <!-- FOTO 5 -->

            <div class="carousel-item">

              <img
                src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72uphK55ie1fa8FIWAHR0yshhbWqOfQPaUkr_haqHxogh8154TC83XbzzHnuIAKQLxjITMq07sJKFOe_A_Kr2cKwxZsQFlLGwYT-cr0H_R2Fa7KUrcTa-ETLGhwTsTWmJTvZPxUHDHYqaDwwSBRNNGi48m1-ot3r8ZU0ARAWuvZtXev6rJPPK5Oh_dCd=w16383"
                class="d-block w-100"
                alt="Meliponário CEEDO - Foto 5"
              >

            </div>

            <!-- FOTO 6 -->

            <div class="carousel-item">

              <img
                src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72t1n25Um7JofPUY6aWIaiGZnolslvL70ICRF_mmaA9HoAp2rvhMmZJwO1OKRtiFya9PdYzULKhRLLTVl7TM-697G5UOUsFbiK8CApim8uh2fcgIhHdlf_wy2Bwy-IxT9UAXAn10al7tstoElnpnzWVngHdFXzDn5PrvVsUIsulic3eovCCYCgKXbzsa=w16383"
                class="d-block w-100"
                alt="Meliponário CEEDO - Foto 6"
              >

            </div>

            <!-- FOTO 7 -->

            <div class="carousel-item">

              <img
                src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72s6-DiJmFMUgawfnALI7ctphlUBN8CVfgvgT-rbl1qIURU0UkuquIKp6EKwusjX0YDw3fkgl1Iz8GwX7RBMIpAvXYQmVQkeBuAmeklz3k8FUihMxIuojslMp4hWN-DyLjZovitEcbAS3VPdoDK7QDCfRIUx_i9C--iA5MlabyilaNSa4BR0suErkvtzQy0=w16383"
                class="d-block w-100"
                alt="Meliponário CEEDO - Foto 7"
              >

            </div>

            <!-- FOTO 8 -->

            <div class="carousel-item">

              <img
                src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72uLsyvok9Q7D99224VWAEOODLp3xxHqJVmuJOnHKwCyFGWQX42jf9nCmXxmLqq99xsvSU0k6wN-PDLSek8cTF2vFeUtGMXXgheso8eRjH0z7kskuPS4WM9mql5ToFqDLJQRi4bIL5vWTk6s0IEF2CGfB-1VawPmXXJY6el5J9Ev2EAML4uarZFM7Q-a2gs=w16383"
                class="d-block w-100"
                alt="Meliponário CEEDO - Foto 8"
              >

            </div>

            <!-- FOTO 9 -->

            <div class="carousel-item">

              <img
                src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72tpyXKJqSscCRlnRQa8Uvvt_2HTt0ROVlDNp4kui6T8BhsHzme9uPM38XEYn4kDnQkwS-ddz6vfK03iNwCrRc4rKfMQzS8bv5mqg4JT-tAQ932ta18yELrxkc7aTkmz5yH7qH66ImHIHdd5o2icAVPO0uSsTPSp_bZoOWvXk6Az0gmLhufWicEAHdvoQkY=w16383"
                class="d-block w-100"
                alt="Meliponário CEEDO - Foto 9"
              >

            </div>

            <div class="carousel-item">

              <img
                src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72s4RsiVDc8kN9PatVwJMeQB1EMJrr3nH0XlfTbCtBCSApTc-tNBFMC1lemmyF4CZV04PDLkN5e_Uy7RJ7WNFiz9IpqC6kd1WaOyzEpnmahfKGRM_uRv9CPxZRBBZtlj9F0AUZ0gXFf5LXmj0jsm83XiXz3x6orrGZrYEDN_7HLXWiiv7Appe2WBginW=w16383"
                class="d-block w-100"
                alt="Registro do Meliponário CEEDO - Foto 10"
              >

          </div>

          <div class="carousel-item">
              <img
                src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72vwEhPk6B3Aq2LcS-Lqap4mkm-KqIaefGDypMmuwJtQxngTCw7WTifUicKj2OR4SPweE4Js9WoaERe-PaooIG2pXp2HXSyqrJldVpz4nuKbEYnKWYKP6Xye-tV8rF1ZXUGkimD7dbX5ffkC4li1Rn5zqbyokeAa0yWAwraJ7tJ9CMQlOLi0Kz132ueb=w16383"
                class="d-block w-100"
                alt="Imagem do Meliponário"
              >
          </div>

          <div class="carousel-item">
            <img
              src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72vdbFzwJZP2Vb9-2m9lI4S9qpoCyHXEeq-WSOR_NQxzXVSuKvG7iLlOYUpxUt7SwsEFKPQ9Y-mErRyhGMBEwAYM0RnPq5505cy10MyDEdUeO-0ps-371rtdSZamas_AYVsvDuo-uC29ZeaPaNId895bApcA-zzwfe-QZewfUxIz3ZpuafPP6x9841ZZ=w16383"
              class="d-block w-100"
              alt="Imagem do Meliponário"
            >
        </div>

        <div class="carousel-item">
            <img
              src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72ud2olwPC4ljmJ9xfwFnkd3nAPaLSmW2SAUv472yoGO5guvfgpVgCtnkiPb1RRrO4QVPLyhfsVkcCixAwk6Ac3TxWe9vqYBq453apV9ro4AjJ9M74LGRJFyjXSvBSR4O5hd17kNlTNgrz4oTe1RU7VuRdlmF-8ilk9siiH6s6NP29AGYijpMyC-991u=w16383"
              class="d-block w-100"
              alt="Imagem do Meliponário"
            >
        </div>
        
        <div class="carousel-item">
            <img
              src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72uV0kLzn_K7A1nfeewu1x4-oLX7p0npdi-1_XqDqcdX9CFJ2XF_9UmX-0YHiIWqAaE-myI7yPAa1cAsQz4J1JeFN4gQd0kW-O2ylFlO03NGotZzQSZ9f5jM1sgOtqzMqLkQwhBMw6-n6IwLTrRXidQluVFUxBW0X43Vhm0AAbn2ZnzJ28OBThwZgqeI1WY=w16383"
              class="d-block w-100"
              alt="Imagem do Meliponário"
            >
        </div>

        <div class="carousel-item">
            <img
              src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72sb4tf1_9FtgjrNcsvioMBs_deCsn7TTM5HnER4CoKEtHNluIOKzANp4psyc4HZlxgT-31GJvfQSwUoLC2mEGD7aUmvVYRHAbH9a8SeFbzIEJLVI2uZN0_CWfk8gJKWNbbr6b0IRZVkTKZp-WFrheiSY3hAtd5Zvif2_Wku4FKt6cDzIjapPZAOz3po=w16383"
              class="d-block w-100"
              alt="Imagem do Meliponário"
            >
        </div>

        <div class="carousel-item">
            <img
              src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72txbwuIsjD5zJpynHjAXBxntUmrqci8tSjnmZ8SZP_h0fz7ijmMEVkeiSMg8Wv5JzJem5oGAnQ4G6clb9DkBdrSN_oOhejyA6gD-fpAG96N3E8tA21W077hjHAljsKCf3g6IehJuv5ofNdI7KFcJ_MVwZGTxAENUSI_Ln46PzdxUwrRlkEC8xReEUMVOIo=w16383"
              class="d-block w-100"
              alt="Imagem do Meliponário"
            >
      </div>

      <div class="carousel-item">
            <img
              src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72s9Z5BEaUgIR8iWQnZ1-GV06V6_w0xpmP_CAu5VgjQioiYZcoomVfrv_UrePEWUqBk4v2GwdOORwIScZ3-eXwHjLT46od7_328ThlfhOZqwQfegST7eQFddi-HOzUoIbBd_MRle7y3d9CX0VjayN5pRSUzpJiW5rV3YMwiLDbbZm7qN1YKTul8H0hWPot4=w16383"
              class="d-block w-100"
              alt="Imagem do Meliponário"
            >
      </div>
      
      <div class="carousel-item">
            <img
              src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72uNcypDFhhZuBQWIpbqa-MW2uG2xzwyLKD499Y-5HeuhtDmWyICs2R0ZmBZcrdmEB-_ojtu2_ZyfwuC37awO93jQGOEuLUbTwvLgEoDPDA7S7rYFRt_xL7Ko_GcggTemdchM8dO0G89up_wdQh7c4Z8nn_sU760LjgAofWx_tlWOA6LRoyzU7cCfYWdonM=w16383"
              class="d-block w-100"
              alt="Imagem do Meliponário"
            >
      </div>

      <div class="carousel-item">
          <img
            src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72undNzFboqCBVUhZ4ME2I0a4qs5xf8qRYusbKxK5srNA11Q6Zz-WA2ganhQ7n11zKh5IKUFaXFVeFlozEF5x2baVEtQEaA7gY8YmVpLfBfuPtVRzjdLjisuXOptviwLCF_e_wuXq5BUaKUsfaYzfuSghkTUuiX2-ZjxsWCopjS4osc1nLFJnabI0Pg-3xk=w16383"
            class="d-block w-100"
            alt="Imagem do Meliponário"
          >
      </div>
    <div class="carousel-item">
         <img
            src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72vzcRDWWAPRmnmejQ5zZ_xAsswmfRXVlVNuK1zMT-SMebr_aXR4qyUP_w6HRoGKj5Oc2-AzVrr4hwkqGimcuFdK3Zny6T6s_LWVyUOcOcjWxu4ViQ-sF7iQNarpajyv5zCpUIWHU_NbqLpl5cRAsI7CFxalOesAtQ1FH9gtVAuyqA9W_I2mfiLDRnw1Gx0=w16383"
            class="d-block w-100"
            alt="Imagem do Meliponário"
          >
    </div>
    
    </div>

          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carrosselMeliponario"
            data-bs-slide="prev"
          >

            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Anterior</span>

          </button>

          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carrosselMeliponario"
            data-bs-slide="next"
          >

            <span class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Próxima</span>

          </button>

        </div>

      </div>

    </section>

    <!-- MEIO AMBIENTE -->

    <section class="meliponario-ambiente">

      <div class="container">

        <h2>Meio Ambiente</h2>

        <div class="row g-4">

          <div class="col-12">
            <div class="ambiente-conteudo">

              <h4>🌼 Importância da Polinização</h4>

              <p>
                Em uma sociedade marcada pelo consumo exacerbado e pelas
                dinâmicas do capitalismo brasileiro, torna-se imprescindível
                refletir sobre estratégias que minimizem os impactos
                ambientais. Além disso, é essencial promover a formação
                de cidadãos conscientes de seu papel na construção de
                comunidades sustentáveis e capazes de influenciar
                positivamente as futuras gerações por meio de suas ações
                no presente.
              </p>

            </div>
          </div>

          <div class="col-12">
            <div class="ambiente-conteudo">

              <h4>🌍 Impacto Ambiental</h4>

              <p>
                O estudo das abelhas sem ferrão, também conhecido como
                meliponicultura, tem despertado crescente interesse tanto
                individual quanto coletivo. Isso se deve ao fato de essas
                espécies desempenharem um papel essencial na polinização,
                processo diretamente ligado à preservação dos ecossistemas
                e à manutenção da biodiversidade.
              </p>

            </div>
          </div>

          <div class="col-12">
            <div class="ambiente-conteudo">

              <h4>🐝 Habitat das Abelhas</h4>

              <p>
                A escassez de informações sobre o manejo adequado dos
                enxames evidencia a necessidade de aprofundar os estudos
                sobre as abelhas sem ferrão. Compreender seu habitat
                natural, os métodos de alimentação, a organização das
                colmeias e seus hábitos é fundamental para fomentar
                práticas que contribuam para a conservação ambiental.
                A preservação dessas espécies é vital, uma vez que elas
                exercem funções ecológicas indispensáveis, especialmente
                no que se refere à polinização e ao equilíbrio dos
                sistemas naturais.
              </p>

            </div>
          </div>

        </div>

      </div>

    </section>

<!-- SEGUNDO CARROSSEL -->

<section class="meliponario-section">

  <div class="container">

    <h2 class="text-center mb-5">
      Registros do Projeto
    </h2>

    <div
      id="carrosselProjeto"
      class="carousel slide meliponario-carrossel"
      data-bs-ride="false"
    >

      <div class="carousel-inner">

        <?php for ($i = 1; $i <= 14; $i++) { ?>

          <div class="carousel-item <?php echo ($i == 1) ? 'active' : ''; ?>">

            <img
              src="/tcc/midias/meliponario/projeto<?php echo $i; ?>.jpg"
              class="d-block w-100"
              alt="Registro <?php echo $i; ?> do projeto Meliponário CEEDO"
            >

          </div>

        <?php } ?>

        <!-- FOTO 15 -->

        <div class="carousel-item">
            <img
              src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72uoQYMXkZ6fYTQdhbeO_UOcoeFG0tL75ej6SQHW5SZ0KBxSaC3uldzz4HyIE_OFnF7B6-fon3EUVPGhVUZw2gUhNkoSe3xLt2d_PlCg3gPPhjBVIHp_8mS6onJtwrHBcIsZEYplGTIE71FtzNYjiMi-L5AVMtFJH8UnFZXxqd2Esr-8755al3buoHXu=w16383"
              class="d-block w-100"
              alt="Foto 22 do projeto do Meliponário CEEDO"
            >
        </div>
        
        <div class="carousel-item">
          <img
            src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72sb74ns76_wMK8P2fwmllNSfpLK24RwGVD-ANhrIPhwtyPzgBRafoOOWkXLi5FJPThW15D3WJ2eaPzkRW9gOvPnz0cQbhSGZtDrB7UXYdFOf-W9ZTch4CBPTH6uYa2Zzx_nFkhhH0ur_-YLS9ecUnMH5voGM_owcfZLjCje6jzEiBmNJ5P9hTbr4SSo=w16383"
            class="d-block w-100"
            alt="Foto 15 do projeto do Meliponário CEEDO"
          >
        </div>

        <div class="carousel-item">
            <img
              src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72vYKc9QPkA9te1nGLEcFr2bqOfWYisnfTsWaOZNBCo6wWhg-WUIlMCL2IWfldV7TNC-H-k8N74u88iOkeRnhAIvnKp1EXXLcId8fvg7PO4oYGlhrvi63orkruCF2fkJlrJsXhgFHlpnD3jk9wpBIdFpcauDLWCKAild1MTsrRzF4GHzr7kn4j8zdsFWuB8=w16383"
              class="d-block w-100"
              alt="Foto 16 do projeto do Meliponário CEEDO"
            >
        </div>

        <div class="carousel-item">
            <img
              src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72uW4Qym_xmtYV0QJWxmeZ6b9MDGM1mhTadGi8avsIVpfzBVmU8b1WyuvHyTu5pvCzuue1g299BHgkVcEGXts1p7YlgGQN0W2vMsxFJtrJ8-9iqFbiTu3I1AcHPeMey1QDyCAFe8-iN7_hMyP3I7K355L7BJhF6uLILaygQVJgoKV9-Iv5k3N_TPPf2Q=w16383"
              class="d-block w-100"
              alt="Foto 17 do projeto do Meliponário CEEDO"
            >
       </div>

      <div class="carousel-item">
          <img
            src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72stTqrytcZDvh6Abgtux1MFqt2VU06p4gfXxf3NqStqzFufSJfxkwBahMlID2_YqDzrsMOJbEGGTsQzku6S7tMRiaN7rnPV7BPtkkcBbYzlfMfEEoIftVrypDtcMRVrzF838REjREoMAYjEIJyyAGd8RSmqtLMVQoTfNvk-I4DZ1AqpuT6JJ_JBUgA54pM=w16383"
            class="d-block w-100"
            alt="Foto 18 do projeto do Meliponário CEEDO"
          >
      </div>
      
      <div class="carousel-item">
          <img
            src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72tHCWFcdAgNnjtfxgQgndOGYRmnEvnOLtAMyIDlS4_gXVsb2gYZO5C98e8r-j2yLa_DPS-oVFWCdfMSkxciGOqrMW8GVpBqm-6ltTzmusdjSMGE7mCBkXQ6vPXfbu10nhKu4MHlZ_bDCdQV5_yUxb138w4bTNIcg7vIMDH2iZOPWPP2KNaiU8kvEthN=w16383"
            class="d-block w-100"
            alt="Foto 19 do projeto do Meliponário CEEDO"
          >
        </div>
        <div class="carousel-item">
            <img
              src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72ulGnBATQ-IhJwV33jwa4g8-Y-0FK2BkkEgsNTSabEIakox-PI7MTTe3esiMWbRnQxrHl4MPvfE2a22FJalm7BOppDiCMX_m4DrktmjPP39zG2h41zAdSLo7ed2SVeQcaanYREHEQDPCYp_lPdyNOx18-IQpFCfHWuAXqiRCIxlT_QU9cZETh6adidu=w16383"
              class="d-block w-100"
              alt="Foto 20 do projeto do Meliponário CEEDO"
            >
        </div>
        <div class="carousel-item">
            <img
              src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72tcZoHM5h3LhG85kH4euKCin7vODA-qHD6OGC13oC_HDb7TcITWhIeXlWrx14AQGb6HnWyKJIv5voq8AXeqc7hs3_gZdLlXxeQpVZNUj6lplbeRwSsqYl3EWckgOY0D47EkbJONcHkj0iErucFXnCFH6IUwqx90rsyLBrnxsTvoLtTLArbkupNw8rqne_I=w16383"
              class="d-block w-100"
              alt="Foto 21 do projeto do Meliponário CEEDO"
            >
        </div>

        <div class="carousel-item">
            <img
              src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72tbLd7si4m49EjY8Enq-cWO-dv1uthdotSykNhldwugwl7ZIpLWHYpSW6HvQpBTOe8RyX_h1I1WVZY0Zu8iv_C5aEP_HS0WodgOLbuol54HIGspPTArgoXSrXxlQB8oHUQx_viLaX4ag8ViuR7mGNEeuTZ4UIg-Rm0w-SALR38jqoDT0KAJX9w8gypAPlE=w16383"
              class="d-block w-100"
              alt="Foto 23 do projeto do Meliponário CEEDO"
            >
        </div>

        <div class="carousel-item">
            <img
              src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72u0l-mUHaA9vb_zyRKQsTl7tjABFvmseFLwh2Vxz7wvs1BJqFqppleTICeCJep0fSsYdU9g2RxlsVN2Gb9NA7Cn7_50v5_GUUpSBRgngbP8RhH06pbnAglRHI0D-ZFQw_GlSaL6vtHNM4ofZVG6ng7kMidMp_qh7Jrv9G3pBaR7vJaKfHn3cEfUlQ7w=w16383"
              class="d-block w-100"
              alt="Foto 24 do projeto do Meliponário CEEDO"
            >
        </div>

        <div class="carousel-item">
            <img
              src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72vugpyeta4YCpyqFkjLTP4Mw5ZmYl05oC8viJJ4Vo37hsh_-WakkvNC90C_IOa5plBslDtZZwgTw1APt-yl6q0dbk87Zg0D50rt-sC1xuXcvf9NLQOySpHBejZJDT28xLHOEaub77eQBXVHUvCgZgjtX1YNjvzzVkTP0OUmhXUn3O7yAQgpDxjX-w=w16383"
              class="d-block w-100"
              alt="Foto 25 do projeto do Meliponário CEEDO"
            >
        </div>

        <div class="carousel-item">
              <img
                src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72td4mVnrrSTEQpFCpIpjl9WvvFoZ-dszOC7Eq5xrBMucH6aNVWSMII8XEj4gtXYBAhvjkdlUwxC2r7dSS3PckNHXxvq6qS8YGx8lYMTzVzwszKtY-F81nuf7bIxsbei6pCDzvL4ImaIK1DqqCTPoCxtdmreyeDYert01_oW6OQJC52Fh8JVyEwYyFvWags=w16383"
                class="d-block w-100"
                alt="Foto 26 do projeto do Meliponário CEEDO"
              >
        </div>

        <div class="carousel-item">
          <img
            src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72ueYxQzilRyM8_2NmDeCihN7MR_WQ0U5vaiWibRDCO-RAkF_ROrT4v7Jxyy6mKv_iA_OpPskInXxZWRzaz2nJIDH_fbwktYrNu7cYidAAefuuHOPOlKN_t1e1Osfu9oHv7OLmEazdoarOdacq61db6AGA-RswmCOmU4acHF7SjgCSN8VDTeH0-0umC3gpo=w16383"
            class="d-block w-100"
            alt="Foto 27 do projeto do Meliponário CEEDO"
          >
        </div>

        <div class="carousel-item">
            <img
              src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72ucoeH6wmDBSIh0kKejMNH3XZH4ha8gNJlpxlvh-2OaaICSLPAksgO3909C3wMRy3WEjl_BT2TpEKXJAW6C5ibGsyK1AC50j08NNKN7evGufN5eKVl_pHBQw7-4ZZbLi3fWKIwGTDd_nFQkkrfZm8DqdTCwI3RFyS1DvrYAq-Q7t7csOW698IAE7LYwnuI=w16383"
              class="d-block w-100"
              alt="Foto 28 do projeto do Meliponário CEEDO"
            >
        </div>

      </div>

      <!-- CONTROLES -->

    <!-- BOTÃO ANTERIOR -->
          
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carrosselProjeto"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          </button>

          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carrosselProjeto"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
          </button>

    </div>

  </div>

</section>

          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carrosselProjeto"
            data-bs-slide="prev"
          >

            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Anterior</span>

          </button>

          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carrosselProjeto"
            data-bs-slide="next"
          >

            <span class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Próxima</span>

          </button>

        </div>

      </div>

    </section>

    <!-- MELIPONINOS -->

    <section class="meliponinos bg-light">

      <div class="container">

        <h2>Meliponinos</h2>

        <p>
          As espécies de abelhas sem ferrão que apresentam maior
          adaptabilidade às condições ambientais do estado do Rio Grande
          do Sul são: Manduri, Canudo, Mandaçaia, Jataí e Mirim. A partir
          da análise dessas seis espécies, serão abordadas suas
          respectivas características biológicas e ecológicas, bem como
          a relevância que cada uma desempenha no contexto da polinização
          e na preservação dos ecossistemas locais.
        </p>

      </div>

    </section>

    <!-- ALMANAQUE -->

    <section class="meliponario-section">

      <div class="container">

        <div class="almanaque shadow-sm">

          <h2>Almanaque</h2>

          <p>
            Conheça mais sobre as abelhas sem ferrão, suas espécies
            e a importância da meliponicultura.
          </p>

          <a
            href="almanaque.php"
            class="btn btn-success mt-3"
          >
            Acessar Almanaque
          </a>

        </div>

      </div>

    </section>

  </main>

  <?php include 'includes_site/footer.php'?>

</body>
</html>