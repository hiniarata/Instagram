<?php
/*
* インスタグラムプラグイン
* 表示ヘルパー
*
* PHP 5.4.x
*
* @copyright    Copyright (c) hiniarata co.ltd
* @link         https://hiniarata.jp
* @package      Instagram Plugin Project
* @since        ver.0.9.0
*/
/* Model and Helper */
App::uses('AppHelper', 'View/Helper');
App::import('Model', 'Instagram.InstagramConfig');

class InstagramHelper extends AppHelper
{

  /**
   * ヘルパー
   *
   * @var array
   */
  public $helpers = array('Html', 'BcBaser');
  
  /**
   * 画像（動画）を表示する
   *
   * @param array $data データ
   * @return void
   */
  public function postPhoto($data){
    $type = $data['type'];
    if (!empty($type)) {
      if ($type == 'image'){
        $url = $data['images']['standard_resolution']['url'];
        echo $this->Html->image($url, array('class' => array('instagram_post', 'instagram_image')));
      } elseif($type == 'video') {
        $url = $data['videos']['standard_resolution']['url'];
        echo $this->Html->media($url, array('class' => array('instagram_post', 'instagram_video')));
      }
    }
  }

  /**
   * 投稿テキストを表示する
   *
   * @param array $data データ
   * @return void
   */
  public function postCaption($data){
    echo $data['caption']['text'];
  }

  /**
   * 投稿日を表示する
   *
   * @param array $data データ
   * @param string $format 日付フォーマット
   * @return void
   */
  public function postDate($data, $format = 'Y-m-d'){
    echo date($format, $data['caption']['created_time']);
  }

  /**
   * Likesの数
   *
   * @param array $data データ
   * @return void
   */
  public function postCountLikes($data){
    echo $data['likes']['count'];
  }

  /**
   * ユーザー名
   *
   * @param array $data データ
   * @return void
   */
  public function postUser($data){
    echo $data['user']['username'];
  }

}