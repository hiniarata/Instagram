<div id="instagram">
  <?php foreach($datas as $data): ?>
    <div class="instagram-postData">
      <div class="instagram-postData_media">
        <?php $this->Instagram->postPhoto($data); ?>
      </div>
      <div class="instagram-postData_date">
        <?php $this->Instagram->postDate($data); ?>
      </div>
      <div class="instagram-postData_caption">
        <?php $this->Instagram->postCaption($data); ?>
      </div>
      <div class="instagram-postData_user">
        <?php $this->Instagram->postUser($data); ?>
      </div>
      <div class="instagram-postData_likes">
        <?php $this->Instagram->postCountLikes($data); ?>
      </div>
    </div>
  <?php endforeach; ?>
</div>