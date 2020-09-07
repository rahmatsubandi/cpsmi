<style type="text/css">
    .coffee {
        text-align: center;
        padding-top: 20px;
        padding-bottom: 20px;
    }
    .coffee .coffee-img {
        width: 100%;
        height: 200px;
        overflow: hidden;
    }
    .coffee .coffee-img img {
        width: 350px;
        height: 100%;
        object-fit: cover;
        object-position: 100% 40%;
    }
    .coffee .title {
        color: #f8b195;
        font-size: 30px;
        padding-top: 20px;
        padding-bottom: 10px;
    }
    .coffee .note {
        font-size: 16px;
        color: #888;
        padding-bottom: 20px;
    }
    .coffee .bank {
        width: 30%;
        padding: 20px;
        margin: 0 auto;
        margin-bottom: 30px;
        border: 1px solid #ccc;
        border-radius: 15px;
    }
    .coffee .bank img {
        width: 250px;
    }
    .coffee .bank .account {
        font-size: 18px;
        color: #333;
    }
</style>

<section id="theme" class="content__inner">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"><?php echo (isset($card_title)) ? $card_title : '' ?></h4>
        <h6 class="card-subtitle"><?php echo (isset($card_subTitle)) ? $card_subTitle : '' ?></h6>

        <div class="coffee">
            <div class="coffee-img">
                <img src="<?php echo base_url('directory/donation/coffee.png') ?>"/>
            </div>
            <div class="title">Buy me a Coffee</div>
            <div class="note">
                <p>"It's just a glass of coffee that tells me that the black one isn't always dirty and the bitter one isn't always sad.<br/>
                And coffee never chooses who deserves it. Because in the presence of coffee, we are all the same."</p>
            </div>
            <div class="bank">
                <img src="<?php echo base_url('directory/donation/bri.png') ?>"/>
                <div class="account">
                    <strong>445601000479505 (Sani Malik Ibrahim)</strong>
                </div>
            </div>
            <div class="note">
                <p>Thanks for buying me a cup of coffee, may God repay your kindness.</p>
            </div>
        </div>

      </div>
    </div>
</section>
