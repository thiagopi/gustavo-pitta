<?php
    $fileVersion = APP_VERSION;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="description" content="Fotógrafo paulistano, nascido em 1983. Jornalista formado pela PUC-SP, trabalhou como repórter antes de iniciar a carreira na fotografia.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Thiago Pereira">
    <meta property="og:title" content="Gustavo Pitta Fotografia">
    <meta property="og:site_name" content="Gustavo Pitta Studio">
    <meta property="og:url" content="http://www.gustavopitta.com.br/">
    <meta property="og:image" content="http://gustavopitta.com.br/resources/images/facebook-like_1200x630.png">
	<meta property="og:image:alt" content="">
    <meta property="og:type" content="website">
    <meta property="og:description" content="Fotógrafo paulistano, nascido em 1983. Jornalista formado pela PUC-SP, trabalhou como repórter antes de iniciar a carreira na fotografia.">
    <meta property="fb:app_id" content="155538261318342">
    <meta property="og:locale" content="pt_BR">
    @if(env() === "PROD")
    <meta name="robots" content="index, follow">
    @else
    <meta name="robots" content="noindex, nofollow">
    @endif
    <meta name="keywords" content="">
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

	<title>Gustavo Pitta Studio</title>
	<link rel="stylesheet" href="<?=assets('css/style.min.css')?>?ver=<?=$fileVersion?>">

	@stack('styles')

    <script>
        let baseURL = "{{ base_url() }}";
    </script>

    @if(env() === "PROD")
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MFRBPHF');</script>
    <!-- End Google Tag Manager -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-44604845-1"></script> -->
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'AW-1015711346');
    </script>
    @endif

</head>
<body>
    @if(env() === "PROD")

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MFRBPHF"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Google Code for Sponsors Conversion Page -->
    <script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 1015711346;
    var google_conversion_language = "pt";
    var google_conversion_format = "3";
    var google_conversion_color = "ffffff";
    var google_conversion_label = "y1AECLOekGoQ8oyq5AM";
    var google_remarketing_only = false;
    /* ]]> */
    </script>
    <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
    </script>
    <noscript>
    <div style="display:inline;">
    <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1015711346/?label=y1AECLOekGoQ8oyq5AM&guid=ON&script=0"/>
    </div>
    </noscript>
    @endif

    <nav class="nav-slider">
        <ul>
            <li><a href="{{ base_url() }}gastronomia">Gastronomia</a></li>
            <li><a href="{{ base_url() }}joias">Joias</a></li>
            <li><a href="{{ base_url() }}still">Still</a></li>
            <li><a href="{{ base_url() }}retratos">Retratos</a></li>
            <li><a href="{{ base_url() }}moda-beleza">Beauty</a></li>
            <li><a href="{{ base_url() }}ambiente-e-decoracao">Ambiente e Decoração</a></li>
            <li><a href="{{ base_url() }}making-of">Making of</a></li>
            <li><a href="{{ base_url() }}clientes">Clientes</a></li>
        </ul>
        <div>
            <a href="https://api.whatsapp.com/send?phone=5511996442249" target="_blank" class="info btn btn-blue rounded p-10-24 btn-wpp">
                <div class="icon">
                    <img src="{{ assets('images/icons/icon-whatsapp.svg') }}" alt="" width="32" height="32" />
                </div>
                <div class="text">
                    <p>11 99644-2249</p>
                </div>
            </a>
        </div>
        <div class="btn-close" onClick="closeMenu();"><img src="{{ assets('images/icons/btn-close.svg') }}" /></div>
    </nav>
    <header id="top" class="content-out">
        <div class="content-in cols2">
            <a href="{{ base_url() }}">
                <figure class="logo"><img src="{{ assets('images/logo-gustavo-pitta.svg') }}" alt="" width="222" height="48" /></figure>
            </a>
            <div class="right">
                <a href="{{ base_url() }}clientes" class="info" id="btn-customer" class="info btn btn-blue rounded p-10-24">
                    <div class="icon">
                        <img src="{{ assets('images/icons/icon-clients.svg') }}" alt="" width="51" height="34" />
                    </div>
                    <div class="text">
                        <p>Clientes</p>
                    </div>
                </a>

                <a href="https://api.whatsapp.com/send?phone=5511996442249" target="_blank" class="info btn btn-blue rounded p-10-24 btn-wpp">
                    <div class="icon">
                        <img src="{{ assets('images/icons/icon-whatsapp.svg') }}" alt="" width="32" height="32" />
                    </div>
                    <div class="text">
                        <p>11 99644-2249</p>
                    </div>
                </a>
                <div class="btn-menu" onClick="openMenu();"><img src="{{ assets('images/icons/btn-menu-thin.svg') }}" alt="" width="36" height="31" /></div>
            </div>
        </div>
    </header>



	@yield('content')


    <section id="contact" class="content-out">
        <div class="content-in cols2">
            <div class="col c1">
                <h3>Contato</h3>

                <p>
                    Se você ou sua empresa precisam de imagens publicitárias, retratos corporativos, stills e projetos fotográficos especializados, entrem em contato pelo formulário ou e-mail:
                    <br/><br/>
                    <a href="mailto:gustavo@gustavopitta.com.br">gustavo@gustavopitta.com.br</a>
                </p>
            </div>

            <div class="col c2">
                <h3>&nbsp;</h3>

                <form id="formContact" name="formContact">
                    <div class="form-group">
                        <input type="text" name="name" maxLength="50" placeholder="Nome" />
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" maxLength="50" placeholder="E-mail" />
                    </div>
                    <div class="form-group">
                        <input type="tel" name="mobile" maxLength="15" placeholder="Telefone" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" maxLength="50" placeholder="Assunto" />
                    </div>
                    <div class="form-group">
                        <textarea name="message" maxLength="500" rows="5" placeholder="Mensagem"></textarea>
                    </div>

                    <div class="btn-group left">
                        <div class="btn btn-blue rounded" onClick="validateForm();">Enviar</div>
                    </div>
                </form>
            </div>
        </div>
    </section>

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

    <a href="https://api.whatsapp.com/send?phone=5511996442249" target="_blank" class="info btn rounded btn-wpp fixed">
        <div class="icon">
            <img src="{{ assets('images/icons/icon-whatsapp.svg') }}" alt="" width="32" height="32" />
        </div>
    </a>

    <!-- ====================================================================
                                    BLOCKUI
    ===================================================================== -->
    <img src="<?=assets('images/icons/icon_arrow_up_blue_circle.svg')?>" alt="" width="50" height="50" class="btn-up" onclick="goTop();" />
    <!-- ====================================================================
                                    BLOCKUI
    ===================================================================== -->
    <section class="content-out blockui">
        <img src="<?=assets('images/loader.svg')?>" alt="" width="50" height="50" />
    </section>

	<!-- ====================================================================
                                    SCRIPTS
    ===================================================================== -->

    <script type="text/javascript" src="<?=assets('js/Utils.js')?>?ver=<?=$fileVersion?>"></script>
    <script type="text/javascript" src="<?=assets('js/app.js')?>?ver=<?=$fileVersion?>"></script>
    <script type="text/javascript" src="<?=assets('js/contact.js')?>?ver=<?=$fileVersion?>"></script>

	@stack('scripts')
</body>
</html>
