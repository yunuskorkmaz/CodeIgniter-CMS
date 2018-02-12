<?php
?>
<div class="block-header">
    <h2>Ayarlar</h2>
</div>
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header bg-blue-grey">
                <h2>İletişim Ayarları</h2>
            </div>
            <div class="body">
                <form action="<?php base_url("settings/contact") ?>" method="post">
                    <label for="telefon">Telefon Numarası</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                           <i class="material-icons">phone</i>
                        </span>
                        <div class="form-line">
                            <input value="<?php echo $variable["telefon"]; ?>" type="text" name="telefon"
                                   class="form-control mobile-phone-number"
                                   placeholder="Telefon Numarası Giriniz Giriniz">
                        </div>
                    </div>

                    <label for="eposta">Eposta Adresi</label>
                    <div class="input-group">
                         <span class="input-group-addon">
                           <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input value="<?php echo $variable["mail"]; ?>" type="text" name="eposta"
                                   class="form-control" placeholder="Eposta Adresi Giriniz">
                        </div>
                    </div>
                    <h4 class="card-inside-title">Çalışma Saatleri</h4>
                    <div class="row clearfix">
                    <div class="col-sm-3">
                        <label for="saatler-pzt-cuma">Pazartesi-Cuma</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input value="<?php echo $variable["haftaici"]; ?>" type="text" name="saatler-pzt-cuma"
                                       class="form-control" placeholder="Pazartesi-Cuma Çalışma Saatlerini Giriniz">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label for="saatler-cumartesi">Cumartesi-Pazar</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input value="<?php echo $variable["haftasonu"]; ?>" type="text" name="saatler-cumartesi"
                                       class="form-control" placeholder="Cumartesi-Pazar Çalışma Saatlerini Giriniz">
                            </div>
                        </div>
                    </div>
                    </div>
                    <label for="adres">Adres</label>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea rows="3" name="adres"
                                      class="form-control no-resize" placeholder="Adres Giriniz"><?php echo $variable["adres"]?></textarea>
                        </div>
                    </div>


                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Kaydet</button>

                </form>
            </div>
        </div>
    </div>

</div>
