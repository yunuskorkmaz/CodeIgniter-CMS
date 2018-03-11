
<div class="row clearfix">
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue-grey">
                <h2>
                    Referanslar
                </h2>
            </div>
            <div class="body table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Şirket Adı</th>
                        <th>Kategori</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $users = array(); ?>
                    <?php foreach ($ref as $item) : ?>
                        <tr>
                            <th scope="row"><?= $item->id ?></th>
                            <td><?= $item->name; ?></td>
                            <td><?= $item->kategori ?></td>

                            <td style="text-align: right">


                                <a href="<?php echo base_url("settings/refedit/".$item->id)?>" type="button"  class="btn btn-primary waves-effect">
                                    <i class="material-icons">edit</i>
                                    <span>Düzenle</span>
                                </a>


                                    <a href="<?php echo base_url("settings/refdelete/".$item->id)?>" type="button"  class="btn btn-danger waves-effect btndelete">
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
                    Referans Ekle
                </h2>
            </div>
            <div class="body table-responsive">
                <form action="<?php echo base_url("settings/referance"); ?>" method="post">
                    <label for="name">Şirket Adı</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="name" class="form-control" placeholder="Ad ve Soyad Giriniz">
                        </div>
                    </div>



                    <label for="parent">Kategori</label>
                    <div class="form-group">
                        <div class="form-line">
                            <select required name="kategori" class="form-control">

                                <?php if(!empty($category_all)):?>
                                    <?php foreach ($category_all as $item):?>
                                        <option value="<?= $item->id ?>"><?= $item->name ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
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
