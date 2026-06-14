<?php
// ============================================
// CONFIGURAÇÕES DO RODAPÉ — edite aqui
// ============================================
$empresa = [
    'nome'      => 'Agro Power',
    'descricao' => 'Conectando ciência, tecnologia e campo para colher resultados que vão além da produtividade. Soluções agronômicas inteligentes para o produtor rural moderno.',
    'endereco'  => 'Rua Exemplo, 123 — Bairro Centro',
    'cidade'    => 'Cidade Exemplo — MG',
    'email'     => 'contato@agropower.com.br',
    'telefone'  => '(38) 9999-9999',
    'whatsapp'  => '5538999797257',
];

$horarios = [
    'Segunda a Sexta' => '08h às 18h',
    'Sábado'          => '08h às 12h',
    'Domingo'         => 'Fechado',
];

$redes = [
    'instagram' => 'https://instagram.com/agropower',
    'facebook'  => 'https://facebook.com/agropower',
    'whatsapp'  => 'https://wa.me/5538999797257',
];
// ============================================
?>

<footer style="background: #070a12; border-top: 1px solid rgba(255,255,255,0.05); padding: 60px 0 20px;">
    <div class="container">

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 40px; margin-bottom: 40px;">

            <!-- Logo e descrição -->
            <div>
                <div style="font-size: 1.6rem; font-weight: 800; color: #fff; margin-bottom: 15px;">
                    🌱 <span style="color: #00ffaa;"><?= $empresa['nome'] ?></span>
                </div>
                <p style="color: #9ca3af; font-size: 0.9rem; line-height: 1.7; margin-bottom: 20px;">
                    <?= $empresa['descricao'] ?>
                </p>
                <!-- Redes sociais -->
                <div style="display: flex; gap: 12px;">
                    <a href="<?= $redes['instagram'] ?>" target="_blank"
                       style="width: 38px; height: 38px; border-radius: 8px; background: #111827; border: 1px solid rgba(255,255,255,0.08); display: flex; align-items: center; justify-content: center; color: #fff; text-decoration: none; font-size: 1rem; transition: 0.3s;"
                       onmouseover="this.style.borderColor='#00ffaa'; this.style.color='#00ffaa'"
                       onmouseout="this.style.borderColor='rgba(255,255,255,0.08)'; this.style.color='#fff'">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="<?= $redes['facebook'] ?>" target="_blank"
                       style="width: 38px; height: 38px; border-radius: 8px; background: #111827; border: 1px solid rgba(255,255,255,0.08); display: flex; align-items: center; justify-content: center; color: #fff; text-decoration: none; font-size: 1rem; transition: 0.3s;"
                       onmouseover="this.style.borderColor='#00bfff'; this.style.color='#00bfff'"
                       onmouseout="this.style.borderColor='rgba(255,255,255,0.08)'; this.style.color='#fff'">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a href="<?= $redes['whatsapp'] ?>" target="_blank"
                       style="width: 38px; height: 38px; border-radius: 8px; background: #111827; border: 1px solid rgba(255,255,255,0.08); display: flex; align-items: center; justify-content: center; color: #fff; text-decoration: none; font-size: 1rem; transition: 0.3s;"
                       onmouseover="this.style.borderColor='#25d366'; this.style.color='#25d366'"
                       onmouseout="this.style.borderColor='rgba(255,255,255,0.08)'; this.style.color='#fff'">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <!-- Links rápidos -->
            <div>
                <h4 style="color: #fff; font-size: 1rem; font-weight: 600; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid rgba(255,255,255,0.05);">
                    Links Rápidos
                </h4>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <?php foreach (['#beneficios' => 'Benefícios', '#planos' => 'Planos', '#produtos' => 'Produtos', '#servicos' => 'Serviços'] as $link => $nome): ?>
                    <li style="margin-bottom: 10px;">
                        <a href="<?= $link ?>" style="color: #9ca3af; text-decoration: none; font-size: 0.9rem; transition: 0.3s;"
                           onmouseover="this.style.color='#00ffaa'; this.style.paddingLeft='6px'"
                           onmouseout="this.style.color='#9ca3af'; this.style.paddingLeft='0'">
                            › <?= $nome ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Contato -->
            <div>
                <h4 style="color: #fff; font-size: 1rem; font-weight: 600; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid rgba(255,255,255,0.05);">
                    Contato
                </h4>
                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 12px;">
                    <li style="display: flex; align-items: flex-start; gap: 10px; color: #9ca3af; font-size: 0.9rem;">
                        <i class="fa-solid fa-location-dot" style="color: #00ffaa; margin-top: 2px;"></i>
                        <span><?= $empresa['endereco'] ?><br><?= $empresa['cidade'] ?></span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 10px; color: #9ca3af; font-size: 0.9rem;">
                        <i class="fa-solid fa-phone" style="color: #00ffaa;"></i>
                        <span><?= $empresa['telefone'] ?></span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 10px; font-size: 0.9rem;">
                        <i class="fa-brands fa-whatsapp" style="color: #25d366;"></i>
                        <a href="https://wa.me/<?= $empresa['whatsapp'] ?>" target="_blank" style="color: #9ca3af; text-decoration: none;"
                           onmouseover="this.style.color='#25d366'"
                           onmouseout="this.style.color='#9ca3af'">
                            <?= $empresa['telefone'] ?>
                        </a>
                    </li>
                    <li style="display: flex; align-items: center; gap: 10px; font-size: 0.9rem;">
                        <i class="fa-solid fa-envelope" style="color: #00ffaa;"></i>
                        <a href="mailto:<?= $empresa['email'] ?>" style="color: #9ca3af; text-decoration: none;"
                           onmouseover="this.style.color='#00ffaa'"
                           onmouseout="this.style.color='#9ca3af'">
                            <?= $empresa['email'] ?>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Horário -->
            <div>
                <h4 style="color: #fff; font-size: 1rem; font-weight: 600; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid rgba(255,255,255,0.05);">
                    Horário de Atendimento
                </h4>
                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px;">
                    <?php foreach ($horarios as $dia => $hora): ?>
                    <li style="display: flex; justify-content: space-between; font-size: 0.9rem; padding-bottom: 10px; border-bottom: 1px solid rgba(255,255,255,0.03);">
                        <span style="color: #9ca3af;"><?= $dia ?></span>
                        <span style="color: <?= $hora === 'Fechado' ? '#ef4444' : '#00ffaa' ?>; font-weight: 600;"><?= $hora ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>

        <!-- Linha final -->
        <div style="border-top: 1px solid rgba(255,255,255,0.05); padding-top: 20px; display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 10px;">
            <p style="color: #9ca3af; font-size: 0.85rem; margin: 0;">
                &copy; <?= date('Y') ?> 🌱 <?= $empresa['nome'] ?>. Todos os direitos reservados.
            </p>
            <p style="color: #9ca3af; font-size: 0.85rem; margin: 0;">
                Desenvolvido com 💚 para o agro brasileiro
            </p>
        </div>

    </div>
</footer>