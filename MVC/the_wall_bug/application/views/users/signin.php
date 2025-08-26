
        <div class="error"><?=$this->session->flashdata('input_errors');?></div>
        <h1>Login</h1>
        <!-- having problem on my localhost config. instead i will use my base URL-->

        <form action="<?= base_url('signin/validate')?>" method="POST">            
            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
            <!-- change inpute name 'emails' -> 'email'-->
            Email address: <input type="text" name="email">
            Password: <input type="password" name="password">
        
            <input type="submit" value="Signin">
            <a href="register">Don't have an account? Register</a>
        </form>
        
    </body>
</html>

