<script>
    app.controller("<?= $ctrl_name ?>", async function($scope, $http) { // start controller function

        async function loadMyEvent() {
            // เรียกข้อมูล กิจกรรมของฉัน
            $http({
                method: `GET`,
                url: `api/event/MyEvent`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Authorization': `${$scope.ac_token}`
                }
            }).then((res) => {
                $scope.myEvents = [];
                $scope.myEvents = setEventStatus(res.data.resultData);
                // console.log($scope.myEvents);
                console.log(res.data.resultData);
            })
        }

        async function loadModEvent() {
            // เรียกข้อมูล กิจกรรมที่ฉันดูแล/สร้าง
            $http({
                method: `GET`,
                url: `api/event/ModEvent`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Authorization': `${$scope.ac_token}`
                }
            }).then((res) => {
                $scope.modEvents = [];
                $scope.modEvents = setEventStatus(res.data.resultData);
                // console.log($scope.modEvents);
                // console.log(res.data.resultData);
            })
        }

        await loadMyEvent();
        await loadModEvent();
    }); // end controller function
</script>