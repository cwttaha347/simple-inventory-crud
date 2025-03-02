<?php
$dashboard = route("dashboard", "view");
$inventory = route("inventory", "view");
$inventory_add = route("inventory", "add");
$sales = route("sales", "view");
$clients = route("clients", "view");
$add_products = route("inventory", "add");
$category_add = route("category", "add");
$del_product = route("inventory", "delete");
$edit_product = route("inventory", "edit");
$website_settings = route("website_settings", "view");
$inventory_more = route("inventory", "view_more");
$category = route("category", "view");
$invoice = route("invoices", "view");
$invoice_gen = route("invoices", "add");
$del_invoice = route("invoices", "delete");
$invoice_more = route("invoices", "view_more");
$category_edit = route("category", "edit");
if ($dashboard) {
    $sales_new = fetch_data("sales");
?>

    <section class="section">
        <div class="row">

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-chart">
                        <canvas id="balance-chart" height="80"></canvas>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Earnings</h4>
                        </div>
                        <div class="card-body">
                            PKR&nbsp;<?= $sales_new['earning'] ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-chart">
                        <canvas id="sales-chart" height="80"></canvas>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Sales</h4>
                        </div>
                        <div class="card-body">
                            <?= $sales_new['sales'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <canvas id="myChart" style="display:none;" height="158"></canvas>



    </section>


<?php }


if ($inventory) {
?>
    <div class="container" style="padding: 3%;background-color: white;border-radius:20px;">
        <h5 class="text-center bg-dark p-3 mt-3 mb-3 text-white">Inventory</h5>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Qty</th>
                    <th>Image</th>
                    <th>Action</th>


                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                while ($row_pro = mysqli_fetch_assoc($products_page)) {
                ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $row_pro['product_name'] ?></td>
                        <td><?= $row_pro['quantity'] ?></td>
                        <td><img src="<?= $row_pro['image'] ?>" width="90px" height="90px" alt=""></td>
                        <td><a class="btn btn-info" href="index.php?page=inventory&type=view_more&id=<?= $row_pro['id'] ?>">More Details</a>
                            <a class="btn btn-primary" href="index.php?page=inventory&type=edit&id=<?= $row_pro['id'] ?>">Edit</a>
                            <a class="btn btn-success" href="index.php?page=invoices&type=add&id=<?= $row_pro['id'] ?>">Gen Invoice</a>

                            <a class="btn btn-danger" href="index.php?page=inventory&type=delete&id=<?= $row_pro['id'] ?>">Delete</a>
                        </td>

                    </tr>
                <?php
                    $i++;
                }

                ?>


            </tbody>
        </table>

    </div>
<?php
}
if ($add_products) {
?>

    <div class="container" style="padding: 3%;background-color: white;border-radius:20px;">
        <h5 class="text-center text-white bg-dark p-3 mt-3 mb-3">Inventory Add Items</h5>

        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Product Name</label>
                <input name="product_name" required type="text" class="form-control" />
                <p class="help-block">Type Product Name here</p>
            </div>
            <div class="form-group">
                <label>Product Description</label>
                <input name="product_desc" required type="text" class="form-control" />
                <p class="help-block">Type Product Description here</p>
            </div>
            <div class="form-group">
                <label>Retail Price</label>
                <input name="retail_price" required type="number" class="form-control" />
                <p class="help-block">Type Product retail price here</p>
            </div>
            <div class="form-group">
                <label>Whole Sale Price</label>
                <input name="whole_s_price" required type="number" class="form-control" />
                <p class="help-block">Type Product whole sale price here</p>
            </div>
            <div class="form-group">
                <label>Quantity</label>
                <input name="quantity" required type="number" class="form-control" />
                <p class="help-block">Type Product Total Quantity here</p>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input name="pro_img" required type="file" class="form-control" />
                <p class="help-block">Type Product image here</p>
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category" required class="form-control selectric text-white" id="">
                    <option selected disabled value="-">---Select---</option>
                    <?php
                    $cat = fetch_data_while("categories");
                    while ($row_cat = mysqli_fetch_assoc($cat)) {
                    ?>

                        <option value="<?= $row_cat['id'] ?>"><?= $row_cat['category_name'] ?></option>


                    <?php
                    }

                    ?>

                </select>
                <p class="help-block">Select status here</p>
            </div>
            <div class="form-group">
                <label>Status</label>

                <select name="status" required id="" class="form-control selectric text-white">
                    <option selected disabled value="-">---Select---</option>
                    <option value="1">Active</option>
                    <option value="0">Draft</option>
                </select>
                <p class="help-block">Select status here</p>
            </div>
            <button class="btn btn-primary" name="add_product" type="submit">Add Product</button>
        </form>



    </div>



<?php
}

if ($category_add) {
?>

    <div class="container" style="padding: 3%;background-color: white;border-radius:20px;">
        <h5 class="text-center text-white bg-dark p-3 mt-3 mb-3">Categories</h5>

        <form method="post" style="width: 50%;">
            <div class="form-group">
                <label>Category Name</label>
                <input name="category_name" required type="text" class="form-control" />
                <p class="help-block">Type Category Name here</p>
            </div>


            <div class="form-group">
                <label>Status</label>
                <select name="status" required id="" class="form-control text-white">
                    <option selected disabled value="-">---Select---</option>
                    <option value="1">Active</option>
                    <option value="0">Draft</option>
                </select>
                <p class="help-block">Select status here</p>
            </div>
            <button class="btn btn-primary" name="add_category" type="submit">Add Category</button>
        </form>



    </div>




<?php
}

if ($del_product && isset($_GET['id'])) {
    $id = $_GET['id'];
    $del = delete_data("products", "=", "id", $id);
    if ($del) {
        echo '<script>window.history.back()</script>';
    }
}

if ($edit_product && isset($_GET['id'])) {
    $id = $_GET['id'];
    $row_edit = fetch_data("products", "=", "id", $id);
?>

    <div class="container" style="padding: 3%;background-color: white;border-radius:20px;">
        <h5 class="text-center bg-dark p-3 mt-3 mb-3 text-white">Inventory Update Items</h5>

        <form method="post" style="width: 50%;" enctype="multipart/form-data">
            <div class="form-group">
                <label>Product Name</label>
                <input value="<?= $row_edit['product_name'] ?>" name="product_name" required type="text" class="form-control" />
                <p class="help-block">Type Product Name here</p>
            </div>
            <div class="form-group">
                <label>Product Description</label>
                <input value="<?= $row_edit['product_desc'] ?>" name="product_desc" required type="text" class="form-control" />
                <p class="help-block">Type Product Description here</p>
            </div>
            <div class="form-group">
                <label>Retail Price</label>
                <input value="<?= $row_edit['retail_price'] ?>" name="retail_price" required type="number" class="form-control" />
                <p class="help-block">Type Product retail price here</p>
            </div>
            <div class="form-group">
                <label>Whole Sale Price</label>
                <input name="whole_s_price" value="<?= $row_edit['whole_s_price'] ?>" required type="number" class="form-control" />
                <p class="help-block">Type Product whole sale price here</p>
            </div>
            <div class="form-group">
                <label>Quantity</label>
                <input name="quantity" value="<?= $row_edit['quantity'] ?>" required type="number" class="form-control" />
                <p class="help-block">Type Product Total Quantity here</p>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input name="pro_img" required type="file" class="form-control" />
                <img src="<?= $row_edit['image'] ?>" width="90px" height="90px" alt="">
                <p class="help-block">Type Product image here</p>
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category" required class="form-control text-white" id="">

                    <?php
                    $cat = fetch_data_while("categories");
                    while ($row_cat = mysqli_fetch_assoc($cat)) {
                        if ($row_edit['cat_id'] == $row_cat['id']) {
                            $selected = "selected";
                        } else {
                            $selected = "";
                        }
                    ?>

                        <option <?= $selected ?> value="<?= $row_cat['id'] ?>"><?= $row_cat['category_name'] ?></option>


                    <?php
                    }

                    ?>

                </select>
                <p class="help-block">Select status here</p>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" required id="" class="form-control text-white">
                    <option selected disabled value="-">---Select---</option>
                    <?php
                    $selected_status_1 = "";
                    $selected_status_2 = "";
                    if ($row_edit['status'] == 1) {
                        $selected_status_1 = "selected";
                    } elseif ($row_edit['status'] == 2) {
                        $selected_status_2 = "selected";
                    }

                    ?>
                    <option <?= $selected_status_1 ?> value="1">Active</option>
                    <option <?= $selected_status_2 ?> value="0">Draft</option>
                </select>
                <p class="help-block">Select status here</p>
            </div>
            <button class="btn btn-primary" name="add_product" type="submit">Update Product</button>
        </form>



    </div>

<?php
}

if ($category) {
?>

    <div class="container" style="padding: 3%;background-color: white;border-radius:20px;">
        <h5 class="text-center bg-dark p-3 mt-3 mb-3 text-white">Inventory Categories <a style="margin-left: 30px;text-decoration: none;color:white;background-color: greenyellow;padding:5px;" href="index.php?page=category&type=add"><i class="fa fa-solid fa-plus"></i></a></h5>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category Name</th>

                    <th>Action</th>


                </tr>
            </thead>
            <tbody>
                <?php
                $categories = fetch_data_while("categories");
                $i = 1;
                while ($row_cat = mysqli_fetch_assoc($categories)) {
                ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $row_cat['category_name'] ?></td>
                        <td>
                            <a class="btn btn-primary" href="index.php?page=category&type=edit&id=<?= $row_cat['id'] ?>">Edit</a>
                            <a class="btn btn-danger" href="index.php?page=category&type=delete&id=<?= $row_cat['id'] ?>">Delete</a>
                        </td>

                    </tr>
                <?php
                    $i++;
                }

                ?>


            </tbody>
        </table>

    </div>

<?php
}
if ($inventory_more && isset($_GET['id'])) {
    $id = $_GET['id'];
    $row_p_m = fetch_data("products", "=", "id", $id);
?>
    <style>
        td {
            text-wrap: wrap;
            padding: 3%;
        }
    </style>

    <div class="container" style="padding: 3%;background-color: white;border-radius:20px;">

        <table border="2" class="table table-responsive table-dark">
            <thead>
                <th><?= $row_p_m['product_name'] ?></th>
            </thead>
            <tbody>
                <td>Description :<?= $row_p_m['product_desc'] ?></td>
                <td>Retail Price :PKR <?= $row_p_m['retail_price'] ?></td>
                <td>Whole Sale Price : PKR <?= $row_p_m['whole_s_price'] ?></td>
                <td>Quantity : <?= $row_p_m['quantity'] ?></td>
                <td>image <img src="<?= $row_p_m['image'] ?>" width="90px" height="90px" alt=""></td>
                <td>Status <?php if ($row_p_m['status'] == 1) {
                                echo 'Active';
                            } else {
                                echo 'Draft';
                            } ?></td>
                <td>Date added <?= $row_p_m['date_added'] ?></td>

            </tbody>
        </table>



    </div>


<?php

}

if ($invoice) {
?>

    <div class="container" style="padding: 3%;background-color: white;border-radius:20px;">

        <h5 class="text-center bg-dark p-3 mt-3 mb-3 text-white">Invoices </h5>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Invoice ID</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Company</th>
                    <th>Total</th>

                    <th>Action</th>


                </tr>
            </thead>
            <tbody>
                <?php
                $invoice = fetch_data_while("invoices");
                $i = 1;
                while ($row_inv = mysqli_fetch_assoc($invoice)) {
                ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $row_inv['invoice_id'] ?></td>

                        <td><?= $row_inv['product'] ?></td>
                        <td><?= $row_inv['qty'] ?></td>
                        <td><?= $row_inv['company'] ?></td>
                        <td><?= $row_inv['total'] ?></td>



                        <td><a class="btn btn-info w-75" href="index.php?page=invoices&type=view_more&id=<?= $row_inv['id'] ?>">More Details</a>

                            <a class="btn btn-danger w-75" href="index.php?page=invoices&type=delete&id=<?= $row_inv['id'] ?>">Delete</a>
                        </td>

                    </tr>
                <?php
                    $i++;
                }

                ?>


            </tbody>
        </table>



    </div>



<?php
}

if ($invoice_gen && isset($_GET['id'])) {
    $id = $_GET['id'];
    $pro = fetch_data("products", "=", "id", $id);
    $inv = generateRandomInvoiceId();
?>

    <div class="container" style="background-color: white;border-radius:20px;padding:3%;">
        <h1 class="text-center text-white bg-dark p-3 mt-3 mb-3">Generate Invoice</h1>
        <form method="post">
            <div class="row">
                <div class="col-lg-4">
                    <input type="hidden" id="default_price" value="<?= $pro['whole_s_price'] ?>">
                    <label for="" class="form-label">Invoice ID</label>
                    <input type="text" required name="inv_id" disabled value="<?= $inv ?>" class="form-control">
                    <input type="hidden" required name="inv_id" value="<?= $inv ?>" class="form-control">
                    <input type="hidden" required name="pro_id" value="<?= $pro['id'] ?>" class="form-control">



                </div>
                <div class="col-lg-4">
                    <label for="" class="form-label">Product Name</label>
                    <input type="text" required name="pro_name" disabled value="<?= $pro['product_name'] ?>" class="form-control">
                    <input type="hidden" required name="pro_name" value="<?= $pro['product_name'] ?>" class="form-control">
                </div>
                <div class="col-lg-4">
                    <label for="" class="form-label">Product Total Quantity</label>
                    <input type="text" disabled required value="<?= $pro['quantity'] ?>" class="form-control">
                </div>
            </div>
            <div class="row mt-3">

                <div class="col-lg-6">
                    <label for="" class="form-label">Select Quantity</label>
                    <input type="number" id="qty" name="pro_qty" value="0" required class="form-control">
                </div>
                <div class="col-lg-6">
                    <label for="" class="form-label">Total Price</label>
                    <input type="text" id="total" name="total_price" disabled required class="form-control">
                    <input type="hidden" id="total1" name="total_price" required class="form-control">

                </div>

            </div>

            <div class="row mt-3">
                <div class="col-lg-4">

                    <label for="" class="form-label">Client / Company Name</label>
                    <input type="text" name="company" value="[company name]" required class="form-control">

                </div>
                <div class="col-lg-4">

                    <label for="" class="form-label">Payment Due Date</label>
                    <input type="date" name="due_date" required class="form-control">

                </div>
                <div class="col-lg-4">

                    <label for="" class="form-label">Issue Date</label>
                    <input type="text" id="issue_date" name="issue_date" required disabled class="form-control">
                    <input type="hidden" id="issue_date1" name="issue_date" required class="form-control">


                </div>

            </div>
            <div class="row mt-3">
                <div class="col-lg-6">
                    <label for="" class="form-label">Bill From</label>
                    <textarea name="bill_from" required class="form-control" id="">
dreamer suppliyer inc
address : 123 street , karachi ,pakistan
123@gmail..com
                    </textarea>
                </div>
                <div class="col-lg-6">
                    <label for="" class="form-label">Bill To</label>
                    <textarea name="bill_to" required class="form-control" id=""></textarea>
                </div>
            </div>

            <button class="btn btn-dark mt-3" type="submit" name="gen_invoice">Save and print</button>


        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let issue_date = new Date();
            const year = issue_date.getFullYear();
            const month = String(issue_date.getMonth() + 1).padStart(2, '0');
            const day = String(issue_date.getDate()).padStart(2, '0');
            let date_input = $('#issue_date');
            date_input.val(`${year}/${month}/${day}`);
            $('#issue_date1').val(`${year}/${month}/${day}`);

            let price = $('#total');
            let default_price = parseInt($('#default_price').val());

            $('#qty').on('input', function() {
                let qty = parseInt($(this).val());
                let new_price = qty * default_price;


                if (isNaN(new_price)) {
                    new_price = 0;
                }

                price.val(new_price);
                $('#total1').val(new_price);
            });
        });
    </script>


