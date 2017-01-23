<?php require_once('templates/header.html');
if (!empty($_FILES)) {
    if ($_FILES['userfile']['error'] !== UPLOAD_ERR_NO_FILE) {
        if ($_FILES['userfile']['error'] == UPLOAD_ERR_OK) {
            $dirName = 'downloads/';
            if (file_exists($dirName)) {
                $uploadFile = $dirName . basename($_FILES['userfile']['name']);
                if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadFile)) {
                    $statisticFile = 'statistics.txt';
                    $statContent = file_get_contents($statisticFile);
                    $statContent = unserialize($statContent);
                    $statContent[] = [
                        'filename' => basename($_FILES['userfile']['name']),
                        'downloadCount' => 0];
                    $statContent = serialize($statContent);
                    file_put_contents($statisticFile, $statContent);


                    echo "File was uploaded.\n";
                } else {
                    echo "File wasn't uploaded.\n";
                }
            } else {
                echo "Folder doesn't exist\n";
            }
        } else {
            echo "File exceeds MAX_FILE_SIZE\n";
        }
    } else {
        echo "File wasn't selected\n";
    }
}


?>
<hr>
Back to <a href="index.php">Home page</a>
<table class="table">

    <?php
    $files = scandir($dirName);
    if (!empty($files)) {
        foreach ($files as $image) {
            if ($image !== '.' && $image !== '..') {
                echo '<tr>';
                echo "<td>{$image}</td>";
                echo "<td><a href='download.php?image=$image' target='_blank'>Download</a> </td>";
                echo '</tr>';
            }

        }

    }
    ?>
    <tr>
        <td></td>

        <td></td>
    </tr>
</table>
<?php require_once('templates/footer.html'); ?>
