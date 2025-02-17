<?php
$title = "Module | Ajouter Module";
ob_start();
?>


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
            <li><a href="index.php?action=head_of_school">Directeur</a></li>
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
        <li>
          <a href="index.php?action=class"><i class="fas fa-users"></i> <span>Classe</span></a>
        </li>

        <li class="submenu active">
          <a href="#"><i class="fas fa-book-reader"></i> <span> Modules & Elements</span> <span class="menu-arrow"></span></a>
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
          <h3 class="page-title">Ajouter Un Module</h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php?action=module_management">Module</a>
            </li>
            <li class="breadcrumb-item active">Ajouter un Module</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <form action="index.php?action=add-subject-action" method="post">
              <div class="row">
                <div class="col-12">
                  <h5 class="form-title">
                    <span>Informations sur le Module</span>
                  </h5>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="form-group local-forms">
                    <label>Code du module <span class="login-danger">*</span></label>
                    <input type="text" class="form-control" name="modul_code" required />
                  </div>
                </div>

                <div class="col-12 col-sm-4">
                  <div class="form-group local-forms">
                    <label>Nom du module <span class="login-danger">*</span></label>
                    <input type="text" class="form-control" name="modul_name" required />
                  </div>
                </div>

                <div class="col-12 col-sm-4">
                  <div class="form-group local-forms">
                    <label>Responsable <span class="login-danger">*</span></label>
                    <select class="search-by-name form-control select" name="prof_id" required>
                      <option value="">Sélectionnez Professeur</option>
                      <?php foreach ($professeurs as $professeur) { ?>
                        <option value="<?= $professeur['prof_id']; ?>"><?= $professeur['firstname'] . " " . $professeur['lastname']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="col-12 col-sm-4">
                  <div class="form-group local-forms">
                    <label>Intervenant <span class="login-danger">*</span></label>
                    <input type="text" class="form-control" name="intervenant" required />
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="form-group local-forms">
                    <label>Email Intervenant: <span class="login-danger">*</span></label>
                    <input type="email" class="form-control" name="intervenant_email" required />
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="form-group local-forms">
                    <label>Sélectionnez Filière: <span class="login-danger">*</span></label>
                    <select class="form-control select" name="field_id" id="select_sepecialization" required="required">
                      <option value="">Sélectionnez Filière</option>
                      <?php foreach ($specializations as $specialization) { ?>
                        <option value="<?= $specialization['specialization_id']; ?>"><?= $specialization['short_name']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="form-group local-forms">
                    <label>Classe: <span class="login-danger">*</span></label>
                    <select class="form-control select" name="class_id" id="select_class" required>
                      <option value="">Sélectionnez la filière</option>
                    </select>
                  </div>
                </div>

                <div class="col-12 col-sm-4">
                  <div class="form-group local-forms">
                    <label>Semestre: <span class="login-danger">*</span></label>
                    <select class="form-control select" name="semester_id" required>
                      <option value="">Sélectionnez le Semestre</option>
                      <?php foreach ($semesters as $semester) { ?>
                        <option value="<?= $semester['semester_id']; ?>"><?= $semester['semester_name']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="col-12">
                  <div class="student-submit">
                    <button type="submit" class="btn btn-primary">
                      Ajouter Module
                    </button>
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
<?php
$content = ob_get_clean();
require("views/admin/components/layout.php");
?>