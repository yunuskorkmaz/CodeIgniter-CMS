
<div class="block-header">
    <h2>Sosyal Ağ Bilgileri</h2>
</div>
<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header bg-blue-grey">
            <h2>
                Sosyal Ağ Düzenle
            </h2>
        </div>
        <div class="body table-responsive">
            <?php
            if (isset($error)) {
                if (count($error) > 0) {
                    foreach ($error as $item) {
                        echo '<div class="alert alert-warning">'. $item .'</div>';
                    }
                }
            }
            ?>
            <form action="" method="post">
                <label for="name">Sosyal Ağ Adı</label>
                <div class="form-group">
                    <div class="form-line">
                        <input required type="text" name="name" class="form-control" value="<?php echo $data->network_name;?>" placeholder="Sosyal Ağ Adı Giriniz">
                    </div>
                </div>
                <label for="url">Sosyal Ağ Adresi</label>
                <div class="form-group">
                    <div class="form-line">
                        <input required type="text" name="url" class="form-control" value="<?php echo $data->network_url;?>" placeholder="Sosyal Ağ Adresi Giriniz">
                    </div>
                </div>
                <div class="row clearfix">
                    <?php
                    $icons = array();
                    $icons[] = "facebook";
                    $icons[] = "twitter";
                    $icons[] = "googleplus";
                    $icons[] = "mail";
                    $icons[] = "whatsapp";
                    $icons[] = "instagram";
                    ?>
                    <?php foreach ($icons as $icon):?>
                        <div class="col-sm-3">
                            <input <?php echo $icon == $data->network_icon ? "checked" : "";?> required type="radio" name="icon" value="<?php echo $icon; ?>" id="<?php echo $icon; ?>">
                            <label for="<?php echo $icon; ?>"><i class="socicon-<?php echo $icon; ?>"></i> <?php echo $icon; ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Kaydet</button>
            </form>
        </div>
    </div>
</div>
</div>