<?php
include 'header.php';
if (isset($_GET['id'])) {
    $student_info = $student_obj->view_student_by_student_id($_GET['id']);
    if (isset($_POST['update_student']) && $_GET['id'] === $_POST['id']) {
        $student_obj->update_student_info($_POST);
    }
} else {
    header('Location: index.php');
}
?>
<div class="container " > 
    <div class="row content">
        <a href="index.php"  class="button button-purple mt-12 pull-right">View Student List</a> 
        <h3>Update Student Info</h3>
        <?php
        if (isset($_SESSION['message'])) {
            echo "<p class='custom-alert'>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']);
        }
        ?>

        <hr/>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php if (isset($student_info['student_id'])) {
            echo $student_info['student_id'];
        } ?>" id=""  >
            <div class="form-group">
                <label for="student_name">Name:</label>
                <input type="text" name="student_name" value="<?php if (isset($student_info['student_name'])) {
                   echo $student_info['student_name'];
        } ?>" id="student_name" class="form-control" required maxlength="50">
            
            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" class="form-control" value="<?php if (isset($student_info['nim'])) {
            echo $student_info['nim'];
        } ?>" name="nim" id="nim"  maxlength="50">
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" name="gender" id="gender">
                    <option value="">Select</option>
                    <option value="Male" <?php if (isset($student_info['gender']) && $student_info['gender'] == 'Male') {
            echo 'selected';
        } ?>>Male</option>
                    <option value="Female" <?php if (isset($student_info['gender']) && $student_info['gender'] == 'Female') {
            echo 'selected';
        } ?>>Female</option>

                </select>

            </div> 
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" value="<?php if (isset($student_info['address'])) {
            echo $student_info['address'];
        } ?>" id="address" class="form-control"  maxlength="50">
            </div>
            <input type="submit" class="button button-green  pull-right" name="update_student" value="Update"/>
        </form> 
    </div>
</div>
<hr/>
<?php
include 'footer.php';
?>

