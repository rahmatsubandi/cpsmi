<?php $isLogin = (!is_null($this->session->userdata('user')) && $this->session->userdata('user')['is_login'] == 1) ? true : false ?>

<div id="comments">
  <!-- Comment information -->
  <div class="comments__info">
    <?php echo count($comments) ?> comments for "<?php echo $data->title ?>".
  </div>
  <!-- Comment items -->
  <div id="comments-data">
    <?php if (count($comments) > 0): ?>
    <?php $commentNo = 1; ?>
    <?php foreach ($comments as $item): ?>
    <?php $isAdmin = (strpos($item->author_name, '__admin__') !== false) ? true : false ?>
    <div id="comments-<?php echo $commentNo ?>" class="comments__item probootstrap-animate <?php echo ($isAdmin) ? 'comments__item-admin' : '' ?>">
      <div class="comments__author">
        <div class="comments__author_photo">
          <?php
            if (!is_null($item->author_photo)) {
              if ($isAdmin) {
                $commentPhoto = base_url($item->author_photo);
              } else {
                $commentPhoto = $item->author_photo;
              };
            } else {
              $commentPhoto = base_url('directory/default/people.png');
            };
          ?>
          <img src="<?php echo $commentPhoto ?>" />
        </div>
        <div class="comments__author_name">
          <?php if ($isAdmin): ?>
          <span><b>Admin</b></span>
          <?php else: ?>
          <span><?php echo html_escape($item->author_name) ?></span>
          <?php endif; ?>
          <p><?php echo $item->created_at ?> <span class="separator-bullet">&#8226;</span> #<?php echo $commentNo ?></p>
        </div>
      </div>
      <div class="comments__content">
        <?php echo html_escape($item->content) ?>
      </div>
      <?php if ($isLogin): ?>
      <div class="comments__footer text-right">
        <a class="btn btn-default btn-sm article__comment-delete" data-comment="comments-<?php echo $commentNo ?>" data-action="<?php echo base_url('blog/delete_comment/'.$item->id) ?>">
          <i class="zmdi zmdi-delete"></i> Delete
        </a>
      </div>
      <?php endif; ?>
    </div>
    <?php $commentNo++ ?>
    <?php endforeach; ?>
    <?php endif; ?>
  </div>
  <!-- Comment input -->
  <div class="comments__input probootstrap-animate">
    <div class="comments__input_header">
      Leave a reply
    </div>
    <form id="article__form-comment" method="post" action="<?php echo base_url('blog/post_comment/'.$data->id) ?>">
      <div class="comments__input_content">
        <div class="article__response-comment" style="display: none;">
          <div class="alert alert-danger alert-dismissible article__response-comment-alert" role="alert">
            <span class="article__response-comment-data"></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
        <?php if (!$isLogin): ?>
        <div class="form-group">
          <input type="text" name="author_name" class="form-control comment-author_name" placeholder="Full Name" required />
        </div>
        <div class="form-group">
          <input type="email" name="author_email" class="form-control comment-author_email" placeholder="Email" required />
        </div>
        <?php endif; ?>
        <div class="form-group">
          <textarea name="content" class="form-control comment-content" rows="4" placeholder="Write your reply..." style="resize: vertical;" required></textarea>
        </div>
      </div>
      <div class="comments__input_footer text-right">
        <button id="article__comment-post" class="btn btn-primary btn-sm">Post</button>
      </div>
    </form>
  </div>
</div>
