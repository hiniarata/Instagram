<div id="AlertMessage" class="message" style="display:none"></div>
<div id="DataList">
  <h3>現在の設定状況</h3>
  <!-- list -->
  <table cellpadding="0" cellspacing="0" class="list-table" id="ListTable">
    <thead>
    <tr>
      <th class="list-tool">
        操作
      </th>
      <th>ユーザーID</th>
      <th>更新日</th>
      <th>登録日</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($setting)): ?>

      <tr>
        <td class="row-tools">
          <?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_edit.png', array('width' => 24, 'height' => 24, 'alt' => '編集', 'class' => 'btn')), array('action' => 'edit', $setting['InstagramConfig']['id']), array('title' => '編集')) ?>
          <?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_delete.png', array('width' => 24, 'height' => 24, 'alt' => '初期化', 'class' => 'btn')), array('action' => 'delete', $setting['InstagramConfig']['id']), array('title' => '初期化', 'class' => 'btn-delete', 'onclick' => "return confirm('本当に初期化してもよろしいですか？');")) ?>
        </td>
        <td>
          <?php echo h($setting['InstagramConfig']['user_id']) ?>
        </td>
        <td>
          <?php
          if (!empty($setting['InstagramConfig']['modified'])) {
            echo date("Y年m月d日 H時i分", strtotime($setting['InstagramConfig']['modified']));
          }
          ?>
        </td>
        <td>
          <?php
          if (!empty($setting['InstagramConfig']['created'])) {
            echo date("Y年m月d日 H時i分", strtotime($setting['InstagramConfig']['created']));
          }
          ?>
        </td>
      </tr>

    <?php else: ?>
      <tr>
        <td colspan="8"><p class="no-data">未設定です。<?php $this->BcBaser->link('設定を行う', array('action' => 'add')) ?></p></td>
      </tr>
    <?php endif; ?>
    </tbody>
  </table>
</div>
