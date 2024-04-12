//1
<?xml version="1.0" encoding="UTF-8"?>
<students>
    <student>
        <id>1</id>
        <name>John Doe</name>
        <age>20</age>
        <grade>A</grade>
    </student>
    <student>
        <id>2</id>
        <name>Jane Smith</name>
        <age>21</age>
        <grade>B</grade>
    </student>
    <student>
        <id>3</id>
        <name>Michael Johnson</name>
        <age>22</age>
        <grade>C</grade>
    </student>
    <student>
        <id>4</id>
        <name>Sarah Williams</name>
        <age>19</age>
        <grade>A</grade>
    </student>
    <student>
        <id>5</id>
        <name>David Brown</name>
        <age>20</age>
        <grade>B</grade>
    </student>
</students>
//2
import nltk
from nltk.corpus import stopwords
from nltk.tokenize import word_tokenize

# Sample text paragraph
text = """Hello all, Welcome to Python Programming Academy. Python Programming Academy is a nice platform to learn new programming skills. It is difficult to get enrolled in this Academy."""

# Tokenize the text into words
words = word_tokenize(text)

# Get the list of English stopwords
stop_words = set(stopwords.words('english'))

# Remove stopwords from the text
filtered_words = [word for word in words if word.lower() not in stop_words]

# Join the filtered words back into a sentence
filtered_text = ' '.join(filtered_words)

print(filtered_text)
