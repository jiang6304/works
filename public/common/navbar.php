<?php
/**
 * 导航栏组件
 * 参数: $current_page - 当前页面标识 (home, project, store, message, post, join)
 */
function getNavbar($current_page = '') {
    // 确保session已启动
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // 检测用户是否登录
    $is_logged_in = isset($_SESSION['home_uid']) || isset($_SESSION['admin_uid']);
    $username = '';
    if (isset($_SESSION['home_username'])) {
        $username = $_SESSION['home_username'];
    } elseif (isset($_SESSION['admin_uid'])) {
        $username = '管理员';
    }

    $nav_items = [
        'home' => ['name' => '首页', 'url' => '首页.php'],
        'project' => ['name' => '主营项目', 'url' => '主营项目.php'],
        'store' => ['name' => '门店设计', 'url' => '门店设计.php'],
        'message' => ['name' => '留言板', 'url' => '留言/留言.php'],
        'post' => ['name' => '发表留言', 'url' => '留言/发布留言.php'],
        'join' => ['name' => '意向加盟', 'url' => '加盟/加盟.php'],
    ];

    $html = '<div class="shortcut">' . "\n";
    $html .= '    <div class="w" style="font: \'微软雅黑\';">' . "\n";
    $html .= '        <div class="fl" align="center">' . "\n";
    $html .= '            <ul>' . "\n";
    $html .= '                <li>' . "\n";
    $html .= '                    <a class="logo-link" href="首页.php"><img src="img/ming.png" alt="闲云野鹤" /></a>' . "\n";
    $html .= '                </li>' . "\n";

    foreach ($nav_items as $key => $item) {
        $active_class = ($current_page === $key) ? ' active' : '';
        $html .= '                <li>' . "\n";
        $html .= '                    <a class="' . $active_class . '" href="' . $item['url'] . '">' . $item['name'] . '</a>' . "\n";
        $html .= '                </li>' . "\n";
    }

    $html .= '            </ul>' . "\n";
    $html .= '        </div>' . "\n";
    $html .= '        <div class="fr">' . "\n";
    $html .= '            <ul>' . "\n";

    if ($is_logged_in) {
        $html .= '                <li><a href="#">欢迎，' . htmlspecialchars($username, ENT_QUOTES, 'UTF-8') . '</a></li>' . "\n";
        $html .= '                <li><a href="留言/我的留言.php">我的留言</a></li>' . "\n";
        $html .= '                <li><a href="logout.php">退出登录</a></li>' . "\n";
    } else {
        $html .= '                <li><a href="login_page.php">请登录</a></li>' . "\n";
        $html .= '                <li><a href="register.html">免费注册</a></li>' . "\n";
    }

    $html .= '            </ul>' . "\n";
    $html .= '        </div>' . "\n";
    $html .= '    </div>' . "\n";
    $html .= '</div>' . "\n";

    return $html;
}

/**
 * 子目录页面使用的导航栏（路径需要调整）
 * 用于留言板、加盟等子目录页面
 */
