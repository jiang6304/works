<?php 
include '../../public/common/config.php';
include '../lock.php';
$sql = "SELECT * FROM comment";
$rst = mysqli_query($conn, $sql);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>index</title>
	<link rel="stylesheet" href="../public/css/index.css">
	<style>
	a{
	text-decoration: none;
	background: rgb(60, 105, 103);
	color:#fff;
	border-radius:5px;
	padding:5px;
}
.main td{
   width: 200px;
}
.comment1 {
    float: left;
    height: 900px;
    margin: 15px;
    text-align: center;
    display: block;
    align-items: center;
    justify-content: center;
}
.userlogo {
    margin-right: 20px;
    float: left;
    box-shadow: 2px 2px 5px rgba(0, 0, 0.2, 0.2);
    height: 100%;
}

.messege {
    margin: 20px;
    padding: 10px;
    background-color:rgb(95, 158, 160, 0.1);
    text-align: center;
    display: block;
    align-items: center;
    justify-content: center;
}
h5{
    padding-top: 4px;
    font-size: 15px;
    color: #0000007a;
    text-align: left;
}
h5{
    padding-top: 4px;
    font-size: 15px;
    color: #0000007a;
    text-align: left;
}
h4{
    font-size: 17px;
    margin-left: 43px;
    height: auto;  
    word-wrap:break-word;  
    word-break:break-all;  
    overflow: hidden;  
    text-align: left;
}
h6{
    font-size: 10px;
    margin-left: 47px;
    color: #0000007a;
    text-align: left;
}
.comment{
    text-align: center;
    align-items: center;
    justify-content: center;
}
.user{
    margin: 0;
    padding: 0;
    height: 36px;
    text-align: center;
    align-items: center;
    justify-content: center;
}
	</style>
</head>
<body>
	
	<div class="comment1">
                    <h4 style="margin-top: 20px;">留言列表</h4>
                    
                        <?php 
                            while($row=mysqli_fetch_assoc($rst)){
                                echo "
                                <div class='messege'>
                                <div class='user'><h5 style='color:#000;'>第{$row['id']}条</h5></div>
								<h5>用户名{$row['username']}</h5>";
                                echo "
                                <div class='comment'>
                                <h4>{$row['content']}</h4>
                                <h6>{$row['time']}</h6><a href='delete.php?id={$row['id']}'>删除</a>
                                </div></div>";
                            }
                        ?>
                    

                </div>
</body>
</html>