//1
function validateForm() {
    // Get the username and password input values
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    // Regular expression to validate username (alphanumeric with underscores, minimum 3 characters)
    var usernameRegex = /^[a-zA-Z0-9_]{3,}$/;

    // Regular expression to validate password (alphanumeric, minimum 6 characters)
    var passwordRegex = /^[a-zA-Z0-9]{6,}$/;

    // Check if username and password meet the validation criteria
    if (!usernameRegex.test(username)) {
        alert("Username must be alphanumeric with underscores and have at least 3 characters.");
        return false;
    }

    if (!passwordRegex.test(password)) {
        alert("Password must be alphanumeric and have at least 6 characters.");
        return false;
    }

    // Validation passed
    return true;
}
//2
// Sample transactions dataset
var transactions = [
    { username: "john_doe", password: "123456" },
    { username: "alice_smith", password: "abc123" },
    { username: "jane_doe", password: "password" },
    { username: "bob_johnson", password: "qwerty" },
    { username: "mary_brown", password: "password123" }
];

// Function to validate username and password
function validateCredentials(username, password) {
    // Regular expression to validate username (alphanumeric with underscores, minimum 3 characters)
    var usernameRegex = /^[a-zA-Z0-9_]{3,}$/;

    // Regular expression to validate password (alphanumeric, minimum 6 characters)
    var passwordRegex = /^[a-zA-Z0-9]{6,}$/;

    // Check if username and password meet the validation criteria
    if (!usernameRegex.test(username)) {
        return "Username must be alphanumeric with underscores and have at least 3 characters.";
    }

    if (!passwordRegex.test(password)) {
        return "Password must be alphanumeric and have at least 6 characters.";
    }

    // Validation passed
    return "Credentials are valid.";
}

// Test the validation function with sample transactions
transactions.forEach(function(transaction) {
    var result = validateCredentials(transaction.username, transaction.password);
    console.log("Validation result for " + transaction.username + ": " + result);
});
