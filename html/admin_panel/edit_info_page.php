<?php
    session_start();
    if(!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn'] || !$_SESSION["isAdmin"]){
     header('Location: ../../index.php');
    }
    require_once('../../php/dblogin.php');
    $sql = 'select id, name, filename, path from info_pages where filename like ?';
    $query = $pdo ->prepare($sql);
    $query ->execute([$_GET['item']]);
    $query = $query -> fetch();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../../img/logo_transparent.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/bec5797acb.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/list"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/paragraph"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/underline@latest"></script>


    <link rel="stylesheet" href="../../css/main.css" />
    <title>Panel administratora</title>
</head>
<body>
    <a href="./info_editor.php" class="admin__contentContainer--closeBtn"><i class="fa-solid fa-x"></i></a>
    <input type="text" id="filename" class="admin__contentContainer--input" placeholder="Nazwa pliku" value="<?=$query['filename']?>" disabled>
    <input type="text" id="name" class="admin__contentContainer--input" placeholder="Tytuł" value="<?=$query['name']?>" disabled>

    <div id="editorjs"></div>
    <button id="submitBtn" class="admin__contentContainer--addProduct">Zatwierdź</button>
</body>
<script>
    let editor
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    fetch(`../info_pages/${urlParams.get('item')}`)
    .then((res) => {
        return res.json()
    }).then((body) =>{
        editor = new EditorJS({
            holder: 'editorjs',
            autofocus: true,
            tools: {
                header: Header,
                list: List,
                paragraph: Paragraph
            },
            data: body
        })
    })
    const submitBtn = document.querySelector('#submitBtn')
    submitBtn.addEventListener('click', () => {
        editor.save().then((outputData) => {
            editor.clear()
            console.log(outputData)
            const filename = document.querySelector('#filename')
            const name = document.querySelector('#name')

            const formData = new FormData();
            formData.append("filename", filename.value);
            formData.append("name", name.value);
            formData.append("text", JSON.stringify(outputData));
            fetch('../../php/admin_panel/edit_info_page.php', {
                method: 'POST',
                body: formData
            })
        })
    })
</script>