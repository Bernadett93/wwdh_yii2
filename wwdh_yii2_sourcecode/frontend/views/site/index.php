<?php

/* @var $this yii\web\View */

use yii\helpers\html;
use yii\widgets\LinkPager;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    
    <?php if(yii::$app->session->hasFlash('message')):?>
    
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php echo yii::$app->session->getFlash('message');?>
    </div>
    <?php endif;?>
    <div class="jumbotron">
        <h1>Blog Posts!</h1>

        <p class="lead">You can post here different blogs in different themes.</p>
    </div>
    
    <div class="row">
        <span style="margin-bottom: 20px;"><?= Html::a('Create Post', ['/site/create'], ['class'=>'btn btn-primary'])?></span>
    </div>
    
    <div class="body-content">
        <div class="row">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Introduction</th>
                    <th scope="col">Username</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <?php if(count($posts)>0):?>
                <?php foreach($posts as $post):?>
                <tbody>
                  <tr class="table-active">
                    <th scope="row"><?= Html::a($post->title, ['post', 'post_id'=>$post->post_id]); ?></th>
                    <td><?= $post->introduction ?></td>
                    
                    <?php foreach($users as $user): ?>
                    <?php if($user->id === $post->user_id): ?>
                    <td><?= Html::a($user->username, ['user', 'user_id'=>$user->id]) ?></td>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    <td><?= $post->date; ?></td>
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
