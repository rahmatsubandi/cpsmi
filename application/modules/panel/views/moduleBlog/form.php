<section id="moduleBlog">
  <div class="card">
    <div class="card-body">

      <form id="form-moduleBlog" enctype="multipart/form-data">

        <input type="hidden" name="id" class="blog-id" value="<?php echo (isset($data->id)) ? $data->id : '' ?>" readonly/>

        <div class="row">
          
          <div class="col-xs-10 col-md-10">
            <h4 class="card-title"><?php echo (isset($card_title)) ? $card_title : '' ?></h4>
            <h6 class="card-subtitle"><?php echo (isset($card_subTitle)) ? $card_subTitle : '' ?></h6>
            <div class="clear-card"></div>
          </div>

          <div class="col-xs-10 col-sm-2">
            <button class="btn btn--raised btn-primary btn--icon-text btn-block page-action-save spinner-action-button">
              Save Changes
              <div class="spinner-action"></div>
            </button>
            <div class="clear-card"></div>
          </div>

        </div>
        <div class="clear-card"></div>
        
        <div class="row">

          <div class="col-xs-10 col-md-10">
            <div class="form-group">
              <input
                type="text"
                name="title"
                class="form-control blog-title"
                placeholder="Title"
                value="<?php echo (isset($data->title)) ? $data->title : '' ?>"
                style="font-size: 1.2rem; text-transform: capitalize;"
              />
              <i class="form-group__bar"></i>
            </div>

            <div class="form-group">
              <textarea name="content" class="tinymce-init blog-content"><?php echo (isset($data->content)) ? $data->content : '' ?></textarea>
            </div>

            <div class="form-group">
              <label required>Snippet</label>
              <textarea name="snippet" class="form-control textarea-autosize blog-snippet" placeholder="Snippet content..."><?php echo (isset($data->snippet)) ? $data->snippet : '' ?></textarea>
            </div>
          </div>

          <div class="col-xs-10 col-md-2">

            <div class="upload">
              <div class="upload-button">
                <input type="file" name="cover" class="upload-pure-button blog-cover"/>
              </div>
              <div class="upload-preview">
                <?php
                  if (isset($data->cover) && !empty($data->cover) && !is_null($data->cover)) {
                    echo '<img src="'.base_url($data->cover).'"/>';
                  };
                ?>
              </div>
            </div>

            <div class="clear-card"></div>
            <div class="clear-card"></div>

            <div class="form-group">
              <label required>Category</label>
              <div class="select">
                <select name="blog_category_id" class="form-control blog-blog_category_id">
                  <option value="">(Empty)</option>
                  <?php
                    if (count($data_category) > 0) {
                      $category = '';
                      $tempCategory = (isset($data->blog_category_id)) ? $data->blog_category_id : '';
                      foreach ($data_category as $index => $item) {
                        $selected = ($item->id === $tempCategory) ? 'selected="true"' : '';
                        $category .= '<option value="'.$item->id.'" '.$selected.'>'.$item->name.'</option>';
                      };
                      echo $category;
                    };
                  ?>
                </select>
                <i class="form-group__bar"></i>
              </div>
            </div>

            <div class="form-group">
              <label required>Link</label>
              <input
                type="text"
                name="link"
                class="form-control mask-link blog-link"
                placeholder="Link"
                value="<?php echo (isset($data->link)) ? $data->link : '' ?>"
              />
              <i class="form-group__bar"></i>
            </div>

            <div class="form-group form-group-xs">
              <label required>Comments?</label>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <?php $tempComment1 = (!isset($data->is_comment)) ? 'active' : '' ?>
                <?php $tempComment2 = (!isset($data->is_comment)) ? 'checked' : '' ?>
                <label class="btn option-is_comment <?php echo $tempComment1 ?> <?php echo (isset($data->is_comment) && $data->is_comment == "1") ? 'active' : '' ?>">
                  <input
                    type="radio"
                    name="is_comment"
                    value="1"
                    class="blog-is_comment"
                    autocomplete="off"
                    <?php echo $tempComment2 ?>
                    <?php echo (isset($data->is_comment) && $data->is_comment == "1") ? 'checked' : '' ?>
                  /> Yes
                </label>
                <label class="btn option-is_comment <?php echo (isset($data->is_comment) && $data->is_comment == "0") ? 'active' : '' ?>">
                  <input
                    type="radio"
                    name="is_comment"
                    value="0"
                    class="blog-is_comment"
                    autocomplete="off"
                    <?php echo (isset($data->is_comment) && $data->is_comment == "0") ? 'checked' : '' ?>
                  /> No
                </label>
              </div>
            </div>

          </div>

        </div>

      </form>

    </div>
  </div>
</section>
