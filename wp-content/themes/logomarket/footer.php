<script>
    $(function ($) {
        var tab = $('.boxSearchArea'),
                offset = tab.offset();

        $(window).scroll(function () {
            if ($(window).scrollTop() > offset.top) {
                tab.addClass('fixed');
            } else {
                tab.removeClass('fixed');
            }
            // ドキュメントの高さ
            scrollHeight = $(document).height();
            // ウィンドウの高さ+スクロールした高さ→ 現在のトップからの位置
            scrollPosition = $(window).height() + $(window).scrollTop();
            // フッターの高さ
            footHeight = $("footer").height();

            // スクロール位置がフッターまで来たら
            if (scrollHeight - scrollPosition <= footHeight) {
                // ページトップリンクをフッターに固定
                tab.removeClass('fixed');
            }
        });

        // page Topフェードイン・アウト
        $(window).bind("scroll", function () {
            if ($(this).scrollTop() > 150) {
                $(".ontop").fadeIn();
            } else {
                $(".ontop").fadeOut();
            }
            // ドキュメントの高さ
            scrollHeight = $(document).height();
            // ウィンドウの高さ+スクロールした高さ→ 現在のトップからの位置
            scrollPosition = $(window).height() + $(window).scrollTop();
            // フッターの高さ
            footHeight = $("footer").height();

            // スクロール位置がフッターまで来たら
            if (scrollHeight - scrollPosition <= footHeight) {
                // ページトップリンクをフッターに固定
                $(".ontop a").css({"position": "absolute", "bottom": "390px"});
            } else {
                // ページトップリンクを右下に固定
                $(".ontop a").css({"position": "fixed", "bottom": "0px"});
            }
        });

        $('input[type=checkbox]').on('click', function () {
            $('#boxSearchForm').submit();
        });
    });
</script>
<footer>
    <div class="footerNavi">
        <ul>
            <li><h3>サービス</h3></li>
            <li><a href="../ロゴ/">ロゴを探す</a></li>
            <li><a href="../order/">ロゴ購入</a></li>
            <li><a href="../price/">料金について</a></li>
            <li><a href="../logomarket/">選ばれる理由</a></li>
            <li><a href="../voice/">お客様の声</a></li>
            <li><a href="../faq/">よくある質問</a></li>
            <li><a href="../inquiry/index/">お問い合わせ</a></li>

            <li><a href="../designer/">厳選されたデザイナー</a></li>
            <li><a href="../copyright/">著作権無料譲渡</a></li>
            <li><a href="../trademark/">商標登録</a></li>
            <li><a href="../concierge/">ロゴマークコンシェルジュ</a></li>
            <li><a href="../industry/index/">業界別ロゴ作成</a></li>
        </ul>

        <ul>
            <li><h3>こだわり</h3></li>
            <li><a href="../logomarket//#ttl01">3000個のロゴマーク</a></li>
            <li><a href="../logomarket//#ttl02">厳選プロデザイナー</a></li>
            <li><a href="../logomarket//#ttl03">明朗会計・追加料金ゼロ</a></li>
            <li><a href="../logomarket//#ttl04">著作権完全譲渡</a></li>
            <li><a href="../logomarket//#ttl05">1点ものオリジナル</a></li>
            <li><a href="../logomarket//#ttl06">修正回数無制限</a></li>
            <li><a href="../logomarket//#ttl07">キャンセルＯＫ</a></li>
            <li><a href="../logomarket//#ttl08">スピード納品</a></li>
            <li><a href="../logomarket//#ttl09">実績1000社以上</a></li>
            <li><a href="../logomarket//#ttl10">希望のファイル形式納品</a></li>
            <li><a href="../logomarket//#ttl11">商標登録サポート</a></li>
        </ul>

        <ul>
            <li><h3><a href="/labo/">ロゴマークラボ</a></h3></li>
            <li><a href="/labo/category/select/">後悔しない制作会社選び</a></li>
            <li><a href="/labo/category/logomark/">ロゴマークとは</a></li>
            <li><a href="/labo/category/make/">ロゴマーク制作の方法</a></li>
            <li><a href="/labo/category/use/">ロゴマーク活用ノウハウ</a></li>
            <li><a href="/labo/category/glossary/">用語集</a></li>
            <li><a href="/labo/category/industry/">業界別！ロゴの選び方</a></li>
        </ul>

        <ul>
            <li><h3>その他</h3></li>
            <li><a href="../feature/">ロゴマーケットのはじまり</a></li>
            <li><a href="../company/">運営会社について</a></li>
            <li><a href="../law/">特定商品取引法に基づく表記</a></li>
            <li><a href="../privacy/">プライバシーポリシー</a></li>
            <li><a href="../keyword/">キーワード一覧</a></li>
            <li><a href="/sitemap/">サイトマップ</a></li>
            <li><a href="../recruit/">デザイナー募集</a></li>
        </ul>
    </div>

    <div class="ontop">
        <a href="#" class="smooth">
            <img src="<?php echo esc_url(get_template_directory_uri()) ?>/img/common/btn_ontop.png" alt="ページの先頭へ">        
        </a>
    </div>
    <div id="copyright">Copyright © Simple works Inc. All Rights Reserved.</div>