function getNavbarSub($current_page = '') {
    // 确保session已启动
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $is_logged_in = isset($_SESSION['home_uid']) || isset($_SESSION['admin_uid']);
    $username = '';
    if (isset($_SESSION['home_username'])) {
        $username = $_SESSION['home_username'];
    } elseif (isset($_SESSION['admin_uid'])) {
        $username = '管理员';
    }

    $nav_items = [
        'home' => ['name' => '首页', 'url' => '../首页.php'],
        'project' => ['name' => '主营项目', 'url' => '../主营项目.php'],
        'store' => ['name' => '门店设计', 'url' => '../门店设计.php'],
        'message' => ['name' => '留言板', 'url' => '../留言/留言.php'],
        'post' => ['name' => '发表留言', 'url' => '发布留言.php'],
        'join' => ['name' => '意向加盟', 'url' => '../加盟/加盟.php'],
    ];

    $html = '<div class="shortcut">' . "\n";
    $html .= '    <div class="w" style="font: \'微软雅黑\';">' . "\n";
    $html .= '        <div class="fl" align="center">' . "\n";
    $html .= '            <ul>' . "\n";
    $html .= '                <li>' . "\n";
    $html .= '                    <a class="logo-link" href="../首页.php"><img src="../img/ming.png" alt="闲云野鹤" /></a>' . "\n";
    $html .= '                </li>' . "\n";

    foreach ($nav_items as $key => $item) {
        $active_class = ($current_page === $key) ? ' active' : '';
        $html .= '                <li>' . "\n";
        $html .= '                    <a class="' . $active_class . '" href="' . $item['url'] . '">' . $item['name'] . '</a>' . "\n";
        $html .= '                </li>' . "\n";
    }

    $html .= '            </ul>' . "\n";
    $html .= '        </div>' . "\n";
    $html .= '        <div class="fr">' . "\n";
    $html .= '            <ul>' . "\n";

    if ($is_logged_in) {
        $html .= '                <li><a href="#">欢迎，' . htmlspecialchars($username, ENT_QUOTES, 'UTF-8') . '</a></li>' . "\n";
        $html .= '                <li><a href="我的留言.php">我的留言</a></li>' . "\n";
        $html .= '                <li><a href="../logout.php">退出登录</a></li>' . "\n";
    } else {
        $html .= '                <li><a href="../login_page.php">请登录</a></li>' . "\n";
        $html .= '                <li><a href="../register.html">免费注册</a></li>' . "\n";
    }

    $html .= '            </ul>' . "\n";
    $html .= '        </div>' . "\n";
    $html .= '    </div>' . "\n";
    $html .= '</div>' . "\n";

    return $html;
}

/**
 * 加盟页面专用导航栏（在加盟目录下）
 */
function getNavbarJoin($current_page = '') {
    // 确保session已启动
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $is_logged_in = isset($_SESSION['home_uid']) || isset($_SESSION['admin_uid']);
    $username = '';
    if (isset($_SESSION['home_username'])) {
        $username = $_SESSION['home_username'];
    } elseif (isset($_SESSION['admin_uid'])) {
        $username = '管理员';
    }

    $nav_items = [
        'home' => ['name' => '首页', 'url' => '../首页.php'],
        'project' => ['name' => '主营项目', 'url' => '../主营项目.php'],
        'store' => ['name' => '门店设计', 'url' => '../门店设计.php'],
        'message' => ['name' => '留言板', 'url' => '../留言/留言.php'],
        'post' => ['name' => '发表留言', 'url' => '../留言/发布留言.php'],
        'join' => ['name' => '意向加盟', 'url' => '加盟.php'],
    ];

    $html = '<div class="shortcut">' . "\n";
    $html .= '    <div class="w" style="font: \'微软雅黑\';">' . "\n";
    $html .= '        <div class="fl" align="center">' . "\n";
    $html .= '            <ul>' . "\n";
    $html .= '                <li>' . "\n";
    $html .= '                    <a class="logo-link" href="../首页.php"><img src="../img/ming.png" alt="闲云野鹤" /></a>' . "\n";
    $html .= '                </li>' . "\n";

    foreach ($nav_items as $key => $item) {
        $active_class = ($current_page === $key) ? ' active' : '';
        $html .= '                <li>' . "\n";
        $html .= '                    <a class="' . $active_class . '" href="' . $item['url'] . '">' . $item['name'] . '</a>' . "\n";
        $html .= '                </li>' . "\n";
    }

    $html .= '            </ul>' . "\n";
    $html .= '        </div>' . "\n";
    $html .= '        <div class="fr">' . "\n";
    $html .= '            <ul>' . "\n";

    if ($is_logged_in) {
        $html .= '                <li><a href="#">欢迎，' . htmlspecialchars($username, ENT_QUOTES, 'UTF-8') . '</a></li>' . "\n";
        $html .= '                <li><a href="我的留言.php">我的留言</a></li>' . "\n";
        $html .= '                <li><a href="../logout.php">退出登录</a></li>' . "\n";
    } else {
        $html .= '                <li><a href="../login_page.php">请登录</a></li>' . "\n";
        $html .= '                <li><a href="../register.html">免费注册</a></li>' . "\n";
    }

    $html .= '            </ul>' . "\n";
    $html .= '        </div>' . "\n";
    $html .= '    </div>' . "\n";
    $html .= '</div>' . "\n";

    return $html;
}
?>
