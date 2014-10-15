function getRanking(){
    
    //ランキング表示画面作成
    var rankingScene = new Scene();
    rankingScene.backgroundColor = "#ffffff";
    
    //自己ベストランキングラベル
    var bestLabel = new Label();
    bestLabel.x = 10;
    bestLabel.y = 10;
    bestLabel.color = "#000000";
    bestLabel.font = '25px "Arial"';
    bestLabel.text= "自己ベスト";
    rankingScene.addChild(bestLabel);
    
    //10人分のデータ
    var labels = new Array(10);
    
    for(i=0; i<labels.length; i++){
        labels[i] = new Label();
        labels[i].font = '12px "Arial"';
        labels[i].x = 20;
        labels[i].y = 50 + i*15;
        labels[i].text = (i + 1) + "位　" + dataLoad("", i + 1) + "点";
        rankingScene.addChild(labels[i]);
    }
    
    
    //「戻る」ボタン
    var backLabel = new Label();
    backLabel.x = 260;
    backLabel.y = 190;
    backLabel.color = "#000000";
    backLabel.font = '15px "Arial"';
    backLabel.text= "戻る";
    rankingScene.addChild(backLabel);
    

    backLabel.on('touchstart', function(){
        goBack();
    });
    
    return rankingScene;
}