<?php

}

if ($del_invoice && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sales = fetch_data("sales");
    $invoice_call = fetch_data("invoices", "=", "id", $id);
    $pro_call = fetch_data("products", "=", "id", $invoice_call['pro_id']);
    $new_qty_p = $pro_call['quantity'] + $invoice_call['qty'];
    $new_sales = $sales['sales'] - $invoice_call['qty'];
    $new_earning = $sales['earning'] - $invoice_call['total'];
    $process_1 =  update("products", ['quantity'], [$new_qty_p], "=", "id", $invoice_call['pro_id']);
    $process_2 =  update("sales", ['sales', 'earning'], [$new_sales, $new_earning], "=", "id", "1");



    if ($process_1 && $process_2) {
        delete_data("invoices", "=", "id", $id);
        echo '<script>window.history.back()</script>';
    }
}

if ($invoice_more && isset($_GET['id'])) {
    $id = $_GET['id'];
    $invoice = fetch_data("invoices", "=", "id", $id);
?>
    <div class="container" id="invoice" style="padding: 3%;background-color: white;border-radius:20px;">
        <h1 class="text-center text-white p-3 bg-dark mt-3 mb-3">Invoice : <?= $invoice['company'] ?></h1>
        <div
            class="table-responsive">
            <table
                class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">#INVOICE ID</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Product</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td scope="row"><?= $invoice['invoice_id'] ?></td>
                        <td><?= $invoice['qty'] ?></td>
                        <td><?= $invoice['product'] ?></td>
                    </tr>

                </tbody>

                <thead>
                    <tr>
                        <th scope="col">Company</th>
                        <th scope="col">Payment Due</th>
                        <th scope="col">Issue Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td scope="row"><?= $invoice['company'] ?></td>
                        <td><?= $invoice['payment_due'] ?></td>
                        <td><?= $invoice['issue_date'] ?></td>
                    </tr>

                </tbody>
                <thead>
                    <tr>
                        <th scope="col">Bill From</th>
                        <th scope="col">Bill To</th>
                        <th scope="col">Total Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td scope="row"><?= $invoice['bill_from'] ?></td>
                        <td><?= $invoice['bill_to'] ?></td>
                        <td><?= $invoice['total'] ?></td>
                    </tr>

                </tbody>
            </table>
        </div>



    </div>
    <center> <button id="downloadBtn" class="btn btn-primary mt-3 mb-4">Download Invoice</button></center>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script>
        window.jsPDF = window.jspdf.jsPDF;

        document.getElementById('downloadBtn').addEventListener('click', function() {
            const invoice = document.getElementById('invoice');
            html2canvas(invoice).then((canvas) => {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jsPDF({
                    orientation: 'landscape',
                    unit: 'pt',
                    format: [canvas.width, canvas.height]
                });
                pdf.addImage(imgData, 'PNG', 0, 0, canvas.width, canvas.height);
                pdf.save('invoice.pdf');
            });
        });
    </script>

<?php

}

if ($category_edit && isset($_GET['id'])) {
    $id = $_GET['id'];
    $category = fetch_data("categories", "=", "id", $id);
?>
    <div class="container" style="padding:3%;background-color: white;border-radius: 20px;">
        <h1 class="text-center text-white p-3 mt-3 mb-3 bg-dark">Edit Category</h1>
        <form method="post">
            <input type="hidden" value="<?= $id ?>" name="id">
            <div class="row">
                <div class="col-lg-6">
                    <label class="form-label">Category Name</label>
                    <input type="text" class="form-control" name="category_name" value="<?= $category['category_name'] ?>" required>
                </div>
                <div class="col-lg-6">
                    <button class="btn btn-success mt-4" type="submit" name="update_category">Update Category</button>
                </div>
            </div>




        </form>





    </div>

<?php
}
?>