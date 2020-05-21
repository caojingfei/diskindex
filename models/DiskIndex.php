<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%disk_index}}".
 *
 * @property int $id
 * @property int $diskid
 * @property string $dirname 文件夹
 * @property string $filename
 * @property string $extension 文件后缀
 * @property int $filesize 文件大小
 * @property int $filectime 文件创建时间
 * @property int $filemtime 文件修改时间
 * @property int $created_at
 */
class DiskIndex extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%disk_index}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['diskid', 'filesize', 'filectime', 'filemtime', 'created_at'], 'integer'],
            [['dirname', 'filename', 'extension'], 'required'],
            [['dirname'], 'string', 'max' => 200],
            [['filename'], 'string', 'max' => 500],
            [['extension'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'diskid' => 'Diskid',
            'dirname' => 'Dirname',
            'filename' => 'Filename',
            'extension' => 'Extension',
            'filesize' => 'Filesize',
            'filectime' => 'Filectime',
            'filemtime' => 'Filemtime',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @param $v
     * @param $diskId
     * @return bool
     */
    public static function saveIndex($v, $diskId)
    {

        //获得文件信息
        $pathInfo = pathinfo($v);

        $model = new DiskIndex();
        $model->diskid = $diskId;
        $model->dirname = !empty($pathInfo['dirname']) ? $pathInfo['dirname'] : '';
        $model->filename = !empty($pathInfo['basename']) ? $pathInfo['basename'] : '';
        $model->extension = !empty($pathInfo['extension']) ? $pathInfo['extension'] : '';
        $model->filesize = is_file($v) ? filesize($v) : 0;
        $model->filectime = is_file($v) ? filectime($v) : 0;
        $model->filemtime = is_file($v) ? filemtime($v) : 0;
        $model->created_at = time();

        return $model->save();
    }
}
