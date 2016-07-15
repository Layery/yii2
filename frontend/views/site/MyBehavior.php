<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
    </div>
    <?= $model->behaviors['behaviorTest']->say();?>
    
    <p>
        <pre>
            <? print_r($model); ?>
        </pre>
    </p>
    
   
</div>
