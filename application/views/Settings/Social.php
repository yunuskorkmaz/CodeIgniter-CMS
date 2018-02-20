<div class="block-header">
    <h2>Sosyal Ağ Bilgileri</h2>
</div>
<div class="row clearfix">
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue-grey">
                <h2>
                    Kayıtlı Sosyal Ağlar
                </h2>
            </div>
            <div class="body table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>İcon</th>
                        <th>Sosyal Ağ</th>
                        <th>URL</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($data as $item) : ?>
                        <tr>
                            <th scope="row"><?= $item->id ?></th>
                            <td><i class="socicon-<?= $item->network_icon; ?>"></i></td>
                            <td><?= $item->network_name ?></td>
                            <td><?= $item->network_url; ?></td>
                            <td style="text-align: right">
                                <a href="<?php echo base_url("settings/socialedit/$item->id"); ?>" type="button" class="btn btn-primary waves-effect">
                                    <i class="material-icons">edit</i>
                                    <span>Düzenle</span>
                                </a>
                                <a href="<?php echo base_url("settings/socialdelete/$item->id")?>" type="button" class="btn btn-danger waves-effect btndelete">
                                    <i class="material-icons">delete</i>
                                    <span>Sil</span>
                                </a>
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
                    Sosyal Ağ Ekle
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
                <form action="<?php echo base_url("settings/social"); ?>" method="post">
                    <label for="name">Sosyal Ağ Adı</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input required type="text" name="name" class="form-control" placeholder="Sosyal Ağ Adı Giriniz">
                        </div>
                    </div>
                    <label for="url">Sosyal Ağ Adresi</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input required type="text" name="url" class="form-control" placeholder="Sosyal Ağ Adresi Giriniz">
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
                            $icons[] = "disqus";
                        ?>
                        <?php foreach ($icons as $icon): ?>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <input required type="radio" name="icon" value="<?php echo $icon; ?>" id="<?php echo $icon; ?>">
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
<script>
        $(function () {
            $('.btndelete').click(function (e) {
                e.preventDefault();
                swal({
                    title: "Emin misiniz?",
                    text: "Kaydın silinmesini onaylıyor musunuz?",
                    icon: "warning",
                    buttons: [
                        "İptal","Evet"
                    ],
                    dangerMode: true
                }).then((willDelete) => {
                    if(willDelete){
                        swal({icon:'success',buttons:false});
                        window.location.href = $(this).attr("href");
                    }
                }
            )
            })
        });
</script>

