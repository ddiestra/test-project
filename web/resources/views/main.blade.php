<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="app-domain" content="{{config('app.domain')}}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Font awesome icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" integrity="sha256-R91pD48xW+oHbpJYGn5xR0Q7tMhH4xOrWn1QqMRINtA=" crossorigin="anonymous" />
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  </head>
  <body>
    <div id="app"></div>
    <script type="text/javascript" src="{{ mix('js/manifest.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ mix('js/vendor.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ mix('js/app.js') }}" type="text/javascript"></script>
  </body>
</html>