<?php 
use app\common\services\UrlService;
use app\common\services\ConstantMapService;
use \app\common\services\StaticService;

StaticService::includeAppJsStatic('/js/web/brand/image.js', app\assets\WebAsset::className() );

?>
<?=  \Yii::$app->view->renderFile('@app/modules/web/views/common/tab_brand.php',['current'=>'images']);?>

<div class="row">
    <div class="col-lg-12">
        <div class="row m-t">
            <div class="col-lg-12">
                <a class="btn btn-w-m btn-outline btn-primary pull-right set_pic" href="javascript:void(0);">
                    <i class="fa fa-plus"></i>图片
                </a>
            </div>
        </div>
        <table class="table table-bordered m-t">
            <thead>
            <tr>
                <th>图片（16:9）</th>
                <th>大图地址</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if($image_info) {?>
                <?php foreach($image_info as $val) {?>
            <tr>
                <td>
                    <img src="<?= UrlService::buildImgUrl('brand',$val['image_key']) ?>"
                         style="width: 100px;height: 100px;"/>
                </td> 
                <td>
                    <a target="_blank" href="<?= UrlService::buildImgUrl('brand',$val['image_key']) ?>">查看大图</a>
                </td>
                <td>
                    <a class="m-l remove" href="javascript:void(0);" data="<?= $val['id'] ?>">
                        <i class="fa fa-trash fa-lg"></i>
                    </a>
                </td>
            </tr>
            <?php } }else{?>
            <tr><td colspan="3">暂无数据</td></tr>
            <?php } ?>
            
            </tbody>
        </table>
    </div>
</div>



<div class="modal fade" id="brand_image_wrap" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">上传图片</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-10">
                        <form class="upload_pic_wrap" target="upload_file" enctype="multipart/form-data" method="POST" action="<?=UrlService::buildWebUrl("/upload/pic");?>">
                            <div class="upload_wrap pull-left">
                                <i class="fa fa-upload fa-2x"></i>
                                <input type="hidden" name="bucket" value="brand" />
                                <input type="file" name="pic" accept="image/png, image/jpeg, image/jpg,image/gif">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary save">保存</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<iframe name="upload_file" class="hide"></iframe>