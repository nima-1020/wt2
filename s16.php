//1
HTML('index.html')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Book Details</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="script.js"></script>
</head>
<body>

<h2>Select a Book:</h2>
<select id="bookSelect">
  <option value="">Select a book</option>
  <option value="book1">Book 1</option>
  <option value="book2">Book 2</option>
  <option value="book3">Book 3</option>
</select>

<div id="bookDetails"></div>

</body>
</html>

JavaScript('script.js')
$(document).ready(function(){
    $("#bookSelect").change(function(){
        var selectedBook = $(this).val();
        $.ajax({
            url: 'books.xml',
            dataType: 'xml',
            success: function(data){
                var details = $(data).find(selectedBook);
                var title = details.find('title').text();
                var author = details.find('author').text();
                var year = details.find('year').text();
                var price = details.find('price').text();
                var bookDetails = `<h3>${title}</h3>
                                   <p>Author: ${author}</p>
                                   <p>Year: ${year}</p>
                                   <p>Price: ${price}</p>`;
                $("#bookDetails").html(bookDetails);
            }
        });
    });
});

XML('books.xml')
<books>
  <book1>
    <title>Book 1 Title</title>
    <author>Author 1</author>
    <year>2022</year>
    <price>$20</price>
  </book1>
  <book2>
    <title>Book 2 Title</title>
    <author>Author 2</author>
    <year>2020</year>
    <price>$25</price>
  </book2>
  <book3>
    <title>Book 3 Title</title>
    <author>Author 3</author>
    <year>2018</year>
    <price>$15</price>
  </book3>
</books>

//2
import re
import nltk
from nltk.tokenize import sent_tokenize
from gensim.models import KeyedVectors

# Download the pre-trained Word2Vec model
# You can choose a model based on your language and corpus
# For example, 'glove-wiki-gigaword-100' for English
nltk.download('punkt')

# Preprocessing function to remove special characters and digits
def preprocess_text(text):
    text = re.sub(r'[^a-zA-Z\s]', '', text)
    text = re.sub(r'\d+', '', text)
    return text

# Example text paragraph
text = """
The sun rose slowly over the horizon, casting a warm glow across the peaceful village. Birds chirped happily in the trees,
and the gentle breeze carried the scent of fresh flowers. Children laughed and played in the streets, while elders sat together,
sharing stories of days gone by. It was a serene morning, filled with the promise of a beautiful day ahead."
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
similarity_matrix = []
for i in range(len(sentences)):
    similarity_row = []
    for j in range(len(sentences)):
        similarity = cosine_similarity([sentence_embeddings[i]], [sentence_embeddings[j]])[0][0]
        similarity_row.append(similarity)
    similarity_matrix.append(similarity_row)

# Rank sentences based on similarity scores
sentence_scores = [sum(similarity_row) / len(similarity_row) for similarity_row in similarity_matrix]

# Select top-ranked sentences for summary
num_sentences = 3
top_sentences_indices = sorted(range(len(sentence_scores)), key=lambda i: sentence_scores[i], reverse=True)[:num_sentences]
summary = ' '.join([sentences[i] for i in top_sentences_indices])

print("Original Text:")
print(text)
print("\nSummary:")
print(summary)

