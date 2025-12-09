<div class="container-fluid px-0">
	<div id="carouselId" class="carousel slide" data-bs-ride="carousel">
		<ol class="carousel-indicators">
			<li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true" aria-label="<?= SITE_NAME; ?>"></li>
			<li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="<?= SITE_NAME; ?>"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<img src="<?= BASE; ?>/assets/images/slides/slide1.jpg" class="img-fluid" alt="<?= SITE_NAME; ?>">
				<div class="carousel-caption">
					<div class="container carousel-content">
						<h1 class="text-white display-1 mb-4 animated fadeInRight">Tradição e respeito há anos!</h1>
						<p class="mb-4 text-white fs-5 animated fadeInDown">
							Trabalho multidisciplinar atendendo áreas Consultiva e Contenciosa, para prestar assessoria jurídica a nossos clientes/parceiros. 
						</p>
					</div>
				</div>
			</div>
			<div class="carousel-item">
				<img src="<?= BASE; ?>/assets/images/slides/slide2.jpg" class="img-fluid" alt="<?= SITE_NAME; ?>">
				<div class="carousel-caption">
					<div class="container carousel-content">
						<h1 class="text-white display-1 mb-4 animated fadeInLeft">Seu Direito, Nossa Prioridade</h1>
						<p class="mb-4 text-white fs-5 animated fadeInDown">
							Defendendo seus direitos com excelência e compromisso. Agende sua consulta conosco e garanta a melhor assessoria jurídica
						</p>
					</div>
				</div>
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
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
                	<h1 class="me-3 text-primary">Compromisso</h1>
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
# Quem Somos
$Read->FullRead("SELECT page_title, page_subtitle, page_name, page_content, page_cover FROM " . DB_PAGES . " WHERE page_status = 1 AND page_id = 3");
if ($Read->getResult()):
    $NavPage = $Read->getResult()[0];
?>
    <div class="container-fluid py-5 my-5">
        <div class="container pt-5">
            <div class="row g-5">
                <?php if(!empty($NavPage['page_cover'])): ?>
                    <div class="col-lg-5 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                        <div class="h-100 position-relative">
                            <img title="<?= $NavPage['page_title']; ?>" alt="<?= $NavPage['page_title']; ?>" src="https://www.localhost/site_val/admin/uploads/<?= $NavPage['page_cover']; ?>" style="margin-bottom: 25%;" class="img-fluid w-75 rounded">
                            </div>
                    </div>
                <?php endif; ?>
                <div class="col-lg-<?= (empty($NavPage['page_cover']) ? '12' : '7'); ?> col-md-<?= (empty($NavPage['page_cover']) ? '12' : '6'); ?> col-sm-12 wow fadeIn" data-wow-delay=".5s">
                    <h1 class="mb-4"><?= $NavPage['page_title']; ?></h1>
                    <p><?= $NavPage['page_content']; ?></p>
                    
                    <div class="text-center">
                        <a href="https://www.localhost/site_val/<?= $NavPage['page_name']; ?>" title="<?= $NavPage['page_title']; ?>" class="btn btn-secondary rounded-pill px-5 py-3 text-white">Saiba mais</a>
                    </div>
                    </div>
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

<?php
# Depoimentos
$Read->FullRead("SELECT test_title, test_author, test_content, test_cover FROM " . DB_TESTIMONIALS . " WHERE test_status = 1");
$testimonials = $Read->getResult(); // Armazena os resultados

if ($testimonials): // Verifica se a variável não está vazia

    // Contamos os depoimentos
    $testimonialCount = count($testimonials);
    
    // ATUALIZADO: O carrossel só deve rodar se houver MAIS DE 3 itens (ou seja, a partir de 4)
    $minItemsForCarousel = 3; 
