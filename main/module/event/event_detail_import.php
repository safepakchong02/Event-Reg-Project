<!-- import ctrl -->
<?
$ctrl_name = "event_detail_import_ctrl";
include("main/controller/$ctrl_name.php");
?>

<? if (isset($_GET["ev_id"])) { ?>
    <div class="container-fluid" ng-controller="<?= $ctrl_name ?>"><br>
        <!-- loading screen -->
        <? include("main/body/loading.php"); ?>
        <!-- end loading screen -->

        <!-- status success -->
        <? include("main/body/status_success.php"); ?>
        <!-- end status success -->

        <div class="row">
            <div class="col-1" style="width: 140px;">
                <a href="index.php?p=event&m=event_detail&ev_id=<?= $_GET["ev_id"] ?>" class="btn btn-primary"><i class="bi bi-caret-left-fill"></i>ย้อนกลับ</a>
            </div>
            <div class="col">
                <h1>นำเข้าข้อมูล</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <input type="file" id="importFile" class="form-control form-control-sm" />
            </div>
            <div class="col-4">
                <button id="import" type="button" ng-click="import()" class="btn btn-primary btn-sm"><i class="bi bi-person-plus-fill"></i> Import</button>
                <button id="reset" type="button" ng-click="reset()" class="btn btn-danger btn-sm ng-hide"><i class="bi bi-repeat"></i> รีเซ็ทการอัปโหลดไฟล์</button>
            </div>
        </div>
        <br>

        <!-----show table----->
        <div id="table" ng-hide="isInit">
            <table class="table nowrap" id="preview" style="width:100%">
                <thead>
                    <tr class="table-dark" id="colName"></tr>
                </thead>
            </table>
        </div>
        <br>

        <!-----เลือกtype----->
        <div class="container-fluid" id="convert" ng-hide="isInit"><br>
            <div class="row">
                <div class="col-4">ชื่อคอลัมน์ในไฟล์ที่อัปโหลด</div>
                <div class="col-8">แปลงเป็นชื่อที่เราระบุ</div>
            </div>
            <div id="convertCol">
            </div>
            <br>
            <div class="d-flex justify-content-end pb-2">
                <button ng-click="import_save()" type="button" class="btn btn-success btn-sm"></i>บันทึก</button>
            </div>
        </div>
    </div>
<? } else { ?>
    <meta http-equiv="refresh" content="0;url=index.php?p=event&m=dashboard">
<? } ?>