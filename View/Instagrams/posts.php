<ul id="instagramPosts">
  <?php foreach($datas as $data): ?>
    <li>
      <?php $this->Instagram->postPhoto($data); ?>
      <?php $this->Instagram->postDate($data); ?>
      <?php $this->Instagram->postCaption($data); ?>
    </li>
  <?php endforeach; ?>
</ul>
