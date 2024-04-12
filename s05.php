//1
<?xml version="1.0" encoding="UTF-8"?>
<Items>
    <Item>
        <ItemName>Apple</ItemName>
        <ItemRate>2.50</ItemRate>
        <ItemQuantity>10</ItemQuantity>
    </Item>
    <Item>
        <ItemName>Banana</ItemName>
        <ItemRate>1.50</ItemRate>
        <ItemQuantity>15</ItemQuantity>
    </Item>
    <Item>
        <ItemName>Orange</ItemName>
        <ItemRate>3.00</ItemRate>
        <ItemQuantity>8</ItemQuantity>
    </Item>
    <Item>
        <ItemName>Pineapple</ItemName>
        <ItemRate>5.00</ItemRate>
        <ItemQuantity>5</ItemQuantity>
    </Item>
    <Item>
        <ItemName>Watermelon</ItemName>
        <ItemRate>4.00</ItemRate>
        <ItemQuantity>12</ItemQuantity>
    </Item>
</Items>
//2
import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LogisticRegression
from sklearn.metrics import accuracy_score
from sklearn.datasets import load_iris

# Load the Iris dataset
iris = load_iris()

# Create a DataFrame
iris_df = pd.DataFrame(data=iris.data, columns=iris.feature_names)
iris_df['species'] = iris.target_names[iris.target]

# Filter data for each species
setosa_data = iris_df[iris_df['species'] == 'setosa']
versicolor_data = iris_df[iris_df['species'] == 'versicolor']
virginica_data = iris_df[iris_df['species'] == 'virginica']

# View basic statistical details
print("Statistical details for Iris-setosa:")
print(setosa_data.describe())

print("\nStatistical details for Iris-versicolor:")
print(versicolor_data.describe())

print("\nStatistical details for Iris-virginica:")
print(virginica_data.describe())

# Combine the data for logistic regression
iris_data = iris_df[['sepal length (cm)', 'sepal width (cm)', 'petal length (cm)', 'petal width (cm)']]
iris_target = iris_df['species']

# Split the data into training and testing sets
X_train, X_test, y_train, y_test = train_test_split(iris_data, iris_target, test_size=0.2, random_state=42)

# Apply logistic regression
model = LogisticRegression()
model.fit(X_train, y_train)

# Predictions
y_pred = model.predict(X_test)

# Calculate accuracy
accuracy = accuracy_score(y_test, y_pred)
print("\nAccuracy of the logistic regression model:", accuracy)
