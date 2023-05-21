<?php

include $_SERVER['DOCUMENT_ROOT'] . '/cv/functions.php';

$data = file_get_contents("CV.json");
$arrayCV = json_decode($data, true)['data'];

if(!empty($_FILES))
{
    if(!move_uploaded_file($_FILES['avatar']['tmp_name'], ROOT . '/cv/avatar.jpg')){
        var_dump('оШИБКА ЗАГРУЗКИ ФАЙЛА');
    }
}

if (!empty($_POST)) {
    file_put_contents("CV.json", json_encode($_POST, JSON_UNESCAPED_UNICODE));
    header("Location: {$_SERVER['REQUEST_URI']}");
}

if(!accessChecker('editCv')){
   header("HTTP/1.1 403 Permission denied");
    header(sprintf("Location: %s",error403));
}



?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="cv.css"></link>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"></link>
    <style type="text/css">
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: white !important;
            background-color: #0d6efd;
            padding: 0.2rem;
        }
    </style>

    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css"
        rel="stylesheet"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
    />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
        rel="stylesheet"
    />
    <title>Edit_data</title>
</head>
<body>
<form method='POST' enctype="multipart/form-data">
    <div class="container">


        <h1>Редактирование анкеты:</h1>
        <h2>Напишите о себе:</h2>

        <div id="photo">
            <label> Загрузите фото: </label>
            <input name="avatar" type="file" />
        </div>

        <div class="form-group bio">
            <label> Введите ФИО: </label>
            <input name="data[bio][name]" type="text" value="<?= $arrayCV['bio']['name']; ?>"/>
        </div>


        <div class="form-group aboutStudy">
            <label> Напишите информацию про себя: </label>
            <input name="data[bio][aboutStudy]" type="text" value="<?= $arrayCV['bio']['aboutStudy']; ?>"/>
        </div>


        <div class="form-group aboutStudent">
            <label> Напишите информацию про увличения: </label>
            <input name="data[bio][aboutStudent]" type="text" value="<?= $arrayCV['bio']['aboutStudent']; ?>"/>
        </div>


        <div class="form-group social">
            <label> социальные сети кандита: </label>
            <?php foreach ($arrayCV['social'] as $key => $value): ?>
                <input name="data[social][<?= $key; ?>]" type="url" value="<?= $value; ?>"/>
            <?php endforeach; ?>
        </div>


        <div class="form-group hobby">
            <label> Хобби кандидата: </label>
            <select multiple data-role="tagsinput" name="data[hobby][]">
                <?php foreach ($arrayCV['hobby'] as $value): ?>
                    <option value="<?= $value; ?>"></option>
                <?php endforeach; ?>
            </select>

        </div>


        <h2> Образование: </h2>
        <!---->
        <!--                    <input name="cv[university][0][speciality]" type="text" value="-->
        <?php //= $arrayCV['education'][0]['speciality'] ?><!--"/>-->
        <!--                    <input name="cv[university][0][name]" type="text" value="-->
        <?php //= $arrayCV['education'][0]['name'] ?><!--"/>-->
        <!--                    <input name="cv[university][0][startAt]" type="text" value="-->
        <?php //= $arrayCV['education'][0]['startAt'] ?><!--"/>-->
        <!--                    <input name="cv[university][0][endAt]" type="text" value="-->
        <?php //= $arrayCV['education'][0]['endAt'] ?><!--"/>-->
        <!---->
        <!--                    <br><hr>-->
        <!---->
        <!--                    <input name="cv[university][1][speciality]" type="text" value="-->
        <?php //= $arrayCV['education'][1]['speciality'] ?><!--"/>-->
        <!--                    <input name="cv[university][1][name]" type="text" value="-->
        <?php //= $arrayCV['education'][1]['name'] ?><!--"/>-->
        <!--                    <input name="cv[university][1][startAt]" type="text" value="-->
        <?php //= $arrayCV['education'][1]['startAt'] ?><!--"/>-->
        <!--                    <input name="cv[university][1][endAt]" type="text" value="-->
        <?php //= $arrayCV['education'][1]['endAt'] ?><!--"/>1-->

        <div id="universities-list">
            <?php foreach ($arrayCV['university'] as $key => &$university): ?>
                <div class="form-group university">
                    <label> Наиминование оконченного учебного заведения: </label>
                    <input name="data[university][<?= $key ?>][name]" type="text"
                           value="<?= $university['name'] ?? null ?>"/>

                    <label> Полученная квалификация после окончания учебного завдения: </label>
                    <input name="data[university][<?= $key ?>][speciality]" type="text"
                           value="<?= $university['speciality'] ?? null ?>"/>

                    <label> Год начала обучения: </label>
                    <input name="data[university][<?= $key ?>][startAt]" type="text"
                           value="<?= $university['startAt'] ?? null ?>"/>

                    <label> Год окончания обучения: </label>
                    <input name="data[university][<?= $key ?>][endAt]" type="text"
                           value="<?= $university['endAt'] ?? null ?>"/>
                    <br/><br/>
                    <button type="button" onclick="deleteUniversity(this)">Удалить университет</button>
                </div>


            <?php endforeach ?>

        </div>

        <center>
            <button type="button" id="addButton">Добавить университет</button>
        </center>

        <h2> Список публикаций: </h2>
        <div id="publications-list">
            <?php foreach ($arrayCV['publication'] as $article): ?>
                <div class="form-group publication">
                    <label> опбуликованная статья кандидата: </label>
                    <input name="data[publication][]" type="text" value="<?= $article; ?>"/>

                    <button type="button" onclick="deleteArticle(this)">Удалить статью</button>
                </div>
            <?php endforeach ?>
        </div>

        <center>
            <button type="button" id="addPublication">Добавить публикацию</button>
        </center>

        <br><br>
        <input type="submit">

    </div>
