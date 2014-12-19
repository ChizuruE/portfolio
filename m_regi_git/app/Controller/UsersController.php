<?php
class UsersController extends AppController
{
    var $name = 'Users';
    var $components = array('Auth');

    function beforeFilter(){

        $this->Auth->authenticate = array(

// フォーム認証を利用
            'Form' => array(
// 認証に利用するモデルの変更
                'userModel' => 'Shop', //HogeUserモデルを指定
// 認証に利用するモデルのフィードを変更
                'fields' => array('username' => 'shop_name', 'password' => 'shop_password')
            )
        );
    }
    function login(){
//POSTデータありか？
        if ($this->request->is('post')) {
//ユーザ名、パスワード判定
            if ($this->Auth->login()) {
                $this->Session->setFlash(__('ログイン成功'), 'default', array(), 'auth');
                $this->response->header('Location', "../shops/");
            } else {
                $this->Session->setFlash(__('ユーザー名かパスワードに誤りがあります'), 'default', array(), 'auth');
            }
        }
    }

    function index(){
        $this->redirect('/users/login');
    }

    function register(){
    }
    /*
    function logout(){
        $this->Auth->logout(); //ログアウト処理
        $this->redirect('login');
    }*/
}
?>