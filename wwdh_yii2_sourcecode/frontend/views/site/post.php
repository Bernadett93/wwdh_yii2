<?php

use yii\helpers\html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'Post';
?>
<div class="site-index">
    <h2>Date: <?= $post->date;?></h2>
    <div class="body-content">
        <div class="jumbotron">
            <h1 class="display-3"><?= $post->title; ?></h1>
            <p class="lead"><i><?= $post->introduction; ?></i></p>
            <hr class="my-4">
            <p><?= $post->description; ?></p>
            <hr class="my-4">
            <p style="text-align: left; font-size: 1.3em;"><i><?= "Author: ".$user->username.", ".$user->email; ?></i></p>
            <p style="text-align: left; font-size: 1.3em;"><i><?= "View-count: ".$post->attendence ?></i></p>
        </div>
    </div>
</div>

