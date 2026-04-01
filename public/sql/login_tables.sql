-- 用户登录Token表（用于"记住我"功能）
-- 请在数据库中执行此SQL创建表

CREATE TABLE IF NOT EXISTS `user_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) NOT NULL COMMENT '用户ID',
  `token` varchar(64) NOT NULL COMMENT '登录Token',
  `expire` int(11) NOT NULL COMMENT '过期时间戳',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`),
  KEY `token` (`token`),
  KEY `expire` (`expire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户自动登录Token表';

-- 登录日志表（可选，用于记录登录历史）
CREATE TABLE IF NOT EXISTS `login_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) DEFAULT NULL COMMENT '用户ID',
  `ip` varchar(50) NOT NULL COMMENT 'IP地址',
  `status` tinyint(1) NOT NULL COMMENT '登录状态：1成功 0失败',
  `message` varchar(255) DEFAULT NULL COMMENT '消息',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '登录时间',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `ip` (`ip`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='登录日志表';
