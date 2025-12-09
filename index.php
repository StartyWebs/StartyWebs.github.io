<?php
ob_start();
session_start();

require './admin/_app/Config.inc.php';

//READ CLASS AUTO INSTANCE
if (empty($Read)):
    $Read = new Read;
endif;

$Sesssion = new Session(SIS_CACHE_TIME);

//USER SESSION VALIDATION
if (!empty($_SESSION['userLogin']) && !empty($_SESSION['userLogin']['user_id'])):
    if (empty($Read)):
        $Read = new Read;
    endif;
    $Read->ExeRead(DB_USERS, "WHERE user_id = :user_id", "user_id={$_SESSION['userLogin']['user_id']}");
    if ($Read->getResult()):
        $_SESSION['userLogin'] = $Read->getResult()[0];
    else:
        unset($_SESSION['userLogin']);
    endif;
endif;

//GET PARAMETER URL
$getURL = strip_tags(trim(filter_input(INPUT_GET, 'url', FILTER_DEFAULT)));
$setURL = (empty($getURL) ? 'index' : $getURL);
$URL = explode('/', $setURL);
$SEO = new Seo($setURL);

//CHECK IF THIS POST ABLE TO AMP
if (APP_POSTS_AMP && (!empty($URL[0]) && $URL[0] == 'artigo') && file_exists('./amp.php')):
    $Read->ExeRead(DB_POSTS, "WHERE post_name = :name", "name={$URL[1]}");
    $PostAmp = ($Read->getResult()[0]['post_amp'] == 1 ? true : false);
endif;

//INSTANCE AMP (valid single article only)
if (APP_POSTS_AMP && (!empty($URL[0]) && $URL[0] == 'artigo') && file_exists('./amp.php') && (!empty($URL[2]) && $URL[2] == 'amp') && (!empty($PostAmp) && $PostAmp == true)):
    require './amp.php';
