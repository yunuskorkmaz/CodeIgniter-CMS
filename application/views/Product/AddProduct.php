<div class="block-header">
    <h2>Ürünler</h2>
</div>
<div class="row clearfix">
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue-grey">
                <h2>
                    Ürün Ekle
                </h2>
            </div>
            <div class="body table-responsive">

                <?php
                 if(@isset($result) and !empty($result["error"])){
                     echo '<div class="alert alert-danger">'.$result["error"].'</div>';
                 }
                ?>

                <form action="<?php echo base_url("product/addProduct")?>" method="post" enctype="multipart/form-data">
                    <label for="adi">Ürün Adı</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input required type="text" name="adi" class="form-control" placeholder="Ürün Adı Giriniz">
                        </div>
                    </div>

                    <label for="kod">Ürün Kodu</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input  type="text" name="kod" class="form-control" placeholder="Ürün Kodu Giriniz">
                        </div>
                    </div>

                    <label for="parent">Kategori</label>
                    <div class="form-group">
                        <div class="form-line">
                            <select required name="parent" class="form-control">
                                <option value="">Kategori</option>
                                <?php if(!empty($category_all)):?>
                                    <?php foreach ($category_all as $item):?>
                                        <option value="<?= $item->id ?>"><?= $item->name ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <div class="form-line">
                                    <input checked="checked" type="checkbox" name="stok" id="stok" class="filled-in">
                                    <label for="stok">Stok Durumu</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="checkbox" name="tercih" id="tercih" class="filled-in">
                                    <label for="tercih">Tercih edilen Ürün</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="trend">Trend Sırası</label>
                                    <select name="trend" id="trend" class="">
                                        <option value="0">Trend Değil</option>
                                        <option value="1">Trend 1</option>
                                        <option value="2">Trend 2</option>
                                        <option value="3">Trend 3</option>
                                        <option value="4">Trend 4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <label for="image">Fotograf</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input required type="file" name="image" class="form-control">
                        </div>
                    </div>

                    <label for="aciklama">Ürün Açıklaması</label>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea  name="aciklama" class="form-control no-resize" rows="8" placeholder="Ürün Açıklaması Giriniz"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="bg-blue-grey" style="padding: 10px;">Arama Motoru Bilgileri</h4>
                        </div>
                    </div>
                    <label for="seo_desc">Arama Motoru İçn Açıklama</label>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea name="seo_desc" class="form-control no-resize" placeholder="Arama Motoru İçin Açıklama Giriniz"></textarea>
                        </div>
                    </div>
                    <label for="seo_keyw">Arama Motoru Anahtar Kelimeleri (Aralarına virgül "," koyarak yazınız )</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="seo_keyw" class="form-control" placeholder="Arama Motoru İçin Anahtar Kelime Giriniz"/>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
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
                                            <td></td>
                                        </tr>
                                <?php endforeach; ?>
                            <?php endif;?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>


