<div class="row clearfix">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue-grey">
                <h2>
                    Kategori Düzenle
                </h2>
            </div>
            <div class="body table-responsive">
                <form action="<?php echo base_url("category/edit/$cat->id"); ?>" method="post">
                    <label for="name">Kategori Adı</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input value="<?php echo $cat->name;?>" type="text" name="name" class="form-control" placeholder="Kategori Adı Giriniz">
                        </div>
                    </div>
                    <label for="parent">Üst Kategori<small>Ana kategori ise seçmeyiniz</small></label>
                    <div class="form-group">
                        <div class="form-line">
                            <select  name="parent" class="form-control">
                                <option value="0">Üst Kategori</option>
                                <?php if(!empty($category_main)):?>
                                    <?php foreach ($category_main as $item):?>
                                        <option <?php
                                            if($cat->parent_id == $item->id){
                                                echo 'selected="selected"';
                                            }
                                        ?>
                                            value="<?= $item->id ?>"><?= $item->name ?></option>
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