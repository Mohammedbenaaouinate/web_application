<?php
$title = "Chef Filière | Rattrapage";
ob_start();
?>


<head>

    <style>
        table {
            width: 100%;
            text-align: center;
        }

        td,
        th,
        thead {
            border: black solid 2px;
        }
        /* .header_table th{
            width: 10px !important;
        } */
        thead,
        tbody th {
            background-color: rgb(158, 234, 232);
        }

        td {
            height: 75px;
        }
        td:hover{
            background-color:rgb(19, 97, 214);
        }

        button {
            width: 100%;
        }

        .emploi,
        .classe {
            text-align: center;
        }

        .classe {
            font-size: 18px;
        }

        .img_header {
            width: 180px;
            height: 90px;
        }

        .header_line {
            background-color: blue;
            height: 5px !important;
            border-radius: 5px;
        }

        .module {
            font-weight: bold;
            color: black;
        }
        .departement{
            font-weight: bold;
            color:black;
            margin-top:30px
        }
    </style>
</head>

<body>


<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Menu principale</span>
                </li>
                <li >
                    <a href="index.php?action=dashboard_filiere"><i class="feather-grid"></i> <span> Dashboard</span></a>
                </li>
                <li >
                    <a href="index.php?action=schedule_chef_filiere"><i class="fa fa-calendar"></i> <span>Gestion des emplois</span></a>
                </li>

                <li class="submenu active">
                    <a href="#"><i class="fa fa-list-alt"></i> <span>Planning exams</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li ><a href="index.php?action=schedule_exam_filiere">Session normale</a></li>
                        <li class="active"><a href="index.php?action=schedule_ratt_filiere">Session Rattrapage</a></li>
                    </ul>
                </li>

                <li >
                    <a href="#"><i class="fa fa-user"></i> <span>Vos emplois</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=user_emploi_filiere">Horraire Travail</a></li>
                        <li ><a href="index.php?action=user_emploi_normal_filiere">Emploi de Session normale</a></li>
                        <li ><a href="index.php?action=user_emploi_ratt_filiere">Emploi des rattrapage</a></li>

                    </ul>
                </li>

                <li>
                    <a href="index.php?action=chef_emploi_filiere"><i class="fas fa-user-graduate"></i> <span>Liste des étudiants</span></a>
                </li>

                <li>
                    <a href="index.php?action=upload_cour_filiere"><i class="fas fa-chalkboard"></i> <span>Cours</span></a>
                </li>
                <li >
                    <a href="index.php?action=available_filiere"><i class="fas fa-door-open"></i> <span>Salle Disponibles</span></a>
                </li>
                <li >
                    <a href="index.php?action=lists_professeur_filiere"><i class="fas fa-user"></i> <span>Liste des professeurs</span></a>
                </li>
                <li >
                    <a href="index.php?action=planning_filiere"><i class="fas fa-calendar"></i> <span>Planning Annuel</span></a>
                </li>

                <li>
                    <a href="index.php?action=logout_users"><i class="fas fa-sign-out-alt"></i> <span>Déconnexion</span></a>
                </li>
                
            </ul>
        </div>
    </div>
