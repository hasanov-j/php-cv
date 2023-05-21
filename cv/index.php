<?php
session_start();

$data = file_get_contents("CV.json");
$arrayCV = json_decode($data, true)['data'];

include 'functions.php';


$user = authCheck();

?>


<! DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF8"/>
        <title>Jafar_CV</title>
        <meta name="keyword" content="социальные сети,образование,список публикаций">
        <link rel="stylesheet" href="./design.css"></link>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
    </head>


    <body>

    <div class="container">


        <div class="aboutMe">
            <img src="./avatar.jpg" alt="здесь фотография резюмиста" class="avatar"/>

            <div class="aboutMe-text">
                <h1> <?= $arrayCV['bio']['name'] ?> </h1>
                <p> <?= $arrayCV['bio']['aboutStudy'] ?> </p>
                <p> <?= $arrayCV['bio']['aboutStudent'] ?> </p>

                <div class="social">
                    <h3>Мои социальные сети</h3>

                    <?php foreach ($arrayCV['social'] as $key => $value): ?>
                        | <a href="<?= $value; ?>" target="_blank"><?= $key ?></a>
                    <?php endforeach; ?>

                </div>

            </div>

        </div>


        <div class="card bg-yellow">
            <h2><?php echo "Хобби" ?></h2>

            <ul class="list">
                <?php foreach ($arrayCV['hobby'] as $key => $value): ?>
                    <li> <?= $value; ?> </li>
                <?php endforeach; ?>
            </ul>

        </div>


        <div class="card bg-green">
            <h2>Полученное образование:</h2>

            <table class="table">
                <thead>
                <th>ВУЗ</th>
                <th>Специальность</th>
                <th>Годы обучения</th>
                </thead>
                <tbody>
                <?php foreach ($arrayCV['university'] as $university): ?>
                    <tr>
                        <td><?= $university['name'] ?></td>
                        <td><?= $university['speciality'] ?></td>
                        <td><?= $university['startAt'] . "-" . $university['endAt'] ?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>

        </div>


        <div class="card bg-red">
            <h2>Список опубликованных статей:</h2>
            <ol class="list-publication">
                <?php foreach ($arrayCV['publication'] as $value): ?>
                    <li> <?= $value; ?> </li>
                <?php endforeach ?>
            </ol>

        </div>

        <!--			<div class="contact">-->
        <!--				<h2>Cвязаться со мной:</h2>-->
        <!---->
        <!--				<form action='data.php' method='POST' enctype="multipart/form-data">-->
        <!--						<div class="form-group">-->
        <!--							<label> Введите свое имя: </label>-->
        <!--							<input name="name" type="text" placeholder="Иван"/>-->
        <!--						</div>-->
        <!--						-->
        <!--						-->
        <!--						<div class="form-group">-->
        <!--							<label> Введите свой email: </label>-->
        <!--							<input type="email" name="email" placeholder="ivan.sadguy@gmail.com"/>-->
        <!--						</div>-->
        <!--						-->
        <!--						<div class="form-group">-->
        <!--							<label> Введите сообщение: </label>-->
        <!--							<textarea  name="message" ></textarea>-->
        <!--						</div>-->
        <!---->
        <!--						<div class="file">-->
        <!--							<label> Выбирите и загрузите файл: </label>-->
        <!--							<input name="file" type="file"/>-->
        <!--						</div>-->
        <!--					-->
        <!--					<input class="button" type="submit"/>-->
        <!--				</form>-->
        <!---->
        <!--			-->
        <!--			</div>-->


    </div>
    </body>
    </html>
