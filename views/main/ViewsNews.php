<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\NewsForm */
/* @var $form ActiveForm */
?>
<div class="main-ViewsNews">


  <h1>Новости</h1>
  Показать новости по темам:
  <?php
    if (!isset($_GET['page'])){
      $page = 1;
    }
    else{
      $page = $_GET['page'];
    }

    if (!isset($_GET['category_id'])){
      $_GET['category_id'] = 'all';
    }
    $category_id = $_GET['category_id'];
    $default_b = 'default';
    $check_b = 'success';
    $b[1] = $default_b;
    $b[2] = $default_b;
    $b[3] = $default_b;
    $b[4] = $default_b;
    $b['all'] = $default_b;
    $b[$_GET['category_id']] = 'success';
   ?>
  <a href="<?= Url::to(['/main/viewsnews','category_id'=>'all']) ?>"><button type="button" class="btn btn-<?=$b['all']?> btn-xs">Все</button></a>
  <a href="<?= Url::to(['/main/viewsnews','category_id'=>1]) ?>"><button type="button" class="btn btn-<?=$b[1]?> btn-xs">Офисная недвижимость</button></a>
  <a href="<?= Url::to(['/main/viewsnews','category_id'=>2]) ?>"><button type="button" class="btn btn-<?=$b[2]?> btn-xs">Аналитика</button></a>
  <a href="<?= Url::to(['/main/viewsnews','category_id'=>3]) ?>"><button type="button" class="btn btn-<?=$b[3]?> btn-xs">Склады и производство</button></a>
  <a href="<?= Url::to(['/main/viewsnews','category_id'=>4]) ?>"><button type="button" class="btn btn-<?=$b[4]?> btn-xs">Партнеры</button></a>
  <br><br>

  <?php

    $page_max = $page *10;
    $page_min = $page_max - 10;
    $i=0;
    foreach($news as $views){
      if ($views->category_id==$_GET['category_id']||$_GET['category_id']=='all'&& $views->status!=0){
        foreach($users as $user){
          if ($user->id==$views->author_id){
            $author_id = $user->username;
          }
        }
        $i++;
        if ($i>$page_min && $i<=$page_max){
          echo  "<div id=News class=col-xs-4 col-sm-3>";
          echo  "<div id=NewsTitle><b>Заголовок:$views->title</b></div>";
          echo  "<div id=NewsText>Текст:$views->text</div>";
          echo  "<div id=NewsAuthor>Автор:$author_id</div>";
          echo  "<div id=NewsAuthor>Дата Публикации:".date( 'l d F', $views->time )."</div>";
          echo "</div>";
        }
      }
    }?>

    <div id="Count">
    <?php
    $page_count = $i / 10;
    if ($page_count>1){
      for ($i=0; $i < $page_count ; $i++) {
        $c = $i+1;
          echo "<a href=".Url::to(['/main/viewsnews','category_id'=>$_GET['category_id'], 'page'=>$c]).">
            <button type='button' class='btn btn-link'><b>$c</b></button></a>";
      }
    }
   ?>
 </div>

</div><!-- main-news_add -->
<style media="screen">
#Count{
  float:left;
  position: relative;
  width: 70%;
  text-align: center;
  background: rgba(0, 90, 255, 0.38);
}
#News{
  border-radius: 5px;
  background: rgba(62, 208, 67, 0.18);
  padding: 10px;
  margin: 10px;
}
#NewsTitle{
  border-radius: 6px 6px 0px 0px;
  font-size: 15px;
  text-align: center;
  padding: 5px;
  background: #F1F382;
}
#NewsText{
  padding: 10px;
  background: #B8DC62;
}
#NewsAuthor{
  padding: 10px;
  background: #9AB753;
}

</style>
