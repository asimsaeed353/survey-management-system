<!DOCTYPE>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    
{{--    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">--}}

    <link rel="icon" type="image/png" href="images/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="images/favicon/favicon.svg" />
    <link rel="shortcut icon" href="images/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="SurveyEase" />
    <link rel="manifest" href="images/favicon/site.webmanifest" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>SurveyEase</title>

    {{$slot}}
</head>
