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
      color: #00000093;
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
      color: #595a68;
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

.cpe-integrante {
  background: linear-gradient(135deg, #edc48e, #e5efe7);
  padding: 55px 35px;
  border: 1px solid #dce8dd;
  border-radius: 20px;
  box-shadow: 0 8px 25px rgba(30, 75, 45, 0.08);
  font-family: 'Poppins', sans-serif;
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

/* REGIMENTO E FORMULÁRIOS */

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

.cpe-regimento {
  background: linear-gradient(135deg, #edc48e, #e5efe7);
  padding: 55px 35px;
  border: 1px solid #dce8dd;
  border-radius: 20px;
  box-shadow: 0 8px 25px rgba(30, 75, 45, 0.08);
  font-family: 'Poppins', sans-serif;
}

.cpe-regimento h2 {
  color: #20583a;
  font-size: 27px;
  font-weight: 700;
  margin-bottom: 18px;
}

.cpe-regimento p {
  color: #155727;
  font-size: 14px;
  line-height: 1.8;
}

.cpe-regimento .cpe-icon {
  color: #398458;
  font-size: 43px;
  margin-bottom: 12px;
}

.cpe-regimento hr {
  border: 0;
  border-top: 2px solid #eebe10;
  opacity: 1;
  max-width: 1280px;
  margin-left: auto;
  margin-right: auto;
}

.cpe-regimento .btn {
  background: #f7dc0e;
  border: 1px solid #060501;
  border-radius: 10px;
  padding: 12px 25px;
  color: #060101;
  font-family: 'Poppins', sans-serif;
  font-size: 14px;
  font-weight: 500;
  transition: all 0.25s ease;
}

.cpe-regimento .btn:hover {
  background: #1e5d38;
  border-color: #1e5d38;
  color: #ffffff;
  transform: translateY(-2px);
}

@media (max-width: 576px) {
  .cpe-regimento {
    padding: 40px 20px;
  }

  .cpe-regimento h2 {
    font-size: 23px;
  }

  .cpe-regimento .btn {
    width: 100%;
    max-width: 320px;
    white-space: normal;
  }
}

    .cpe-regimento h2,
    .cpe-regimento p {
      color: #000000;
    }


/* FUNDO AMARELO-CLARO EM TODA A PÁGINA CPE */

html,
body,
main {
  background-color: #FFF9E8 !important;
}

/* Remove os fundos do Bootstrap das seções */
main section,
main section.bg-light,
.cpe-apresentacao,
.cpe-section {
  background: #FFF9E8 !important;
}


  </style>

</head>

<body>

  <?php include 'includes_site/header.php'?>

  <main>

    <!-- APRESENTAÇÃO DO CPE -->

    <section class="cpe-apresentacao bg-light">

      <div class="container">

        <h1>O QUE É O CPE CEEDO?</h1>
        <br>

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


    <!-- INTEGRANTES -->

    <section class="cpe-section bg-light">

      <div class="container">

        <h1 class="text-center">INTEGRANTES</h1>

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



<!-- REGIMENTO E FORMULÁRIOS -->

<section class="cpe-section">
  <div class="container">

    <div class="cpe-regimento text-center">

      <!-- REGIMENTO -->
      <i class="bi bi-file-earmark-text cpe-icon"></i>

      <h2>Regimento do CPE</h2>

      <p>
        Conheça as normas e diretrizes do Conselho de Participação Estudantil.
      </p>

    <a href="https://drive.google.com/drive/folders/14-ZmPF3sM7sRqSGgNPg67769uaMilQYh"
      target="_blank"
      rel="noopener noreferrer"
      class="btn btn-warning">
        Acesse agora nosso Regimento
    </a>


      <hr class="my-5">

      <!-- FORMULÁRIOS -->
      <h2>Formulários</h2>

      <p class="mt-3 mb-4">
        Mande sua sugestão ao CPE.
      </p>

      <a
        href="https://docs.google.com/forms/d/e/1FAIpQLSf36l4Y0eC7HhwD1GBwGCK6-btORp-hHD9PfttmCv7nrlD7bQ/viewform"
        target="_blank"
        rel="noopener noreferrer"
        class="btn btn-success"
      >
        Formulário de sugestão
      </a>

      <hr class="my-5">

      <p class="mb-4">
        Participe do CPE.
      </p>

      <a
        href="https://docs.google.com/forms/d/e/1FAIpQLSeyESo99ZOuSAMZ8vbjRnCAzyqqb7UMzOBdX4QqjSN9a0U3SA/viewform"
        target="_blank"
        rel="noopener noreferrer"
        class="btn btn-success"
      >
        Formulário de inscrição
      </a>

    </div>

  </div>
</section>

  </main>

  <?php include 'includes_site/footer.php'?>

</body>
</html>