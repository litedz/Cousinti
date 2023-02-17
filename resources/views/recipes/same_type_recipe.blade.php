<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>

    <meta name='viewport' content='width=device-width, initial-scale=1'>
    @include('scripts.scripts_css')

</head>

<body>
    <div id="app">
        @include('admin.top-nav-bar')
        <similar-recipes type='{{ request()->type }}'></similar-recipes>

    </div>
    @include('scripts.scripts_js')
</body>

</html>