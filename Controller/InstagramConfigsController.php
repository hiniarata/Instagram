<?php
/*
* インスタグラムプラグイン
* 管理コントローラー
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
class InstagramConfigsController extends InstagramAppController
{

  /**
   * クラス名
   *
   * @var string
   * @access public
   */
  public $name = 'InstagramConfigs';

  /**
   * コンポーネント
   *
   * @var array
   * @access public
   */
  public $components = array('BcAuth', 'Cookie', 'BcAuthConfigure', 'Security');

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
   * ぱんくずナビ
   *
   * @var string
   * @access public
   */
  public $crumbs = array(
    array('name' => 'プラグイン管理', 'url' => array('plugin' => '', 'controller' => 'plugins', 'action' => 'index')),
    array('name' => 'インスタグラム管理', 'url' => array('controller' => 'instagram_configs', 'action' => 'index'))
  );

  /**
   * サブケースエレメント
   *
   * @var array
   * @access public
   */
  public $subMenuElements = array('instagram');

  /**
   * beforeFilter
   *
   * @return  void
   * @access  public
   */
  public function beforeFilter()
  {
    parent::beforeFilter();
    //CSRF対策（トークンの有効期限延長）
    $this->Security->csrfCheck = true;
    $this->Security->csrfExpires = '+1 hour';
  }

  /**
   * [ADMIN] 設定状態
   *
   * @return void
   */
  public function admin_index(){
    $setting = $this->InstagramConfig->find('first');
    $this->set('setting', $setting);
    $this->pageTitle = 'インスタグラム 利用設定';
  }

  /**
   * [ADMIN] 初期設定
   *
   * @return void
   */
  public function admin_add(){
    //登録ボタン押下
    if (!empty($this->request->data)) {
      if ($this->InstagramConfig->save($this->request->data)) {
        $this->setMessage('インスタグラム利用設定を変更しました。', false, true);
        $this->redirect(array('action' => 'index'));
      } else {
        $this->setMessage('入力エラーです。内容を修正してください。', true);
      }
    }
    //表示設定
    $this->pageTitle = 'インスタグラム 初回設定';
    $this->render('form');
  }

  /**
   * [ADMIN] 設定変更
   *
   * @return void
   */
  public function admin_edit($id = null){
    /* 除外処理 */
    if (empty($id)) {
      $this->setMessage('無効なIDです。', true);
      $this->redirect(array('action' => 'index'));
    }

    //情報取得
    $setting = $this->InstagramConfig->findById($id);

    //登録ボタン押下
    if (!empty($this->request->data)) {
      $this->InstagramConfig->id = $id;
      if ($this->InstagramConfig->save($this->request->data)) {
        $this->setMessage('インスタグラム利用設定を変更しました。', false, true);
        $this->redirect(array('action' => 'index'));
      } else {
        $this->setMessage('入力エラーです。内容を修正してください。', true);
      }

    //初期表示
    }else{
      $this->request->data = $setting;
    }

    //表示設定
    $this->pageTitle = 'インスタグラム 設定変更';
    $this->set('setting', $setting);
    $this->render('form');
  }

}