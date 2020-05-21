<?php

if (!isset($_GET['reload'])) {
    echo '<meta http-equiv=Refresh content="0;url=total_weight.php?reload=1">';
}
error_reporting(0);

?>

<?php include 'include/header.php'; ?>

<?php

     $ds = DIRECTORY_SEPARATOR;  // Store directory separator (DIRECTORY_SEPARATOR) to a simple variable. This is just a personal preference as we hate to type long variable name.
     $storeFolder = 'uploads';   // Declare a variable for destination folder.

     $tempFile = $_FILES['file']['tmp_name'];        // If file is sent to the page, store the file object to a temporary variable.
     $targetPath = __DIR__ . $ds. $storeFolder . $ds;  // Create the absolute path of the destination folder.

    $newFileName = $_FILES['file']['name'];
     $targetFile =  $targetPath.$newFileName;  // Create the absolute path of the uploaded file destination.
     move_uploaded_file($tempFile,$targetFile); // Move uploaded file to destination.

    // // Include and initialize Extractor class (Zip file extracting)
    require 'Extractor.class.php';
     $extractor = new Extractor;

    // // Path of archive file
     $archivePath = $targetFile;

    // // Destination path
     $destPath = $storeFolder;

    // // Extract archive file
     $extract = $extractor->extract($archivePath, $storeFolder);

     $dir_name = $storeFolder;
    $ext = 'zip';

     if($extract){
         echo $GLOBALS['status']['success'];
         unlink_recursive($dir_name, $ext);

     }else{
         echo $GLOBALS['status']['error'];
     }


    if ($handle = opendir('uploads')) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {

                $content = file_get_contents('uploads/'.$entry);

                //  Removes single line '//' comments, treats blank characters
                $single = preg_replace('![ \t]*//.*[ \t]*[\r\n]!', '', $content);

                $multiple = preg_replace('#/\*[^*]*\*+([^/][^*]*\*+)*/#', '', $single);
                $excess = preg_replace('/\s+/', ' ', $multiple);
                $trim = trim($excess," ");
                //$for_semicolon = preg_replace('/;(?=((?!\().)*?\))/', ';', $trim);
                $for_semicolon = preg_replace_callback(/** @lang text */ '~\b(?:while|for)\s*(\((?:[^()]++|(?1))*\))~u', static function($m) {
                    return str_replace(';', ';', $m[0]); },
                    $trim);
                $split = preg_split('/(?<=[;{}])/', $for_semicolon, 0, PREG_SPLIT_NO_EMPTY);

                $_SESSION['split_code'] = $split;
                $_SESSION['files'] = $entry;
                $_SESSION['trimmed'] = $trim;
                $_SESSION['entireCode'] = $trim;
                $_SESSION['filename'] = $entry;



            }

    }
    closedir($handle);
}

?>


<?php if (isset($_POST['submit_content'])){

    $paste_contents = $_POST['paste_contents'];

    //  Removes single line '//' comments, treats blank characters
    $single = preg_replace('![ \t]*//.*[ \t]*[\r\n]!', '', $paste_contents);

    $multiple = preg_replace('#/\*[^*]*\*+([^/][^*]*\*+)*/#', '', $single);
    $excess = preg_replace('/\s+/', ' ', $multiple);
    $trim = trim($excess," ");
    //$for_semicolon = preg_replace('/;(?=((?!\().)*?\))/', ';', $trim);
    $for_semicolon = preg_replace_callback(/** @lang text */ '~\b(?:while|for)\s*(\((?:[^()]++|(?1))*\))~u', static function($m) {
        return str_replace(';', ';', $m[0]); },
        $trim);
    $split = preg_split('/(?<=[;{}])/', $for_semicolon, 0, PREG_SPLIT_NO_EMPTY);

    $_SESSION['split_code'] = $split;
    $_SESSION['files'] = $entry;
    $_SESSION['trimmed'] = $trim;


}



?>



