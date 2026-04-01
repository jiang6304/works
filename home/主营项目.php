<?php
include '../public/common/config.php';
include '../public/common/navbar.php';
$sql = "SELECT * FROM contact";
$rst = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="闲云野鹤手工体验馆-手工馆简介以及成品购买网站，给你呈现最详细的店铺介绍以及最优手工品购买体验！" />
    <meta name="keywords" content="手工馆，陶艺馆，手工体验，闲云野鹤手工体验馆" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <title>主营项目 - 闲云野鹤手工体验馆</title>
    <link rel="stylesheet" href="css/主营项目.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/base.css">
</head>

<body>
    <?php echo getNavbar('project'); ?>

    <div align="center">
        <div align="center">
            <div class="contexta1">
                <div class="context1">
                    <div class="banner" id="banner">
                        <!-- 背景 -->
                        <div id="banner_bg" class="bg"></div>
                        <!-- 图片区域 -->
                        <section>
                            <!-- 图片显示 -->
                            <div id="banner_picture" class="picture">
                                <!-- 图片链接 -->
                                <a id="banner_link" href="#" class="link">
                                    <!-- 图片标签 -->
                                    <img id="banner_image" class="image" src="" alt="">
                                </a>
                            </div>
                            <!-- 当前选择指示点 -->
                            <div id="banner_select" class="select"></div>
                            <!-- 左侧翻页 -->
                            <div id='banner_bt_left' class="bt left">
                                <!-- 字体图标：左箭头 -->
                                <i class="iconfont icon-Left"></i>
                            </div>
                            <!-- 右侧翻页 -->
                            <div id='banner_bt_right' class="bt right">
                                <!-- 字体图标：右箭头 -->
                                <i class="iconfont icon-Right"></i>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="headera3" style="margin-top: 30px;">
                <div align="middle">
                    <div> <img src="img/QQ图片20220506135349.png" width="175px" height="120px" /></div>
                    <h2 align="center"><span>手工</span>体验馆<span></span></h2>
                </div>
            </div>
        </div>
        <div class="w">
            <div class="contexta2">
                <div class="context2">
                    <font size="6px" face="bookman old style" color="#2F4F4F">
                        <div class="titlea">CHINESE CERAMIC ART</div>
                    </font>
                    <div class="line"></div>
                    <font size="6px" face="宋体" color="#2F4F4F">
                        <div class="titlea">陶艺体验</div>
                    </font>
                </div>
            </div>

            <div class="middle4">
                <div style="width: 1000px;height: 375px;">
                    <div class="a" style="float: left;">
                        <div class="b"></div>
                        <div class="c">
                            <div class="d dd"><img src="1.png" alt=""></div>
                            <div class="d"><img src="2.png" alt=""></div>
                            <div class="d"><img src="3.png" alt=""></div>
                            <div class="d"><img src="4.png" alt=""></div>
                            <div class="d"><img src="5.png" alt=""></div>
                        </div>
                    </div>
                    <div class="a1" style="float: left;">
                        <div class="a11">
                            <font face="宋体" size="5">
                                <p>
                                    &nbsp;&nbsp;&nbsp;&nbsp;陶器的发明，是人类文明发展的重要标志，是人类第一次利用天然物，按照自己的意志，创造出来的一种崭新的东西。人们把粘土加水混和后，制成各种器物，干燥后经火焙烧，产生质的变化，形成陶器。它揭开了人类利用自然、改造自然的新篇章，具有重大的划时代的意义。陶器的发明，也大大改善了人类的生活条件，在人类发展史上开辟了新纪元。
                                </p>
                                <p>
                                    &nbsp;&nbsp;&nbsp;&nbsp;陶艺的创作可以陶冶一个人的情操，又可
                                    以改变一个人的审美与性格。陶艺作为创造文明的一种文化艺术科学，它反映了人们的一种意识、思想和观念。在做陶艺艺术品的过程中，不仅可以从中获得快乐，陶冶情操，更是对中国传统艺术文化的一种传承，发现和创造。
                                </p>

                            </font>
                        </div>
                    </div>
                </div>
                <script>
                    // 获取左边大图的元素
                    let b = document.querySelector(".b")
                    // 获取右边小图的所有元素
                    let d = document.getElementsByClassName("d")

                    let time
                    let index = 0

                    // 设置一个重置函数
                    let a = function() {
                        for (let i = 0; i < d.length; i++) {
                            d[i].className = "d"
                        }
                    }
                    // 设置一个选中函数
                    let aa = function() {
                        // 先代入重置函数
                        a()
                        d[index].className = "d dd"
                    }
                    // 设置启动轮播图的时间函数
                    function ts() {
                        time = setInterval(function() {
                            aa()
                            index++
                            b.style.backgroundImage = "url('" + [index] + ".png')"
                            if (index == 5) {
                                index = 0
                            }
                        }, 1500);
                    }
                    for (let i = 0; i < d.length; i++) {
                        // 鼠标移动到当前小图片上时触发
                        d[i].onmousemove = function() {
                            // 鼠标移动到当前小图片时右边大图片变成当前的小图片
                            b.style.backgroundImage = "url('" + [i + 1] + ".png')"
                            // 鼠标移动到小图片上面时关闭定时器并重置定时，
                            // 鼠标移开后再继续执行
                            a()
                            clearInterval(time)
                            index = i + 1
                            ts()
                        }
                    }
                    // 执行轮播图
                    ts()
                </script>
            </div>
            <div class="contexta2">
                <div class="context2">
                    <font size="6px" face="bookman old style" color="#2F4F4F">
                        <div class="titlea">CHINESE FAN</div>
                    </font>
                    <div class="line"></div>
                    <font size="6px" face="宋体" color="#2F4F4F">
                        <div class="titlea">传统制扇</div>
                    </font>
                </div>
            </div>

            <div class="middle4">
                <div style="width: 1000px;height: 375px;">
                    <div class="a1" style="float: left;">
                        <div class="a11">
                            <font face="宋体" size="5">
                                <p>
                                    &nbsp;&nbsp;&nbsp;&nbsp;扇子为引风纳凉、遮日蔽尘之物，汉代曾名之为"障翳"。其历史悠久，根源可上溯至三皇五帝时期；文化底蕴丰富，古往今来以扇为题、传情达意的诗词书画作品举不胜举；制作工艺复杂，集造型、雕刻、镶嵌、装裱、上漆、铲贴、手绘、刺绣等多种工艺于一体。
                                </p>
                                </p>
                                <p>
                                    &nbsp;&nbsp;&nbsp;&nbsp;扇之形制概不外柄扇与折扇二类，其质地则竹、羽、纸、罗、绢、蒲、象牙等皆有。若以今日眼光视之，又不妨分为工艺扇与书画扇二类。工艺扇美在工艺，书画扇贵在书画，虽同为欣赏，但所欣赏之内容不同。若扇骨工艺与书画艺术双美并臻，堪称完璧。
                                    自民国以来，名流显要，文人墨客，士农工商，任何阶层均有嗜扇艺者，扇艺几乎已成中国人实用与欣赏之日常物。
                                </p>
                            </font>
                        </div>
                    </div>
                    <div class="a" style="float: left;">
                        <img src="img/扇.jpg" width="468px" height="350px" />
                    </div>

                </div>

            </div>

            <div class="contexta2">
                <div class="context2">
                    <font size="6px" face="bookman old style" color="#2F4F4F">
                        <div class="titlea">CHINESE LAMP</div>
                    </font>
                    <div class="line"></div>
                    <font size="6px" face="宋体" color="#2F4F4F">
                        <div class="titlea">传统灯</div>
                    </font>
                </div>
            </div>
            <div class="middle4">
                <div style="width: 1000px;height: 375px;">
                    <div class="a" style="float: left;">
                        <img src="img/灯.jpg" width="468px" height="350px" />
                    </div>
                    <div class="a1" style="float: left;">
                        <div class="a11">
                            <font face="宋体" size="5">
                                <p>
                                    &nbsp;&nbsp;&nbsp;&nbsp;古灯虽然经历了漫长的发展演变过程，但多数灯具的基本结构并没有多大变化。一般油灯都由灯座、灯柱、灯碗几部分组成，底座与灯盘由灯柱相连，都有储油的容器，都有点燃的灯捻。古灯也有一些差别，如有一根灯芯的，有多根灯芯的；有单支烛台的，也有多支烛台的。
                                </p>
                                <p>
                                    <BR><br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;古代灯具主要是蜡烛和油灯，从材质和造型精美别致，而且种类繁多。灯是光明的身影，吉祥的背影，幸福的剪影，是古代人民生活的历史缩影。
                                </p>
                            </font>
                        </div>
                    </div>
                </div>

            </div>

            <div class="contexta2">
                <div class="context2">
                    <font size="6px" face="bookman old style" color="#2F4F4F">
                        <div class="titlea">OTHER CHINESE ART</div>
                    </font>
                    <div class="line"></div>
                    <font size="6px" face="宋体" color="#2F4F4F">
                        <div class="titlea">其他手工艺</div>
                    </font>
                </div>
            </div>

            <div class="middle4">
                <div style="width: 1000px;height: 375px;">

                    <div class="a1" style="float: left;">
                        <div class="a11">
                            <font face="宋体" size="5">
                                <p>
                                    &nbsp;&nbsp;&nbsp;&nbsp;#绒花#
                                    是由绢、绒、纱等制成的人造头花。它们颜色鲜艳，形象逼真，同时多有美好的寓意。戴于发间，夹于耳际，在轻缓的步伐中，温柔了岁月。南京绒花曾是皇室专用的头饰。绒花是南京有代表性的、具有地方特色的传统手工艺。绒花都是手工制作，因为其特殊的表现手法直到现在都无法用机器生产。
                                <p><br> &nbsp;&nbsp;&nbsp;&nbsp;#缠花#
                                    英山缠花主要流传于湖北省英山县，简称缠花；是传统美术类项目，属于装饰类。所谓缠花，就是用多色丝线在以纸板和铜丝扎成的人造坯架或实物坯架上缠绕出鸟、兽、虫、鱼、花、果、汉字等美术品。
                            </font>
                        </div>
                    </div>
                    <div class="a" style="float: left;">
                        <img src="img/花.jpg" width="468px" height="350px" />
                    </div>
                </div>

            </div>
        </div>
        <div align="center" style="background-color: rgb(95, 158, 160, 0.6);">
            <div class="bottom">
                <img src="img/QQ图片20220506135349.png" width="150px" height="100px" />
                <font face="楷体" size="3" color="#2F4F4F">
                    <div style="text-align:left;">
                        <b>联系我们：</b>
                    </div>
                    <div>
                        <?php
                        while ($row = mysqli_fetch_assoc($rst)) {
                            echo "<div style='text-align: left;float:left;margin-right:40px;'><p>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</p>";
                            echo "<p>电话：" . htmlspecialchars($row['tell'], ENT_QUOTES, 'UTF-8') . "</p>";
                            echo "<p>地址：" . htmlspecialchars($row['address'], ENT_QUOTES, 'UTF-8') . "</p>";
                            echo "<p>微信：" . htmlspecialchars($row['wechat'], ENT_QUOTES, 'UTF-8') . "</p></div>";
                        }
                        ?>
                    </div>
                    <div style="margin-top:10px;">
                        ©2023 Mingjing Jiang
                    </div>
                </font>
            </div>
        </div>
    </div>

    <!-- 轮播图脚本 -->
    <script>
        /* ******************
         *  通用变量
         * ******************/

        // 当前轮播图编号
        let currentIndex = -1;
        // 自动翻转定时器
        let bannerTimer = null;

        /* ******************
         *  轮播图的图片地址与链接信息
         * ******************/

        let links = [{
            'image': './img/1.jpg',
            'target': '#1'
        },
        {
            'image': './img/2.jpg',
            'target': '#2'
        },
        {
            'image': './img/3.jpg',
            'target': '#3'
        },
        {
            'image': './img/4.jpg',
            'target': '#4'
        },
        {
            'image': './img/5.jpg',
            'target': '#5'
        }
        ];

        /* ******************
         *  找到要操作的元素
         * ******************/

        let banner = document.getElementById('banner');
        let bannerBG = document.getElementById('banner_bg');
        let bannerPicture = document.getElementById('banner_picture');
        let bannerLink = document.getElementById('banner_link');
        let bannerImage = document.getElementById('banner_image');
        let bannerSelect = document.getElementById('banner_select');
        let bannerBTLeft = document.getElementById('banner_bt_left');
        let bannerBTRight = document.getElementById('banner_bt_right');

        /* ******************
         *  轮播图选择动作方法
         * ******************/

        // 选择
        // index 为编号 从0开始
        let select = (index) => {

            // 停止自动播放
            banner_stop();

            // 转数字
            index = Number(index);

            // 越界超过 最大数量 links越界，直接返回
            if (index >= links.length) {
                return;
            }

            // 选中当前已选中的的直接返回
            if (currentIndex == index) {
                return;
            }

            // 取消当前的指示点选中状态
            if (currentIndex > -1) {
                bannerSelect.children[currentIndex].classList.remove('checked');
            }

            // 变更当前轮播图编号
            currentIndex = index;

            // 找到当前元素
            currentLink = links[currentIndex];
            // 背景变化
            bannerBG.style.backgroundImage = 'url(' + currentLink.image + ')';
            // 前景变化
            bannerImage.setAttribute('src', currentLink.image);
            // 链接变化
            bannerLink.setAttribute('href', currentLink.target);

            // 增加新的指示点选中状态
            bannerSelect.children[currentIndex].classList.add('checked');

        }

        // 选择（自动）
        // index 为编号 从0到links.length - 1
        let auto_select = (index) => {

            // 转数字
            index = Number(index);

            // 越界超过 最大数量 links越界，直接返回
            if (index >= links.length) {
                return;
            }

            // 选中当前已选中的的直接返回
            if (currentIndex == index) {
                return;
            }

            // 取消当前的指示点选中状态
            bannerSelect.children[currentIndex].classList.remove('checked');

            // 变更当前轮播图编号
            currentIndex = index;

            // 找到当前元素
            currentLink = links[currentIndex];

            // 前景图片，第一步调整过度时间为1s
            bannerImage.style.transition = 'opacity 0.5s ease-in 0s';
            // 前景图片，第二步调整不透明度到0.2
            bannerImage.style.opacity = 0.2;

            // 第三步延迟变换img图片，并重新定义透明度以及过度时间和过渡方式
            setTimeout(() => {
                // 背景变化
                bannerBG.style.backgroundImage = 'url(' + currentLink.image + ')';
                // 前景变化
                bannerImage.setAttribute('src', currentLink.image);
                // 链接变化
                bannerLink.setAttribute('href', currentLink.target);
                // 不透明度变化
                bannerImage.style.transition = 'opacity 0.5s ease-out 0s';
                bannerImage.style.opacity = 1;

                // 增加新的指示点选中状态
                // 如果已经通过手动点击了选中则此处不再执行
                if (!document.querySelector('.banner .checked')) {
                    bannerSelect.children[currentIndex].style.transition = 'background-color .5s';
                    bannerSelect.children[currentIndex].classList.add('checked');
                }
            }, 500);

        }

        /* ******************
         *  自动翻转播放与停止
         * ******************/

        // 播放
        let banner_play = () => {
            // 3000 执行1次，这里与右翻逻辑一致
            bannerTimer = setInterval(() => {
                // 获取新的index
                let index = currentIndex + 1;
                // 右翻越界等于最左侧元素
                if (index >= links.length) {
                    index = 0;
                }
                // 加载新图片（这里选择自动，增加切换效果）
                auto_select(index);
            }, 3000);
        }

        // 停止
        let banner_stop = () => {
            if (bannerTimer) {
                clearInterval(bannerTimer);
                bannerTimer = null;
            }
        }

        /* ******************
         *  页面初始化方法
         * ******************/

        let init = () => {

            // 动态生成选择指示点
            for (let index = 0; index < links.length; index++) {
                // 创建A元素
                let item = document.createElement('a');
                // 修改属性
                item.setAttribute('class', 'item');
                item.setAttribute('href', '#');
                item.setAttribute('data-index', index);
                // 追加元素
                bannerSelect.appendChild(item);
            }

            // 选择第一个元素显示
            select(0);

            // 绑定事件
            bind();

            // 自动翻转播放
            banner_play();
        }

        /* ******************
         * 事件绑定方法
         * ******************/

        let bind = () => {

            // 左翻页事件监听
            bannerBTLeft.addEventListener('click', () => {
                // 获取新的index
                let index = currentIndex - 1;
                // 左翻越界等于最右元素
                if (index < 0) {
                    index = links.length - 1;
                }
                // 加载新图片
                select(index);
            });

            // 右翻页事件监听
            bannerBTRight.addEventListener('click', () => {
                // 获取新的index
                let index = currentIndex + 1;
                // 右翻越界等于最左侧元素
                if (index >= links.length) {
                    index = 0;
                }
                // 加载新图片
                select(index);
            });

            // 绑定select选择指示点的点击事件
            for (const key in bannerSelect.children) {
                if (bannerSelect.children.hasOwnProperty(key)) {
                    const element = bannerSelect.children[key];
                    element.addEventListener('click', function(e) {
                        // 取消点击跳转
                        e.preventDefault();
                        // 跳转到当前指示点中data-index所指定的图片
                        select(e.target.dataset.index);
                    });
                }
            }

            // 绑定鼠标移入事件
            banner.addEventListener('mouseover', (e) => {
                // 防止鼠标从子元素移出时触发
                if (e.relatedTarget && banner.compareDocumentPosition(e.relatedTarget) == 10) {
                    banner_stop();
                }
            });

            // 绑定鼠标移出事件
            banner.addEventListener('mouseout', (e) => {
                // 防止鼠标从子元素移出时触发
                if (e.relatedTarget && banner.compareDocumentPosition(e.relatedTarget) == 10) {
                    banner_play();
                }
            });

            // 绑定鼠标移动事件
            banner.addEventListener('mousemove', (e) => {
                banner_stop();
            });

        }

        /* ******************
         *  页面加载
         * ******************/

        // 页面加载完毕
        window.addEventListener('load', () => {
            // 初始化方法
            init();
        });
    </script>
</body>

</html>
