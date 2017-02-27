<!DOCTYPE html>
<html>
    <head>
        <title>Paintings Home</title>
        <!-- Style Call -->
        <link href="<?php echo base_url(); ?>assets/css/paintings_style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
        <style type="text/css">
            .painting_functions{
                padding-top: 50px;
                padding-left: 20px;
            }
        </style>

        <!-- Script Call -->
        <script src="<?php echo base_url(); ?>assets/js/paintings.js"></script>
    </head>

    
    <body>
        <div class="painting_functions">
            <nav class="w3-sidenav w3-light-grey w3-card-2" style="width:230px">
                <div class="w3-container">
                    <h3>Menu</h3>
                </div>
                <a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'LineDrawing')" id="defaultOpen">Line Drawings</a>
                <a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Reconstructed')">Reconstructed </a>
                <a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Jataka')">Jataka</a>
            </nav>

            <div style="margin-left:230px">
                <div id="LineDrawing" class="w3-container city" style="display:none">
                    <h2>Line Drawings</h2>
                    <p>All Functions of Linedrawing Here </p>
                    
                </div>

                <div id="Reconstructed" class="w3-container city" style="display:none">
                    <h2>Reconstructed</h2>
                    <p>All Functions of Reconstructed Here</p> 
                </div>

                <div id="Jataka" class="w3-container city" style="display:none">
                    <h2>Jataka</h2>
                    <p>All Functions of Jataka Here</p>
                </div>
            </div>
        </div>
    </body>
</html>



