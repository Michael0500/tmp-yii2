<?php

/** @var yii\web\View $this */
/** @var array $model */

$this->title = 'My Yii Application';
\app\assets\TreeAsset::register($this);
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <?= \app\models\Department::out_tree_checkbox($model) ?>
        </div>

    </div>
</div>
