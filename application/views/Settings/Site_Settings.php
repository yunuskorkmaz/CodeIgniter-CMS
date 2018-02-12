<?php
?>
<div class="block-header">
    <h2>Ayarlar</h2>
</div>

<?php
if (!empty($error)) {

    foreach ($error as $item) {
        echo '<div class="alert alert-danger">'.$item.'</div>';
    }

}
?>


<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header bg-blue-grey">
                <h2>Site Ayarları</h2>
            </div>
            <div class="body">

                <form action="<?php echo base_url("settings/site_setting"); ?>" method="post">
                    <label for="sitetitle">Site Başlığı</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input value="<?php echo $variables["title"]; ?>" type="text" name="sitetitle"
                                   class="form-control" placeholder="Site Başlığı Giriniz">
                        </div>
                    </div>

                    <label for="sitedescription">Site Açıklaması</label>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea rows="4" name="sitedescription"
                                      class="form-control no-resize"><?php echo $variables["desc"]; ?></textarea>
                        </div>
                    </div>


                    <label for="sitekeywords">Site Anahtar Kelimeleri
                        <small>(Anahtar kelimeleri aralarında virgül(,) koyarak yazınız)</small>
                    </label>
                    <div class="form-group">
                        <div class="form-line">
                            <input value="<?php echo $variables["keys"]; ?>" type="text" name="sitekeywords"
                                   class="form-control" placeholder="Site Anahtar Kelimeleri Giriniz">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
</div>

