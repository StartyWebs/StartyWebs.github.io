<?php
if (!$Read):
    $Read = new Read;
endif;

$Read->ExeRead(DB_CATEGORIES, "WHERE category_name = :nm", "nm={$URL[1]}");
if (!$Read->getResult()):
    require REQUIRE_PATH . '/404.php';
    return;
else:
    extract($Read->getResult()[0]);
endif;
?>

<div class="container-fluid page-header py-5">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4 animated slideInDown"><?= $category_title; ?></h1>
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

<div class="container-fluid py-5 my-5">
    <div class="container pt-5">
        <div class="row g-5">
            <div class="col-lg-9 col-md-12 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                
                <?php
	            $Page = (!empty($URL[2]) ? $URL[2] : 1);
	            $Pager = new Pager(BASE . "/artigos/{$category_name}/", "<<", ">>", 5);
	            $Pager->ExePager($Page, 12);
	            $Read->ExeRead(DB_POSTS, "WHERE post_status = 1 AND post_date <= NOW() AND (post_category = :ct OR FIND_IN_SET(:ct, post_category_parent)) ORDER BY post_date DESC LIMIT :limit OFFSET :offset", "limit={$Pager->getLimit()}&offset={$Pager->getOffset()}&ct={$category_id}");
	            if (!$Read->getResult()):
	                $Pager->ReturnPage();
	                echo Erro("Ainda Não existe posts cadastrados. Favor volte mais tarde :)", E_USER_NOTICE);
	            else:
					$delay = 0.3;
	                foreach ($Read->getResult() as $Post):
	                    extract($Post);
						
						$Read->ExeRead(DB_CATEGORIES, "WHERE category_id = :cat", "cat={$post_category}");
                        if($Read->getResult()):
                            $Category = $Read->getResult()[0];
                        endif;
						
						$Read->ExeRead(DB_USERS, "WHERE user_id = :id", "id={$post_author}");
						$Author = $Read->getResult()[0];
	                    extract($Author);
	            ?>
                        <div class="col-sm-12 wow fadeIn mb-5" data-wow-delay="<?= $delay; ?>s">
                            <div class="blog-item position-relative bg-light rounded">
                                <a title="Ler mais sobre <?= $post_title; ?>" href="<?= BASE; ?>/artigo/<?= $post_name; ?>">
                                    <img title="<?= $post_title; ?>" alt="<?= $post_title; ?>" src="<?= BASE; ?>/admin/uploads/<?= $post_cover; ?>" class="img-fluid w-100 rounded-top">
                                </a>
                                <span class="position-absolute px-4 py-3 btn-secondary text-white rounded" style="top: -28px; right: 20px;"><?= $Category['category_title']; ?></span>
                                <div class="blog-content text-center position-relative p-3 d-flex flex-column">
                                    <h5 class=""><?= $post_title; ?></h5>
                                    <span class="text-secondary"><?= date('d', strtotime($post_date)); ?> <?= ucfirst(utf8_encode(strftime('%B, %Y', strtotime($post_date)))); ?></span>
                                    <p class="py-2"><?= Check::Words($post_content, 60); ?></p>
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
                endif;
                ?>                
                <?
				$Pager->ExePaginator(DB_POSTS, "WHERE post_status = 1 AND post_date <= NOW() AND (post_category = :ct OR FIND_IN_SET(:ct, post_category_parent))", "ct={$category_id}");
	            echo $Pager->getPaginator();
	            ?>
            </div>
            
            <?php require REQUIRE_PATH . '/inc/sidebar_cat.php'; ?>
        </div>
    </div>
</div>