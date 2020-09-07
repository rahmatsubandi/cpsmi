<section id="moduleCareer">
  <div class="card">
    <div class="card-body">

      <form id="form-moduleCareer" enctype="multipart/form-data">

        <input type="hidden" name="id" class="career-id" value="<?php echo (isset($data->id)) ? $data->id : '' ?>" readonly/>

        <div class="row">
          
          <div class="col-xs-10 col-md-10">
            <h4 class="card-title"><?php echo (isset($card_title)) ? $card_title : '' ?></h4>
            <h6 class="card-subtitle"><?php echo (isset($card_subTitle)) ? $card_subTitle : '' ?></h6>
            <div class="clear-card"></div>
          </div>

          <div class="col-xs-10 col-md-2">
            <button class="btn btn--raised btn-primary btn--icon-text btn-block page-action-save spinner-action-button">
              Save Changes
              <div class="spinner-action"></div>
            </button>
            <div class="clear-card"></div>
          </div>

        </div>
        <div class="clear-card"></div>
        
        <div class="row">

          <div class="col-xs-10 col-md-12">
            <div class="form-group">
              <label required>Job Name</label>
              <input
                type="text"
                name="name"
                class="form-control career-title"
                placeholder="Name"
                maxlength="200"
                value="<?php echo (isset($data->name)) ? $data->name : '' ?>"
                style="text-transform: capitalize;"
              />
              <i class="form-group__bar"></i>
            </div>

            <div class="row">
              <div class="col-xs-10 col-md-6">
                <div class="form-group">
                  <label required>Company Name</label>
                  <input
                    type="text"
                    name="company_name"
                    class="form-control career-company_name"
                    placeholder="Company Name"
                    maxlength="100"
                    value="<?php echo (isset($data->company_name)) ? $data->company_name : '' ?>"
                    style="text-transform: capitalize;"
                  />
                  <i class="form-group__bar"></i>
                </div>
              </div>
              <div class="col-xs-10 col-md-6">
                <div class="form-group">
                  <label required>Company Email</label>
                  <a href="javascript:;" data-toggle="popover" data-trigger="focus" data-content="Email intended for job seekers.">
                    <span class="zmdi zmdi-help"></span>
                  </a>
                  <input
                    type="text"
                    name="email"
                    class="form-control mask-email career-email"
                    placeholder="Company Email"
                    value="<?php echo (isset($data->email)) ? $data->email : '' ?>"
                  />
                  <i class="form-group__bar"></i>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-10 col-md-6">
                <div class="form-group">
                  <label required>Province</label>
                  <div class="form-group">
                    <select name="location_province" class="select2 career-location_province" data-placeholder="Select a province">
                      <option></option>
                      <?php
                        if (count($data_provinces) > 0) {
                          foreach ($data_provinces as $index => $item) {
                            $selected = (isset($data->province_id) && $data->province_id == $item->id) ? 'selected' : '';
                            echo '<option value="'.$item->id.'" '.$selected.'>'.$item->name.'</option>';
                          };
                        };
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-xs-10 col-md-6">
                <div class="form-group">
                  <label required>Regency</label>
                  <div class="form-group">
                    <select name="location" class="select2 career-location" data-placeholder="Select a regency">
                      <option></option>
                      <?php
                        if (isset($data_regencies)) {
                          if (count($data_regencies) > 0) {
                            foreach ($data_regencies as $index => $item) {
                              $selected = (isset($data->location) && $data->location == $item->id) ? 'selected' : '';
                              echo '<option value="'.$item->id.'" '.$selected.'>'.$item->name.'</option>';
                            };
                          };
                        };
                      ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-10 col-md-6">
                <div class="form-group">
                  <label>Salary Range</label>
                  <div class="row">
                    <div class="col-xs-5 col-md-6">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">From</span>
                        </div>
                        <input
                          type="text"
                          name="salary1"
                          class="form-control mask-money career-salary1"
                          placeholder="0"
                          value="<?php echo (isset($data->salary1)) ? $data->salary1 : '' ?>"
                        />
                        <i class="form-group__bar"></i>
                      </div>
                    </div>
                    <div class="col-xs-5 col-md-6">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">To</span>
                        </div>
                        <input
                          type="text"
                          name="salary2"
                          class="form-control mask-money career-salary2"
                          placeholder="0"
                          value="<?php echo (isset($data->salary2)) ? $data->salary2 : '' ?>"
                        />
                        <i class="form-group__bar"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xs-10 col-md-6">
                <div class="form-group">
                  <label required>Currency Unit</label>
                  <div class="select">
                    <select name="currency_unit" class="form-control career-curreny_unit">
                      <?php
                        $data_currency_unit1 = array('USD (US$)','EUR (€)','JPY (¥)','GBP (£)','AUD (A$)','CAD (C$)','CHF (CHF)','CNY (元)','HKD (HK$)','NZD (NZ$)');
                        $data_currency_unit2 = array('SEK (kr)','KRW (₩)','SGD (S$)','NOK (kr)','MXN ($)','INR (₹)','RUB (₽)','ZAR (R)','TRY (₺)','BRL (R$)','TWD (NT$)');
                        $data_currency_unit3 = array('DKK (kr)','PLN (zł)','THB (฿)','IDR (Rp)','HUF (Ft)','CZK (Kč)','ILS (₪)','CLP (CLP$)','PHP (₱)','AED (د.إ)','COP (COL$)');
                        $data_currency_unit4 = array('SAR (﷼)','MYR (RM)','RON (L)');
                        $data_currency_unit = array_merge($data_currency_unit1, $data_currency_unit2, $data_currency_unit3, $data_currency_unit4);
                        asort($data_currency_unit);

                        foreach ($data_currency_unit as $index => $item) {
                          $dataCurrency = (isset($data->currency_unit)) ? $data->currency_unit : 'IDR (Rp)'; // Default selected to "IDR (Rp)"
                          $selected = ($dataCurrency == $item) ? 'selected' : '';
                          echo '<option value="'.$item.'" '.$selected.'>'.$item.'</option>';
                        };
                      ?>
                    </select>
                    <i class="form-group__bar"></i>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-10 col-md-6">
                <div class="form-group">
                  <label required>Age Range</label>
                  <div class="row">
                    <div class="col-xs-5 col-md-6">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">From</span>
                        </div>
                        <input
                          type="text"
                          name="age1"
                          class="form-control mask-age career-age1"
                          placeholder="0"
                          value="<?php echo (isset($data->age1)) ? $data->age1 : '' ?>"
                        />
                        <i class="form-group__bar"></i>
                      </div>
                    </div>
                    <div class="col-xs-5 col-md-6">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">To</span>
                        </div>
                        <input
                          type="text"
                          name="age2"
                          class="form-control mask-age career-age2"
                          placeholder="0"
                          value="<?php echo (isset($data->age2)) ? $data->age2 : '' ?>"
                        />
                        <i class="form-group__bar"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xs-10 col-md-6">
                <div class="form-group">
                  <label required>Education</label>
                  <div class="select">
                    <select name="education[]" class="select2 career-education" multiple data-placeholder="Select one or more choices">
                      <?php
                        $data_education = array('SD','SMP','SMA / SMK','D1','D2','D3','S1','S2','S3');

                        foreach ($data_education as $index => $item) {
                          $selected = (isset($data->education) && strpos($data->education, $item) !== false) ? 'selected' : '';
                          echo '<option value="'.$item.'" '.$selected.'>'.$item.'</option>';
                        };
                      ?>
                    </select>
                    <i class="form-group__bar"></i>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-10 col-md-6">
                <div class="form-group">
                  <label required>Type Of Work</label>
                  <div class="select">
                    <select name="type_work" class="form-control career-type_work">
                      <?php
                        $data_type_work = array(
                          'Full-time contracts',
                          'Part-time contracts',
                          'Fixed-term contracts',
                          'Temporary contracts',
                          'Agency contracts',
                          'Freelancers and contractors',
                          'Zero hour contracts'
                        );

                        foreach ($data_type_work as $index => $item) {
                          $selected = (isset($data->type_work) && $data->type_work == $item) ? 'selected' : '';
                          echo '<option value="'.$item.'" '.$selected.'>'.$item.'</option>';
                        };
                      ?>
                    </select>
                    <i class="form-group__bar"></i>
                  </div>
                </div>
              </div>
              <div class="col-xs-10 col-md-6">
                <div class="form-group">
                  <label required>Closing Date</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                    </div>
                    <input
                      name="closing_date"
                      type="text"
                      class="form-control date-picker career-closing_date"
                      placeholder="Pick a date"
                      value="<?php echo (isset($data->closing_date)) ? $data->closing_date : '' ?>"
                    />
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group-xs">
              <label required>Description</label>
              <textarea name="description" data-height="300" class="tinymce-init career-description"><?php echo (isset($data->description)) ? $data->description : '' ?></textarea>
            </div>
          </div>

        </div>

      </form>

    </div>
  </div>
</section>
