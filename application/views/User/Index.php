<div class="block-header">
    <h2>Kullanıcılar</h2>
</div>
<div class="row clearfix">
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue-grey">
                <h2>
                    Kullanıcılar
                </h2>
            </div>
            <div class="body table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Kullanici Adi</th>
                        <th>İsim Soyisim</th>
                        <th>E-Posta</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($users as $item) : ?>
                        <tr>
                            <th scope="row"><?= $item->id ?></th>
                            <td><?= $item->kadi; ?></td>
                            <td><?= $item->adSoyad ?></td>
                            <td><?= $item->eposta; ?></td>
                            <td>
                                <?php if($item->id == $_SESSION["user_id"]): ?>
                                <a href="#" type="button"  class="btn btn-primary waves-effect">
                                    <i class="material-icons">edit</i>
                                    <span>Düzenle</span>
                                </a>
                                <?php endif; ?>
                                <?php if($item->id != 1): ?>
                                <a href="#" type="button"  class="btn btn-danger waves-effect">
                                    <i class="material-icons">delete</i>
                                    <span>Sil</span>
                                </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>



                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue-grey">
                <h2>
                    Kullanıcı Ekle
                </h2>
            </div>
            <div class="body table-responsive">
                <form action="<?php echo base_url("user/add"); ?>" method="post">
                    <label for="name">Adı Soyadı</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="name" class="form-control" placeholder="Ad ve Soyad Giriniz">
                        </div>
                    </div>
                    <label for="kadi">Kullanıcı Adı</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="kadi" class="form-control" placeholder="Kullanıcı Adı Giriniz">
                        </div>
                    </div>

                    <label for="email">E-Mail</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="email" name="email" class="form-control" placeholder="Eposta Adresi Giriniz">
                        </div>
                    </div>
                    <label for="pass">Şifre</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="password" name="pass" id="pass" class="form-control" placeholder="Şifre Giriniz Giriniz">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
</div>


