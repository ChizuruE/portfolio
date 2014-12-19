<?php
	$this -> Html -> script( array( 'jquery-1.11.1.min', 'underscore-min' ), array( 'inline' => false ) );
	echo("<script type='text/javascript'>var fromPHP = ".json_encode($items)."</script>");
?>

<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>登録</title>
	<!-- HTMLHelperを使った読込だと機能しない -->
	<script src="/m_regi/app/webroot/js/jquery-ui.min.js"></script>
	<style type="text/css">
	div#container {
		background-color: #ffff8e;
		margin: auto;
		width: 800px;
	}
	div.item {
		background-color: #C6C6C6;
		width: 480px;
		height: 280px;
		margin: 30px;
	}
	div.item_num {
		float: left;
		width: 60px;
	}
	div.item_value {
		float: left;
		margin: 30px 10px;
	}
	div.dropzone {
		color: #6E6E6E;
		float: left;
		border: dashed;
		text-align: center;
		width: 120px;
		height: 90px;
		margin: 70px 20px;
		padding: 13px;
	}
	img.item_img {
		display: none;
		width: 120px;
		height: 90px;
	}
	div[id$=_reg] {
		display: none;
	}
	.show_toggle {
		width:300px;
		height:50px;
		margin:20px auto;
		padding:10px;
		font-size: 50px;
		text-align:center;
		cursor:pointer;
		background-color: tomato;
		color: white;
		opacity: 0.85;
	}
	.show_toggle:hover {
		opacity: 1;
	}
	.active_toggle {
		width: 800px;
		margin: 20px 0;
		opacity: 1;	
	}
	</style>
</head>
<body>
<div id="container">

	<div class="show_toggle">カテゴリ一覧</div>

	<div id="category_reg">
		<h5>-----カテゴリ登録-----</h5>
		<p>
			<span>
				<select>

					<script id="cat_tmp" type="text/template">
						<%=opt%>
					</script>

				</select>
				<input type="button" value="消去">
			</span>
			<span class="reg">
				<input type="text" size="8">
				<input type="button" class="reg_btn" value="登録">
			</span>
		</p>
	</div><!-- /#category_reg -->
	<hr>

	<div class="show_toggle">商品一覧</div>

	<div id="item_reg">
		<h5>-----商品登録-----</h5>
		<p>
			<span>
				商品数:
				<select>

					<script id="op_tmp" type="text/template">
						<option value="<%-len%>"><%-len%></option>
					</script>

				</select>
			</span>
		</p>
		<div class="list">

			<script id="item_tmp" type="text/template">
				<div class="item" data-metatag_regiapri_item_id="<%-id%>">

					<div class="item_num">
						<%if(id !== "new"){%>
						<span class="delete"><input type="button" value="削除"></span>
						<%}else{%>
						<span style="visibility:hidden;"><input type="button" value="削除"></span>
						<%}%>
						<br><%-num%>
					</div>

					<div class="item_value">
						商品名<br><input type="text" class="name" style="width:150px;" value="<%-item_name%>"><br>
						単価 <input type="text" class="price numtxt" style="width:50px;" value="<%-item_price%>">
						在庫 <input type="text" class="stock numtxt" style="width:50px;" value="<%-item_stock%>"><br>
						カテゴリ<br><select class="cat_id" style="width:150px;"><%=option%></select><br>
						商品詳細<br><textarea class="detail" style="width:200px; height:100px;"><%-item_detail%></textarea>
					</div>

					<div class="dropzone" id="<%-num%>_dropzone">
						<span class="guide">DROP PHOTO HERE!</span>
						<img src="" class="item_img" id="<%-num%>_img">
					</div>

					<p style="clear:both;"></p>

				</div>
			</script>
		</div><!-- /.list -->
		<p>
			<input type="button" class="reset" value="リセット">
			<input type="button" class="dec_btn" value="確定">
		</p>
	</div><!-- /#item_reg -->
	<hr>

	<div class="show_toggle">金券一覧</div>

	<div id="ticket_reg">
		<h5>-----金券登録-----</h5>
		<p>
			金券数:
				<select>
					<!-- #op_tmp -->
				</select>
		</p>
		<h5>金券名／価格</h5>
		<div class="list">

			<script id="ticket_tmp" type="text/template">
				<div class="" data-metatag_regiapri_ticket_id="<%-id%>"><%-num%>:
					<span class="name"><input type="text" size="8" value="<%-ticket_name%>"></span>
					<span class="price"><input type="text" size="3" value="<%-ticket_price%>"></span>
					<%if(id !== "new"){%>
						<span class="delete"><input type="button" value="消去"></span>
					<%}%>
				</div>

			</script>
		</div><!-- /.list -->
		<p>
			<input type="button" class="reset" value="リセット">
			<input type="button" class="dec_btn" value="確定">
		</p>
	</div><!-- /#tickest_reg -->
	<hr>

	<div class="show_toggle">出費登録</div>

	<div id="expense_reg">
		<h5>-----出費登録-----</h5>
		<p>出費内容／値段</p>
		<p>
			<span class="val"><input type="text" size="20"></span>
			¥<span class="price"><input type="text" size="3"></span>
			<span class="reg"><input type="button" class="reg_btn" value="登録"></span>
		</p>
	</div><!-- /#expense_reg -->
