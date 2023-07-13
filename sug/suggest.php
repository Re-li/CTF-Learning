
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>提交成功</title>
</head>
<body>
<div>

<p>请写下信息：</p>
<br>
<form method="post" action="./suggest.php">
    <table>
        <tr>
            <th style="text-align: right;"><label for="填写人">填写人：</label></th>
            <td><input type="text" id="name" name="name" /></td>
        </tr>
        <tr>
            <th style="text-align: right;"><label for="详细意见">详细意见：</label></th>
            <td><textarea name="suggestion"></textarea></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" id="submit" value="提交" name="submit"/></td>
        </tr>
    </table>
</form>
</div>
<?php

    //连接数据库并创建表
    $link = mysqli_connect("localhost","sug","123456","sug");
    if($link){
        echo '您的信息已收到';
    }
    else{
        echo 'NO';
    }

    //第一步：
    //用数据库代码创建一个新表格，内含两个列， name 和 suggestion
    // $sql = "CREATE TABLE suggestion(
    //     name VARCHAR(10) not null,
    //     suggestion VARCHAR(300) not null
    // )";

    //如果创建表成功，就在页面显示一个提示信息
    // if(mysqli_query($link,$sql)){
    //     echo 'suggestion have created success!';
    // }
    // else{
    //     echo 'create error';
    // }

    //创建
    $name = $_POST['name'];
    $suggestion = $_POST['suggestion'];

    //第二步：
    //插入数值
    $query = "INSERT INTO suggestion(name,suggestion)"."value('$name','$suggestion')";
    $result = mysqli_query($link,$query);
    // if(mysqli_query($link,$query)){
    //     echo 'success!';
    // }
    // else{
    //     echo 'error';
    // }

    //第三步：
    //显示数据
    $query = "SELECT * FROM suggestion";
    $result = mysqli_query($link,$query);
    //输出表头
    echo '<table><tr></th>'.'编号'.'</th><th>'.'姓名'.'</th><th>'.'建议'.'</th></tr>';
    //编号 用来计数
    $i=1;
    while($row = mysqli_fetch_array($result)){
        echo '<tr><td>'.$i.'</td>';
        echo '<td>'.$row['name'].'</td>';
        echo '<td>'.$row['suggestion'].'</td></tr>';
        $i=$i+1;
    };
    echo '</table>';
    //关闭数据库
    mysqli_close($link);

    // echo $name;
    // echo '您提交的信息是：';
    // echo '<br/>';
    // echo $suggestion;
    // echo '感谢您的提交，我们会尽快处理！';

?>
    </center>    
</body>
</html>