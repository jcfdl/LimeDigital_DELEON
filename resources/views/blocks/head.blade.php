<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="shortcut icon" sizes="196x196" href="{{ asset('images/logo.png') }}">
<title>{{ config('app.name', 'Lime Digital Technical Exam') }}</title>
<link rel="stylesheet" href="{{ mix('css/fonts.css') }}">
<link rel="stylesheet" href="{{ mix('css/core.app.css') }}">
<link rel="stylesheet" href="{{ mix('css/admin-custom.css') }}">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
<script src="{{ mix('js/app.breakpoints.js') }}"></script>
<script>Breakpoints()</script>
<script src="https://cdn.tiny.cloud/1/q1yjxox3tfie1kts412j3v7ncihvq1ncuog7aizja4blsnqk/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
