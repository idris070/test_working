<?php
namespace app\models;

use yii\base\Model;
use Yii;


class NewsForm extends Model
{
  public $title;
  public $image;
  public $short;
  public $text;
  public $category;
  public $slug;
  public $date;
  public $checkbox;

  public function attributeLabels()
  {
    return [
        'title' => 'Заголовок',
        'image' => 'Изображение',
        'short' => 'Тизер',
        'text' => 'Текст',
        'category' => 'Категория',
        'slug' => 'Slug',
        'date' => 'Дата',
        'checkbox' => 'Опубликовано',
      ];
  }
  public function news_add()
  {
      $news = new News();
      $news->title = $this->title;
      $news->image = $this->image;
      $news->short = $this->short;
      $news->text = $this->text;
      $news->category_id = $this->category;
      $news->slug = $this->slug;
      $news->time = time();
      $news->author_id = $_SESSION['__id'];
      $news->status = 0;
      //$news->checkbox = $this->checkbox;
      return $news->save() ? $news : null;
  }

public function rules()
{
    return[
      [
          ['title','image','short','text','category','slug'],'required']];
}


}
 ?>
