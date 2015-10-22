<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

 ?>
<a href="<?= Url::to(['/main/moder']) ?>"><button type="button" class="btn btn-link">Пользователи</button></a>
<a href="<?= Url::to(['/main/moder','action'=>'news']) ?>"><button type="button" class="btn btn-link">Новости</button></a><br><br>



<?php if ($_GET['action']=='news'){ ?>

  <?php $form = ActiveForm::begin(['method'=>'get','action' => ['main/moder']]); ?>

  <table class="table table-striped">
  <tr>
    <td><b>#</b></td>
    <td><b>Title</b></td>
    <td><b>Text</b></td>
    <td><b>Author</b></td>
    <td><b>Действие</b></td>
  </tr>
  <?php
  foreach($news as $views){
    foreach ($users as $user) {
      if ($user->id==$views->author_id){
        $author_id = $user->username;
      }
    }
      static $i;
      $status = "Опубликовать";
      $button = "btn btn-success";
      if ($views->status!=0){

      }
      else {
        echo "<tr><td><b>$i</b></td><td>$views->title</td><td>$views->text</td><td>$author_id</td><td><a href=". Url::to(['/main/moder','action'=>'news']).">".
        Html::submitButton($status, ['class' => $button,'name'=>'publication', 'value'=>$views->author_id])."</a></td></tr>";
      }
      $i++;
  }
  ?>
  </table>

    <?php ActiveForm::end(); ?>


<?php
}else{
  ?>
  <?php $form = ActiveForm::begin(['method'=>'get','action' => ['main/moder']]); ?>

<table class="table table-striped">
  <tr>
    <td><b>#</b></td>
    <td><b>Email</b></td>
    <td><b>Status</b></td>
    <td><b>Действие</b></td>
  </tr>
<?php
foreach($users as $user){
  static $i;
  $i++;
  $status = "Активировать";
  $check = "off";
  $button = "btn btn-success";
  if ($user->status==10){
    $check = 'on';
    $button = "btn btn-danger";
    $status = "Заблокировать";
  }
    echo "<tr><td><b>$i</b></td><td>$user->email</td><td>$user->status</td><td>".
    Html::submitButton($status, ['class' => $button,'name'=>$check,'value'=>$user->id])."</td></tr>";
}
 ?>
</table>

    <?php ActiveForm::end(); ?>

    <?php }

     ?>
