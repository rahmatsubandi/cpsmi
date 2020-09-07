<style type="text/css">
    .upload-preview img {
        width: 100%;
        height: 300px !important;
        object-fit: cover;
    }
</style>

<section id="moduleContact">
    <div class="card">
        <div class="card-body">

            <form id="form-moduleContact" enctype="multipart/form-data">

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

                <div class="form-group">
                    <label required>Email</label>
                    <input type="text" name="email" class="form-control mask-email contact-email" placeholder="Email" maxlength="100" value="<?php echo (isset($data->email)) ? $data->email : '' ?>" />
                    <i class="form-group__bar"></i>
                </div>

                <div class="row">
                    <div class="col-xs-10 col-md-6">
                        <div class="form-group">
                            <label required>Phone</label>
                            <input type="number" name="phone" class="form-control contact-phone" placeholder="Phone" value="<?php echo (isset($data->phone)) ? $data->phone : '' ?>" />
                            <i class="form-group__bar"></i>
                        </div>
                    </div>
                    <div class="col-xs-10 col-md-6">
                        <div class="form-group">
                            <label>Whatsapp</label>
                            <input type="number" name="whatsapp" class="form-control contact-whatsapp" placeholder="Whatsapp" maxlength="100" value="<?php echo (isset($data->whatsapp)) ? $data->whatsapp : '' ?>" />
                            <i class="form-group__bar"></i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-10 col-md-6">
                        <div class="form-group">
                            <label>Facebook</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">http://facebook.com/</span>
                                </div>
                                <input type="text" name="facebook" class="form-control contact-facebook" placeholder="ID / Username" value="<?php echo (isset($data->facebook)) ? $data->facebook : '' ?>" />
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-10 col-md-6">
                        <div class="form-group">
                            <label>Instagram</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">http://instagram.com/</span>
                                </div>
                                <input type="text" name="instagram" class="form-control contact-instagram" placeholder="ID / Username" value="<?php echo (isset($data->instagram)) ? $data->instagram : '' ?>" />
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-10 col-md-6">
                        <div class="form-group">
                            <label>Twitter</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">http://twitter.com/</span>
                                </div>
                                <input type="text" name="twitter" class="form-control contact-twitter" placeholder="ID / Username" value="<?php echo (isset($data->twitter)) ? $data->twitter : '' ?>" />
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-10 col-md-6">
                        <div class="form-group">
                            <label>LinkedIn</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">http://linkedin.com/</span>
                                </div>
                                <input type="text" name="linkedin" class="form-control contact-linkedin" placeholder="ID / Username" value="<?php echo (isset($data->linkedin)) ? $data->linkedin : '' ?>" />
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label required>Address</label>
                    <textarea name="address" class="form-control textarea-autosize contact-address" placeholder="Address"><?php echo (isset($data->address)) ? str_replace('<br/>', '&#13;&#10;', $data->address) : '' ?></textarea>
                    <i class="form-group__bar"></i>
                </div>

                <div class="form-group form-group-xs">
                    <div class="row">
                        <div class="col-xs-10 col-md-6">
                            <label>Office Hours</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <input type="checkbox" name="hours1_check" value="1" class="contact-hours1_check contact-check" data-id="1" style="margin-right: 5px;" <?php echo ($data->hours1->open === 'Closed') ? 'checked' : '' ?> /> Closed
                                    </span>
                                    <span class="input-group-text" style="width: 80px;">Senin</span>
                                </div>
                                <input type="text" name="hours1_open" class="form-control time-picker contact-hours1_open" placeholder="Open" value="<?php echo (isset($data->hours1->open)) ? $data->hours1->open : '' ?>" <?php echo ($data->hours1->open === 'Closed') ? 'disabled' : '' ?> />
                                <input type="text" name="hours1_close" class="form-control time-picker contact-hours1_close" placeholder="Close" value="<?php echo (isset($data->hours1->close)) ? $data->hours1->close : '' ?>" <?php echo ($data->hours1->close === 'Closed') ? 'disabled' : '' ?> style="border-left: 1px solid #eceff1;" />
                            </div>
                            <div class="clear-card"></div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <input type="checkbox" name="hours2_check" value="1" class="contact-hours2_check contact-check" data-id="2" style="margin-right: 5px;" <?php echo ($data->hours2->open === 'Closed') ? 'checked' : '' ?> /> Closed
                                    </span>
                                    <span class="input-group-text" style="width: 80px;">Selasa</span>
                                </div>
                                <input type="text" name="hours2_open" class="form-control time-picker contact-hours2_open" placeholder="Open" value="<?php echo (isset($data->hours2->open)) ? $data->hours2->open : '' ?>" <?php echo ($data->hours2->open === 'Closed') ? 'disabled' : '' ?> />
                                <input type="text" name="hours2_close" class="form-control time-picker contact-hours2_close" placeholder="Close" value="<?php echo (isset($data->hours2->close)) ? $data->hours2->close : '' ?>" <?php echo ($data->hours2->close === 'Closed') ? 'disabled' : '' ?> style="border-left: 1px solid #eceff1;" />
                            </div>
                            <div class="clear-card"></div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <input type="checkbox" name="hours3_check" value="1" class="contact-hours3_check contact-check" data-id="3" style="margin-right: 5px;" <?php echo ($data->hours3->open === 'Closed') ? 'checked' : '' ?> /> Closed
                                    </span>
                                    <span class="input-group-text" style="width: 80px;">Rabu</span>
                                </div>
                                <input type="text" name="hours3_open" class="form-control time-picker contact-hours3_open" placeholder="Open" value="<?php echo (isset($data->hours3->open)) ? $data->hours3->open : '' ?>" <?php echo ($data->hours3->open === 'Closed') ? 'disabled' : '' ?> />
                                <input type="text" name="hours3_close" class="form-control time-picker contact-hours3_close" placeholder="Close" value="<?php echo (isset($data->hours3->close)) ? $data->hours3->close : '' ?>" <?php echo ($data->hours3->close === 'Closed') ? 'disabled' : '' ?> style="border-left: 1px solid #eceff1;" />
                            </div>
                            <div class="clear-card"></div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <input type="checkbox" name="hours4_check" value="1" class="contact-hours4_check contact-check" data-id="4" style="margin-right: 5px;" <?php echo ($data->hours4->open === 'Closed') ? 'checked' : '' ?> /> Closed
                                    </span>
                                    <span class="input-group-text" style="width: 80px;">Kamis</span>
                                </div>
                                <input type="text" name="hours4_open" class="form-control time-picker contact-hours4_open" placeholder="Open" value="<?php echo (isset($data->hours4->open)) ? $data->hours4->open : '' ?>" <?php echo ($data->hours4->open === 'Closed') ? 'disabled' : '' ?> />
                                <input type="text" name="hours4_close" class="form-control time-picker contact-hours4_close" placeholder="Close" value="<?php echo (isset($data->hours4->close)) ? $data->hours4->close : '' ?>" <?php echo ($data->hours4->close === 'Closed') ? 'disabled' : '' ?> style="border-left: 1px solid #eceff1;" />
                            </div>
                            <div class="clear-card"></div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <input type="checkbox" name="hours5_check" value="1" class="contact-hours5_check contact-check" data-id="5" style="margin-right: 5px;" <?php echo ($data->hours5->open === 'Closed') ? 'checked' : '' ?> /> Closed
                                    </span>
                                    <span class="input-group-text" style="width: 80px;">Jumat</span>
                                </div>
                                <input type="text" name="hours5_open" class="form-control time-picker contact-hours5_open" placeholder="Open" value="<?php echo (isset($data->hours5->open)) ? $data->hours5->open : '' ?>" <?php echo ($data->hours5->open === 'Closed') ? 'disabled' : '' ?> />
                                <input type="text" name="hours5_close" class="form-control time-picker contact-hours5_close" placeholder="Close" value="<?php echo (isset($data->hours5->close)) ? $data->hours5->close : '' ?>" <?php echo ($data->hours5->close === 'Closed') ? 'disabled' : '' ?> style="border-left: 1px solid #eceff1;" />
                            </div>
                            <div class="clear-card"></div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <input type="checkbox" name="hours6_check" value="1" class="contact-hours6_check contact-check" data-id="6" style="margin-right: 5px;" <?php echo ($data->hours6->open === 'Closed') ? 'checked' : '' ?> /> Closed
                                    </span>
                                    <span class="input-group-text" style="width: 80px;">Sabtu</span>
                                </div>
                                <input type="text" name="hours6_open" class="form-control time-picker contact-hours6_open" placeholder="Open" value="<?php echo (isset($data->hours6->open)) ? $data->hours6->open : '' ?>" <?php echo ($data->hours6->open === 'Closed') ? 'disabled' : '' ?> />
                                <input type="text" name="hours6_close" class="form-control time-picker contact-hours6_close" placeholder="Close" value="<?php echo (isset($data->hours6->close)) ? $data->hours6->close : '' ?>" <?php echo ($data->hours6->close === 'Closed') ? 'disabled' : '' ?> style="border-left: 1px solid #eceff1;" />
                            </div>
                            <div class="clear-card"></div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <input type="checkbox" name="hours7_check" value="1" class="contact-hours7_check contact-check" data-id="7" style="margin-right: 5px;" <?php echo ($data->hours7->open === 'Closed') ? 'checked' : '' ?> /> Closed
                                    </span>
                                    <span class="input-group-text" style="width: 80px;">Minggu</span>
                                </div>
                                <input type="text" name="hours7_open" class="form-control time-picker contact-hours7_open" placeholder="Open" value="<?php echo (isset($data->hours7->open)) ? $data->hours7->open : '' ?>" <?php echo ($data->hours7->open === 'Closed') ? 'disabled' : '' ?> />
                                <input type="text" name="hours7_close" class="form-control time-picker contact-hours7_close" placeholder="Close" value="<?php echo (isset($data->hours7->close)) ? $data->hours7->close : '' ?>" <?php echo ($data->hours7->close === 'Closed') ? 'disabled' : '' ?> style="border-left: 1px solid #eceff1;" />
                            </div>
                        </div>
                        <div class="col-xs-10 col-md-6">
                            <div class="form-group-xs">
                                <label required>Map Location</label>
                                <div class="upload">
                                    <div class="upload-button">
                                        <input type="file" name="img_map" class="upload-pure-button contact-img_map" data-preview="img_map" />
                                    </div>
                                    <div class="upload-preview preview-img_map">
                                        <?php
                                        if (isset($data->img_map) && !empty($data->img_map) && !is_null($data->img_map)) {
                                            echo '<img src="' . base_url($data->img_map) . '"/>';
                                        };
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>
</section>