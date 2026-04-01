<?php
include '../public/common/config.php';
$sql = "SELECT * FROM contact";
$rst = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="description" content="闲云野鹤手工体验馆-手工馆简介以及成品购买网站，给你呈现最详细的店铺介绍以及最优手工品购买体验！" />
		<meta name="keywords" content="手工馆，陶艺馆，手工体验，闲云野鹤手工体验馆" />
		<link rel="stylesheet" href="css/首页.css" />
		<link rel="stylesheet" href="css/common.css" />
		<link rel="stylesheet" href="css/base.css" />
		<link rel="shortcut icon" href="favicon.ico" />
		<title>首页</title>

	</head>

	<body>
		<a id="首页" href="#" class="link"></a>
		<div align="center">
			<div class="shortcut">
				<div class="w" style="font: '微软雅黑';">
					<div class="fl" style="height: 40px; " align="center">
						<ul>
							<li>
								<a style="width:133px;height: 40px;padding:0;" class="active" href="首页.php">
									<div >
								<img src="img/ming.png" width="133px" height="40px" /></div>
								</a>
							</li>
							<li>
								<a class="active" href="首页.php">首页</a>
							</li>

							<li>
								<a href="主营项目.php">主营项目</a>
							</li>
							<li>
								<a href="门店设计.php">门店设计</a>
							</li>
							<li>
								<a href="留言/留言.php">留言板</a>
							</li>
							<li>
								<a href="留言/发布留言.php">发表留言</a>
							</li>
							<li>
								<a href="加盟/加盟.php">意向加盟</a>
							</li>
						</ul>
					</div>
					<div class="fr">
						<ul>
							<li>
								<a href="login.html">请登录</a>
							</li>
							<li>
								<a href="register.html">请注册</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="header">
				<div style="background-image: url(img/logo1.png);background-size: cover;background-position-x: center; -webkit-logical-height: 450px; padding-left: 40px;padding-right: 40px;">
					<div style="height: 350px;"></div>
				</div>
			</div>

			<div class="headera3" align="center" style="background-color:rgba(255,255,255,0.6);">
				<div align="middle">
					<h2><span>闲云野鹤</span>手工体验馆</h2>
				</div>
			</div>
		</div>
		<div align="center">
			<div class="contexta2">
				<div class="context2">
					<font size="6px" face="bookman old style" color="#2F4F4F">
						<div class="titlea">ABOUT US</div>
					</font>
					<div class="line"></div>
					<font size="6px" face="宋体" color="#2F4F4F">
						<div class="titlea">店铺简介</div>
					</font>
				</div>
			</div>
			<div class="middle2a ">
				<font face="楷体" size="5">
					<div class="middle2" style="width: 1000px;">
						<div align="center" style="margin-top: 10px;margin-bottom: 10px;"><img src="img/QQ截图20220506174757.png" height="80px" width="" /></div>
						<p>
							闲云野鹤国潮手工体验馆是一家中国传统手工制作元素的一家现代休闲式手工体验公司，主要提供传统手工制作体验服务和手工制品的售卖服务。
							</br>本店的消费群体主要是城镇人口，以满足其迅速发展的娱乐休闲市场。 公司注重短期目标与长远战略的结合，中长期目标将逐步拓宽产品领域。目前主要拥有传统制陶，团扇制作，传统手工灯制作等一系列手工DIY制作及传统手工制品售卖服务以形成具有特色化娱乐休闲场所。
							</br>本公司产品经营理念以创意、传统、自愿为特色，旨在让顾客在享受服务的同时真真赋予手工艺品个人特色，了解到中国传统优秀文化，提高审美；展现中国新"国色"，赋予传统新活力。
						</p>
				</font>
				</div>
			</div>
			<div class=" contexta2 ">
				<div class="context2 ">
					<font size="6px " face="bookman old style " color="#2F4F4F">
						<div class="titlea ">ABOUT US</div>
					</font>
					<div class="line "></div>
					<div class="line2 "></div>
					<font size="6px " face="宋体 " color="#2F4F4F">
						<div class="titlea ">创业团队</div>
					</font>
				</div>
			</div>
			<div class="middle4">
				<div class="middle4a" style="width: 1000px;height: 375px;">
					<div class="a" style="float: left;">
						<div class="b"></div>
						<div class="c">
							<div class="d dd"><img src="1.jpg" alt=""></div>
							<div class="d"><img src="2.jpg" alt=""></div>
							<div class="d"><img src="3.jpg" alt=""></div>
							<div class="d"><img src="4.jpg" alt=""></div>
							<div class="d"><img src="5.jpg" alt=""></div>
						</div>
					</div>
					<div class="a1" style="float: left;">
						<div class="a11">
							<b>
							#小姜#
						</b>
							<p>有较强的组织与协调能力，有较强的实验操作能力，负责公司整体设计
							</p>
						</div>
						<div class="a11">
							<b>
							#小向#
						</b>
							<p>分管公司的人力部，传统陶艺传人。
							</p>
						</div>
						<div class="a11">
							<b>
							#小杨#
						</b>
							<p>中央美院毕业生，团扇、折扇手艺传人。分管公司的研发部
							</p>
						</div>
						<div class="a11">
							<b>
							#小叶#
						</b>
							<p>分管公司的财务部
							</p>
						</div>
						<div class="a11">
							<b>
							#小何#
						</b>
							<p>分管公司的，宣发部销售部，宫灯手艺传入。
							</p>
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
						for(let i = 0; i < d.length; i++) {
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
							b.style.backgroundImage = "url('" + index + ".jpg')"
							if(index == 5) {
								index = 0
							}
						}, 1500);
					}
					for(let i = 0; i < d.length; i++) {
						// 鼠标移动到当前小图片上时触发
						d[i].onmousemove = function() {
							// 鼠标移动到当前小图片时右边大图片变成当前的小图片
							b.style.backgroundImage = "url('" + (i + 1) + ".jpg')"
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
			<div align="center">
				<div class=" contexta2 ">
					<div class="context2 ">
						<font size="6px " face="bookman old style " color="#2F4F4F">
							<div class="titlea ">ABOUT US</div>
						</font>
						<div class="line "></div>
						<div class="line2 "></div>
						<font size="6px " face="宋体 " color="#2F4F4F">
							<div class="titlea ">店名由来</div>
						</font>
					</div>
				</div>
				<div class="middle3">
					<div class="wrap">
						<div class="box-top1">
							<div class="image"></div>
						</div>
						<div class="box-bottom">
							<h2>闲云野鹤</h2>
							<span>店名由来</span>
						</div>
						<div class="box-bottom2">
							<div>
								<ul class="box-bottom2">
									<li class="box-bottom2">
										&nbsp;&nbsp;&nbsp;&nbsp;闲云野鹤，同" 闲云孤鹤 "。闲：无拘束。比喻无拘无束、来去自如的人。语出宋·尤袤《全唐诗话》卷六："州亦难添，诗亦难改，然闲云孤鹤，何天而不可飞。"</br>
										&nbsp;&nbsp;&nbsp;&nbsp;选用这个成语，是希望顾客能在在如今这个高速运转、物欲横行的世界，在外面店里享受到份闲云野鹤的生活，少一点尘世的俗累。
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="wrap">
						<div class="box-top">
							<div class="image1"></div>
						</div>
						<div class="box-bottom">
							<h2>国潮</h2>
							<span>风格定位</span>
						</div>
						<div class="box-bottom2">
							<div>
								<ul class="box-bottom2">
									<li class="box-bottom2">
										&nbsp;&nbsp;&nbsp;&nbsp;"国潮"是一种现象，它需具备两个要素：其一，要有中国文化和传统的基因；其二，要与当下潮流融合，更具时尚感。</br>
										&nbsp;&nbsp;&nbsp;&nbsp;"国潮"不局限于某一领域，某一形式，它已成为当下年轻族群彰显个性、打造个人标签的方式。
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="wrap">
						<div class="box-top3">
							<div class="image3"></div>
						</div>
						<div class="box-bottom">
							<h2>手工馆</h2>
							<span>服务定位</span>
						</div>
						<div class="box-bottom2">
							<div>
								<ul class="box-bottom2">
									<li class="box-bottom2">
										&nbsp;&nbsp;&nbsp;&nbsp;在物质文明过于充盈，生活节奏过于紧凑的今天，我们不禁怀念"手工时代"带给我们的惬意，满足和快乐，憧憬一家人围坐包饺子，打毛线的和谐亲情；小时候一起玩泥巴的童颜。</br>
										&nbsp;&nbsp;&nbsp;&nbsp;而手工体验馆既能最大化的赋予顾客手工过程中的乐趣，又能避免手工过程中不必要的时间和精力的浪费。

									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div align="center" style="background-color: rgba(95, 158, 160, 0.6) ;">
				<div class="bottom ">
					<img src="img/QQ图片20220506135349.png " width="150px " height="100px " />
					<font face="楷体" size="3" color="#2F4F4F">
					<div style="text-align:left;"><b>
						联系我们：
					</b></div>
					<div >
					<?php
                            while($row=mysqli_fetch_assoc($rst)){
                                echo "<div style='
								text-align: left;float:left;margin-right:40px;'><p>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</p>";
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
	</body>

</html>
