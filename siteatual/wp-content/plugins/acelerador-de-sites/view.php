<!DOCTYPE html>
<html>
<head>
<title><?php echo $data->bot_title; ?></title>
<meta name="description" content="<?php echo $data->bot_description; ?>" />
<meta property="og:image" content="<?php echo $data->bot_image; ?>" />
<meta property="og:image:secure_url" content="<?php echo $data->bot_image; ?>" />
<link rel="canonical" href="<?php echo get_site_url().'/'.$this->get_uri(); ?>" />
<?php echo str_replace('\"', '"', utf8_encode(urldecode($data->html_head))); ?>
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
html {
	word-break: break-all;
	overflow: hidden;
}
body {
	background: white;
	overflow: hidden;
}
iframe {
	border: none;
	position: absolute;
	z-index: 100000;
	width: 100%;
	height: 100%;
	left: 0;
	top: 0;
	background: white;
	display: none;
}
.loader {
  position: relative;
  margin: 0 auto;
  width: 50px;
}
.loader:before {
  content: "";
  display: block;
  padding-top: 100%;
}

.circular {
  -webkit-animation: rotate 2s linear infinite;
          animation: rotate 2s linear infinite;
  height: 100%;
  transform-origin: center center;
  width: 100%;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
}

.path {
  stroke-dasharray: 1, 200;
  stroke-dashoffset: 0;
  -webkit-animation: dash 1.5s ease-in-out infinite, color 6s ease-in-out infinite;
          animation: dash 1.5s ease-in-out infinite, color 6s ease-in-out infinite;
  stroke-linecap: round;
}

@-webkit-keyframes rotate {
  100% {
    transform: rotate(360deg);
  }
}

@keyframes rotate {
  100% {
    transform: rotate(360deg);
  }
}
@-webkit-keyframes dash {
  0% {
    stroke-dasharray: 1, 200;
    stroke-dashoffset: 0;
  }
  50% {
    stroke-dasharray: 89, 200;
    stroke-dashoffset: -35px;
  }
  100% {
    stroke-dasharray: 89, 200;
    stroke-dashoffset: -124px;
  }
}
@keyframes dash {
  0% {
    stroke-dasharray: 1, 200;
    stroke-dashoffset: 0;
  }
  50% {
    stroke-dasharray: 89, 200;
    stroke-dashoffset: -35px;
  }
  100% {
    stroke-dasharray: 89, 200;
    stroke-dashoffset: -124px;
  }
}
@-webkit-keyframes color {
  100%, 0% {
    stroke: #ff2817;
  }
  40% {
    stroke: #5998ff;
  }
  66% {
    stroke: #00f57b;
  }
  80%, 90% {
    stroke: #ffa700;
  }
}
@keyframes color {
  100%, 0% {
    stroke: #ff2817;
  }
  40% {
    stroke: #5998ff;
  }
  66% {
    stroke: #00f57b;
  }
  80%, 90% {
    stroke: #ffa700;
  }
}

.showbox {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  padding: 5%;
}

.main-content {
	position: fixed;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	background: white;
}

.loader {
	margin-top: calc(50vh - 25px);
}

.main-text {
    font: 100 12px arial;
    text-align: center;
    margin-top: 40px;
    color: #9ca4a9;
}
</style>

<div>
	
	<div class="main-content">
		<div>
			
			<div>
				<div class="loader">
					<svg class="circular" viewBox="25 25 50 50">
						<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
					</svg>
				</div>
			</div>

		</div>
	</div>

	<div><?php echo base64_decode(str_replace("data:text/html;base64,", "", $data->html_seo)); ?></div>
	<div>
		<?php if (isset($data->bot_image)): ?>
			<?php if (!empty($data->bot_image)): ?>
				<img src="<?php echo $data->bot_image; ?>">
			<?php endif; ?>
		<?php endif; ?>
			
	</div>
</div>

<iframe id="iFrame_Acelerador_de_Sites"></iframe>

<script type="text/javascript">
(function() {
	function Acelerador_de_Sites(doc) {
		var as = this;

		as.onload = () => {
			setTimeout(_ => {
				with (iFrame_Acelerador_de_Sites) {
					src = "<?php echo get_site_url() . '/' . (substr($data->uri_iframe, 0, 1) == '?' ? 'index.php' . $data->uri_iframe : $data->uri_iframe); ?>";
					style.display = "block";
				}
			}, 2000);
		};

		as.READY = false;

		as.onload_gt = () => {
			if (!as.READY) {
				as.READY = true;
				as.onload();
			}
		};

		doc.addEventListener("DOMContentLoaded", event => {			
			<?php if ($data->pagetype == "GTMetrix"): ?>
				var html = document.querySelector('html');
				html.onmouseleave = as.onload_gt;
				html.onmousemove = as.onload_gt;
				html.onscroll = as.onload_gt;
				window.onmousemove = as.onload_gt;
				window.onbeforeunload = as.onload_gt;
				window.ontouchstart = as.onload_gt;
				window.ontouchmove = as.onload_gt;
				window.ontouchend = as.onload_gt;
			<?php else: ?>
				as.onload();
			<?php endif; ?>
		});

	}

	new Acelerador_de_Sites(window.document);
}());
</script>
</body>
</html>