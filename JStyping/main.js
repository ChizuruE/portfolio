enchant();

var core;

window.onload = function(){

    //core生成
    core = new Core(320,220);
    core.fps = 15;
    core.preload('title.png');
    core.preload('kyokotan.png');
    core.preload('start.png');
    core.preload('key.mp3');
    core.preload('error.mp3');
    //core.preload('start2.png');
    
    //ランキングx位のスコアを0にするやつ
    // localStorage.setItem(10, 0);//ランキング10位のスコアを0にするやつ
    // localStorage.setItem(9, 0);//ランキング9位のスコアを0にするやつ
    // localStorage.setItem(8, 0);//ランキング8位のスコアを0にするやつ
    // localStorage.setItem(7, 0);//ランキング7位のスコアを0にするやつ
    // localStorage.setItem(6, 0);//ランキング6位のスコアを0にするやつ
    // localStorage.setItem(5, 0);//ランキング5位のスコアを0にするやつ
    // localStorage.setItem(4, 0);//ランキング4位のスコアを0にするやつ
    // localStorage.setItem(3, 0);//ランキング3位のスコアを0にするやつ
    // localStorage.setItem(2, 0);//ランキング2位のスコアを0にするやつ
    // localStorage.setItem(1, 0);//ランキング1位のスコアを0にするやつ
    
    core.onload = function(){//画像・音楽読み込み後に実行する関数
        core.rootScene.backgroundColor = "#ffffff";
    
    //タイトル画面
        //タイトルロゴ
        var title = new Sprite(670,217);
        title.image = core.assets['title.png'];
        title.x = core.width / 2 - title.width / 2;
        title.y = -40;
        title.scaleX = 0.40;
        title.scaleY = 0.40;
        core.rootScene.addChild(title); 
        
        //きょこたん画像
        var kyocotan = new Sprite(249,295);
        kyocotan.image = core.assets['kyokotan.png'];
        kyocotan.x = -50;
        kyocotan.y = 25;
        kyocotan.scaleX = 0.35;
        kyocotan.scaleY = 0.35;
        core.rootScene.addChild(kyocotan);
   
        //スタートボタン
        var start = new Sprite(289,137);
        start.image = core.assets['start.png'];
        //start._element.setAttribute('class','button');
        start.x = 90;
        start.y = 70;
        start.scaleX = 0.35;
        start.scaleY = 0.35;
        core.rootScene.addChild(start);
        
        //ランキングボタン
        var ranking = new Label();
        ranking.x = 210;
        ranking.y = 170;
        ranking.color = "#123378";
        ranking.font = '20px "Arial"';
        ranking.text="ranking";
        core.rootScene.addChild(ranking);
    
    //ランキング画面
        //ランキングシーン作成
        var rankingScene = new Scene();
        rankingScene.backgroundColor = '#fffff3';
    
    //スペース入力画面
        //ゲームスタートのためのスペースシーン作成
        var spaceScene = new Scene();
        spaceScene.backgroundColor = "#123378";
        
        //「スペースキー押して」のラベル
        var needSpace = new Label();
        needSpace.x = 200;
        needSpace.y = 50;
        needSpace.color = "#ffffff";
        needSpace.font = '15px "Arial"';
        needSpace.text="スペースキーを押すとスタートします";
        needSpace.moveTo((core.width - needSpace._boundWidth) / 2, needSpace.y);
        spaceScene.addChild(needSpace);
        
        //「press spacebar to start」ラベル
        var needSpace2 = new Label();
        needSpace2.x = 200;
        needSpace2.y = 80;
        needSpace2.color = "#ffffff";
        needSpace2.font = '14px "Arial"';
        needSpace2.text="press spacebar to start";
        needSpace2.moveTo((core.width - needSpace2._boundWidth) / 2, needSpace2.y);
        spaceScene.addChild(needSpace2);
        
        //「日本語入力モードを解除してください」ラベル
        var setMode = new Label();
        setMode.x = 200;
        setMode.y = 150;
        setMode.color = "#ffffff";
        setMode.font = '10px "Arial"';
        setMode.text="※日本語入力モードを解除してください。";
        setMode.moveTo((core.width - setMode._boundWidth) / 2, setMode.y);
        spaceScene.addChild(setMode);
                
    //操作に関して
        //スタートボタン押したらスペース画面へ
        start.on('touchstart', function(){
            core.pushScene(spaceScene);
            
            //スペースキー押したらゲーム画面へ
            core.keybind(32, 'space');
            spaceScene.addEventListener('spacebuttondown', function(){
                var gameScene = getGameScene();
                spaceScene.removeEventListener('spacebuttondown');
                core.replaceScene(gameScene);
            });
        });
        
        //ランキングを押したらランキングシーンへ
        ranking.on('touchstart', function(){
                core.pushScene(getRanking());
            });
    };//core.onload内終わり    

    
    // localStrage test
    if(window.localStorage) {
        //console.log(window.localStorage);
        
        if(localStorage.getItem('easy1') === null) {
            dataSave('easy', getEasyData());
            rankSave(getDefaultRank());
        }
        
        // localStrage全消し　使用注意
        // localStorage.clear();
    }
    core.start();
};


//他のjsファイル読み込み用

