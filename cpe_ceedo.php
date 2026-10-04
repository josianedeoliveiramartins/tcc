<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>CPE CEEDO | COOPCEEDO</title>

  <?php include 'includes_site/head.php'?>

  <style>

    .cpe-section {
      padding: 60px 0;
    }

    .cpe-section h2 {
      font-weight: 700;
      margin-bottom: 25px;
      color: #000000;
    }

    .cpe-section p {
      color: #000000;
    }

    .cpe-apresentacao {
      padding: 70px 0;
      text-align: center;
    }

    .cpe-apresentacao h2 {
      color: #000000;
      font-weight: 700;
      margin-bottom: 30px;
    }

    .cpe-apresentacao p {
      font-size: 17px;
      line-height: 1.8;
      text-align: justify;
      margin-bottom: 20px;
      color: #000000;
    }

    .cpe-card {
      height: 100%;
      border: none;
      border-radius: 12px;
      transition: transform 0.3s ease;
    }

    .cpe-card:hover {
      transform: translateY(-5px);
    }

    .cpe-icon {
      font-size: 35px;
      color: #198754;
      margin-bottom: 15px;
    }

    .cpe-integrante {
      height: 100%;
      border: none;
      border-radius: 12px;
      padding: 30px 22px;
      text-align: center;
      transition: transform 0.3s ease;
      color: #000000;
    }

    .cpe-integrante:hover {
      transform: translateY(-5px);
    }

    /* FOTOS DOS INTEGRANTES */

    .foto-integrante {
      width: 150px;
      height: 150px;
      object-fit: cover;
      object-position: center;
      border-radius: 50%;
      display: block;
      margin: 0 auto 20px;
    }

    .cpe-integrante h5 {
      color: #000000;
      font-weight: 700;
      margin-bottom: 15px;
    }

    .cpe-integrante p {
      color: #000000;
      line-height: 1.7;
      margin-bottom: 15px;
    }

    .cpe-integrante strong {
      color: #000000;
    }

    .cpe-regimento {
      background-color: #f8f9fa;
      padding: 45px 20px;
      border-radius: 12px;
    }

    .cpe-regimento h2,
    .cpe-regimento p {
      color: #000000;
    }

  </style>

</head>

