<?php
// 开启Session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 生成验证码
function generateCaptcha($length = 4) {
    $chars = '23456789ABCDEFGHJKLMNPQRSTUVWXYZ'; // 去除容易混淆的字符
    $captcha = '';
    for ($i = 0; $i < $length; $i++) {
        $captcha .= $chars[random_int(0, strlen($chars) - 1)];
    }
    return $captcha;
}

// 生成验证码字符串
$captcha_code = generateCaptcha(4);
$_SESSION['captcha'] = $captcha_code;

// 创建图片
$width = 120;
$height = 40;
$image = imagecreatetruecolor($width, $height);

// 定义颜色
$bg_color = imagecolorallocate($image, 255, 255, 255); // 白色背景
$text_color = imagecolorallocate($image, 47, 79, 79); // 深灰色文字
$line_color = imagecolorallocate($image, 200, 200, 200); // 浅灰色干扰线
$dot_color = imagecolorallocate($image, 150, 150, 150); // 灰色干扰点

// 填充背景
imagefill($image, 0, 0, $bg_color);

// 添加干扰线
for ($i = 0; $i < 5; $i++) {
    imageline($image, random_int(0, $width), random_int(0, $height), random_int(0, $width), random_int(0, $height), $line_color);
}

// 添加干扰点
for ($i = 0; $i < 50; $i++) {
    imagesetpixel($image, random_int(0, $width), random_int(0, $height), $dot_color);
}

// 绘制验证码文字
$font_size = 5;
$x = 15;
for ($i = 0; $i < strlen($captcha_code); $i++) {
    $y = random_int(8, 15);
    $char_color = imagecolorallocate($image, random_int(0, 100), random_int(0, 100), random_int(0, 100));
    imagechar($image, $font_size, $x + $i * 25, $y, $captcha_code[$i], $char_color);
}

// 输出图片
header('Content-Type: image/png');
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

imagepng($image);
imagedestroy($image);
?>
