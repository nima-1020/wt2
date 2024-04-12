//1
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Login</title>
<script>
function validateForm() {
    var username = document.forms["loginForm"]["username"].value;
    var password = document.forms["loginForm"]["password"].value;

    // Check if username is empty
    if (username == "") {
        alert("Please enter your username.");
        return false;
    }

    // Check if password is empty
    if (password == "") {
        alert("Please enter your password.");
        return false;
    }

    // Check if password length is at least 8 characters
    if (password.length < 8) {
        alert("Password must be at least 8 characters long.");
        return false;
    }

    // Check if password contains at least one uppercase letter, one lowercase letter, and one digit
    var uppercaseRegex = /[A-Z]/;
    var lowercaseRegex = /[a-z]/;
    var digitRegex = /\d/;
    if (!uppercaseRegex.test(password) || !lowercaseRegex.test(password) || !digitRegex.test(password)) {
        alert("Password must contain at least one uppercase letter, one lowercase letter, and one digit.");
        return false;
    }

    return true; // Form is valid
}
</script>
</head>
<body>

<h2>User Login</h2>

<form name="loginForm" onsubmit="return validateForm()">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username"><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br><br>

    <input type="submit" value="Login">
</form>

</body>
</html>
//2
import pandas as pd
from nltk.sentiment import SentimentIntensityAnalyzer
from wordcloud import WordCloud
import matplotlib.pyplot as plt

# Load the dataset into a pandas DataFrame
df = pd.read_csv('path_to_movie_review.csv')  # Replace 'path_to_movie_review.csv' with the actual path to your downloaded dataset

# Initialize SentimentIntensityAnalyzer
sia = SentimentIntensityAnalyzer()

# Perform sentiment analysis and store the results in a new column
df['sentiment_score'] = df['review'].apply(lambda x: sia.polarity_scores(x)['compound'])

# Create a word cloud for positive reviews
positive_reviews = ' '.join(df[df['sentiment_score'] > 0]['review'])
wordcloud = WordCloud(width=800, height=400, background_color='white').generate(positive_reviews)
plt.figure(figsize=(10, 6))
plt.imshow(wordcloud, interpolation='bilinear')
plt.title('WordCloud for Positive Reviews')
plt.axis('off')
plt.show()

# Create a word cloud for negative reviews
negative_reviews = ' '.join(df[df['sentiment_score'] < 0]['review'])
wordcloud = WordCloud(width=800, height=400, background_color='white').generate(negative_reviews)
plt.figure(figsize=(10, 6))
plt.imshow(wordcloud, interpolation='bilinear')
plt.title('WordCloud for Negative Reviews')
plt.axis('off')
plt.show()
