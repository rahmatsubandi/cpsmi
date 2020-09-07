<div class="row">
  <div class="col-md-6 col-xs-12 probootstrap-animate">
    <a href="https://www.google.com/maps/search/<?php echo str_replace('<br/>', ' ', $app->contact->address) ?>" target='_blank'>
      <img class="img-thumbnail img-map" style="width: 100%; object-fit: cover;" src="<?php echo base_url($app->contact->img_map) ?>" />
    </a>
  </div>
  <div class="col-md-6 col-xs-12 probootstrap-animate">
    <table>
      <tr>
        <th valign="top" style="text-align:right" width="30%">Email</th>
        <td valign="top" style="padding: 0px 10px 0px 10px"><i class="fa fa-envelope-o"></i></td>
        <td valign="top" width="80%"><?php echo $data->email ?></td>
      </tr>
      <tr>
        <th valign="top" style="text-align:right" width="30%">Phone</th>
        <td valign="top" style="padding: 0px 10px 0px 10px"><i class="fa fa-phone"></i></td>
        <td valign="top" width="80%"><?php echo $data->phone ?></td>
      </tr>
      <?php if (!empty($data->whatsapp)) : ?>
        <tr>
          <th valign="top" style="text-align:right" width="30%">Whatsapp</th>
          <td valign="top" style="padding: 0px 10px 0px 10px"><i class="fa fa-whatsapp"></i></td>
          <td valign="top" width="80%">
            <a href="https://api.whatsapp.com/send?phone=<?php echo $data->whatsapp ?>&text=Hallo :)&source=&data=" target="_blank">
              <?php echo $data->whatsapp ?>
            </a>
          </td>
        </tr>
      <?php endif; ?>
      <?php if (!empty($data->facebook)) : ?>
        <tr>
          <th valign="top" style="text-align:right" width="30%">Facebook</th>
          <td valign="top" style="padding: 0px 10px 0px 10px"><i class="fa fa-facebook"></i></td>
          <td valign="top" width="80%">
            <a href="http://facebook.com/<?php echo $data->facebook ?>" target="_blank">
              <?php echo $data->facebook ?>
            </a>
          </td>
        </tr>
      <?php endif; ?>
      <?php if (!empty($data->instagram)) : ?>
        <tr>
          <th valign="top" style="text-align:right" width="30%">Instagram</th>
          <td valign="top" style="padding: 0px 10px 0px 10px"><i class="fa fa-instagram"></i></td>
          <td valign="top" width="80%">
            <a href="http://instagram.com/<?php echo $data->instagram ?>" target="_blank">
              <?php echo $data->instagram ?>
            </a>
          </td>
        </tr>
      <?php endif; ?>
      <?php if (!empty($data->twitter)) : ?>
        <tr>
          <th valign="top" style="text-align:right" width="30%">Twitter</th>
          <td valign="top" style="padding: 0px 10px 0px 10px"><i class="fa fa-twitter"></i></td>
          <td valign="top" width="80%">
            <a href="http://twitter.com/<?php echo $data->twitter ?>" target="_blank">
              <?php echo $data->twitter ?>
            </a>
          </td>
        </tr>
      <?php endif; ?>
      <?php if (!empty($data->linkedin)) : ?>
        <tr>
          <th valign="top" style="text-align:right" width="30%">LinkedIn</th>
          <td valign="top" style="padding: 0px 10px 0px 10px"><i class="fa fa-linkedin"></i></td>
          <td valign="top" width="80%">
            <a href="http://linkedin.com/in/<?php echo $data->linkedin ?>" target="_blank">
              <?php echo $data->linkedin ?>
            </a>
          </td>
        </tr>
      <?php endif; ?>
      <tr>
        <th valign="top" style="text-align:right" width="30%">Address</th>
        <td valign="top" style="padding: 0px 10px 0px 10px"><i class="fa fa-map-marker"></i></td>
        <td valign="top" width="80%">
          <?php echo $data->address ?>
        </td>
      </tr>
      <tr>
        <th valign="top" style="text-align:right" width="30%">Office Hours</th>
        <td valign="top" style="padding: 0px 10px 0px 10px"><i class="fa fa-clock-o"></i></td>
        <td valign="top" width="80%">
          <table class="table-fix">
            <?php
            $days = array('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
            $index = 1;

            foreach ($days as $key => $item) {
              $open = $data->{'hours' . $index}->open;
              $close = $data->{'hours' . $index}->close;
              $class = (strtolower(trim($open)) === 'closed') ? 'color-red text-bold' : '';
              $value = (strtolower(trim($open)) !== 'closed') ? $open . ' - ' . $close : 'Closed';

              echo '<tr> <td width="60">' . $item . '</td> <td><span class="' . $class . '">' . $value . '</span></td> </tr>';
              $index++;
            };
            ?>
          </table>
        </td>
      </tr>
    </table>
  </div>
</div>