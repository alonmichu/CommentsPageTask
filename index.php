<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Comments</title>

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/es.css" rel="stylesheet" />
    </head>
    <body>
        <!-- comment section-->
        <form method="POST" action="./php/send_comment.php">
            <section id="contact">
                <div class="container px-4">
                    <div class="row gx-4 justify-content-center">
                        <div class="col-lg-8">
                            <p align=center>
                            <img src="Coelho.jpg" width="50%" Display: in-line block; text-align: center;>
                            </p>
                            <br>
                            <br>
                                <div class="col-xs-12">
                                    <h3>Here you can add comments:</h3>

                            <br>
                                <div class="form-group">
                                    <label for="name" class="form-label">Name:</label>
                                    <input class="form-control" name="name" type="text" id="name" placeholder="Input your name..." required >
                                </div>
                            
                            <br>
                                <div class="form-group">
                                <label for="comment" class="form-label">Comment:</label>
                                <textarea class="form-control" name="comment"s cols="30" rows="5" type="text" id="comment" 
                                placeholder="Type here..." required ></textarea>
                                </div>
                            <br>
                            <input class="btn btn-primary" type="submit"  value="Send comment">
                            <br>
                            <br>
                            <br>
                            
        </form>
        <?php
            $connection = mysqli_connect("localhost","root","","my_test");
            $result = mysqli_query($connection, 'SELECT * FROM Comments');
            while($comment = mysqli_fetch_object($result))
            {
        ?>
        <b><?php echo($comment->name);  ?></b> (<?php echo ($comment->date_sent); ?>) commment: 
        <br />
        <?php echo ($comment->comment);?>
        <br />
        <form method="POST" action="php/delete_comment.php">
            <input type="hidden" name="comment_id" value="<?php echo ($comment->id); ?>">
            <input type="submit" class="btn btn-danger" value="Delete comment">
        </form>
        <hr />
        <?php
            }
        ?>
                </div>
            </section>
    </body>
</html>
