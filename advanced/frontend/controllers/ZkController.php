<?php
namespace frontend\controllers;
use yii\db\Query;
use yii\web\Controller;

class ZkController extends Controller {
    public $layout = false;
    public $enableCsrfValidation = false;

    public function actionIndex(){
        return $this->render('register');
    }

    public function actionTj(){
        $mobile = $_POST['mobile'];
        $pwd = $_POST['pwd'];
        $qpwd = $_POST['qpwd'];
        $arr = ['mobile'=>$mobile,'pwd'=>$pwd,'qpwd'=>$qpwd];
        $reg = \Yii::$app->db->createCommand()->insert('zk',$arr)->execute();
        if($reg){
//            return $this->redirect('?r=zk/ad');
            echo"<script>alert('注册手机号成功');location.href='?r=zk/ad'</script>";
        }
    }

    public function actionAd(){
        return $this->render('register_2');
    }

    public function actionTj_2(){
        $name = $_POST['name'];
        $brthd = $_POST['brthd'];
        $site = $_POST['site'];
        $arr = ['name'=>$name,'brthd'=>$brthd,'site'=>$site];
        $reg = \Yii::$app->db->createCommand()->insert('zk',$arr)->execute();
        if($reg){
            echo"<script>alert('注册昵称成功');location.href='?r=zk/add'</script>";
        }
    }

    public function actionAdd(){
        return $this->render('register_3');
    }

    public function actionActi(){
        return $this->render('?r=admim/show');
    }

    public function actionShow(){
        $query = new Query();
        $obj = $query->from('zk')->all();
        return $this->render('show',['data'=>$obj]  );
    }
}