<?php
    $text = $_POST['text'];
    $filename = $_POST['filename'];
    $name = $_POST['name'];

    file_put_contents('../info_pages/'.$filename, $text);
    $file = fopen("../../html/info_pages/".$_POST['filename'].".md", "w");
    fwrite($file, $_POST['output']);
    fclose($file);
    $file = fopen("../../html/info_pages/".$_POST['filename'].".php", "w");
    $content = '<!DOCTYPE html>
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
        <link rel="stylesheet" href="../../css/main.css" />
        <title>Panel administratora</title>
      </head>
      <body>
        <div id="content"></div>
      </body>
      <script>
      fetch("../info_pages/'.$_POST['filename'].'")
      .then((res) => {
        return res.json()
      }).then((body) =>{
        const editor = new EditorJS({
            holder: \'editorjs\',
            autofocus: true,
            tools: {
                header: Header,
                list: List,
                paragraph: Paragraph
            },
            data: body
        })
      })
  </script>
    </html>';
    fwrite($file, $content);
    fclose($file);
    require_once('../dblogin.php');
    $sql = 'insert into info_pages(name, path) values(?, ?)';
    $path = '../info_pages/'.$_POST['filename'];
    $stmt = $pdo ->prepare($sql);
    $stmt -> execute([$_POST['name'], $path]);