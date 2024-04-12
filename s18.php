//1
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fibonacci Numbers</title>
</head>
<body>

<h2>Print Fibonacci Numbers</h2>

<button onclick="printFibonacci()">Print Fibonacci Numbers</button>

<p id="fibonacciOutput"></p>

<script>
// Function to print Fibonacci numbers
function printFibonacci() {
    var limit = prompt("Enter the limit for Fibonacci numbers:");
    if (limit === null || limit === "") {
        alert("Invalid input. Please enter a valid limit.");
        return;
    }
    limit = parseInt(limit);

    var fibonacci = [];
    fibonacci[0] = 0;
    fibonacci[1] = 1;

    for (var i = 2; i < limit; i++) {
        fibonacci[i] = fibonacci[i - 1] + fibonacci[i - 2];
    }

    var output = "Fibonacci numbers up to " + limit + ": " + fibonacci.join(", ");
    document.getElementById("fibonacciOutput").innerHTML = output;
}
</script>

</body>
</html>

//2
import re
from collections import Counter
import matplotlib.pyplot as plt
from wordcloud import WordCloud
from nltk.corpus import stopwords
from nltk.tokenize import word_tokenize, sent_tokenize

# Sample text paragraph
text = """
Natural language processing (NLP) is a subfield of linguistics, computer science, and artificial intelligence concerned with the interactions between computers and human language, in particular how to program computers to process and analyze large amounts of natural language data. Challenges in natural language processing frequently involve speech recognition, natural language understanding, and natural language generation.

Extractive summarization is a technique in which key sentences are extracted from the original text to create a summary. It involves identifying the most important sentences and presenting them in a coherent manner. This approach is often used in text summarization systems to generate concise summaries from long documents or articles.

One common method for extractive summarization is to use sentence embedding techniques, such as Word2Vec or GloVe, to represent each sentence as a numerical vector. Then, similarity measures like cosine similarity can be used to determine the similarity between sentences. Finally, the sentences with the highest similarity scores are selected to form the summary.
"""

# Preprocess the text
text = re.sub(r'[^\w\s]', '', text)  # Remove punctuation
words = word_tokenize(text.lower())  # Tokenize words
sentences = sent_tokenize(text)  # Tokenize sentences

# Remove stopwords
stop_words = set(stopwords.words('english'))
words = [word for word in words if word not in stop_words]

# Calculate word frequency distribution
word_freq = Counter(words)

# Plot word frequency distribution
plt.figure(figsize=(10, 6))
plt.bar(word_freq.keys(), word_freq.values())
plt.title('Word Frequency Distribution')
plt.xlabel('Words')
plt.ylabel('Frequency')
plt.xticks(rotation=45)
plt.show()

# Plot wordcloud
wordcloud = WordCloud(width=800, height=400, background_color='white').generate(' '.join(words))
plt.figure(figsize=(10, 6))
plt.imshow(wordcloud, interpolation='bilinear')
plt.title('WordCloud')
plt.axis('off')
plt.show()
