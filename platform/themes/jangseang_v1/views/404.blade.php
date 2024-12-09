<!DOCTYPE html>
<html>
    <head id="ctl00_Head1">
        <title>
            Không tìm thấy trang
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="icon" type="image/ico" href="/Data/logos/favicon.ico" />
        <!--if lt IE 9-->
        <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    </head>
    <body  class="admin whiteskins pagenotfound administration">
        <div id="wrapper">
            <main id="main">
                <div class="container-fluid-full">
                    <div class="row">
                        <div id="page-content-wrapper" class="col-lg-10 col-md-9 col-sm-8">
                            <div id="ctl00_divCenter" class="center-nomargins cmszone">
                                <div class="errorPage">
                                    <p class="name">404</p>
                                    <p class="description">
                                        Không tìm thấy trang
                                    </p>
                                    <p>
                                        <a id="ctl00_mainContent_hplHomepage" class="btn btn-warning" href="{{url('')}}">Quay về trang chủ</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer id="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <section class="copyright">
                                <p>
                                  {{ theme_option("copyright") }}
                                </p>
                            </section>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
    </body>
    <style type="text/css">
    p {
        margin: 0 0 10px;
    }
    html.whiteskins, body.whiteskins {
        font-family: 'Noto Sans', sans-serif;
        font-size: 13px;
        height: 100%;
        background-color: #f2f2f2;
    }
    html.whiteskins .errorPage, body.whiteskins .errorPage {
        text-align: center;
    }

        html.whiteskins .errorPage .name, body.whiteskins .errorPage .name {
        font-size: 220px;
        color: #ffffff;
        text-shadow: 0 1px 0 #cccccc, 0 2px 0 #c9c9c9, 0 3px 0 #bbbbbb, 0 4px 0 #b9b9b9, 0 5px 0 #aaaaaa, 0 6px 1px rgba(0, 0, 0, 0.1), 0 0 5px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.3), 0 3px 5px rgba(0, 0, 0, 0.2), 0 5px 10px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.2), 0 20px 20px rgba(0, 0, 0, 0.15);
    }
    html.whiteskins .errorPage a, body.whiteskins .errorPage a {
        margin-bottom: 50px;
        color: #ffffff;
    }
    .btn {
        display: inline-block;
        margin-bottom: 0;
        font-weight: normal;
        text-align: center;
        vertical-align: middle;
        touch-action: manipulation;
        cursor: pointer;
        background-image: none;
        border: 1px solid transparent;
        white-space: nowrap;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        border-radius: 4px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .btn-warning {
        color: #ffffff;
        background-color: #f0ad4e;
        border-color: #eea236;
    }
    #footer {
        border-top: 1px solid rgba(189, 195, 199, 0.5);
        padding: 30px 0;
        text-align: center;
        font-size: 12px;
    }
    </style>
</html>
