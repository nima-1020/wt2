//1
html
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Details</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="script.js"></script>
</head>
<body>

<h2>Contact Details</h2>

<button id="printButton">Print Contacts</button>

<div id="contactTable"></div>

</body>
</html>

JavaScript('script.js')

$(document).ready(function(){
    $("#printButton").click(function(){
        $.ajax({
            url: 'contact.dat',
            dataType: 'text',
            success: function(data){
                var lines = data.split('\n');
                var table = '<table border="1">';
                table += '<tr><th>Sr. No.</th><th>Name</th><th>Residence Number</th><th>Mobile Number</th><th>Address</th></tr>';
                for(var line of lines){
                    var fields = line.split(',');
                    table += '<tr>';
                    for(var field of fields){
                        table += '<td>' + field + '</td>';
                    }
                    table += '</tr>';
                }
                table += '</table>';
                $("#contactTable").html(table);
            }
        });
    });
});

//2
import numpy as np
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LinearRegression

# Step 1: Create synthetic dataset
np.random.seed(0)  # for reproducibility
heights = np.random.normal(loc=160, scale=10, size=100)  # generate 100 random heights
weights = 0.6 * heights + np.random.normal(loc=0, scale=10, size=100)  # generate weights based on heights

# Step 2: Identify independent and target variables
X = heights.reshape(-1, 1)  # independent variable: heights (reshaped to a column vector)
y = weights  # target variable: weights

# Step 3: Split data into training and testing sets
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Print the shapes of training and testing sets
print("Training set - X shape:", X_train.shape, " y shape:", y_train.shape)
print("Testing set - X shape:", X_test.shape, " y shape:", y_test.shape)

# Step 4: Build linear regression model
model = LinearRegression()
model.fit(X_train, y_train)

# Step 5: Evaluate model
train_score = model.score(X_train, y_train)
test_score = model.score(X_test, y_test)
print("Training set score:", train_score)
print("Testing set score:", test_score)