<body>

  <?php include 'includes_site/header.php'?>

  <main>

    <!-- APRESENTAÇÃO DO CPE -->

    <section class="cpe-apresentacao bg-light">

      <div class="container">

        <h2>O QUE É O CPE CEEDO?</h2>

        <p>
          CPE (Conselho de Participação Estudantil) é um espaço
          de protagonismo juvenil que permite aos estudantes da
          Rede Estadual do Rio Grande do Sul participar ativamente
          da gestão democrática das escolas. Ele foi criado em 2024
          como projeto piloto, com o objetivo de estimular liderança,
          cidadania, comunicação e resolução de problemas,
          fortalecendo a voz dos alunos na construção de soluções
          para questões que impactam diretamente a vida escolar.
        </p>

        <p>
          O CPE busca garantir que alunos e professores tenham voz
          ativa nas decisões escolares, promovendo o protagonismo
          estudantil e transformando as escolas em ambientes de
          diálogo e construção coletiva. Além disso, contribui para
          o desenvolvimento de habilidades essenciais para a vida
          acadêmica e social, como gestão de projetos, comunicação
          e participação cidadã.
        </p>

        <p>
          Entre as principais atribuições dos líderes estão
          representar os interesses dos estudantes, promover
          iniciativas de protagonismo juvenil, organizar projetos
          que envolvam a comunidade escolar e estabelecer
          comunicação entre escolas, líderes regionais e a Seduc.
          Durante o ano, os líderes participam de uma trilha de
          desenvolvimento com workshops e mentorias sobre cidadania,
          gestão de projetos, inovação social, inteligência
          emocional, retórica e storytelling. Também têm a
          oportunidade de participar de eventos estaduais e
          nacionais, incluindo intercâmbios programados em
          instituições de referência e centros de inovação.
        </p>

      </div>

    </section>


    <!-- IMAGEM DO CPE -->

    <section class="cpe-section">

      <div class="container text-center">

        <img
          src="/tcc/midias/cpe_ceedo.png"
          alt="Centro de Pesquisa e Extensão CEEDO"
          class="img-fluid rounded shadow"
          style="max-width: 650px; width: 100%;"
        >

      </div>

    </section>


    <!-- INTEGRANTES -->

    <section class="cpe-section bg-light">

      <div class="container">

        <h2 class="text-center">INTEGRANTES</h2>

        <p class="text-center mb-5">
          Conheça os integrantes do Conselho de Participação
          Estudantil do CEEDO.
        </p>

        <div class="row justify-content-center g-4">

          <!-- INTEGRANTE 1 -->

          <div class="col-12 col-md-6 col-lg-4">

            <div class="card cpe-integrante shadow-sm">

              <img
                src="/tcc/midias/integrantesCPE/beto.1.jpg"
                alt="Foto de Alberto Moi"
                class="foto-integrante"
              >

              <h5>Alberto Moi</h5>

              <p>
                Professor Coordenador do CPE Escolar CEEDO.
              </p>

              <p>
                <strong>Formação:</strong><br>
                Licenciado em Matemática e Mestre em Modelagem Matemática.
              </p>

              <p>
                <strong>Atuação:</strong><br>
                Professor da Rede Pública Estadual do RS e da Rede
                Municipal de Cerro Grande.
              </p>

            </div>

          </div>


          <!-- INTEGRANTE 2 -->

          <div class="col-12 col-md-6 col-lg-4">

            <div class="card cpe-integrante shadow-sm">

              <img
                src="/tcc/midias/integrantesCPE/rebeka.2.jpg"
                alt="Foto do integrante 2"
                class="foto-integrante"
              >

              <h5>Rebeka de Oliveira </h5>

              <p>
                Líder Ensino médio 
              </p>

              <p>
                <strong>Formação:</strong><br>
                Ensino Médio Técnico em Informática Incompleto
              </p>

              <p>
                <strong>Atuação:</strong><br>
                Aluna do Colégio Estadual Dr. Dorvalino Luciano de Souza de Cerro Grande
              </p>

            </div>

          </div>


          <!-- INTEGRANTE 3 -->

          <div class="col-12 col-md-6 col-lg-4">

            <div class="card cpe-integrante shadow-sm">

              <img
                src="/tcc/midias/integrantesCPE/isaias.3.jpg"
                alt="Foto do integrante 3"
                class="foto-integrante"
              >

              <h5>Isaias Steffens</h5>

              <p>
                Líder Ensino médio (suplente)
              </p>

              <p>
                <strong>Formação:</strong><br>
                Ensino Médio Técnico em Informática Incompleto 
              </p>

              <p>
                <strong>Atuação:</strong><br>
                Aluno do Colégio Estadual Dr. Dorvalino Luciano de Souza de Cerro Grande
              </p>

            </div>

          </div>


          <!-- INTEGRANTE 4 -->

          <div class="col-12 col-md-6 col-lg-4">

            <div class="card cpe-integrante shadow-sm">

              <img
                src="/tcc/midias/integrantesCPE/jamili.4.jpg"
                alt="Foto do integrante 4"
                class="foto-integrante"
              >

              <h5>Jamili Gabriéli Casagrande </h5>

              <p>
                Líder Ensino médio
              </p>

              <p>
                <strong>Formação:</strong><br>
                Ensino Médio Incompleto 
              </p>

              <p>
                <strong>Atuação:</strong><br>
                Aluna do Colégio Estadual Dr. Dorvalino Luciano de Souza de Cerro Grande
              </p>

            </div>

          </div>


          <!-- INTEGRANTE 5 -->

          <div class="col-12 col-md-6 col-lg-4">

            <div class="card cpe-integrante shadow-sm">

              <img
                src="/tcc/midias/integrantesCPE/valentine.5.jpg"
                alt="Foto do integrante 5"
                class="foto-integrante"
              >

              <h5>Valentine Oliveira </h5>

              <p>
                Líder Ensino médio (suplente)
              </p>

              <p>
                <strong>Formação:</strong><br>
                Ensino Médio Incompleto 
              </p>

              <p>
                <strong>Atuação:</strong><br>
                Aluna do Colégio Estadual Dr. Dorvalino Luciano de Souza de Cerro Grande.
              </p>

            </div>

          </div>


          <!-- INTEGRANTE 6 -->

          <div class="col-12 col-md-6 col-lg-4">

            <div class="card cpe-integrante shadow-sm">

              <img
                src="/tcc/midias/integrantesCPE/joao.6.jpg"
                alt="Foto do integrante 6"
                class="foto-integrante"
              >

              <h5>João Vitor Bonfanti</h5>

              <p>
                Líder Ensino Fundamental
              </p>

              <p>
                <strong>Formação:</strong><br>
                Ensino Fundamental Incompleto 
              </p>

              <p>
                <strong>Atuação:</strong><br>
                Aluno do Colégio Estadual Dr. Dorvalino Luciano de Souza de Cerro Grande
              </p>

            </div>

          </div>


          <!-- INTEGRANTE 7 -->

          <div class="col-12 col-md-6 col-lg-4">

            <div class="card cpe-integrante shadow-sm">

              <img
                src="/tcc/midias/integrantesCPE/micheli.7.jpg"
                alt="Foto do integrante 7"
                class="foto-integrante"
              >

              <h5>Micheli Brizolla Bernardi </h5>

              <p>
                Líder Ensino Fundamental (suplente)
              </p>

              <p>
                <strong>Formação:</strong><br>
                Ensino Fundamental Incompleto
              </p>

              <p>
                <strong>Atuação:</strong><br>
                Aluna do Colégio Estadual Dr. Dorvalino Luciano de Souza de Cerro Grande
              </p>

            </div>

          </div>


          <!-- INTEGRANTE 8 -->

          <div class="col-12 col-md-6 col-lg-4">

            <div class="card cpe-integrante shadow-sm">

              <img
                src="/tcc/midias/integrantesCPE/bernardo.8.jpg"
                alt="Foto do integrante 8"
                class="foto-integrante"
              >

              <h5>Bernardo de Vargas Troian Danieli</h5>

              <p>
                Líder Ensino Fundamental
              </p>

              <p>
                <strong>Formação:</strong><br>
                Ensino Fundamental Incompleto 
              </p>

              <p>
                <strong>Atuação:</strong><br>
                Aluno do Colégio Estadual Dr. Dorvalino Luciano de Souza de Cerro Grande
              </p>

            </div>

          </div>


          <!-- INTEGRANTE 9 -->

          <div class="col-12 col-md-6 col-lg-4">

            <div class="card cpe-integrante shadow-sm">

              <img
                src="/tcc/midias/integrantesCPE/amanda.9.jpg"
                alt="Foto do integrante 9"
                class="foto-integrante"
              >

              <h5>Amanda Elisa Censi Rosa </h5>

              <p>
                Líder Ensino Fundamental (suplente)
              </p>

              <p>
                <strong>Formação:</strong><br>
                Ensino Fundamental Incompleto
              </p>

              <p>
                <strong>Atuação:</strong><br>
                Aluna do Colégio Estadual Dr. Dorvalino Luciano de Souza de Cerro Grande
              </p>

            </div>

          </div>

        </div>

      </div>

    </section>


    <!-- REGIMENTO -->

    <section class="cpe-section">

      <div class="container">

        <div class="cpe-regimento text-center">

          <i class="bi bi-file-earmark-text cpe-icon"></i>

          <h2>Regimento do CPE</h2>

          <p>
            Consulte o documento com as normas e orientações
            relacionadas ao funcionamento do Centro de Pesquisa
            e Extensão.
          </p>

          <a
            href="/tcc/midias/documentos/regimento-cpe.pdf"
            target="_blank"
            rel="noopener noreferrer"
            class="btn btn-success mt-3"
          >
            Acessar Regimento
          </a>

        </div>

      </div>

    </section>

  </main>

  <?php include 'includes_site/footer.php'?>

</body>
</html>