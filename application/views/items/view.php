<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Item Detail</title>
        <style>
            table {
                width:80%;
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 5px;
                text-align: left;
            }
            table tr:nth-child(even) {
                background-color: #eee;
            }
            table tr:nth-child(odd) {
                background-color:#fff;
            }
            table th	{
                background-color: black;
                color: white;
            }
        </style>
    </head>
    <body>
        <div align="center">
            <table>
                <tr>
                    <th>ID</th>
                    <td><?php echo $info_item['ID'] ?></td>
                    <th>AR Code</th>
                </tr>
                <tr>
                    <th>Upload date</th>
                    <td><?php echo $info_item['Upload_Date'] ?></td>
                    <td width="256" rowspan="2">
                        <div align="right"><img src="data:image/png;base64,<?php echo $info_item['QR_Image'] ?>" width="256"></div>
                        <div align="center"><a download="<?php echo $info_item['Upload_User'] . '_' . $info_item['Upload_Date'] . '_' . $info_item['ID'] . '_code' . ".png" ?>" href="data:image/png;base64,<?php echo $info_item['QR_Image'] ?>"/>Click to download</a></div>
                    </td>
                </tr>
                <tr>
                    <th>Upload by</th>
                    <td><?php echo (strlen($info_item['Upload_User']) > 0) ? $info_item['Upload_User'] : "System" ?></td>

                </tr>

                <tr>
                    <th>Note</th>
                    <td colspan="2"><?php echo $info_item['Note'] ?></td>
                </tr>
            </table>
        </div>
        <p></p>
        <div align="center">
            <table>
                <tr>
                    <th style="background: red" colspan="3"><div align="center">Danger Zone</div></th>
                </tr>
                <tr>
                    <th>Remove this?</th>
                    <?php echo form_open_multipart('upload_controller/do_remove/' . $info_item['ID']); ?>
                    <td>Check to confirm <?php echo "<input id='mustcheck' type='checkbox' name='check'/>"; ?></td>
                    <td><div align="center"><?php echo "<input id='btn_remove' type='submit' name='submit' value='Remove' />"; ?></div></td>
                    <?php echo "</form>" ?>
                </tr>
            </table>
        </div>
        <div align="center">
            <p><a href="./">Back</a></p>
        </div>

        <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#btn_remove').attr('disabled', 'true');
            });

            $('#btn_remove').click(function () {
                var r = confirm('Are you sure you want to remove this item?');
                if (r == true) {
                    return true;
                } else {
                    return false;
                }
            });

            $('#mustcheck').change(function () {
                $('#btn_remove').attr('disabled', $('#mustcheck:checked').length == 0);
            });
        </script>
    </body>
</html>
