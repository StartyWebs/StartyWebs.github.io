<div class="container-fluid page-header py-5">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4 animated slideInDown">Galeria de Fotos</h1>
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

<div class="container-fluid project py-5 mb-5">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h1>Galeria de Fotos</h1>
        </div>
        <div class="row g-5">
        	<?php
            $Page = (!empty($URL[1]) && filter_var($URL[1], FILTER_VALIDATE_INT) ? $URL[1] : 1);
			$Pager = new Pager(BASE . "/galerias/", "<<", ">>", 3);
            $Pager->ExePager($Page, 12);
            $Read->ExeRead(DB_GALLERY, "WHERE gallery_status = 1 AND gallery_date <= NOW() AND gallery_private = '0' ORDER BY gallery_id DESC LIMIT :limit OFFSET :offset", "limit={$Pager->getLimit()}&offset={$Pager->getOffset()}");
            if (!$Read->getResult()):
                $Pager->ReturnPage();
                echo Erro("Ainda Não existem galerias cadastradas. Favor volte mais tarde :)", E_USER_NOTICE);
            else:
				$delay = 0.3;
                foreach ($Read->getResult() as $LastPDT):
                    extract($LastPDT);

					$Read->ExeRead(DB_GALLERY_IMAGE, "WHERE gallery_id = :id", "id={$gallery_id}");
					extract($Read->getResult()[0]);

                    $PdtBox = 'box3';
                    require 'inc/gallery.php';
					$delay += 0.2;
                endforeach;
            endif;
			?>
			<?
            ?>
        </div>
    </div>
</div>