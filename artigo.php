<?php
if (!$Read):
    $Read = new Read;
endif;

$Read->ExeRead(DB_POSTS, "WHERE post_name = :nm AND post_date <= NOW()", "nm={$URL[1]}");
if (!$Read->getResult()):
    require REQUIRE_PATH . '/404.php';
    return;
else:
    extract($Read->getResult()[0]);
    $Update = new Update;
    $UpdateView = ['post_views' => $post_views + 1, 'post_lastview' => date('Y-m-d H:i:s')];
    $Update->ExeUpdate(DB_POSTS, $UpdateView, "WHERE post_id = :id", "id={$post_id}");
    
    $Read->ExeRead(DB_CATEGORIES, "WHERE category_id = :cat", "cat={$post_category}");
    if($Read->getResult()):
        $Category = $Read->getResult()[0];
    endif;
	
	$Read->ExeRead(DB_USERS, "WHERE user_id = :id", "id={$post_author}");
	$Author = $Read->getResult()[0];
    extract($Author);
endif;
?>

<div class="container-fluid page-header py-5">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4 animated slideInDown"><?= $post_title; ?></h1>
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

                <div class="col-sm-12 wow fadeIn mb-5" data-wow-delay="<?= $delay; ?>s">
                    <div class="blog-item position-relative bg-light rounded">
                    	<?php
		                if ($post_video):
		                    echo "<div class='embed-container'>";
		                    echo "<iframe id='mediaview' width='640' height='360' src='https://www.youtube.com/embed/{$post_video}?rel=0&amp;showinfo=0&autoplay=0&origin=" . BASE . "' frameborder='0' allowfullscreen></iframe>";
		                    echo "</div>";
		                else:
			                echo "<img class='img-fluid w-100 rounded-top' title='{$post_title}' alt='{$post_title}' src='" . BASE . "/admin/uploads/{$post_cover}'/>";
		                endif;
		                ?>
		                
		                <?php
		                $WC_TITLE_LINK = $post_title;
		                $WC_SHARE_HASH = SITE_NAME;
		                $WC_SHARE_LINK = BASE . "/artigo/{$post_name}";
		                require './admin/_cdn/widgets/share/share.wc.php';
		                ?>

                        <span class="position-absolute px-4 py-3 btn-secondary text-white rounded" style="top: -28px; right: 20px;"><?= $Category['category_title']; ?></span>
                        <div class="blog-content text-center position-relative p-3 d-flex flex-column">
                            <h5 class=""><?= $post_title; ?></h5>
                            <span class="text-secondary"><?= date('d', strtotime($post_date)); ?> <?= ucfirst(utf8_encode(strftime('%B, %Y', strtotime($post_date)))); ?></span>
                            <p class="py-2"><?= $post_subtitle; ?></p>
                            <p class="py-2"><?= $post_content; ?></p>
                        </div>
                        
                        <?php require './admin/_cdn/widgets/share/share.wc.php'; ?>
                    </div>
                    
                    <?php if (APP_COMMENTS && COMMENT_ON_POSTS): ?>
					    <div class="">
					        <div class="content">
					            <?php
					            $CommentKey = $post_id;
					            $CommentType = 'post';
					            require './admin/_cdn/widgets/comments/comments.php';
					            ?>
					            <div class="clear"></div>
					        </div>
					    </div>
					<?php endif; ?>
                </div>

            </div>
            
            <?php require REQUIRE_PATH . '/inc/sidebar_cat.php'; ?>
        </div>
    </div>
</div>