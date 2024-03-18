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
		{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css"> --}}
		<link rel="stylesheet" href="/css/richtexteditor/rte_theme_default.css" />
		<!--Regular Datatables CSS-->
		<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
		<!--Responsive Extension Datatables CSS-->
		<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
        @vite('resources/css/app.css')
		<meta name="body" content="" />
	</head>
	<style>
		/*Overrides for Tailwind CSS */

		/*Form fields*/
		.dataTables_wrapper select,
		.dataTables_wrapper .dataTables_filter input {
			color: #4a5568;
			/*text-gray-700*/
			padding-left: 1rem;
			/*pl-4*/
			padding-right: 1rem;
			/*pl-4*/
			padding-top: .5rem;
			/*pl-2*/
			padding-bottom: .5rem;
			/*pl-2*/
			line-height: 1.25;
			/*leading-tight*/
			border-width: 1px;
			/*border-2*/
			border-radius: .25rem;
			border-color: #D9DADE;
			/*border-gray-200*/
			background-color: #F5F6FB;
			/*bg-gray-200*/
			
		}
		.dataTables_wrapper .dataTables_filter input:focus {
			outline: none;
			
		}

		/*Row Hover*/
		table.dataTable.hover tbody tr:hover,
		table.dataTable.display tbody tr:hover {
			background-color: #ebf4ff;
			/*bg-indigo-100*/
		}

		/*Pagination Buttons*/
		.dataTables_wrapper .dataTables_paginate .paginate_button {
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Pagination Buttons - Current selected */
		.dataTables_wrapper .dataTables_paginate .paginate_button.current {
			color: #fff !important;
			/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			/*shadow*/
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			background: #D7D1C6 !important;
			/*bg-indigo-500*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Pagination Buttons - Hover */
		.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
			color: #fff ;
			/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			/*shadow*/
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			background: #D7D1C6 !important;
			/*bg-indigo-500*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Add padding to bottom border */
		table.dataTable.no-footer {
			border-bottom: 1px solid #e2e8f0;
			/*border-b-1 border-gray-300*/
			margin-top: 0.75em;
			margin-bottom: 0.75em;
		}

		/*Change colour of responsive icon*/
		table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
		table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
			background-color: #D7D1C6 !important;
			/*bg-indigo-500*/
		}
	</style>
	<!-- jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

	<!--Datatables -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

	<script type="text/javascript" src="/js/richtexteditor/rte.js"></script>
	<script type="text/javascript" src='/js/richtexteditor/all_plugins.js'></script>
	<script src="/js/script.js"></script>
	<body class="bg-body overflow-x-hidden ">
        @include('sweetalert::alert')
		<main class="md:grid-cols-12 md:grid">
        @include('dashboard.partials.sidebar')
		<section class="main-content col-span-10">
			@include('dashboard.partials.navbar')

            @yield('container')
		</section>
		</main>
    </body>

</html>