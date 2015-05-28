<!doctype html>

<html>
	<head>
		<link rel="shortcut icon" href="https://crowdtogo.com/wp-content/themes/crowdtogo3/ico/favicon.png">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('title')</title>
		<!-- jquery file is added below -->
		{{ HTML::script('js/jquery/jquery.min.js') }}
		
		

		<!-- Bootstrap core CSS -->
	    {{ HTML::style('css/bootstrap.min.css') }}

		<!-- Custom styles for bootstrap -->
	    {{ HTML::style('css/overwrite.css') }}

		<!-- Custom styles for fontawesome icon -->
	    {{ HTML::style('css/font-awesome.css') }}

	    <!-- Flexslider -->
	    {{ HTML::style('css/flexslider.css') }}

	    <!-- prettyPhoto -->	
		{{ HTML::style('css/prettyPhoto.css') }}

	    <!-- animate -->
	    {{ HTML::style('css/animate.css') }}
		
	    <!-- Custom styles for this template -->
	    {{ HTML::style('css/style.css') }}
	    {{ HTML::style('css/custom.css') }}
		
		<!-- Font for this template -->
	    {{ HTML::style('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700') }}
		
		<!-- Custom styles for template skin -->
	    {{ HTML::style('skins/skin7/skin.css') }}

	    <style>
	    	#pass-strength-result {
		    background-color: #eee;
		    border-color: #ddd !important;
		    border-style: solid;
		    border-width: 1px;
		    float: left;
		    margin: 13px 5px 5px 1px;
		    padding: 3px 5px;
		    text-align: center;
		    width: 200px;
		}

		#pass-strength-result.bad {
		    background-color: #ffb78c;
		    border-color: #ddd !important;
		}


		#pass-strength-result.short {
		    /* background-color: #ffa0a0; */
		    background-color: #ffec8b;
		    border-color: #ddd !important;
		}

		#pass-strength-result.good {
		    /* background-color: #ffec8b; */
		    background-color: #c3ff88;
		    border-color: #ddd !important;
		}

		#pass-strength-result.strong {
		    /* background-color: #c3ff88; */
		    background-color: #44a20b; 
		    border-color: #ddd !important;
		}
		</style>

		@yield('header');

	</head>

	<body role="document"  >

		<!-- Start navigation -->
		<header id="crowdie-header">
			<div class="navbar navbar-default" role="navigation">
				<div class="container" style="padding-top: 10px">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><img src="../img/ctg-logo.png" alt="" /></a>
					</div>

					<div class="collapse navbar-collapse" style="margin-right:-80px !important;">
						<ul class="nav navbar-nav navbar-right navbar-user">
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               <i class="fa fa-bars fa-2x"> </i></b>
                            </a>



                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/"><i class="fa fa-ticket"></i> Reservation</a>
                                </li>
                                <li>
                                    <a href="/cancel"><i class="fa fa-times"></i> Cancellation</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</header>
		<!-- End navigation -->
		
		<section id="home" class="bgslider-wrapper">
			<div id="animated-bg">
				<div id="animated-bg2" class="bg-slider"></div>
			</div>
			<div class="home-contain">
				<div class="container">
					<div class="row wow fadeInDown" data-wow-delay="0.2s">
						<div class="col-md-8 col-md-offset-2 home-headline">
							<h4 style="margin-top: 20px;">@yield('headline')</h4>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Start introduce -->
		<section id="intro" class="contain colorbg">
			<div class="container">
				@yield('pagination')
				<h4 class="form-header">@yield('form-header')</h4>
				<div class="forms @yield('form-size') wow bounceInDown mainContent" data-wow-delay="0.2s">
					@yield('content')
				</div>
				<br/><br/>
			</div>
		</section>
		<!-- End introduce -->
		
		<!-- Start footer -->
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<a href="#home" class="totop wow rotateIn btn-scroll" data-wow-delay="0.4s" target="_blank"><i class="fa fa-chevron-up"></i></a>
						<a href="#" class="social-network wow bounceInDown" data-wow-delay="0.2s" target="_blank"><i class="fa fa-facebook"></i></a>
						<a href="#" class="social-network wow bounceInDown" data-wow-delay="0.4s" target="_blank"><i class="fa fa-twitter"></i></a>
						<a href="#" class="social-network wow bounceInDown" data-wow-delay="0.8s" target="_blank"><i class="fa fa-linkedin"></i></a>
					</div>
				</div>
			</div>
			<div class="subfooter">
				<p class="copyrigh">2014 &copy; Copyright <a href="#">Busy Buddies Airlines</a>.</p>
				<p>All rights Reserved. Powered by <font color="#e74430">Laravel</font></p>
			</div>
		</footer>
		<!-- End footer -->

		
		<!-- Bootstrap core JavaScript
	    ================================================== -->
	    <!-- Placed at the end of the document so the pages load faster -->
	    {{ HTML::script('js/jquery.min.js') }}
	    {{ HTML::script('js/bootstrap.min.js') }}

		<!-- Fixed navigation -->
		{{ HTML::script('js/navigation/jquery.smooth-scroll.js') }}
		{{ HTML::script('js/navigation/navbar.js') }}
		{{ HTML::script('js/navigation/waypoints.min.js') }}

		<!-- WOW JavaScript -->
		{{ HTML::script('js/wow.min.js') }}
		
		<!-- JavaScript bgSlider slider -->
		{{ HTML::script('js/bgslider/bgSlider.js') }}

		<!-- Flexslider -->
		{{ HTML::script('js/flexslider/jquery.flexslider.js') }}
		{{ HTML::script('js/flexslider/setting.js') }}

		<!-- prettyPhoto -->
		{{ HTML::script('js/prettyPhoto/jquery.prettyPhoto.js') }}
		{{ HTML::script('js/prettyPhoto/setting.js') }}

		<!-- Contact validation js -->
	    {{ HTML::script('js/validation.js') }}
		
		<!-- Custom JavaScript -->
		{{ HTML::script('js/custom.js') }}

		<!-- Datepicker -->
		{{ HTML::style('datepicker/foundation-datepicker.css') }}
		{{ HTML::script('datepicker/foundation-datepicker.js') }}

		<!-- Masked Input -->
		{{ HTML::script('js/jquery/jquery.maskedinput-1.3.1.min_.js') }}
	   	<script type="text/javascript">
		      jQuery(function($) {
		         $.mask.definitions['~']='[+-]';
		         $('#date').mask('99/99/9999');
		         $('#phone').mask('(999) 999-9999');
		         $('#phoneext').mask("(999) 999-9999? x99999");
		         $("#tin").mask("99-9999999");
		         $("#ssn").mask("999-99-9999");
		         $("#product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
		         $("#eyescript").mask("~9.99 ~9.99 999");

		         $("#zip").mask("99999");
		         $('#birthdate').mask('99/99/9999');
		         $('#license').mask('999-99-9999');
		         $('.time').mask('bn:sn^m');
		         $('#contact').mask('(999)-999-9999');
		      });
	   	</script>	

	   	<script>
	   		$(function() {
	            $('form').bind('submit', function() {
	                $(this).find('input:submit').attr('disabled', true);
	            });
	        });
	   	</script>	



		@yield('footer')

		<!--Table sorter credit by Christian Bach.

			Documentation written by Brian Ghidinelli, based on Mike Alsup's great documention.

			John Resig for the fantastic jQuery-->
	   	{{ HTML::script('js/table_sorter/jquery.tablesorter.min.js') }}
	   	{{ HTML::script('js/table_sorter/docs.js') }}
		{{ HTML::style('css/table_sorter/jq.css') }}
		{{ HTML::style('css/table_sorter/theme/style.css') }}
		<script type="text/javascript">
		$(document).ready(function(){
			if( $("#tablesorter-table") ){
				$("#tablesorter-table").tablesorter();
			}
		});
		</script>
	</body>

</html>