else:
?>
<!DOCTYPE html>
<html lang="pt-br" itemscope itemtype="https://schema.org/<?= $SEO->getSchema(); ?>">
	<head>
        <meta charset="UTF-8">
        <meta name="mit" content="2017-10-10T14:58:48-03:00+18267">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0,user-scalable=0">
        <title><?= $SEO->getTitle(); ?></title>
        <meta name="description" content="<?= $SEO->getDescription(); ?>"/>
        <meta name="robots" content="index, follow"/>
        <meta itemprop="name" content="<?= $SEO->getTitle(); ?>"/>
        <meta itemprop="description" content="<?= $SEO->getDescription(); ?>"/>
        <meta itemprop="image" content="<?= BASE; ?>/assets/images/logo.png"/>
        <meta itemprop="url" content="<?= BASE; ?>/<?= $getURL; ?>"/>
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?= $SEO->getTitle(); ?>" />
        <meta property="og:description" content="<?= $SEO->getDescription(); ?>" />
        <meta property="og:image" content="<?= BASE; ?>/assets/images/logo.png" />
        <meta property="og:url" content="<?= BASE; ?>/<?= $getURL; ?>" />
        <meta property="og:site_name" content="<?= SITE_NAME; ?>" />
        <meta property="og:locale" content="pt_BR" />
        <?php
        if (SITE_SOCIAL_FB):
            echo '<meta property="article:author" content="https://www.facebook.com/' . SITE_SOCIAL_FB_AUTHOR . '" />' . "\r\n";
            echo '            <meta property="article:publisher" content="https://www.facebook.com/' . SITE_SOCIAL_FB_PAGE . '" />' . "\r\n";

            if (SITE_SOCIAL_FB_APP):
                echo '<meta property="og:app_id" content="' . SITE_SOCIAL_FB_APP . '" />' . "\r\n";
            endif;

            if (SEGMENT_FB_PAGE_ID):
                echo '            <meta property="fb:pages" content="' . SEGMENT_FB_PAGE_ID . '" />' . "\r\n";
            endif;
        endif;
        ?>

        <meta property="twitter:card" content="summary_large_image" />
        <?php
        if (SITE_SOCIAL_TWITTER):
            echo '<meta property="twitter:site" content="@' . SITE_SOCIAL_TWITTER . '" />' . "\r\n";
        endif;
        ?>
        <meta property="twitter:domain" content="<?= BASE; ?>" />
        <meta property="twitter:title" content="<?= $SEO->getTitle(); ?>" />
        <meta property="twitter:description" content="<?= $SEO->getDescription(); ?>" />
        <meta property="twitter:image" content="<?= BASE; ?>/assets/images/logo.png" />
        <meta property="twitter:url" content="<?= BASE; ?>/<?= $getURL; ?>" />
        
        <link rel="shortcut icon" href="assets/images/favicon.png"/>
        <base href="<?= BASE; ?>/"/>
        <link rel="stylesheet" href="<?= BASE; ?>/admin/_cdn/bootcss/reset.css"/>
        
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Saira:wght@500;600;700&amp;display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link href="<?= BASE; ?>/assets/lib/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="<?= BASE; ?>/assets/lib/bootstrap-icons%401.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="<?= BASE; ?>/assets/lib/animate/animate.min.css" rel="stylesheet">
        <link href="<?= BASE; ?>/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="<?= BASE; ?>/assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/lightgallery@2.5.0/css/lightgallery-bundle.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="<?= BASE; ?>/assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="assets/css/style.css" rel="stylesheet">
	    
	    <script src="<?= BASE; ?>/admin/_cdn/jquery.js"></script>
	    <script src="<?= BASE; ?>/admin/_cdn/maskinput.js"></script>
	    <script src="<?= BASE; ?>/admin/_cdn/workcontrol.js"></script>
	</head>
	<body>
		<?php		
		//PESQUISA
        $Search = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if ($Search && !empty($Search['s'])):
            $Search = urlencode(strip_tags(trim($Search['s'])));
            header('Location: ' . BASE . '/pesquisa/' . $Search);
        endif;
				
		// HEADER
        if (file_exists("./inc/header.php")):
            require "./inc/header.php";
        else:
            trigger_error('Crie um arquivo /inc/header.php na pasta do tema!');
        endif;
		
		// CONTENT
        $URL[1] = (empty($URL[1]) ? null : $URL[1]);

        if ($URL[0] == 'rss' || $URL[0] == 'feed' || $URL[0] == 'rss.xml'):
            header("Location: " . BASE . "/rss.php");
            exit;
        endif;

        $Pages = array();
        $Read->FullRead("SELECT page_name FROM " . DB_PAGES);
        if ($Read->getResult()):
            foreach ($Read->getResult() as $SinglePage):
                $Pages[] = $SinglePage['page_name'];
            endforeach;
        endif;
		
		// Checa se a URL está vazia ou é 'home' para carregar 'home.php'
		if ($URL[0] == 'index') :
			if (file_exists('home.php')) :
			 	require 'home.php';
			else:
				trigger_error("Não foi possível encontrar o arquivo <b>home.php</b>");
			endif;
		else:
			if (in_array($URL[0], $Pages) && file_exists(REQUIRE_PATH . '/pagina.php')):
                if (file_exists(REQUIRE_PATH . "/page-{$URL[0]}.php")):
                    require REQUIRE_PATH . "/page-{$URL[0]}.php";
                else:
                    require REQUIRE_PATH . '/pagina.php';
                endif;
            elseif (file_exists(REQUIRE_PATH . '/' . $URL[0] . '.php')):
                if ($URL[0] == 'artigos' && file_exists(REQUIRE_PATH . "/cat-{$URL[1]}.php")):
                    require REQUIRE_PATH . "/cat-{$URL[1]}.php";
                else:
                    require REQUIRE_PATH . '/' . $URL[0] . '.php';
                endif;
            elseif (file_exists(REQUIRE_PATH . '/' . $URL[0] . '/' . $URL[1] . '.php')):
                require REQUIRE_PATH . '/' . $URL[0] . '/' . $URL[1] . '.php';
            else:
                if (file_exists("./404.php")):
                    require './404.php';
                else:
                    trigger_error("Não foi possível incluir o arquivo <b>(404.php)</b>");
                endif;
            endif;
		endif;
		
		// FOOTER
        if (file_exists("./inc/footer.php")):
            require "./inc/footer.php";
        else:
            trigger_error('Crie um arquivo /inc/footer.php na pasta do tema!');
        endif;
		?>
		
        <script src="<?= BASE; ?>/assets/lib/bootstrap%405.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?= BASE; ?>/assets/lib/wow/wow.min.js"></script>
        <script src="<?= BASE; ?>/assets/lib/easing/easing.min.js"></script>
        <script src="<?= BASE; ?>/assets/lib/waypoints/waypoints.min.js"></script>
        <script src="<?= BASE; ?>/assets/lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="<?= BASE; ?>/assets/lib/lightbox/js/lightbox.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.5.0/lightgallery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.5.0/plugins/video/lg-video.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/thumbnail/lg-thumbnail.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/fullscreen/lg-fullscreen.min.js"></script>

        <!-- Template Javascript -->
        <script src="<?= BASE; ?>/assets/js/main.js"></script>
	</body>
</html>
<?php
endif;
ob_end_flush();

if (!file_exists('.htaccess')):
	$htaccesswrite = "RewriteEngine On\r\nOptions All -Indexes\r\n\r\n# WC WWW Redirect.\r\n#RewriteCond %{HTTP_HOST} !^www\. [NC]\r\n#RewriteRule ^ https://www.%{HTTP_HOST}%{REQUEST_URI} [L,R=301]\r\n\r\n# WC HTTPS Redirect\r\nRewriteCond %{HTTP:X-Forwarded-Proto} !https\r\nRewriteCond %{HTTPS} off\r\nRewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]\r\n\r\n# WC URL Rewrite\r\nRewriteCond %{SCRIPT_FILENAME} !-f\r\nRewriteCond %{SCRIPT_FILENAME} !-d\r\nRewriteRule ^(.*)$ index.php?url=$1";
    $htaccess = fopen('.htaccess', "w");
    fwrite($htaccess, str_replace("'", '"', $htaccesswrite));
    fclose($htaccess);
endif;