/**
 * 共通JavaScript
 */

/*=====================================================
 meta: {
 title: "jquery-opacity-rollover.js",
 version: "2.1",
 copy: "copyright 2009 h2ham (h2ham.mail@gmail.com)",
 license: "MIT License(http://www.opensource.org/licenses/mit-license.php)",
 author: "THE HAM MEDIA - http://h2ham.seesaa.net/",
 date: "2009-07-21"
 modify: "2009-07-23"
 }
 =====================================================*/
(function ($) {
    $.fn.opOver = function (op, oa, durationp, durationa) {
        var c = {
            op: op ? op : 1.0,
            oa: oa ? oa : 0.6,
            durationp: durationp ? durationp : 'fast',
            durationa: durationa ? durationa : 'fast'
        };

        $(this).each(function () {
            $(this).css({
                opacity: c.op,
                filter: "alpha(opacity=" + c.op * 100 + ")"
            }).hover(function () {
                $(this).fadeTo(c.durationp, c.oa);
            }, function () {
                $(this).fadeTo(c.durationa, c.op);
            })
        });
    },
            $.fn.wink = function (durationp, op, oa) {
                var c = {
                    durationp: durationp ? durationp : 'slow',
                    op: op ? op : 1.0,
                    oa: oa ? oa : 0.2
                };

                $(this).each(function () {
                    $(this).css({
                        opacity: c.op,
                        filter: "alpha(opacity=" + c.op * 100 + ")"
                    }).hover(function () {
                        $(this).css({
                            opacity: c.oa,
                            filter: "alpha(opacity=" + c.oa * 100 + ")"
                        });
                        $(this).fadeTo(c.durationp, c.op);
                    }, function () {
                        $(this).css({
                            opacity: c.op,
                            filter: "alpha(opacity=" + c.op * 100 + ")"
                        });
                    })
                });
            }
})(jQuery);




