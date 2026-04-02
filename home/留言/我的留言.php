<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include '../../public/common/config.php';
include '../../public/common/navbar.php';

if (empty($_SESSION['home_uid'])) {
    echo "<script>location='/biyesheji/home/login_page.php'</script>";
    exit;
}
$uid = $_SESSION['home_uid'];

// 使用预处理语句防止SQL注入
$stmt = $conn->prepare("SELECT * FROM comment WHERE uid = ? ORDER BY time DESC");
$stmt->bind_param("s", $uid);
$stmt->execute();
$rst = $stmt->get_result();

// 获取联系方式
$sql_contact = "SELECT * FROM contact";
$rst_contact = mysqli_query($conn, $sql_contact);
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../favicon.ico" />
    <title>我的留言 - 闲云野鹤手工体验馆</title>
    <link rel="stylesheet" href='../css/base.css' />
    <link rel="stylesheet" href='../css/common.css' />
    <link rel="stylesheet" href="../css/互动.css" />
    <link rel="stylesheet" href='留言.css' />
    <style>
        .messege {
            position: relative;
        }

        .messege-actions {
            position: absolute;
            right: 10px;
            top: 10px;
            display: none;
        }

        .messege:hover .messege-actions {
            display: block;
        }

        .btn-edit,
        .btn-delete {
            padding: 5px 12px;
            margin-left: 5px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 12px;
        }

        .btn-edit {
            background-color: #5F9EA0;
            color: white;
        }

        .btn-edit:hover {
            background-color: #4a8484;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        /* 编辑模态框 */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border-radius: 8px;
            width: 400px;
            max-width: 90%;
        }

        .modal-header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #5F9EA0;
        }

        .modal-body textarea {
            width: 100%;
            height: 120px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            resize: vertical;
            font-size: 14px;
        }

        .modal-footer {
            margin-top: 15px;
            text-align: right;
        }

        .modal-footer button {
            padding: 8px 20px;
            margin-left: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-cancel {
            background-color: #6c757d;
            color: white;
        }

        .btn-save {
            background-color: #5F9EA0;
            color: white;
        }

        .btn-save:hover {
            background-color: #4a8484;
        }
    </style>
</head>

<body>
    <?php echo getNavbarSub('message'); ?>

    <div class="box">
        <div class="conetnt clearfix">
            <div class="footer"></div>
        </div>
        <div align="center" style="background-color: rgba(95, 158, 160, 0.3);padding-bottom: 20px;padding-top:30px;">
            <div class="contexta2">
                <div class="context2">
                    <font size="5px" face="bookman old style" color="#2F4F4F">
                        <div class="titlea">MY COMMENT BOARD</div>
                    </font>
                    <div class="line"></div>
                    <font size="5px" face="宋体" color="#2F4F4F">
                        <div class="titlea">我的留言</div>
                    </font>
                </div>
            </div>
            <div class="middle">
                <div class="comment1">
                    <h1 style="margin-top: 20px;">我的留言列表</h1>
                    <?php
                    if ($rst->num_rows > 0) {
                        while ($row = $rst->fetch_assoc()) {
                            echo "
                            <div class='messege' data-id='" . $row['id'] . "'>
                                <div class='messege-actions'>
                                    <button class='btn-edit' onclick='openEditModal(" . $row['id'] . ", \"" . htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8') . "\")'>修改</button>
                                    <button class='btn-delete' onclick='deleteComment(" . $row['id'] . ")'>删除</button>
                                </div>
                                <div class='user'>
                                    <div class='userlogo'>
                                        <img src='../img/userlogo.jpg' width='32px' height='36px' />
                                    </div>
                                    <h5>" . htmlspecialchars($row['username'], ENT_QUOTES, 'UTF-8') . "</h5>
                                </div>
                                <div class='comment'>
                                    <h4>" . htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8') . "</h4>
                                    <h6>" . htmlspecialchars($row['time'], ENT_QUOTES, 'UTF-8') . "</h6>
                                </div>
                            </div>";
                        }
                    } else {
                        echo "<p style='text-align: center; padding: 30px; color: #666;'>暂无留言，快去发表你的第一条留言吧！</p>";
                    }
                    ?>
                </div>
                <div class="comment2">
                    <div class="profile" style="margin-top: 20px;">
                        <h1>快来</h1>
                        <h1>留下你的评论吧</h1>
                    </div>
                    <input type="button" value="发表留言" onclick='window.open("发布留言.php")' class="btn" style="width: 120px;height:40px;margin:10px auto;font-size:20px;margin-top: 20px;">
                </div>
            </div>
        </div>
    </div>

    <!-- 编辑模态框 -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">修改留言</div>
            <div class="modal-body">
                <textarea id="editContent" placeholder="请输入修改后的留言内容"></textarea>
            </div>
            <div class="modal-footer">
                <button class="btn-cancel" onclick="closeEditModal()">取消</button>
                <button class="btn-save" onclick="saveEdit()">保存</button>
            </div>
        </div>
    </div>

    <!-- 删除确认模态框 -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">确认删除</div>
            <div class="modal-body">
                <p>确定要删除这条留言吗？此操作不可恢复。</p>
            </div>
            <div class="modal-footer">
                <button class="btn-cancel" onclick="closeDeleteModal()">取消</button>
                <button class="btn-delete" onclick="confirmDelete()">确认删除</button>
            </div>
        </div>
    </div>

    <div align="center" style="background-color: rgb(95, 158, 160, 0.6);">
        <div class="bottom">
            <img src="../img/QQ图片20220506135349.png" width="150px" height="100px" />
            <font face="楷体" size="3" color="#2F4F4F">
                <div style="text-align:left;"><b>联系我们：</b></div>
                <div>
                    <?php
                    while ($row_contact = mysqli_fetch_assoc($rst_contact)) {
                        echo "<div style='text-align: left;float:left;margin-right:40px;'><p>" . htmlspecialchars($row_contact['name'], ENT_QUOTES, 'UTF-8') . "</p>";
                        echo "<p>电话：" . htmlspecialchars($row_contact['tell'], ENT_QUOTES, 'UTF-8') . "</p>";
                        echo "<p>地址：" . htmlspecialchars($row_contact['address'], ENT_QUOTES, 'UTF-8') . "</p>";
                        echo "<p>微信：" . htmlspecialchars($row_contact['wechat'], ENT_QUOTES, 'UTF-8') . "</p></div>";
                    }
                    ?>
                </div>
                <div style="margin-top:10px;">©2023 Mingjing Jiang</div>
            </font>
        </div>
    </div>

    <script>
        let currentEditId = null;
        let currentDeleteId = null;

        // 打开编辑模态框
        function openEditModal(id, content) {
            currentEditId = id;
            document.getElementById('editContent').value = content;
            document.getElementById('editModal').style.display = 'block';
        }

        // 关闭编辑模态框
        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
            currentEditId = null;
        }

        // 保存编辑
        function saveEdit() {
            const content = document.getElementById('editContent').value.trim();
            if (!content) {
                alert('留言内容不能为空');
                return;
            }

            fetch('update_comment.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'id=' + currentEditId + '&content=' + encodeURIComponent(content)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('修改成功');
                        location.reload();
                    } else {
                        alert('修改失败：' + (data.message || '未知错误'));
                    }
                })
                .catch(error => {
                    alert('请求失败，请重试');
                });
        }

        // 删除留言
        let deleteId = null;

        function deleteComment(id) {
            deleteId = id;
            document.getElementById('deleteModal').style.display = 'block';
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
            deleteId = null;
        }

        function confirmDelete() {
            if (!deleteId) return;

            fetch('delete_comment.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'id=' + deleteId
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('删除成功');
                        location.reload();
                    } else {
                        alert('删除失败：' + (data.message || '未知错误'));
                    }
                })
                .catch(error => {
                    alert('请求失败，请重试');
                });
        }

        // 点击模态框外部关闭
        window.onclick = function(event) {
            if (event.target == document.getElementById('editModal')) {
                closeEditModal();
            }
            if (event.target == document.getElementById('deleteModal')) {
                closeDeleteModal();
            }
        }
    </script>
</body>

</html>