</form>

<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"
></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script>
    $(function () {
        $('input')
            .on('change', function (event) {
                var $element = $(event.target);
                var $container = $element.closest('.example');

                if (!$element.data('tagsinput')) return;

                var val = $element.val();
                if (val === null) val = 'null';
                var items = $element.tagsinput('items');

                $('code', $('pre.val', $container)).html(
                    $.isArray(val)
                        ? JSON.stringify(val)
                        : '"' + val.replace('"', '\\"') + '"'
                );
                $('code', $('pre.items', $container)).html(
                    JSON.stringify($element.tagsinput('items'))
                );
            })
            .trigger('change');
    });

    // Получаем ссылку на кнопку
    const addButton = document.getElementById('addButton');

    // Устанавливаем обработчик события на клик по кнопке
    addButton.addEventListener('click', addUniversity);

    // Функция для добавления новой группы полей университета
    function addUniversity() {

        // Создаем новый div элемент для группы полей университета
        const universityDiv = document.createElement('div');

        universityDiv.classList.add('form-group', 'university');

        // Создаем HTML-код для группы полей университета
        const universityHTML = `
            <label>Наименование оконченного учебного заведения:</label>
            <input name="data[university][${generateKey()}][name]" type="text" value=""/>

            <label>Полученная квалификация после окончания учебного заведения:</label>
            <input name="data[university][${generateKey()}][speciality]" type="text" value=""/>

            <label>Год начала обучения:</label>
            <input name="data[university][${generateKey()}][startAt]" type="text" value=""/>

            <label>Год окончания обучения:</label>
            <input name="data[university][${generateKey()}][endAt]" type="text" value=""/>
            <br/><br/>
            <button type="button" onclick="deleteUniversity(this)">Удалить</button>
        `;

        // Устанавливаем HTML-код внутри div элемента
        universityDiv.innerHTML = universityHTML;

        // Получаем ссылку на элемент с id "universities-list" и добавляем в него новую группу полей университета
        const universitiesList = document.getElementById('universities-list');
        universitiesList.appendChild(universityDiv);
    }


    // Получаем ссылку на кнопку
    const addPublication = document.getElementById('addPublication');

    addPublication.addEventListener('click', addArticle);

    function addArticle() {
        const articleDiv = document.createElement('div');
        articleDiv.classList.add('form-group', 'publication');
        const articleHTML = `
            <label> опбуликованная статья кандидата: </label>
            <input name="data[publication][${generateKey()}]" type="text" value=""/>

            <button type="button" onclick="deleteArticle(this)">Удалить статью</button>
        `;

        articleDiv.innerHTML = articleHTML;
        const publicationsList = document.getElementById('publications-list');
        publicationsList.appendChild(articleDiv);
    }


    // Функция для генерации уникального ключа
    function generateKey() {
        return Date.now().toString();
    }

    function deleteUniversity(element) {
        element.parentNode.remove();
    }

    function deleteArticle(element) {
        element.parentNode.remove();
    }

</script>
</body>
</html>