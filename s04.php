//1


<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Store employee details in session variables
    $_SESSION['employee_details'] = array(
        'Eno' => $_POST['eno'],
        'Ename' => $_POST['ename'],
        'Address' => $_POST['address']
    );

    // Redirect to the second page
    header("Location: earning_details.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Details</title>
</head>
<body>
    <h2>Employee Details</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Eno: <input type="text" name="eno"><br><br>
        Ename: <input type="text" name="ename"><br><br>
        Address: <input type="text" name="address"><br><br>
        <input type="submit" value="Next">
    </form>
</body>
</html>


<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Store earning details in session variables
    $_SESSION['earning_details'] = array(
        'Basic' => $_POST['basic'],
        'DA' => $_POST['da'],
        'HRA' => $_POST['hra']
    );

    // Redirect to the third page
    header("Location: print_details.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Earning Details</title>
</head>
<body>
    <h2>Earning Details</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Basic: <input type="text" name="basic"><br><br>
        DA: <input type="text" name="da"><br><br>
        HRA: <input type="text" name="hra"><br><br>
        <input type="submit" value="Next">
    </form>
</body>
</html>


<?php
session_start();

// Retrieve employee and earning details from session
$employee_details = $_SESSION['employee_details'];
$earning_details = $_SESSION['earning_details'];

// Calculate total earnings
$total = $earning_details['Basic'] + $earning_details['DA'] + $earning_details['HRA'];

// Print employee information
echo "<h2>Employee Information</h2>";
echo "Eno: " . $employee_details['Eno'] . "<br>";
echo "Ename: " . $employee_details['Ename'] . "<br>";
echo "Address: " . $employee_details['Address'] . "<br>";
echo "Basic: " . $earning_details['Basic'] . "<br>";
echo "DA: " . $earning_details['DA'] . "<br>";
echo "HRA: " . $earning_details['HRA'] . "<br>";
echo "Total: " . $total . "<br>";
?>


//2
import pandas as pd
import numpy as np
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LinearRegression
from sklearn.metrics import mean_squared_error, r2_score
import matplotlib.pyplot as plt

# Load the dataset (replace 'fish_dataset.csv' with your dataset)
data = pd.read_csv('fish_dataset.csv')

# Explore the dataset
print(data.head())

# Assuming the dataset has features like 'Length1', 'Length2', 'Length3', 'Height', 'Width', and 'Weight'
# Identify independent variables (features) and the target variable
X = data[['Length1', 'Length2', 'Length3', 'Height', 'Width']]  # Features
y = data['Weight']  # Target variable

# Split the dataset into training and testing sets
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Build the linear regression model
model = LinearRegression()

# Train the model
model.fit(X_train, y_train)

# Make predictions on the testing set
y_pred = model.predict(X_test)

# Evaluate the model's performance
mse = mean_squared_error(y_test, y_pred)
rmse = np.sqrt(mse)
r2 = r2_score(y_test, y_pred)
print("Mean Squared Error:", mse)
print("Root Mean Squared Error:", rmse)
print("R^2 Score:", r2)

# Plotting actual vs predicted values
plt.scatter(y_test, y_pred)
plt.xlabel("Actual Weight")
plt.ylabel("Predicted Weight")
plt.title("Actual vs Predicted Weight")
plt.show()

