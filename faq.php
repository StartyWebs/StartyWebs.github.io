<div class="container-fluid page-header py-5">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4 animated slideInDown">Perguntas e Respostas</h1>
    </div>
</div>

<div class="container-fluid bg-secondary py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 wow fadeIn" data-wow-delay=".1s">
                <div class="counter">
                	<h1 class="me-3 text-primary">Ética</h1>
                    <h5 class="text-white mt-1">Honestidade e transparência em todas as ações</h5>
                </div>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay=".3s">
                <div class="counter">
                	<h1 class="me-3 text-primary">Comprometimento</h1>
                    <h5 class="text-white mt-1">Dedicação plena aos interesses dos clientes</h5>
                </div>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay=".5s">
                <div class="counter">
                    <h1 class="me-3 text-primary">Credibilidade</h1>
                    <h5 class="text-white mt-1">Reputação sólida e confiável no mercado jurídico</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
# FAQ
$Read->FullRead("SELECT * FROM " . DB_FAQ . " WHERE faq_status = 1");
if ($Read->getResult()):
?>
	<div class="container-fluid py-5 mb-5 faq">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h1>Perguntas e Respostas</h1>
            </div>
            <div class="accordion wow fadeIn" id="accordionExample" data-wow-delay=".5s">
                <?php foreach ($Read->getResult() as $FAQ): ?>
                    <div class="accordion-item mb-3 border-0 shadow-sm">
                        <h2 class="accordion-header" id="heading<?= $FAQ['faq_id']; ?>">
                            <button class="accordion-button collapsed bg-secondary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $FAQ['faq_id']; ?>" aria-expanded="false" aria-controls="collapse<?= $FAQ['faq_id']; ?>">
                                <?= $FAQ['faq_ask']; ?>
                            </button>
                        </h2>
                        <div id="collapse<?= $FAQ['faq_id']; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $FAQ['faq_id']; ?>" data-bs-parent="#accordionExample">
                            <div class="accordion-body bg-light">
                                <?= $FAQ['faq_answer']; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php
# Página de Área de Atuação
$Read->FullRead("SELECT page_title, page_subtitle, page_name, page_content, page_cover FROM " . DB_PAGES . " WHERE page_status = 1 AND page_id = 14");
if ($Read->getResult()):
	$NavPage = $Read->getResult()[0];
?>
	<div class="container-fluid services py-5 mb-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h1><?= $NavPage['page_title']; ?></h1>
            </div>
            <div class="row g-5 services-inner">
            	<?php 
                # Grupos Área de Atuação
			    $Read->FullRead("SELECT page_title, page_subtitle, page_name, page_content, page_cover FROM " . DB_PAGES . " WHERE page_status = 1 AND page_category = 2 ORDER BY page_id");
			    if ($Read->getResult()):
					$delay = 0.3;
                	foreach ($Read->getResult() as $NavPage): 
               	?>	
		                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="<?= $delay; ?>s">
		                    <div class="services-item bg-light">
		                        <div class="p-4 text-center services-content">
		                            <div class="services-content-icon">
		                                <i class="fas fa-balance-scale fa-7x mb-4 text-primary"></i>
		                                <h4 class="mb-3"><?= $NavPage['page_title']; ?></h4>
		                                <p class="mb-4"><?= Check::Words($NavPage['page_subtitle'], 20); ?></p>
		                                <a href="<?= BASE; ?>/<?= $NavPage['page_name']; ?>" title="<?= $NavPage['page_title']; ?>" class="btn btn-secondary text-white px-5 py-3 rounded-pill">Saiba mais</a>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                <?php
                		$delay += 0.2;
					endforeach;
				endif;
				?>
            </div>
        </div>
    </div>
<?php endif; ?>