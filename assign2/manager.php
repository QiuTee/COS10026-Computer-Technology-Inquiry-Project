<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Assignment 2">
    <meta name="keywords" content="HTML5, CSS layout">
    <meta name="author" content="Group 2">
    <meta charset="utf-8">
    <title>CoffeeShop | Enhancements</title>
    <!-- References to external CSS files -->
    <link href="styles/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
    $page = "managerPage";
    include_once "includes/header.inc";
    include_once "includes/menu.inc";

    session_start();
    if (!isset($_SESSION["name"])) {
        header("Location: login.php");
        exit();
    }

    require_once "settings.php";
    ?>
    <article class="manager">
        <h3>HOME / MANAGER</h3>
        <hr>
        <section>
            <h2>Hello, <?php echo $_SESSION[
                "name"
            ]; ?> <a href="logout.php">Logout</a></h2>
            <p>This page is for the manager to view the orders and search for the orders.</p>



            <form method="post" action="manager.php#report-search" id="report-manager">
                <fieldset id="report-search">
                    <legend>Advanced reports</legend>
                    <div class="input-field">
                            <label for="product_sales">Sales reports</label>
                            <input type="submit" name="product_sales" id="product_sales" class='content-button' value="View"><br>

                            <label for="highest_bill">Highest bill</label>
                            <input type="submit" name="highest_bill" id="highest_bill" class='content-button' value="View"><br>

                            <label for="revenue_report">Revenue reports</label>
                            <input type="submit" name="revenue_report" id="revenue_report" class='content-button' value="View"><br>

                            <label for="report_status">Status reports</label>
                            <input type="submit" name="report_status" id="report_status" class='content-button' value="View"><br>
                    </div>
                </fieldset>
            </form>

            <div class="report-content">
<?php
if (isset($_POST["product_sales"])) {
    $reportSql = "SELECT order_products FROM orders";
    $result = mysqli_query($conn, $reportSql);
    if ($result === false) {
        die("Error executing query: " . mysqli_error($conn));
    }
    $product_sales = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $productList = json_decode($row["order_products"], true);
        foreach ($productList as $product => $pdata) {
            if (isset($product_sales[$product])) {
                $product_sales[$product] += $pdata["quantity"];
            } else {
                $product_sales[$product] = $pdata["quantity"];
            }
        }
    }
    arsort($product_sales);
    echo "<p>Total sales: " . array_sum($product_sales) . "</p>";
    echo "<p>Top product sales:</p>";
    echo "<table>";
    echo "<tr>
        <th>Product</th>
        <th>Sales</th>
        </tr>";
    foreach ($product_sales as $product => $sales) {
        echo "<tr>";
        echo "<td>{$product}</td>";
        echo "<td>{$sales}</td>";
        echo "</tr>";
    }
    echo "</table>";
}

if (isset($_POST["highest_bill"])) {
    $reportSql =
        "SELECT order_id, order_cost, first_name, last_name FROM orders ORDER BY order_cost DESC LIMIT 1";
    $result = mysqli_query($conn, $reportSql);
    if ($result === false) {
        die("Error executing query: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);
    // display in table
    echo "<p>Highest bill:</p>";
    echo "<table>";
    echo "<tr>
        <th>Order ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Cost</th>
        </tr>";
    echo "<tr>";
    echo "<td>{$row["order_id"]}</td>";
    echo "<td>{$row["first_name"]}</td>";
    echo "<td>{$row["last_name"]}</td>";
    echo "<td>{$row["order_cost"]}</td>";
    echo "</tr>";
    echo "</table>";

}

if (isset($_POST["revenue_report"])) {
    // Average profit per transaction

    $reportSql = "SELECT * FROM orders";
    $result = mysqli_query($conn, $reportSql);
    if ($result === false) {
        die("Error executing query: " . mysqli_error($conn));
    }
    $total_cost = 0;
    $total_orders = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $total_cost += $row["order_cost"];
        $total_orders++;
    }
    $avg_cost = $total_cost / $total_orders;
    echo "<p>Average profit per transaction: $ {$avg_cost}</p>";

    // Monthly revenue
    $reportSql = "SELECT MONTH(order_date) AS month, YEAR(order_date) AS year, SUM(order_cost) AS revenue FROM orders GROUP BY YEAR(order_date), MONTH(order_date)";
    $result = mysqli_query($conn, $reportSql);
    if ($result === false) {
        die("Error executing query: " . mysqli_error($conn));
    }
    echo "<p>Monthly revenue:</p>";
    echo "<table>";
    echo "<tr><th>Month</th><th>Year</th><th>Revenue</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>{$row["month"]}</td><td>{$row["year"]}</td><td>{$row["revenue"]}</td></tr>";
    }
    echo "</table>";
}

