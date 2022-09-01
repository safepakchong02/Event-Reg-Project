<!-- import ctrl -->
<?
$ctrl_name = "event_detail_import_ctrl";
include("main/controller/$ctrl_name.php");
?>

<? if (isset($_GET["ev_id"])) { ?>
    <div class="container-fluid"><br>
        <div class="row">
            <div class="col-1" style="width: 140px;">
                <a href="index.php?p=event&m=event_detail&ev_id=<?= $_GET["ev_id"] ?>" class="btn btn-primary"><i class="bi bi-caret-left-fill"></i>ย้อนกลับ</a>
            </div>
            <div class="col">
                <h1>นำเข้าข้อมูล</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-3" style="width:13%;">
                <label>Upload File :</label>
            </div>
            <div class="col-8">
                <input class="form-control form-control-sm" id="formFileSm" type="file">
            </div>
            <div class="col">
                <button type="button" class="btn btn-primary btn-sm"><i class="bi bi-person-plus-fill"></i> Import</button>
            </div>
        </div>
        <br>
        <!-----show table----->
        <table datatable="ng" id="example" class="table nowrap" style="width:100%">
            <thead>
                <tr class="table-dark">
                    <th>ไอดี</th>
                    <th>ชื่อกิจกรรม</th>
                    <th>เจ้าหน้าที่ลงทะเบียน</th>
                    <th>สถานะลงทะเบียน</th>
                    <th>วันที่เปิดลงทะเบียน</th>
                    <th>วันที่ปิดลงทะเบียน</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="show_event_data in event_data">
                    <? include("main/module/event/event_edit.php"); ?>
                    <td>{{show_event_data.ev_id}}</td> <!-- "ev_id" is name col -->
                    <td>{{show_event_data.ev_title}}</td>
                    <td>{{show_event_data.user_name}} {{show_event_data.user_surname}}</td>
                    <td>{{show_event_data.ev_status}}</td>
                    <td>{{show_event_data.ev_date_start}}</td>
                    <td>{{show_event_data.ev_date_end}}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <!-----เลือกtype----->
        <div class="col-8">
            <input type="text" ng-model="edit_ev_title" name="edit_ev_title" class="form-control" required>
        </div>


        <script>
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    scrollX: true,
                });
            });
        </script>
    </div>
<? } else { ?>
    <meta http-equiv="refresh" content="0;url=index.php?p=event&m=dashboard">
<? } ?>