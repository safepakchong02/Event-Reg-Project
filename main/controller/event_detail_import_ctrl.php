<script>
    const col = {};
    let table = null;

    const testFunc = (element) => {
        let col_new = element.value;
        let col_old = element.getAttribute("colold");
        col[col_old] = col_new;
    }

    var app = angular.module("<?= $app_name ?>", ['datatables']);
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function
        $scope.isInit = true;
        $scope.has_col = [];
        $scope.all = 0;
        $scope.now = 0;
        // $("#modal-loading").modal("show");

        $scope.widthCal = (n1, n2) => {
            n1 = parseInt(n1);
            // n1++;
            n2 = parseInt(n2);
            var num = (n1 / n2) * 100;
            // console.log(`n1=${n1} n2=${n2} num=${num}`);
            return `${num}%`;
        }

        $('#importFile').change((event) => {
            $scope.importFile = URL.createObjectURL(event.target.files[0]);
        });

        $scope.reset = () => {
            location.reload();
        }

        /* ==================IMPORT======================= */
        $scope.import = () => {
            alasql('SELECT * FROM XLSX(?,{headers:true})',
                [$scope.importFile],
                (data) => {
                    console.log(data);
                    $scope.data = data;
                    let head = Object.keys(data[0]);
                    $scope.head = head;
                    let arrHead = [];
                    for (i in head) {
                        arrHead.push({
                            "data": head[i]
                        });
                        $("#colName").append(`$<th>${head[i]}</th>`);
                        $("#convertCol").append(`
                            <div class="row pb-3">
                                <div class="col-4">
                                    <input type="text" value="${head[i]}" class="form-control" disabled>
                                </div>
                                <div class="col-8">
                                    <select class="form-select" colold="${head[i]}" onchange="testFunc(this)" required>
                                        <option value="" selected="selected">โปรดระบุ</option>
                                        <option value="no">ลำดับที่</option>
                                        <option value="emp_id">รหัสพนักงาน</option>
                                        <option value="card_id">รหัสบัตรประชาชน</option>
                                        <option value="prefix">คำนำหน้า</option>
                                        <option value="name">ชื่อ-สกุล</option>
                                        <option value="call">เบอร์โทรศัพท์</option>
                                        <option value="com_name">ชื่อบริษัท</option>
                                        <option value="dep">แผนก</option>
                                        <option value="pos">ตำแหน่ง</option>
                                        <option value="gender">เพศ</option>
                                        <option value="age">อายุ</option>
                                        <option value="birthDate">วันเดือนปีเกิด</option>
                                        <option value="comment">หมายเหตุ</option>
                                    </select>
                                </div>
                            </div>
                        `); // end append
                    } // end for

                    $("#convertCol").append(`
                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">ลงทะเบียนโดยใช้ : </label>
                            <div class="col">
                                <select required class="form-select" id="has_reg_by">
                                    <option value="" selected="selected">โปรดระบุ</option>
                                    <option value="emp_id">รหัสพนักงาน</option>
                                    <option value="card_id">รหัสบัตรประชาชน</option>
                                    <option value="name">ชื่อ-สกุล</option>
                                    <option value="call">เบอร์โทรศัพท์</option>
                                    <option value="no">ลำดับที่</option>
                                </select>
                            </div>
                        </div>`); // end append

                    table = $("#preview").dataTable({
                        "data": data,
                        "columns": arrHead,
                    });

                    $("#table").removeClass("ng-hide");
                    $("#convert").removeClass("ng-hide");
                    $("#reset").removeClass("ng-hide");
                    $("#import").prop('disabled', true);
                    $("#importFile").prop('disabled', true);
                }); // end callback and alasql
        }; // end import function

        $scope.func_save = (i) => {
            setTimeout(() => {
                let data_col = {
                    "emp_id": "",
                    "card_id": "",
                    "prefix": "",
                    "name": "",
                    "call": "",
                    "com_name": "",
                    "dep": "",
                    "pos": "",
                    "no": "",
                    "gender": "",
                    "age": "",
                    "no": "",
                    "birthDate": "",
                    "reg_date": "",
                    "comment": ""
                }; // end let data_col

                for (j in $scope.head) {
                    data_col[col[$scope.head[j]]] = $scope.data[i][$scope.head[j]];
                } // end for j

                $http({
                    method: 'POST',
                    url: 'main/model/reg/query_reg.php?event_view=add',
                    data: `ev_id=<?= $_GET["ev_id"] ?>` +
                        `&emp_id=${data_col.emp_id}` +
                        `&card_id=${data_col.card_id}` +
                        `&prefix=${data_col.prefix}` +
                        `&name=${data_col.name}` +
                        `&call=${data_col.call}` +
                        `&com_name=${data_col.com_name}` +
                        `&dep=${data_col.dep}` +
                        `&pos=${data_col.pos}` +
                        `&no=${data_col.no}` +
                        `&gender=${data_col.gender}` +
                        `&age=${data_col.age}` +
                        `&no=${data_col.no}` +
                        `&birthDate=${data_col.birthDate}` +
                        `&reg_date=${data_col.reg_date}` +
                        `&comment=${data_col.comment}`,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                }).then(async (res) => {
                    $("#modal-loading").modal("show");
                    $scope.now = parseInt(i) + 1;
                    console.log(res.data);
                }); // end then http
            }, 1000 * i)
        }

        $scope.import_save = () => {
            $("#modal-loading").modal("show");
            $("#isImport").removeClass("ng-hide");
            $scope.all = $scope.data.length;

            let setting = {
                "emp_id": false,
                "card_id": false,
                "prefix": false,
                "name": false,
                "call": false,
                "com_name": false,
                "dep": false,
                "pos": false,
                "no": false,
                "gender": false,
                "age": false,
                "no": false,
                "birthDate": false,
                "has_reg_by": ""
            }; // end let data_col

            for (i in $scope.head) {
                setting[col[$scope.head[i]]] = true;
            } // end for i
            setting["has_reg_by"] = $("#has_reg_by").val();
            console.log(setting);

            $http({
                method: 'POST',
                url: 'main/model/event/query_event_detail_setting.php?event_view=import',
                data: `ev_id=<?= $_GET["ev_id"] ?>` +
                    `&emp_id=${setting.emp_id}` +
                    `&card_id=${setting.card_id}` +
                    `&prefix=${setting.prefix}` +
                    `&name=${setting.name}` +
                    `&call=${setting.call}` +
                    `&com_name=${setting.com_name}` +
                    `&dep=${setting.dep}` +
                    `&pos=${setting.pos}` +
                    `&no=${setting.no}` +
                    `&gender=${setting.gender}` +
                    `&age=${setting.age}` +
                    `&birthDate=${setting.birthDate}` +
                    `&has_reg_by=${setting.has_reg_by}`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then((res) => {
                // console.log(res.data);
                for (i in $scope.data) {
                    $scope.func_save(i);
                } // end for i

                setTimeout(() => {
                    $("#modal-loading").modal("hide");
                    $("#modal-status_success").modal("show");
                    setTimeout(() => {
                        $("#modal-status_success").modal("hide");
                        location.replace("index.php?p=event&m=event_detail&ev_id=<?= $_GET["ev_id"] ?>");
                    }, 1500);
                }, 1000 * $scope.all);
            }); // end then
        }; // end import_save function
        /* ==================END IMPORT======================= */
    }); // end controller function
</script>