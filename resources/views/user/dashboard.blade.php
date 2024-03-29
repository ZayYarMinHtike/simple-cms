<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script> window.Laravel = { csrfToken: 'csrf_token() ' } </script>
        <title> User Dashboard </title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <style>
            html, body {
            background-color: #202B33;
            color: #738491;
            font-family: "Open Sans";
            font-size: 16px;
            font-smoothing: antialiased;
            overflow: hidden;
            }
        </style>
    </head>
    <body>
    <div id="app">
      <Homepage 
        :user-name='@json(auth()->user()->name)' 
        :user-id='@json(auth()->user()->id)'
      ></Homepage>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
    </html>