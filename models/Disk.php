<?php

namespace app\models;

use Yii;
use yii\db\Exception;

/**
 * This is the model class for table "pre_disk".
 *
 * @property int $id
 * @property string $diskname
 * @property int $displayorder
 * @property int $created_at
 */
class Disk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%disk}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['diskname'], 'required'],
            [['displayorder', 'created_at'], 'integer'],
            [['diskname'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'diskname' => 'Diskname',
            'displayorder' => 'Displayorder',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @param $diskName
     * @return Disk|array|\yii\db\ActiveRecord|null
     * 获得磁盘空间
     */
    public static function getDiskInfoByDiskname($diskName)
    {
        return static::find()->where(['diskname' => $diskName])->asArray()->one();
    }

    /**
     * @param $diskName
     * 保存磁盘
     */
    public static function saveDisk($diskName)
    {
        $diskInfo = self::getDiskInfoByDiskname($diskName);
        if (!empty($diskInfo)) {
            return $diskInfo['id'];
        }

        $model = new Disk();
        $model->diskname = $diskName;
        $model->displayorder = 99;
        $model->created_at = time();

        if ($model->save()) {
            return $model->attributes['id'];
        } else {
            throw new \Exception($model->getErrors());
        }
    }
}
