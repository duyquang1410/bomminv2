<div class="list-user-timekeeping">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">Danh sách chấm công hôm nay</div>
        </div>
        <div class="panel-body">
            <div class="item-box-timekeeping">
                <a href="">
                    <div class="status-timekeeping timekeeping-warning">
                        <div class="status">Chấm công vào</div>
                        <div class="time">10:15</div>
                    </div>
                    <div class="info-user">
                        <h3>Nguyễn Duy Quang</h3>
                        <div class="cv">CV: đi hát với khách</div>
                    </div>
                </a>
            </div>

            <div class="item-box-timekeeping">
                <a href="">
                    <div class="status-timekeeping timekeeping-success">
                        <div class="status">Hoàn thành</div>
                        <div class="time">10:15</div>
                    </div>
                    <div class="info-user">
                        <h3>Nguyễn Duy Quang</h3>
                        <div class="cv">CV: đi hát với khách</div>
                        <div class="timekeepingOnOff">
                            <li class="timekeepingOn">Vào: 10:15</li>
                            <li class="timekeepingOff">Ra: 12:15</li>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .list-user-timekeeping .item-box-timekeeping{
        position: relative;
        padding: 8px 0;
        border-bottom: 1px solid #F1F1F1;
        overflow: hidden;
    }
    .list-user-timekeeping .tem-box-timekeeping .status-timekeeping{
        display: inline-block;
    }
    .status-timekeeping {
        display: inline-block;
        width: 30%;
        float: left;

        text-align: center;
        color: #FFF;
        border-radius: 5px;
    }
    .status-timekeeping .status {
        padding: 6px 0;
        border-bottom: 1px solid #ddd;
    }
    .time {
        padding: 6px 0;
        font-weight: 700;
    }
    .info-user {
        display: inline-block;
        width: 70%;
        padding-left: 10px;
        color: #333;
    }
    .timekeepingOnOff {
        display: inline-flex;
        width: 100%;
    }
    .timekeepingOnOff li{
        list-style-type: none;
        padding-right: 10px;
    }

    .timekeeping-success {
        background: #0AA;
    }
    .timekeeping-warning {
        background: #ffaa55;
    }
    .list-user-timekeeping .panel-default{
        background: none;
        border: 0;
        box-shadow: none;
        border-radius: 0;
    }
    .list-user-timekeeping .panel-default .panel-heading {
        background: none;
        padding-left: 0;
        padding-right: 0;
    }
    .list-user-timekeeping .panel-default .panel-heading .panel-title {
        font-size: 16px;
        font-weight: 700;
        text-align: center;
    }
    .list-user-timekeeping .panel-default .panel-body {
        padding-left: 0;
        padding-right: 0;
    }
</style>