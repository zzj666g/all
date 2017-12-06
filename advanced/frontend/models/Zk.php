<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zk".
 *
 * @property integer $id
 * @property string $mobile
 * @property string $pwd
 * @property string $qpwd
 * @property string $name
 * @property string $brthd
 * @property string $site
 * @property string $checkd
 */
class Zk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mobile', 'pwd', 'qpwd', 'name', 'brthd', 'site', 'checkd'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mobile' => 'Mobile',
            'pwd' => 'Pwd',
            'qpwd' => 'Qpwd',
            'name' => 'Name',
            'brthd' => 'Brthd',
            'site' => 'Site',
            'checkd' => 'Checkd',
        ];
    }
}
