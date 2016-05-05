<?php
/*
* インスタグラム プラグイン
* 管理設定モデル
*
* PHP 5.4.x
*
* @copyright    Copyright (c) hiniarata co.ltd
* @link         https://hiniarata.jp
* @package      Instagram Plugin Project
* @since        ver.0.9.0
*/

/**
 * Include files
 */
App::uses('InstagramApp', 'Instagram.Model');

/**
 * 管理設定モデル
 *
 * @package baser.plugins.instagram
 */
class InstagramConfig extends InstagramApp {
  /**
   * クラス名
   *
   * @var string
   * @access public
   */
  public $name = 'InstagramConfig';

  /**
   * プラグイン名
   *
   * @var string
   * @access public
   */
  public $plugin = 'Instagram';

  /**
   * DB接続時の設定
   *
   * @var string
   * @access public
   */
  public $useDbConfig = 'plugin';

  /**
   * validate
   *
   * @var array
   */
  public $validate = array(
    'user_id' => array(
      'notEmpty' => array(
        'rule' => array('notEmpty'),
        'message' => 'ユーザーIDを入力してください。'
      )),
    'access_token' => array(
      'notEmpty' => array(
        'rule' => array('notEmpty'),
        'message' => 'アクセストークンを入力してください。'
      ))
  );
}
