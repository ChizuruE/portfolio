//今作ってるやつ
function getListScene(dataArray){    

    //出題リスト画面
    //出題された問題一覧を表示するためのScene作成
    var listScene = new Scene();
    listScene.backgroundColor = "#ffffff";    
    
    //ページ数を示す
    var pageNum = 0;
    
    //それぞれのデータを入れ直す配列
    var keyArray = new Array();
    var valueArray = new Array();
    
    //ページ切り替え用ボタン
    var p1 = new Label();
    p1.x = 240;
    p1.y = 200;
    p1.color = "#000000";
    p1.font = '15px "Arial"';
    p1.text= "1";

    listScene.addChild(p1);
    p1.on('touchstart', function(){
        pageNum = 0;
        dataSet();
    });
    
    var p2 = new Label(); 
    p2.x = 260;
    p2.y = 200;
    p2.color = "#000000";
    p2.font = '15px "Arial"';
    p2.text= "2";
    listScene.addChild(p2);
    p2.on('touchstart', function(){
        pageNum = 1;
        dataSet();
    });
    
    var p3 = new Label();
    p3.x = 280;
    p3.y = 200;
    p3.color = "#000000";
    p3.font = '15px "Arial"';
    p3.text= "3";
    listScene.addChild(p3);
    p3.on('touchstart', function(){
        pageNum = 2;
        dataSet();
    });
    
    var p4 = new Label();
    p4.x = 300;
    p4.y = 200;
    p4.color = "#000000";
    p4.font = '15px "Arial"';
    p4.text= "4";
    listScene.addChild(p4);
    p4.on('touchstart', function(){
        pageNum = 3;
        dataSet();
    });
    
    // データを入れ直す
//    for(var keyString in dataArray){
//        keyArray.push(keyString);
//        valueArray.push(dataArray[keyString]);
//        console.log(keyString + ":" + dataArray[keyString]);
//    }
    
       
    // データ表示用のラベル作成
    var dataLabels = new Array();
    for(var i = 0; i < 5; i++){
        dataLabels[i] = new Label();
        dataLabels[i].font = '3px "Arial"';
        dataLabels[i].color = "#000000";
        dataLabels[i].width = 280;
        dataLabels[i].x = 10;
        dataLabels[i].y = 10+i*42;
        dataLabels[i].text = ""

        listScene.addChild(dataLabels[i]);
    }
    
    function dataSet() {
        for(var i = 0; i < 5; i++) {
            dataLabels[i].text = "[" + (i+1+pageNum * 5) + "] " + dataArray[i + pageNum * 5].name + "<br>" + dataArray[i + pageNum * 5].discription;
        }
    }
    
    dataSet();
    
    return listScene;
}