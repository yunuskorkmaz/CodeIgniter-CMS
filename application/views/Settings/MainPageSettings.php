<div class="row clearfix">
    <div class="col-lg-6">
        <div class="card">
            <div class="header bg-blue-grey">
                <h2>Trend Ayarları</h2>
            </div>
            <div class="body">
                <form action="<?php echo base_url("settings/editTrendText") ?>" method="post">
                    <label for="trendtitle">Trend Ürünler Yazı Başlığı</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="trendtitle" id="trendtitle" value="<?php echo $trendtitle;?>" class="form-control" placeholder="Trend Ürünler Yazı">
                        </div>
                    </div>
                    <label for="trendtext">Trend Ürünler Yazı Metni</label>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea class="form-control no-resize" name="trendtext" id="trenttext"
                                      rows="4"><?php echo $trendtext;?></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="header bg-blue-grey">
                <h2>Footer Metini</h2>
            </div>
            <div class="body">
                <form action="<?php echo base_url("settings/editFooter") ?>" method="post">
                    <label for="footer">Trend Ürünler Yazı Metni</label>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea name="footer" id="footer" class="form-control no-resize"
                                      rows="4"><?php echo $footertext;?></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Kaydet</button>
                </form>
            </div>
        </div>
    </div>

</div>