$.fn.extend({
    /**
     * 有効化
     */
    enable: function (enable)
    {
        var list = 'input[type=submit],input[type=button],input[type=reset],button';

        var tag = this.get(0).tagName;
        var isForm = (tag == 'FORM');

        if (enable == undefined) {
            enable = true;
        }
        if (enable) {
            this.removeAttr('disabled');
            if (isForm) {
                this.find(list).removeAttr('disabled');
            }
        } else {
            this.attr('disabled', 'disabled');
            if (isForm) {
                this.find(list).attr('disabled', 'disabled');
            }
        }
    },
    /**
     * 無効化
     */
    disable: function ()
    {
        this.enable(false);
    },
    /**
     * src置換
     * @param from
     * @param to
     */
    replaceSrc: function (from, to)
    {
        var src = this.attr('src');
        if (src) {
            src = src.replace(from, to);
            this.attr('src', src);
        }
    },
    /**
     * img src置換
     * @param from
     * @param to
     */
    replaceImgSrc: function (from, to)
    {
        this.replaceSrc(from, to);
        this.find('img').each(function () {
            $(this).replaceSrc(from, to);
        });
    },
    /**
     * 画像ON
     */
    imgOn: function ()
    {
        this.replaceImgSrc('_off.', '_on.');
    },
    /**
     * 画像OFF
     */
    imgOff: function ()
    {
        this.replaceImgSrc('_on.', '_off.');
    },
    /**
     * ロールオーバー設定
     */
    setRollover: function ()
    {
        this.mouseover(function () {
            $(this).imgOn();
        });
        this.mouseout(function () {
            $(this).imgOff();
        });
    },
    /**
     * ロールオーバー設定解除
     */
    unsetRollover: function ()
    {
        this.unbind('mouseover');
        this.unbind('mouseout');
    },
    /**
     * submit時無効化
     */
    disableOnSubmit: function (list)
    {
        if (list == null) {
            list = 'input[type=submit],input[type=button],input[type=reset],button';
        }
        $(this).find(list).removeAttr('disabled');
        $(this).submit(function () {
            $(this).find(list).attr('disabled', 'disabled');
        });
        return this;
    },
    /**
     * 背景画像プリロード
     */
    preloadBackgroundImage: function () {
        var image = this.css('backgroundImage');
        var src = image.replace(/^url\((\"?)(.*?)\1\)$/, '$2'); //"
        if (src == 'none') {
            return;
        }
        var hover = src.replace(/_off./, '_on.');
        if (hover != src) {
            (new Image()).src = hover;
        }
    }
});

$.extend({
    /**
     * ローテーション設定
     */
    setRotation: function (target, max, option) {
        if (!$(target + max).length) {
            return;
        }

        option = $.extend({
            interval: 6000,
            fade: 1500
        }, option);

        var cur = 1;

        // Preload
        for (var i = 2; i <= max; i++) {
            $(target + i).preloadBackgroundImage();
        }

        var rotate = function () {
            $(target + cur).fadeOut(option.fade);
            if (++cur > max) {
                cur = 1;
            }
            $(target + cur).fadeIn(option.fade, function () {
                setTimeout(rotate, option.interval);
            });
        };
        setTimeout(rotate, option.interval);
    }
});

$(function () {
    $('.submit-on-change').change(function () {
        this.form.submit();
        return false;
    });

    $('.confirm-on-click').click(function () {
        var msg = $(this).text() + 'して本当によろしいですか？';
        return window.confirm(msg);
    });

    $('.select-on-click').click(function () {
        $(this).select();
        return false;
    });

    $('input[type=image]').not('.no-rollover').setRollover();

    $('a').each(function () {
        $(this).preloadBackgroundImage();
    });

    if ($.support.opacity) {
        $('.opOver').opOver(1.0, 0.6, 'fast', 'fast');
    }
    //$.setRotation('#top-catch', 3);

    // 開閉パネル
    $('a.slide-panel').click(function () {
        var $this = $(this);
        var open = $this.hasClass('slide-panel-open');
        var $panel = $('#' + $this.data('panel'));
        var speed = 200;

        if (open) {
            $panel.slideUp(speed);
        } else {
            $panel.slideDown(speed);
        }
        $this.toggleClass('slide-panel-open');
    });

    /* ご意見送信 */
    (function () {
        var button = $('#side-feedback-submit');
        var textarea = $('#side-feedback-textarea');
        var thanks = $('#side-feedback-thanks');
        var msg = 'ご意見を送信してよろしいですか？';

        button.click(function () {
            var text = textarea.val();
            if (!text.length) {
                return;
            }
            if (!window.confirm(msg)) {
                return;
            }
            $.ajax({
                type: 'post',
                url: '/feedback',
                data: {
                    message: text
                },
                success: function () {
                    button.hide();
                    textarea.hide();
                    thanks.fadeIn('slow');
                }
            });
        });
    })();

    /* ロゴ一覧表示件数 */
    $('select#logo_list_per_page').change(function () {
        var perPage = $(this).val();
        document.location.href = '?perPage=' + perPage;
    });
});

/* get and set cookie */
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
// Another boring cookie helper function
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

/* validate form */
function formValidate(ob) {
    var id = ob.attr('for');
    var er = $(id);
    var rs = [];
    var rulesParsing = ob.attr('class');
    var getRules = /validate\[(.*)\]/.exec(rulesParsing);
    if (!getRules)
        return true;
    var condition = getRules[1];
    rs = validateField(ob.val(), condition);
    if (!er.hasClass('validating')) {
        er.addClass('validating');
    }
    var dd = document.getElementById(ob.attr('id')).parentNode;
    var t = document.createTextNode(rs[1].toString());
    if (rs[0]) {
        er.removeClass('error_check');
        er.addClass('success_check');
        ob.css('border', '1px solid #cccccc');
        removeErrorMsg(dd);
    } else {
        er.removeClass('success_check');
        er.addClass('error_check');
        ob.css('border', '1px solid red');
        if (dd.getElementsByClassName('error-message').length < 1) {
            addErrorMsg(dd, t);
        } else {
            removeErrorMsg(dd);
            addErrorMsg(dd, t);
        }
    }
    setTimeout(function () {
        er.removeClass('validating');
    }, 200);

    return rs[0];
}

function addErrorMsg(dd, msg) {
    var span = document.createElement('span');
    span.className = 'error-message';
    span.appendChild(msg);
    dd.appendChild(span);
}

function removeErrorMsg(dd) {
    if (dd.getElementsByClassName('error-message')[0]) {
        dd.removeChild(dd.getElementsByClassName('error-message')[0]);
    }
}

function validateField(data, condition) {
    if (condition) {
        var rules = condition.split(/\[|,|\]/);
    } else {
        return true;
    }
    for (var i = 0; i < rules.length; i++) {
        rules[i] = rules[i].toString().replace(" ", "");//.toString to worked on IE8
        // Remove any parsing errors
        if (rules[i] === '') {
            delete rules[i];
        }
    }
    for (var i = 0; i < rules.length; i++) {
        var errorMsg = '';
        var required = true;
        switch (rules[i]) {
            case "required":
                if (data.trim() == '') {
                    required = false;
                    errorMsg = 'この項目を入力してください。';
                }
                break;
            case "alphabet":
                var re = /^[\.\_A-Za-z0-9]$/;
                if (!re.test(data)) {
                    required = false;
                    errorMsg = '電話番号を入力してください';
                }
                break;
            case "phone":
                var re = /^\+?([0-9]\s?\-{0,2}\s?[0-9]?){5,18}[0-9]$/;
                if (!re.test(data)) {
                    required = false;
                    errorMsg = '電話番号を入力してください';
                }
                break;
            case "email":
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if (!re.test(data)) {
                    required = false;
                    errorMsg = 'メールアドレスを入力してください。';
                }
                break;
            case "maxLength":
                var _max = rules[i + 1];
                if (data.length > _max) {
                    required = false;
                    errorMsg = '';
                }
                break;
            case "minLength":
                var _min = rules[i + 1];
                if (data.length > _max) {
                    required = false;
                    errorMsg = '';
                }
                break;
            case "maxCheckbox":
                var _cb = rules[i + 1];
                var group = rules[i + 3];
                var _check = 0;
                $('form input[group=' + group + ']').each(function () {
                    if ($(this).is(':checked')) {
                        _check++;
                    }
                });
                if (_check < _cb) {
                    required = false;
                    errorMsg = 'お問い合わせの種類を選択してください。';
                }
                break;
            default:
                break;
        }
        if (errorMsg !== '') {
            break;
        }
    }

    var jsVal = [];
    jsVal[0] = required;
    jsVal[1] = errorMsg;
    return jsVal;
}

function viewLogoHistory(logoHistory, pageNum) {
    if (!pageNum) {
        pageNum = 1;
    }
    $.ajax({
        type: 'POST',
        url: '/logo/view_logo_history',
        data: {logo_list_history: logoHistory, page: pageNum},
        cache: false,
        beforeSend: function (xhr) {
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        },
        success: function (response) {
            if (pageNum == 1) {
                $('#div_logo_history').html(response);
            } else {
                $('#div_logo_history').append(response);
            }
        }
    });
}
function loadLogoHistory(logoHistory) {
    $.ajax({
        type: 'POST',
        url: '/logo/logo_history',
        data: {logo_list_history: logoHistory, show_num: getHistoryShowNum()},
        cache: false,
        beforeSend: function (xhr) {
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        },
        success: function (response) {
            if (response === 'error') {
                if (!$('#logo_history').hasClass('hide')) {
                    $('#logo_history').addClass('hide');
                }
            } else {
                $('#logo_history').removeClass('hide');
                $('#history_list').html(response);
            }
        }
    });
}

function getHistoryShowNum() {
    var nums = 6;
    if (document.body.clientWidth < 768) {
        var wid = (document.body.clientWidth - 100);
        nums = Math.round(wid / 90);
    } else if (document.body.clientWidth < 1280) {
        var wid = (document.body.clientWidth - 190);
        nums = Math.round(wid / 90);
    }
    return nums;
}

function checkIEBrowser() {
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");
    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))  // If Internet Explorer, return version number
    {
        return true;
    } else  // If another browser, return 0
    {
        return false;
    }
    return false;
}