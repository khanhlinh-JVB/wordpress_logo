<?php
/**
 * Adds header structures.
 *
 * @package Theme Horse
 * @subpackage WP_Portfolio
 * @since WP_Portfolio 1.0
 * @license http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link http://themehorse.com/themes/portfolio
 */
/* * ************************************************************************************* */
add_action('wp_portfolio_view_port', 'wp_portfolio_viewport', 5);

/**
 * Add meta tags.
 */
function wp_portfolio_viewport() {
    ?>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <?php
}

/* * ************************************************************************************* */
add_action('wp_portfolio_header', 'wp_portfolio_headercontent_details', 10);

/**
 * Shows Header content details
 *
 * Shows the site logo, title, description, searchbar, social icons and many more
 */
function wp_portfolio_headercontent_details() {
    ?>
    <div id="page">
        <header>
            <hgroup>
                <div class="head01">
                    <div class="head02">
                        <h1><?php bloginfo('description') ?></h1>
                        <div class="head01Inner">
                            <div class="logo"><a href="<?php echo $this->Html->url('/', true); ?>">
                                    <?php wp_portfolio_the_custom_logo(); ?>
                                    <?php // echo $this->Html->image('/shr/img/common/logo.png', array('alt' => 'logomarket(ロゴマーケット)')); ?>
                                </a></div>
                            <!--<div id="header_tel" class="header_tel"><span class="icon-contact"></span><a href="<?php echo $this->Html->url(array('controller' => 'inquiry', 'action' => 'index'), true); ?>">&#105;nfo&#64;logo&#109;&#97;r&#107;et&#46;j&#112;</a></div>-->
                            <div id="header_tel" class="header_tel"><span class="icon-tel"></span><a href="<?php echo $this->Html->url(array('controller' => 'inquiry', 'action' => 'index'), true); ?>"><?php echo Configure::read('site_telephone'); ?></a></div>
                            <p class="menu_btn"><a id="gnavi-open" class="button-link">
                                    <?php echo $this->Html->image('/shr/img/common/icon_menu.png', array('alt' => 'menu', 'width' => '40')); ?>
                                </a></p>
                            <p class="search_btn"><a id="search-open" class="button-link">
                                    <?php echo $this->Html->image('/shr/img/common/icon_search_m.png', array('alt' => 'menu', 'width' => '24')); ?>
                                </a></p>
                        </div><!-- head01Inner //-->
                        <div id="mobile_gmenu">
                            <ul>
                                <li <?= ($this->params['controller'] == 'logo' && !in_array($this->params['action'], array('buy'))) ? 'class="active"' : '' ?>>
                                    <?php echo $this->Html->link('ロゴを探す', array('controller' => 'logo', 'action' => 'index')) ?>
                                </li>
                                <li <?= $this->params['controller'] == 'pages' && $this->params['action'] == 'order' ? 'class="active"' : '' ?>>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'order'), true); ?>">購入の流れ</a>
                                </li>
                                <li <?= ($this->params['controller'] == 'pages' && $this->params['action'] == 'order') || in_array($this->params['action'], array('buy')) ? 'class="active"' : '' ?>>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'price'), true); ?>">料金</a>
                                </li>
                                <li <?= $this->params['controller'] == 'pages' && $this->params['action'] == 'faq' ? 'class="active"' : '' ?>>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'faq'), true); ?>">よくある質問</a>
                                </li>
                                <li <?= $this->params['controller'] == 'inquiry' ? 'class="active"' : '' ?>>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'inquiry', 'action' => 'index'), true); ?>">お問い合わせ</a>
                                </li>
                            </ul>
                        </div><!-- mobile_gmenu //-->
                    </div><!-- head02 //-->
                </div><!-- head01 //-->
                <nav id="gnavi" class="cl-effect-2">
                    <p class="btn_close" id="modal-close"><a href="#" onclick="window.close(); return false;">close</a></p>
                    <ul>
                        <li>メニュー</li>
                        <li <?= $this->params['controller'] == 'pages' && $this->params['action'] == 'index' ? 'class="active"' : ''; ?>>
                            <a class="button" href="<?php echo $this->Html->url('/', true); ?>"><span class="icon-home"></span><span class="icon-home">HOME</span></a>
                        </li>
                        <li <?= ($this->params['controller'] == 'logo' && !in_array($this->params['action'], array('buy', 'thanks'))) ? 'class="active"' : '' ?>>
                            <a class="button" href="<?php echo $this->Html->url(array('controller' => 'logo', 'action' => 'index'), true); ?>"><span class="icon-search_s"></span><span class="icon-search_s">ロゴを探す</span></a>
                        </li>
                        <li <?= ($this->params['controller'] == 'pages' && $this->params['action'] == 'order') || ($this->params['controller'] == 'inquiry' && in_array($this->params['action'], array('buy', 'thanks_buy'))) ? 'class="active"' : ''; ?>>
                            <a class="button" href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'order'), true); ?>"><span class="icon-cart"></span><span class="icon-cart">ロゴ購入</span></a>
                        </li>
                        <li <?= $this->params['controller'] == 'pages' && $this->params['action'] == 'price' ? 'class="active"' : ''; ?>>
                            <a class="button" href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'price'), true); ?>"><span class="icon-price"></span><span class="icon-price">料金について</span></a>
                        </li>
                        <li <?= $this->params['controller'] == 'pages' && $this->params['action'] == 'logomarket' ? 'class="active"' : ''; ?>>
                            <a class="button" href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'logomarket'), true); ?>"><span class="icon-logomkt"></span><span class="icon-logomkt">選ばれる理由</span></a>
                        </li>
                        <li <?= $this->params['controller'] == 'pages' && $this->params['action'] == 'faq' ? 'class="active"' : ''; ?>>
                            <a class="button" href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'faq'), true); ?>"><span class="icon-qa"></span><span class="icon-qa">よくある質問</span></a>
                        </li>
                        <li <?= $this->params['controller'] == 'voice' ? 'class="active"' : '' ?>>
                            <a class="button" href="<?php echo $this->Html->url(array('controller' => 'voice', 'action' => 'index'), true); ?>"><span class="icon-voice"></span><span class="icon-voice">お客様の声</span></a>
                        </li>
                        <li <?= ($this->params['controller'] == 'inquiry' && !in_array($this->params['action'], array('buy', 'thanks_buy'))) ? 'class="active"' : ''; ?>>
                            <a class="button" href="<?php echo $this->Html->url(array('controller' => 'inquiry', 'action' => 'index'), true); ?>"><span class="icon-contact"></span><span class="icon-contact">お問い合わせ</span></a>
                        </li>
                    </ul>
                    <ul>
                        <li <?= $this->params['controller'] == 'designer' ? 'class="active"' : '' ?>>
                            <a class="button" href="<?php echo $this->Html->url(array('controller' => 'designer', 'action' => 'index'), true); ?>"><span class="designer"></span><span class="designer">厳選された<br class="sp">デザイナー</span></a>
                        </li>
                        <li <?= $this->params['controller'] == 'pages' && in_array($this->params['action'], array('trademark', 'detail_1', 'detail_2', 'detail_3', 'detail_4')) ? 'class="active"' : ''; ?>>
                            <a class="button" href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'trademark'), true); ?>"><span class="trademark"></span><span class="trademark">商標登録</span></a>
                        </li>
                        <li <?= $this->params['controller'] == 'concierge' ? 'class="active"' : '' ?>>
                            <a class="button" href="<?php echo $this->Html->url(array('controller' => 'concierge', 'action' => 'index'), true); ?>"><span class="concierge"></span><span class="concierge">ロゴマーク<br class="sp">コンシェルジュ</span></a>
                        </li>
                        <li <?= $this->params['controller'] == 'industry' && $this->params['action'] == 'index' ? 'class="active"' : ''; ?>>
                            <a class="button" href="<?php echo $this->Html->url(array('controller' => 'industry', 'action' => 'index'), true); ?>"><span class="industry"></span><span class="industry">業界別<br class="sp">ロゴマーク</span></a>
                        </li>
                        <li <?= $this->params['controller'] == 'pages' && $this->params['action'] == 'copyright' ? 'class="active"' : ''; ?>>
                            <a class="button" href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'copyright'), true); ?>"><span class="copyright"></span><span class="copyright">著作権無償譲渡</span></a>
                        </li>
                        <li <?= $this->params['controller'] == 'pages' && $this->params['action'] == 'recruit' ? 'class="active"' : ''; ?>>
                            <a class="button" href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'recruit'), true); ?>"><span class="recruit"></span><span class="recruit">デザイナー<br class="sp">募集</span></a>
                        </li>
                    </ul>
                    <!--            <div class="fb_like_box">
                                    <div class="fb-like" data-href="https://www.facebook.com/logomarket.jp" data-send="false" data-layout="button" data-width="200" data-show-faces="true"></div></div>-->
                                <!--<div id="mobile_tel" class="mobile_tel"><span class="icon-contact"></span><a href="<?php echo $this->Html->url(array('controller' => 'inquiry', 'action' => 'index'), true); ?>">&#105;nfo&#64;logo&#109;&#97;r&#107;et&#46;j&#112;</a></div>-->


                    <div id="mobile_tel" class="mobile_tel"><span class="icon-tel"></span><a href="tel:<?php echo str_replace('-', '', Configure::read('site_telephone')); ?>"><?php echo Configure::read('site_telephone'); ?></a></div>
                </nav>

            </hgroup>
        </header>
        <header id="masthead" class="site-header" role="banner">
            <?php
            global $wp_portfolio_settings;
            $wp_portfolio_settings = wp_parse_args(get_option('wp_portfolio_theme_settings', array()), wp_portfolio_get_option_defaults());
            $header_display = $wp_portfolio_settings['wp_portfolio_header_settings'];
            if ($header_display != 'disable_both' && $header_display == 'header_text') {
                ?>
                <section id="site-logo" class="clearfix">
                    <?php if (is_single() || !is_home()) { ?>
                        <h2 id="site-title"> 
                            <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"> <?php bloginfo('name'); ?> </a> 
                        </h2><!-- #site-title -->
                    <?php } else { ?>
                        <h1 id="site-title"> 
                            <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"> <?php bloginfo('name'); ?> </a> 
                        </h1><!-- #site-title -->
                        <?php
                    }
                    $site_description = get_bloginfo('description', 'display');
                    if ($site_description) {
                        ?>
                        <h2 id="site-description"><?php bloginfo('description'); ?> </h2>
                    <?php } ?>
                </section><!-- #site-logo -->
                <?php
            } elseif ($header_display != 'disable_both' && $header_display == 'header_logo') {
                ?>
                <section id="site-logo" class="clearfix">
                    <?php if (is_single() || !is_home()) { ?>
                        <h2 id="site-title">
                            <?php wp_portfolio_the_custom_logo(); ?><!-- #site-logo -->
                        </h2>
                    <?php } else { ?>
                        <h1 id="site-title">
                            <?php wp_portfolio_the_custom_logo(); ?><!-- #site-logo -->
                        </h1>
                    <?php } ?>
                </section>
            <?php } ?>
            <button class="menu-toggle"><?php _e('Responsive Menu', 'wp-portfolio'); ?></button>
            <?php if (has_nav_menu('primary')) {// if there is nav menu then content displayed from nav menu else from pages  ?>
                <?php
                $args = array(
                    'theme_location' => 'primary',
                    'container' => '',
                    'items_wrap' => '<ul class="nav-menu">%3$s</ul>',
                );
                ?>
                <nav id="site-navigation" class="main-navigation clearfix" role="navigation">
                    <?php wp_nav_menu($args); //extract the content from apperance-> nav menu  ?>
                </nav><!-- #access -->
            <?php } else {// extract the content from page menu only ?>
                <section class="hgroup-right">
                    <nav id="site-navigation" class="main-navigation clearfix" role="navigation">
                        <?php wp_page_menu(array('menu_class' => 'nav-menu')); ?>
                    </nav><!-- #access -->
                </section>
            <?php } ?>
        </header><!-- #masthead -->
        <div id="content">
            <?php
            $wp_portfolio_header_image = get_header_image();
            if (!empty($wp_portfolio_header_image)):
                ?>
                <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($wp_portfolio_header_image); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"> 
                </a>
                <?php
            endif;
            if (!is_front_page()) {
                if (('' != wp_portfolio_header_title()) || function_exists('bcn_display_list')) {
                    if (is_single() && function_exists('bcn_display_list')) {
                        if (function_exists('wp_portfolio_breadcrumb')) {
                            ?>
                            <div class="page-title-wrap clearfix">
                                <?php
                                wp_portfolio_breadcrumb();
                            }
                            ?>
                        </div><!-- .page-title-wrap -->
                        <?php
                    } elseif (is_single() && !function_exists('bcn_display_list')) {
                        
                    } else {
                        ?>
                        <div class="page-title-wrap clearfix">
                            <h1 class="page-title"><?php echo wp_portfolio_header_title(); ?></h1><!-- .page-title -->
                            <?php
                            if (function_exists('wp_portfolio_breadcrumb')) {
                                wp_portfolio_breadcrumb();
                            }
                            ?>
                        </div><!-- .page-title-wrap -->
                        <?php
                    }
                }
            }
            ?>
            <?php
        }

        /*         * ************************************************************************************* */
        if (!function_exists('wp_portfolio_breadcrumb')):

            /**
             * Display breadcrumb on header.
             *
             * If the page is home or front page, slider is displayed.
             * In other pages, breadcrumb will display if breadcrumb NavXT plugin exists.
             */
            function wp_portfolio_breadcrumb() {
                if (function_exists('bcn_display')) {
                    ?>
                    <div class="breadcrumb">
                        <?php bcn_display(); ?>
                    </div> <!-- .breadcrumb -->
                    <?php
                }
            }

        endif;
        /*         * ************************************************************************************* */
        if (!function_exists('wp_portfolio_header_title')):

            /**
             * Show the title in header
             *
             * @since WP_Portfolio 1.0
             */
            function wp_portfolio_header_title() {
                if (is_archive()) {
                    if (class_exists('WooCommerce') && is_woocommerce()) {
                        $wp_portfolio_header_title = get_the_title(get_option('woocommerce_shop_page_id'));
                    } else {
                        $wp_portfolio_header_title = single_cat_title('', FALSE);
                    }
                } elseif (is_home()) {
                    $wp_portfolio_header_title = get_the_title(get_option('page_for_posts'));
                } elseif (is_404()) {
                    $wp_portfolio_header_title = __('Page NOT Found', 'wp-portfolio');
                } elseif (is_search()) {
                    $wp_portfolio_header_title = __('Search Results', 'wp-portfolio');
                } elseif (is_page_template()) {
                    $wp_portfolio_header_title = get_the_title();
                } else {
                    $wp_portfolio_header_title = get_the_title();
                }
                return $wp_portfolio_header_title;
            }

        endif;
        ?>
