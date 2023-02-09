<script>
    let app = angular.module("<?= $app_name ?>", ['datatables']);
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function
        const myPath = location.search;
        const loginPath = "?p=login&m=login";
        const logoutPath = "?p=login&m=login&logout";
        const registerPath = "?p=login&m=register";

        $scope.handle_login = () => {
            if (myPath === loginPath) return;
            if (myPath === registerPath) return;
            if (myPath === logoutPath) return;
            if (getCookie(KEY_TOKEN) === "") {
                Swal.fire({
                    icon: 'warning',
                    title: 'กรุณาเข้าสู่ระบบ',
                }).then(() => {
                    // location.replace("index.php?p=login&m=login");
                })
            } else {
                $scope.ac_token = getCookie(KEY_TOKEN);
                $scope.u_role = getCookie(KEY_ROLE);
                $scope.u_userId = getCookie(KEY_USER_ID);
                $scope.ud_name = decodeURIComponent(getCookie(KEY_NAME));
            }
        }

        $scope.handle_login();
    }); // end controller function
</script>