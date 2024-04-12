//1
<?php
// Load the XML file into a SimpleXML object
$xml = simplexml_load_file('book.xml');

// Display attributes and elements
echo "<h2>Attributes and Elements:</h2>";

// Display attributes
echo "<h3>Attributes:</h3>";
foreach ($xml->attributes() as $name => $value) {
    echo "$name: $value<br>";
}

// Display elements
echo "<h3>Elements:</h3>";
foreach ($xml->children() as $child) {
    echo "<b>" . $child->getName() . ":</b><br>";
    foreach ($child->children() as $element) {
        echo "&emsp;$element->getName(): $element<br>";
    }
    echo "<br>";
}
?>
//2
import pandas as pd

# Create a sample dataset
data = {'Transaction_ID': [1, 2, 3, 4, 5],
        'Items': [['bread', 'milk', 'eggs'],
                  ['bread', 'milk', 'eggs', 'cheese'],
                  ['bread', 'butter'],
                  ['milk', 'eggs', 'butter'],
                  ['bread', 'milk', 'eggs', 'butter']]}
df = pd.DataFrame(data)
print(df)

# Convert categorical values into numeric format using one-hot encoding
df_encoded = pd.get_dummies(df['Items'].apply(pd.Series).stack(), prefix='', prefix_sep='').sum(level=0)
print(df_encoded)

from mlxtend.frequent_patterns import apriori, association_rules
# Apply Apriori algorithm
min_support_values = [0.1, 0.2, 0.3]  # Different min_sup values
for min_support in min_support_values:
    frequent_itemsets = apriori(df_encoded, min_support=min_support, use_colnames=True)
    print(f"Frequent Itemsets with min_sup = {min_support}:\n{frequent_itemsets}\n")
    # Generate association rules
    rules = association_rules(frequent_itemsets, metric='lift', min_threshold=1)
    print(f"Association Rules with min_sup = {min_support}:\n{rules}\n")
