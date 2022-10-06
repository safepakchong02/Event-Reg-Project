<script>
    var app = angular.module("<?= $app_name ?>", ['datatables']);
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function
        /* ===============CHECK DATA=============== */
        $scope.checkReg = (date) => {
            if (date === "") return "-"
            else return date;
        }

        const clearData = () => {
            $scope.data_add = {};
            $scope.data_add.emp_id = "";
            $scope.data_add.card_id = "";
            $scope.data_add.name = "";
            $scope.data_add.call = "";
            $scope.data_add.com_name = "";
            $scope.data_add.dep = "";
            $scope.data_add.pos = "";
            $scope.data_add.no = null;
            $scope.data_add.gender = "";
            $scope.data_add.age = null;
            $scope.data_add.birthDate = "";
        }

        const searchBy = (key) => {
            switch (key) {
                case "emp_id":
                    return $scope.data_add.emp_id;
                    break;
                case "card_id":
                    return $scope.data_add.card_id;
                    break;
                default:
                    return "";
                    break;
            }
        }
        /* ===============END CHECK DATA=============== */

        // init page
        clearData();

        /* ==================--SHOW--======================= */
        $http.get("main/model/event/query_event.php?event_view=show_data_edit&ev_id=<?= $_GET["ev_id"] ?>")
            .then(function(res) { // start then
                $scope.ev_title = res.data.results_data_edit[0].ev_title;
            }); // end then

        $http.get("main/model/event/query_event_detail_setting.php?event_view=show_data&ev_id=<?= $_GET["ev_id"] ?>")
            .then(function(res) { // start then
                $scope.check = res.data.results_data[0];

            }); // end then

        $http.get("main/model/reg/query_reg.php?event_view=show_member&ev_id=<?= $_GET["ev_id"] ?>")
            .then((res) => { // start then
                $scope.data_table = res.data.results_data;
                // console.log($scope.data_table);
            }); // end then
        /* ==================END SHOW======================= */

        /* ==================--ADD---======================= */
        $scope.add_member = () => {
            var birthDate = "";
            // check value
            if ($scope.data_add.birthDate !== null)
                birthDate = convertDate($scope.data_add.birthDate);
            if ($scope.data_add.no === null)
                $scope.data_add.no = "";
            if ($scope.data_add.age === null)
                $scope.data_add.age = "";
            // end check value

            // check exist data
            $http({
                method: 'POST',
                url: 'main/model/reg/query_reg.php?event_view=hasExist',
                data: `ev_id=<?= $_GET["ev_id"] ?>` +
                    `&key=${$scope.check.has_reg_by}` +
                    `&value=${searchBy($scope.check.has_reg_by)}`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then((response) => {
                    var isExist = response.data.isExist;
                    // console.log(response.data);

                    // add data
                    if (!isExist) {
                        var reg_date = "";
                        $http({
                            method: 'POST',
                            url: 'main/model/reg/query_reg.php?event_view=add',
                            data: `ev_id=<?= $_GET["ev_id"] ?>` +
                                `&emp_id=${$scope.data_add.emp_id}` +
                                `&card_id=${$scope.data_add.card_id}` +
                                `&name=${$scope.data_add.name}` +
                                `&call=${$scope.data_add.call}` +
                                `&com_name=${$scope.data_add.com_name}` +
                                `&dep=${$scope.data_add.dep}` +
                                `&pos=${$scope.data_add.pos}` +
                                `&no=${$scope.data_add.no}` +
                                `&gender=${$scope.data_add.gender}` +
                                `&age=${$scope.data_add.age}` +
                                `&no=${$scope.data_add.no}` +
                                `&birthDate=${birthDate}` +
                                `&reg_date=${reg_date}`,
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            }
                        }).then((res) => {
                                $("#modal-detail_add").modal("hide");
                                $("#modal-status_success").modal("show");
                                setTimeout(() => {
                                    location.reload();
                                }, 500)
                            },
                            function(response) { // optional
                                // failed
                                console.log(response);
                            }); //end then
                    } else {
                        $("#modal-detail_add").modal("hide");

                        $("#modal-status_reg_error_isExist").modal("show");
                        setTimeout(() => {
                            location.reload();
                        }, 1000)
                    } //end if else isExist
                    // end add data
                },
                (response) => { // optional
                    // failed
                    console.log(response);
                });
            // end check exist data
        } // end add_member function
        /* ==================END ADD-======================= */
        /* ==================--EDIT--======================= */
        $scope.edit_reg_view = (id) => {
            $http.get(`main/model/reg/query_reg.php?event_view=show_data_edit&id=${id}`)
                .then((res) => { // start then
                    $scope.data_edit = res.data.results_data_edit[0];
                    $scope.data_edit.no = parseInt($scope.data_edit.no);
                    $scope.data_edit.birthDate = createDate($scope.data_edit.birthDate);
                }); // end then
        }

        $scope.edit_form_save = () => {
            var birthDate = "";
            // check value
            if ($scope.data_edit.birthDate !== "")
                birthDate = convertDate($scope.data_edit.birthDate);
            // console.log($scope.data_add.birthDate);
            $http({
                method: 'POST',
                url: 'main/model/reg/query_reg.php?event_view=edit_form_save',
                data: `id=${$scope.data_edit.id}` +
                    `&emp_id=${$scope.data_edit.emp_id}` +
                    `&card_id=${$scope.data_edit.card_id}` +
                    `&name=${$scope.data_edit.name}` +
                    `&call=${$scope.data_edit.call}` +
                    `&com_name=${$scope.data_edit.com_name}` +
                    `&dep=${$scope.data_edit.dep}` +
                    `&pos=${$scope.data_edit.pos}` +
                    `&no=${$scope.data_edit.no}` +
                    `&gender=${$scope.data_edit.gender}` +
                    `&age=${$scope.data_edit.age}` +
                    `&no=${$scope.data_edit.no}` +
                    `&birthDate=${birthDate}`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(function(response) {
                    $("#modal-detail_edit").modal("hide");
                    $("#modal-status_success").modal("show");
                    setTimeout(() => {
                        location.reload();
                    }, 500)
                },
                function(response) { // optional
                    // failed
                    alert('ไม่สามารถบันทึกข้อมูลได้');
                });
        }
        /* ==================END EDIT======================= */
        /* ==================-DELETE-======================= */
        $scope.del_reg = (id) => {
            if (confirm("คุณต้องการลบข้อมูลนี้หรือไม่")) {
                $http.get(`main/model/reg/query_reg.php?event_view=del_reg&id=${id}`)
                    .then((res) => { // start then
                        // console.log(res.data);
                        $("#modal-status_success").modal("show");
                        setTimeout(() => {
                            location.reload();
                        }, 500)
                    }); // end then
            } // end if confirm
        }
        /* ==================END DELETE===================== */

    }); // end controller function
</script>