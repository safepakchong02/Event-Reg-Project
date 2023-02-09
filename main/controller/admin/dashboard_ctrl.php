<script>
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function

        $scope.showRole = (u_role) => {
            switch (parseInt(u_role)) {
                case 0:
                    return "ผู้ใช้";
                    break;
                case 1:
                    return "ผู้จัดการ";
                    break;
                case 3:
                    return "แอดมิน";
                    break;

            }

            return;
        }

        // เรียกข้อมูล
        $http({
            method: `GET`,
            url: `api/admin/users`,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Authorization': `${$scope.ac_token}`
            }
        }).then((res) => {
            console.log(res.data.resultData);
            $scope.users = res.data.resultData;
        })


        $scope.forceLogout = (u_userId) => {
            Swal.fire({
                title: 'คุณต้องการให้ผู้ใช้ออกจากระบบหรือไม่?',
                text: "ผู้ใช้ยังใช้ระบบได้อยู่ แต่ไม่สามารถดึงข้อมูล หรือแก้ไขข้อมูลได้",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    $http({
                        method: `POST`,
                        url: `api/admin/logout`,
                        data: `u_userId=${u_userId}`,
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'Authorization': `${$scope.ac_token}`
                        }
                    }).then((res) => {
                            console.log(res);
                            if (res.data.code !== 201 && res.data.code !== 200) Swal.fire({
                                icon: 'error',
                                title: 'error',
                            })
                            else Swal.fire({
                                icon: 'success',
                                title: 'ออกจากระบบเสร็จสิ้น',
                            })
                        }, // end then
                        (res) => { // optional
                            // failed
                            console.log(res);
                            Swal.fire({
                                icon: 'error',
                                title: 'ไม่สามารถใช้งานได้',
                                text: res.error
                            })
                        }); // end error
                } // end if result.isConfirmed
            }) // end then Swal result
        }

        $scope.changeRole = async (u_userId) => {
            const {
                value: u_role
            } = await Swal.fire({
                title: 'Select field validation',
                input: 'select',
                inputOptions: {
                    0: "ผู้ใช้",
                    1: "ผู้จัดการ",
                },
                showCancelButton: true,
                inputValidator: (value) => {
                    return new Promise((resolve) => {
                        resolve();
                    })
                }
            })

            $http({
                method: `PATCH`,
                url: `api/admin/user/role`,
                data: `u_userId=${u_userId}` +
                    `&u_role=${u_role}`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Authorization': `${$scope.ac_token}`
                }
            }).then((res) => {
                    console.log(res);
                    if (res.data.code !== 201 && res.data.code !== 200) Swal.fire({
                        icon: 'error',
                        title: 'error',
                    })
                    else Swal.fire({
                        icon: 'success',
                        title: 'ลบผู้ใช้เสร็จสิ้น',
                    })
                }, // end then
                (res) => { // optional
                    // failed
                    console.log(res);
                    Swal.fire({
                        icon: 'error',
                        title: 'ไม่สามารถใช้ได้',
                        // text: res.error
                    })
                }); // end error
        }

        $scope.removeUser = (u_userId) => {
            Swal.fire({
                title: 'คุณต้องการลบผู้ใช้นี้หรือไม่?',
                text: "ข้อมูลทั้งหมดจะหายไป",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    $http({
                        method: `POST`,
                        url: `api/user/deactivate`,
                        data: `u_userId=${$scope.u_userId}`,
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'Authorization': `${$scope.ac_token}`
                        }
                    }).then((res) => {
                            console.log(res);
                            if (res.data.code !== 201 && res.data.code !== 200) Swal.fire({
                                icon: 'error',
                                title: 'error',
                            })
                            else Swal.fire({
                                icon: 'success',
                                title: 'ลบผู้ใช้เสร็จสิ้น',
                            })
                        }, // end then
                        (res) => { // optional
                            // failed
                            console.log(res);
                            Swal.fire({
                                icon: 'error',
                                title: 'ไม่สามารถลบข้อมูลได้',
                                text: res.error
                            })
                        }); // end error
                } // end if result.isConfirmed
            }) // end then Swal result
        }
    }); // end controller function
</script>