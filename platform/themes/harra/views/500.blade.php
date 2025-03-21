<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="robots" content="noindex,nofollow,noarchive" />
    <title>{{ __('An Error Occurred: Internal Server Error') }}</title>
    <style>
        body {
            background-color: #fff;
            color: #222;
            font: 16px/1.5 -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            margin: 0;
        }
        .container {
            margin: 30px;
            max-width: 600px;
        }
        h1 {
            color: #dc3545;
            font-size: 24px;
        }

        h2 {
            font-size: 18px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>{{ __('Oops! An Error Occurred') }}</h1>
    <h2>{{ __('The server returned a "500 Internal Server Error".') }}</h2>

    <p>
        {{ __('Something is broken. Please let us know what you were doing when this error occurred. We will fix it as soon as possible. Sorry for any inconvenience caused.') }}
    </p>
</div>
</body>
</html>
