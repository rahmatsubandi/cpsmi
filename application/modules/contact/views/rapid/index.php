<!--==========================
	Contact Section
============================-->
<section id="intro" class="clearfix intro-half"></section>
<section id="contact">
	<div class="container">
    <div class="card">
      <div class="card-body">
        <center>
          <div class="icon" style="background: #e1eeff;"><i class="ion-android-home" style="color: #2282ff;"></i></div>
          <h4 class="title"><a href=""><?php echo (!empty($app->active_module->name) ? $app->active_module->name : '-') ?></a></h4>
        <center>
        <div class="description">
          <table>
            <tr>
              <th valign="top" style="text-align:right" width="50%">Email</th>
              <td valign="top" style="padding: 0px 10px 0px 10px"><i class="fa fa-envelope-o"></i></td>
              <td valign="top" width="50%"><?php echo $data->email ?></td>
            </tr>
            <tr>
              <th valign="top" style="text-align:right" width="50%">Phone</th>
              <td valign="top" style="padding: 0px 10px 0px 10px"><i class="fa fa-phone"></i></td>
              <td valign="top" width="50%"><?php echo $data->phone ?></td>
            </tr>
            <?php if (!empty($data->whatsapp)): ?>
            <tr>
              <th valign="top" style="text-align:right" width="50%">Whatsapp</th>
              <td valign="top" style="padding: 0px 10px 0px 10px"><i class="fa fa-whatsapp"></i></td>
              <td valign="top" width="50%">
                <a href="https://api.whatsapp.com/send?phone=<?php echo $data->whatsapp ?>&text=Hallo :)&source=&data=" target="_blank">
                  <?php echo $data->whatsapp ?>
                </a>
              </td>
            </tr>
            <?php endif; ?>
            <?php if (!empty($data->facebook)): ?>
            <tr>
              <th valign="top" style="text-align:right" width="50%">Facebook</th>
              <td valign="top" style="padding: 0px 10px 0px 10px"><i class="fa fa-facebook"></i></td>
              <td valign="top" width="50%">
                <a href="http://facebook.com/<?php echo $data->facebook ?>" target="_blank">
                  <?php echo $data->facebook ?>
                </a>
              </td>
            </tr>
            <?php endif; ?>
            <?php if (!empty($data->instagram)): ?>
            <tr>
              <th valign="top" style="text-align:right" width="50%">Instagram</th>
              <td valign="top" style="padding: 0px 10px 0px 10px"><i class="fa fa-instagram"></i></td>
              <td valign="top" width="50%">
                <a href="http://instagram.com/<?php echo $data->instagram ?>" target="_blank">
                  <?php echo $data->instagram ?>
                </a>
              </td>
            </tr>
            <?php endif; ?>
            <?php if (!empty($data->twitter)): ?>
            <tr>
              <th valign="top" style="text-align:right" width="50%">Twitter</th>
              <td valign="top" style="padding: 0px 10px 0px 10px"><i class="fa fa-twitter"></i></td>
              <td valign="top" width="50%">
                <a href="http://twitter.com/<?php echo $data->twitter ?>" target="_blank">
                  <?php echo $data->twitter ?>
                </a>
              </td>
            </tr>
            <?php endif; ?>
            <?php if (!empty($data->linkedin)): ?>
            <tr>
              <th valign="top" style="text-align:right" width="50%">LinkedIn</th>
              <td valign="top" style="padding: 0px 10px 0px 10px"><i class="fa fa-linkedin"></i></td>
              <td valign="top" width="50%">
                <a href="http://linkedin.com/in/<?php echo $data->linkedin ?>" target="_blank">
                  <?php echo $data->linkedin ?>
                </a>
              </td>
            </tr>
            <?php endif; ?>
            <tr>
              <th valign="top" style="text-align:right" width="50%">Address</th>
              <td valign="top" style="padding: 0px 10px 0px 10px"><i class="fa fa-map-marker"></i></td>
              <td valign="top" width="50%">
               <?php echo $data->address ?>
              </td>
            </tr>
            <tr>
              <th valign="top" style="text-align:right" width="50%">Office Hours</th>
              <td valign="top" style="padding: 0px 10px 0px 10px"><i class="fa fa-clock-o"></i></td>
              <td valign="top" width="50%">
                <table class="table-fix">
                  <?php
                    $days = array('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
                    $index = 1;
                    
                    foreach ($days as $key => $item) {
                      $open = $data->{'hours'.$index}->open;
                      $close = $data->{'hours'.$index}->close;
                      $class = (strtolower(trim($open)) === 'closed') ? 'color-red text-bold' : '';
                      $value = (strtolower(trim($open)) !== 'closed') ? $open.' - '.$close : 'Closed';

                      echo '<tr> <td width="60">'.$item.'</td> <td><span class="'.$class.'">'.$value.'</span></td> </tr>';
                      $index++;
                    };
                  ?>
                </table>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <!-- coming soon -->
    <!-- <div class="card">
      <div class="card-body">
        <center>
          <div class="icon" style="background: #fff0da;"><i class="ion-email" style="color: #e98e06;"></i></div>
          <h4 class="title"><a href="">Send Us a Message</a></h4>
        </center>
        <p class="description">&nbsp;</p>
        <div class="form">
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-info">Send Message</button>
            </div>
          </form>
        </div>
      </div>
    </div> -->
    
    <div class="clearfix"></div>

	</div>
</section><!-- #contact -->
