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

        $('#importFile').change((event) => {
            $scope.importFile = URL.createObjectURL(event.target.files[0]);
        });

        /* ==================IMPORT======================= */
        $scope.import = () => {
            alasql('SELECT * FROM XLSX(?,{headers:true})',
                [$scope.importFile],
                (data) => {
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
                                    <select class="form-control" colold="${head[i]}" onchange="testFunc(this)">
                                        <option value="" selected="selected">โปรดระบุ</option>
                                        <option value="emp_id">รหัสพนักงาน</option>
                                        <option value="card_id">รหัสบัตรประชาชน</option>
                                        <option value="name">ชื่อ-สกุล</option>
                                        <option value="call">เบอร์โทรศัพท์</option>
                                        <option value="com_name">ชื่อบริษัท</option>
                                        <option value="dep">แผนก</option>
                                        <option value="pos">ตำแหน่ง</option>
                                        <option value="no">ลำดับที่</option>
                                        <option value="gender">เพศ</option>
                                        <option value="age">อายุ</option>
                                        <option value="birthDate">วันเดือนปีเกิด</option>
                                    </select>
                                </div>
                            </div>
                        `); // end append
                    } // end for

                    table = $("#preview").dataTable({
                        "data": data,
                        "columns": arrHead,
                    });

                    $("#table").removeClass("ng-hide");
                    $("#convert").removeClass("ng-hide");
                }); // end callback and alasql
        }; // end import function

        $scope.import_save = () => {
            let data_new = [];

            for (i in $scope.data) {
                let data_col = {};
                for (j in $scope.head) {
                    data_col[col[$scope.head[j]]] = $scope.data[i][$scope.head[j]];
                }
                data_new.push(data_col);
            }
            // console.log(data_new);

            $("#modal-loading").modal("show");
            data_new = JSON.stringify(data_new);
            $http({
                method: 'POST',
                url: 'main/model/event/query_event_detail_import.php?event_view=import',
                data: `ev_id=<?= $_GET["ev_id"] ?>` +
                    `&data=${data_new}`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then((res) => {
                $("#modal-loading").modal("hide");
                console.log(res.data);
            }); // end then http

        }; // end import_save function
        /* ==================END IMPORT======================= */
    }); // end controller function
</script>