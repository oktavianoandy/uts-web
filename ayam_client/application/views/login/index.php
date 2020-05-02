<div class="pesan" data-login="<?= $pesan?>"></div>
<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="index.html">
                    <img class="align-content" src="<?= base_url()?>assets/images/logo.png" alt="">
                </a>
            </div>
            <div class="login-form" >
                <form method="post" action="<?= base_url()?>login/proses_login" autocomplete="off" validate>
                    <div class="form-group">
                        <label>USERNAME</label>
                        <input type="text" class="form-control" placeholder="Masukkan username" name="username">
                    </div>
                    <div class="form-group">
                        <label>PASSWORD</label>
                        <input type="password" class="form-control" placeholder="Masukkan password" name="password">
                        <small class="float-left"></small>
                    </div>
                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30 font-weight-bold ">Masuk</button>
                </form>
                <br>
            </div>
        </div>
    </div>
</div>