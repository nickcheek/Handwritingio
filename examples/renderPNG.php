<?php
include 'vendor/autoload.php';

use Nickcheek\Handwriting\Writer;

$test = new Writer('your_user_key','your_secret_key');

$build = $test->font('2D5QW0F80001')->build();

echo $test->renderPNGImage($build);
