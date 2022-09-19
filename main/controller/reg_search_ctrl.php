<script>
    var app = angular.module("<?= $app_name ?>", ['datatables']);
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function
        /* ===============CHECK DATA=============== */
        $scope.checkReg = (date) => {
            if (date === "") return "-"
            else return date;
        }
        /* ===============END CHECK DATA=============== */

        /* ===============SHOW DATA=============== */
        $http.get("main/model/reg/query_reg.php?event_view=show_data&ev_id=<?= $_GET["ev_id"] ?>")
            .then((res) => { // start then
                $scope.event_data = res.data.results_data; // "results_data" is key in json format
            }); // end then

        $http.get("main/model/event/query_event_detail_setting.php?event_view=show_data&ev_id=<?= $_GET["ev_id"] ?>")
            .then(function(res) { // start then
                $scope.check = res.data.results_data[0];
            }); // end then

        $http.get("main/model/reg/query_reg.php?event_view=show_member&ev_id=<?= $_GET["ev_id"] ?>")
            .then((res) => { // start then
                $scope.data_table = res.data.results_data;
            }); // end then
        /* ===============END SHOW DATA=============== */

        /* ===============EDIT DATA=============== */
        $scope.edit_reg_view = (id) => {
            $http.get(`main/model/reg/query_reg.php?event_view=show_data_edit&id=${id}`)
                .then((res) => { // start then
                    $scope.data_edit = res.data.results_data_edit[0];
                    $scope.data_edit.birthDate = createDate($scope.data_edit.birthDate);
                }); // end then
        }

        $scope.edit_form_save = () => {
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
                    `&birthDate=${convertDate($scope.data_edit.birthDate)}`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(function(response) {
                    // console.log(response.data);
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
        /* ===============END EDIT DATA=============== */

        /* ===============DEL DATA=============== */
        $scope.del_reg = (id) => {
            if (confirm("คุณต้องการลบข้อมูลนี้หรือไม่")) {
                $http.get(`main/model/reg/query_reg.php?event_view=del_reg&id=${id}`)
                    .then((res) => { // start then
                        // console.log(res.data);
                        $("#modal-detail_edit").modal("hide");
                        $("#modal-status_success").modal("show");
                        setTimeout(() => {
                            location.reload();
                        }, 500)
                    }); // end then
            } // end if confirm
        }
        /* ===============END DEL DATA=============== */

        /* ===============RESET REGISTER=============== */
        $scope.reset_reg = (id) => {
            if (confirm("คุณต้องการรีเซ็ทการลงทะเบียนนี้หรือไม่")) {
                $http.get(`main/model/reg/query_reg.php?event_view=reset_reg&id=${id}`)
                    .then((res) => { // start then
                        // console.log(res.data);
                        $("#modal-status_success").modal("show");
                        setTimeout(() => {
                            location.reload();
                        }, 500)
                    }); // end then
            } // end if confirm
        }
        /* ===============END RESET REGISTER=============== */

    }); // end controller function
</script>