// dataTypeは難易度(easy)など。ランクを表す時は””なら数字だけにできるはず
var dataSave = function (dataType, data) {
    var i = 1;
    for (var key in data) {
        var obj = {
            name:key,
            discription:data[key]
        };
        
        console.log(obj.name + ' : ' + obj.discription);
        localStorage.setItem(dataType + i, JSON.stringify(obj));//一旦オブジェクトをJSON文字列に変換する
        
        i++;
    }
};

// Ranking_Data
var rankSave = function (data) {
    for (var i = 1; i <= data.length; i++) {
        console.log(i + ' : ' + data[i - 1]);
        localStorage.setItem(i, data[i - 1]);
    }
};

//問題を取得させる関数
var dataLoad = function(dataType, i) {
    var data;
    
    if(dataType !== "") {
        data = JSON.parse(localStorage.getItem(dataType + i));//JSON文字列をJavaScriptオブジェクトに戻す
        //console.log(data.name, data.discription);
    } else data = parseFloat(localStorage.getItem(i));
    return data;
};

var getDefaultRank = function() {
    var data = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    return data;
};

// 問題数を記録しておく必要あるかも　現在[easy:155]
var getEasyData = function() {
    var data = {
        'console.log()':'consoleオブジェクト。console.log()は引数に指定したObjectをブラウザのConsole(開発者ツール)に表示する。主にデバック時に使用される。',
        'attributes[]':'DOMのプロパティ。ノードの属性リストを取得。',
        'childNodes[]':'DOMのプロパティ。子ノードのリストを取得。',
        'className':'DOMのプロパティ。クラス名の取得・設定。',
        'dir':'DOMのプロパティ。テキスト・ディレクションの取得・設定。',
        'firstChild':'DOMのプロパティ。最初の子ノードを取得。',
        'id':'DOMのプロパティ。ID名の取得・設定。',
        'innerHTML':'DOMのプロパティ。ノード内のHTML要素の取得・設定。',
        'lang':'DOMのプロパティ。言語コードの取得・設定。',
        'lastChild':'DOMのプロパティ。最後の子ノードを取得。',
        'localName':'DOMのプロパティ。ローカル名の取得。',
        'namespaceURI':'DOMのプロパティ。名前空間URIの取得。',
        'nodeName':'DOMのプロパティ。ノードの名前を取得。',
        'nodeType':'DOMのプロパティ。ノードの型を取得。',
        'nodeValue':'DOMのプロパティ。ノードの値を取得。',
        'ownerDocument':'DOMのプロパティ。オーナードキュメントを取得。',
        'parentNode':'DOMのプロパティ。親ノードを取得。',
        'prefix':'DOMのプロパティ。名前空間の識別子を取得。',
        'tagName':'DOMのプロパティ。タグ名の取得・設定。',
        'title':'DOMのプロパティ。タイトル属性の取得・設定。',
        'appendChild()':'DOMのメソッド。ノードを末尾に追加する。',
        'cloneNode()':'DOMのメソッド。ノードを複製する。',
        'createComment()':'DOMのメソッド。コメントノードをを生成する。',
        'createElement()':'DOMのメソッド。エレメントノードを生成する。',
        'createTextNode()':'DOMのメソッド。テキストノードを生成する。',
        'getAttribute()':'DOMのメソッド。ノードの属性を取得する。',
        'getElementByTagName()':'DOMのメソッド。タグ名を取得する。',
        'hasChildNodes()':'DOMのメソッド。子ノードがあるか調べる。',
        'insertBefore()':'DOMのメソッド。任意の位置にノード挿入する。',
        'replaceChild()':'DOMのメソッド。ノードを置換する。',
        'removeChild()':'DOMのメソッド。ノードを削除する。',
        'setAttribute()':'DOMのメソッド。ノードの属性を設定する。',
        'onBlur':'イベントハンドラ。ページやフォーム要素からフォーカスが外れた時に発生。',
        'onFocus':'イベントハンドラ。ページやフォーム要素にフォーカスが当たった時に発生。',
        'onChange':'イベントハンドラ。フォーム要素の選択、入力内容が変更された時に発生。',
        'onSelect':'イベントハンドラ。テキストが選択された時に発生。',
        'onSelectStart':'イベントハンドラ。ページ内の要素が選択されようとした時に発生。　※IEのみ',
        'onSubmit':'イベントハンドラ。フォームを送信しようとした時に発生。',
        'onReset':'イベントハンドラ。フォームがリセットされた時に発生。',
        'onAbort':'イベントハンドラ。画像の読み込みを中断した時に発生。',
        'onError':'イベントハンドラ。画像の読み込み中にエラーが発生した時に発生。',
        'onLoad':'イベントハンドラ。ページや画像の読み込みが完了した時に発生。',
        'onUnload':'イベントハンドラ。ウィンドウを閉じた時、他のページに切り替えた時、ページをリロード（更新）した時に発生。',
        'onClick':'イベントハンドラ。要素やリンクをクリックした時に発生。',
        'onDblClick':'イベントハンドラ。要素をダブルクリックした時に発生。',
        'onKeyUp':'イベントハンドラ。押していたキーをあげた時に発生。',
        'onKeyDown':'イベントハンドラ。キーを押した時に発生。',
        'onKeyPress':'イベントハンドラ。キーを押してる時に発生。',
        'onMouseOut':'イベントハンドラ。マウスが離れたした時に発生。',
        'onMouseOver':'イベントハンドラ。マウス乗った時に発生。',
        'onMouseUp':'イベントハンドラ。クリックしたマウスを上げた時に発生。',
        'onMouseDown':'イベントハンドラ。マウスでクリックした時に発生。',
        'onMouseMove':'イベントハンドラ。マウスを動かしている時に発生。',
        'onDragDrop':'イベントハンドラ。マウスでドラッグ＆ドロップした時に発生。　※NN4のみ',
        'document.close()':'ドキュメントを閉じる。',
        'document.clear()':'ドキュメントをクリア。',
        'document.getElementById()':'documentオブジェクトのメソッド。特定のID名のオブジェクトにアクセスする。',
        'document.getElementsByName()':'documentオブジェクトのメソッド。特定の要素名のオブジェクト全てにアクセスする。',
        'document.open()':'documentオブジェクトのメソッド。ドキュメントを開く。',
        'document.write()':'documentオブジェクトのメソッド。htmlのbody要素に文字列を追加する。HTMLタグを書きだすことも可能。',
        'document.writeIn()':'documentオブジェクトのメソッド。文字列の出力（末尾に改行文字を挿入）。',
        'document.bgColor':'documentオブジェクトのプロパティ。現在のページの背景色を設定・取得。',
        'document.cookie':'documentオブジェクトのプロパティ。クッキーの保存・取得。',
        'document.domain':'documentオブジェクトのプロパティ。現在のページのドメイン名を取得。',
        'document.fgColor':'documentオブジェクトのプロパティ。現在のページの文字色を設定・取得。',
        'document.lastModified':'documentオブジェクトのプロパティ。ドキュメントの最終更新日時。',
        'document.length':'documentオブジェクトのプロパティ。現在のページ内のの各要素数を取得。',
        'document.location':'documentオブジェクトのプロパティ。現在のページのURLを取得。',
        'document.URL':'documentオブジェクトのプロパティ。現在のページのURLを取得。',
        'document.navigator':'documentオブジェクトのプロパティ。ユーザーのブラウザ情報やPC環境情報を取得。',
        'document.referrer':'documentオブジェクトのプロパティ。現在のページにアクセスする前のURLを取得。',
        'document.title':'documentオブジェクトのプロパティ。現在のページのタイトル。',
        'document.anchors[]':'documentオブジェクトのコレクション。現在のページのアンカー情報。',
        'document.applets[]':'documentオブジェクトのコレクション。現在のページのアプレット情報。',
        'document.embeds[]':'documentオブジェクトのコレクション。現在のページのEMBED情報。',
        'document.forms[]':'documentオブジェクトのコレクション。現在のページのフォーム情報。',
        'document.links[]':'documentオブジェクトのコレクション。現在のページ内のリンク情報。',
        'document.images[]':'documentオブジェクトのコレクション。現在のページの画像情報。',
        'closed':'windowオブジェクトのプロパティ。ウィンドウが閉じられているか調べる。',
        'defaultStatus':'windowオブジェクトのプロパティ。ブラウザのステータスバーに表示するデフォルトメッセージを設定・取得。',
        'document':'windowオブジェクトのプロパティ。ドキュメントの出力、ドキュメント情報の取得・設定。',
        'history':'windowオブジェクトのプロパティ。履歴の移動（戻る・進む）、履歴数の取得。',
        'length':'windowオブジェクトのプロパティ。ウィンドウ内のフレーム数を取得。',
        'location':'windowオブジェクトのプロパティ。URL情報の取得。',
        'name':'windowオブジェクトのプロパティ。ウィンドウ名の取得・設定。',
        'opner':'windowオブジェクトのプロパティ。自分自身を開いた親ウィンドウを示す。',
        'parent':'windowオブジェクトのプロパティ。親ウィンドウ。',
        'outerWidth':'windowオブジェクトのプロパティ。ウィンドウの幅を取得・設定。',
        'outerHeight':'windowオブジェクトのプロパティ。ウィンドウの高さを取得・設定。',
        'screen':'windowオブジェクトのプロパティ。スクリーンサイズの取得・設定。',
        'self':'windowオブジェクトのプロパティ。ウィンドウ自身を指す。',
        'pageXOffset()':'windowオブジェクトのプロパティ。現在表示位置のX座標を取得。　※NNのみ',
        'pageYOffset()':'windowオブジェクトのプロパティ。現在表示位置のY座標を取得。　※NNのみ',
        'status':'windowオブジェクトのプロパティ。ブラウザのステータスバーに表示するメッセージを設定・取得。',
        'top':'windowオブジェクトのプロパティ。トップ。',
        'alert()':'windowオブジェクトのメソッド。アラート表示。',
        'blur()':'windowオブジェクトのメソッド。フォーカスを外す。',
        'close()':'windowオブジェクトのメソッド。ウィンドウを閉じる。',
        'confirm()':'windowオブジェクトのメソッド。確認ダイアログ表示。',
        'clearInterval()':'windowオブジェクトのメソッド。タイマー解除。',
        'clearTimeout()':'windowオブジェクトのメソッド。タイマー解除。',
        'createPopup()':'windowオブジェクトのメソッド。ポップアップウィンドウ生成。',
        'focus()':'windowオブジェクトのメソッド。フォーカスを当てる。',
        'moveTo()':'windowオブジェクトのメソッド。ウィンドウの位置を画面左上端を基準に、指定した位置に移動。',
        'resizeTo()':'windowオブジェクトのメソッド。ウィンドウサイズを指定したサイズに変更。',
        'moveBy()':'windowオブジェクトのメソッド。現在のウィンドウの位置を基準に、指定した位置に移動。',
        'resizeBy()':'windowオブジェクトのメソッド。現在のウィンドウサイズに指定した幅・高さを追加したサイズに変更。ウィンドウサイズを小さくする場合は、負の値を指定。',
        'open()':'windowオブジェクトのメソッド。ウィンドウを開く。',
        'print()':'windowオブジェクトのメソッド。ウィンドウを印刷する。',
        'prompt()':'windowオブジェクトのメソッド。入力ダイアログ表示。',
        'scrollBy()':'windowオブジェクトのメソッド。相対位置にスクロールする。',
        'scroll()':'windowオブジェクトのメソッド。指定位置にスクロールする。',
        'scrollTo()':'windowオブジェクトのメソッド。指定位置にスクロールする。',
        'setTimeout()':'windowオブジェクトのメソッド。タイマー設定（指定秒数後に処理を実行）。',
        'setInterval()':'windowオブジェクトのメソッド。タイマー設定（定期的に処理を実行）。'
    };
    
    return data;
};