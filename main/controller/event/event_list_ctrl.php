<script>
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function
        
        $scope.filterList = (eventState) => {
            switch (eventState) {
                case "all":
                    filterList("#color-warning", true);
                    filterList("#color-success", true);
                    filterList("#color-danger", true);
                    break;
                case "incoming":
                    filterList("#color-warning", true);
                    filterList("#color-success", false);
                    filterList("#color-danger", false);
                    break;
                case "opening":
                    filterList("#color-warning", false);
                    filterList("#color-success", true);
                    filterList("#color-danger", false);
                    break;
                case "closed":
                    filterList("#color-warning", false);
                    filterList("#color-success", false);
                    filterList("#color-danger", true);
                    break;
            }

        }

        $scope.showList = (listView) => {
            switch (listView) {
                case "card":
                    $("#card_list").removeClass("ng-hide");
                    $("#table_list").addClass("ng-hide");
                    break;
                case "table":
                    $("#card_list").addClass("ng-hide");
                    $("#table_list").removeClass("ng-hide");
                    break;

            }
        }

        // เรียกข้อมูล กิจกรรมทั้งหมดที่เป็นสารธารณะ
        $http({
            method: `GET`,
            url: `api/event`,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Authorization': `${$scope.ac_token}`
            }
        }).then((res) => {
            $scope.eventLists = setEventStatus(res.data.resultData);
            // console.log($scope.eventLists);
        })
    }); // end controller function
</script>