//1
<?php
session_start();

// Check if the session variable 'page_views' is set
if(isset($_SESSION['page_views'])){
    $_SESSION['page_views']++;
} else {
    // If not set, initialize it to 1
    $_SESSION['page_views'] = 1;
}

// Display the number of page views
echo "You have visited this page ".$_SESSION['page_views']." time(s)";

?>
//2
import pandas as pd
import numpy as np
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LinearRegression

# Load the dataset
data = pd.read_csv('Position_Salaries.csv')

# Assuming the dataset has columns 'Position' and 'Salary'
# Independent variable (features)
X = data[['Position']]  # Assuming 'Position' is the independent variable

# Target variable
y = data['Salary']

# Split the dataset into training and testing sets with a 7:3 ratio
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.3, random_state=42)

# Print the shapes of the training and testing sets
print("Training set - Features:", X_train.shape, "Target:", y_train.shape)
print("Testing set - Features:", X_test.shape, "Target:", y_test.shape)

# Build the simple linear regression model
model = LinearRegression()

# Fit the model on the training data
model.fit(X_train, y_train)

