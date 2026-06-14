<?php
$slides = [
    [
        'imagem' => 'assets/drone.png',
        'tag'    => '🌱 Agro Power',
        'titulo' => 'O futuro da tecnologia e soluções integradas pelo agrônomo.',
        'texto'  => 'Conectando ciência, tecnologia e campo para colher resultados que vão além da produtividade.',
    ],
    [
        'imagem' => 'assets/campo.png',
        'tag'    => '🛰️ Monitoramento de Precisão',
        'titulo' => 'Veja sua fazenda de cima e tome decisões com dados reais.',
        'texto'  => 'Drones e satélites mapeiam cada hectare da sua propriedade em tempo real. Chega de achismo — agora você gerencia com ciência.',
    ],
  
];
?>

<section class="hero-static" style="background-color: #070a12; position: relative; overflow: hidden;">
    <div class="slider-container" style="position: relative; width: 100%; height: 580px; overflow: hidden;">

        <?php foreach ($slides as $i => $slide): ?>
        <div class="slide <?= $i === 0 ? 'active' : '' ?>" 
             style="background-image: url('<?= $slide['imagem'] ?>')">
        </div>
        <?php endforeach; ?>

        <!-- Overlay -->
        <div style="position: absolute; inset: 0; background: rgba(7,10,18,0.75); z-index: 1;"></div>

        <!-- Conteúdo dos slides -->
        <?php foreach ($slides as $i => $slide): ?>
        <div class="slide-content <?= $i === 0 ? 'active' : '' ?>"
             style="position: absolute; inset: 0; z-index: 2; display: flex; align-items: center; opacity: <?= $i === 0 ? '1' : '0' ?>; transition: opacity 1s ease; pointer-events: <?= $i === 0 ? 'auto' : 'none' ?>;">
            <div class="container">
                <div style="max-width: 650px;">
                    <h6 style="color: #00ffaa; font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 15px; font-family: sans-serif;">
                        <?= $slide['tag'] ?>
                    </h6>
                    <h1 style="font-size: 2.8rem; font-weight: 800; line-height: 1.2; margin-bottom: 20px; color: #fff; font-family: sans-serif;">
                        <?= $slide['titulo'] ?>
                    </h1>
                    <p style="color: #9ca3af; font-size: 1.15rem; line-height: 1.6; margin-bottom: 35px; font-family: sans-serif;">
                        <?= $slide['texto'] ?>
                    </p>
                    <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                        <a href="login.php?tab=cadastro" class="btn btn-primary btn-link" style="padding: 14px 32px; font-weight: 700; border-radius: 8px;">
                            Começar Agora <i class="fa-solid fa-arrow-right" style="margin-left: 8px;"></i>
                        </a>
                        <a href="#beneficios" class="btn btn-dark btn-link" style="padding: 12px 32px; border: 1px solid rgba(255,255,255,0.1); font-weight: 700; border-radius: 8px; color: #fff;">
                            Conhecer Plataforma
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <!-- Setas -->
        <button onclick="mudarSlide(-1)" style="position: absolute; left: 20px; top: 50%; transform: translateY(-50%); z-index: 3; background: rgba(255,255,255,0.1); border: none; color: #fff; width: 44px; height: 44px; border-radius: 50%; font-size: 1.2rem; cursor: pointer;">&#8592;</button>
        <button onclick="mudarSlide(1)"  style="position: absolute; right: 20px; top: 50%; transform: translateY(-50%); z-index: 3; background: rgba(255,255,255,0.1); border: none; color: #fff; width: 44px; height: 44px; border-radius: 50%; font-size: 1.2rem; cursor: pointer;">&#8594;</button>

        <!-- Bolinhas -->
        <div style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%); z-index: 3; display: flex; gap: 8px;">
            <?php foreach ($slides as $i => $slide): ?>
            <span class="dot <?= $i === 0 ? 'active' : '' ?>" onclick="irParaSlide(<?= $i ?>)"></span>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<style>
.slide { position: absolute; inset: 0; background-size: cover; background-position: center; opacity: 0; transition: opacity 1s ease; }
.slide.active { opacity: 1; }
.slide-content { position: absolute; inset: 0; z-index: 2; display: flex; align-items: center; opacity: 0; transition: opacity 1s ease; pointer-events: none; }
.slide-content.active { opacity: 1; pointer-events: auto; }
.dot { width: 10px; height: 10px; border-radius: 50%; background: rgba(255,255,255,0.4); cursor: pointer; transition: background 0.3s; display: inline-block; }
.dot.active { background: #00ffaa; }
</style>

<script>
let atual = 0;
const slides = document.querySelectorAll('.slide');
const contents = document.querySelectorAll('.slide-content');
const dots = document.querySelectorAll('.dot');
let intervalo = setInterval(() => mudarSlide(1), 5000);

function irParaSlide(n) {
    slides[atual].classList.remove('active');
    contents[atual].classList.remove('active');
    dots[atual].classList.remove('active');
    atual = n;
    slides[atual].classList.add('active');
    contents[atual].classList.add('active');
    dots[atual].classList.add('active');
}

function mudarSlide(direcao) {
    clearInterval(intervalo);
    let proximo = (atual + direcao + slides.length) % slides.length;
    irParaSlide(proximo);
    intervalo = setInterval(() => mudarSlide(1), 2000);
}
</script>