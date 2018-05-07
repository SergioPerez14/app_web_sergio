 <!DOCTYPE html>
 <html>
 <head>
 	<title>TAREA 2</title>
 </head>
 <body>

 <?php 
 	include "form-poo.php";
 	$form = new Formulario();
 ?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* Required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Name: <input type="text" name="name" value="">
    <span class="error">*</span>
    <br><br>
    E-mail: <input type="text" name="email" value="">
    <span class="error">*</span>
    <br><br>
    Website: <input type="text" name="website" value="">
    <span class="error"></span>
    <br><br>
    Comment: <textarea name="comment" rows="5" cols="40"></textarea>
    <br><br>
    Gender:
    <input type="radio" name="gender" value="Female">Female
    <input type="radio" name="gender" value="Male">Male
    <span class="error">*</span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>


<?php
if(isset($_POST['submit'])):
$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$comment = $_POST['comment'];
$website = $_POST['website'];

$form->datos($name,$email,$gender,$comment,$website);

echo "<h2>Your Input:</h2>";
$form->imprimir();

endif;
?>

<ul>
    <li><a href="#">Volver al Inicio</a></li>
</ul>
 
 </body>
 </html>