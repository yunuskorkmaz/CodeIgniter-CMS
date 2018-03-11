<div class="row clearfix">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue-grey">
                <h2>
                    Kullanıcı Ekle
                </h2>
            </div>
            <div class="body table-responsive">
                <form action="<?php echo base_url("user/edit/".$user->id); ?>" method="post">
                    <label for="name">Adı Soyadı</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input value="<?php echo $user->adSoyad?>" type="text" name="name" class="form-control" placeholder="Ad ve Soyad Giriniz">
                        </div>
                    </div>
                    <label for="kadi">Kullanıcı Adı</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input value="<?php echo $user->kadi?>" type="text" name="kadi" class="form-control" placeholder="Kullanıcı Adı Giriniz">
                        </div>
                    </div>

                    <label for="email">E-Mail</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input value="<?php echo $user->eposta?>" type="email" name="email" class="form-control" placeholder="Eposta Adresi Giriniz">
                        </div>
                    </div>
                    <?php if($user->id == $_SESSION["user_id"] ): ?>
                    <label for="pass">Şifre</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input value="<?php echo $user->sifre?>" type="text" name="pass" id="pass" class="form-control" placeholder="Şifre Giriniz Giriniz">
                        </div>
                    </div>
                    <?php endif; ?>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
</div>