<?php
?>

<div class="row clearfix">
    <div class="col-lg-8">
        <div class="card">
            <div class="header bg-blue-grey">
                <h2>Hakkımızda Sayfa Ayarları</h2>
            </div>
            <div class="body">


                <form action="" method="post">

                    <label for="abouttitle">Hakkımızda Sayfası Yazı Başlığı</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input value="<?php echo @$data["abouttitle"]; ?>" type="text" name="abouttitle"
                                   class="form-control" placeholder="Yazı Başlığı Giriniz">
                        </div>
                    </div>

                    <label for="abouttext">Hakkımızda Yazısı</label>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea rows="10" type="text" name="abouttext"
                                      class="form-control" placeholder="Hakkımızda Yazısı Giriniz"><?php echo @$data["abouttext"]; ?></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Kaydet</button>
                </form>
            </div>

        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="header bg-blue-grey">
                <h2>Hakkımızda Sayfa Fotografları</h2>
            </div>
            <div class="body table-responsive">
                <?php
                    if(isset($_SESSION["error"])){
                        echo '<div class="alert alert-danger">'.$_SESSION["error"].'</div>';
                        unset($_SESSION["error"]);
                    }
                ?>
                <form action="<?php echo base_url("aboutpage/imageupload")?>" method="post" enctype="multipart/form-data">

                    <label for="image">Fotograf Ekle</label>
                    <div class="form-group" style="margin-bottom: 0px">
                        <div class="form-line">
                            <input type="file" name="image" class="form-control" placeholder="Yazı Başlığı Giriniz">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Kaydet</button>

                </form>

            </div>

        </div>

        <div class="card">
            <div class="header bg-blue-grey">
                Resimler
            </div>
            <div class="body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Resim</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(!empty($images)):
                        foreach ($images as $image): ?>
                            <tr>
                                <td><?=  $image->id?></td>
                                <td><img style="max-height: 50px"
                                         src="<?php echo base_url("upload/$image->file")?>" alt=""></td>
                                <td>
                                    <a href="<?php echo base_url("aboutpage/imagedelete/$image->id")?>" type="button" class="btn btn-danger waves-effect btndelete">
                                        <i class="material-icons">delete</i>
                                        <span>Sil</span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach;
                    endif;?>

                    </tbody>
                </table>
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