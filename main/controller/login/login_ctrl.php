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
                console.log(res);
                if (res.data.code == 500) Swal.fire({
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
    }); // end controller function
</script>