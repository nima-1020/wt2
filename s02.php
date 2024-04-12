//1
<!DOCTYPE html>
<html>
<head>
    <title>Change Preferences</title>
</head>
<body>
    <h2>Change Preferences</h2>
    <form action="set_preferences.php" method="post">
        Font Style: 
        <select name="font_style">
            <option value="Arial">Arial</option>
            <option value="Times New Roman">Times New Roman</option>
            <option value="Verdana">Verdana</option>
        </select><br><br>

        Font Size: 
        <select name="font_size">
            <option value="small">Small</option>
            <option value="medium">Medium</option>
            <option value="large">Large</option>
        </select><br><br>

        Font Color: 
        <input type="color" name="font_color"><br><br>

        Background Color: 
        <input type="color" name="bg_color"><br><br>

        <input type="submit" value="Save Preferences">
    </form>
</body>
</html>

<?php
// Set cookies with user preferences
setcookie('font_style', $_POST['font_style'], time() + (86400 * 30), "/");
setcookie('font_size', $_POST['font_size'], time() + (86400 * 30), "/");
setcookie('font_color', $_POST['font_color'], time() + (86400 * 30), "/");
setcookie('bg_color', $_POST['bg_color'], time() + (86400 * 30), "/");

// Redirect to the next page to display selected settings
header("Location: display_preferences.php");
?>
//2
import numpy as np
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LinearRegression

# Generate synthetic data for 'Salary' dataset
np.random.seed(0)
num_samples = 1000
salary = np.random.normal(loc=50000, scale=10000, size=num_samples)
experience = np.random.normal(loc=5, scale=2, size=num_samples)
education = np.random.randint(low=0, high=4, size=num_samples)  # Assuming education level: 0-3

# Create a pandas DataFrame
data = pd.DataFrame({'Salary': salary, 'Experience': experience, 'Education': education})

# Identify independent and target variables
X = data[['Experience', 'Education']]  # Independent variables
y = data['Salary']  # Target variable

# Split the dataset into training and testing sets
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Print the shapes of the training and testing sets
print("Training set - Features:", X_train.shape, "Target:", y_train.shape)
print("Testing set - Features:", X_test.shape, "Target:", y_test.shape)

# Build the simple linear regression model
model = LinearRegression()

# Fit the model on the training data
model.fit(X_train, y_train)
