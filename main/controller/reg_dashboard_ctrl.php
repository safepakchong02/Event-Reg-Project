<script>
    var app = angular.module("<?= $app_name ?>", ['datatables']);
    app.controller("<?= $ctrl_name ?>", function($scope, $http, $interval) { // start controller function
        $scope.group_by = "";
        $scope.regIsOpen = true;

        $scope.widthCal = (n1, n2) => {
            n1 = parseInt(n1);
            n2 = parseInt(n2);
            var sum = n1 + n2;
            var num = (n1 / sum) * 100;
            // console.log(`n1=${n1} n2=${n2} num=${num} sum=${sum}`);
            return `${num}%`;
        }

        /* =============SHOW DATA============= */
        $http.get("main/model/reg/query_reg.php?event_view=show_data&ev_id=<?= $_GET["ev_id"] ?>")
            .then(function(res) { // start then
                let data = res.data.results_data[0];
                $scope.event_data = splitTitle(data.ev_title); // "results_data" is key in json format
                // console.log(spiltTitle(res.data.results_data[0]));

                if (data.ev_status == "เปิดลงทะเบียน") $scope.regIsOpen = true;
                else $scope.regIsOpen = false;

                /* =============RELOAD REALTIME============= */
                if ($scope.regIsOpen) {
                    $interval(() => {
                        // console.log("reload");
                        $scope.loadData();
                    }, 60000)
                }
                /* =============RELOAD REALTIME============= */
            }) // end then

        $http.get("main/model/event/query_event_detail_setting.php?event_view=show_data&ev_id=<?= $_GET["ev_id"] ?>")
            .then(function(res) { // start then
                $scope.check = res.data.results_data[0];
            }); // end then
        /* =============END SHOW DATA============= */

        /* =============SHOW REPORT REALTIME============= */
        $scope.loadData = () => {
            if ($scope.group_by !== "") {
                $http.get(`main/model/reg/query_reg.php?event_view=report_data&ev_id=<?= $_GET["ev_id"] ?>&group_by=${$scope.group_by}`)
                    .then((res) => { // start then
                        $scope.report_data = res.data.report_data; // "results_data" is key in json format
                        // console.log($scope.report_data);
                    }) // end then
            } else {
                delete $scope.report_data;
            }

            $http.get(`main/model/reg/query_reg.php?event_view=report_sum&ev_id=<?= $_GET["ev_id"] ?>`)
                .then((res) => { // start then
                    let report_sum = res.data.report_sum;
                    $scope.report_sum = report_sum;

                    let cp_join = document.querySelector(".circular-progress-join"),
                        cp_no_join = document.querySelector(".circular-progress-no_join"),
                        cp_all = document.querySelector(".circular-progress-all");

                    let cp_join_value = (parseInt(report_sum.Join) / parseInt(report_sum.all)) * 100,
                        cp_no_join_vale = (parseInt(report_sum.no_join) / parseInt(report_sum.all)) * 100,
                        cp_all_value = (parseInt(report_sum.all) / parseInt(report_sum.all)) * 100;

                    cp_join.style.background = `conic-gradient(#28B463 ${cp_join_value * 3.6}deg, #ededed 0deg)`;
                    cp_no_join.style.background = `conic-gradient(#CB4335 ${cp_no_join_vale * 3.6}deg, #ededed 0deg)`;
                    cp_all.style.background = `conic-gradient(#3498DB ${cp_all_value * 3.6}deg, #ededed 0deg)`;
                }) // end then
        }

        /* =============INIT PAGE============= */
        $scope.loadData();

        /* =============END SHOW REPORT REALTIME============= */
    }); // end controller function
</script>