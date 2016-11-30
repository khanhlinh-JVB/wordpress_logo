<!DOCTYPE html>
<html>
    <head lang="<?php language_attributes(); ?>">
        <meta charset="<?php bloginfo('charset'); ?>" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title(); ?></title>
        <?php if (is_singular() && pings_open(get_queried_object())) : ?>
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php endif; ?>
        <?php wp_head(); ?>
        <!--[if IE]>

       <style type="text/css">

        div#mask { 
           background: url(/shr/img/common/bg_ie_loading.png) repeat;
        } 

        </style>

    <![endif]-->
    </head>
    <body id="top" class="top">
        <div id="page">
            <header>
                <hgroup>
                    <div class="head01">
                        <div class="head02">
                            <h1 class="sp20"><?php bloginfo('description') ?></h1>
                            <div class="head01Inner">
                                <?php logomarket_the_custom_logo(); ?>
                                <div id="header_tel" class="header_tel"><span class="icon-tel"></span><a href="../inquiry/">050-1469-9995</a></div>
                                <p class="menu_btn">
                                    <a id="gnavi-open" class="button-link">
                                        <img src="<?php echo esc_url(get_template_directory_uri()) ?>/img/common/icon_menu.png" alt="menu" width="40">                        
                                    </a>
                                </p>
                                <p class="search_btn">
                                    <a id="search-open" class="button-link">
                                        <img src="<?php echo esc_url(get_template_directory_uri()) ?>/img/common/icon_search_m.png" alt="menu" width="24">                        
                                    </a>
                                </p>
                            </div><!-- head01Inner //-->
                            <div id="mobile_gmenu">
                                <ul>
                                    <li>
                                        <a href="/ロゴ/">ロゴを探す</a>                        
                                    </li>
                                    <li>
                                        <a href="../order/">購入の流れ</a>
                                    </li>
                                    <li>
                                        <a href="../price/">料金</a>
                                    </li>
                                    <li>
                                        <a href="../faq/">よくある質問</a>
                                    </li>
                                    <li>
                                        <a href="../inquiry/index/">お問い合わせ</a>
                                    </li>
                                </ul>
                            </div><!-- mobile_gmenu //-->
                        </div><!-- head02 //-->
                    </div><!-- head01 //-->
                    <nav id="gnavi" class="cl-effect-2">
                        <p class="btn_close" id="modal-close"><a href="#" onclick="window.close(); return false;">close</a></p>
                        <ul>
                            <li>メニュー</li>
                            <li class="active">
                                <a class="button" href="../"><span class="icon-home"></span><span class="icon-home">HOME</span></a>
                            </li>
                            <li>
                                <a class="button" href="../ロゴ/"><span class="icon-search_s"></span><span class="icon-search_s">ロゴを探す</span></a>
                            </li>
                            <li>
                                <a class="button" href="../order/"><span class="icon-cart"></span><span class="icon-cart">ロゴ購入</span></a>
                            </li>
                            <li>
                                <a class="button" href="../price/"><span class="icon-price"></span><span class="icon-price">料金について</span></a>
                            </li>
                            <li>
                                <a class="button" href="../logomarket/"><span class="icon-logomkt"></span><span class="icon-logomkt">選ばれる理由</span></a>
                            </li>
                            <li>
                                <a class="button" href="../faq/"><span class="icon-qa"></span><span class="icon-qa">よくある質問</span></a>
                            </li>
                            <li>
                                <a class="button" href="../voice/"><span class="icon-voice"></span><span class="icon-voice">お客様の声</span></a>
                            </li>
                            <li>
                                <a class="button" href="../inquiry/index/"><span class="icon-contact"></span><span class="icon-contact">お問い合わせ</span></a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a class="button" href="../designer/"><span class="designer"></span><span class="designer">厳選された<br class="sp">デザイナー</span></a>
                            </li>
                            <li>
                                <a class="button" href="../trademark/"><span class="trademark"></span><span class="trademark">商標登録</span></a>
                            </li>
                            <li>
                                <a class="button" href="../concierge/"><span class="concierge"></span><span class="concierge">ロゴマーク<br class="sp">コンシェルジュ</span></a>
                            </li>
                            <li>
                                <a class="button" href="../industry/index/"><span class="industry"></span><span class="industry">業界別<br class="sp">ロゴ作成</span></a>
                            </li>
                            <li>
                                <a class="button" href="../copyright/"><span class="copyright"></span><span class="copyright">著作権無料譲渡</span></a>
                            </li>
                            <li>
                                <a class="button" href="../recruit/"><span class="recruit"></span><span class="recruit">デザイナー<br class="sp">募集</span></a>
                            </li>
                        </ul>
                        <div id="mobile_tel" class="mobile_tel"><span class="icon-tel"></span><a href="tel:05014699995">050-1469-9995</a></div>
                    </nav>
                </hgroup>
            </header>

            


