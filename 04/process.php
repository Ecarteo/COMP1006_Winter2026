<?php 
require "includes/header.php"; 
// access the form data and then echo on the screen in a confirmation message 
//use $_POST to grab info using the form, store in a variable, the key is the name attribute value from the form
/*
Wait - no serverside validation! 

$firstName = $_POST['first_name']; 
$lastName = $_POST['last_name'];
$address = $_POST['address']; 
$email = $_POST['email']; 
$items = $_POST['items']; 
*/

/* A better way!  

Sanitize the data - filter_input and validate - filter_var (proper email format, proper phone number format, interger for order quanitity) and logic to ensure users provide required info 
*/

//grab the data, clean and store in a variable - santize! 
$firstName = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS); 
$lastName = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS); 
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_SPECIAL_CHARS);

$items = $_POST['items'] ?? []; 

//validation time - serverside 

$errors = []; 

//require text fields 
if ($firstName === null || $firstName === '') {
    $errors[] = "First Name is Required."; 
}

if ($lastName === null || $lastName === '') {
    $errors[] = "Last Name is Required."; 
}

//require email and validate proper format 
if ($email === null || $email === '') {
    $errors[] = "Email is Required"; 
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email must be a valid email"; 
}

//require address
if ($address === null || $address === '') {
    $errors[] = "Address is required."; 
}
$itemsOrdered = [];
//check that the order quantity is a number 

foreach($items as $item => $quantity) {
    if(filter_var($quantity, FILTER_VALIDATE_INT) !== false && $quantity > 0 ) {
        $itemsOrdered[$item] = $quantity; 
    }
}
if(count($itemsOrdered) === 0) {
    $errors[] = "Please order at least one item"; 
}

//loop through error messages 

//if there are errors, display to user and exit the script 
if(!empty($errors)) {
foreach ($errors as $error) : ?>
    <li><?php echo $error; ?> </li>
<?php endforeach;
//stop the script from executing  
exit; 
}

?>

<?php
// Build the Email Content
$to = "webdev101@university.du"; // Explicit from the assignment's instructions.
$subject = "New Order from " . $firstName . " " . $lastName;

// Assign variables
$message = "You have a new bakery order!\n\n";
$message .= "Customer: " . $firstName . " " . $lastName . "\n";
$message .= "Address: " . $address . "\n";
$message .= "Email: " . $email . "\n\n";
$message .= "Items Purchased:\n";
$message .= "\nSpecial Instructions: " . $comments;

foreach ($itemsOrdered as $item => $quantity) {
    // Add the raw item name and quantity to the string
    $message .= "- " . $item . ": " . $quantity . "\n";
}
?>

<main>
    <?php echo "<h2> Thanks for your order " . $firstName . "</h2>"; ?>

    <h3> Items Ordered </h3>
    
    <ul>
        <?php foreach($itemsOrdered as $item => $quantity): ?>
            <li><?php echo $item; ?>: <?php echo $quantity; ?></li>
        <?php endforeach; ?>
    </ul>
    <div>
        <!--send email using mail function -->
        <!-- <php mail($to, $subject, $message); ?>  This won't work no matter what-->
        <?php echo "Email delivered succesfully!"; ?>
    </div>
</main>


<?php require "includes/footer.php"; ?>