<?php
/*
* インスタグラムプラグイン
* ヘルパー
*
* PHP 5.4.x
*
* @copyright    Copyright (c) hiniarata co.ltd
* @link         https://hiniarata.jp
* @package      Instagram Plugin Project
* @since        ver.0.9.0
*/
/* Model */
App::import('Model', 'Instagram.InstagramConfig');
App::uses('AppHelper', 'View/Helper');

class InstagramBaserHelper extends AppHelper
{

  /**
   * ヘルパー
   *
   * @var array
   */
  public $helpers = array('BcBaser');

  /**
   * 写真の一覧を取得する
   *
   * @param int $limit 取得枚数
   * @param string $tag タグ
   * @return array()
   */
  public function instagramPosts($limit = 20, $tag = null){
    $url = array('admin' => false, 'plugin' => 'instagram', 'controller' => 'instagrams', 'action' => 'posts');
    echo $this->requestAction($url, array('return', 'pass' => array($limit, $tag)));
  }
}