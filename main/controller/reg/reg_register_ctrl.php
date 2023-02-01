<script>
    var app = angular.module("<?= $app_name ?>", ['datatables']);
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function

        // check login
        const checkLogin = () => {

        }

        $scope.saveReg = (path_api, ev_eventId, u_userId) => {
            const now = convertDate(new Date());

            $http({
                    method: `POST`,
                    url: `api/reg/${path_api}/${ev_eventId}`,
                    data: `u_userId=${u_userId}` + // string
                        `m_preReg=${now}`, // string datetime
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                })
                .then((res) => {
                        Swal.fire({
                            icon: 'success',
                            title: 'บัมทึกข้อมูลเสร็จสิ้น',
                        })
                    },
                    (res) => { // optional
                        // failed
                        Swal.fire({
                            icon: 'error',
                            title: 'ไม่สามารถบันทึกข้อมูลได้',
                            text: res.error
                        })
                    });
        }
    }); // end controller function
</script>