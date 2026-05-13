<?php
    $fileVersion = APP_VERSION;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta name="description" content="Fotógrafo paulistano, nascido em 1983. Jornalista formado pela PUC-SP, trabalhou como repórter antes de iniciar a carreira na fotografia.">
    <meta name="author" content="Thiago Pereira">
    <meta property="og:title" content="Gustavo Pitta Fotografia">
    <meta property="og:site_name" content="Gustavo Pitta Studio">
    <meta property="og:url" content="http://www.gustavopitta.com.br/">
    <meta property="og:image" content="http://gustavopitta.com.br/resources/images/facebook-like_1200x630.png">
	<meta property="og:image:alt" content="">
    <meta property="og:type" content="website">
    <meta property="og:description" content="Fotógrafo paulistano, nascido em 1983. Jornalista formado pela PUC-SP, trabalhou como repórter antes de iniciar a carreira na fotografia.">
    <meta property="fb:app_id" content="155538261318342">
    <meta property="og:locale" content="pt_BR"> -->
    <meta name="robots" content="noindex, nofollow">
    <!-- <meta name="keywords" content=""> -->
	<!-- Favicon -->
    <link rel="icon" type="image/png" href="<?=assets('images/favicon/favicon_16x16.png')?>" sizes="16x16">
    <link rel="icon" type="image/png" href="<?=assets('images/favicon/favicon_32x32.png')?>" sizes="32x32">
    <link rel="icon" type="image/png" href="<?=assets('images/favicon/favicon_96x96.png')?>" sizes="96x96">
    <!-- Other icons -->
    <link rel="icon" type="image/png" href="<?=assets('images/favicon/favicon_128x128.png')?>" sizes="128x128">
    <link rel="icon" type="image/png" href="<?=assets('images/favicon/favicon_196x196.png')?>" sizes="196x196">
    <link rel="icon" type="image/png" href="<?=assets('images/favicon/favicon_228x228.png')?>" sizes="228x228">
    <!-- Apple Touch Icons -->
    <link rel="apple-touch-icon" href="<?=assets('images/favicon/favicon_120x120.png')?>" sizes="120x120">
    <link rel="apple-touch-icon" href="<?=assets('images/favicon/favicon_180x180.png')?>" sizes="180x180">
    <link rel="apple-touch-icon" href="<?=assets('images/favicon/favicon_152x152.png')?>" sizes="152x152">
    <link rel="apple-touch-icon" href="<?=assets('images/favicon/favicon_16x16167x167.png')?>" sizes="167x167">
    <!-- Windows Metro -->
    <link rel="icon" type="image/png" href="<?=assets('images/favicon/favicon_70x70.png')?>" sizes="70x70">
    <link rel="icon" type="image/png" href="<?=assets('images/favicon/favicon_270x270.png')?>" sizes="270x270">
    <link rel="icon" type="image/png" href="<?=assets('images/favicon/favicon_310x310.png')?>" sizes="310x310">
    <link rel="icon" type="image/png" href="<?=assets('images/favicon/favicon_310x150.png')?>" sizes="310x150">

	<title>Admin - Gustavo Pitta</title>
	<link rel="stylesheet" href="<?=assets('css/admin-style.min.css')?>?ver=<?=$fileVersion?>">

	@stack('styles')

    <script>
        let baseURL = "{{ base_url() }}";
    </script>

</head>
<body>
        
    <header id="top" class="content-out">
        <div class="content-in cols2">
            <!-- <a href="{{ base_url() }}">
                <figure class="logo"><img src="{{ assets('images/logo-gustavo-pitta.svg') }}" alt="" width="222" height="48" /></figure>
            </a> -->
            <figure class="logo"><img src="{{ assets('images/logo-gustavo-pitta.svg') }}" alt="" width="222" height="48" /></figure>
        </div>
    </header>

    

	@yield('content')


    
    <footer id="footer" class="content-out">
        <div class="content-in cols2">
            <div class="col copyright">
                <p>Copyright © 2010-<?=date('Y')?> Gustavo Pitta Studio - Todos os direitos reservados.</p>
            </div>
            <div class="col social-network">
                <a href="https://www.facebook.com/gustavopitta" target="_blank"><img src="{{ assets('images/icons/icon-facebook.svg') }}" alt="" width="32" height="32" /></a>
                <a href="https://www.instagram.com/gustavopitta/" target="_blank"><img src="{{ assets('images/icons/icon-instagram.svg') }}" alt="" width="32" height="32" /></a>
                <a href="https://www.linkedin.com/in/gustavopitta/" target="_blank"><img src="{{ assets('images/icons/icon-linkedin.svg') }}" alt="" width="32" height="32" /></a>
            </div>
        </div>
    </footer>

    <!-- ====================================================================
                                    BLOCKUI
    ===================================================================== -->
    <section class="content-out blockui">
        <img src="<?=assets('images/loader.svg')?>" alt="" width="50" height="50" />
    </section>

	<!-- ====================================================================
                                    SCRIPTS
    ===================================================================== -->
	<script type="text/javascript" src="{{ assets('js/admin/admin.js?v=') }}{{date('YmdHis')}}"></script>
    <script type="text/javascript" src="<?=assets('js/Utils.js')?>?ver=<?=$fileVersion?>"></script>
    <script type="text/javascript" src="<?=assets('js/essential.js')?>?ver=<?=$fileVersion?>"></script>

	@stack('scripts')
</body>
</html>