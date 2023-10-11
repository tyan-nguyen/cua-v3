<!DOCTYPE html>
<html style="" class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths"><head>
    <title>Demo WEB Cửa Nhôm</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css?v=15">
    <link rel="stylesheet" type="text/css" href="/css/custom.css?v=19">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700&family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet"> -->
	<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500&family=Montserrat:wght@500&family=Roboto+Serif:opsz@8..144&family=Inter:wght@500&family=Literata:opsz,wght@7..72,500&display=swap" rel="stylesheet">
	<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"> -->
	<link rel="stylesheet" type="text/css" href="/css/fontawesome-free-6.4.2-web/css/all.min.css">
    <!-- script
    ================================================== -->
    <script src="/js/modernizr.js"></script>
  </head>
  <body class="" data-bs-spy="scroll" data-bs-target="#navbar" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" tabindex="0">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
        <title>Search</title>
        <path fill="currentColor" d="M19 3C13.488 3 9 7.488 9 13c0 2.395.84 4.59 2.25 6.313L3.281 27.28l1.439 1.44l7.968-7.969A9.922 9.922 0 0 0 19 23c5.512 0 10-4.488 10-10S24.512 3 19 3zm0 2c4.43 0 8 3.57 8 8s-3.57 8-8 8s-8-3.57-8-8s3.57-8 8-8z"></path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="user" viewBox="0 0 16 16">
        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"></path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="cart" viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="arrow-left" viewBox="0 0 32 32">
        <path fill="currentColor" d="m13.281 6.781l-8.5 8.5l-.687.719l.687.719l8.5 8.5l1.438-1.438L7.938 17H28v-2H7.937l6.782-6.781z"></path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="arrow-right" viewBox="0 0 32 32">
        <path fill="currentColor" d="M18.719 6.781L17.28 8.22L24.063 15H4v2h20.063l-6.782 6.781l1.438 1.438l8.5-8.5l.687-.719l-.687-.719z"></path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="shipping-fast" viewBox="0 0 32 32">
        <path fill="currentColor" d="M0 6v2h19v15h-6.156c-.446-1.719-1.992-3-3.844-3c-1.852 0-3.398 1.281-3.844 3H4v-5H2v7h3.156c.446 1.719 1.992 3 3.844 3c1.852 0 3.398-1.281 3.844-3h8.312c.446 1.719 1.992 3 3.844 3c1.852 0 3.398-1.281 3.844-3H32v-8.156l-.063-.157l-2-6L29.72 10H21V6zm1 4v2h9v-2zm20 2h7.281L30 17.125V23h-1.156c-.446-1.719-1.992-3-3.844-3c-1.852 0-3.398 1.281-3.844 3H21zM2 14v2h6v-2zm7 8c1.117 0 2 .883 2 2s-.883 2-2 2s-2-.883-2-2s.883-2 2-2zm16 0c1.117 0 2 .883 2 2s-.883 2-2 2s-2-.883-2-2s.883-2 2-2z"></path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="shopping-cart" viewBox="0 0 32 32">
        <path fill="currentColor" d="M5 7c-.55 0-1 .45-1 1s.45 1 1 1h2.219l2.625 10.5c.222.89 1.02 1.5 1.937 1.5H23.25c.902 0 1.668-.598 1.906-1.469L27.75 10H11l.5 2h13.656l-1.906 7H11.781L9.156 8.5A1.983 1.983 0 0 0 7.22 7zm17 14c-1.645 0-3 1.355-3 3s1.355 3 3 3s3-1.355 3-3s-1.355-3-3-3zm-9 0c-1.645 0-3 1.355-3 3s1.355 3 3 3s3-1.355 3-3s-1.355-3-3-3zm0 2c.563 0 1 .438 1 1c0 .563-.438 1-1 1c-.563 0-1-.438-1-1c0-.563.438-1 1-1zm9 0c.563 0 1 .438 1 1c0 .563-.438 1-1 1c-.563 0-1-.438-1-1c0-.563.438-1 1-1z"></path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="gift" viewBox="0 0 32 32">
        <path fill="currentColor" d="M12 5c-1.645 0-3 1.355-3 3c0 .352.074.684.188 1H4v6h1v13h22V15h1V9h-5.188A2.95 2.95 0 0 0 23 8c0-1.645-1.355-3-3-3c-1.75 0-2.938 1.328-3.719 2.438c-.105.148-.187.292-.281.437c-.094-.145-.176-.29-.281-.438C14.938 6.329 13.75 5 12 5zm0 2c.625 0 1.438.672 2.063 1.563c.152.218.128.23.25.437H12c-.566 0-1-.434-1-1c0-.566.434-1 1-1zm8 0c.566 0 1 .434 1 1c0 .566-.434 1-1 1h-2.313c.122-.207.098-.219.25-.438C18.563 7.673 19.375 7 20 7zM6 11h20v2h-9v-1h-2v1H6zm1 4h18v11h-8V16h-2v10H7z"></path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="return" viewBox="0 0 32 32">
        <path fill="currentColor" d="M16 3C8.832 3 3 8.832 3 16s5.832 13 13 13s13-5.832 13-13h-2c0 6.086-4.914 11-11 11S5 22.086 5 16S9.914 5 16 5c3.875 0 7.262 1.984 9.219 5H20v2h8V4h-2v3.719C23.617 4.844 20.02 3 16 3z"></path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="quote" viewBox="0 0 24 24">
        <path fill="currentColor" d="m15 17l2-4h-4V6h7v7l-2 4h-3Zm-9 0l2-4H4V6h7v7l-2 4H6Z"></path>
      </symbol>      
      <symbol xmlns="http://www.w3.org/2000/svg" id="nav-icon" viewBox="0 0 16 16">
        <path d="M14 10.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 .5-.5zm0-3a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0 0 1h7a.5.5 0 0 0 .5-.5zm0-3a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0 0 1h11a.5.5 0 0 0 .5-.5z"></path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="close" viewBox="0 0 16 16">
        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"></path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="navbar-icon" viewBox="0 0 16 16">
        <path d="M14 10.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 .5-.5zm0-3a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0 0 1h7a.5.5 0 0 0 .5-.5zm0-3a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0 0 1h11a.5.5 0 0 0 .5-.5z"></path>
      </symbol>
      
      
      <!-- in view -->
      <symbol xmlns="http://www.w3.org/2000/svg" id="star-outline" viewBox="0 0 15 15">
        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
          d="M7.5 9.804L5.337 11l.413-2.533L4 6.674l2.418-.37L7.5 4l1.082 2.304l2.418.37l-1.75 1.793L9.663 11L7.5 9.804Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="star-solid" viewBox="0 0 15 15">
        <path fill="currentColor"
          d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="plus" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M19 11h-6V5a1 1 0 0 0-2 0v6H5a1 1 0 0 0 0 2h6v6a1 1 0 0 0 2 0v-6h6a1 1 0 0 0 0-2Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="minus" viewBox="0 0 24 24">
        <path fill="currentColor" d="M19 11H5a1 1 0 0 0 0 2h14a1 1 0 0 0 0-2Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="heart" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M20.16 4.61A6.27 6.27 0 0 0 12 4a6.27 6.27 0 0 0-8.16 9.48l7.45 7.45a1 1 0 0 0 1.42 0l7.45-7.45a6.27 6.27 0 0 0 0-8.87Zm-1.41 7.46L12 18.81l-6.75-6.74a4.28 4.28 0 0 1 3-7.3a4.25 4.25 0 0 1 3 1.25a1 1 0 0 0 1.42 0a4.27 4.27 0 0 1 6 6.05Z" />
      </symbol>
      
    </svg>

    <div id="preloader" style="display: none;">
      <span class="loader">
        <span class="loader-inner"></span>
      </span>
    </div>

    <div class="search-box position-relative overflow-hidden w-100">
      <div class="search-wrap">
        <div class="close-button position-absolute">
          <svg class="close" width="22" height="22">
            <use xlink:href="#close"></use>
          </svg>
        </div>
        <form id="search-form" class="text-center pt-3" action="" method="">
          <input type="text" class="search-input fs-5 p-4 bg-transparent" placeholder="Tìm kiếm...">
          <svg class="search" width="22" height="22">
            <use xlink:href="#search"></use>
          </svg>
        </form>
      </div>
    </div> 