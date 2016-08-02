<?php  
/*
Plugin Name: 主页图片添加插件
Plugin URI: None
Description: 此插件可以向主页添加图片
Version: 1.0.0
Author: onion
Author URI: None
License: GPL
*/

register_activation_hook(__FILE__, 'picture_plugin_install');

function picture_plugin_install()
{
    add_option("neup_picture");
    for($i = 1; $i <= 5; $i++)
    {
        $options["top_left_picture$i"] = " ";
        $options["top_left_content$i"] = " ";
        $options["top_left_url$i"] = " ";
    }
    for($i = 1; $i <= 3; $i++)
    {
        $options["activity_picture$i"] = " ";
        $options["activity_url$i"] = " ";
    }
    update_option("neup_picture", $options);   
}

register_deactivation_hook(__FILE__, 'picture_plugin_unstall');

function picture_plugin_unstall()
{
    delete_option("neup_picture");
}

if(is_admin())
{
    add_action('admin_menu', 'add_picture_menu');
}

function add_picture_menu()
{
    add_options_page('修改主页图片', '修改主页图片', 'administrator', 'set_picture', 'set_picture_page');
}

function set_picture_page()
{
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $options = [];
        for($i = 1; $i <= 5; $i++)
        {
            $options["top_left_picture$i"] = $_POST["top_left_picture$i"];
            $options["top_left_content$i"] = $_POST["top_left_content$i"];
            $options["top_left_url$i"] = $_POST["top_left_url$i"];
        }
        for($i = 1; $i <= 3; $i++)
        {
            $options["activity_picture$i"] = $_POST["activity_picture$i"];
            $options["activity_url$i"] = $_POST["activity_url$i"];
        }
        update_option("neup_picture", $options);
    }
    else
    {
        $options = get_option("neup_picture");
    }
    ?>
    <div>
        <h2>Set Picture</h2>
        <form action="" method="post">
            <h3>左上滚动图片</h3>
            <table>
                <tr>
                    <td>图片一</td><td><input type="text" name="top_left_picture1" value=<?php echo $options['top_left_picture1'] ?>></td>
                    <td>内容一</td><td><input type="text" name="top_left_content1" value=<?php echo $options['top_left_content1'] ?>></td>
                    <td>链接一</td><td><input type="text" name="top_left_url1" value=<?php echo $options['top_left_url1'] ?>></td>
                </tr>
                <tr>
                    <td>图片二</td><td><input type="text" name="top_left_picture2" value=<?php echo $options['top_left_picture2'] ?>></td>
                    <td>内容二</td><td><input type="text" name="top_left_content2" value=<?php echo $options['top_left_content2'] ?>></td>
                    <td>链接二</td><td><input type="text" name="top_left_url1" value=<?php echo $options['top_left_url2'] ?>></td>
                </tr>
                <tr>
                    <td>图片三</td><td><input type="text" name="top_left_picture3" value=<?php echo $options['top_left_picture3'] ?>></td>
                    <td>内容三</td><td><input type="text" name="top_left_content3" value=<?php echo $options['top_left_content3'] ?>></td>
                    <td>链接三</td><td><input type="text" name="top_left_url1" value=<?php echo $options['top_left_url3'] ?>></td>
                </tr>
                <tr>
                    <td>图片四</td><td><input type="text" name="top_left_picture4" value=<?php echo $options['top_left_picture4'] ?>></td>
                    <td>内容四</td><td><input type="text" name="top_left_content4" value=<?php echo $options['top_left_content4'] ?>></td>
                    <td>链接四</td><td><input type="text" name="top_left_url1" value=<?php echo $options['top_left_url4'] ?>></td>
                </tr>
                <tr>
                    <td>图片五</td><td><input type="text" name="top_left_picture5" value=<?php echo $options['top_left_picture5'] ?>></td>
                    <td>内容五</td><td><input type="text" name="top_left_content5" value=<?php echo $options['top_left_content5'] ?>></td>
                    <td>链接五</td><td><input type="text" name="top_left_url1" value=<?php echo $options['top_left_url5'] ?>></td>
                </tr>
            </table>
            <h3>右下活动图片</h3>
            <table>
                <tr>
                    <td>图片一</td><td><input type="text" name="activity_picture1" value=<?php echo $options['activity_picture1'] ?>></td>
                    <td>链接一</td><td><input type="text" name="activity_url1" value=<?php echo $options['activity_url1'] ?>></td>
                </tr>
                <tr>
                    <td>图片二</td><td><input type="text" name="activity_picture2" value=<?php echo $options['activity_picture2'] ?>></td>
                    <td>链接二</td><td><input type="text" name="activity_url2" value=<?php echo $options['activity_url2'] ?>></td>
                </tr>
                <tr>
                    <td>图片三</td><td><input type="text" name="activity_picture3" value=<?php echo $options['activity_picture3'] ?>></td>
                    <td>链接三</td><td><input type="text" name="activity_url3" value=<?php echo $options['activity_url3'] ?>></td>
                </tr>
            </table>
            图片请输入图片链接
            <br>
            <input type="submit" name="submit" class = "button button-primary" value = "保存更改">
            <?php ?>
        </form>
    </div>
    <?php 
}
?>
