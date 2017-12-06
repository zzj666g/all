<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "week".
 *
 * @property integer $id
 * @property string $name
 * @property string $moren
 * @property string $type
 * @property integer $option
 * @property integer $required
 * @property string $check
 * @property double $lengt
 * @property double $length
 */
class Week extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'week';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['option', 'required'], 'integer'],
            [['lengt', 'length'], 'number'],
            [['name'], 'string', 'max' => 50],
            [['moren', 'type', 'check'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'moren' => 'Moren',
            'type' => 'Type',
            'option' => 'Option',
            'required' => 'Required',
            'check' => 'Check',
            'lengt' => 'Lengt',
            'length' => 'Length',
        ];
    }
}
