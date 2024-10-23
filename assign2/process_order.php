<?php
// Include the database connection settings
require_once "settings.php";
include_once("includes/menu.inc");

// Check if the orders table exists and create it if not
if ($conn)
{
    $sql = "CREATE TABLE IF NOT EXISTS `orders` (
        `order_id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `order_date` DATETIME NOT NULL,
        /*CHECK (order_status IN ('PENDING','FULFILLED','PAID','ARCHIVED')) DEFAULT 'PENDING',*/
        `order_status` VARCHAR(20) NOT NULL,
        `order_products` TEXT(999) NOT NULL,
        `order_cost` DECIMAL(8,2) NOT NULL,
        `first_name` VARCHAR(50) NOT NULL,
        `last_name` VARCHAR(50) NOT NULL,
        `email` VARCHAR(100) NOT NULL,
        `phone` VARCHAR(20) NOT NULL,
        `address` VARCHAR(100) NOT NULL,
        `suburb` VARCHAR(50) NOT NULL,
        `state` VARCHAR(50) NOT NULL,
        `postcode` VARCHAR(10) NOT NULL,
        `contact` VARCHAR(20) NOT NULL,
        `features` VARCHAR(50) NOT NULL,
        `comment` VARCHAR(100) NOT NULL
    )";
    if ($conn->query($sql) === false)
    {
        die("Error creating table: " . $conn->$error);
    }
}

// Function to sanitize input data
function sanitize($input)
{
    return htmlspecialchars(stripslashes(trim($input)));
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    // Sanitize the input data
    $firstName = isset($_POST["firstName"]) ? sanitize($_POST["firstName"]) : "";
    $lastName = isset($_POST["lastName"]) ? sanitize($_POST["lastName"]) : "";
    $email = isset($_POST["email"]) ? sanitize($_POST["email"]) : "";
    $phone = isset($_POST["phone"]) ? sanitize($_POST["phone"]) : "";
    $address = isset($_POST["address"]) ? sanitize($_POST["address"]) : "";
    $suburb = isset($_POST["suburb"]) ? sanitize($_POST["suburb"]) : "";
    $state = isset($_POST["state"]) ? sanitize($_POST["state"]) : "";
    $postCode = isset($_POST["postCode"]) ? sanitize($_POST["postCode"]) : "";
    $contact = isset($_POST["contact"]) ? sanitize($_POST["contact"]) : "";
    $products = isset($_POST["products"]) ? $_POST["products"] : [];
    $features = isset($_POST["features"]) ? $_POST["features"] : [];
    $comment = isset($_POST["comment"]) ? sanitize($_POST["comment"]) : "";
    $cardType = isset($_POST["cardType"]) ? sanitize($_POST["cardType"]) : "";
    $cardName = isset($_POST["cardName"]) ? sanitize($_POST["cardName"]) : "";
    $cardNumber = isset($_POST["cardNumber"]) ? sanitize($_POST["cardNumber"]) : "";
    $cardExpires = isset($_POST["cardExpires"]) ? sanitize($_POST["cardExpires"]) : "";
    $cardCVV = isset($_POST["cardCVV"]) ? sanitize($_POST["cardCVV"]) : "";

    $errMsg = ""; //Error message
    if (!preg_match("/^[a-zA-Z]{1,25}$/", $firstName))
    {
        $errMsg .= "<p class='align-center'>First name must contain only alphabetical characters and be between 1-25 characters in length.</p>\n";
    }
    if (!preg_match("/^[a-zA-Z]{1,25}$/", $lastName))
    {
        $errMsg .= "<p class='align-center'>Last name must contain only alphabetical characters and be between 1-25 characters in length.</p>\n";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $errMsg .= "<p class='align-center'>Your email must be in the format of something@something.something</p>\n";
    }
    if (!preg_match("/^\d{8,12}$/", $phone))
    {
        $errMsg .= "<p class='align-center'>Your phone number must contain only numbers and be between 8-12 digits in length.</p>\n";
    }
    if (!preg_match("/^[a-zA-Z0-9\s\,\.\-]{1,40}$/", $address))
    {
        $errMsg .= "<p class='align-center'>Your address must contain only alphabetical characters, numbers, commas, dots, and hyphens, and be between 1-40 characters in length.</p>\n";
    }
    if (!preg_match("/^[a-zA-Z\s]{1,20}$/", $suburb))
    {
        $errMsg .= "<p class='align-center'>Your suburb must contain only alphabetical characters and be between 1-20 characters in length.</p>\n";
    }
    if ($state == "none")
    {
        $errMsg .= "<p class='align-center'>You must select your state.</p>\n";
    }
    if (!preg_match("/^\d{4}$/", $postCode))
    {
        $errMsg .= "<p class='align-center'>Your post code must be a 4-digit number.</p>\n";
    }
    else
    {
        switch ($state)
        {
            case "VIC":
                if ($postCode[0] != "3" && $postCode[0] != "8")
                {
                    //VIC post code must start with 3 or 8
                    $errMsg .= "<p class='align-center'>VIC post code must start with 3 or 8.</p>\n";
                }
            break;
            case "NSW":
                if ($postCode[0] != "1" && $postCode[0] != "2")
                {
                    //NSW post code must start with 1 or 2
                    $errMsg .= "<p class='align-center'>NSW post code must start with 1 or 2.</p>\n";
                }
            break;
            case "QLD":
                if ($postCode[0] != "4" && $postCode[0] != "9")
                {
                    //QLD post code must start with 4 or 9
                    $errMsg .= "<p class='align-center'>QLD post code must start with 4 or 9.</p>\n";
                }
            break;
            case "WA":
                if ($postCode[0] != "6")
                {
                    //NA post code must start with 6
                    $errMsg .= "<p class='align-center'>WA post code must start with 6.</p>\n";
                }
            break;
            case "SA":
                if ($postCode[0] != "5")
                {
                    //SA post code must start with 5
                    $errMsg .= "<p class='align-center'>SA post code must start with 5.</p>\n";
                }
            break;
            case "TAS":
                if ($postCode[0] != "7")
                {
                    //TAS post code must start with 7
                    $errMsg .= "<p class='align-center'>TAS post code must start with 7.</p>\n";
                }
            break;
            case "NT":
            case "ACT":
                if ($postCode[0] != "0")
                {
                    //NT and ACT post code must start with 0
                    $errMsg .= "<p class='align-center'>$state post code must start with 0.</p>\n";
                }
            break;
        }
    }

    // if ($enquire == ""){
    // 	$errMsg .= "<p class='align-center'>You must select your enquiry.</p>\n";
    // }

    // Validate the credit card information
        switch ($cardType) {
        case "visa":
            $pattern = "/^4[0-9]{12}(?:[0-9]{3})?$/";
            break;
        case "mastercard":
            $pattern = "/^5[1-5][0-9]{14}$/";
            break;
        case "amex":
            $pattern = "/^3[47][0-9]{13}$/";
            break;
        default:
            $pattern = "";
            break;
    }
    if (!preg_match($pattern, $cardNumber))
    {
        $errMsg .= "<p class='align-center'>Invalid credit card number.</p>\n";
    }
    if (!preg_match("/^[a-zA-Z\s]{1,50}$/", $cardName))
    {
        $errMsg .= "<p class='align-center'>Invalid cardholder name.</p>\n";
    }
    if (!preg_match("/^\d{2}\/\d{2}$/", $cardExpires))
    {
        $errMsg .= "<p class='align-center'>Invalid expiry date.</p>\n";
    }
    if (!preg_match("/^\d{3}$/", $cardCVV))
    {
        $errMsg .= "<p class='align-center'>Invalid CVV.</p>\n";
    }

    // Check if products are all quantity 0
    $allZero = true;
    foreach ($products as $product => $data) {
        if ($data['quantity'] > 0) {
            $allZero = false;
            break;
        }
    }
    if ($allZero) {
        $errMsg .= "<p class='align-center'>You must select at least one product.</p>\n";
    }

    // Check if there are any errors
    if ($errMsg == "")
    {


        // Calculate the total cost of the order
        $totalCost = 0;
        foreach ($products as $product => $data) {
            $quantity = $data['quantity'];
            $topping = $data['topping'];
            $totalCost += $product_price[$product] * $quantity;
        }

        // filter out products with 0 quantity
        $filteredProducts = array_filter($products, function($product) {
            return $product['quantity'] > 0;
        });

        // convert $filteredProducts to json array
        $orderProducts = json_encode($filteredProducts);
        $features = json_encode($features);

        // Insert the order into the orders table
        $sql = "INSERT INTO `orders`
		(
			`first_name`,
			`last_name`,
			`email`,
			`phone`,
			`address`,
			`suburb`,
			`state`,
			`postcode`,
            `contact`,
            `features`,
            `comment`,
            `order_products`,
			`order_cost`,
			`order_status`,
			`order_date`
		)
			VALUES
		(
			'$firstName',
			'$lastName',
			'$email',
			'$phone',
			'$address',
			'$suburb',
			'$state',
			'$postCode',
            '$contact',
            '$features',
            '$comment',
            '$orderProducts',
			'$totalCost',
			'Pending',
			NOW()
		)";
        if ($conn->query($sql) === false)
        {
            die("Error inserting order: " . $conn->$error);
        }

        //adding additional codes to parse the data into receipt

        session_start();
        $_SESSION["errMsg"] = $errMsg;
        $_SESSION["firstName"] = $firstName;
        $_SESSION["lastName"] = $lastName;
        $_SESSION["email"] = $email;
        $_SESSION["address"] = $address;
        $_SESSION["suburb"] = $suburb;
        $_SESSION["state"] = $state;
        $_SESSION["postCode"] = $postCode;
        $_SESSION["phone"] = $phone;
        $_SESSION["enquire"] = $enquire;
        $_SESSION["contact"] = $contact;
        $_SESSION["features"] = $features;
        $_SESSION["comment"] = $comment;
        $_SESSION["products"] = $products;

        // Card info
        $_SESSION["cardType"] = $cardType;

        // Mark the card for security reasons
        $maskedCardNumber = substr($cardNumber, 0, 4) . " **** **** ****";
        $_SESSION["cardNumber"] = $maskedCardNumber;
        $_SESSION["cardName"] = $cardName;
        $_SESSION["cardExpiry"] = $cardExpires;
        $_SESSION["cardCVV"] = $cardCVV;
        // Redirect the user to a thank-you page
        header("Location: receipt.php");
        exit();
    }
    else
    {
        session_start();
        $_SESSION["errMsg"] = $errMsg;
        $_SESSION["firstName"] = $firstName;
        $_SESSION["lastName"] = $lastName;
        $_SESSION["email"] = $email;
        $_SESSION["address"] = $address;
        $_SESSION["suburb"] = $suburb;
        $_SESSION["state"] = $state;
        $_SESSION["postCode"] = $postCode;
        $_SESSION["phone"] = $phone;
        $_SESSION["enquire"] = $enquire;
        $_SESSION["contact"] = $contact;
        $_SESSION["features"] = $features;
        $_SESSION["comment"] = $comment;
        $_SESSION["products"] = $products;

        // We do not store the credit card details in the session
        // $_SESSION["cardType"] = $cardType;
        // $_SESSION["cardNumber"] = $cardNumber;
        // $_SESSION["cardName"] = $cardName;
        // $_SESSION["cardExpiry"] = $cardExpiry;
        // $_SESSION["cardCVV"] = $cardCVV;


        header("location:fix_order.php");
        exit();
    }
} else {
    header("location:index.php");
    // Close the database connection
    $conn->close();
    exit();
}

?>
