<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use app\modules\buyer\models\TblPostRequest;
use app\modules\seller\models\TblResponse;
use app\modules\seller\models\TblSeller;
use app\models\TblCategory;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
$user_id = Yii::$app->user->id;
$sellerRs = Yii::$app->user->identity->seller;
$category_id = json_decode($sellerRs->category_id,true);


$base_url =  Url::base(true);

?>
<div class="leads_page">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="left_section">

                    <div class="row">
                        <div class="col-sm-12">
                            <div style="background:#d9f5c3;padding:10px;border-radius: 6px;color:#e5e5ee5">
                                <span id="lead-count"></span> leads matching your
                                <?php echo Html::a('Lead Settings',['/seller/settings/profile'],['style' => 'color:#57AF04'])?>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="row d-flex align-items-center">
                        <div class="col-sm-8">

                            Showing all <span id="filter-lead-count"></span> leads
                            <div class="text-muted fs-6">
                                Updated just now Refresh

                            </div>




                        </div>

                        <div class="col-sm-4 text-end">
                            <l class="fa fa-filter"></l>
                            <a data-bs-toggle="offcanvas" href="#offcanvasFilter" role="button"
                                aria-controls="offcanvasExample">
                                Filter
                            </a>

                        </div>
                        <?php echo $this->render('filter',['sellerRs' => $sellerRs]);?>
                    </div>
                    <hr>

                    <div id="lead-list"></div>
                </div>
            </div>

            <div class="col-sm-8 p_mob_0">
                <div class="right_section">
                    <?php 
							
							$profile_per_value = 1;
							if($sellerRs->brief != ""){
								$profile_per_value = $profile_per_value + 1;
							}
							if($sellerRs->twitter != ""){
								$profile_per_value = $profile_per_value + 1;
							}

							if($sellerRs->facebook != ""){
								$profile_per_value = $profile_per_value + 1;
							}

							$profile_per = ($profile_per_value / 3) * 100;
							$profile_per = round($profile_per);

							if($profile_per > 100){
								$profile_per = 100;
							}

							
						?>
/* 
  Samuel's Changes =====================================================
*/
					
                    <div class="profile_bg_section d-sm-block" id="position-fixed">
                        <div class="img_section" id="img-R">

                            <?php echo Yii::$app->common->showImageSeller($sellerRs->profile_pic,'81',$sellerRs->full_name);?>
                        </div>
                        <div id="image-fixed">
							<div class="credit_number_text">
								<a href="#">You have <?php echo \Yii::$app->common->creditBalance();?> credits</a>
							</div>
							<?php 
								echo Html::a('Top Up Credits',['/seller/credit/buy-credit'],['class' => 'btn']);
							?>
						</div>
/* 
  Samuel's Changes =====================================================
*/
                        <?php if($profile_per < 100){?>
                        <div class="text_section">
                            <h2><?php echo \Yii::t('app', 'Complete your profile');?></h2>
                            <p><?php echo \Yii::t('app', 'Your Profile is ' . $profile_per . '% Complete. Please complete the profile');?>
                            </p>

                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar"
                                    style="width: <?php echo $profile_per;?>%" aria-valuenow="25" aria-valuemin="0"
                                    aria-valuemax="100"><?php echo $profile_per;?>%</div>
                            </div>
                            <br>
                            <div style="color:white;
								font-size: 18px;
							">click <?php echo Html::a('here',['/seller/settings/profile']);?> to complete your profile</div>
                        </div>
                        <?php }?>
                    </div>
                    <div class=" d-sm-none d-md-none d-lg-none" style="padding:5px">
                        <a href="javascript:void()" onclick="showDetail()"><i class="fa fa-arrow-left"></i> Back to
                            list</a>
                    </div>
                    <div class="profile_bg_section d-sm-none d-md-none d-lg-none">
                        <div class="img_section" id="img-R">
                            <div>
                                <?php echo Yii::$app->common->showImageSeller($sellerRs->profile_pic,'81',$sellerRs->full_name);?>
                            </div>

                            <?php if($profile_per < 100){?>
                            <div class="text_section">
                                <h2><?php echo \Yii::t('app', 'Complete your profile');?></h2>
                                <p><?php echo \Yii::t('app', 'Your Profile is 20% Complete. Please complete the profile');?>
                                </p>


                                <br>
                                <div style="color:white;
								font-size: 18px;
							">click <?php echo Html::a('here',['/seller/settings/profile']);?> to complete your profile</div>
                            </div>
                            <?php  }?>

                        </div>

                        <div class="text_section">
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 20%"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">20%</div>
                            </div>
                        </div>
                    </div>

                    <div id="detail-data">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(function() {
    loadList();
})

function loadList() {

    name = ""
    if ($('#name').val() != "") {
        name = $('#name').val();
    }

    category_id = []
    $("input[name=category_id]:checked").each(function() {
        category_id.push($(this).val());
    });
    category_id = category_id.join(',')

    location_id = $("input[name=location]:checked").val();
    url =
        '<?php echo Url::toRoute(['/seller/dashboard/lead-list','name' => 'xname','sel_category_id' => 'xcategory_id','location_id' => 'xlocation'])?>';
    url = url.replace('xname', name)

    url = url.replace('xcategory_id', encodeURI(category_id))
    url = url.replace('xlocation', encodeURI(location_id))


    $('#lead-list').html("Loading..")
    $('#lead-list').load(url, function() {

    })
}

function loadDetailMob(id) {
    $('.left_data_section').hide();

    url = '<?php echo Url::toRoute(['/seller/dashboard/detail','id' => 'xid']);?>';
    url = url.replace('xid', id);
    $('#detail-data').load(url);
}

function showDetail() {
    $('.left_data_section').show();
}

function loadDetail(id) {




    url = '<?php echo Url::toRoute(['/seller/dashboard/detail','id' => 'xid']);?>';
    url = url.replace('xid', id);
    $('#detail-data').load(url);
}

function meSearch() {
    name = $('#name').val();
    category_id = $('#category_id').val()
    url =
        "<?php echo Url::toRoute(['/seller/dashboard/leads','name' => 'xname','sel_category_id' => 'xcategory_id']);?>"
    url = url.replace('xname', name);
    url = url.replace('xcategory_id', category_id);
    document.location.href = url;
}
</script>