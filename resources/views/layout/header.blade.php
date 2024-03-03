<!Doctype html>
<html lang="en">
  <head>
   
  	<title>Sidebar 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
   
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
	  		<h1><a href="/admin/dashboard" class="logo">Admin Dashboard</a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="http://127.0.0.1:8000/admin/dashboard"><span class="fa fa-home mr-3"></span> Homepage</a>
          </li>
          <li>
            <a href="/admin/exam"><span class="fa fa-book mr-3"></span> Exams</a>
          </li>
         
        
          <li>
            <a href="#"><span class="fa fa-book mr-3"></span> Subject</a>
          </li>
          <li>
            <a href="/admin/qandA"><span class="fa fa-book mr-3"></span> Q & A</a>
          </li> <li>
            <a href="/logout"><span class="fa fa-sign-out mr-3"></span> Logout</a>
        </li>
          {{-- <li>
            <a href="#"><span class="fa fa-paper-plane mr-3"></span> Settings</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-paper-plane mr-3"></span> Information</a>
          </li> --}}
        </ul>

    	</nav>
<style>svg.w-5.h-5 {
  width: 26px;
} p.text-sm.text-gray-700.leading-5.dark\:text-gray-400 {
    margin-top: 13px;
}</style>


<!-- Styles -->
{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}