if (isset($_POST["report_status"])) {
    $reportSql =
        "SELECT order_status, COUNT(*) AS count FROM orders GROUP BY order_status";
    $result = mysqli_query($conn, $reportSql);
    if ($result === false) {
        die("Error executing query: " . mysqli_error($conn));
    }
    echo "<p>Order status reports:</p>";
    echo "<table>";
    echo "<tr><th>Status</th><th>Count</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>{$row["order_status"]}</td><td>{$row["count"]}</td></tr>";
    }
    echo "</table>";
}
?>
            </div>

            <form method="post" action="manager.php#normal-search" id="form-manager">
                <fieldset id="normal-search">
                    <legend>Normal Search</legend>
                    <div class="input-field">
                        <p>
                            <label for="first_name">First Name: </label>
                            <input type="text" name="first_name" id="first_name" />

                            <label for="last_name">Last Name: </label>
                            <input type="text" name="last_name" id="last_name" />
                        </p>
                        <p>
                            <label for="order_status">Order Status: </label>
                            <select name="order_status" id="order_status">
                                <option value="">All</option>
                                <option value="Pending">Pending</option>
                                <option value="Fulfilled">Fulfilled</option>
                                <option value="Paid">Paid</option>
                                <option value="Archieved">Archieved</option>
                            </select>
                            <label for="order_products">Products: </label>
                            <select name="order_products" id="order_products">
                                <option value="">All</option>
                                <?php foreach ($products as $product) {
                                    echo "<option value='$product'>$product</option>";
                                } ?>
                            </select>
                        </p>
                        <p>
                            <label for="search_order_id">Order ID: </label>
                            <input type="number" name="search_order_id" id="search_order_id" />
                        </p>

                        <p>Note: Leave all fields blank to search all orders. </p>

                    </div>
                </fieldset>
                <fieldset>
                    <legend>Advanced Search</legend>
                    <div class="input-field">
                        <p>
                            <label>Order Date: </label>
                            <label for="order_date_from">From</label>
                            <input type="date" name="order_date_from" id="order_date_from" />

                            <label for="order_date_to">To</label>
                            <input type="date" name="order_date_to" id="order_date_to" />
                        </p>
                        <p>
                            <label>Total Cost: </label>
                            <label for="total_cost_from">From $</label>
                            <input type="number" name="total_cost_from" id="total_cost_from" />

                            <label for="total_cost_to">To $</label>
                            <input type="number" name="total_cost_to" id="total_cost_to" />
                        </p>
                        <p>
                            <label for="sort_by">Sort by: </label>
                            <select name="sort_by" id="sort_by">
                                <option value="">None</option>
                                <option value="order_date">Order Date</option>
                                <option value="order_id">Order ID</option>
                                <option value="order_status">Order Status</option>
                                <option value="total_cost">Total Cost</option>
                            </select>

                            <label for="sort_type">Sort type: </label>
                            <select name="sort_type" id="sort_type">
                                <option value="DESC">Descending</option>
                                <option value="ASC">Ascending</option>
                            </select>
                        </p>
                    </div>
                </fieldset>
                <div class="submit">
                    <input type="submit" value="Search orders" name="search">
                </div>
            </form>



            <div class="content">
                <?php
                $display_status_select = false;
                if (
                    isset($_POST["query_type"]) &&
                    $_POST["query_type"] == "order_status"
                ) {
                    $display_status_select = true;
                }
                $display_data_name = false;
                if (
                    isset($_POST["query_type"]) &&
                    $_POST["query_type"] == "search_name"
                ) {
                    $display_data_name = true;
                }

                // $sql = "SELECT * FROM `orders`";
                if (isset($_POST["search"])) {
                    $sql = "SELECT * FROM `orders` WHERE 1 ";

                    if (
                        isset($_POST["order_status"]) &&
                        in_array($_POST["order_status"], [
                            "Pending",
                            "Fulfilled",
                            "Paid",
                            "Archieved",
                        ])
                    ) {
                        $status_order = $_POST["order_status"];
                        $sql .= "AND order_status LIKE '$status_order' ";
                    }

                    if (!empty($_POST["search_order_id"])) {
                        $searchOrderId = $_POST["search_order_id"];
                        $sql .= "AND order_id = $searchOrderId ";
                        }

                    if (
                        !empty($_POST["first_name"]) &&
                        !empty($_POST["last_name"])
                    ) {
                        $firstName = $_POST["first_name"];
                        $lastName = $_POST["last_name"];
                        $sql .= "AND first_name LIKE '%$firstName%' AND last_name LIKE '%$lastName' ";
                    }

                    if (!empty($_POST["order_products"])) {
                        $selectedProduct = $_POST["order_products"];
                        $sql .=
                            "AND order_products LIKE '%" .
                            addslashes(json_encode($selectedProduct)) .
                            "%' ";
                    }

                    if (
                        !empty($_POST["first_name"]) &&
                        empty($_POST["last_name"])
                    ) {
                        $firstName = $_POST["first_name"];
                        $sql .= "AND first_name LIKE '%$firstName%' ";
                    }

                    if (
                        empty($_POST["first_name"]) &&
                        !empty($_POST["last_name"])
                    ) {
                        $lastName = $_POST["last_name"];
                        $sql .= "AND last_name LIKE '%$lastName%' ";
                    }

                    if (
                        !empty($_POST["total_cost_from"]) &&
                        !empty($_POST["total_cost_to"])
                    ) {
                        $total_cost_from = $_POST["total_cost_from"];
                        $total_cost_to = $_POST["total_cost_to"];
                        $sql .= "AND order_cost BETWEEN $total_cost_from AND $total_cost_to ";
                    }

                    if (
                        !empty($_POST["order_date_from"]) &&
                        !empty($_POST["order_date_to"])
                    ) {
                        $order_date_from = $_POST["order_date_from"];
                        $order_date_to = $_POST["order_date_to"] . " 23:59:59";
                        $sql .= "AND order_date BETWEEN '$order_date_from' AND '$order_date_to' ";
                    }

                    // Check for sort_by and sort_type inputs
                    if (
                        isset($_POST["sort_by"]) &&
                        !empty($_POST["sort_by"]) &&
                        isset($_POST["sort_type"])
                    ) {
                        $sort_by = $_POST["sort_by"];
                        $sort_type = $_POST["sort_type"];

                        // Use a switch statement to handle different sorting options
                        switch ($sort_by) {
                            case "order_date":
                                $sql .= "ORDER BY order_date $sort_type ";
                                break;
                            case "order_id":
                                $sql .= "ORDER BY order_id $sort_type ";
                                break;
                            case "order_status":
                                if ($sort_type == "ASC") {
                                    $sql .=
                                        "ORDER BY FIELD(order_status, 'Pending', 'Fulfilled', 'Paid', 'Archieved') ";
                                } else {
                                    $sql .=
                                        "ORDER BY FIELD(order_status, 'Archieved', 'Paid', 'Fulfilled', 'Pending') ";
                                }
                                break;
                            case "total_cost":
                                $sql .= "ORDER BY order_cost $sort_type ";
                                break;
                        }
                    }
                }

                if (
                    $_SERVER["REQUEST_METHOD"] == "POST" &&
                    isset($_POST["delete_submit"])
                ) {
                    $order_id = intval($_POST["delete_order"]);

                    if ($order_id > 0) {
                        // Delete the order from the "orders" table
                        $sql = "DELETE FROM `orders` WHERE `order_id` = $order_id";
                        if ($conn->query($sql) === false) {
                            die("Error deleting order: " . $conn->$error);
                        } else {
                            echo "Order deleted successfully!";
                        }
                    } else {
                        echo "Invalid order ID.";
                    }
                }

                //fix
                if (
                    isset($_GET["update_order"]) &&
                    !isset($_POST["delete_submit"])
                ) {
                    $order_id = intval($_GET["update_order"]);

                    if ($order_id > 0) {
                        // Sanitize and retrieve input values
                        $order_status = htmlspecialchars(
                            $_POST["order_status"]
                        );

                        // Update the order in the "orders" table
                        $sql = "UPDATE `orders` SET `order_status` = '$order_status' WHERE `order_id` = $order_id";
                        if ($conn->query($sql) === false) {
                            die("Error updating order: " . $conn->$error);
                        } else {
                            echo "Order updated successfully!";
                        }
                    } else {
                        echo "Invalid order ID.";
                    }
                }

                // Execute the query
                if (!empty($sql)) {
                    $result = mysqli_query($conn, $sql);
                    if ($result === false) {
                        die("Error executing query: " . mysqli_error($conn));
                    }

                    if (
                        $result instanceof mysqli_result &&
                        mysqli_num_rows($result) > 0
                    ) {
                        echo "<table>";
                        echo "<tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Date</th>
                            <th>Purchases</th>
                            <th>Total Cost</th>
                            <th>Status</th>
                            <th>Operation</th>
                            </tr>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            $products = json_decode(
                                $row["order_products"],
                                true
                            );
                            $product_display = "";
                            foreach ($products as $product => $pdata) {
                                $product_display .=
                                    $pdata["quantity"] .
                                    " x " .
                                    $product .
                                    " (" .
                                    (empty($pdata["topping"])
                                        ? "No Topping"
                                        : $pdata["topping"]) .
                                    ", " .
                                    (empty($pdata["size"])
                                        ? "Small"
                                        : $pdata["size"]) .
                                    ", " .
                                    (empty($pdata["ice"])
                                        ? "No Ice"
                                        : (isset($pdata["ice"]) &&
                                        $pdata["ice"] == "No"
                                            ? "No Ice"
                                            : "Iced")) .
                                    ")<br>";
                            }

                            echo "<tr>";
                            echo "<td>{$row["order_id"]}</td>";
                            echo "<td>{$row["first_name"]}</td>";
                            echo "<td>{$row["last_name"]}</td>";
                            echo "<td>{$row["order_date"]}</td>";
                            echo "<td>{$product_display}</td>";
                            echo "<td>$ {$row["order_cost"]}</td>";
                            echo "<td>";
                            echo "<select name='order_status'>";
                            $order_statuses = [
                                "Pending",
                                "Fulfilled",
                                "Paid",
                                "Archieved",
                            ];
                            foreach ($order_statuses as $status) {
                                $selected =
                                    $status == $row["order_status"]
                                        ? "selected"
                                        : "";
                                echo "<option value='{$status}' {$selected}>{$status}</option>";
                            }
                            echo "</select>";
                            echo "</td>";
                            echo "
                                <td>
                                    <form method='POST' action='manager.php?update_order={$row["order_id"]}'>
                                        <input type='submit' class='content-button' value='Update'>
                                        <input type='hidden' name='delete_order' value='{$row["order_id"]}'>
                                        <input type='submit' class='content-button' name='delete_submit' value='Delete'>
                                    </form>
                                </td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                }
                ?>

            </div>



        </section>
    </article>
<?php include_once "includes/footer.inc"; ?>
</body>
</html>