</div>




    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Gestion des Emplois</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php?action=schedule_ratt_filiere">Session rattrapage</a></li>
                            <li class="breadcrumb-item active">Emploi des examens</li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php if (isset($_SESSION['message'])) :
                                if ($_SESSION['message_type'] == 'success') { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong><?php echo $_SESSION['message']; ?></strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } elseif ($_SESSION['message_type'] == 'error') { ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong><?php echo $_SESSION['message']; ?></strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php }  ?>
                                <?php unset($_SESSION['message']); ?>
                                <?php unset($_SESSION['message_type']); ?>
                            <?php endif; ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body" id="printArea">


                            <div class="form-group row">

                                <div class="col-md-4">
                                    <img class="img_header" src="views/admin/schedule/UCD.png" alt="">
                                </div>

                                <div class="col-md-6">
                                    <p class="departement">Département:<?= $name_departments["departement_name"];?>(<?= $name_departments["short_name"];?>)</p>
                                </div>

                                <div class="col-md-2">
                                    <img class="img_header" src="views/admin/schedule/lensaj.png" alt="">
                                </div>

                            </div>
                            <hr class="header_line">
                            <div class="form-group row">
                                <h4 class="emploi">CALENDRIER DES DS SESSION RATTRAPAGE </h4>
                                <?php
                                if(!empty($name_class["class_year"])){
                                    $year = $name_class["class_year"];

                                $tab = explode(" ", $year);
                                if ($tab[1] == 1) {
                                ?>
                                    <p class="classe"><?php echo $tab[1]; ?> <sup>ère</sup>Année <?php echo $name_class["fullname"]; ?> (<?php echo $semester ?> /<?php echo date("Y") ?>)</p>
                                <?php } else { ?>
                                    <p class="classe"><?php echo $tab[1]; ?> <sup>ème</sup>Année <?php echo $name_class["fullname"]; ?> (<?php echo $semester ?> /<?php echo date("Y") ?>)</p>
                                <?php } ?>
                                <?php } ?>
                            </div>

                            <table class=" border-0 table-center mb-0 " style="border: 2px solid black;">
                                <thead class="header_table">
                                    <tr>
                                        <th></th>
                                        <th>08h30 - 10h20</th>
                                        <th>10h30 - 12h20</th>
                                        <th>13h30 - 15h20</th>
                                        <th>15h30 - 17h20</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $days = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];
                                    $hours = ["08h30 - 10h20", "10h30 - 12h20", "13h30 - 15h20", "15h30 - 17h20"];
                                    
                                    for ($i = 0; $i < 6; $i++) { ?>
                                        <tr>
                                            <th><?php echo htmlspecialchars($days[$i]); ?></th>
                                            <?php
                                            for ($j = 0; $j < 4; $j++) { 
                                                $data_prof = '';
                                                $data_module = '';
                                                $data_classroom = '';
                                                $data_second_prof ='';
                                                $data_third_prof ='';

                                                foreach ($view_schedule as $view) {
                                                    if ($days[$i] == $view["day"] && $view["time"] == $hours[$j]) {
                                                        $data_prof = htmlspecialchars($view["firstname"]." ".$view["lastname"]);
                                                        $data_module = htmlspecialchars($view["modul_code"]);
                                                        $data_classroom = htmlspecialchars($view["classroom_name"]);
                                                        $data_second_prof = htmlspecialchars($view["first_prof"]);
                                                        $data_third_prof = htmlspecialchars($view["second_prof"]);
                                                    }
                                                }
                                            ?>
                                                <td style="width:250px" 
                                                    data-day="<?php echo htmlspecialchars($days[$i]); ?>" 
                                                    data-hour="<?php echo htmlspecialchars($hours[$j]); ?>" 
                                                    data-semestre="<?php echo htmlspecialchars($semester); ?>" 
                                                    data-classe="<?php echo htmlspecialchars($class_name); ?>"
                                                    data-prof="<?php echo $data_prof; ?>"
                                                    data-module="<?php echo $data_module; ?>"
                                                    data-classroom="<?php echo $data_classroom; ?>">
                                                    <?php if (!empty($data_prof) && empty($data_second_prof) && empty($data_third_prof)) { ?>
                                                        <div class="module"><?php echo $data_module; ?></div>
                                                        <div class="module"><?php echo $data_prof; ?></div>
                                                        <div>[<?php echo $data_classroom; ?>]</div>
                                                    <?php }elseif(!empty($data_prof) && !empty($data_second_prof) && empty($data_third_prof)){ ?>
                                                        <div class="module"><?php echo $data_module; ?></div>
                                                        <div class="module"><?php echo $data_prof."/".$data_second_prof; ?></div>
                                                        <div>[<?php echo $data_classroom; ?>]</div>

                                                    <?php }elseif(!empty($data_prof) && !empty($data_second_prof) && !empty($data_third_prof)){ ?>
                                                        <div class="module"><?php echo $data_module; ?></div>
                                                        <div class="module"><?php echo $data_prof."/".$data_second_prof."/".$data_third_prof; ?></div>
                                                        <div>[<?php echo $data_classroom; ?>]</div>
                                                    <?php } ?>

                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <button onclick="printDiv('printArea')" class="btn btn-primary mt-4 no-print"><i class="fas fa-print" style="margin-right:10px;"></i>Imprimer</button>
                            <a onclick="Delete_ratt('<?= $class_name; ?>','<?= $semester; ?>')" style="width:100%" class="btn btn-danger mt-4 no-print"><i class="fas fa-trash" style="margin-right:10px;"></i>Vider Ce emploi</a>
                        </div>

                    </div>

                </div>
            </div>


    <script>
        function Delete_ratt($name,$semester){

            if(confirm("Etes vous sur de vouloir vider ce emploi pour cette classe ?")){
                window.location.href='index.php?action=delete_schedule_ratt_filiere&classe='+$name+'&semestre='+$semester;
            }
        }
    </script>
        </div>

        <footer>
            <p>COPYRIGHT © 2024 ECOLE NATIONALE DES SCIENCES APPLIQUÉES EL JADIDA</p>
        </footer>

    </div>

    </div>
  
    
<script>
        document.addEventListener('DOMContentLoaded', function() {
        const cells = document.querySelectorAll('td');
        cells.forEach(cell => {
            cell.addEventListener('click', function() {
                const day = this.getAttribute('data-day');
                const hour = this.getAttribute('data-hour');
                const semestre = this.getAttribute('data-semestre');
                const classe = this.getAttribute('data-classe');
                const professeur = (this.getAttribute('data-prof') || '').trim();
                const classroom = (this.getAttribute('data-classroom') || '').trim();
                const modul = (this.getAttribute('data-module') || '').trim();



                if (professeur) {
                    // window.location.href = `index.php?action=show_edit_schedule_ratt&day=${day}&hour=${hour}&semestre=${semestre}&classe=${classe}&prof=${professeur}&room=${classroom}&module=${modul}&id_prof=${id_prof}`;
                    window.location.href = `index.php?action=schedule_table_ratt_filiere&classe=${classe}&semestre=${semestre}`;

                } else {
                    window.location.href = `index.php?action=show_add_schedule_ratt_filiere&day=${day}&hour=${hour}&semestre=${semestre}&classe=${classe}`;
                }
            });
        });
    });
</script>



    <script>
        function printDiv(divId) {
            var printContents = document.getElementById(divId).innerHTML;
            var originalContents = document.body.innerHTML;
            var popupWin = window.open('', '_blank', 'width=2000,height=600'); // Ajustez la taille selon vos besoins pour le format paysage

            popupWin.document.open();
            popupWin.document.write(`
            <html>
            <head>
                <title>Impression Emploi de Temps</title>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

                <style>
                    @page {
                        size: landscape; /* Définit la taille de la page en mode paysage */
                        margin: 0; /* Ajuste les marges de la page à 0 */
                    }
                    body {
                        margin: 1cm; /* Ajoute une marge de 1cm autour du contenu */
                    }
                    table { 
                        width: 100%; 
                        text-align: center; 
                        border-collapse: collapse; 
                    }
                    td, th, thead { 
                        border: black solid 2px; 
                    }
                    thead, tbody th { 
                        background-color: rgb(158, 234, 232); 
                    }
                    td { 
                        height: 75px; 
                    }
                    th{
                        width:35px;
                    }
                    .emploi, .classe { 
                        text-align: center; 
                    }
                    .classe { 
                        font-size: 18px; 
                    }
                    .img_header { 
                        width: 180px; 
                        height: 90px; 
                    }
                    .no-print { 
                        display: none; 
                    }
                    .header_line { 
                        background-color: blue; 
                        height: 5px !important; 
                        border-radius: 5px; 
                    }
                    .module{
                        font-weight: bold;
                        color:black;
                    }
                    .departement{
                        font-weight: bold;
                        color:black;
                        margin-top:30px
                    }
                </style>
            </head>
            <body onload="window.print()">
                ${printContents}
            </body>
            </html>
        `);
            popupWin.document.close();
        }
    </script>



    <?php $content = ob_get_clean(); ?>
    <?php require_once("views/admin/components/layout_filiere.php")?>
