<?php
/**
 * Created by PhpStorm.
 * User: LastyRain
 * Date: 2014/08/14
 * Time: 16:00
 */

App::uses('AppController', 'Controller');

class ShopsController extends AppController {
//    public $scaffold;

    //読み込むコンポーネントの指定
    public $components = array('Session', 'Auth');

    //どのアクションが呼ばれてもはじめに実行される関数
    public function beforeFilter()
    {

        parent::beforeFilter();

        //未ログインでアクセスできるアクションを指定
        //これ以外のアクションへのアクセスはloginにリダイレクトされる規約になっている
        $this->Auth->allow('register', 'login');
    }

    //ログイン後にリダイレクトされるアクション
    public function index(){
        $this->set('shop', $this->Auth->user());
    }
    public function logout(){
        $this->Auth->logout();
        $this->response->header('Location', "../users/login");
    }

    public function register(){
        //$this->requestにPOSTされたデータが入っている
        //POSTメソッドかつユーザ追加が成功したら
        if($this->request->is('post') && $this->Shop->save($this->request->data)){
            //ログイン
            //$this->request->dataの値を使用してログインする規約になっている
            $this->Auth->login();
            $this->Session->setFlash(__('ユーザーの新規登録が完了しました。'));
            $this->redirect('index');
        }
    }
    
    /*public function login(){
        if($this->request->is('post')) {
            if($this->Auth->login())
                $this->Session->setFlash(__('ログイン成功'), 'default', array(), 'auth');
                //return $this->redirect('index');
            else
                $this->Session->setFlash('ログイン失敗');
        }
    }

    public function logout(){
        $this->Auth->logout();
        $this->redirect('login');
    }*/
    /*
    public $helpers = array('Html','Form');

    public function index(){
        $params = array(
            'conditions' => array('id'=> '1'),
            'order' => 'id DESC',
            'limit' => 2
        );
        //find(条件,条件{Object}@param)
        //$this->set('shops', $this->Shop->find('all',$params));
        $this->set('shops', $this->Shop->find('all'));
        //shopsというphp変数にいれそれを入れる。
        $this->set('title_for_layout','店舗一覧');
    }

    public function view($id = null){
        $this->Shop->id = $id;
        //var_dump($this->Shop);
        $this->set('shop', $this->Shop->read());
        //shopというphp変数に、Shop->idを設定した、物に該当する物を表示する。

    }
    public function add(){
        //var_dump($this->request);
        if ($this->request->is('post')){
            if ($this->Shop->save($this->request->data)){
                $this->Session->setFlash('Success');
                $this->redirect(array('action'=>'index'));
            }else{
                $this->Session->setFlash('failed');
            }
        }else{
            //$this->Session->setFlash('error');
        }
    }
    */
}