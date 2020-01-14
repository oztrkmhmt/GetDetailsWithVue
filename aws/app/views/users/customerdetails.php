<?php require APPROOT . '/views/inc/header.php' ; ?>
<div id="wrapper">
    <!-- Sidebar -->
    <?php require APPROOT . '/views/inc/sidebar.php' ; ?>
    <?php
        if(isset($_SESSION['customerDetails']['errorMessage'])){ 
            Errors::WebServiceError($_SESSION['customerDetails']['errorMessage'],$_SESSION['customerDetails']['errorCode'],"dbError");
        }else{
    ?>
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <?php
                        echo("Müşteri Detayları");
                    ?>
                </div>
                <div class="card-body">
                    <?php
                     foreach($_SESSION['customerDetails']['adres_bilgisi'] as $key => $value){
                         $value;
                        }
                    ?>
                     <form>
                         <div class="float-left">
                         <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Kimlik Bilgileri</legend>
                                <div class="form-group">
                                    <label for="kimlikNoLbl" class="col-sm-10 col-form-label col-form-label-sm">Kimlik No:</label>
                                    <div class="col-sm-12">
                                    <input type="text" readonly class="form-control form-control-sm" id="kimlikNo" value="<?php echo($_SESSION['customerDetails']['kimlikNo']) ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="adiLbl" class="col-sm-10 col-form-label col-form-label-sm">Adı:</label>
                                    <div class="col-sm-12">
                                    <input type="text" readonly class="form-control form-control-sm" id="adi" value="<?php echo($_SESSION['customerDetails']['kimlik_bilgisi']['adi']) ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="soyadiLbl" class="col-sm-10 col-form-label col-form-label-sm">Soyadı:</label>
                                    <div class="col-sm-12">
                                    <input type="text" readonly class="form-control form-control-sm" id="soyadi" value="<?php echo($_SESSION['customerDetails']['kimlik_bilgisi']['soyadi']) ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="anneAdiLbl" class="col-sm-10 col-form-label col-form-label-sm">Anne Adı:</label>
                                    <div class="col-sm-12">
                                    <input type="text" readonly class="form-control form-control-sm" id="anneAdi" value="<?php echo($_SESSION['customerDetails']['kimlik_bilgisi']['anneAdi']) ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="babaAdiLbl" class="col-sm-10 col-form-label col-form-label-sm">Baba Adı:</label>
                                    <div class="col-sm-12">
                                    <input type="text" readonly class="form-control form-control-sm" id="babaAdi" value="<?php echo($_SESSION['customerDetails']['kimlik_bilgisi']['babaAdi']) ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="cinsiyetLbl" class="col-sm-10 col-form-label col-form-label-sm">Cinsiyeti:</label>
                                    <div class="col-sm-12">
                                    <input type="text" readonly class="form-control form-control-sm" id="cinsiyeti" value="<?php echo($_SESSION['customerDetails']['kimlik_bilgisi']['cinsiyeti']) ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dTarihLbl" class="col-sm-10 col-form-label col-form-label-sm">Doğum Tarihi:</label>
                                    <div class="col-sm-12">
                                    <input type="text" readonly class="form-control form-control-sm" id="dogumTarihi" value="<?php echo($_SESSION['customerDetails']['kimlik_bilgisi']['dogumTarihi']) ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dYeriLbl" class="col-sm-10 col-form-label col-form-label-sm">Doğum Yeri:</label>
                                    <div class="col-sm-12">
                                    <input type="text" readonly class="form-control form-control-sm" id="dogumYeri" value="<?php echo($_SESSION['customerDetails']['kimlik_bilgisi']['dogumYeri']) ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ilAdiLbl" class="col-sm-10 col-form-label col-form-label-sm">İl Adı:</label>
                                    <div class="col-sm-12">
                                    <input type="text" readonly class="form-control form-control-sm" id="ilAdi" value="<?php echo($_SESSION['customerDetails']['kimlik_bilgisi']['ilAdi']) ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ilKoduLbl" class="col-sm-10 col-form-label col-form-label-sm">İl Kodu:</label>
                                    <div class="col-sm-12">
                                    <input type="text" readonly class="form-control form-control-sm" id="ilKodu" value="<?php echo($_SESSION['customerDetails']['kimlik_bilgisi']['il_Kodu']) ?>">
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class = "vertical"></div> 
                         <div class="float-right">
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Adres Bilgileri</legend>
                                <div class="form-group">
                                    <label for="acikAdresLbl" class="col-sm-10 col-form-label col-form-label-sm">Açık Adres:</label>
                                    <div class="col-sm-12">
                                    <input type="text" readonly class="form-control form-control-sm" id="acikAdres" value="<?php echo($value['acikAdres']) ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="disKapiNoLbl" class="col-sm-10 col-form-label col-form-label-sm">Dış Kapı No:</label>
                                    <div class="col-sm-12">
                                    <input type="text" readonly class="form-control form-control-sm" id="disKapiNo" value="<?php echo($value['disKapiNo']) ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="icKapiNoLbl" class="col-sm-10 col-form-label col-form-label-sm">İç Kapı No:</label>
                                    <div class="col-sm-12">
                                    <input type="text" readonly class="form-control form-control-sm" id="icKapiNo" value="<?php echo($value['icKapiNo']) ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ilAdLbl" class="col-sm-10 col-form-label col-form-label-sm">İl Ad:</label>
                                    <div class="col-sm-12">
                                    <input type="text" readonly class="form-control form-control-sm" id="ilAd" value="<?php echo($value['ilAd']) ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ilKoduLbl" class="col-sm-10 col-form-label col-form-label-sm">İl Kodu:</label>
                                    <div class="col-sm-12">
                                    <input type="text" readonly class="form-control form-control-sm" id="ilKodu" value="<?php echo($value['ilKodu']) ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ilceAdLbl" class="col-sm-10 col-form-label col-form-label-sm">İlçe Ad:</label>
                                    <div class="col-sm-12">
                                    <input type="text" readonly class="form-control form-control-sm" id="ilceAd" value="<?php echo($value['ilceAd']) ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ilceKoduLbl" class="col-sm-10 col-form-label col-form-label-sm">İlçe Kodu:</label>
                                    <div class="col-sm-12">
                                    <input type="text" readonly class="form-control form-control-sm" id="ilceKodu" value="<?php echo($value['ilceKodu']) ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="MahalleLbl" class="col-sm-10 col-form-label col-form-label-sm">Mahalle:</label>
                                    <div class="col-sm-12">
                                    <input type="text" readonly class="form-control form-control-sm" id="mahalle" value="<?php echo($value['mahalle']) ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="MernisIlKoduLbl" class="col-sm-10 col-form-label col-form-label-sm">Mernis İl Kodu:</label>
                                    <div class="col-sm-12">
                                    <input type="text" readonly class="form-control form-control-sm" id="mernisIlKodu" value="<?php echo($value['mernisIlKodu']) ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="MernisIlceKoduLbl" class="col-sm-10 col-form-label col-form-label-sm">Mernis İlçe Kodu:</label>
                                    <div class="col-sm-12">
                                    <input type="text" readonly class="form-control form-control-sm" id="mernisIlceKodu" value="<?php echo($value['mernisIlceKodu']) ?>">
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php 
        }
    ?>
    <!-- /.content-wrapper -->
</div>
<?php require APPROOT . '/views/inc/footer.php' ; ?>
