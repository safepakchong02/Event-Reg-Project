<!-- import ctrl -->
<?
$ctrl_name = "reg_search_ctrl";
include("main/controller/$ctrl_name.php");

if (!isset($_GET["ev_id"])) { ?>
    <meta http-equiv="refresh" content="0;url=index.php?p=reg&m=event_dashboard">
<? } ?>

<div class="container-fluid" ng-controller="<?= $ctrl_name ?>"><br>
    <div class="row">
        <div class="col">
            <h1>ชื่อกิจกรรม: {{event_data[0].ev_title}}</h1>
            <h3>วันที่/เวลา: {{event_data[0].ev_date_start}} ถึง {{event_data[0].ev_date_end}}</h3>
        </div>
    </div>
    <div class="container pb-3"><br>
        <div class="row">
            <div class="col-md-4">
                <h3>ค้นหาข้อมูล</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 pb-3" ng-show="check.emp_id">
                        <div class="form-group">
                            <label>รหัสพนักงาน :</label>
                            <input type="search" onkeyup="filterColumn(0, this.value)" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" />
                        </div>
                    </div>
                    <div class="col-md-4 pb-3" ng-show="check.card_id">
                        <div class="form-group">
                            <label>บัตรประชาชน :</label>
                            <input type="search" onkeyup="filterColumn(1, this.value)" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" />
                        </div>
                    </div>
                    <div class="col-md-4 pb-3" ng-show="check.name">
                        <div class="form-group">
                            <label>ชื่อ-นามสกุล :</label>
                            <input type="search" onkeyup="filterColumn(2, this.value)" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" />
                        </div>
                    </div>
                    <div class="col-md-4 pb-3" ng-show="check.com_name">
                        <div class="form-group">
                            <label>ชื่อบริษัท :</label>
                            <input type="search" onkeyup="filterColumn(4, this.value)" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" />
                        </div>
                    </div>
                    <div class="col-md-4 pb-3" ng-show="check.dep">
                        <div class="form-group">
                            <label>แผนก :</label>
                            <input type="search" onkeyup="filterColumn(5, this.value)" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" />
                        </div>
                    </div>
                    <div class="col-md-4 pb-3" ng-show="check.pos">
                        <div class="form-group">
                            <label>ตำแหน่ง :</label>
                            <input type="search" onkeyup="filterColumn(6, this.value)" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" />
                        </div>
                    </div>
                    <div class="col-md-4 pb-3" ng-show="check.gender">
                        <div class="form-group">
                            <label>เพศ :</label>
                            <select class="form-control" onchange="filterColumn(8, this.value)">
                                <option value="none">---ไม่ระบุข้อมูล---</option>
                                <option value="male">ชาย</option>
                                <option value="gender">หญิง</option>
                                <option value="optional">เพศทางเลือก</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 pb-3">
                        <div class="form-group">
                            <label>สถานะการลงทะเบียน :</label>
                            <select class="form-control" id="select-country">
                                <option value="">---ไม่ระบุข้อมูล---</option>
                                <option value="true">เข้าร่วม</option>
                                <option value="false">ไม่เข้าร่วม</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 pb-3">
                        <div class="form-group">
                            <label>วันที่เข้ากิจกรรม :</label>
                            <input type="search" onkeyup="filterColumn(11, this.value)" class="form-control rounded" placeholder="dd/mm/yyyy hh:mm หรือ hh:mm" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer"><br>
                <button type="button" class="btn btn-success btn-sm" ng-click="Export()"><i class="bi bi-file-earmark-excel-fill"></i> Export Excel</button>
            </div>
        </div>
    </div>
    <div class="pb-3">
        <span class="h3">รายชื่อผู้ลงทะเบียน</span>
    </div>
    <table datatable="ng" id="example" class="table nowrap" style="width:100%">
        <thead>
            <tr class="table-dark">
                <th ng-show="check.emp_id">รหัสพนักงาน</th>
                <th ng-show="check.card_id">รหัสบัตรประชาชน</th>
                <th ng-show="check.name">ชื่อ - สกุล</th>
                <th ng-show="check.call">เบอร์โทรศัพท์</th>
                <th ng-show="check.com_name">ชื่อบริษัท</th>
                <th ng-show="check.dep">แผนก</th>
                <th ng-show="check.pos">ตำแหน่ง</th>
                <th ng-show="check.salary">เงินเดือน</th>
                <th ng-show="check.gender">เพศ</th>
                <th ng-show="check.age">อายุ</th>
                <th ng-show="check.birthDate">วันเกิด</th>
                <th>วันที่เข้าร่วมกิจกรรม</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="row in data_table">
                <td ng-show="check.emp_id">{{row.emp_id}}</td>
                <td ng-show="check.card_id">{{row.card_id}}</td>
                <td ng-show="check.name">{{row.name}}</td>
                <td ng-show="check.call">{{row.call}}</td>
                <td ng-show="check.com_name">{{row.com_name}}</td>
                <td ng-show="check.dep">{{row.dep}}</td>
                <td ng-show="check.pos">{{row.pos}}</td>
                <td ng-show="check.salary">{{row.salary}}</td>
                <td ng-show="check.gender">{{row.gender}}</td>
                <td ng-show="check.age">{{row.age}}</td>
                <td ng-show="check.birthDate">{{row.birthDate}}</td>
                <td>{{row.reg_date}}</td>
                <td>
                    <button ng-click="edit_reg_view({{row.id}})" class="btn btn-warning btn-sm">แก้ไข</button>
                    <button ng-click="del_reg_({{row.id}})" class="btn btn-danger btn-sm">ลบ</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<script>
    function filterColumn(col, key) {
        $('#example')
            .DataTable()
            .column(col)
            .search(key)
            .draw();
    }

    $(document).ready(function() {
        var table = $('#example').DataTable({
            scrollX: true,
        });
    });
</script>
</div>