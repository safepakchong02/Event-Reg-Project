<script>
    var app = angular.module("<?= $app_name ?>", []);
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function
        <? if (isset($_GET["event"])) if ($_GET["event"] == "logout") { ?>
            $http.get("main/model/login/query_login.php?event_view=logout")
                .then((res) => { // start then
                    $("#modal-status_login_logout").modal("show");
                    setTimeout(() => {
                        location.replace("/");
                    }, 1500)
                }); // end then
        <? } ?>

        $scope.login = () => {
            $http({
                method: 'POST',
                url: 'main/model/login/query_login.php?event_view=login',
                data: `captcha_code=${$scope.captcha_code}` +
                    `&user_id=${$scope.user_id}` +
                    `&password=${$scope.password}`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(function(res) {
                    // console.log(res.data);
                    var bool = res.data.status;
                    var captcha_code = res.data.captcha_code;
                    if (!captcha_code) document.getElementById("login_error").textContent = "captcha code ไม่ถูกต้อง";
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