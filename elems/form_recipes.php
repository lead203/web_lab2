<?php
    $query = "SELECT * FROM ingridients";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
?>

<form method="POST" class="form">
    <span class="form_title">Добавление рецепта</span>
    <div class="main">
        <table>
            <tr>
                <td>Название</td>
                <td><input type="text" name="name" id="name"/></td>
            </tr>
            <tr>
                <td valign="top">Описание</td>
                <td><textarea name="description" id="description"></textarea></td>
            </tr>
        </table>
    </div>

    <div class="field">
        <table id="table_container">
            <tr>
                <td><label for="input_title_0">Ингредиент</label></td>
                <td><label for="select_title_0">Количество</label></td>
            </tr>

            <tr id="tr_image_0">
                <td id="td_span_0">
                    <select id="select_title_0" name="product[ingridients0]">
                        <?php
                            foreach ($data as $ingridients) {
                                 echo '<option>'.$ingridients['name'].'</option>'; 
                            }
                        ?>
                    </select>
                </td>

                <td id="td_title_0">
                    <input type="text" id="input_title_0" name="productQuantity[ingridients0]">
                </td>

                <td>
                    <span id="progress_0" class="padding5px">
                        <span onclick="$('#tr_image_0').remove();" class="ico_delete">
                            <img src="/img/del_form.png" alt="del" border="0">
                        </span>
                    </span>
                </td>
            </tr>

            <tr id="tr_image_1">
                <td id="td_span_1">
                    <select id="select_title_1" name="product[ingridients1]">
                        <?php
                            foreach ($data as $ingridients) {
                                echo '<option>'.$ingridients['name'].'</option>'; 
                            }
                        ?>
                    </select>
                </td>

                <td id="td_title_1">
                    <input type="text" id="input_title_1" name="productQuantity[ingridients1]">
                </td>

                <td>
                    <span id="progress_1" class="padding5px">
                        <a href="#" onclick="$('#tr_image_1').remove();" class="ico_delete">
                            <img src="/img/del_form.png" alt="del" border="0">
                        </a>
                    </span>
                </td>
            </tr>
        </table>
    </div>

    <div id="button_add">
        <input type="button" value="Добавить" id="add" class="button" onclick="return add_new_image();">
    </div>
    
    <input type="submit" value="Сохранить рецепт" class="submit_button">
</form>