<?php require APPROOT . '/views/inc/header.php' ; ?>
<?php require APPROOT .'/controllers/Components.php'; ?>
<div id="wrapper">

    <!-- Sidebar -->
    <?php require APPROOT . '/views/inc/sidebar.php' ; ?>
    <?php
        if(isset($_SESSION['productDetail']['errorMessage'])){ 
            Errors::WebServiceError($_SESSION['productDetail']['errorMessage'],$_SESSION['productDetail']['errorCode'],"dbError");
        }else{
        ?>
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Header-->
            <div class="card mb-3">
                <div class="card-header">
                    <?php
                        echo("Atlas Web Servis Ürün Detayları");
                    ?>
                </div>
                <!-- Show Product Detail-->
                <div class="card-body">
                    <form id="app" class="needs-validation" method="post" novalidate>
                        <v-row>
                            <template v-for="(item, index) in mydata[0].tarife_ist">
                                <v-col v-if="item.is_readonly == 0" cols="12" md="3">
                                    <label v-text="item.ist_adi"></label>
                                    <span v-for="(option,index) in item.ist_deger_tab"> </span>
                                    <select class="custom-select custom-select-sm" :name="item.ist_kod" v-if="item.is_editable == 0" v-model="item.def_deger_adi" :required="item.is_required == 1">
                                        <option v-for="slc_opt in item.ist_deger_tab" v-bind:value="slc_opt.deger_adi" >{{ slc_opt.deger_adi }}</option>
                                    </select>
                                    <b-select class="custom-select custom-select-sm deger_adi" :name="item.ist_kod" data-toggle="popover" data-trigger="focus" data-content="Bu alana manuel olarak değer girebilirsiniz!" v-if="(item.is_readonly == 0) && (item.is_editable == 1)" :value ="item.def_deger_adi" :required="item.is_required == 1">
                                        <option v-for="slc_opt in item.ist_deger_tab" v-bind:value="slc_opt.deger_adi" >{{ slc_opt.deger_adi }}</option> 
                                    </b-select>
                                </v-col>
                            </template>
                        </v-row>
                        <v-row class="form-group">
                            <div class="form-group col-md-2">
                                <label></label>
                                <button class="btn btn-primary" type="submit">Git</button>
                            </div>
                        </v-row>
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
<script type="text/javascript">

    var app = new Vue({
    el:'#app',
    data: function(){
        return {
            mydata: [],
        }
        },
        created() {
            this.getData();
        },
        methods: {
        getData: function(){
             let vardata = <?php echo json_encode($_SESSION['productDetail']) ?> 
             this.mydata.push(vardata);
             console.log(this.mydata);
        },
    }
 });


 $('.deger_adi').editableSelect();
 
 $(function () {
  $('[data-toggle="popover"]').popover()
})

</script>







