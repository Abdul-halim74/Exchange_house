{{--<style>--}}
{{--    * {--}}
{{--        margin: 0;--}}
{{--        padding: 0;--}}
{{--        box-sizing: border-box;--}}
{{--    }--}}
{{--    img {--}}
{{--        max-width: 100%;--}}
{{--    }--}}
{{--    .container {--}}
{{--        width: 1200px;--}}
{{--        max-width: 100%;--}}
{{--        margin: auto;--}}
{{--    }--}}
{{--    .display {--}}
{{--        display: flex;--}}
{{--        flex-wrap: wrap;--}}
{{--        justify-content: space-around;--}}
{{--    }--}}
{{--    .display .display-item {--}}
{{--        flex-grow: 1;--}}
{{--        padding: 15px;--}}
{{--    }--}}
{{--    .display .display-item > span {--}}
{{--        display: block;--}}
{{--        text-align: center;--}}
{{--        padding: 15px;--}}
{{--        font-size: 2em;--}}
{{--    }--}}
{{--    .business-card {--}}
{{--        width: 450px;--}}
{{--        height: 300px;--}}
{{--        max-width: 100%;--}}
{{--        border-radius: 4px;--}}
{{--        margin: 0 auto;--}}
{{--    }--}}
{{--    .business-card {--}}
{{--        display: flex;--}}
{{--        flex-direction: column;--}}
{{--        background: linear-gradient(135deg, #fff 0%, #fff 50%, rgba(254, 0, 0, 0.4) 50.5%, rgba(254, 0, 0, 0.6) 100%);--}}
{{--        color: rgba(0, 0, 0, .8);--}}
{{--        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);--}}
{{--    }--}}
{{--    .business-card .profile {--}}
{{--        display: flex;--}}
{{--        flex-basis: 150px;--}}
{{--        width: 100%;--}}
{{--        border-bottom: 1px solid rgba(0, 0, 0, .2);--}}
{{--        padding: 15px;--}}
{{--    }--}}
{{--    .business-card .profile .profile-image img {--}}
{{--        background-position: center;--}}
{{--        background-size: cover;--}}
{{--        width: 120px;--}}
{{--        height: 120px;--}}
{{--        border-radius: 100%;--}}
{{--    }--}}
{{--    .business-card .profile .profile-title {--}}
{{--        padding-left: 15px;--}}
{{--        /*display: flex;*/--}}
{{--        flex-direction: column;--}}
{{--        justify-content: space-around;--}}
{{--    }--}}
{{--    .business-card .profile .profile-title h2 {--}}
{{--        font-size: 1.4em;--}}
{{--    }--}}
{{--    .business-card .info {--}}
{{--        display: flex;--}}
{{--        flex-grow: 1;--}}
{{--    }--}}
{{--    .business-card .info .info-contact {--}}
{{--        padding: 15px ;--}}
{{--        /*display: flex;*/--}}
{{--        flex-shrink: 1;--}}
{{--        flex-direction: column;--}}
{{--        justify-content: space-around;--}}
{{--    }--}}
{{--    .business-card .info .info-contact a {--}}
{{--        color: rgba(0, 0, 0, .8);--}}
{{--    }--}}
{{--    .business-card .info .info-contact i {--}}
{{--        font-size: 1.2em;--}}
{{--        width: 25px;--}}
{{--    }--}}
{{--    .business-card .info .info-bio {--}}
{{--        /*display: flex;*/--}}
{{--        flex-grow: 1;--}}
{{--        flex-basis: 70%;--}}
{{--        flex-direction: column;--}}
{{--        justify-content: space-around;--}}
{{--        padding: 15px;--}}
{{--        text-align: center;--}}
{{--    }--}}

{{--</style>--}}

{{--<div class="container">--}}
{{--    <div class="display">--}}
{{--        <div class="display-item">--}}
{{--            <div class="business-card">--}}
{{--                <div class="profile">--}}
{{--                    <div class="profile-image">--}}
{{--                        <img src="data:image/png;base64,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" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="profile-title">--}}
{{--                        <h2 style="margin-top: 25px;">{{ $visitorData->v_name }}</h2>--}}
{{--                        <h3 style="margin-top: 5px;"><i>{{ $visitorData->v_company }}</i></h3>--}}
{{--                        <span style="margin-top: 5px;"><i>{{ $visitorData->name }}</i></span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="info">--}}
{{--                    <div class="info-contact">--}}
{{--                        <span><i class="fa fa-phone"></i> {{ $visitorData->v_contact }}</span> <br>--}}
{{--                        <span style="margin-top: 5px;"><i class="fa fa-at"></i> {{ $visitorData->v_email }}</span> <br>--}}
{{--                        <span style="margin-top: 5px;"><i class="fa fa-at"></i> {{ $visitorData->device_carried }}</span> <br>--}}
{{--                    </div>--}}
{{--                    <div class="info-bio">--}}
{{--                        <p>{{ $visitorData->visiting_reason }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

    <!DOCTYPE html>
<html>
<head>
    <title>VLL Socks</title>
    <style type='text/css'>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        img {
            max-width: 100%;
        }
        .container {
            width: 1200px;
            max-width: 100%;
            margin: auto;
        }
        .display {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .display .display-item {
            flex-grow: 1;
            padding: 15px;
        }
        .display .display-item > span {
            display: block;
            text-align: center;
            padding: 15px;
            font-size: 2em;
        }
        .business-card {
            width: 450px;
            height: 300px;
            max-width: 100%;
            border-radius: 4px;
            margin: 0 auto;
        }
        .business-card {
            display: flex;
            flex-direction: column;
            background: linear-gradient(680deg, #fff 47%, #fff 84%, rgba(254, 0, 0, 0.4) 7.5%, rgba(254, 0, 0, 0.6) 73%);
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        }
        .business-card .profile {
            display: flex;
            flex-basis: 150px;
            width: 100%;
            border-bottom: 1px solid rgba(0, 0, 0, .2);
        }
        .business-card .profile .profile-image img {
            width: 50px !important;
            height: 50px !important;
            border:2px solid black;
        }
        .business-card .profile .profile-title {
            padding-left: 15px;
            margin-left:90px;
            margin-top:-90px;
        }
        .business-card .profile .profile-title h2 {
            font-size: 1.4em;
        }
        .business-card .info {
            display: flex;
            flex-grow: 1;
        }
        .business-card .info .info-contact {
            padding: 15px ;
            flex-shrink: 1;
            flex-direction: column;
            justify-content: space-around;
        }
        .business-card .info .info-contact a {
            color: rgba(0, 0, 0, .8);
        }
        .business-card .info .info-contact i {
            font-size: 1.2em;
            width: 25px;
        }
        .business-card .info .info-bio {
            margin-top:-100px;
            flex-grow: 1;
            flex-basis: 70%;
            flex-direction: column;
            justify-content: space-around;
            padding: 15px;
            text-align: right;
        }
    </style>
</head>
<body>
<div class='container'>
    <div class='display'>
        <div class='display-item'>
            <div class='business-card'>
                <div class='profile'>
                    <div class='profile-image'>
                        <img src='data:image/png;base64,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'/>
                    </div>
                    <div class='profile-title'>
                        <h2 style='margin-top: 25px;'>Guiner Golden</h2>
                        <h3 style='margin-top: 5px;'><i>Hamilton Hester Trading</i></h3>
                        <span style='margin-top: 5px;'><i>Mohammad shahab uddin</i></span>
                    </div>
                    <br>
                    <br>
                </div>
                <div class='info'>
                    <div class='info-contact'>
                        <span><i class='fa fa-phone'></i> 12345678</span> <br>
                        <span style='padding-top: 55px;'><i class='fa fa-at'></i> shahabuddin@gmail.com</span> <br>
                        <span style='margin-top: 15px;'><i class='fa fa-at'></i> Ut consec</span> <br>
                    </div>
                    <div class='info-bio'>
                        <p>Fugiat reeprenderit</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
