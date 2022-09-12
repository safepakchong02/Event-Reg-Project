<script>
    var app = angular.module("<?= $app_name ?>", []);
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function
        <? if (isset($_GET["event"])) if ($_GET["event"] == "logout") { ?>
            $http.get("main/model/login/query_login.php?event_view=logout")
                .then((res) => { // start then
                    $("#modal-status_login_logout").modal("show");
                    setTimeout(() => {
                        location.replace("/Event-Reg-Project/");
                    }, 1500)
                }); // end then
        <? } ?>

        $scope.login = () => {
            $http({
                method: 'POST',
                url: 'main/model/login/query_login.php?event_view=login',
                data: `user_id=${$scope.user_id}` +
                    `&password=${$scope.password}`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(function(res) {
                    var bool = res.data.status;
                    if (bool) {
                        // console.log("success");
                        $("#modal-status_login_success").modal("show");
                        setTimeout(() => {
                            location.reload();
                        }, 1500)
                    } else {
                        // console.log("error");
                        $("#modal-status_login_error").modal("show");
                        setTimeout(() => {
                            location.reload();
                        }, 1500)
                    }
                },
                function(response) { // optional
                    // failed
                    alert('ไม่สามารถบันทึกข้อมูลได้');
                });
        }
    }); // end controller function
</script>