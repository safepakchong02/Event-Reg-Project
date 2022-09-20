<!-- import ctrl -->
<?
$ctrl_name = "event_dashboard_ctrl";
include("main/controller/$ctrl_name.php");
?>
<!-- เริ่ม dashboard -->
<div class="container-fluid" ng-controller="<?= $ctrl_name ?>"><br>
    <div class="row">
        <div class="col">
            <h1>รายการกิจกรรม</h1>
        </div>
    </div>
    <div class="row">
        <!-- แสดงข้อมูล -->
        <div class="table-responsive">
            <table datatable="ng" id="example" class="table nowrap" style="width:100%">
                <thead>
                    <tr class="table-dark">
                        <th>ไอดี</th>
                        <th>ชื่อกิจกรรม</th>
                        <th>สถานะลงทะเบียน</th>
                        <th>วันที่เปิดลงทะเบียน</th>
                        <th>วันที่ปิดลงทะเบียน</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="show_event_data in event_data" class="{{show_event_data.isOpen}}">
                        <td>{{show_event_data.ev_id}}</td> <!-- "ev_id" is name col -->
                        <td>{{show_event_data.ev_title}}</td>
                        <td>{{show_event_data.ev_status}}</td>
                        <td>{{show_event_data.ev_date_start}}</td>
                        <td>{{show_event_data.ev_date_end}}</td>
                        <td>
                            <a href="index.php?p=reg&m=reg_dashboard&ev_id={{show_event_data.ev_id}}" class="btn btn-primary btn-sm">Dashboard</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <script>
            $(document).ready(function() {
                var table = $('#example').DataTable({});
            });

            // var doc = document.querySelector("#example_wrapper > div:nth-child(2) > div");
            // doc.style.overflowX = "scroll";
        </script>
        <!-- จบการแสดงข้อมูล -->
    </div>
</div>
<!-- จบ dashboard -->