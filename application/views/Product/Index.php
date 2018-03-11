<div class="block-header">
    <h2>Ürünler</h2>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue-grey">
                <h2>
                    Ürünler
                </h2>
            </div>
            <div class="body table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Resim</th>
                        <th>Ürün Adı</th>
                        <th>Kategori</th>
                        <th>En Çok Tercih Edilen</th>
                        <th>Trend Durumu</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($products as $item) : ?>
                        <tr>
                            <th scope="row"><?= $item->id ?></th>
                            <td><img src="<?php echo base_url("upload/product/".$item->image)?>" style="max-height: 60px" alt=""></td>
                            <td><?= $item->name ?></td>
                            <td><?= $item->categoryname ?></td>
                            <td>
                                <?= $item->fav == 1
                                    ? '<div class="switch">
                                            <label>OFF
                                            <input
                                             data-url="'.base_url("product/changefav/".$item->id."/0/").'" 
                                             type="checkbox" class="fav" checked="checked"><span class="lever"></span>ON</label>
                                        </div>'
                                    : '<div class="switch">
                                            <label>OFF
                                            <input 
                                            data-url="'.base_url("product/changefav/".$item->id."/1/").'"
                                            type="checkbox" class="fav"><span class="lever"></span>ON</label>
                                        </div>' ?>
                            </td>

                            <td>

                                <div class="btn-group">

                                    <?php
                                    $color = "btn-default";
                                    $text = "Trend Değil";
                                    if($item->trend != 0){
                                        $color = "btn-warning";
                                        $text = "Trend <b>" . $item->trend."</b>";
                                    }
                                        ?>
                                    <button type="button" class="btn <?php echo $color;?> dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <?php echo $text;?> <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url("product/changetrend/$item->id/0")?>" class=" waves-effect waves-block">Trend'den Kaldır</a></li>
                                        <li><a href="<?php echo base_url("product/changetrend/$item->id/1")?>" class=" waves-effect waves-block">Trend 1 Yap</a></li>
                                        <li><a href="<?php echo base_url("product/changetrend/$item->id/2")?>" class=" waves-effect waves-block">Trend 2 Yap</a></li>
                                        <li><a href="<?php echo base_url("product/changetrend/$item->id/3")?>" class=" waves-effect waves-block">Trend 3 Yap</a></li>
                                        <li><a href="<?php echo base_url("product/changetrend/$item->id/4")?>" class=" waves-effect waves-block">Trend 4 Yap</a></li>
                                    </ul>
                                </div>

                            </td>

                            <td style="text-align: right">

                                    <a href="<?php echo base_url("product/edit/$item->id")?>" type="button"  class="btn btn-primary waves-effect">
                                        <i class="material-icons">edit</i>
                                        <span>Düzenle</span>
                                    </a>

                                    <a href="<?php echo base_url("product/delete/$item->id")?>" type="button"  class="btn btn-danger waves-effect btndelete">
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
</div>

<script>
    $(function () {
        $('.fav').change(function () {
           window.location.href =  $(this).attr("data-url");
        });

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
