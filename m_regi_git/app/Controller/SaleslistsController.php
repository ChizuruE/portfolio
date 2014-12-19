<?php
/**
 * Created by PhpStorm.
 * User: LastyRain
 * Date: 2014/08/29
 * Time: 16:00
 */

App::uses('AppController', 'Controller');

class ProfitsController extends AppController {

//    public $scaffold;
    public $components = array('RequestHandler');
    //読み込むコンポーネントの指定

    //どのアクションが呼ばれてもはじめに実行される関数
    public function beforeFilter()
    {

//        parent::beforeFilter();

        //未ログインでアクセスできるアクションを指定
        //これ以外のアクションへのアクセスはloginにリダイレクトされる規約になっている
//        $this->Auth->allow('register', 'login');
    }

    //ログイン後にリダイレクトされるアクション
    public function index(){

        if($this->request->is('post')){
            if($this->Profit->saveAssociated($this->request->data)){
                $this->Session->setFlash('成功！');
                $this->redirect(array('action'=>'index'));
            }else{
                $this->Session->setFlash(pr($this->request->data));
                $this->Session->setFlash('失敗');

            }
            print_r(json_decode($this->request->data, true));
            print_r($this->request, true);
        }

    }

 

     public function add(){

         // アイテム取得処理
         if($this -> request -> is('ajax') ){
             if ($this -> request -> is('post') ){
                 //var_dump($this->request->data);
                 $profitBase = array();

                 // 試験運転のGET版 : 上記isをgetにした際に用いれる
                 /*
                      if(isset($this -> request -> query['category_id'])){
                         $profitBase['category_id'] = $this -> request -> query['category_id'];
                     }
                 */
                 //var_dump($this -> request -> data['item_name']);
                 // POST版
                 $dataList = [
                     'customer_id',
                     'shop_id'
                 ];

                 for($i = 0; $i < count($dataList); $i++){
                     if(isset($this -> request -> data[$dataList[$i]])){
                         $profitBase[$dataList[$i]] = $this -> request -> data[$dataList[$i]];
                     }else{
                         insertError();
                     }
                 }

                 // デ―タをInsert
                 $profitsData = ['Profit' => $profitBase];
                 $profitFields = [];
                 foreach ($profitBase as $profitKey => $profitValue) {
                     array_push($profitFields, $profitKey);
                 }
//                 $this->Item->save($profitsData, false, $profitFields);
                 if($this->Profit->save($profitsData, false, $profitFields)){
                     $this->loadModel('Sale');
                     $profitId = $this->Profit->getLastInsertID();
//                     print_r($last_id );
                     $dataList = [
                         'item_id',
                         'sale_price',
                         'sale_quantity'
                     ];
                     $salesBase = [];

                     for($j = 0;$j < count($this->request->data['sale']);$j++){
                         $saleBase = [];
                         $saleBase['profit_id'] = $profitId;

                         $dataArray = $this->request->data['sale'][$j];
                         //var_dump($dataArray);
                         if(isset($dataArray)){
                             for($i = 0;$i < count($dataList);$i++){
                                 //var_dump($dataArray[$dataList[$i]]);
                                 if(isset($dataArray[$dataList[$i]])){
                                     $saleBase[$dataList[$i]] = $dataArray[$dataList[$i]];
                                 }else{
                                     insertError();
                                 }

                             }
                         }
                         $salesBase[$j] = $saleBase;

                     }
                     $salesData = ['Sale' => $salesBase];
                     //var_dump($salesData);
                     $this->Sale->saveAll($salesData['Sale']);
                 }
             }
         }

     }
    function insertError(){
        echo("異常なデータを検知しました");
        return;
    }

    public function read(){
        $id = $_GET['shop_id'];
        if ($this->request->is('ajax')) {
            if ($this -> request -> is('get') ) {
                if (isset($id)) {
                    if ($id != 0) {
                       //echo "test";
                       $params = [
                            'conditions' => [
                                'Profit.shop_id' => $id
                            ]
                        ];
                        $profits = $this->Profit->find('all', $params);


                        // viewにはjson形式のファイルを表示させるように。
                        $this->layout = 'ajax';
                        $this->RequestHandler->setContent('json');
                        $this->RequestHandler->respondAs('application/json; charset=UTF-8');
//                        $this->viewClass = 'Json';

//                        $this->set(compact('result'));

                        // $studentsの配列をviewに渡す。
                        $this->set('profit', $profits);
                    } else {
                        throw new NotFoundException();
                    }
                } else {
                    throw new NotFoundException();
                }
            }else{
                throw new NotFoundException();
            }
            //$this->disableCache();
        }else{
            throw new NotFoundException();
        }
    }
}