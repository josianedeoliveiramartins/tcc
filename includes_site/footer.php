<style>
html, body{
    height:100%;
    margin:0;
}

body{
    min-height:100vh;
    display:flex;
    flex-direction:column;
    background-color: #FDFBF7;
}

main{
    flex:1;
}

/* FOOTER */

.footer{
    width:100%;
    margin-top:auto;
    flex-shrink:0;
    background: #0b4c96;
    color:#fff;
}

.footer-content{
    max-width:1200px;
    margin:auto;
    padding:50px 25px;
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:40px;
}

.footer h2{
    font-size:22px;
    margin-bottom:18px;
    border-left:4px solid #64b5f6;
    padding-left:10px;
}

.footer p{
    line-height:1.7;
    color:#e3f2fd;
}

.footer-links,
.footer-social{
    display:flex;
    flex-direction:column;
}

.footer a{
    color:#fff;
    text-decoration:none;
    margin:8px 0;
    transition:.3s;
}

.footer a:hover{
    color:#90caf9;
    padding-left:8px;
}

.footer-copy{
    text-align:center;
    padding:18px;
    background:#0a2e6d;
    font-size:14px;
    border-top:1px solid rgba(255,255,255,.15);
}
</style>
<footer class="footer">
    <div class="footer-content">

        <div class="footer-about">
            <h2>Sobre</h2>
            <p>
                Sou estudante do curso Técnico em Informática do CEEO e desenvolvo
                experiências interativas e jogos digitais. Explore nossa biblioteca
                de games gratuitos e títulos premium.
            </p>
        </div>

        <div class="footer-links">
            <h2>Links</h2>
            <a href="#">Nossos Serviços</a>
            <a href="#">Política de Privacidade</a>
            <a href="#">Termos de Serviço</a>
        </div>

        <div class="footer-social">
            <h2>Redes Sociais</h2>
            <a href="https://www.instagram.com/suelen_dossantos7/" target="_blank">
                Instagram
            </a>
        </div>

    </div>

    <div class="footer-copy">
        <p>© 2026 Terceirão 3K26 Play. Todos os direitos reservados.</p>
    </div>
</footer>

