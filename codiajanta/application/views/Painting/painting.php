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
            #formpainting input{
                display: initial;
                opacity: 0.5;
                font-size: 14px;
                margin: 30px auto;
                border-radius: 5px;
            }

            #formpainting label{
                display: initial;
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
                    <br><br>
                    <div id="formpainting">
                        <?php
                        echo form_open('painting/add_painting');
                        echo form_label('Upload Image');
                        $data_upload = array(
                            'type' => 'file',
                            'name' => 'filename',
                            'value' => 'upload filename'
                            );
                        echo form_upload($data_upload);
                        echo '<br>';
                        echo form_label('Painting Title :');
                        echo form_input('title', '', 'placeholder="Enter Title of Painting"');
                        echo '<br>';
                        echo form_label('Caption :');
                        echo form_input('caption', '', 'placeholder="Enter Caption of Painting"');
                        echo '<br>';
                        echo form_label('Cave Number :');
                        echo form_input('cave_num', '', 'placeholder="Enter Cave Number for Painting"');
                        echo '<br>';
                        echo form_label('Painting Belongs To :');
                        echo form_input('belong_to', '', 'placeholder="Options: Vihara/Shrine/Antichamber/SubShrine/Other"');
                        echo '<br>';
                        echo form_label('Cave Type :');
                        echo form_input('cave_type', '', 'placeholder="Enter Cave Type"');
                        echo '<br>';
                        echo form_submit(array('id' => 'submit', 'value' => 'Submit'));
                        echo form_close();
                        ?>
                    </div>


                </div>

                <div id="Reconstructed" class="w3-container city" style="display:none">
                    <h2>Reconstructed</h2>
                    <p>All Functions of Reconstructed Here</p>
                    <?php
                    if (isset($title)) {
                        print_r($data);
                    }
                    ?>
                </div>

                <div id="Jataka" class="w3-container city" style="display:none">
                    <h2>Jataka</h2>
                    <p>All Functions of Jataka Here</p>
                </div>
            </div>
        </div>
    </body>
</html>



