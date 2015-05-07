<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Data List</title>
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
        <div align="right">
            <p><?php echo anchor('data/upload', 'Upload an AR item'); ?></p>
        </div>
        <div align="center">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Upload date</th>
                    <th>Upload by</th>
                    <th>View</th>
                </tr>
                <?php foreach ($info as $info_item): ?>
                    <tr align="center">
                        <td><?php echo $info_item['ID'] ?></td>
                        <td><?php echo $info_item['Upload_Date'] ?></td>
                        <td><?php echo (strlen($info_item['Upload_User']) > 0) ? $info_item['Upload_User'] : "System" ?></td>
                        <td><?php echo anchor('data/view/'.$info_item['ID'], 'Detail'); ?></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </body>
</html>
