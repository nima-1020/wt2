//1
<?php
// Load the XML file
$xml = new DOMDocument();
$xml->load('Movie.xml');

// Get all movie elements
$movies = $xml->getElementsByTagName('MovieInfo');

echo "<h2>Movie Titles and Actor Names:</h2>";

// Iterate over each movie
foreach ($movies as $movie) {
    // Get the MovieTitle and ActorName elements
    $movieTitle = $movie->getElementsByTagName('MovieTitle')->item(0)->nodeValue;
    $actorName = $movie->getElementsByTagName('ActorName')->item(0)->nodeValue;
    
    // Print MovieTitle and ActorName
    echo "<b>Movie Title:</b> $movieTitle<br>";
    echo "<b>Actor Name:</b> $actorName<br><br>";
}
?>
//2
import pandas as pd
from mlxtend.frequent_patterns import apriori, association_rules

# Read the Market Basket dataset
data = pd.read_csv('Market_Basket.csv')

# Display information about the dataset
print("Dataset Information:")
print(data.info())

# Preprocess the data (drop null values)
data.dropna(axis=0, inplace=True)

# Display the first few rows of the dataset after preprocessing
print("\nFirst few rows of the dataset after preprocessing:")
print(data.head())

# Convert categorical values into numeric format using one-hot encoding
data_encoded = pd.get_dummies(data, drop_first=True)
print("\nDataset after one-hot encoding:")
print(data_encoded.head())

# Apply Apriori algorithm to generate frequent itemsets
frequent_itemsets = apriori(data_encoded, min_support=0.01, use_colnames=True)
print("\nFrequent Itemsets:")
print(frequent_itemsets)

# Generate association rules
rules = association_rules(frequent_itemsets, metric='lift', min_threshold=1)
print("\nAssociation Rules:")
print(rules)
