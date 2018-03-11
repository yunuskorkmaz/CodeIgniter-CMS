<div class="row clearfix">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue-grey">
                <h2>
                    Referans Düzenle
                </h2>
            </div>
            <div class="body table-responsive">
                <form action="<?php echo base_url("settings/refedit/".$ref->id); ?>" method="post">
                    <label for="name">Adı Soyadı</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input value="<?php echo $ref->name?>" type="text" name="name" class="form-control" placeholder="Ad ve Soyad Giriniz">
                        </div>
                    </div>
                    <label for="parent">Kategori</label>
                    <div class="form-group">
                        <div class="form-line">
                            <select required name="kategori" class="form-control">

                                <?php if(!empty($category_all)):?>
                                    <?php foreach ($category_all as $item):?>
                                        <option <?php if($ref->category_id == $item->id) echo 'selected="selected"';?> value="<?= $item->id ?>"><?= $item->name ?></option>
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