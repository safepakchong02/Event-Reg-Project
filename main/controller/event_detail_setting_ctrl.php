<script>
    let isChange = false;

    var app = angular.module("<?= $app_name ?>", []);
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function
        /* ==================--SHOW--======================= */
        $http.get("main/model/event/query_event_detail_setting.php?event_view=show_data&ev_id=<?= $_GET["ev_id"] ?>")
            .then(function(res) { // start then
                $scope.check = res.data.results_data[0];
            }); // end then
        /* ==================END SHOW======================= */

        $scope.clickCheckBox = (param) => {
            if ($scope.check[param]) $scope.check[param] = false;
            else $scope.check[param] = true;
        }

        /* ==================HANDLE CLOSE BEFORE SAVE======================= */

        window.addEventListener("change", (e) => {
            isChange = true;
        });

        window.addEventListener('beforeunload', (e) => {
            if (isChange) {
                console.log(e);
                e.preventDefault();
                e.returnValue = '';
            }
        });
        /* ==================END HANDLE CLOSE BEFORE SAVE======================= */

        /* ==================SHOW LINK REG NO_AUTH======================= */
        $scope.link_no_auth = link_no_auth;
        /* ==================END LINK REG NO_AUTH======================= */


        /* ==================--EDIT--======================= */
        $scope.setting_save = function() {
            $http({
                method: 'POST',
                url: 'main/model/event/query_event_detail_setting.php?event_view=edit_form_save',
                data: `ev_id=<?= $_GET["ev_id"] ?>` +
                    `&walk_in=${$scope.check.walk_in}` +
                    `&self_reg=${$scope.check.self_reg}` +
                    `&hn=${$scope.check.hn}` +
                    `&emp_id=${$scope.check.emp_id}` +
                    `&card_id=${$scope.check.card_id}` +
                    `&prefix=${$scope.check.prefix}` +
                    `&name=${$scope.check.name}` +
                    `&surname=${$scope.check.surname}` +
                    `&call=${$scope.check.call}` +
                    `&com_name=${$scope.check.com_name}` +
                    `&dep=${$scope.check.dep}` +
                    `&pos=${$scope.check.pos}` +
                    `&gender=${$scope.check.gender}` +
                    `&age=${$scope.check.age}` +
                    `&has_reg_by=${$scope.check.has_reg_by}` +
                    `&birthDate=${$scope.check.birthDate}`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then((res) => {
                    // console.log(res.data);
                    isChange = false;
                    $("#modal-status_success").modal("show");
                    setTimeout(() => {
                        location.reload();
                    }, 1500)
                },
                function(response) { // optional
                    // failed
                    alert('ไม่สามารถบันทึกข้อมูลได้');
                });
        }
    }); // end controller function
</script>