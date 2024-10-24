
    <script src="{{asset('public/profile-template')}}/js/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('public/profile-template')}}/css/flipbook.style.css">
    <script src="{{asset('public/profile-template')}}/js/flipbook.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery("#container").flipBook({
                pdfUrl:"{{asset('public/profile-template')}}/profile.pdf",
                assets: {
                    flipMp3 : "{{asset('public/profile-template')}}/turnPage.mp3"
                },
                singlePageModeIfMobile: true,
            });
        })
    </script>

<div id="container"></div>
</body>
