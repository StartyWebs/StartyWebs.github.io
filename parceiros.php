<div class="container-fluid page-header py-5">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4 animated slideInDown">Parceiros</h1>
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

<div class="container-fluid services py-5 mb-5">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h1>Parceiros</h1>
        </div>
        <div class="row g-5 services-inner">
        	<?php
            $Page = (!empty($URL[1]) && filter_var($URL[1], FILTER_VALIDATE_INT) ? $URL[1] : 1);
            $Pager = new Pager(BASE . "/parceiros/", "<<", ">>", 3);
            $Pager->ExePager($Page, 12);
            $Read->ExeRead(DB_PARTNERS, "WHERE partner_status = 1 ORDER BY partner_registration DESC LIMIT :limit OFFSET :offset", "limit={$Pager->getLimit()}&offset={$Pager->getOffset()}");
            if (!$Read->getResult()):
                $Pager->ReturnPage();
                echo Erro("Ainda Não existe parceiros cadastrados. Favor volte mais tarde :)", E_USER_NOTICE);
            else:
				$delay = 0.3;
                foreach ($Read->getResult() as $Partners):
                    extract($Partners);
            ?>
	                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="<?= $delay; ?>s">
	                    <div class="services-item bg-light">
	                        <div class="p-4 text-center services-content">
	                            <div class="services-content-icon">
	                            	<a href="<?= ($partner_link ? $partner_link : 'javascript:void(0);'); ?>" <?= ($partner_link ? 'target="_blank"' : null); ?>>
	                                	<img src="https://www.localhost/site_val/admin/uploads/<?= $partner_thumb; ?>" title="<?= $partner_name; ?>" alt="<?= $partner_name; ?>" class="partner-img">
	                                </a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
            <?php
            		$delay += 0.2;
				endforeach;
			endif;
			?>
			
			<?

            ?>
        </div>
    </div>
</div>