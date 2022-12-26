<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css?ver=<?php echo time()?>">
    <title>News</title>
</head>
<body>

<div class="header">
    <div class="container">
        <div class="header__content">
            <p><?=$_COOKIE['user']?></p>
            <a href="/lab_2_oleg/exit.php">Exit</a>
        </div>
    </div>
</div>

<div class="container">
    <div id="add__offer_window">
        <form class="add__post__form" action="posts/posts.php" method="post" enctype="multipart/form-data">
            <textarea placeholder="Enter your message" rows="4" cols="50" id="massage" name="message"></textarea>
            <div class="input__wrapper">
                <input name="file" type="file" id="input__file" class="input input__file" multiple>
            </div>
            <div class="add__offer_buttons">
                <button class="offer__news" type="submit">Сделать пост</button>
            </div>
        </form>
    </div>
</div>



<div class="container">

    <?php
    $connect = mysqli_connect('localhost', 'root', 'root', 'login_form');
    $mysql = mysqli_query($connect, "SELECT * FROM `posts` order by id desc");
    $count = 0;

    if($mysql->num_rows > 0) {
        while ($row = $mysql->fetch_assoc()) {
            if($count <= 100) {
                $user = $row;
                $user_id = $user['id'];
                $user_id = (int)$user_id;

                if ($user['image'] > 0) {
                    $image = base64_encode($user['image']);
                    $show_image = '<img src="data:image/*;base64,'.htmlspecialchars($image).'" alt="">';
                } else {
                    $show_image = '';
                }

                $post =  '
                            <div class="news">
    
    <div class="news__content">
        <h3 class="news__user">'.htmlspecialchars($user['user']).'</h3>
        <div class="news__content__main">
        '. $show_image .'
        <p class="news__text">'.htmlspecialchars($user['text']).'</p>
        <div class="feedback">
            <form action="posts/like.php" method="post">
                <input type="hidden" value="'.$user_id.'" name="post_id">
                <button type="submit" class="like" name="like">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" height="30px" width="30px" version="1.1" id="Capa_1" viewBox="0 0 512 512" xml:space="preserve">
                        <g>
	                        <path d="M498.323,297.032c0-7.992-1.901-15.683-5.553-22.635c12.034-9.18,19.23-23.438,19.23-38.914   c0-27.037-21.996-49.032-49.032-49.032H330.206c11.434-29.24,17.665-64.728,17.665-101.419c0-23.266-18.928-42.194-42.194-42.194   s-42.193,18.928-42.193,42.194c0,83.161-58.012,145.389-144.355,154.844c-0.592,0.065-1.159,0.197-1.7,0.38   C111.752,235.129,104.235,232,96,232H32c-17.645,0-32,14.355-32,32v152c0,17.645,14.355,32,32,32h64   c9.763,0,18.513-4.4,24.388-11.315c20.473,2.987,33.744,9.534,46.568,15.882c16.484,8.158,33.53,16.595,63.496,16.595h191.484   c27.037,0,49.032-21.996,49.032-49.032c0-7.991-1.901-15.683-5.553-22.635c12.034-9.18,19.23-23.438,19.23-38.914   c0-7.991-1.901-15.683-5.553-22.635C491.126,326.766,498.323,312.507,498.323,297.032z M465.561,325.727H452c-4.418,0-8,3.582-8,8   s3.582,8,8,8h11.958c3.061,5.1,4.687,10.847,4.687,16.854c0,12.106-6.56,23.096-17.163,28.919h-14.548c-4.418,0-8,3.582-8,8   s3.582,8,8,8h13.481c2.973,5.044,4.553,10.71,4.553,16.629c0,18.214-14.818,33.032-33.032,33.032H230.452   c-26.223,0-40.207-6.921-56.398-14.935c-12.358-6.117-26.235-12.961-46.56-16.594c0.326-1.83,0.506-3.71,0.506-5.632V295   c0-4.418-3.582-8-8-8s-8,3.582-8,8v121c0,8.822-7.178,16-16,16H32c-8.822,0-16-7.178-16-16V264c0-8.822,7.178-16,16-16h64   c8.822,0,16,7.178,16,16c0,4.418,3.582,8,8,8s8-3.582,8-8c0-3.105-0.453-6.105-1.282-8.947   c44.778-6.106,82.817-25.325,110.284-55.813c27.395-30.408,42.481-70.967,42.481-114.208c0-14.443,11.75-26.194,26.193-26.194   c14.443,0,26.194,11.75,26.194,26.194c0,39.305-7.464,76.964-21.018,106.04c-1.867,4.004-0.134,8.764,3.871,10.631   c1.304,0.608,2.687,0.828,4.025,0.719c0.201,0.015,0.401,0.031,0.605,0.031h143.613c18.214,0,33.032,14.818,33.032,33.032   c0,11.798-6.228,22.539-16.359,28.469h-14.975c-4.418,0-8,3.582-8,8s3.582,8,8,8h12.835c3.149,5.155,4.822,10.984,4.822,17.079   C482.323,308.985,475.927,319.848,465.561,325.727z"/>
	                        <path d="M422.384,325.727h-8.525c-4.418,0-8,3.582-8,8s3.582,8,8,8h8.525c4.418,0,8-3.582,8-8S426.802,325.727,422.384,325.727z"/>
	                        <path d="M436.934,263.953h-8.525c-4.418,0-8,3.582-8,8s3.582,8,8,8h8.525c4.418,0,8-3.582,8-8S441.352,263.953,436.934,263.953z"/>
	                        <path d="M407.833,387.5h-8.525c-4.418,0-8,3.582-8,8s3.582,8,8,8h8.525c4.418,0,8-3.582,8-8S412.252,387.5,407.833,387.5z"/>
	                        <path d="M80,264c-8.822,0-16,7.178-16,16s7.178,16,16,16s16-7.178,16-16S88.822,264,80,264z"/>
                        </g>
                    </svg>
                    <p class="counter__like">'.htmlspecialchars($user['likes']).'</p>
                </button>
            </form>
        </div>
        </div>
        
    </div>
</div>
                            '."\n";

                echo $post;
                $count++;
            }
        }
    }
    ?>

</div>


</body>
</html>