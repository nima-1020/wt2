//1
<?php
// Create an array of student details
$students = array(
    array('rollno' => '101', 'name' => 'John Doe', 'address' => '123 Main St', 'college' => 'ABC College', 'course' => 'Engineering'),
    array('rollno' => '102', 'name' => 'Jane Smith', 'address' => '456 Elm St', 'college' => 'XYZ College', 'course' => 'Medicine'),
    array('rollno' => '103', 'name' => 'Alice Johnson', 'address' => '789 Oak St', 'college' => 'PQR College', 'course' => 'Law'),
    array('rollno' => '104', 'name' => 'Bob Williams', 'address' => '321 Pine St', 'college' => 'LMN College', 'course' => 'Business'),
    array('rollno' => '105', 'name' => 'Charlie Brown', 'address' => '654 Birch St', 'college' => 'EFG College', 'course' => 'Computer Science')
);

// Create a SimpleXMLElement object
$xml = new SimpleXMLElement('<students/>');

// Add student details to the XML
foreach ($students as $student) {
    $studentElement = $xml->addChild('student');
    $studentElement->addChild('rollno', $student['rollno']);
    $studentElement->addChild('name', $student['name']);
    $studentElement->addChild('address', $student['address']);
    $studentElement->addChild('college', $student['college']);
    $studentElement->addChild('course', $student['course']);
}

// Save the XML to a file
$xml->asXML('student.xml');

// Accept input for course
$course = isset($_GET['course']) ? $_GET['course'] : '';

// Print students detail of specific course in tabular format
if (!empty($course)) {
    echo "<h2>Students enrolled in $course</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Roll No</th><th>Name</th><th>Address</th><th>College</th></tr>";
    foreach ($students as $student) {
        if ($student['course'] == $course) {
            echo "<tr><td>{$student['rollno']}</td><td>{$student['name']}</td><td>{$student['address']}</td><td>{$student['college']}</td></tr>";
        }
    }
    echo "</table>";
}
?>

//2
import pandas as pd

# Read the dataset
url = "https://storage.googleapis.com/kaggle-data-sets/91268/2105546/bundle/archive.zip?X-Goog-Algorithm=GOOG4-RSA-SHA256&X-Goog-Credential=gcp-kaggle-com%40kaggle-161607.iam.gserviceaccount.com%2F20220314%2Fauto%2Fstorage%2Fgoog4_request&X-Goog-Date=20220314T100523Z&X-Goog-Expires=259199&X-Goog-SignedHeaders=host&X-Goog-Signature=7924c3b2e3889a6a8e615e2dc0a0908a5a5e5b8332018e09e01e10d048b79b69c07d599392496f362f5d7291c37e6ab2e6c7ad2e1c7320b097aa2f4fbda00f31787b8334de706e6546819ad2bbef0e6226b09fb48f9c9db87e41edc9b06ccfb4c5d49f1771a25aeb68f6881b005202d6d36ec3ff71d68a7e44c3451b8da3e0389f1b9c171c71279172fb86f154abfd3f63d6e2b19a9fd4490ff5183c9780e1e417cf90a5e25d7fd4cb916d3da3f8747222b2a13c7f7b01c755d66d35289f8e490f58aa7a7ec8497087176245f40764f3b08506327a1cfb7004ac18177c4d5c547e0ff8e8e270b1d29416ec34502c3db201d0c3cf7517484b17cc3bb12d60b6b25766ea"

df = pd.read_csv(url)

# Data cleaning operations
# Remove duplicate rows
df.drop_duplicates(inplace=True)

# Drop rows with missing values
df.dropna(inplace=True)

# Convert views, likes, dislikes, and comment_count to numeric
df['views'] = pd.to_numeric(df['views'], errors='coerce')
df['likes'] = pd.to_numeric(df['likes'], errors='coerce')
df['dislikes'] = pd.to_numeric(df['dislikes'], errors='coerce')
df['comment_count'] = pd.to_numeric(df['comment_count'], errors='coerce')

# Fill missing values with 0
df.fillna(0, inplace=True)

# Calculate total views, total likes, total dislikes, and total comment count
total_views = df['views'].sum()
total_likes = df['likes'].sum()
total_dislikes = df['dislikes'].sum()
total_comments = df['comment_count'].sum()

print("Total Views:", total_views)
print("Total Likes:", total_likes)
print("Total Dislikes:", total_dislikes)
print("Total Comments:", total_comments)
