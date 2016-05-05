<!-- form -->
<?php echo $this->BcForm->create('InstagramConfig', array('enctype' => 'multipart/form-data')) ?>
<div class="section">
  <table cellpadding="0" cellspacing="0" id="FormTable" class="form-table">
    <tr>
      <th class="col-head">
        <?php echo $this->BcForm->label('InstagramConfig.user_id', 'ユーザーID') ?>&nbsp;<span class="required">*</span></th>
      <td class="col-input">
        <?php echo $this->BcForm->input('InstagramConfig.user_id', array(
          'type' => 'text'
        )) ?>
        <?php echo $this->BcForm->error('InstagramConfig.user_id') ?>
        <?php echo $this->BcHtml->image('admin/icn_help.png', array('id' => 'helpName', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
        <div id="helptextName" class="helptext">
          <ul>
            <li>インスタグラムのユーザーIDを入力してください。</li>
          </ul>
        </div>
      </td>
    </tr>
    <tr>
      <th class="col-head">
        <?php echo $this->BcForm->label('InstagramConfig.access_token', 'ACCESS TOKEN') ?>&nbsp;<span class="required">*</span></th>
      <td class="col-input">
        <?php echo $this->BcForm->input('InstagramConfig.access_token', array(
          'type' => 'text'
        )) ?>
        <?php echo $this->BcForm->error('InstagramConfig.access_token') ?>
        <?php echo $this->BcHtml->image('admin/icn_help.png', array('id' => 'helpName', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
        <div id="helptextName" class="helptext">
          <ul>
            <li>インスタグラムのアクセウトークンを入力してください。</li>
          </ul>
        </div>
      </td>
    </tr>
  </table>

</div>
<!-- button -->
<div class="submit">
  <?php echo $this->BcForm->submit('保存', array('div' => false, 'class' => 'button', 'id' => 'BtnSave')) ?>
  <?php if (!empty($setting)): ?>
    <?php
    $this->BcBaser->link('初期化', array('action' => 'delete', $this->BcForm->value('InstagramConfig.id')), array('class' => 'button'), sprintf('本当に初期化してもいいですか？'), false);
    ?>
  <?php endif ?>
</div>

<?php echo $this->BcForm->end() ?>
