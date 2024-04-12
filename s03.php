<?php
session_start();

// Define the correct username and password
$correct_username = "admin";
$correct_password = "password";

// Check if the user has submitted the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the entered username and password from the form
    $entered_username = $_POST['username'];
    $entered_password = $_POST['password'];

    // Check if the entered username and password are correct
    if ($entered_username === $correct_username && $entered_password === $correct_password) {
        // Set session variable to indicate successful login
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $entered_username;

        // Redirect to the second form (welcome message)
        header("Location: welcome.php");
        exit();
    } else {
        // Increment login attempts
        if (!isset($_SESSION['login_attempts'])) {
            $_SESSION['login_attempts'] = 1;
        } else {
            $_SESSION['login_attempts']++;
        }
        // Check if exceeded maximum login attempts
        if ($_SESSION['login_attempts'] > 3) {
            // Display error message and exit
            echo "You have exceeded the maximum number of login attempts.";
            exit();
        }
        // Display error message
        echo "Incorrect username or password. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Username: <input type="text" name="username"><br><br>
        Password: <input type="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
//2
import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LogisticRegression
from sklearn.preprocessing import StandardScaler
from sklearn.metrics import accuracy_score, classification_report

# Load or generate the 'User' dataset
# For demonstration, let's assume we have a DataFrame named 'data' containing the dataset

# Assuming data is already loaded or generated
# Check the data types and if any preprocessing is needed

# Split the dataset into features (independent variables) and the target variable
X = data[['Gender', 'Age', 'Estimated Salary']]  # Independent variables
y = data['Purchased']  # Target variable

# Convert categorical variables to dummy variables if needed
X = pd.get_dummies(X, drop_first=True)

# Split the dataset into training and testing sets
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Scale the features for better model performance (optional but recommended)
scaler = StandardScaler()
X_train_scaled = scaler.fit_transform(X_train)
X_test_scaled = scaler.transform(X_test)

# Build the logistic regression model
model = LogisticRegression()

# Train the model
model.fit(X_train_scaled, y_train)

# Predictions on the testing set
y_pred = model.predict(X_test_scaled)

# Evaluate the model's performance
accuracy = accuracy_score(y_test, y_pred)
print("Accuracy:", accuracy)

# Display classification report
print(classification_report(y_test, y_pred))
