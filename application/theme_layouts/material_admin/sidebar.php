<aside class="sidebar">
    <div class="scrollbar-inner">
        <div class="user">
            <div class="user__info" data-toggle="dropdown">
                <?php
                $profile_photo = $this->session->userdata('user')['profile_photo'];
                $profile_photo_img = (!is_null($profile_photo)) && !empty($profile_photo) ? base_url($profile_photo) : base_url('themes/material_admin/demo/img/profile-pics/2.jpg');
                ?>
                <img class="user__img" src="<?php echo $profile_photo_img ?>" />
                <div>
                    <div class="user__name"><?php echo $this->session->userdata('user')['full_name'] ?></div>
                    <div class="user__email">Nice day!</div>
                </div>
            </div>

            <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php echo base_url('panel/setting/account/') ?>">Change Password</a>
                <a class="dropdown-item" href="<?php echo base_url('panel/logout/') ?>">Logout</a>
            </div>
        </div>

        <ul class="navigation">
            <li class="<?php echo (in_array($this->router->fetch_class(), ['dashboard', 'search', 'developer'])) ? 'navigation__active' : '' ?>">
                <a href="<?php echo base_url('panel/dashboard') ?>"><i class="zmdi zmdi-home"></i> Dashboard</a>
            </li>

            <li class="<?php echo ($this->router->fetch_class() === 'menuconfiguration') ? 'navigation__active' : '' ?>">
                <a href="<?php echo base_url('panel/menuconfiguration/') ?>"><i class="zmdi zmdi-widgets"></i> Menu Configuration</a>
            </li>

            <li class="navigation__sub <?php echo (in_array($this->router->fetch_class(), [
                                            'moduleabout', 'moduleblog', 'modulecareer', 'moduleclient', 'modulecontact', 'moduledashboard',
                                            'modulefaq', 'moduleportfolio', 'moduleproduct', 'moduleservice', 'moduletestimonial', 'modulevisimisi'
                                        ])) ? 'navigation__sub--active navigation__sub--toggled' : '' ?>">
                <a href=""><i class="zmdi zmdi-puzzle-piece"></i> Modules</a>
                <ul>
                    <li class="<?php echo ($this->router->fetch_class() === 'moduleabout') ? 'navigation__active' : '' ?>">
                        <a href="<?php echo base_url('panel/moduleabout/') ?>">About</a>
                    </li>
                    <li class="<?php echo ($this->router->fetch_class() === 'moduleblog') ? 'navigation__active' : '' ?>">
                        <a href="<?php echo base_url('panel/moduleblog/') ?>">Blog</a>
                    </li>
                    <li class="<?php echo ($this->router->fetch_class() === 'modulecareer') ? 'navigation__active' : '' ?>">
                        <a href="<?php echo base_url('panel/modulecareer/') ?>">Career</a>
                    </li>
                    <li class="<?php echo ($this->router->fetch_class() === 'moduleclient') ? 'navigation__active' : '' ?>">
                        <a href="<?php echo base_url('panel/moduleclient/') ?>">Client</a>
                    </li>
                    <li class="<?php echo ($this->router->fetch_class() === 'modulecontact') ? 'navigation__active' : '' ?>">
                        <a href="<?php echo base_url('panel/modulecontact/') ?>">Contact</a>
                    </li>
                    <li class="<?php echo ($this->router->fetch_class() === 'moduledashboard') ? 'navigation__active' : '' ?>">
                        <a href="<?php echo base_url('panel/moduledashboard/') ?>">Dashboard</a>
                    </li>
                    <li class="<?php echo ($this->router->fetch_class() === 'modulefaq') ? 'navigation__active' : '' ?>">
                        <a href="<?php echo base_url('panel/modulefaq/') ?>">FAQ</a>
                    </li>
                    <li class="<?php echo ($this->router->fetch_class() === 'moduleportfolio') ? 'navigation__active' : '' ?>">
                        <a href="<?php echo base_url('panel/moduleportfolio/') ?>">Portfolio</a>
                    </li>
                    <li class="<?php echo ($this->router->fetch_class() === 'moduleproduct') ? 'navigation__active' : '' ?>">
                        <a href="<?php echo base_url('panel/moduleproduct/') ?>">Product</a>
                    </li>
                    <li class="<?php echo ($this->router->fetch_class() === 'moduleservice') ? 'navigation__active' : '' ?>">
                        <a href="<?php echo base_url('panel/moduleservice/') ?>">Service</a>
                    </li>
                    <li class="<?php echo ($this->router->fetch_class() === 'moduletestimonial') ? 'navigation__active' : '' ?>">
                        <a href="<?php echo base_url('panel/moduletestimonial/') ?>">Testimonial</a>
                    </li>
                    <li class="<?php echo ($this->router->fetch_class() === 'modulevisimisi') ? 'navigation__active' : '' ?>">
                        <a href="<?php echo base_url('panel/modulevisimisi/') ?>">Visi & Misi</a>
                    </li>
                </ul>
            </li>

            <li class="<?php echo ($this->router->fetch_class() === 'page') ? 'navigation__active' : '' ?>">
                <a href="<?php echo base_url('panel/page/') ?>"><i class="zmdi zmdi-collection-text"></i> Pages</a>
            </li>

            <li class="<?php echo ($this->router->fetch_class() === 'theme') ? 'navigation__active' : '' ?>">
                <a href="<?php echo base_url('panel/theme/') ?>"><i class="zmdi zmdi-format-color-fill"></i> Themes</a>
            </li>

            <li class="navigation__sub <?php echo (in_array($this->router->fetch_class(), ['setting'])) ? 'navigation__sub--active navigation__sub--toggled' : '' ?>">
                <a href=""><i class="zmdi zmdi-settings"></i> Settings</a>
                <ul>
                    <li class="<?php echo ($this->router->fetch_method() === 'account') ? 'navigation__active' : '' ?>">
                        <a href="<?php echo base_url('panel/setting/account/') ?>">Change Password</a>
                    </li>
                    <li class="<?php echo ($this->router->fetch_method() === 'user') ? 'navigation__active' : '' ?>">
                        <a href="<?php echo base_url('panel/setting/user/') ?>">User</a>
                    </li>
                    <li class="<?php echo ($this->router->fetch_method() === 'application') ? 'navigation__active' : '' ?>">
                        <a href="<?php echo base_url('panel/setting/application/') ?>">Application</a>
                    </li>
                    <!-- coming soon -->
                    <!-- <li class="<?php echo ($this->router->fetch_method() === 'smtp') ? 'navigation__active' : '' ?>">
                        <a href="<?php echo base_url('panel/setting/smtp/') ?>">SMTP</a>
                    </li> -->
                    <li class="<?php echo ($this->router->fetch_method() === 'module') ? 'navigation__active' : '' ?>">
                        <a href="<?php echo base_url('panel/setting/module/') ?>">Module</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>