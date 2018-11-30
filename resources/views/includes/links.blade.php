
<!doctype html>
<html class="no-js" lang="{{app()->getLocale()}}">
    <head>
        <!-- title -->
        <title>Orbeli Analitical Research</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="author" content="">
        <!-- description -->
<?php


if(!empty($all_last_posts['post'][0]) && !empty($all_last_posts['folder'])) {
// var_dump('expression');die;

	switch ( $all_last_posts['folder']) {
		case 'post':
		$share_dur = $all_last_posts['post'][0]->p_duratioan;
		break;
		case 'opinion':
		$share_dur = $all_last_posts['post'][0]->o_duration;
		break;
		case 'announcement':
		$share_dur = $all_last_posts['post'][0]->a_duration;
		break;
		case 'news':
		$share_dur = $all_last_posts['post'][0]->n_duration;
		break;
		case 'video':
		$share_dur = $all_last_posts['post'][0]->duration;
		break;

		default:
		$share_dur = 1;
		break;
	}

}
?>


<meta property="og:locale" content="en_US" />
<meta property="og:locale։alternate" content="ru_RU" />
<meta property="og:locale։alternate" content="hy_AM" />
@isset($all_last_posts['post'])

@isset($all_last_posts['folder'])
<meta property="og:url"         content="{{ url()->full() }}" />
<meta property="og:type"        content="article" />
<meta property="og:title"       content="{{ isset($all_last_posts['post'][0])? ($all_last_posts['post'][0]->title . ' - '. $share_dur .' '.trans('text.minute')):'default title'}}" />
<meta property="og:description" content="{{ isset($all_last_posts['post'][0])? strip_tags($all_last_posts['post'][0]->short_text): 'Your description for current page'}}" />
<meta property="og:image"       content="{{ isset($all_last_posts['post'][0]) ? asset($all_last_posts['post'][0]->img) :'/images/logo-white.png'}}" />
@endisset


@if (str_contains(url()->full(), url( $all_last_posts['lang'].'/category/')) )
{{-- <link rel="stylesheet" href="{{url( $all_last_posts['lang'].'/category/')}}" /> --}}
<meta property="og:url"         content="{{ url()->full() }}" />
<meta property="og:type"        content="article" />
<meta property="og:title"       content="{{ $all_last_posts['post'][0]->title . ' - ' .$all_last_posts['post'][0]->p_duratioan.trans('text.minute') }}" />
<meta property="og:description" content="{{ strip_tags( $all_last_posts['post'][0]->short_text )}}" />
<meta property="og:image"       content="{{ asset($all_last_posts['post'][0]->img) }}" />
@endif

@endisset

@isset($all_last_posts['main_post'])
<meta property="og:url"         content="{{ url()->full() }}" />
<meta property="og:type"        content="website" />
<meta property="og:title"       content="{{ $all_last_posts['main_post'][0]->title . ' - ' .$all_last_posts['main_post'][0]->p_duratioan.trans('text.minute') }}" />
<meta property="og:description" content="{{ strip_tags( $all_last_posts['main_post'][0]->short_text )}}" />
<meta property="og:image"       content="{{ asset($all_last_posts['main_post'][0]->img) }}" />
@endisset


       
        <meta name="description" content="{{isset($all_last_posts['post'][0])?$all_last_posts['post'][0]->meta_d:'description'}}">        
        <meta name="keywords" content="{{isset($all_last_posts['post'][0]) ? $all_last_posts['post'][0]->meta_k:'keywords'}}">            
      
        
        <!-- favicon -->
        <link rel="shortcut icon" href="images/favicon.png">
        <link rel="apple-touch-icon" href="images/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
        <!-- animation -->
        <link rel="stylesheet" href="/css/animate.css" />
        <!-- bootstrap -->
        <link rel="stylesheet" href="/css/bootstrap.min.css" />
        <!-- et line icon --> 
        <link rel="stylesheet" href="/css/et-line-icons.css" />
        <!-- font-awesome icon -->
        <link rel="stylesheet" href="/css/font-awesome.min.css" />
        <!-- themify icon -->
        <link rel="stylesheet" href="/css/themify-icons.css">
        <!-- swiper carousel -->
        <link rel="stylesheet" href="/css/swiper.min.css">
        <!-- justified gallery  -->
        <link rel="stylesheet" href="/css/justified-gallery.min.css">
        <!-- magnific popup -->
        <link rel="stylesheet" href="/css/magnific-popup.css" />
        <!-- revolution slider -->
        <link rel="stylesheet" type="text/css" href="/revolution/css/settings.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="/revolution/css/layers.css">
        <link rel="stylesheet" type="text/css" href="/revolution/css/navigation.css">
        <!-- bootsnav -->
        <link rel="stylesheet" href="/css/bootsnav.css">
        <!-- style -->
        <link rel="stylesheet" href="/css/style.css" />
        <!-- responsive css -->
        <link rel="stylesheet" href="/css/responsive.css" />
        <link rel="stylesheet" href="/css/fullcalendar.min.css"/>
        <link href="https://fonts.googleapis.com/css?family=Warnes" rel="stylesheet">



      <!--
        [if IE]>
            <script src="js/html5shiv.js"></script>
        <![endif]-->
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
