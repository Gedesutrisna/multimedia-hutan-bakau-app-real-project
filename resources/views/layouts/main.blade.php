<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Document</title>
		<link rel="stylesheet" href="./output.css" />
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link
			href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
			rel="stylesheet"
		/>
		<link rel="stylesheet" type="text/css" href="/css/trix.css">
		<script type="text/javascript" src="/js/trix.js"></script>
		<link rel="stylesheet" href="/css/richtexteditor/rte_theme_default.css" />
        @vite('resources/css/app.css')
		<meta name="body" content="" />
	</head>
	<script type="text/javascript" src="/js/richtexteditor/rte.js"></script>
	<script type="text/javascript" src='/js/richtexteditor/all_plugins.js'></script>
	<script src="/js/script.js"></script>
	<body class="bg-body overflow-x-hidden ">
        @include('sweetalert::alert')
		<main class="md:grid-cols-12 md:grid">
		<section class="main-content col-span-10">
            @yield('container')
		</section>
		</main>
    </body>

</html>