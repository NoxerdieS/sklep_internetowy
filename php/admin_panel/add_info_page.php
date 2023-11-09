<?php
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
      <script type="module">
        import * as mdParser from "../../js/markdown_parser.js"
        const content = document.querySelector("#content")
        fetch("./privacy.md")
        .then((res)=>{
            return res.text()
        }).then((body)=>{
            content.innerHTML = mdParser.replaceMarkdown(body)
        })
      </script>
    </html>';
    fwrite($file, $content);