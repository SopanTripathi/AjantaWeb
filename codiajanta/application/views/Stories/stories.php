<!--New Form Elements -->
<!DOCTYPE html>
<html>
    <head>
        <title>Stories Home</title>
        <!-- Style Call -->
        <link href="<?php echo base_url(); ?>assets/css/paintings_style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
        <style type="text/css">
            .painting_functions{
                padding-top: 50px;
                padding-left: 20px;
            }
            .w3-container {
    padding: 5em 16px;
}
        </style>

        <!-- Script Call -->
        <script src="<?php echo base_url(); ?>assets/js/stories.js"></script>
    </head>


    <body>
       <div class="w3-container">
 
  <div class="w3-bar w3-black">
    <button class="w3-bar-item w3-button tablink w3-red" onclick="openCity(event,'London')">Stories 1</button>
    <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Paris')">Stories 2</button>
  </div>
  
  <div id="London" class="w3-container w3-border city">
    <h2>Stories 1</h2>
    <p>London is the capital city of England.</p>
  </div>

  <div id="Paris" class="w3-container w3-border city" style="display:none">
    <h2>Stories 2</h2>
    <p>Paris is the capital of France.</p> 
  </div>
</div>
    </body>
</html>



