<?php
    session_start();
    if(!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn'] || !$_SESSION["isAdmin"]){
     header('Location: ../../index.php');
    }
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
    <input type="text" id="filename" class="admin__contentContainer--input" placeholder="Nazwa pliku">
    <input type="text" id="name" class="admin__contentContainer--input" placeholder="Tytuł">

    <div id="editorjs"></div>
    <button id="submitBtn" class="admin__contentContainer--addProduct">Zatwierdź</button>
</body>
<script>
    const editor = new EditorJS({
        holder: 'editorjs',
        autofocus: true,
        tools: {
            header: Header,
            list: List,
            paragraph: Paragraph
        },
    })
    const submitBtn = document.querySelector('#submitBtn')
    submitBtn.addEventListener('click', () => {
        editor.save().then((outputData) => {
            editor.clear()
            console.log(outputData)
            let output = ''
            outputData.blocks.forEach(element => {
                output += '\r\n'
                if(typeof element.data.level != 'undefined'){
                    let i = element.data.level
                    while (i > 0){
                        output += `#`
                        i--
                    }
                    output += ` ${element.data.text}`
                }else if(typeof element.data.style != 'undefined' && typeof element.data.items != 'undefined'){
                    if(element.data.style == 'ordered'){
                        let i = 1
                        element.data.items.forEach(element => {
                            output += `${i}. ${element}`
                            output += '\r\n'
                        })
                    }else if(element.data.style == 'unordered'){
                        element.data.items.forEach(element => {
                            output += `- ${element}`
                            output += '\r\n'
                        })
                    }
                }else {
                    output += `${element.data.text}`
                }
                output += '\r\n'
            });
            const filename = document.querySelector('#filename')
            const name = document.querySelector('#name')
            let formData = new FormData()
            formData.append('filename', filename.value)
            formData.append('name', name.value)
            formData.append('output', output)
            fetch('../../php/admin_panel/add_info_page.php', {
                method: 'post',
                body: formData
            }).then((res) => {
                return res.text()
            }).then((body) => {
                console.log(body)
            })
            console.log(output)
        })
    })
</script>
</html>