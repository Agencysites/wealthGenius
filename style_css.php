<?php 
$is_live = (
    (isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'a-c-m-e.in') !== false) ||
    (strpos(__FILE__, '/home/u133917450/') !== false)
);

if ($is_live) {
    $base_url = "https://a-c-m-e.in/wealthGenius/";
} else {
    $base_url = "http://localhost:8080/web/wealth-genius-new/";
}
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?= $base_url ?>assets/images/favicon.ico" type="image/x-icon">

<!-- ___________________ WEB CSS___________________ -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css"/>
<link rel='stylesheet' href='<?= $base_url ?>assets/css/style.css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>