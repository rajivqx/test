<?php
/*
 * Plugin Name: Custom EMS
 * Description: My plugin to explain the frontend crud functionality.
 * Version: 1.0
 * Author: Diwakar Academy
 * Plugin URI: hhttps://diwakaracademy.com/how-to-create-crud-operations-from-front-end-in-wordpress/
 * Author URI: https://diwakaracademy.com/
 */

register_activation_hook(__FILE__, 'table_creator2');
function table_creator2()
{
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'ems2';
    $sql = "DROP TABLE IF EXISTS $table_name;
            CREATE TABLE $table_name(
            id mediumint(11) NOT NULL AUTO_INCREMENT,
            emp_id varchar(50) NOT NULL,
            emp_name varchar (250) NOT NULL,
            emp_email varchar (250) NOT NULL,
            emp_dept varchar (250) NOT NULL,
            PRIMARY KEY id(id)
            )$charset_collate;";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

//[frontend_crud]
add_shortcode('frontend_crud','da_ems_frontend_crud_callback');


function da_ems_frontend_crud_callback(){

    global $wpdb;
    $table_name = $wpdb->prefix.'ems2';
    $msg = '';
    if(@$_REQUEST['action'] == 'submit'){

        $wpdb->insert("$table_name", [
            'emp_id' => sanitize_text_field($_REQUEST['emp_id']),
            'emp_name'=> sanitize_text_field($_REQUEST['emp_name']),
            'emp_email'=> sanitize_email($_REQUEST['emp_email']),
            'emp_dept'=> sanitize_text_field($_REQUEST['emp_dept']),
        ]);

        if($wpdb->insert_id > 0){
            $msg = "Saved Successfully";
        }else{
            $msg = "Failed to save data";
        }


    }

    if(@$_REQUEST['action'] == 'update-emp' && @$_REQUEST['id']){

        $id = @$_REQUEST['id'];

        if(@$_REQUEST['emp_id'] && @$_REQUEST['emp_name'] && @$_REQUEST['emp_email'] && @$_REQUEST['emp_dept']){
            $update = $wpdb->update("$table_name",[
                'emp_id' =>sanitize_text_field($_REQUEST['emp_id']),
                'emp_name' =>sanitize_text_field($_REQUEST['emp_name']),
                'emp_email' =>sanitize_email($_REQUEST['emp_email']),
                'emp_dept' =>sanitize_text_field($_REQUEST['emp_dept'])],
                ['id' => $id]);

            if($update){
                $msg = "Data Updated <a href='".get_page_link(get_the_ID())."'>Add Employee</a>";
            }

        }

        $employee = $wpdb->get_row($wpdb->prepare("select * from $table_name where id = %d", $id), ARRAY_A);

        $emp_id = $employee['emp_id'];
        $emp_name = $employee['emp_name'];
        $emp_email = $employee['emp_email'];
        $emp_dept = $employee['emp_dept'];
    }

    if(@$_REQUEST['action'] == 'delete-emp' && @$_REQUEST['id']){

        $id = @$_REQUEST['id'];

        if($id){
            $row_exits = $wpdb->get_row($wpdb->prepare("select * from $table_name where id = %d",$id),ARRAY_A);

            if(count($row_exits)> 0){

                $wpdb->delete("$table_name", array('id'=>$id));
            }
        }
        ?>
            <script>
                location.href="<?php echo get_the_permalink(); ?>";
            </script>
        <?php
    }

    ?>

    <div class="form_container">

    <h4><?php echo @$msg; ?></h4>
    <form method="post">

        <p>
            <label>EMP ID</label>
            <input type="text" name="emp_id" value="<?php echo @$emp_id; ?>" placeholder="Enter ID" required>

        </p>

        <p>
            <label>Name</label>
            <input type="text" name="emp_name"  value="<?php echo @$emp_name; ?>" placeholder="Enter Name" required>

        </p>
        <p>
            <label>Email</label>
            <input type="email" name="emp_email" value="<?php echo @$emp_email; ?>" placeholder="Enter Email" required>
        </p>
        <p>
            <label>Department</label>
            <input type="text" name="emp_dept" value="<?php echo @$emp_dept; ?>" placeholder="Enter Department" required>
        </p>

        <p>
            <button type="submit" name="action" value="<?php echo (@$_REQUEST['action'] == 'update-emp')?'update-emp':'submit'; ?>"><?php echo (@$_REQUEST['action'] == 'update-emp')?'Update':'Submit'; ?></button>
        </p>
    </form>

    </div>
<?php

    $employee_list = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);
    $i = 1;
    if($employee_list > 0 ){ ?>

        <div style="margin-top: 40px">
            <table border="1" cellpadding="10" style="font-size:14px;">
                <tr>
                <th>S. No.</th>
                <th>EMP ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Dept.</th>
                <th>Action</th>
                </tr>
                <?php foreach ($employee_list as $index =>  $employee):

                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $employee['emp_id'];  ?></td>
                        <td><?php echo $employee['emp_name']; ?></td>
                        <td><?php echo $employee['emp_email'];; ?></td>
                        <td><?php echo $employee['emp_dept'];; ?></td>
                        <td>
                            <a href="?action=update-emp&id=<?php echo $employee['id']; ?>">Update</a>
                            <a href="?action=delete-emp&id=<?php echo $employee['id']; ?>" onclick="return confirm('Are you sure to remove this record?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>


        </div>



    <?php }
}
