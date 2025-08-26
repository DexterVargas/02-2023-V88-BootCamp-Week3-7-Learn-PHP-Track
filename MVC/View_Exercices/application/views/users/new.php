<?php $this->load->view('main/partials/header') 
?>

<form action="create" method="post">
    <label>First Name:<input type="text" name="first_name"></label>
    <label>Last Name:<input type="text" name="last_name"></label>
    <label>Email: <input type="text" name="email"></label>
    <input type="submit" value="Create New User">
</form>

<?php $this->load->view('main/partials/footer') 
?>
