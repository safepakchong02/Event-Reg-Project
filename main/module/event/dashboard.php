<!-- import ctrl -->
<?
$ctrl_name = "events_manage_ctrl";
include("main/controller/$ctrl_name.php");
?>

<!-- เริ่ม dashboard -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12 pt-4" ng-controller="<?= $ctrl_name ?>">
            <h1>รายชื่อกิจกรรม</h1><br>
            <!-- เพิ่มข้อมูล -->
            <div class="d-flex justify-content-end pb-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-add">
                    <i class="bi bi-plus-circle"></i> เพิ่มกิจกรรม
                </button>
            </div>
            <? include("main/module/event/event_add.php"); ?>
            <!-- จบการเพิ่มข้อมูล -->
            <!-- แสดงข้อมูล -->
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
                    <tr ng-repeat="show_event_data in event_data" class="{{show_event_data.isOpen}}">
                        <? include("main/module/event/event_edit.php"); ?>
                        <td>{{show_event_data.ev_id}}</td> <!-- "ev_id" is name col -->
                        <td>{{show_event_data.ev_title}}</td>
                        <td>{{show_event_data.user_name}} {{show_event_data.user_surname}}</td>
                        <td>{{show_event_data.ev_status}}</td>
                        <td>{{show_event_data.ev_date_start}}</td>
                        <td>{{show_event_data.ev_date_end}}</td>
                        <td>
                            <a href="index.php?p=event&m=event_detail&id={{show_event_data.ev_id}}" class="btn btn-info btn-sm text-white">ข้อมูลผู้ลงทะเบียน</a>
                            <button ng-click="edit_event_view(show_event_data.ev_id)" class="btn btn-warning btn-sm">แก้ไข</button>
                            <button ng-click="delete_event(show_event_data.ev_id)" class="btn btn-danger btn-sm">ลบ</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <script>
                $(document).ready(function() {
                    var table = $('#example').DataTable({
                        // scrollX: true,
                    });
                });
            </script>
            <!-- จบการแสดงข้อมูล -->
        </div>
    </div>
</div>
<!-- จบ dashboard -->