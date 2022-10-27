<style>
    @media screen and (max-width: 576px) {

        .ev_title {
            font-size: 23px;
        }
    }

    @media screen and (min-width: 992px) {

        .ev_title {
            font-size: 25px;
        }
    }
</style>

<div class="container-fluid"><br>
    <div class="row justify-content-center" align="center">
        <div class="col-auto title">
            <div class="ev_title" ng-repeat="ev_title in event_data">
                {{ev_title}} <br>
            </div>
        </div>
    </div>
</div>
<hr><br>