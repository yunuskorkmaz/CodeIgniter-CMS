<div class="block-header">
    <h2>Ürünler</h2>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue-grey">
                <h2>
                    Ürün Ekle
                </h2>
            </div>
            <div class="body table-responsive">

                <?php
                if (@isset($result) and !empty($result["error"])) {
                    echo '<div class="alert alert-danger">' . $result["error"] . '</div>';
                }
                ?>

                <form action="<?php echo base_url("product/editProduct/$urun->id") ?>" method="post"
                      enctype="multipart/form-data">
                    <label for="adi">Ürün Adı</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input required type="text" value="<?php echo $urun->name; ?>" name="adi"
                                   class="form-control" placeholder="Ürün Adı Giriniz">
                        </div>
                    </div>

                    <label for="kod">Ürün Kodu</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="kod" value="<?php echo $urun->code; ?>" class="form-control"
                                   placeholder="Ürün Kodu Giriniz">
                        </div>
                    </div>

                    <label for="parent">Kategori</label>
                    <div class="form-group">
                        <div class="form-line">
                            <select required name="parent" class="form-control">
                                <option value="">Kategori</option>
                                <?php if (!empty($category_all)): ?>
                                    <?php foreach ($category_all as $item): ?>
                                        <option <?php echo $urun->category == $item->id ? 'selected' : '' ?>
                                                value="<?= $item->id ?>"><?= $item->name ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <div class="form-line">
                                    <input <?php echo $urun->stock == 1 ? 'checked="checked"' : '' ?> type="checkbox"
                                                                                                      name="stok"
                                                                                                      id="stok"
                                                                                                      class="filled-in">
                                    <label for="stok">Stok Durumu</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <div class="form-line">
                                    <input <?php echo $urun->fav == 1 ? 'checked="checked"' : '' ?> type="checkbox"
                                                                                                    name="tercih"
                                                                                                    id="tercih"
                                                                                                    class="filled-in">
                                    <label for="tercih">Tercih edilen Ürün</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="trend">Trend Sırası</label>
                                    <select name="trend" id="trend" class="">
                                        <option <?php $urun->trend == 0 ? 'selected' : ''; ?> value="0">Trend Değil
                                        </option>
                                        <?php
                                        for ($i = 1; $i <= 4; $i++) {
                                            $selected = $urun->trend == $i ? 'selected="selected"' : '';
                                            echo '<option ' . $selected . '" value="' . $i . '" >Trend ' . $i . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-3">
                            <img class="img-responsive" style="max-height: 150px;" src="<?php echo base_url("upload/product/$urun->image")?>"/>
                        </div>
                        <div class="col-lg-7">

                                <label for="image">Fotograf
                                    <small>(Seçilmediği taktirde eski fotograf kalır.)</small>
                                </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>


                        </div>

                    </div>


                    <label for="aciklama">Ürün Açıklaması</label>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea name="aciklama" class="form-control no-resize" rows="8"
                                      placeholder="Ürün Açıklaması Giriniz"><?php echo $urun->descreption ?></textarea>
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
                            <textarea name="seo_desc" class="form-control no-resize"
                                      placeholder="Arama Motoru İçin Açıklama Giriniz"><?php echo $urun->seo_desc ?></textarea>
                        </div>
                    </div>
                    <label for="seo_keyw">Arama Motoru Anahtar Kelimeleri (Aralarına virgül "," koyarak yazınız
                        )</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input value="<?php echo $urun->seo_keyw ?>" type="text" name="seo_keyw"
                                   class="form-control" placeholder="Arama Motoru İçin Anahtar Kelime Giriniz"/>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Kaydet</button>
                </form>
            </div>
        </div>
    </div>

</div>


