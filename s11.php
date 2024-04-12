//1
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Name</title>
<script>
// Function to change font color and size if student name is present
function changeFontProperties() {
    var studentName = document.getElementById("studentName").value;
    var nameDisplay = document.getElementById("nameDisplay");

    if (studentName.trim() !== "") {
        nameDisplay.innerHTML = studentName;
        nameDisplay.style.color = "red";
        nameDisplay.style.fontSize = "18px";
    }
}

// Function to display image that changes size based on mouse events
function displayImage() {
    var image = document.getElementById("resizeImage");

    // Change size on mouse hover
    image.onmouseover = function() {
        this.style.width = "150px";
    }

    image.onmouseout = function() {
        this.style.width = "100px";
    }

    // Change size on mouse click
    image.onclick = function() {
        this.style.width = "200px";
    }

    // Change size on mouse up
    image.onmouseup = function() {
        this.style.width = "100px";
    }
}
</script>
</head>
<body onload="displayImage()">
<h2>Enter Student Name:</h2>
<input type="text" id="studentName" onblur="changeFontProperties()">
<div id="nameDisplay"></div>

<h2>Image that changes size:</h2>
<img id="resizeImage" src="https://via.placeholder.com/100" width="100" height="100">

</body>
</html>
//2
import pandas as pd
from mlxtend.frequent_patterns import apriori, association_rules

# Create the dataset
data = {
    'TID': [1, 2, 3, 4, 5],
    'Items': [['butter', 'bread', 'milk'],
              ['butter', 'flour', 'milk', 'sugar'],
              ['butter', 'eggs', 'milk', 'salt'],
              ['eggs'],
              ['butter', 'flour', 'milk', 'salt']]
}

# Convert the dataset into a DataFrame
df = pd.DataFrame(data)

# Convert categorical values into numeric format using one-hot encoding
df_encoded = pd.get_dummies(df['Items'].apply(pd.Series).stack(), prefix='', prefix_sep='').sum(level=0)

# Apply the Apriori algorithm with different min_sup values
min_support_values = [0.2, 0.4]
for min_support in min_support_values:
    frequent_itemsets = apriori(df_encoded, min_support=min_support, use_colnames=True)
    print(f"Frequent Itemsets with min_sup = {min_support}:\n{frequent_itemsets}\n")
    
    rules = association_rules(frequent_itemsets, metric='lift', min_threshold=1)
    print(f"Association Rules with min_sup = {min_support}:\n{rules}\n")
