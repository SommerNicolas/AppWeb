<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 01.06.2016
 * Time: 08:53
 */
?>

<!DOCTYPE html>
<html>
<head><meta charset="utf-8"/>
    <style>

        /* http://www.w3schools.com/css/css_navbar.asp */
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        /* Change the link color to #111 (black) on hover */
        li a:hover {
            background-color: #111;
        }

    </style>
</head>

<body>
<?php
    //Si l'utilisateur n'est pas défini, ne fais rien, pas de sidebar
    if(isset($_SESSION['user'])) {
        require_once($_SERVER['DOCUMENT_ROOT'] . '/config_sandboxlearn.php');
        require_once $_SERVER['DOCUMENT_ROOT'] . $path . "admin/config-db.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . $path . "admin/open-db.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . $path . "compte/function_compte.php";

        $colonnes = array("ID", "Nom");
        $base_url = $_SERVER['PHP_SELF'];
        

        if (isset($_GET['del']) && is_scalar($_GET['del']) && is_numeric($_GET['del'])) {
            remove_list($_GET['del']);
            redirect($base_url);
        } elseif (isset($_GET['start']) && is_scalar($_GET['start']) && is_numeric($_GET['start'])) {
            start_list($path, $_GET['start']);
        } elseif (isset($_GET['tri']) && is_scalar($_GET['tri']) && in_array($_GET['tri'], $colonnes)) {
            $tri = $_GET['tri'];
        } else {
            $tri = "ID";
        }
    }
    ?>
<table>
    <tr>
        <?php
        //Ceci est sale, cependant le temps manque pour rendre propre ce test, veuillez nous pardonner
        if(isset($_SESSION['user'])) {
            foreach ($colonnes as $c) {
                echo "<th>";
                echo action_links($base_url, "tri", $c, $c);
                echo "</th>";
            }
            echo " <th>Commencer</th>";
        }
        ?>

    </tr>
    <?php
    //Ceci est sale, cependant le temps manque pour rendre propre ce test
    if(isset($_SESSION['user'])) {
        if ($question_list = get_question($tri, $pdo)) {
            while ($row = $question_list->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>"
                    . balisage(array_map("htmlentities", $row))
                    . "<td>" . action_links($base_url, "start", $row['ID_list'], "Start") . "</td>"
                    . "</tr>";
            }
        }
    }
    ?>
</table>
</body>
</html>



