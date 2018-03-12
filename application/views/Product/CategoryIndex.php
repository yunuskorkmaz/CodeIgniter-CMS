<div class="row clearfix">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header bg-blue-grey">
            <h2>
                Kategoriler
            </h2>
        </div>
        <div class="body table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Kategori Adi</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php


                ?>

                <?php if(!empty($category_all)): ?>
                    <?php foreach ($category_all as $item): ?>
                        <tr>
                            <td><?= $item->name ?></td>
                            <td style="text-align: right">
                                <a href="<?php echo base_url("category/edit/".$item->id)?>" type="button"  class="btn btn-primary waves-effect">
                                    <i class="material-icons">edit</i>
                                    <span>Düzenle</span>
                                </a>


                                <a href="<?php echo base_url("category/delete/".$item->id)?>" type="button"  class="btn btn-danger waves-effect btndelete">
                                    <i class="material-icons">delete</i>
                                    <span>Sil</span>
                                </a>
                            </td>
                        </tr>
                        <?php if(isset($item->subitems)): ?>
                           <?php foreach ($item->subitems as $subitem): ?>
                                <tr>
                                    <td ><i class="material-icons" style="font-size: 16px">subdirectory_arrow_right</i><?= $subitem->name ?></td>
                                    <td style="text-align: right">
                                        <a href="<?php echo base_url("category/edit/".$subitem->id)?>" type="button"  class="btn btn-primary waves-effect">
                                            <i class="material-icons">edit</i>
                                            <span>Düzenle</span>
                                        </a>


                                        <a href="<?php echo base_url("category/delete/".$subitem->id)?>" type="button"  class="btn btn-danger waves-effect btndelete">
                                            <i class="material-icons">delete</i>
                                            <span>Sil</span>
                                        </a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

        <div class="card">
            <div class="header bg-blue-grey">
                <h2>
                    Kategori Ekle
                </h2>
            </div>
            <div class="body table-responsive">
                <form action="<?php echo base_url("product/addCategory"); ?>" method="post">
                    <label for="name">Kategori Adı</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="name" class="form-control" placeholder="Kategori Adı Giriniz">
                        </div>
                    </div>
                    <label for="parent">Üst Kategori<small>Ana kategori ise seçmeyiniz</small></label>
                    <div class="form-group">
                        <div class="form-line">
                            <select  name="parent" class="form-control">
                                <option value="0">Üst Kategori</option>
                                <?php if(!empty($category_main)):?>
                                    <?php foreach ($category_main as $item):?>
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