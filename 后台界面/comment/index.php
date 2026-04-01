<?php
include '../../public/common/config.php';
include '../lock.php';
$sql = "SELECT * FROM comment ORDER BY time DESC";
$rst = mysqli_query($conn, $sql);
?>
<!doctype html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>评论管理 - 后台管理</title>
    <link rel="stylesheet" href="../public/css/index.css">
    <style>
        a {
            text-decoration: none;
            background: rgb(60, 105, 103);
            color: #fff;
            border-radius: 5px;
            padding: 5px 10px;
            margin: 0 3px;
            display: inline-block;
        }

        a:hover {
            background: rgb(80, 125, 123);
        }

        a.delete {
            background: #dc3545;
        }

        a.delete:hover {
            background: #c82333;
        }

        a.edit {
            background: #28a745;
        }

        a.edit:hover {
            background: #218838;
        }

        .main td {
            width: 200px;
            padding: 10px;
            vertical-align: top;
        }

        .comment1 {
            float: left;
            width: 100%;
            padding: 15px;
            box-sizing: border-box;
        }

        .page-title {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #5F9EA0;
        }

        .messege {
            margin: 15px 0;
            padding: 15px;
            background-color: rgba(95, 158, 160, 0.1);
            border-radius: 8px;
            border-left: 4px solid #5F9EA0;
        }

        .messege:hover {
            background-color: rgba(95, 158, 160, 0.2);
        }

        .user {
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .comment-id {
            background: #5F9EA0;
            color: white;
            padding: 2px 8px;
            border-radius: 3px;
            font-size: 12px;
            margin-right: 10px;
        }

        .username {
            font-size: 14px;
            color: #333;
            font-weight: bold;
        }

        .comment-content {
            font-size: 15px;
            color: #333;
            line-height: 1.6;
            margin: 10px 0;
            padding: 10px;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 5px;
            word-wrap: break-word;
            word-break: break-all;
        }

        .comment-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .comment-time {
            font-size: 12px;
            color: #888;
        }

        .comment-actions {
            display: flex;
            gap: 5px;
        }

        .no-data {
            text-align: center;
            padding: 40px;
            color: #888;
            font-size: 16px;
        }

        /* 模态框样式 */
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
            width: 450px;
            max-width: 90%;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #5F9EA0;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .modal-body textarea {
            width: 100%;
            height: 150px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            resize: vertical;
            font-size: 14px;
            box-sizing: border-box;
        }

        .modal-body textarea:focus {
            outline: none;
            border-color: #5F9EA0;
        }

        .modal-footer {
            margin-top: 20px;
            text-align: right;
        }

        .modal-footer button {
            padding: 8px 20px;
            margin-left: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-cancel {
            background-color: #6c757d;
            color: white;
        }

        .btn-cancel:hover {
            background-color: #5a6268;
        }

        .btn-save {
            background-color: #5F9EA0;
            color: white;
        }

        .btn-save:hover {
            background-color: #4a8484;
        }

        .stats {
            margin-bottom: 20px;
            padding: 10px 15px;
            background: rgba(95, 158, 160, 0.1);
            border-radius: 5px;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="comment1">
        <h4 class="page-title">📋 评论管理</h4>

        <div class="stats">
            共 <strong><?php echo $rst->num_rows; ?></strong> 条评论
        </div>

        <?php
        if ($rst->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($rst)) {
                echo "
                <div class='messege'>
                    <div class='user'>
                        <div class='user-info'>
                            <span class='comment-id'>#{$row['id']}</span>
                            <span class='username'>" . htmlspecialchars($row['username'], ENT_QUOTES, 'UTF-8') . "</span>
                        </div>
                    </div>
                    <div class='comment-content'>" . htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8') . "</div>
                    <div class='comment-footer'>
                        <span class='comment-time'>📅 {$row['time']}</span>
                        <div class='comment-actions'>
                            <a href='javascript:void(0)' class='edit' onclick=\"openEditModal({$row['id']}, '" . htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8') . "')\">修改</a>
                            <a href='delete.php?id={$row['id']}' class='delete' onclick=\"return confirm('确定要删除这条评论吗？')\">删除</a>
                        </div>
                    </div>
                </div>";
            }
        } else {
            echo "<div class='no-data'>暂无评论数据</div>";
        }
        ?>
    </div>

    <!-- 编辑模态框 -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">修改评论</div>
            <div class="modal-body">
                <textarea id="editContent" placeholder="请输入修改后的评论内容"></textarea>
            </div>
            <div class="modal-footer">
                <button class="btn-cancel" onclick="closeEditModal()">取消</button>
                <button class="btn-save" onclick="saveEdit()">保存</button>
            </div>
        </div>
    </div>

    <script>
        let currentEditId = null;

        function openEditModal(id, content) {
            currentEditId = id;
            document.getElementById('editContent').value = content;
            document.getElementById('editModal').style.display = 'block';
        }

        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
            currentEditId = null;
        }

        function saveEdit() {
            const content = document.getElementById('editContent').value.trim();
            if (!content) {
                alert('评论内容不能为空');
                return;
            }

            fetch('update.php', {
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

        // 点击模态框外部关闭
        window.onclick = function(event) {
            if (event.target == document.getElementById('editModal')) {
                closeEditModal();
            }
        }
    </script>
</body>

</html>
