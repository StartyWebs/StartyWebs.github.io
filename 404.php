<div class="container-fluid page-header py-5">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4 animated slideInDown">Erro 404</h1>
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

<div class="container-fluid py-5 my-5 wow fadeIn footer" data-wow-delay="0.3s">
    <div class="container text-center py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <i class="bi bi-exclamation-triangle display-1 text-secondary"></i>
                <h1 class="display-1">404</h1>
                <h1 class="mb-4">Oops! Página não encontrada</h1>
                <p class="mb-4">A página que você procura pode ter sido removida, teve seu nome alterado ou está temporariamente indisponível.</p>
                <a class="btn btn-secondary rounded-pill py-3 px-5" href="<?= BASE; ?>">Home</a>
            </div>
            
            <div class="mt-4 d-flex hightech-link justify-content-center">
            	<?php if (SITE_SOCIAL_FB): ?>
					<a href="https://www.facebook.com/<?= SITE_SOCIAL_FB_PAGE; ?>" target="_blank" title="<?= SITE_NAME; ?> no Facebook" class="btn-light nav-fill btn btn-square rounded-circle me-2">
						<i class="fab fa-facebook-f text-dark"></i>
					</a>
				<?php endif; ?>
				
				<?php if (SITE_SOCIAL_TWITTER): ?>
	                <a href="https://www.twitter.com/<?= SITE_SOCIAL_TWITTER; ?>" target="_blank" title="<?= SITE_NAME; ?> no Twitter" class="btn-light nav-fill btn btn-square rounded-circle me-2">
	                    <i class="fab fa-twitter text-dark"></i>
	                </a>
                <?php endif; ?>
                
                <?php if (SITE_SOCIAL_INSTAGRAM): ?>
	                <a href="https://www.instagram.com/<?= SITE_SOCIAL_INSTAGRAM; ?>" target="_blank" title="<?= SITE_NAME; ?> no Instagram" class="btn-light nav-fill btn btn-square rounded-circle me-2">
	                    <i class="fab fa-instagram text-dark"></i>
	                </a>
                <?php endif; ?>
                
                <?php if (SITE_SOCIAL_GOOGLE): ?>
	                <a href="https://plus.google.com/<?= SITE_SOCIAL_GOOGLE_PAGE; ?>" target="_blank" title="<?= SITE_NAME; ?> no Google+" class="btn-light nav-fill btn btn-square rounded-circle me-2">
	                    <i class="fab fa-google-plus text-dark"></i>
	                </a>
                <?php endif; ?>
                
                <?php if (SITE_SOCIAL_YOUTUBE): ?>
	                <a href="https://www.youtube.com/channel/<?= SITE_SOCIAL_YOUTUBE; ?>" target="_blank" title="<?= SITE_NAME; ?> no YouTube" class="btn-light nav-fill btn btn-square rounded-circle me-2">
	                    <i class="fab fa-youtube text-dark"></i>
	                </a>
                <?php endif; ?>
                
                <?php if (SITE_SOCIAL_SNAPCHAT): ?>
	                <a href="https://www.snapchat.com/add/<?= SITE_SOCIAL_SNAPCHAT;?>" target="_blank" title="<?= SITE_NAME; ?> no Snapchat" class="btn-light nav-fill btn btn-square rounded-circle me-0">
	                    <i class="fab fa-snapchat text-dark"></i>
	                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>