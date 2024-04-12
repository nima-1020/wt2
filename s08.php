//1
// Display message using alert box
alert("Exams are near, have you started preparing for?");

// Accept two numbers from user using prompt
var firstNumber = prompt("Enter the first number:");
var secondNumber = prompt("Enter the second number:");

// Convert input strings to numbers
firstNumber = parseFloat(firstNumber);
secondNumber = parseFloat(secondNumber);

// Check if the inputs are valid numbers
if (!isNaN(firstNumber) && !isNaN(secondNumber)) {
    // Calculate the sum of the two numbers
    var sum = firstNumber + secondNumber;
    
    // Display the sum using confirm box
    confirm("The addition of " + firstNumber + " and " + secondNumber + " is: " + sum);
} else {
    // Display an error message if inputs are not valid numbers
    alert("Invalid input. Please enter valid numbers.");
}
//2
import pandas as pd
from mlxtend.frequent_patterns import apriori, association_rules

# Read the groceries dataset
data = pd.read_csv('groceries.csv')

# Display information about the dataset
print("Dataset Information:")
print(data.info())

# Preprocess the data (drop null values)
data.dropna(axis=0, inplace=True)

# Display the first few rows of the dataset after preprocessing
print("\nFirst few rows of the dataset after preprocessing:")
print(data.head())

# Convert categorical values into suitable format
# Each transaction should be represented as a list of items
transactions = []
for index, row in data.iterrows():
    transaction = [item.strip() for item in row if pd.notnull(item)]
    transactions.append(transaction)

# Apply Apriori algorithm to generate frequent itemsets
frequent_itemsets = apriori(transactions, min_support=0.01, use_colnames=True)
print("\nFrequent Itemsets:")
print(frequent_itemsets)

# Generate association rules
rules = association_rules(frequent_itemsets, metric='lift', min_threshold=1)
print("\nAssociation Rules:")
print(rules)
