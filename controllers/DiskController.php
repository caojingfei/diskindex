<?php


namespace app\controllers;


use app\models\Disk;
use app\models\DiskIndex;
use yii\web\Controller;
use Yii;

class DiskController extends Controller
{
    const PATH = "/Volumes/熙陌陌的N盘/学习资料";


    public function actionIndex()
    {

        $diskId = Disk::saveDisk(self::PATH);

        $filenames = self::getDir(self::PATH);

        //先执行删除
        DiskIndex::deleteAll(['diskid' => $diskId]);

        foreach ($filenames as $value) {
            //echo $value . '<br/>';
            DiskIndex::saveIndex($value, $diskId);
        }
    }

    /**
     * @param $path
     * @param $files
     */
    private static function searchDir($path, &$files)
    {

        if (is_dir($path)) {

            if (stristr($path, self::PATH . '/.')) {
                return false;
            }

            $opendir = opendir($path);

            while ($file = readdir($opendir)) {
                if ($file != '.' && $file != '..') {
                    self::searchDir($path . '/' . $file, $files);
                }
            }
            closedir($opendir);
        }
        if (!is_dir($path)) {
            $files[] = $path;
        }
    }

    /**
     * @param $dir
     * @return array
     */
    private static function getDir($dir)
    {
        $files = array();
        self::searchDir($dir, $files);
        return $files;
    }
}