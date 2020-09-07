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

<section id="developer" class="content__inner">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"><?php echo (isset($card_title)) ? $card_title : '' ?></h4>
        <h6 class="card-subtitle"><?php echo (isset($card_subTitle)) ? $card_subTitle : '' ?></h6>

        <div class="coffee">
            <div class="coffee-img">
                <img src="<?php echo base_url('directory/developer/smi.jpg') ?>"/>
            </div>
            <div class="title">Sani Malik Ibrahim</div>
            <div class="note">
                <p>Hai, terima kasih sudah menggunakan aplikasi ini.<br/>Jika ada yang ingin ditanyakan, silahkan hubungi saya melalui kontak dibawah ini:</p>
                <p>
                    Whatsapp: 081395179452 <br/>
                    Email: sanimalikibrahim@gmail.com <br/>
                    Blog: <a href="http://developid.blogspot.com" target="_blank">http://developid.blogspot.com</a> <br/>
                    Website: <a href="http://tasik.dev" target="_blank">http://tasik.dev</a>
                </p>
            </div>
            <div class="bank">
                <img src="<?php echo base_url('directory/donation/bri.png') ?>"/>
                <div class="account">
                    <strong>445601000479505 (Sani Malik Ibrahim)</strong>
                </div>
            </div>
            <div class="note">
                <p>Saya membuka jasa pembuatan website dan aplikasi mobile.<br/>Silahkan hubungi saya melalui Whatsapp untuk respon lebih cepat.</p>
            </div>
        </div>

      </div>
    </div>
</section>
