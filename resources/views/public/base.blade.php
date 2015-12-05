<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Shear Delight Hair Styling</title>

    <meta name="robots" content="index,follow">
    <meta name="copyright" content="Copyright 2014 Shear Delight Hair Styling">
    <meta name="author" content="">

    <link rel="shortcut icon" href="https://web.archive.org/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/index_files/style.css">
    <!--[if IE]>
    <link type="text/css" rel="stylesheet" href="/ie.css">
    <![endif]-->

    <link rel="alternate" type="application/rss+xml" title="Shear Delight Hair Styling RSS Feed"
          href="http://www.sdhs.ca/feed/">
    <link rel="alternate" type="application/atom+xml" title="Shear Delight Hair Styling Atom Feed"
          href="http://www.sdhs.ca/feed/atom/">

    <script type="text/javascript" src="/index_files/jquery.js"></script>
    <link rel="index" title="Shear Delight Hair Styling" href="http://www.sdhs.ca/">
    <link rel="stylesheet" href="/styles.css" type="text/css">
    <style>#header + #content > #left > #rlblock_left,
        #content > #right > .dose > .dosesingle,
        #content > #center > .dose > .dosesingle {
            display: none !important;
        }</style>
</head>
<body>
<div id="container">

    <div id="header">
        <img src="/index_files/header_top.jpg" width="767" height="98" alt="Shear Delight Hair Styling">
        <img src="/index_files/header_bottom.jpg" width="767"  height="226" alt="Shear Delight Hair Styling">
    </div>

    <div id="menu_bar">
        <a href="/">Home</a> &nbsp;
        <a href="/salon-info">Salon Info</a> &nbsp;
        <a href="/monthly-specials">Monthly Specials</a> &nbsp;
        <a href="/whats-new">What's New</a> &nbsp;
        <a href="/contact">Contact Us</a>
    </div>
    <!-- end menu -->

    <div id="content">

        <h1>@yield('title')</h1>

        @yield('content')

    </div> <!-- end content -->

    <div id="footer">
        <a href="/">Home</a> &nbsp;
        <a href="/salon-info">Salon Info</a> &nbsp;
        <a href="/monthly-specials">Monthly Specials</a> &nbsp;
        <a href="/whats-new">What's New</a> &nbsp;
        <a href="/contact">Contact Us</a>
        <br>
        Copyright &copy; {!! date("Y") !!} Shear Delight Hair Styling.
    </div>

</div>

</body>
</html>