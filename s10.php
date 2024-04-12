//1
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Insert Text Before and After Paragraph</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    // Add text before the paragraph
    $("#insertBeforeBtn").click(function(){
        $("p").before("<b>Before Text: </b>");
    });

    // Add text after the paragraph
    $("#insertAfterBtn").click(function(){
        $("p").after("<b>After Text: </b>");
    });
});
</script>
</head>
<body>

<p>This is a paragraph.</p>

<button id="insertBeforeBtn">Insert Text Before</button>
<button id="insertAfterBtn">Insert Text After</button>

</body>
</html>
//2
import pandas as pd
from mlxtend.frequent_patterns import apriori, association_rules

# Create the dataset
data = {
    'TID': [1, 2, 3, 4, 5],
    'Items': [['eggs', 'milk', 'bread'],
              ['eggs', 'apple'],
              ['milk', 'bread'],
              ['apple', 'milk'],
              ['milk', 'apple', 'bread']]
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