</div>


<!-- ------------------------------ 以下JavaScript ------------------------------ -->

<script type="text/javascript">
var items = [],
	items_back=[],
	tickets=[],
	tickets_back=[],
	categorys=[],
	opt;

$(function(){
//--------------------------------------------------------------------------
// 確定ボタン（登録，更新）
	function compare(ary, back){
		for(var i=0; i<ary.length; i++){
			// 新しい商品を登録
			if(ary[i].id == "new"){
				delete ary[i].id;
				console.log(ary[i]);
				$.post('/m_regi/items/add',ary[i],function(data){
					console.log(data);
				});
			}
			// 既存の商品を更新
			else{
				var flag = _.isEqual(ary[i],back[i]);
				if(flag == false){
					console.log("更新をDBに送信");
					// ここでDBに送信
					$.post("/m_regi/items/add",ary[i],function(data){
						console.log(data);
					});
				}else{
					console.log("何もしない");
				}
			}
		}
	}

	$("#item_reg .dec_btn").click(function(){
		var flag = true;
		$("#item_reg .numtxt").each(function(){
			if ($(this).val().match(/[^0-9]/)){
				flag = false;
				$(this).before('<span style="color:red;">*</span>');
			}
		});
		if(flag){
		// リストの値を配列に格納
		var len = $("#item_reg > div.list > div").length,
			ary = [];
		for(var i=0; i<len; i++){
			var target = $("#item_reg > div.list > div.item").eq(i);
			ary[i] = {
				"id" : target.data("metatag_regiapri_item_id") + "",
				"item_detail" : $(".detail", target).html(),
				"item_name" : $(".name", target).val(),
				"item_photo" : $(".item_img", target).attr("src"),
				"item_price" : $(".price", target).val(),
				"item_stock" : $(".stock", target).val(),
				"shop_id" : 2,
				"category_id" : $(".cat_id option:selected",target).val()
			}
		}
		compare(ary,items_back);
		}
	});

	$("#ticket_reg .dec_btn").click(function(){
		var count = $("#ticket_reg > div.list > div").length,
			ary = [];
		for(var i=0; i<count; i++){
			var target = $("#ticket_reg > div.list > div").eq(i);
			ary[i] = {
				"id" : target.data("metatag_regiapri_ticket_id") + "",
				"ticket_name" : $(".name > input:text",target).val(),
				"ticket_price" : $(".price > input:text",target).val()
			}
		}
		compare(ary,tickets_back);
	});
//---------------------------------------------------------------------------------------
// 商品の読込
	for(i=0; i<fromPHP.length; i++){
		items.push(fromPHP[i].Item);
	}
	for(i=0; i<fromPHP.length; i++){
		categorys.push(fromPHP[i].Category);
	}

	function firstadd(tgt, json){
		// プルダウンメニュの内容を生成
		var target = $("#"+tgt+"_reg select"),
			tmp = _.template($("#op_tmp").html()),
			len = json.length;
		for(var i=len; i<=len+10; i++){
			target.append(tmp({len:i}));
		}
		// 既存の品を出力
		target = $("#"+tgt+"_reg > div.list");
		tmp = _.template($("#"+tgt+"_tmp").html());
		var count = $("#"+tgt+"_reg select option:selected").val();
		if(tgt=="item"){
			for(var i=0; i<count; i++){
				// テンプレートのためにプロパティ追加
				json[i].num = i+1;
				json[i].option = opt;
				target.append(tmp(json[i]));
			}
		}else if(tgt=="ticket"){
			for(var i=0; i<count; i++){
				json[i].num = i+1;
				target.append(tmp(json[i]));
			}
		}
	}
	// 商品
	(function(){
			items_back = $.extend(true, {}, items);
				// オプションになる文字列をカテゴリから生成
				opt = "";
				for(var i=0; i<categorys.length; i++){
					opt += '<option value="'+categorys[i].id+'">'+categorys[i].category_name+'</option>';
				}
				var tmp = _.template($("#cat_tmp").html());
				$("#category_reg select").append(tmp(opt));
				firstadd("item",items);
			})();
	// 金券
	(function(){
			firstadd("ticket",tickets);
		});
//--------------------------------------------------------------------------
// プルダウン選択でリストを追加
	function listadd(tgt){
		var target = $("#"+tgt+"_reg div.list"),
			tmp =_.template($("#"+tgt+"_tmp").html()),
		// 次に書き込むdiv数
			count = $("#"+tgt+"_reg select > option:selected").val(),
		// 現在あるdiv数
			len = $("#"+tgt+"_reg > div.list > div").length,
		// 退避
			shelter = [];
		for(var i=0; i<len; i++){
			shelter.push($("#"+tgt+"_reg > div.list > div").eq(i));
		}
		// 削除してから
		$("div.item",target).remove();
		// 書き込み
		for(var i=0; i<count; i++){
			// lenまで退避させたやつを追加，それ以上は新規を追加
			if(i+1 <= len){
				target.append(shelter[i]);
			}else{
				if(tgt=="item"){
					target.append(tmp({
						id: "new", num: i+1, item_name: "", item_price: "", item_stock: "", option: opt, item_detail: "", item_photo: ""
					}));
				}else if(tgt=="ticket"){
					target.append(tmp({
						id: "new", num: i+1, ticket_name: "",ticket_price: ""
					}));
				}
			}
		}
	}
	$("#item_reg select").change(function(){
		listadd("item");
	});
	$("#ticket_reg select").change(function(){
		listadd("ticket");
	});
//--------------------------------------------------------------------------
// 消去ボタン
	$(document).on("click","div.item .delete",function(){
		var target = $(this).parents(".item"),
			result = confirm("この商品を削除しますか？");
		if(result){
			target.remove();
		}else{
			console.log("cansel");
		}
		return false;
	});
//--------------------------------------------------------------------------
// リセットボタン（そこのリストを初期状態に戻す）
	function resetList(tgt, json){
		var target = $("#"+tgt+"_reg > div.list");
			tmp = _.template($("#"+tgt+"_tmp").html());
		$("div",target).remove();
		for(var i=0; i<json.length; i++){
			target.append(tmp(json[i]));
		}
		// selectedも初期状態に戻す
		var ary = $("#"+tgt+"_reg select > option").eq(0);
		ary[0].selected = true;
	}
	$("#item_reg .reset").click(function(){
		resetList("item",items);
	});
	$("#ticket_reg .reset").click(function(){
		resetList("ticket",tickets);
	});
//--------------------------------------------------------------------------
// 出費登録
	$("#expense_reg .reg_btn").click(function(){
		var val1 = $("#expense_reg textarea").val();
			val2 = $("#expense_reg input:text").val();
			obj = {content:val1,expense:val2};
		if(obj.content !== "" && obj.expense !== ""){
			console.log(obj.content + obj.expense);
		}else{
			console.log("null発見");
		}
	});
//--------------------------------------------------------------------------
// 画像関連
	var target_dropzone;
	// ドラッグ&ドロップされたらブラウザでファイルが開かれてしまうのを防ぐ
	$("body").on("dragover",function(){
		event.preventDefault();
	})
	$(document).on("drop",".dropzone",function(){
        event.preventDefault();
        event.stopPropagation();
        // FileListオブジェクトを取得
        var files = event.dataTransfer.files,
        	file = files[0],
        	fileReader = new FileReader();
	    target_dropzone = $(event.target).attr("id");
        if(file.type.indexOf("image/") === 0){
	        fileReader.onload = function(event){
	        	$("#"+target_dropzone+" > .guide").hide();
	        	var src = event.target.result;
	        	$("#"+target_dropzone+" > .item_img").attr("src", src);
				$("#"+target_dropzone+" > .item_img").show();
	        }
		  	fileReader.readAsDataURL(file);
	 	}else{
	 		alert("画像ファイル以外はむりだわ");
	  }

	});
//--------------------------------------------------------------------------
// 外にドラッグ&ドロップで既存の画像を削除
	$(document).on("dragstart",".item_img",function(){
		event.dataTransfer.setData("text", event.target.id);
	})
	$("body").on("drop",function(){
		event.preventDefault();
		var targetclass = $(event.target).attr("class") + "";
		if (targetclass !== "item_img" && targetclass !== "dropzone"){
			event.stopPropagation();
			$("#"+event.dataTransfer.getData("text")).attr("src", "").hide();
			$("#"+event.dataTransfer.getData("text")).prevAll(".guide").show();	
		}
	})
//--------------------------------------------------------------------------
	$(".show_toggle").on("click",function(){
		$(this).next().slideToggle(500);
		$(this).toggleClass("active_toggle", 650, "easeOutSine", function(){

		});
	});
//--------------------------------------------------------------------------
});

</script>
</body>
</html>