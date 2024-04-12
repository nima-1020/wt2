//1
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Registration</title>
<script>
// Function to display "Hello, Good Morning" message on page load
function displayMessage() {
    alert("Hello, Good Morning!");
}

// Function to validate the student registration form
function validateForm() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var dob = document.getElementById("dob").value;
    
    if (name === "" || email === "" || dob === "") {
        alert("Please fill in all fields.");
        return false;
    }
    return true;
}
</script>
</head>
<body onload="displayMessage()">

<h2>Student Registration Form</h2>
<form onsubmit="return validateForm()">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name"><br><br>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email"><br><br>
    
    <label for="dob">Date of Birth:</label>
    <input type="date" id="dob" name="dob"><br><br>
    
    <input type="submit" value="Register">
</form>

</body>
</html>

//2
import re
import nltk
from nltk.tokenize import sent_tokenize
from gensim.models import KeyedVectors
from sklearn.metrics.pairwise import cosine_similarity

# Download the pre-trained Word2Vec model
nltk.download('punkt')

# Preprocessing function to remove special characters and digits
def preprocess_text(text):
    text = re.sub(r'[^a-zA-Z\s]', '', text)
    text = re.sub(r'\d+', '', text)
    return text

# Text paragraph
text = """
So, keep working. Keep striving. Never give up. Fall down seven times, get up eight. 
Ease is a greater threat to progress than hardship. Ease is a greater threat to progress 
than hardship. So, keep moving, keep growing, keep learning. See you at work.
"""

# Preprocess the text
preprocessed_text = preprocess_text(text)

# Tokenize the preprocessed text into sentences
sentences = sent_tokenize(preprocessed_text)

# Load pre-trained Word2Vec model
# Replace 'path/to/word2vec_model' with the path to your pre-trained Word2Vec model file
word2vec_model = KeyedVectors.load_word2vec_format('path/to/word2vec_model', binary=True)

# Calculate sentence embeddings
sentence_embeddings = []
for sentence in sentences:
    words = sentence.split()
    embedding = [word2vec_model[word] for word in words if word in word2vec_model.vocab]
    sentence_embedding = sum(embedding) / len(embedding) if embedding else [0] * len(embedding[0])
    sentence_embeddings.append(sentence_embedding)

# Calculate similarity matrix
similarity_matrix = cosine_similarity(sentence_embeddings, sentence_embeddings)

# Rank sentences based on similarity scores
sentence_scores = [sum(similarity_row) / len(similarity_row) for similarity_row in similarity_matrix]

# Select top-ranked sentences for summary
num_sentences = 2  # Adjust as needed
top_sentences_indices = sorted(range(len(sentence_scores)), key=lambda i: sentence_scores[i], reverse=True)[:num_sentences]
summary = ' '.join([sentences[i] for i in top_sentences_indices])

print("Original Text:")
print(text)
print("\nSummary:")
print(summary)

