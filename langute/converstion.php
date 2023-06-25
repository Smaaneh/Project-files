<!DOCTYPE html>
<html>
<head>
    <title>English Conversation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .chat-container {
            max-width: 500px;
            margin: 0 auto;
        }

        .chat-box {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
        }

        .user-message {
            background-color: #e2f3ff;
        }
    </style>
</head>
<body>
    <div class="container chat-container">
        <div class="chat-box">Hello! How can I assist you today?</div>
        <div class="chat-box user-message">I have a question about English grammar.</div>
        <!-- Add more conversation messages here -->
    </div>

    <audio id="audioPlayer" src=""></audio>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script>
        // Function to play audio when a chat message is clicked
        function playAudio(source) {
            var audioPlayer = document.getElementById('audioPlayer');
            audioPlayer.src = source;
            audioPlayer.play();
        }

        // Add event listener to each chat message
        var chatMessages = document.getElementsByClassName('chat-box');
        for (var i = 0; i < chatMessages.length; i++) {
            chatMessages[i].addEventListener('click', function() {
                var audioSource = this.getAttribute('data-audio');
                if (audioSource) {
                    playAudio(audioSource);
                }
            });
        }
    </script>

    <div class="container chat-container">
        <?php
            // Array of conversation messages (example data)
            $conversation = array(
                array('message' => 'Hello! How can I assist you today?', 'audio' => 'audio/hello.mp3'),
                array('message' => 'I have a question about English grammar.', 'audio' => 'audio/question.mp3')
                // Add more conversation messages here
            );

            // Loop through the conversation array and generate chat boxes
            foreach ($conversation as $message) {
                $messageText = $message['message'];
                $audioSource = $message['audio'];

                $messageClass = 'chat-box';
                if (strpos($messageText, 'user') !== false) {
                    $messageClass .= ' user-message';
                }

                echo '<div class="' . $messageClass . '" data-audio="' . $audioSource . '">' . $messageText . '</div>';
            }
        ?>
    </div>

    <audio id="audioPlayer" src="sound/conv"></audio>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script>
        // JavaScript code remains the same as in the previous example
    </script>

</body>
</html>
