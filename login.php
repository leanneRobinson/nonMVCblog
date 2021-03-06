<?php
include 'common.php';


use function Blog\View\display;
use function \Blog\Auth\login;
use function \Blog\Db\create_user;
use function \Blog\Upload\upload_file;

?>

<?php if($_SERVER['REQUEST_METHOD'] == 'POST'): ?>

    <?php if (isset($_POST['register'])): ?>
        
        <?php if ($_POST['password'] != $_POST['verifypassword']): ?>

            <?= "Passwords do not match"; ?>

        <?php else: ?>
                <?= $user_id = create_user($pdo, $_POST, array_search('user',ROLES)); ?>
                   <?php upload_file('profile_pic','profiles',$user_id);?>
                <?= login($pdo, $_POST['username'], $_POST['password']); ?>
                
        <?php endif ;?>
    <?php else: ?>

           <?= login($pdo, $_POST['username'], $_POST['password']); ?>

    <?php  endif; ?>


<?php endif ; ?>
 
 
<?= display('__header'); ?>
   
<h1>Login</h1>

<?php if(isset($_SESSION['user'])): ?>	
    <?= '<p>You are logged in as ' . $_SESSION['user']['username'] . '</p><br>'; ?>
<?php else: ?>
    <?= display('loginform'); ?>
    <?= display('registerform'); ?>
<?php endif; ?>

<?php echo display('__footer'); ?>

