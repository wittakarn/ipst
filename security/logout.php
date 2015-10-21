<?php 
require_once "../config.php";

session_start();
session_destroy();

?>
<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="<?php echo REFRESH_DELAY.';url='.ROOT; ?>">
        <title>Page Redirection</title>
    </head>
    <body>
		<H3>ท่านสามารถกลับหน้าจอด้วยตัวเองได้ ผ่าน  <a href="<?php echo ROOT; ?>">link</a><H3>
    </body>
</html>