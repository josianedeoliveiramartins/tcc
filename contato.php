<?php
include('includes_site/head.php');
include('includes_site/header.php');
?>

<style>
    .pagina-contato {
        max-width: 1000px;
        margin: 50px auto;
        padding: 0 20px;
    }

    .titulo-contato {
        text-align: center;
        margin-bottom: 40px;
    }

    .titulo-contato h1 {
        font-size: 32px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .titulo-contato p {
        font-size: 17px;
        color: #555;
    }

    .contatos {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
    }

    .card-contato {
        width: 320px;
        padding: 25px;
        border: 1px solid #ddd;
        border-radius: 10px;
        text-align: center;
        background-color: #fff;
    }

    .card-contato img {
        width: 55px;
        height: 55px;
        object-fit: contain;
        margin-bottom: 15px;
    }

    .card-contato h2 {
        font-size: 21px;
        margin-bottom: 10px;
    }

    .card-contato p {
        font-size: 17px;
        margin: 0;
    }

    .card-contato a {
        color: #198754;
        text-decoration: none;
        font-weight: bold;
    }

    .card-contato a:hover {
        text-decoration: underline;
    }
</style>


<div class="pagina-contato">

    <div class="titulo-contato">
        <h1>Entre em Contato</h1>

        <p>
            Entre em contato com a COOPCEEDO pelos canais abaixo.
        </p>
    </div>


    <div class="contatos">

        <!-- TELEFONE -->
        <div class="card-contato">

            <img
                src="midias/chamada-telefonica.png"
                alt="Telefone"
            >

            <h2>Telefone</h2>

            <p>
                <a href="tel:+555537561099">
                    (55) 3756-1099
                </a>
            </p>

        </div>


        <!-- CELULAR -->
        <div class="card-contato">

            <img
                src="midias/celular.png"
                alt="Celular"
            >

            <h2>Celular</h2>

            <p>
                <a href="tel:+5555992034549">
                    (55) 99203-4549
                </a>
            </p>

        </div>

    </div>

</div>


<?php
include('includes_site/footer.php');
?>