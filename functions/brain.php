<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "inventory");

$ip = $_SERVER['REMOTE_ADDR'];













function error($message)
{
    $alert = '

<div id="alert-container">
    <span class="message">' . $message . '</span>
    <button class="close-btn">Close</button>
</div>
<script>
const alertContainer = document.getElementById("alert-container");
const closeBtn = document.querySelector(".close-btn");


setTimeout(() => {
    alertContainer.classList.add("show");
}, 3000);

closeBtn.addEventListener("click", () => {
    alertContainer.classList.remove("show");
});


setTimeout(() => {
    alertContainer.classList.remove("show");
}, 8000);
</script>';

    return $alert;
}


function count_e($table, $clause = Null)

{
    global $con;
    if ($clause == null) {
        $select = mysqli_query($con, "SELECT * FROM $table ");
        $count = mysqli_num_rows($select);
        return $count;
    } else {
        $select = mysqli_query($con, "SELECT * FROM $table WHERE $clause");
        $count = mysqli_num_rows($select);
        return $count;
    }
}


function upload_file($path, $filename)
{

    $file_tmp_name = $filename['tmp_name'];
    $file_name = basename($filename['name']);

    $upload_directory = $path;

    $target_path = $upload_directory . $file_name;

    if (move_uploaded_file($file_tmp_name, $target_path)) {

        return $target_path;
    } else {

        return false;
    }
}
function fetch_data_join(
    $table1,
    $table2,
    $join_condition1,
    $table3 = null,
    $join_condition2,
    $select_columns = '*',
    $keyword,
    $clause = null,
    $entity = null,
    $entity_value = null,
    $clause2 = null,
    $entity2 = null,
    $entity_value2 = null
) {
    global $con;
    $query = "SELECT $select_columns FROM $table1
LEFT JOIN $table2 ON $join_condition1";


    if ($table3 !== null) {
        $query .= " LEFT JOIN $table3 ON $join_condition2";
    }


    if ($clause !== null && $entity !== null && $entity_value !== null) {
        $query .= " $keyword $entity $clause '$entity_value'";
    }

    if ($clause2 !== null && $entity2 !== null && $entity_value2 !== null) {
        $query .= " $clause2 $entity2 '$entity_value2'";
    }

    $result = mysqli_query($con, $query);
    return $result;
}



function fetch_data(
    $table,
    $clause = null,
    $entity = null,
    $entity_value = null,
    $clause2 = null,
    $entity2 = null,
    $entity_value2 = null
) {
    global $con;
    $query = "SELECT * FROM $table";
    if ($clause !== null) {
        $query .= " WHERE $entity $clause '$entity_value'";
    }
    if ($clause2 !== null) {
        $query .= " $clause2 $entity2 $clause $entity_value2";
    }
    $result = mysqli_query($con, $query);

    return mysqli_fetch_assoc($result);
}

function fetch_data_while($table, $clause = null, $entity = null, $entity_value = null, $clause2 = null, $entity2 =
null, $entity_value2 = null)
{
    global $con;
    $query = "SELECT * FROM $table";
    if ($clause !== null) {
        $query .= " WHERE $entity $clause '$entity_value'";
    }
    if ($clause2 !== null) {
        $query .= " $clause2 $entity2 '$entity_value2'";
    }
    $result = mysqli_query($con, $query);

    return $result;
}
function delete_data(
    $table,
    $clause = null,
    $entity = null,
    $entity_value = null,
    $clause2 = null,
    $entity2 = null,
    $entity_value2 = null,
    $clause3 = null,
    $entity3 = null,
    $entity_value3 = null
) {
    global $con;
    $query = "DELETE FROM $table";
    if ($clause !== null && $entity !== null && $entity_value !== null) {
        if (is_numeric($entity_value)) {
            $query .= " WHERE $entity $clause $entity_value";
        } else {
            $query .= " WHERE $entity $clause '$entity_value'";
        }
    }
    if ($clause2 !== null && $entity2 !== null && $entity_value2 !== null) {
        if (is_numeric($entity_value2)) {
            $query .= " $clause2 $entity2 $entity_value2";
        } else {
            $query .= " $clause2 $entity2 '$entity_value2'";
        }
    }
    if ($clause3 !== null && $entity3 !== null && $entity_value3 !== null) {
        if (is_numeric($entity_value3)) {
            $query .= " $clause3 $entity3 $entity_value3";
        } else {
            $query .= " $clause3 $entity3 '$entity_value3'";
        }
    }
    $result = mysqli_query($con, $query);

    return $result;
}




function insert($table, $fields_name = [], $fields_value = [])
{
    global $con;
    if (count($fields_name) !== count($fields_value)) {
        die("Number of fields and values do not match");
    }

    $escapedFieldsName = array_map(function ($field) use ($con) {
        return "`" . $con->real_escape_string($field) . "`";
    }, $fields_name);

    $escapedFieldsValue = array_map(function ($value) use ($con) {
        return "'" . $con->real_escape_string($value) . "'";
    }, $fields_value);

    $sql = "INSERT INTO `$table` (" . implode(', ', $escapedFieldsName) . ") VALUES (" . implode(', ', $escapedFieldsValue)
        . ")";

    if ($con->query($sql) === TRUE) {
        $session_id = $con->insert_id;
        return $session_id;
    } else {

        echo "Error: " . $sql . "<br>" . $con->error;
    }
}