?>
    <div class="container-fluid testimonial py-5 mb-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h1>Depoimentos</h1>
            </div>

            <?php
            // ==========================================================
            // LÓGICA ATUALIZADA
            // ==========================================================
            
            // Se o número de depoimentos for MAIOR que 3...
            if ($testimonialCount > $minItemsForCarousel):
            ?>

                <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay=".5s">
                    <?php foreach ($testimonials as $Testimonials): ?>
                        <div class="testimonial-item border p-4">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <?php if(!empty($Testimonials['test_cover'])): ?>
                                        <img src="<?= BASE; ?>/admin/uploads/<?= $Testimonials['test_cover']; ?>" title="<?= $Testimonials['test_author']; ?>" alt="<?= $Testimonials['test_author']; ?>">
                                    <?php else: ?>
                                        <i class="fas fa-balance-scale fa-5x mb-4 text-primary"></i>
                                    <?php endif; ?>
                                </div>
                                <div class="ms-4">
                                    <h4 class="text-secondary"><?= $Testimonials['test_author'] ?></h4>
                                </div>
                            </div>
                            <div class="border-top mt-4 pt-3">
                                <p class="mb-0"><?= Check::Words($Testimonials['test_content'], 100); ?></p>
                            </div>
                            </div>
                    <?php endforeach; ?>
                </div>

            <?php
            // Se for 3 ou MENOS...
            else:
            ?>

                <div class="testimonial-static-grid wow fadeIn" data-wow-delay=".5s">
                    
                    <?php 
                    // ATUALIZADO: Loop para mostrar 1, 2 ou 3 itens
                    foreach ($testimonials as $Testimonials): 
                    ?>
                        <div class="testimonial-item border p-4">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <?php if(!empty($Testimonials['test_cover'])): ?>
                                        <img src="<?= BASE; ?>/admin/uploads/<?= $Testimonials['test_cover']; ?>" title="<?= $Testimonials['test_author']; ?>" alt="<?= $Testimonials['test_author']; ?>">
                                    <?php else: ?>
                                        <i class="fas fa-balance-scale fa-5x mb-4 text-primary"></i>
                                    <?php endif; ?>
                                </div>
                                <div class="ms-4">
                                    <h4 class="text-secondary"><?= $Testimonials['test_author'] ?></h4>
                                </div>
                            </div>
                            <div class="border-top mt-4 pt-3">
                                <p class="mb-0"><?= Check::Words($Testimonials['test_content'], 100); ?></p>
                            </div>
                            </div>
                    <?php endforeach; // Fim do loop da grade ?>
                </div>
            
            <?php
            // Fim da lógica if/else
            endif;
            ?>
            
            <br>
            <div class="text-center">
                <a href="https://localhost/site_val/depoimentos" title="Depoimentos" class="btn btn-secondary text-white px-5 py-3 rounded-pill">Ver todos</a>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php
# Equipe
$Read->FullRead("SELECT user_thumb, user_name, user_lastname, user_work FROM " . DB_USERS . " WHERE user_level = 6");

if ($Read->getResult()):
    $TeamData = $Read->getResult();
    $TeamCount = count($TeamData);
    
    // Define se o carrossel será ativado (apenas se tiver mais de 3 itens)
    // Se tiver 3 ou menos, ele usa classes de Grid (row) para centralizar.
    $IsCarousel = ($TeamCount > 3);
?>
    <div class="container-fluid py-5 mb-5 team">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h1>Nossa Equipe</h1>
            </div>

            <?php 
            // AQUI ESTÁ A MÁGICA:
            // Se for carrossel ($IsCarousel true): aplica 'owl-carousel team-carousel'
            // Se NÃO for carrossel: aplica 'row justify-content-center' para centralizar os itens estáticos
            ?>
            <div class="<?= ($IsCarousel ? 'owl-carousel team-carousel' : 'row justify-content-center'); ?> wow fadeIn" data-wow-delay=".5s">
                
                <?php foreach ($TeamData as $UsersEquip): ?>
                    
                    <?php 
                    // Se NÃO for carrossel, precisamos definir a largura da coluna (ex: col-lg-4)
                    // Se FOR carrossel, não precisa de colunagem, o plugin gerencia.
                    $ItemClass = ($IsCarousel ? '' : 'col-lg-4 col-md-6 col-sm-12 mb-4'); 
                    ?>

                    <div class="<?= $ItemClass; ?> rounded team-item">
                        <div class="team-content">
                            <div class="team-img-icon">
                                <div class="team-img rounded-circle">
                                    <img src="<?= BASE; ?>/admin/uploads/<?= $UsersEquip['user_thumb']; ?>" class="img-fluid w-100 rounded-circle" alt="<?= $UsersEquip['user_name'] . " " . $UsersEquip['user_lastname']; ?>" title="<?= $UsersEquip['user_name'] . " " . $UsersEquip['user_lastname']; ?>">
                                </div>
                                <div class="team-name text-center py-3">
                                    <h4 class=""><?= $UsersEquip['user_name'] . " " . $UsersEquip['user_lastname']; ?></h4>
                                    <p class="m-0"><?= $UsersEquip['user_work']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                
            </div>
        </div>
    </div>
<?php endif; ?>

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
# Artigos
$Read->ExeRead(DB_POSTS, "WHERE post_status = 1 AND post_date <= NOW()  ORDER BY post_date DESC LIMIT 3");		
if ($Read->getResult()):
	$delay = 0.3;
