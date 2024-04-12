//1
HTML 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Greeting</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="script.js"></script>
</head>
<body>

<h2>Type your name:</h2>
<input type="text" id="nameInput">
<div id="response"></div>

</body>
</html>

JavaScript(script.js)
$(document).ready(function(){
    // Function to send AJAX request on name input change
    $("#nameInput").on('input', function(){
        var name = $(this).val();
        $.ajax({
            url: 'greet.php', // Change this to your server-side script URL
            method: 'POST',
            data: { name: name },
            success: function(data){
                $("#response").text(data);
            }
        });
    });
});

PHP('greet.php')
<?php
// Get the name from the AJAX request
$name = $_POST['name'];

// Check if the name is empty
if (empty($name)) {
    echo "Stranger, please tell me your name!";
} else {
    // Check if the name matches any of the specified names
    $masterNames = array("Rohit", "Virat", "Dhoni", "Ashwin", "Harbhajan");
    if (in_array($name, $masterNames)) {
        echo "Hello, master!";
    } else {
        echo "I don't know you!";
    }
}
?>

//2
import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LinearRegression

# Step 1: Load the Dataset
url = "https://archive.ics.uci.edu/ml/machine-learning-databases/nursery/nursery.data"
column_names = ["parents", "has_nurs", "form", "children", "housing", "finance", "social", "health", "class"]
df = pd.read_csv(url, names=column_names)

# Step 2: Identify Independent and Target Variables
X = df.drop("class", axis=1)  # Independent variables
y = df["class"]  # Target variable

# Step 3: Split the Data
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Print the shapes of training and testing sets
print("Training set - X shape:", X_train.shape, " y shape:", y_train.shape)
print("Testing set - X shape:", X_test.shape, " y shape:", y_test.shape)

# Step 4: Build the Model
model = LinearRegression()
model.fit(X_train, y_train)

# Step 5: Evaluate the Model
train_score = model.score(X_train, y_train)
test_score = model.score(X_test, y_test)
print("Training set score:", train_score)
print("Testing set score:", test_score)

