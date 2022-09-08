<!-- import ctrl -->
<?
$ctrl_name = "reg_register_ctrl";
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
    </div><br>

    <div class="container"><br>
        <table class="table">
            <thead>
                <tr>
                    <div class="col-4">
                        <div class="col">
                            <h3>ค้นหาข้อมูล</h3>
                        </div>
                    </div>
                </tr>
                <tr>
                    <td>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>รหัสพนักงาน :</label>
                                        <input type="search" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" aria-label="Search" aria-describedby="search-addon" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>บัตรประชาชน :</label>
                                        <input type="search" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" aria-label="Search" aria-describedby="search-addon" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>ชื่อ-นามสกุล :</label>
                                        <input type="search" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" aria-label="Search" aria-describedby="search-addon" />
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>ชื่อบริษัท :</label>
                                        <input type="search" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" aria-label="Search" aria-describedby="search-addon" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>แผนก :</label>
                                        <input type="search" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" aria-label="Search" aria-describedby="search-addon" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>ตำแหน่ง :</label>
                                        <input type="search" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" aria-label="Search" aria-describedby="search-addon" />
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>เพศ :</label>
                                        <select class="form-control selectpicker" id="select-country" data-live-search="true">
                                            <option data-tokens="/">---ไม่ระบุข้อมูล---</option>
                                            <option data-tokens="/">ชาย</option>
                                            <option data-tokens="/">หญิง</option>
                                            <option data-tokens="/">เพศทางเลือก</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>สถานะลงทะเบียน :</label>
                                        <select class="form-control selectpicker" id="select-country" data-live-search="true">
                                            <option data-tokens="/">---ไม่ระบุข้อมูล---</option>
                                            <option data-tokens="/">เปิดลงทะเบียน</option>
                                            <option data-tokens="/">ปิดลงทะเบียน</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>วันที่เข้ากิจกรรม :</label>
                                        <input type="datetime-local" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" aria-label="Search" aria-describedby="search-addon" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer"><br>
                            <button type="submit" id="submit" class="btn btn-success btn-sm" ng-click="Export()"><i class="bi bi-file-earmark-excel-fill"></i> Export Excel</button>
                        </div>
                    </td>
                </tr>
            </thead>
        </table>
    </div>
    <br>
    <span class="h3">รายชื่อผู้ลงทะเบียน</span>
    <br><br>
    <table datatable="ng" id="example" class="table nowrap" style="width:100%">
        <!-- <thead>
            <tr class="table-dark">
                <th ng-repeat="header in header_data">{{header}}</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="row in table_data">
                <td ng-repeat="col in row">{{col}}</td>
                <td>
                    <button class="btn btn-info btn-sm text-white">ข้อมูลผู้ลงทะเบียน</button>
                    <button class="btn btn-warning btn-sm">แก้ไข</button>
                    <button class="btn btn-danger btn-sm">ลบ</button>
                </td>
            </tr>
        </tbody> -->
    </table>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                // scrollX: true,
            });
        });
    </script>
</div>