<?php
namespace frontend\controllers;
//use app\models\Admin;
use yii\web\Controller;         //use frontend\models\Admin;
    use Yii;
    use yii\db\query;               //引入queryz执行
    use DfaFilter\SensitiveHelper;  //引入dfa敏感字

//use frontend\models\Admin;
//    use app\common\composers\BaseController;    //第2使用use
//    use app\models\Admin;                       //第2
//use frontend\models\Name;
//use frontend\models\Content;

class AdminController extends Controller{
    public $layout = false; //解决报440的错误
    public $enableCsrfValidation = false;   //解决报400错

    public function actionIndex(){      //展示
        $query = new Query();
        $res = $query->from('admin')->all();
        return $this->renderPartial('show',['data'=>$res]);
    }

    public function actionAd(){         //添加
        return $this->render('add');
    }

    public function actionAdd(){        //添加
        $wordData = array(          //获取感词库索引数组
            '你好', '代码量', '车牌隐', '成人电',
    );
        $name=$_POST['name'];
        $pwd =$_POST['pwd'];
        $filterContent = SensitiveHelper::init()->setTree($wordData)->replace( $_POST['content'],'***');    //替换内容为**
        $content = $filterContent;
//        $content = $_POST['content'];
        $arr=['name'=>$name,'pwd'=>$pwd,'content'=>$content,];
        $re = \Yii::$app->db->createCommand()->insert('admin',$arr)->execute();
        if($re){
            return $this->redirect('?r=admin/index');
        }
    }
    public function actionDel(){        //删除
        $id=$_GET['id'];
        $re=Yii::$app->db->createCommand()->delete('admin',['id'=>$id])->execute();
        if($re){
            return $this->redirect('?r=admin/index');
        }
    }

    public function actionUpdate(){     //修改
        $query = new Query();
        $id=$_GET['id'];
        $res= $query->from('admin')->where(['id'=>$id])->one();
        return $this->render('update',$res);
    }

    public function actionUpda(){       //修改
        $name = $_POST['name'];
        $pwd = $_POST['pwd'];
        $content = $_POST['content'];
        $arr = ['name' => $name, 'pwd' => $pwd, 'content' => $content,];
        $res = Yii::$app->db->createCommand()->update('admin', $arr)->execute();
        if ($res){
            return $this->redirect('?r=admin/index');
        }
    }

    public function actionLogin(){  //摄像头
        return $this->render('server');
    }


















    //new Admin 方法引入

//    public function actionIndex(){
//        $model = new Admin();
//        $obj = $model->find()->all();
//        return $this->renderPartial('show',['data'=>$obj]);
//}

//    public function actionAd(){
//        return $this->render('add');
//    }
//
//    public function actionAdd(){
//        $model = new Admin();
//        $model ->name = $this->post('name');
//        $model ->pwd = $this->post('pwd');
//        $model ->content =$this->post('content');
//        $re = $model ->save();
//        if($re){
//            return $this->redirect('?r=admin/index');
//            //echo"<script>alert('添加成功');location.href='http://www.yi.com/index.php?r=admin/index'</script>";
//        }else{
//            echo "添加失败";
//        }
//    }
//
//    public function actionDel(){
//        $model = new Admin();
//        $id=$_GET['id'];
//        $re = $model->findOne($id)->delete();
//        if($re){
//            return $this->redirect('?r=admin/index');
//            //echo "<script>alert('删除成功');location.href='?r=admin/index'</script>";
//        }else {
//            return "删除失败";
//        }
//    }
//
//    public function actionUpdate(){
//        $id = $this->get('id');
//        //echo $id;die;
//        $model = new Admin();
//        $res= $model->find()->where(['id'=>"$id"])->one()->toArray();
//        return $this->render('update',['res'=>$res]);
//    }
//
//    public function actionSave(){
//        $model = new Admin();
//        $model ->name = $this->post('name');
//        $model ->pwd = $this->post('pwd');
//        $model ->content =$this->post('content');
//        $re = $model->save();
//        if($re){
//            return $this->redirect('?r=admin/index');
//            //echo "<script>alert('修改成功');location.href='?r=admin/index'</script>";
//        }else {
//            return "修改失败";
//        }
//    }


}
