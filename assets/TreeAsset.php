<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class TreeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/jqtree.css',
        'css/jquery.treeview.css',
        'css/tree-app.css',
    ];
    public $js = [
        //'js/tree.jquery.js',
        'js/jquery.treeview.js',
        'js/tree-app.js',
    ];
    public $depends = [
        'app\assets\AppAsset',
    ];
}
