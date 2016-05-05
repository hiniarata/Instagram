<?php
/**
 * システムナビ
 */
$config['BcApp.adminNavi.instagram'] = array(
  'name'		=> 'インスタグラム プラグイン',
  'contents'	=> array(
    array('name' => '利用設定',
      'url' => array(
        'admin' => true,
        'plugin' => 'instagram',
        'controller' => 'instagram_configs',
        'action' => 'index')
    )
  )
);
