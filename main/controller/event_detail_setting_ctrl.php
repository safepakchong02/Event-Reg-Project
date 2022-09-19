<script>
    var app = angular.module("<?= $app_name ?>", []);
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function
        /* ==================--SHOW--======================= */
        $http.get("main/model/event/query_event_detail_setting.php?event_view=show_data&ev_id=<?= $_GET["ev_id"] ?>")
            .then(function(res) { // start then
                $scope.check = res.data.results_data[0];
            }); // end then
        /* ==================END SHOW======================= */

        $scope.testFunc = () => {
            console.log($scope.check);
            // $scope.$apply();
        }

        /* ==================--EDIT--======================= */
        $scope.setting_save = function() {
            $http({
                method: 'POST',
                url: 'main/model/event/query_event_detail_setting.php?event_view=edit_form_save',
                data: `ev_id=<?= $_GET["ev_id"] ?>` +
                    `&walk_in=${$scope.check.walk_in}` +
                    `&emp_id=${$scope.check.emp_id}` +
                    `&card_id=${$scope.check.card_id}` +
                    `&name=${$scope.check.name}` +
                    `&call=${$scope.check.call}` +
                    `&com_name=${$scope.check.com_name}` +
                    `&dep=${$scope.check.dep}` +
                    `&pos=${$scope.check.pos}` +
                    `&no=${$scope.check.no}` +
                    `&gender=${$scope.check.gender}` +
                    `&age=${$scope.check.age}` +
                    `&has_reg_by=${$scope.check.has_reg_by}` +
                    `&birthDate=${$scope.check.birthDate}`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(function(response) {
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
    }); // end controller function
</script>