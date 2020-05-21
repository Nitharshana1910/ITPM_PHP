<?php

if (!isset($_GET['reload'])) {
    echo '<meta http-equiv=Refresh content="0;url=methods.php?reload=1">';
}

?>

<?php include 'include/header.php'; ?>
<?php
$split = $_SESSION['split_code'];
$row_count = $_SESSION['row_count'];

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
            <li class="breadcrumb-item active" aria-current="page">Methods</li>
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


                        <center>
                                <h1 style="font-family: 'Fira Code'; color:#000000;">Cm :
                                    <?php echo $total_Cm = $_SESSION['total_Cm']; ?>
                                </h1>
                            </center>

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
                                                class="table table-striped- table-bordered table-hover" id="kt_table_1">
                                                <thead>
                                                    <tr class="kt-label-bg-color-1 my-table">
                                                        <th>Line No</th>
                                                        <th>Program Statements</th>
                                                        <th>Wmrt</th>
                                                        <th>Npdtp</th>
                                                        <th>Ncdtp</th>
                                                        <th>Cm</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <?php

                                                    $i = 0; //increment to each loop
                                                    $count = 0;
                                                    $total_Cm = 0;

                                                    $Wmrt = 0;
                                                    $Npdtp = 0;
                                                    $Ncdtp = 0;
                                                    $Cm = 0;

                                                    //Default Weights
                                                    $weight_primitive_retuntype = 1;
                                                    $weight_composite_returntype = 2;
                                                    $weight_void_returntype = 0;
                                                    $weight_primitive_datatype_parameter = 1;
                                                    $weight_composite_datatype_parameter = 2;

                                                    if (!$split == "") {
                                                        foreach ($split as $val) { // Traverse the array with FOREACH

                                                            $val;

                                                            // -------- Weight due to return type - Begin --------

                                                            $void_count_total = 0;
                                                            $primitive_retuntype_count_total = 0;
                                                            $composite_retuntype_count_total = 0;

                                                            for ($x = 0; $x <= $row_count; $x++) {

                                                                if (preg_match('/void+(.*?){/', $val) !== false) {

                                                                    $void_count_total = preg_match_all('/void+(.*?){/', $val, $counter);
                                                                }

                                                                if (preg_match('/(?:(?:public|private|protected|static|final|native|synchronized|abstract|transient)+\s)+(int|byte|short|long|float|double|char|String|boolean)+[$_\w<>\[\]\s]*\s+[\$_\w]+\([^\)]*\)?\s*\{?[^\}]+return +(.*?)+\}?/', $val) !== false) {

                                                                    $primitive_retuntype_count_total = preg_match_all('/(?:(?:public|private|protected|static|final|native|synchronized|abstract|transient)+\s)+(int|byte|short|long|float|double|char|String|boolean)+[$_\w<>\[\]\s]*\s+[\$_\w]+\([^\)]*\)?\s*\{?[^\}]+return +(.*?)+\}?/', $val, $counter);
                                                                }

                                                                if (preg_match('//', $val) !== false) {

                                                                    $composite_retuntype_count_total = preg_match_all('//', $val, $counter);
                                                                }


                                                                $Wmrt = ($void_count_total * $weight_void_returntype) + ($primitive_retuntype_count_total * $weight_primitive_retuntype) + ($composite_retuntype_count_total * $weight_composite_returntype);
                                                            }

                                                            // -------- Weight due to return type - End --------

                                                            $Cm = $Wmrt + $Npdtp + $Ncdtp;

                                                            $total_Cm += $Cm;

                                                    ?>

                                                    <tr >
                                                        <td><?php echo ++$count; ?></td>
                                                        <td style="text-align: left"><?php echo $val; ?></td>
                                                        <td><?php echo $Wmrt; ?></td>
                                                        <td><?php echo $Npdtp; ?></td>
                                                        <td><?php echo $Ncdtp; ?></td>
                                                        <td><?php echo $Cm; ?></td>
                                                        <?php

                                                            $i++;

                                                            $_SESSION['total_Cm'] = $total_Cm;
                                                        }
                                                    }
                                                        ?>
                                                    </tr>


                                                </tbody>

                                            </table>
                                            <center>

                                        <a href="total_weight.php" class="btn btn-warning btn-lg">
                                            <span><i class="flaticon-home"></i></span> Total Complexity of the Program
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


<?php include 'include/footer.php'; ?>