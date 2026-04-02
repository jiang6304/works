# 闲云野鹤手工体验馆网站

## 项目简介

这是一个手工体验馆官方网站系统，采用 PHP + MySQL 开发，包含前台展示和后台管理两大模块。网站展示了陶艺体验、传统制扇、传统灯制作等中国传统手工艺项目，并提供用户留言互动、加盟意向提交等功能。

## 功能特性

### 前台功能

- **首页** - 展示店铺简介、创业团队介绍、店名由来及品牌理念
- **主营项目** - 展示陶艺体验、传统制扇、传统灯制作、绒花缠花等手工艺项目
- **门店设计** - 展示门店环境与设计风格
- **留言板** - 用户可发布、查看、管理留言
- **加盟意向** - 提交加盟申请信息
- **用户系统** - 注册、登录、自动登录、退出登录

### 后台功能

- **用户管理** - 查看、添加、修改、删除用户
- **管理员管理** - 查看、添加、修改管理员
- **店铺联系方式管理** - 管理店铺联系信息
- **评论管理** - 查看、修改、删除用户评论
- **加盟表管理** - 查看、修改、删除加盟意向信息

## 技术栈

- **后端语言**: PHP
- **数据库**: MySQL
- **前端**: HTML5 + CSS3 + JavaScript + jQuery
- **服务器**: WampServer (Apache)

## 目录结构

```
biyesheji/
├── home/                      # 前台页面
│   ├── css/                   # 样式文件
│   │   ├── base.css           # 基础样式
│   │   ├── 首页.css           # 首页样式
│   │   ├── 主营项目.css       # 主营项目页样式
│   │   ├── 门店设计.css       # 门店设计页样式
│   │   ├── login.css          # 登录页样式
│   │   ├── cart.css           # 购物车样式
│   │   └── 互动.css           # 互动页样式
│   ├── js/                    # JavaScript文件
│   ├── img/                   # 图片资源
│   ├── fonts/                 # 字体文件
│   ├── 留言/                  # 留言模块
│   │   ├── 留言.php           # 留言列表页
│   │   ├── 发布留言.php       # 发布留言页
│   │   ├── 我的留言.php       # 我的留言页
│   │   ├── insert.php         # 留言入库
│   │   ├── update_comment.php # 更新留言
│   │   └── delete_comment.php # 删除留言
│   ├── 加盟/                  # 加盟模块
│   │   ├── 加盟.php           # 加盟页面
│   │   └── insert.php         # 加盟信息入库
│   ├── 首页.php               # 网站首页
│   ├── 主营项目.php           # 主营项目页
│   ├── 门店设计.php           # 门店设计页
│   ├── login_page.php         # 登录页面
│   ├── login.php              # 登录处理
│   ├── logout.php             # 退出登录
│   ├── register.html          # 注册页面
│   ├── regi.php               # 注册处理
│   ├── captcha.php            # 验证码生成
│   ├── auto_login.php         # 自动登录
│   └── favicon.ico            # 网站图标
│
├── 后台界面/                   # 后台管理页面
│   ├── index.php              # 后台主页框架
│   ├── top.php                # 顶部页面
│   ├── left.php               # 左侧导航
│   ├── right.php              # 右侧内容区
│   ├── lock.php               # 权限验证
│   ├── logout.php             # 后台退出
│   ├── admin/                 # 管理员管理
│   │   ├── index.php          # 管理员列表
│   │   ├── add.php            # 添加管理员
│   │   ├── edit.php           # 编辑管理员
│   │   ├── insert.php         # 添加入库
│   │   └── update.php         # 更新处理
│   ├── user/                  # 用户管理
│   │   ├── index.php          # 用户列表
│   │   ├── add.php            # 添加用户
│   │   ├── edit.php           # 编辑用户
│   │   ├── delete.php         # 删除用户
│   │   ├── insert.php         # 添加入库
│   │   └── update.php         # 更新处理
│   ├── contact/               # 店铺联系方式管理
│   │   ├── index.php          # 店铺信息列表
│   │   ├── add.php            # 添加店铺信息
│   │   ├── edit.php           # 编辑店铺信息
│   │   ├── delete.php         # 删除店铺信息
│   │   ├── insert.php         # 添加入库
│   │   └── update.php         # 更新处理
│   ├── comment/               # 评论管理
│   │   ├── index.php          # 评论列表
│   │   ├── update.php         # 更新评论
│   │   └── delete.php         # 删除评论
│   ├── ally/                  # 加盟表管理
│   │   ├── index.php          # 加盟意向列表
│   │   ├── edit.php           # 编辑加盟信息
│   │   ├── delete.php         # 删除加盟信息
│   │   └── update.php         # 更新处理
│   └── public/                # 后台公共资源
│       ├── css/               # 样式文件
│       ├── img/               # 图片资源
│       └── js/                # JavaScript文件
│
├── public/                    # 公共资源
│   └── common/
│       ├── config.php         # 数据库配置文件
│       ├── function.php       # 公共函数
│       └── navbar.php         # 导航栏组件
│
└── README.md                  # 项目说明文件
```

