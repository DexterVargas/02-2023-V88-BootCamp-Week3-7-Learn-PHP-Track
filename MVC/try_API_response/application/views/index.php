<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Quotes</title>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
    <script>
      $(document).ready(function(){
         // we are getting all of the quotes whenever the user first requests the page
        $.get('quotes/index_html', function(res) {
          $('#quotes').html(res);
        });
        $('form').submit(function(){
          $.post('quotes/create', $(this).serialize(), function(res) {
            $('#quotes').html(res);
          });
          return false;
        });
      });
    </script>
    <style>
      form {
        margin-bottom: 30px;
      }
    </style>
  </head>
  <body>
    <form action="quotes/create" method="post"> 
      <p>
        <label>Author: </label>
        <input type="text" name="author">
      </p>
      <p>
        <label>Quote: </label>
        <textarea name="quote">
        </textarea>
      </p>
      <input type="submit" value="Add Quote">
    </form>
    <div id="quotes">
    </div>
  </body>
</html>