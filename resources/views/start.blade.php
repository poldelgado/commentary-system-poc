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
