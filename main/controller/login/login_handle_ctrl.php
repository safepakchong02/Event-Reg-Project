<script>
    let app = angular.module("<?= $app_name ?>", ['datatables']);
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function
        const myPath = location.search;
        const loginPath = "?p=login&m=login";
        const registerPath = "?p=login&m=register";

        // bypass login
        setCookie(KEY_TOKEN, "token", 30);
        setCookie(KEY_ROLE, "1", 30);
        setCookie(KEY_USER_ID, "user_id", 30);

        $scope.handle_login = () => {
            if (myPath === loginPath) return;
            if (myPath === registerPath) return;
            if (getCookie(KEY_TOKEN) === "") {
                Swal.fire({
                    icon: 'warning',
                    title: 'กรุณาเข้าสู่ระบบ',
                }).then(() => {
                    location.replace("index.php?p=login&m=login");
                })
            } else {
                $scope.ac_token = getCookie(KEY_TOKEN);
                $scope.u_role = getCookie(KEY_ROLE);
                $scope.u_userId = getCookie(KEY_USER_ID);
            }
        }

        $scope.handle_login();

        // console.log(myPath);
        // console.log(location.href);
    }); // end controller function
</script>