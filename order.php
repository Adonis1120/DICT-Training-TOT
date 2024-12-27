<!--employee_salary_data include here -->
<?php include_once "order_data.php" ?>

<!-- Header -->
<?php include_once "header.php" ?>

<div class="container mt-4">
    <div class="row justify-content-center text-center">
        <h1>Order Calculator</h1>
        <h3>Basic Calculator</h3>
    </div>

    <div class="row justify-content-center align-items-center g-2">
        <div class="col"><h1>Order Item</h></div>
    </div>
    <div class="row justify-content-center g-2">
        <div class="col-md-8">
            <form method="POST" action="order.php">
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form_label">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form_label">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="" required>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form_label">Bread</label>
                        <select class="form-select form-select-md" name="bread" id="">
                            <option selected>--Select Bread--</option>
                            <option value="1">Pandesal</option>
                            <option value="2">Loaf Bread</option>
                            <option value="3">Cake</option>
                        </select>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="" class="form_label">Quantity</label>
                            <input type="text" class="form-control" name="bread_qty" id="">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form_label">Drink</label>
                        <select class="form-select form-select-md" name="drink" id="">
                            <option selected>--Select Drink--</option>
                            <option value="1">Mineral Water</option>
                            <option value="2">Brewed Coffee</option>
                            <option value="3">Soft Drink</option>
                        </select>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="" class="form_label">Quantity</label>
                            <input type="text" class="form-control" name="drink_qty" id="">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Compute</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p class="card-text fw-bold">Full Name: <?php echo $first_name . ' ' . $last_name; ?></p>
                    <p class="card-text fw-bold">Orders </p>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><?php echo $bread; ?></td>
                                <td><?php echo $bread_qty; ?></td>
                                <td>x</td>
                                <td><?php echo $bread_price; ?></td> 
                                <td>=</td>
                                <td><?php echo $bread_amount; ?></td>                              
                            </tr>
                            <tr>
                                <td><?php echo $drink; ?></td>
                                <td><?php echo $drink_qty; ?></td>
                                <td>x</td>
                                <td><?php echo $drink_price; ?></td>
                                <td>=</td>
                                <td><?php echo $drink_amount; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Total</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <th scope="row"><?php echo $total; ?></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include_once "footer.php" ?>