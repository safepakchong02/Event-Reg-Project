<script>
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function

        $("#nav").addClass("ng-hide");

        $scope.register = () => {
            if ($scope.u_password === $scope.u_repeatPassword) {
                $http({
                    method: `POST`,
                    url: `api/register`,
                    data: `u_email=${$scope.profile_data.u_email}` + // string   
                        `&u_password=${$scope.profile_data.u_newPassword}` + // string     
                        `&ud_emp_id=${$scope.profile_data.ud_emp_id}` + // string
                        `&ud_card_id=${$scope.profile_data.ud_card_id}` + // string
                        `&ud_prefix=${$scope.profile_data.ud_prefix}` + // string
                        `&ud_firstName=${$scope.profile_data.ud_firstName}` + // string
                        `&ud_lastName=${$scope.profile_data.ud_lastName}` + // string
                        `&ud_gender=${$scope.profile_data.ud_gender}` + // string
                        `&ud_birthDate=${convertDate($scope.profile_data.ud_birthDate)}` + // datetime
                        `&ud_phone=${$scope.profile_data.ud_phone}` + // string
                        `&ud_orgName=${$scope.profile_data.ud_orgName}` + // string
                        `&ud_department=${$scope.profile_data.ud_department}` + // string
                        `&ud_position=${$scope.profile_data.ud_position}`, // string
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                }).then((res) => {
                        console.log(res);
                        // console.log(res.config.data);
                        if (res.data.code !== 201 && res.data.code !== 200) Swal.fire({
                            icon: 'error',
                            title: 'บันทึกข้อมูลไม่สำเร็จ',
                            text: res.message
                        });
                        else Swal.fire({
                            icon: 'success',
                            title: 'สมัครบัญชีเสร็จสิ้น',
                        }).then((res) => {
                            location.replace("index.php?p=login&m=login");
                        });
                    }, // end is success
                    (res) => { // optional
                        console.log(res);
                        // failed
                        Swal.fire({
                            icon: 'error',
                            title: 'ไม่สามารถบันทึกข้อมูลได้',
                        }) // end is error
                    }); // end then
            } else Swal.fire({
                icon: 'error',
                title: 'รหัสผ่านใหม่ ไม่ตรงกัน',
            });
        }

    }); // end controller function
</script>