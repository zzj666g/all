<?php

namespace frontend\controllers;
use Yii;
use yii\db\query;
use yii\web\Controller;


class WeekController extends Controller{
//
    public $layout = false; //解决报440的错误
    public $enableCsrfValidation = false;   //解决报400错

    public function actionAd(){
        return $this->renderPartial('add');
    }
    public function actionAdd(){
        $name=$_POST['name'];
        $moren =$_POST['moren'];
        $type =$_POST['type'];
        $option =$_POST['option'];
        $required =$_POST['required'];
        $length =$_POST['length'];
        $lengt =$_POST['lengt'];
        $arr=['name'=>$name,'moren'=>$moren,'type'=>$type,'option'=>$option,'required'=>$required,'length'=>$length,'lengt'=>$lengt,];
        $re = \Yii::$app->db->createCommand()->insert('week',$arr)->execute();
        if($re){
            return $this->redirect('?r=week/index');
        }else{
            return '添加失败';
        }
    }

    public function actionIndex(){      //展示
        $query = new Query();
        $res = $query->from('week')->all();
        return $this->render('index',['data'=>$res]);
}

    public function actionDel(){        //删除
        $id=$_GET['id'];
        $re=Yii::$app->db->createCommand()->delete('week',['id'=>$id])->execute();
        if($re){
            return $this->redirect('?r=week/index');
        }
    }

    public function actionUpdate(){     //修改
        $query = new Query();
        $id=$_GET['id'];
        $res= $query->from('week')->where(['id'=>"$id"])->one();
        return $this->render('update',$res);
    }

    public function actionUpda(){       //修改
        $name=$_POST['name'];
        $moren =$_POST['moren'];
        $type =$_POST['type'];
        $option =$_POST['option'];
        $required =$_POST['required'];
        $length =$_POST['length'];
        $lengt =$_POST['lengt'];
        $arr=['name'=>$name,'moren'=>$moren,'type'=>$type,'option'=>$option,'required'=>$required,'length'=>$length,'lengt'=>$lengt,];
        $res = Yii::$app->db->createCommand()->update('week',$arr)->execute();
        if($res){
            return $this->redirect('?r=week/index');
        }
    }
}