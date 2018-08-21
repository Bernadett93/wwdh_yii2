<?php

use yii\helpers\html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */

$this->title = 'User Posts';
?>
<div class="site-index">
    <h2>User: <?= $user->username.", ".$user->email;?></h2>
    <div class="body-content">
        <div class="row">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Introduction</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <?php if(count($posts)>0):?>
                <?php foreach($posts as $post):?>
                <tbody>
                  <tr class="table-active">
                    <th scope="row"><?= Html::a($post->title, ['post', 'post_id'=>$post->post_id]); ?></th>
                    <td><?= $post->introduction ?></td>
                    
                    <td><?= $post->date ?></td>
                  </tr>
                  <?php endforeach;?>
                  <?= LinkPager::widget(['pagination'=>$pagination])?>
                  <?php else: ?>
                  <tr>
                      <td>No records found</td>
                  </tr>
                  <?php endif; ?>
                </tbody>
            </table> 
        </div>
    </div>
</div>
