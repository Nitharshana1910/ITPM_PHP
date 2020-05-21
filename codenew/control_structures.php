<?php

if (!isset($_GET['reload'])) {
    echo '<meta http-equiv=Refresh content="0;url=control_structures.php?reload=1">';
}

?>

<?php include 'include/header.php'; ?>


<?php

$split = $_SESSION['split_code'];
$trim = $_SESSION['trimmed'];
$file = $_SESSION['filename'];

?>

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Content Head -->
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid " style="background-color: #9E9E9E;">
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
            <li class="breadcrumb-item active" aria-current="page">Control Structures</li>
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
                                <h1 style="font-family: 'Fira Code'; color:#000000">Ccs  : <?php echo $total_ccs = $_SESSION['total_ccs']; ?></h1>
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
                                                        <th>Wtcs</th>
                                                        <th>NC</th>
                                                        <th>Ccspps</th>
                                                        <th>Ccs</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php

                                                $i = 0; //increment to each loop
                                                $count = 0;

                                                $total_ccs = 0;

                                                $Wtcs = 0;
                                                $NC = 0;
                                                $Ccspps = 0;
                                                $Ccs = 0;

                                                //Default Weights
                                                $weight_if_elseif = 2;
                                                $weight_for_while_dowhile = 3;
                                                $weight_switch = 2;
                                                $weight_case = 1;

                                                if (!$split == ""){

                                                foreach ($split

                                                as $val) { // Traverse the array with FOREACH

                                                $val;

                                                $conditional_words = array('if', 'for', 'while', 'switch', 'case');

                                                foreach ($conditional_words as $word) {

                                                    $numberOfParams = 0;

                                                    if (preg_match('/if |if+\((.*?)\)+(.*?){|if+\((.*?)\)+(.*?) {/', $val) !== false) {

                                                        $if_count = preg_match_all('/if |if+\((.*?)\)+(.*?){|if+\((.*?)\)+(.*?) {/', $val, $counter);
                                                        $if_weight = $if_count * $weight_if_elseif;


                                                        $insideBrackets = preg_match_all('/if \((?<=\().+(?=\))\)/', $val, $counter);
                                                        $contentInsideBrackets = $counter;
                                                        if (!$contentInsideBrackets == "") {
                                                            foreach ($contentInsideBrackets as $contentInside) {
                                                                if (!$contentInside == "") {
                                                                    foreach ($contentInside as $content) {

                                                                        //echo $content;
                                                                        //echo "<br>";

                                                                        $countInsideBrackets = preg_match_all('/&&|\|\|/', $content, $counter);


                                                                        if ($countInsideBrackets > 0) {

                                                                            $numberOfParams = $countInsideBrackets + 1;

                                                                        } else {

                                                                            $numberOfParams = 1;

                                                                        }




                                                                    }
                                                                }
                                                            }
                                                        }


                                                    }

                                                    if (preg_match('/for |for+\((.*?)\)+(.*?){/', $val) !== false) {

                                                        $for_count = preg_match_all('/for |for+\((.*?)\)+(.*?){/', $val, $counter);
                                                        $for_weight = $for_count * $weight_for_while_dowhile;

                                                    }

                                                    if (preg_match('/while |while+\((.*?)\)+(.*?){/', $val) !== false) {

                                                        $while_count = preg_match_all('/while |while+\((.*?)\)+(.*?){/', $val, $counter);
                                                        $while_weight = $while_count * $weight_for_while_dowhile;

                                                    }

                                                    if (preg_match('/while |while+\((.*?)\)+(.*?);/', $val) !== false) {

                                                        $do_while_count = preg_match_all('/while |while+\((.*?)\)+(.*?);/', $val, $counter);
                                                        $do_while_weight = $do_while_count * $weight_for_while_dowhile;

                                                    }

                                                    if (preg_match('/switch |switch+\((.*?)\)+(.*?){/', $val) !== false) {

                                                        $switch_count = preg_match_all('/switch |switch+\((.*?)\)+(.*?){/', $val, $counter);
                                                        $switch_weight = $switch_count * $weight_switch;

                                                    }

                                                    if (preg_match('/case (.*?)+\:/', $val) !== false) {

                                                        $case_count = preg_match_all('/case (.*?)+\:/', $val, $counter);
                                                        $case_weight = $case_count * $weight_case;

                                                    }

                                                }


                                                $Wtcs = $for_weight + $if_weight + $while_weight + $switch_weight + $case_weight + $do_while_weight;

                                                $NC = $numberOfParams + $for_count + $while_count + $switch_count + $case_count + $do_while_count;

                                                if ($NC == 0) {

                                                    $Ccspps = 0;

                                                } else {

                                                    $Ccspps = $Ccs;

                                                    if ($Wtcs > 0 && preg_match_all('/case 0:/', $val, $counter)) {

                                                        $switch_count = $Ccs;

                                                    }


                                                    if ($Wtcs > 0 && preg_match_all('/case/', $val, $counter)) {

                                                        $Ccspps = $switch_count;

                                                    }

                                                }

                                                $Ccs = ($Wtcs * $NC) + $Ccspps;

                                                $total_ccs += $Ccs;

                                                ?>

                                                    <tr>
                                                        <td><?php echo $count = $count + 1; ?></td>
                                                        <td style="text-align: left"><?php echo $val; ?></td>
                                                        <td <?php if ($Wtcs > 0){ ?>style="color: #2c77f4; font-weight: bold; background-color: #e0e0e0"
                                                            <?php } ?>><?php echo $Wtcs; ?></td>
                                                        <td <?php if ($NC > 0){ ?>style="color: #2c77f4; font-weight: bold; background-color: #e0e0e0"
                                                            <?php } ?>><?php echo $NC; ?></td>
                                                        <td <?php if ($Ccspps > 0){ ?>style="color: #2c77f4; font-weight: bold; background-color: #e0e0e0"
                                                            <?php } ?>><?php echo $Ccspps; ?></td>
                                                        <td <?php if ($Ccs > 0){ ?>style="color: #2c77f4; font-weight: bold; background-color: #e0e0e0"
                                                            <?php } ?>><?php echo $Ccs; ?></td>

                                                        <?php

                                                    $i++;
                                                    $_SESSION['total_ccs'] = $total_ccs;

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