</footer><!-- #footer -->

<form action="/ロゴ/" id="boxMobileSearchForm" class="" role="form" method="get" accept-charset="utf-8">    
    <div id="mobileSearchBox_popup">
        <div class="boxSearchArea">
            <p class="btn_close" id="modal-close">
                <a href="#" onclick="window.close(); return false;">close</a>
            </p>
            <div class="selectAlphabet">
                <p class="title">アルファベット</p>
                <select name="_alphabet">
                    <option value="">すべて</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                    <option value="G">G</option>
                    <option value="H">H</option>
                    <option value="I">I</option>
                    <option value="J">J</option>
                    <option value="K">K</option>
                    <option value="L">L</option>
                    <option value="M">M</option>
                    <option value="N">N</option>
                    <option value="O">O</option>
                    <option value="P">P</option>
                    <option value="Q">Q</option>
                    <option value="R">R</option>
                    <option value="S">S</option>
                    <option value="T">T</option>
                    <option value="U">U</option>
                    <option value="V">V</option>
                    <option value="W">W</option>
                    <option value="X">X</option>
                    <option value="Y">Y</option>
                    <option value="Z">Z</option>
                </select>
            </div>
            <div class="selectIndustry">
                <p class="title">業種</p>
                <select name="_keyword">
                    <option value="">すべて</option>
                    <option value="IT">IT</option>
                    <option value="ネットサービス">ネットサービス</option>
                    <option value="テクノロジー">テクノロジー</option>
                    <option value="美容">美容</option>
                    <option value="健康">健康</option>
                    <option value="医療">医療</option>
                    <option value="歯科">歯科</option>
                    <option value="介護福祉">介護福祉</option>
                    <option value="金融">金融</option>
                    <option value="保険">保険</option>
                    <option value="住宅">住宅</option>
                    <option value="不動産">不動産</option>
                    <option value="コンサルタント">コンサルタント</option>
                    <option value="士業">士業</option>
                    <option value="製造">製造</option>
                    <option value="設備">設備</option>
                    <option value="小売">小売</option>
                    <option value="物販">物販</option>
                    <option value="飲食">飲食</option>
                    <option value="教育">教育</option>
                    <option value="公共施設">公共施設</option>
                    <option value="リフォーム">リフォーム</option>
                    <option value="リサイクル">リサイクル</option>
                    <option value="環境">環境</option>
                    <option value="エネルギー">エネルギー</option>
                    <option value="ベンチャー">ベンチャー</option>
                    <option value="クリエイティブ">クリエイティブ</option>
                </select>
            </div>
            <div class="search_price">
                <p class="title">モチーフ</p>
                <select name="_target">
                    <option value="">すべて</option>
                    <option value="星">星</option>
                    <option value="太陽">太陽</option>
                    <option value="桜">桜</option>
                    <option value="山">山</option>
                    <option value="鳥">鳥</option>
                    <option value="クローバー">クローバー</option>
                    <option value="家">家</option>
                    <option value="花">花</option>
                    <option value="海">海</option>
                    <option value="車">車</option>
                    <option value="ライオン">ライオン</option>
                    <option value="木">木</option>
                    <option value="手">手</option>
                    <option value="ハート">ハート</option>
                    <option value="王冠">王冠</option>
                    <option value="羽">羽</option>
                    <option value="翼">翼</option>
                    <option value="犬">犬</option>
                    <option value="猫">猫</option>
                    <option value="炎">炎</option>
                </select>
            </div>
            <div class="search_price">
                <p class="title">価格</p>
                <select name="price">
                    <option value="">すべて</option>
                    <option value="29800">¥29,800</option>
                    <option value="39800">¥39,800</option>
                    <option value="49800">¥49,800</option>
                    <option value="59800">¥59,800</option>
                    <option value="69800">¥69,800</option>
                </select>
            </div>
            <div class="btnSearch">
                <button type="submit">この条件で検索<span class="icon-search_s"></span></button>
            </div>
        </div><!-- .boxSearchArea //-->
    </div><!-- #mobileSearchBox //-->
</form><!--<div id="fb-root"></div>-->
<script type="text/javascript">
    $(function () {
        $('.ontop').click(function () {
            $("html,body").animate({scrollTop: 0}, "100");
        });
    });
    // page Topフェードイン・アウト
    $(function () {
        $(window).bind("scroll", function () {
            if ($(this).scrollTop() > 150) {
                $(".ontop").fadeIn();
            } else {
                $(".ontop").fadeOut();
            }
            // ドキュメントの高さ
            scrollHeight = $(document).height();
            // ウィンドウの高さ+スクロールした高さ→ 現在のトップからの位置
            scrollPosition = $(window).height() + $(window).scrollTop();
            // フッターの高さ
            footHeight = $("footer").height();
            // スクロール位置がフッターまで来たら
            if (scrollHeight - scrollPosition <= footHeight) {
                // ページトップリンクをフッターに固定
                $(".ontop a").css({"position": "absolute", "bottom": "390px"});
            } else {
                // ページトップリンクを右下に固定
                $(".ontop a").css({"position": "fixed", "bottom": "70px"});
            }
        });
    });


    //Facebookのタグを入れてください！
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>                                            
</div>
</body>
</html>
