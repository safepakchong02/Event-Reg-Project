<div class="container-fluid"><br>
    <div class="row">
        <div class="col">
            <h1>รายการกิจกรรม</h1>
        </div>
    </div>
    <div class="row">
        <!-- แสดงข้อมูล -->
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
                        <button ng-click="delete_event(show_event_data.ev_id)" class="btn btn-primary btn-sm">Dashboard</button>
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