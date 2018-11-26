<?php
    $query = "SELECT * FROM ingridients";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
?>

<form method="POST">
    <div class="main">
        <table>
            <tr>
                <td>Название</td>
                <td><input type="text" name="name" id="name"/></td>
            </tr>
        </table>
    </div>
    <input type="submit" value="Сохранить" class="submit_button">
</form>