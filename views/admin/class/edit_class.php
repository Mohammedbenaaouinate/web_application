<?php
$title = "Admin | Editer Classe";
ob_start();
?>

<head>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container .select2-selection--single {
            height: 44px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 44px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 44px;
        }
    </style>
</head>



<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Menu Principal</span>
                </li>
                <li class="submenu">
                    <a href="index.php?action=dashboard"><i class="feather-grid"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="index.php?action=dashboard">Admin Dashboard</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-user"></i> <span> Utilisateurs</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="index.php?action=head_of_school">Directeur</a> </li>
                        <li><a href="index.php?action=admins">Administrateur</a></li>
                        <li><a href="index.php?action=students">Etudiants</a></li>
                        <li><a href="index.php?action=teachers">Professeur</a></li>
                        <li><a href="index.php?action=librarians">Bibliothécaire</a></li>
                        <li><a href="index.php?action=scolarite">Scolarité</a></li>
                    </ul>
                </li>
                <li>
                    <a href="index.php?action=departement"><i class="fas fa-building"></i> <span>Departement</span></a>
                </li>
                <li>
                    <a href="index.php?action=specializations"><i class="fas fa-clipboard"></i> <span> Filiere</span> </a>
                </li>
                <li class="submenu active">
                    <a href="index.php?action=class"><i class="fas fa-users"></i> <span>Classe</span></a>
                </li>

                <li>
                    <a href="index.php?action=module_management"><i class="fas fa-book-reader"></i> <span>Modules & Elements</span></a>
                </li>

                <li class="menu-title">
                    <span>Gestion</span>
                </li>


                <li class="submenu">
                    <a href="#"><i class="fas fa-calendar-day"></i>
                        <span> planning </span> <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <a href="index.php?action=planning"> <span>Création</span></a>
                        <a href="index.php?action=print"><span>Evenements</span></a>
                        <a href="index.php?action=pdf_planning"><span>planning</span></a>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fas fa-door-open"></i>
                        <span>Salle</span> <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <a href="index.php?action=salle"> <span>Gestion des salles</span></a>
                        <a href="index.php?action=available_salle_admin"><span>Salles Disponibles</span></a>
                    </ul>
                </li>

                <li>
                    <a href="index.php?action=schedule_admin_classes"><i class="fa fa-calendar"></i> <span>Gestion des emplois</span></a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-list-alt"></i> <span>Planning exams</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=schedule_admin_classes_exam">Session normale</a></li>
                        <li><a href="index.php?action=schedule_admin_classes_ratt">Session Rattrapage</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fas fa-table"></i> <span>Emploi</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="index.php?action=list_schedule">Liste des Emplois</a></li>
                        <li><a href="index.php?action=schedule_normal_admin">Liste des emplois ds normal</a></li>
                        <li><a href="index.php?action=schedule_ratt_admin">Liste des emplois ds Rattrapage</a></li>

                    </ul>
                </li>
                <li>
                    <a href="index.php?action=cv_list"><i class="fas fa-file"></i><span>Liste des CV</span></a>
                </li>
                <li>
                    <a href="#"> <i class="fas fa-forward"></i><span>Fin d'année</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li>
                            <a href="index.php?action=student_status"><i class="fas fa-file-csv"></i><span>Statut des Étudiants</span></a>
                        </li>
                        <li><a href="index.php?action=second_year_student"><i class="fas fa-file-csv"></i><span>les étudiants CP2</span></a></li>
                        <li><a href="index.php?action=end_year_student"><i class="fas fa-user-graduate"></i><span>Les lauréats</span></a></li>
                        <li><a href="index.php?action=old_year_winner"><i class="fas fa-graduation-cap"></i> <span>Les anciens lauréats</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>




<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Modifier Classe</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php?action=class">Classe</a></li>
                        <li class="breadcrumb-item active">Modifier Classe</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="index.php?action=edit_class" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Modifier une classe</span></h5>
                                </div>
                                <input type="hidden" value="<?php echo $class['class_id'] ?>" name="id">
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Classe <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="classe">
                                            <?php foreach ($all_class as $res) {
                                                if ($res["short_name"] == $class["short_name"]) {
                                            ?>
                                                    <option selected><?php echo $res['short_name'] ?></option>
                                                <?php } else { ?>
                                                    <option><?php echo $res['short_name'] ?></option>
                                                <?php } ?>

                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Annee de la classe<span class="login-danger">*</span></label>
                                        <select class="form-control select" name="annee">
                                            <?php if ($class["class_year"] == "Année 1") { ?>
                                                <option selected>Année 1</option>
                                                <option>Année 2</option>
                                                <option>Année 3</option>

                                            <?php } elseif ($class["class_year"] == "Année 2") { ?>
                                                <option>Année 1</option>
                                                <option selected>Année 2</option>
                                                <option>Année 3</option>
                                            <?php } elseif ($class["class_year"] == "Année 3") { ?>
                                                <option>Année 1</option>
                                                <option>Année 2</option>
                                                <option selected>Année 3</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Responsable de la classe <span class="login-danger">*</span></label>
                                        <select id="example-etud" class="form-control select" name="responsable">
                                            <?php foreach ($student_of_this_classe as $resultat) {
                                                if ($class["student_id"] != null) {

                                                    if ($resultat["student_id"] == $class["student_id"]) { ?>
                                                        <option selected value="<?php echo $resultat["student_id"] ?>"><?php echo $resultat['firstname'] . " " . $resultat['lastname']; ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $resultat["student_id"] ?>"><?php echo $resultat['firstname'] . " " . $resultat['lastname']; ?></option>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <option value="<?php echo $resultat["student_id"] ?>"><?php echo $resultat['firstname'] . " " . $resultat['lastname']; ?></option>
                                                <?php } ?>

                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Modifier</button>
                                <div class="col-12" col-sm-4>
                                    <div class="student-submit">

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example-etud').select2({
            allowClear: true
        });
    });
</script>

<?php $content = ob_get_clean(); ?>
<?php require_once "views/admin/components/layout.php"; ?>