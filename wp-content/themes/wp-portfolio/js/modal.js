$(function(){

//モーダルウィンドウを出現させるクリックイベント
$("#gnavi-open").click(function(){

	//オーバーレイを出現させる
	$("body").append('<div id="modal-overlay"></div>');
	$("#modal-overlay").fadeIn("fast");

	//コンテンツをセンタリングする
	centeringModalSyncer();

	//コンテンツをフェードインする
	$("#gnavi").fadeIn("slow");

	//[#modal-overlay]、または[#modal-close]をクリックしたら…
	$("#modal-overlay,#modal-close").unbind().click(function(){

		//[#gnavi]をフェードアウトした後に…
		$("#gnavi,#modal-overlay").fadeOut("slow",function(){

			//[#modal-overlay]を削除する
			$('#modal-overlay').remove();

		});

	});

});
//リサイズされたら、センタリングをする関数[centeringModalSyncer()]を実行する
$(window).resize(centeringModalSyncer);

	//センタリングを実行する関数
	function centeringModalSyncer(){

		//画面(ウィンドウ)の幅、高さを取得
		var w = $(window).width();
		var h = $(window).height();

		//コンテンツ(#modal-content)の幅、高さを取得
		var cw = $("#gnavi").outerWidth({margin:true});
		var ch = $("#gnavi").outerHeight({margin:true});

		//センタリングを実行する
		$("#gnavi").css({"left": ((w - cw)/2) + "px","top": ((h - ch)/2) + "px"})

	}

});


$(function(){

//モーダルウィンドウを出現させるクリックイベント
$("#search-open").click(function(){

	//オーバーレイを出現させる
	$("body").append('<div id="modal-overlay"></div>');
	$("#modal-overlay").fadeIn("slow");

	//コンテンツをセンタリングする
	centeringModalSyncer();

	//コンテンツをフェードインする
	$("#mobileSearchBox_popup").fadeIn("slow");

	//[#modal-overlay]、または[#modal-close]をクリックしたら…
	$("#modal-overlay,#modal-close").unbind().click(function(){

		//[#mobileSearchBox]をフェードアウトした後に…
		$("#mobileSearchBox_popup,#modal-overlay").fadeOut("slow",function(){

			//[#modal-overlay]を削除する
			$('#modal-overlay').remove();

		});

	});

});
//リサイズされたら、センタリングをする関数[centeringModalSyncer()]を実行する
$(window).resize(centeringModalSyncer);

	//センタリングを実行する関数
	function centeringModalSyncer(){

		//画面(ウィンドウ)の幅、高さを取得
		var w = $(window).width();
		var h = $(window).height();

		//コンテンツ(#modal-content)の幅、高さを取得
		var cw = $("#mobileSearchBox").outerWidth({margin:true});
		var ch = $("#mobileSearchBox").outerHeight({margin:true});

		//センタリングを実行する
		$("#mobileSearchBox").css({"left": ((w - cw)/2) + "px","top": ((h - ch)/2) + "px"})

	}

});

