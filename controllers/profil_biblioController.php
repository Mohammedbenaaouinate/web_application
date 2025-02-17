<?php

require_once "./models/profil_biblioModel.php";
function show_biblioprofilAction()
{
    if (isset($_SESSION["biblio_id"])) {
        $profil_biblio = list_profil_biblio();
        require_once "views/bibliothecaire/profil/profil.php";
    } else {
        echo "Accès non autorisé";
    }
}

function edit_profil_biblioAction()
{
    if (isset($_SESSION["biblio_id"])) {
        $id = $_POST["biblio_id"];
        $fname = $_POST["firstname"];
        $lname = $_POST["lastname"];
        $mail = $_POST["email"];
        $phone = $_POST["phone"];
        if (!empty($id) && !empty($fname) && !empty($lname) && !empty($mail) && !empty($phone)) {
            if (edit_profil_biblio($id, $fname, $lname, $mail, $phone)) {
                $_SESSION['message'] = "Les informations sont modifiées avec succés";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Erreur lors de la modification";
                $_SESSION['message_type'] = "error";
            }
        } else {
            $_SESSION['message'] = "Vous ne devez pas vider les champs";
            $_SESSION['message_type'] = "error";
        }

        header("location:index.php?action=show_profile_biblio");
    } else {
        echo "Accès non autorisé";
    }
}

function edit_pass_biblioAction()
{
    if (isset($_SESSION["biblio_id"])) {
        $old = $_POST["old_password"];
        $new = $_POST["new_password"];
        $confirm = $_POST["confirm_password"];
        $id = $_POST["biblio_id"];

        if (isset($_POST["edit_pass"])) {
            if (!empty($old) && !empty($new) && !empty($confirm)) {
                $verify_pass = edit_password_biblio($id, $old, $new, $confirm);
                if ($verify_pass == 555) {
                    $_SESSION['message'] = "Le mot de passe est modifié avec succés.";
                    $_SESSION['message_type'] = "success";
                } elseif ($verify_pass == 410) {
                    $_SESSION['message'] = "Le nouveau mot de passe est incompatible avec le mot de passe de confirmation.";
                    $_SESSION['message_type'] = "warning";
                } elseif ($verify_pass == 444) {
                    $_SESSION['message'] = "Erreur lors de la modification du mot de passe";
                    $_SESSION['message_type'] = "error";
                } else {
                    $_SESSION['message'] = "L' ancien mot de passe est erroné";
                    $_SESSION['message_type'] = "error";
                }
            } else {
                $_SESSION['message'] = "Tous les champs sont requis!";
                $_SESSION['message_type'] = "error";
            }
        }
        header("location:index.php?action=show_profile_biblio");
    } else {
        echo "Accès non autorisé";
    }
}
function logout_student_biblio_profAction()
{
        session_unset();
        session_destroy();
        header("location:index.php?action=show_users_login");
}