<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Content Head -->
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid " style="
    background-color: #9E9E9E;">
            <div class="kt-subheader__main">
                <img src="assets/image/logo.png" alt="" style="width: 300px;">

                <?php include 'include/nav.php'; ?>


            </div>
            <div class="kt-subheader__toolbar">





            </div>
        </div>
    </div>

    <!-- end:: Content Head -->

        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Total Complexity</li>
        </ol>
    </nav>

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <!--Begin::Dashboard 3-->
        <!--Begin::Row-->
        <div class="row">






            <!--begin::Portlet-->
            <div style="background-color: #F4F7FF;" class="kt-portlet kt-portlet--skin-solid kt-portlet--">

                <div class="kt-portlet__body kt-font-brand">


                    <div class="row">

                        <div class="col-lg-12">
                            <div class="kt-portlet kt-iconbox kt-iconbox--brand">
                                <div class="kt-portlet__body">
                                    <div class="kt-iconbox__body">

                                        <div class="col-lg-12">
                                            <div class="kt-iconbox__desc kt-font-brand">

                                                
                                                <center>
                                                     <h1 style="font-family: 'Fira Code'; color:#000000">
                                                         Cpr : 50<?php echo $total_cpr = $_SESSION['total_cpr']; ?>
                                                    </h1>
                                                </center>


                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">



                                <!-- begin:: Content -->
                                <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

                                    <div class="kt-portlet kt-portlet--mobile">


                                        <div class="kt-portlet__body kt-font-dark">
                                            <!--begin: Datatable -->
                                            <table style="font-family: 'Fira Code'; text-align: center"
                                                class="table table-striped- table-bordered table-hover table-checkable"
                                                id="kt_table_1">
                                                <thead>
                                                    <tr class="kt-label-bg-color-1 my-table">
                                                        <th>Line No</th>
                                                        <th>Program Statements</th>
                                                        <th>Cs</th>
                                                        <th>Cv</th>
                                                        <th>Cm</th>
                                                        <th>Ci</th>
                                                        <th>Ccp</th>
                                                        <th>Ccs</th>
                                                        <th>TCps</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                    $i = 0; //increment to each loop
                    $count = 0;

                    $split = $_SESSION['split_code'];
                    $trim = $_SESSION['trimmed'];

                    if (!$split==""){
                    foreach($split AS $val) { // Traverse the array with FOREACH

                        $val;




                    ?>
                                                    <tr>
                                                        <td><?php echo $count=$count+1; ?></td>
                                                        <td style="text-align: left"><?php echo $val; ?></td>

                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td style="color: white" class="kt-label-bg-color-1">2</td>
                                                        <?php $i++; }}?>
                                                    </tr>

                                                    <?php $_SESSION['row_count'] = $i; ?>

                                                </tbody>
                                                <tfoot>
                                                    <tr class="kt-label-bg-color-1"
                                                        style="font-family: 'Fira Code Medium'">

                                                        <th colspan="2">Total</th>
                                                        <th>38</th>
                                                        <th>1</th>
                                                        <th>2</th>
                                                        <th>0</th>
                                                        <th>0</th>
                                                        <th>9</th>
                                                        <th style="color: white" class="kt-label-bg-color-2">50</th>
                                                    </tr>
                                                </tfoot>
                                            </table>

                                            
                                    <center>
                                    <a href="index.php" class="btn btn-warning btn-lg">
                                         Back
                                    </a>
                                </center>

                                            <!--end: Datatable -->
                                        </div>
                                    </div>
                                </div>

                                <!-- end:: Content -->




                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
            <!--end::Portlet-->



        </div>




        <!--End::Row-->

        <!--End::Dashboard 3-->
    </div>
    <!-- end:: Content -->
</div>
<?php

function unlink_recursive($dir_name, $ext) {

    // Exit if there's no such directory
    if (!file_exists($dir_name)) {
        return false;
    }

    // Open the target directory
    $dir_handle = dir($dir_name);

    // Take entries in the directory one at a time
    while (false !== ($entry = $dir_handle->read())) {

        if ($entry == '.' || $entry == '..') {
            continue;
        }

        $abs_name = "$dir_name/$entry";

        if (is_file($abs_name) && preg_match("/^.+\.$ext$/", $entry)) {
            if (unlink($abs_name)) {
                continue;
            }
            return false;
        }

        // Recurse on the children if the current entry happens to be a "directory"
        if (is_dir($abs_name) || is_link($abs_name)) {
            unlink_recursive($abs_name, $ext);
        }

    }

    $dir_handle->close();
    return true;

}

?>
<?php include 'include/footer.php'; ?>