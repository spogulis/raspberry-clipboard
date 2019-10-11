<?php
    $PAGE_TITLE = 'Send a message';
    $LATEST_MESSAGE = $data['latestMessage'];
?>

<!DOCTYPE html>
<html lang='lv'>
    <head>
        <?php require_once('templates/head-tag-contents.php'); ?>
    </head>
    
    <body>
        <header>
            <?php $header = require_once('templates/header.php'); ?>
        </header>
        
        <main>
            <div class='d-flex column-wrapper'>
                <form method='post' action='SendMessage/submit' class='col'>
                    <div>
                        <label for='messageInput'>Msg:</label>
                        <textArea type='text' class='form-control input-lg' name='messageInput'></textarea>
                    </div>
    
                    <!-- Submit btn -->
                    <div class='row my-3'>
                        <button id='submit-btn' class='btn btn-outline-info btn-default mx-auto' type='submit'>Send</button>
                    </div>
                </form>
    
                <div class='col'>
                    <?php echo $LATEST_MESSAGE ? '<label for="latestMessage">Latest message:</label>' : '';?>
                    <button type='button' id='copyBtn' class='btn btn-secondary ml-3' onclick='copyMessage(); return false'>Copy</button>
                    <br>
                    <p id='latestMessage' name='latestMessage'><?php echo $LATEST_MESSAGE; ?></p>
                </div>

            </div>
        </main>

        <?php require_once('templates/footer.php'); ?>
    </body>
</html>