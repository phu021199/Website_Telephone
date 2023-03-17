<?php
//Khai báo sử dụng session
//session_start();
//Khai báo utf-8 để hiện thị được tiếng Việt
header('Content-Type: text/html; charset=UTF-8');
//Xử lý đăng nhập
if(isset($_POST['dangnhap'])){
    //Kết nối tới database
    //include('config.php');
    //Lấy dữ liệu nhập vào
    $username=addslashes($_POST['txtUsername']);
    $password=addslashes($_POST['txtPassword']);
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if(!$username || !$password){
        echo "Vui lòng nhập đầy đủ tên đăng nhập với mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    //Mã hóa password
    //$password = md5($password);
    if($username=='admin')
        $password=md5($password);
    //Kiểm tra tên đăng nhập có tồn tại không
    //$query=mysqli_query($con,"SELECT MSKH, Pass FROM khachhang WHERE MSKH='$username'");
    //if(mysqli_num_rows($query)==0){
        if($username!='admin'){
        echo"Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    //Lấy mật khẩu trong database ra
    //$row=mysqli_fetch_array($query);
    //So sánh 2 mật khẩu có trùng khớp hay không
    if($password != '31198f5e175e8a34dbd028d9c9ef6427'){
        echo"Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    } else header("Location: http://localhost/b1706628/Quan_Ly/indext_AD.php");
    //Lưu tên đăng nhập
/*    $_SESSION['MSKH']=$username;
    if($_SESSION['MSKH']=='admin')
        header('Location:ds_sv.php');
    else
        header('Location: Upload_list.php');
    die();
*/
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Hệ thống quản lý bán điện thoại</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <style>
    h1{
	    text-align:center;
	    font-family:Time New Roman;
	    font-size:30px;
	    color:#057cb8;
    }
    </style>
    <body>
        <h1>Đăng nhập hệ thống</h1>
        <form action="index.php?do=login" method="POST">
                <table align="center" cellpadding='3' cellspacing='0' border='1' style='background-color:#dcc6d7'>
                <tr>
                    <td>
                        Tên đăng nhập:
                    </td>
                    <td>
                        <input type="text" name="txtUsername" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Mật khẩu:
                    </td>
                    <td>
                        <input type="password" name="txtPassword" />
                    </td>
                </tr>
                <th colspan="2">
                    <input type='submit' name='dangnhap' value='Đăng nhập' />
                    
                </th>
                </tr>
            </table>
        </form>
    </body>
</html>