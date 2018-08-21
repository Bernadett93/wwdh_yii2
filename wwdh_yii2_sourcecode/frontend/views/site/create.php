<?php

use yii\helpers\html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'Create Post';
?>
<div class="site-index">
    <h1>Create Post</h1>
    <div class="body-content">
    <?php
        $form=ActiveForm::begin()?>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <?= $form->field($post, 'title');?>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <?= $form->field($post, 'introduction')->textarea(['rows'=>'4']);?>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <?= $form->field($post, 'description')->textarea(['rows'=>'10']);?>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <div class='col-lg-3'>
                        <?= Html::submitButton('Create Post', ['class' => 'btn btn-primary']);?>
                    </div>
                    <div class='col-lg-2'>
                        <a href=<?php echo yii::$app->homeUrl;?> class='btn btn-primary'>Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    <?php ActiveForm::end()?>
    </div>
</div>