## 环境配置

### 软件要求

- **WampServer** 3.x 或更高版本
  - Apache 2.4+
  - PHP 7.x / 8.x
  - MySQL 5.7+ / 8.x
- **浏览器**: Chrome、Firefox、Edge 等现代浏览器

### WampServer 配置步骤

1. **下载安装 WampServer**
   - 官网下载：https://www.wampserver.com/
   - 安装路径建议：`C:\wamp64` 或 `D:\wamp64`

2. **配置 Apache 端口为 8080**
   - 左键点击 WampServer 图标 → Apache → httpd.conf
   - 找到 `Listen 80` 改为 `Listen 8080`
   - 找到 `ServerName localhost:80` 改为 `ServerName localhost:8080`
   - 保存文件并重启 WampServer

3. **放置项目文件**
   - 将本项目文件夹 `biyesheji` 复制到 WampServer 的 www 目录
   - 默认路径：`C:\wamp64\www\biyesheji` 或 `D:\wamp64\www\biyesheji`

4. **创建数据库**
   - 启动 WampServer，确保图标变为绿色
   - 浏览器访问 `http://localhost:8080/phpmyadmin/`
   - 登录（默认用户名：root，密码为空）
   - 创建新数据库 `mydb`
   - 导入项目提供的 SQL 文件（如有）

5. **修改数据库连接配置**
   - 打开文件 `public/common/config.php`
   - 修改以下配置项：

   ```php
   $servername = "localhost";         // 数据库服务器地址
   $username = "root";                // 数据库用户名（WampServer默认root）
   $password = "";                    // 数据库密码（WampServer默认为空）
   $dbname = "mydb";                  // 数据库名称
   ```

6. **测试访问**
   - 前台首页：`http://localhost:8080/biyesheji/home/首页.php`
   - 后台管理：`http://localhost:8080/biyesheji/后台界面/index.php`

### 常见问题

- **端口冲突**：如果8080端口被占用，可改用其他端口（如8081），同时修改 httpd.conf
- **数据库连接失败**：检查 WampServer 是否启动，MySQL 服务是否正常运行
- **页面乱码**：确保文件编码为 UTF-8，浏览器编码设置正确

## 数据表结构

### users 用户表
| 字段 | 说明 |
|------|------|
| uid | 用户ID (主键) |
| username | 用户名 |
| passwd | 密码 |
| tell | 电话 |
| isadmin | 是否管理员 (0:普通用户, 1:管理员) |

### contact 店铺联系方式表
| 字段 | 说明 |
|------|------|
| id | 编号 (主键) |
| name | 店名 |
| tell | 电话 |
| address | 地址 |
| wechat | 微信 |

### comment 评论表
| 字段 | 说明 |
|------|------|
| id | 编号 (主键) |
| username | 用户名 |
| content | 评论内容 |
| time | 评论时间 |

### ally 加盟意向表
| 字段 | 说明 |
|------|------|
| id | 编号 (主键) |
| name | 加盟人姓名 |
| tell | 电话 |
| address | 地址 |
| budget | 预算 |
| content | 留言 |

## 安装部署

详细的环境配置步骤请查看上方【环境配置】章节。

## 管理员登录

首次使用需要手动在数据库中插入管理员账号：

```sql
INSERT INTO users (uid, username, passwd, tell, isadmin) 
VALUES (1, 'admin', MD5('your_password'), '13800000000', 1);
```

然后访问后台登录页面进行登录。

## 安全特性

- SQL 注入防护（预处理语句）
- XSS 攻击防护（htmlspecialchars 转义）
- 后台权限验证（Session 检查）
- 验证码登录验证

## 作者

Mingjing Jiang (jiangmojian)

## 版权

©2023 Mingjing Jiang

---

*闲云野鹤手工体验馆 - 体验中国传统手工艺的魅力*
