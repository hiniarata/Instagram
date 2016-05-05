<?php
/*
* インスタグラムプラグイン
* コントローラー
*
* PHP 5.4.x
*
* @copyright    Copyright (c) hiniarata co.ltd
* @link         https://hiniarata.jp
* @package      Instagram Plugin Project
* @since        ver.0.9.0
*/

/**
 * インスタグラム 管理コントローラー
 *
 * @package baser.plugins.instagram
 */
class InstagramsController extends InstagramAppController
{

  /**
   * クラス名
   *
   * @var string
   * @access public
   */
  public $name = 'Instagrams';

  /**
   * コンポーネント
   *
   * @var array
   * @access public
   */
  public $components = array('BcAuth', 'Cookie', 'BcAuthConfigure');

  /**
   * モデル
   *
   * @var array
   * @access public
   */
  public $uses = array(
    'Instagram.InstagramConfig',
  );

  /**
   * beforeFilter
   *
   * @return  void
   * @access  public
   */
  public function beforeFilter()
  {
    parent::beforeFilter();
  }

  /**
   * 投稿写真の一覧表示
   *
   * @return void
   */
  public function index()
  {
    //情報取得
    $setting = $this->InstagramConfig->findById(1);

    //除外処理
    if (empty($setting)) {
      $this->setMessage('初期設定が行われていないようです。', true);

    //設定済み
    } else {
      $count = 20;//取得数（Instagramのデフォルト20）
      $url = 'https://api.instagram.com/v1/users/' . $setting['InstagramConfig']['user_id'] . '/media/recent?access_token=' . $setting['InstagramConfig']['access_token'] . '&count=' . $count;
      $jsonData = file_get_contents($url);
      //jsonデータを配列化する
      $datas = json_decode($jsonData, true);
      $this->set('datas', $datas['data']);
    }

    //表示設定
    $this->pageTitle = '一覧表示';
  }

  /**
   * [MOBILE] 投稿写真の一覧表示
   *
   * @return void
   */
  public function mobile_index()
  {
    $this->setAction('index');
  }

  /**
   * [SMARTPHONE] 投稿写真の一覧表示
   *
   * @return void
   */
  public function smartphone_index()
  {
    $this->setAction('index');
  }

  /**
   * 投稿リストを出力
   * requestAction用
   *
   * @param int $limit 取得枚数
   * @param string $tag タグによる絞り込み
   * @access public
   */
  public function posts($limit, $tag = null)
  {
    //情報取得
    $setting = $this->InstagramConfig->findById(1);

    //除外処理
    if (!empty($setting)) {
      $count = $limit;//取得数（Instagramのデフォルト20）
      if (empty($tag)) {
        $url = 'https://api.instagram.com/v1/users/' . $setting['InstagramConfig']['user_id'] . '/media/recent?access_token=' . $setting['InstagramConfig']['access_token'] . '&count=' . $count;
      } else {
        $url = 'https://api.instagram.com/v1/tags/' . $tag . '/media/recent?access_token='. $setting['InstagramConfig']['access_token'] .'&count=' . $count;
      }
      $jsonData = file_get_contents($url);
      //jsonデータを配列化する
      $datas = json_decode($jsonData, true);
      $this->set('datas', $datas['data']);
    }
  }

  /**
   * [MOBILE]投稿リストを出力
   * requestAction用
   *
   * @param int $limit 取得枚数
   * @access public
   */
  public function mobile_posts($limit, $tag = null) {
    $this->setAction('posts', $limit, $tag);
  }

  /**
   * [SMARTPHONE]投稿リストを出力
   * requestAction用
   *
   * @param int $limit 取得枚数
   * @access public
   */
  public function smartphone_posts($limit, $tag = null) {
    $this->setAction('posts', $limit, $tag);
  }

}