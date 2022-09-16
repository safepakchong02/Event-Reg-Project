<!-- import ctrl -->
<?
$ctrl_name = "reg_search_ctrl";
include("main/controller/$ctrl_name.php");

if (!isset($_GET["ev_id"])) { ?>
    <meta http-equiv="refresh" content="0;url=index.php?p=reg&m=event_dashboard">
<? } ?>
<!-- status success -->
<? include("main/body/status_reg_success.php"); ?>
<!-- end status success -->

<!-- content -->
<div class="container-fluid" ng-controller="<?= $ctrl_name ?>"><br>
    <!-- header -->
    <div class="row">
        <div class="col">
            <h1>ชื่อกิจกรรม: {{event_data[0].ev_title}}</h1>
            <h3>วันที่/เวลา: {{event_data[0].ev_date_start}} ถึง {{event_data[0].ev_date_end}}</h3>
        </div>
    </div>
    <!-- end header -->

    <!-- search key -->
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
                            <input type="search" onkeyup="searchColumn(0, this.value)" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" />
                        </div>
                    </div>
                    <div class="col-md-4 pb-3" ng-show="check.card_id">
                        <div class="form-group">
                            <label>บัตรประชาชน :</label>
                            <input type="search" onkeyup="searchColumn(1, this.value)" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" />
                        </div>
                    </div>
                    <div class="col-md-4 pb-3" ng-show="check.name">
                        <div class="form-group">
                            <label>ชื่อ-นามสกุล :</label>
                            <input type="search" onkeyup="searchColumn(2, this.value)" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" />
                        </div>
                    </div>
                    <div class="col-md-4 pb-3" ng-show="check.com_name">
                        <div class="form-group">
                            <label>ชื่อบริษัท :</label>
                            <input type="search" onkeyup="searchColumn(4, this.value)" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" />
                        </div>
                    </div>
                    <div class="col-md-4 pb-3" ng-show="check.dep">
                        <div class="form-group">
                            <label>แผนก :</label>
                            <input type="search" onkeyup="searchColumn(5, this.value)" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" />
                        </div>
                    </div>
                    <div class="col-md-4 pb-3" ng-show="check.pos">
                        <div class="form-group">
                            <label>ตำแหน่ง :</label>
                            <input type="search" onkeyup="searchColumn(6, this.value)" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" />
                        </div>
                    </div>
                    <div class="col-md-4 pb-3" ng-show="check.gender">
                        <div class="form-group">
                            <label>เพศ :</label>
                            <select class="form-control" onchange="searchColumn(8, this.value)">
                                <option value="">---ไม่ระบุข้อมูล---</option>
                                <option value="ชาย">ชาย</option>
                                <option value="หญิง">หญิง</option>
                                <option value="ทางเลือก">เพศทางเลือก</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 pb-3">
                        <div class="form-group">
                            <label>สถานะการลงทะเบียน :</label>
                            <select class="form-control" onchange="searchColumn(11, this.value)">
                                <option value="">---ไม่ระบุข้อมูล---</option>
                                <option value="/">เข้าร่วม</option>
                                <option value="-">ไม่เข้าร่วม</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 pb-3">
                        <div class="form-group">
                            <label>วันที่เข้ากิจกรรม :</label>
                            <input type="search" onkeyup="searchColumn(11, this.value)" class="form-control rounded" placeholder="dd/mm/yyyy hh:mm หรือ hh:mm" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer"><br>
                <button type="button" class="btn btn-success btn-sm" ng-click="Export()"><i class="bi bi-file-earmark-excel-fill"></i> Export Excel</button>
            </div>
        </div>
    </div>
    <!-- end search key -->

    <div class="pb-3">
        <span class="h3">รายชื่อผู้ลงทะเบียน</span>
    </div>

    <!-- data table -->
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
                <th ng-show="check.salary">ลำดับที่</th>
                <th ng-show="check.gender">เพศ</th>
                <th ng-show="check.age">อายุ</th>
                <th ng-show="check.birthDate">วันเกิด</th>
                <th>วันที่เข้าร่วมกิจกรรม</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="row in data_table">
                <? include("main/module/event/event_detail_edit.php"); ?>
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
                <td>{{checkReg(row.reg_date)}}</td>
                <td>
                    <button type="button" ng-click="reset_reg(row.id)" class="btn btn-primary btn-sm">รีเซ็ทการลงทะเบียน</button>
                    <button type="button" ng-click="edit_reg_view(row.id)" data-bs-toggle="modal" data-bs-target="#modal-detail_edit" class="btn btn-warning btn-sm">แก้ไข</button>
                    <button type="button" ng-click="del_reg(row.id)" class="btn btn-danger btn-sm">ลบ</button>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- end data table -->
</div>
<!-- end content -->
<!-- script built in -->
<script>
    function searchColumn(col, key) {
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
<!-- end script built in -->