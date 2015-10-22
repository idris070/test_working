<?php
$db = new yii\db\Connection;
namespace app\models;

use Yii;
use yii\base\Model;
  class moderForm extends Model
    {
        $db->createCommand("INSERT INTO news ('title') VALUES ('hello')");

    }
 ?>