?>
	<div class="container-fluid blog py-5 mb-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h1>Artigos</h1>
            </div>
            <div class="row g-5 justify-content-center">
            	<?php 
				foreach ($Read->getResult() as $Article):
					extract($Article);
					
					$Read->ExeRead(DB_CATEGORIES, "WHERE category_id = :cat", "cat={$post_category}");
				    if($Read->getResult()):
				        $Category = $Read->getResult()[0];
				    endif;
					
					$Read->ExeRead(DB_USERS, "WHERE user_id = :id", "id={$post_author}");
					if($Read->getResult()):
				        $Author = $Read->getResult()[0];
				    endif;
				?>	
	                <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="<?= $delay; ?>s">
	                    <div class="blog-item position-relative bg-light rounded">
	                    	<a title="Ler mais sobre <?= $post_title; ?>" href="<?= BASE; ?>/artigo/<?= $post_name; ?>">
								<img title="<?= $post_title; ?>" alt="<?= $post_title; ?>" src="<?= BASE; ?>/admin/uploads/<?= $post_cover; ?>" class="img-fluid w-100 rounded-top">
							</a>
	                        <span class="position-absolute px-4 py-3 btn-secondary text-white rounded" style="top: -28px; right: 20px;"><?= $Category['category_title']; ?></span>
	                        <div class="blog-content text-center position-relative p-3 d-flex flex-column">
	                            <h5 class=""><?= $post_title; ?></h5>
	                            <span class="text-secondary"><?= date('d', strtotime($post_date)); ?> <?= ucfirst(utf8_encode(strftime('%B, %Y', strtotime($post_date)))); ?></span>
	                        </div>
	                        
	                        <div class="blog-btn d-flex justify-content-center position-relative p-3">
	                            <div class="blog-icon btn btn-secondary px-3 rounded-pill my-auto">
	                                <a title="Ler mais sobre <?= $post_title; ?>" href="<?= BASE; ?>/artigo/<?= $post_name; ?>" class="btn btn-secondary text-white">Leia mais</a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                <?php 
                	$delay += 0.2;
                endforeach; 
                ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php
// Busca os parceiros e armazena na variável
$Read->ExeRead(DB_PARTNERS, "WHERE partner_status = 1 ORDER BY partner_id DESC LIMIT 5");
$partners = $Read->getResult();

if ($partners):
    
    // Contamos os parceiros
    $partnerCount = count($partners);
    
    // Definimos o número mínimo para o carrossel ser ativado
    // (O seu 'responsive' começa com 'items: 2', então o carrossel só
    // faz sentido se tiver MAIS que 2)
    $minItemsForCarousel = 2;
?>
    <div class="container-fluid project py-5 mb-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h1>Parceiros</h1>
            </div>
            <div class="row g-5 wow fadeIn" data-wow-delay=".5s">
                
                <?php
                // ==========================================================
                // AQUI ESTÁ A LÓGICA PRINCIPAL
                // ==========================================================
                
                // Se o número de parceiros for MAIOR que o mínimo...
                if ($partnerCount > $minItemsForCarousel):
                ?>

                    <div class="owl-carousel vendor-carousel">
                        <?php
                        foreach ($partners as $Partner):
                            extract($Partner);
                        ?>
                            <a href="<?= ($partner_link ? $partner_link : 'javascript:void(0);'); ?>" <?= ($partner_link ? 'target="_blank"' : null); ?> class="text-center">
                                <img src="https://www.localhost/site_val/admin/uploads/<?= $partner_thumb; ?>" title="<?= $partner_name; ?>" alt="<?= $partner_name; ?>">
                            </a>
                        <?php endforeach; ?>
                    </div>

                <?php
                // Se for 2 ou MENOS...
                else:
                ?>

                    <div class="vendor-grid"> <?php
                        foreach ($partners as $Partner):
                            extract($Partner);
                        ?>
                            <a href="<?= ($partner_link ? $partner_link : 'javascript:void(0);'); ?>" <?= ($partner_link ? 'target="_blank"' : null); ?> class="text-center vendor-grid-item">
                                <img src="https://www.localhost/site_val/admin/uploads/<?= $partner_thumb; ?>" title="<?= $partner_name; ?>" alt="<?= $partner_name; ?>">
                            </a>
                        <?php endforeach; ?>
                    </div>
                
                <?php
                // Fim da lógica if/else
                endif;
                ?>
                
                <br>
                <div class="text-center">
                    <a href="https://www.localhost/site_val/parceiros" title="Parceiros" class="btn btn-secondary text-white px-5 py-3 rounded-pill">Ver todos</a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>