function update(
    $table = null,
    $entitys = [],
    $entitys_value = [],
    $clause = null,
    $clause_entity = null,
    $clause_entity_value = null
) {
    global $con;
    if (count($entitys) !== count($entitys_value)) {
        die("Number of entity and values do not match");
    }

    $updates = [];
    foreach ($entitys as $key => $value) {
        $updates[] = "`" . $con->real_escape_string($value) . "`='" . $con->real_escape_string($entitys_value[$key]) . "'";
    }

    $sql = "UPDATE `$table` SET " . implode(', ', $updates) . " WHERE `$clause_entity` $clause '$clause_entity_value'";

    if ($con->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

function generate_rand_id()
{

    $uniqueID = uniqid() . mt_rand(100000, 999999);


    $uniqueID = substr($uniqueID, -6);

    return $uniqueID;
}

function login($email, $password)
{
    global $ip;

    $hashed_password = getPasswordFromDatabase($email);

    if ($hashed_password !== null) {

        $proceed = password_verify($password, $hashed_password);

        if ($proceed) {


            $_SESSION['user'] = $email;

            echo '<script>
window.location.href = "index.php?page=dashboard&type=view"
</script>';
            return true;
        }
    } else {

        echo '<script>
        window.location.href = "index.php?page=auth&type=login?incorrect"
        </script>';
        return false;
    }
}





function getPasswordFromDatabase($email)
{

    $user_data = fetch_data('users', '=', 'email', $email);


    if ($user_data !== null) {

        return $user_data['password'];
    } else {

        return null;
    }
}

function generateRandomInvoiceId()
{

    $prefix = "INV#";


    $randomNumber = mt_rand(100000, 999999);



    $invoiceId = $prefix . $randomNumber;


    return $invoiceId;
}


if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    if (login($email, $password)) {
        $log_e_msg = 'success';
    } else {
        $log_e_msg = 'error';
    }
}

if (isset($_POST['register'])) {
    extract($_POST);
    $register = register($email, $password);
    if ($register == "success") {
        $_SESSION['user'] = $email;
        echo '<script>window.location.href="index.php?page=dashboard&type=view"</script>';
    } elseif ($register == "exists") {
        echo '<script>window.location.href="index.php?page=auth&type=register?exists"</script>';
    } else {
        echo '<script>window.location.href="index.php?page=auth&type=register?error"</script>';
    }
}


if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user'];
    $row_user = fetch_data('users', '=', 'email', $user_id);
    $user_id = $row_user['id'];
}

if (isset($_GET['logout'])) {
    session_destroy();
    echo '<script>
window.location.href = "index.php?login"
</script>';
}

function register($email, $pwd)
{
    global $con;
    $hashed_password = password_hash($pwd, PASSWORD_DEFAULT);
    $check = count_e("users", "email");
    if ($check > 0) {
        return "exists";
    } else {
        $insert_user = insert("users", ["email", "password", "role", "status"], [$email, $hashed_password, "2", "1"]);
        if ($insert_user) {
            return "success";
        } else {
            return "failed";
        }
    }
}


$website = fetch_data("website");
if (isset($_SESSION['user'])) {
    $user = fetch_data("users", "=", "email", $_SESSION['user']);
}
$products_page = fetch_data_while("products");


if (isset($_POST['add_category'])) {
    extract($_POST);
    insert("categories", ['category_name', 'status'], [$category_name, $status]);
}

if (isset($_POST['add_product'])) {
    extract($_POST);
    $img = $_FILES['pro_img'];
    $transfer_img  = upload_file("images/products/", $img);
    if ($transfer_img) {
        insert("products", ['cat_id', 'product_name', 'product_desc', 'retail_price', 'whole_s_price', 'quantity', 'image', 'status'], [$category, $product_name, $product_desc, $retail_price, $whole_s_price, $quantity, $transfer_img, $status]);
    }
}

if (isset($_POST['gen_invoice'])) {

    extract($_POST);
    $p_confirm_check = fetch_data("products", "=", "id", $pro_id);
    $inv  = insert("invoices", ['invoice_id', 'product', 'pro_id', 'company', 'payment_due', 'issue_date', 'bill_from', 'bill_to', 'qty', 'total', 'status'], [$inv_id, $pro_name, $pro_id, $company, $due_date, $issue_date, $bill_from, $bill_to, $pro_qty, $total_price, "success"]);
    $new_qty =   $p_confirm_check['quantity'] - $pro_qty;
    if ($inv) {
        update("products", ['quantity'], [$new_qty], "=", "id", $pro_id);
        $saling = fetch_data("sales");
        $old_sales = $saling['sales'];
        $old_earn = $saling['earning'];
        $new_sales = $old_sales + $pro_qty;
        $new_earn = $old_earn + $total_price;
        update("sales", ['sales', 'earning'], [$new_sales, $new_earn], "=", "id", "1");
        echo '<script>window.location.href="index.php?page=invoices&type=view"</script>';
    }
}

if (isset($_POST['update_category'])) {
    extract($_POST);
    update("categories", ['category_name'], [$category_name], "=", "id", $id);
    echo '<script>window.location.href="index.php?page=category&type=view"</script>';
}
