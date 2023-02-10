<script>
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function

        $scope.login = () => {
            $http({
                method: `POST`,
                url: `api/login`,
                data: `u_email=${$scope.u_email}` +
                    `&u_password=${$scope.u_password}`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                }
            }).then((res) => {
                // console.log(res.data.code);
                if (res.data.code !== 200 && res.data.code !== 200) Swal.fire({
                    icon: 'warning',
                    title: 'อีเมล หรือรหัสผ่านไม่ถูกต้อง',
                });
                else Swal.fire({
                    icon: 'success',
                    title: 'เข้าสู่ระบบเสร็จสิ้น',
                }).then((res) => {
                    location.replace("index.php");
                });
            })
        }

        $scope.logout = () => {
            $http({
                method: `POST`,
                url: `api/logout`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Authorization': `${$scope.ac_token}`
                }
            }).then((res) => {
                console.log(res);
                if (res.data.code !== 200 && res.data.code !== 201) Swal.fire({
                    icon: 'warning',
                    title: 'error',
                });
                else Swal.fire({
                    icon: 'success',
                    title: 'ออกจากระบบเสร็จสิ้น',
                }).then((res) => {
                    location.replace("index.php?p=login&m=login");
                });
            })
        }

        let hasLogout = (new URL(document.location)).searchParams.get("logout");
        hasLogout = hasLogout !== null ? true : false;

        if (hasLogout) $scope.logout();

    }); // end controller function
</script>