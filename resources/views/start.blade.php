<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Post Messaging System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
           background-color: #eee;
        }

        .bdge {
        height: 21px;
        background-color: orange;
        color: #fff;
        font-size: 11px;
        padding: 8px;
        border-radius: 4px;
        line-height: 3px;
        }

        .comments {
        text-decoration: underline;
        text-underline-position: under;
        cursor: pointer;
        }

        .dot {
        height: 7px;
        width: 7px;
        margin-top: 3px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        }

        .hit-voting:hover {
        color: blue;
        }

        .hit-voting {
        cursor: pointer;
        }
    </style>
	@vite('resources/sass/app.scss')
</head>
<body>
	<div id="app">

    </div>
    <script type="text/javascript">
        window.baseURL = "{{env('APP_URL') ?? ''}}";
    </script>
	@vite('resources/js/app.js')
</body>

</html>
