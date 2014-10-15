function getGameScene(){
//ゲーム画面
    //ゲームシーン作成
    var gameScene = new Scene();
    gameScene.backgroundColor = "#ffffff";

    var fps = 15;
    
    //背景
    var bgSprite = new Sprite(gameScene.width, gameScene.height);
    bgSprite.backgroundColor = "#fff";
    gameScene.addChild(bgSprite);
    
    //問題数格納用変数作成
    var count = 1;
    
    //問題数表示用ラベル作成
    var countLabel = new Label();
    countLabel.x =10;
    countLabel.y =5;
    countLabel.color = '#116635';
    countLabel.font ='25px "Arial"';
    countLabel.text = count + "/20";    

    //タイマーラベル
    var timeLabel = new Label();
    timeLabel.x =250;
    timeLabel.y =5;
    timeLabel.color = '#123378';
    timeLabel.font ='25px "Arial"';
    timeLabel.text = 0;
    
    //タイムウォッチ詳細
    timeLabel.on('enterframe', function(){
        timeLabel.text =(gameScene.age/fps).toFixed(2);//小数点以下
        timeLabel.x =gameScene.width - timeLabel.text.length*14;
    });
    
//問題関連
    //差し込まれる問題達
    var question = "";
    var totalHitCount = 0;
    var totalMissCount = 0;
    
    //キーボード入力ラベル（最初表示されてる方）の作成
    var inputLabel = new Label();
    inputLabel.x =0;
    inputLabel.y =60;
    inputLabel.width = gameScene.width;
    inputLabel.color = '#000000';
    inputLabel.font ='15px "Arial"';
    inputLabel.text = question;
    inputLabel.textAlign = "center";
    
    //キーボード入力ラベル（入力完了の方）の作成
    var completeLabel = new Label();
    completeLabel.x =0;
    completeLabel.y =60;
    completeLabel.width = gameScene.width;
    completeLabel.color = '#000000';
    completeLabel.opacity = 0.4;
    completeLabel.font ='15px "Arial"';
    completeLabel.text = "";
    completeLabel.textAlign = "center";
    
    //問題表示用ラベル作成
    var questLabel = new Label();
    questLabel.x =0;
    questLabel.y =80;
    questLabel.width = gameScene.width;
    questLabel.color = '#E22222';
    questLabel.font ='20px "Arial"';
    questLabel.text = question;
    questLabel.textAlign = "center";
    
    //概要用ラベル作成
    var outlineLabel = new Label();
    outlineLabel.x =200;
    outlineLabel.y =120;
    outlineLabel.width = 200;
    outlineLabel.color = '#000000';
    outlineLabel.font ='13px "Arial"';
    outlineLabel.text = "";
    outlineLabel.wrap = false;
    outlineLabel.moveTo((gameScene.width - outlineLabel.width) / 2, outlineLabel.y);
    
//問題取得関数
    function getQuest(data){
        question = data.name;
        questLabel.text = question;
        inputLabel.text = question;
        completeLabel.text = "";
        outlineLabel.text = data.discription;
        
        dataArray.push(data);
        
    }

    var dataArray = new Array();


    
//操作に関して
    getQuest(dataLoad('easy', Math.floor(Math.random()*115)+1));//問題取得関数呼び出し（最初の1問だけ記述）
    
    gameScene.on('enterframe', function(){
        document.onkeypress = function(e){//キー入力取得
            //console.log(question);
            
            //入力された文字が問題の1文字目と合致した場合
            if(String.fromCharCode(e.keyCode) === question.substring(0,1)){
                //console.log("正解");
                var sound = core.assets['key.mp3'].clone();
                sound.play();
                totalHitCount++;
                completeLabel.text += question.substring(0,1);
                question = question.substring(1,question.length);
                inputLabel.text = question;
                
                //上書きしているかのように表示
                completeLabel.x = -(inputLabel._boundWidth/2);
                inputLabel.x = completeLabel._boundWidth/2;
                
                if(question.length == 0 ){
                    count++;
                    countLabel.text = count + "/20";
                    //console.log("一問終わり");
                    //getQuest(dataLoad('easy', Math.floor(Math.random()*115)+1));
                    
                    completeLabel.x = 0;
                    inputLabel.x = 0;
                    
                    if(count > 20){
                        document.onkeypress = null;
                        
                        //main.indexのpushEndScene関数呼び出し
                        pushEndScene(timeLabel.text, totalHitCount, totalMissCount, dataArray);
                        
                    } else {
                        getQuest(dataLoad('easy', Math.floor(Math.random()*115)+1));
                    }
                }
                
            }else{//入力された文字が問題の1文字目と合致してなかった場合
                //console.log("miss!");
                var sound = core.assets['error.mp3'].clone();
                sound.play();
                totalMissCount++;
            }
        }
    });
    
    
    gameScene.addChild(countLabel);
    gameScene.addChild(timeLabel);
    gameScene.addChild(inputLabel);
    gameScene.addChild(completeLabel);
    gameScene.addChild(questLabel);
    gameScene.addChild(outlineLabel);
        
    return gameScene;
}