//ゲーム終了画面呼び出し関数（game.jsで呼び出される）
function pushEndScene(time, totalHitCount, totalMissCount, dataArray){
        
//ゲーム終了画面
    //ゲーム終了シーン作成
    var endScene = new Scene();
    endScene.backgroundColor = "#ffffff";
    core.replaceScene(endScene);
    
    //「問題終了」ラベル
    var endQuest = new Label();
    endQuest.x = 10;
    endQuest.y = 10;
    endQuest.color = "#555555";
    endQuest.font = '25px "Arial"';
    endQuest.text="問題終了";
    endScene.addChild(endQuest); 
    
    //「スコア」表示用ラベル
    score = ((10 * totalHitCount - 5 * totalMissCount) *(1 + 100/time)).toFixed(2);//スコアの計算
    var scoreLabel = new Label();
    scoreLabel.x = 10;
    scoreLabel.y = 50;
    scoreLabel.color = "#E22222";
    scoreLabel.font = '35px "Arial"';
    scoreLabel.text="SCORE：" + score;
    endScene.addChild(scoreLabel);
    
    //時間表示ラベル
    var timeLabel = new Label();
    timeLabel.x = 10;
    timeLabel.y = 100;
    timeLabel.color = "#555555";
    timeLabel.font = '15px "Arial"';
    timeLabel.text= "時間：" + time + "秒";
    endScene.addChild(timeLabel);
    
    //正誤率表示用ラベル
    var rate = (totalHitCount/ (totalHitCount + totalMissCount) * 100).toFixed(2);//正誤率計算
    var rateLabel = new Label();
    rateLabel.x = 10;
    rateLabel.y = 120;
    rateLabel.color = "#555555";
    rateLabel.font = '15px "Arial"';
    rateLabel.text= "正誤率：" + rate + "%";
    endScene.addChild(rateLabel);
    
    //合計ヒット数ラベル
    var hitLabel = new Label();
    hitLabel.x = 10;
    hitLabel.y = 140;
    hitLabel.color = "#555555";
    hitLabel.font = '15px "Arial"';
    hitLabel.text= "ヒット数：" + totalHitCount;
    endScene.addChild(hitLabel);
    
    //合計ミス数ラベル
    var missLabel = new Label();
    missLabel.x = 10;
    missLabel.y = 160;
    missLabel.color = "#555555";
    missLabel.font = '15px "Arial"';
    missLabel.text= "ミス数：" + totalMissCount;
    endScene.addChild(missLabel); 
    
    //トップ10に入ったときに表示するラベル
    var top10Label = new Label();
    top10Label.x = 10;
    top10Label.y = 190;
    top10Label.color = "#123378";
    top10Label.font = '15px "Arial"';
    top10Label.text= "TOP10入り!";
    
    //トップ10に入ったときに何位かを表示するラベル
    var rankLabel = new Label();
    rankLabel.x = 100;
    rankLabel.y = 190;
    rankLabel.color = "#123378";
    rankLabel.font = '15px "Arial"';
    rankLabel.text= "";
    
    //「出題リストを見る」ラベル
    var listLabel = new Label();
    var listLabel = new Label();
    listLabel.x = 170;
    listLabel.y = 170;
    listLabel.color = "#000000";
    listLabel.font = '15px "Arial"';
    listLabel.text= "出題リストを見る";
    endScene.addChild(listLabel);
    
    //「戻る」ボタン
    var backLabel = new Label();
    backLabel.x = 260;
    backLabel.y = 190;
    backLabel.color = "#000000";
    backLabel.font = '15px "Arial"';
    backLabel.text= "戻る";
    endScene.addChild(backLabel);

//出題リスト画面
    //出題された問題一覧を表示するためのScene作成
    var listScene = new Scene();
    listScene.backgroundColor = "#123378";

//操作に関して
    //「出題リスト」ボタンを押したら出題リスト画面へ
        for(var keyString in dataArray){
            //console.log(keyString + ":" + dataArray[keyString]);
        }
    
    listLabel.on('touchstart', function(){
        core.pushScene(getListScene(dataArray));
        //core.pushScene(listScene);//後で関数に変更（getListScene("問題");）
    });
    
    //「戻る」ボタン押したらタイトル画面へ
    backLabel.on('touchstart', function(){
        goHome();
        scoreLabel.text ="";//以下各ラベルの初期化
        timeLabel.text = "";
        rateLabel.text = "";
        hitLabel.text = "";
        missLabel.text = "";
        rankLabel.text = "";
        backLabel.text = "";
    });
    
    //戻ってきた順位を元にランキングを表示する
    var rank = rankCheak();
    if(rank !== 0){
        rankLabel.text =rank + "位";
        endScene.addChild(top10Label);
        endScene.addChild(rankLabel); 
    }
    
    //
    function rankCheak(){
        score = parseFloat(score);
        var rank = 0;
        var ranking = new Array(10);
        for(i = 0; i<ranking.length; i++){
            ranking[i] = dataLoad("", i+1);
        }
        
        for(i = ranking.length -1; i>=0; i--){
            if(i === 0) {
                ranking[0] = score;  
            }
            else{
                if(score <= ranking[i-1]){
                    if(ranking[ranking.length -1] < score && rank === 0) {
                        ranking[ranking.length - 1] = score;
                        rank = ranking.length;
                        
                    }
                    break;
                }
                else{
                    ranking[i] = ranking[i-1];
                    ranking[i-1] = score;
                    rank = i;
                }
            }
        }
        rankSave(ranking);        
        return rank;
    }
}

//前のページに戻る関数
function goBack(){
    core.popScene();
}

//前のページに2回戻る関数
function goHome(){
    core.popScene();
    core.popScene();
}


