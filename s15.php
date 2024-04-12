//1
HTML
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Suggestions</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="script.js"></script>
</head>
<body>

<h2>Type something:</h2>
<input type="text" id="searchInput">
<div id="suggestions"></div>

</body>
</html>

JavaScript('script.js')
$(document).ready(function(){
    $("#searchInput").on('input', function(){
        var inputText = $(this).val().toLowerCase();
        $.ajax({
            url: 'suggestions.php', // Change this to your server-side script URL
            method: 'POST',
            data: { inputText: inputText },
            success: function(data){
                $("#suggestions").html(data);
            }
        });
    });
});

PHP('suggestion.php')
<?php
// Array of suggestions
$suggestions = array("apple", "banana", "orange", "grape", "watermelon");

// Get input text from AJAX request
$inputText = strtolower($_POST['inputText']);

// Find matching suggestions
$matchingSuggestions = array();
foreach ($suggestions as $suggestion) {
    if (strpos(strtolower($suggestion), $inputText) !== false) {
        $matchingSuggestions[] = $suggestion;
    }
}

// Display matching suggestions
if (count($matchingSuggestions) > 0) {
    echo "<ul>";
    foreach ($matchingSuggestions as $suggestion) {
        echo "<li>" . $suggestion . "</li>";
    }
    echo "</ul>";
} else {
    echo "No suggestions found.";
}
?>
//2
import pandas as pd
from mlxtend.preprocessing import TransactionEncoder
from mlxtend.frequent_patterns import apriori, association_rules

# Define the modified dataset with serial numbers
data = [
    [1, 'Tata', 'Nexon', 2017],
    [2, 'MG', 'Astor', 2021],
    [3, 'Kia', 'Seltos', 2019],  
    [4, 'Hyundai', 'Creta', 2015]
]

# Convert categorical values into numeric format using TransactionEncoder
te = TransactionEncoder()
te_ary = te.fit(data).transform(data)
df = pd.DataFrame(te_ary, columns=te.columns_)

# Apply the Apriori algorithm
min_support_values = [0.1, 0.2]  # Adjust as needed
for min_support in min_support_values:
    frequent_itemsets = apriori(df, min_support=min_support, use_colnames=True)
    print(f"Frequent Itemsets with min_sup = {min_support}:\n{frequent_itemsets}\n")
    
    rules = association_rules(frequent_itemsets, metric='lift', min_threshold=1)
    print(f"Association Rules with min_sup = {min_support}:\n{rules}\n")
