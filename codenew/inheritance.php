<?php

if (!isset($_GET['reload'])) {
    echo '<meta http-equiv=Refresh content="0;url=inheritance.php?reload=1">';
}

?>

<?php include 'include/header.php'; ?>

<?php

$split = $_SESSION['split_code'];
$trim = $_SESSION['trimmed'];
$file = $_SESSION['filename'];
$row_count = $_SESSION['row_count'];

?>

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Content Head -->
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid " style="
    background-color: #9E9E9E;;">
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
            <li class="breadcrumb-item active" aria-current="page">Inheritance</li>
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
                            <h1 style="font-family: 'Fira Code'; color:#000000">
                                Ci : <?php echo $total_ci = $_SESSION['total_ci']; ?>
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
                                            <table style=" text-align: center"
                                                class="table table-striped- table-bordered table-hover" id="kt_table_1">
                                                <thead>
                                                    <tr class="kt-label-bg-color-1 my-table">
                                                        <th>Count</th>
                                                        <th>Class Name</th>
                                                        <th>No. of direct inheritances</th>
                                                        <th>No. of indirect inheritances</th>
                                                        <th>Total inheritances</th>
                                                        <th>Ci</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <?php

$i = 0;  //increment to each loop
$line_count = 0;
$count = 0;
$count2 = 0;
$total_ci = 0;

//Default weights
$weight_one_ud_class = 1;
$weight_two_ud_class = 2;
$weight_three_ud_class = 3;
$weight_more_ud_class = 4;

//word, class_name, extend_name, inherit_name

//function to sort the class_name using getBetween function
function getBetween($codeLine, $start, $end)
{
    $codeLine = " " . $codeLine;
    $ini = strpos($codeLine, $start);
    if ($ini == 0)
        return " ";
    $ini += strlen($start);
    $len = strpos($codeLine, $end, $ini) - $ini;
    return substr($codeLine, $ini, $len);
}


if (!$split == ''){

$ci = 0;

foreach ($split

as $val) {       // Traverse the array with FOREACH

$direct = 0;
$indirect = 0;
$tot_inheritance = 0;
$ci = 0;

//Calling the two functions of getBetween to sort the class_names
$val;
$arr = $val;

// $parent_class = $parsed;
// $child_class = $parsed1;
// $found_parent = $parsed2;
$parsed = getBetween($arr, "class", "{");

$parsed1 = getBetween($arr, "class", "extends");

$parsed2 = getBetween($arr, "extends", "{");

//print_r($parsed2);
//echo "<br>";
//print_r($parsed1);


//pos_extends = pos;
//pos_class = pos1;

$word_1 = 'extends';
$pos = strpos($arr, $word_1);

$word_2 = "class";
$pos1 = strpos($arr, $word_2);

$pos2 = strpos($arr, $parsed2);
// $pos1 = strpos($arr, $parsed);


if ($pos == true && $parsed1 == true) {

    $direct++;   //direct inheritance
    $pr = $parsed1;


} elseif ($pos == true) {

    $direct++;   //direct inheritance
    $pr = $parsed1;


} else {

    //echo  $parsed ;
    $pr = $parsed;
}

++$count2;
if ($count2 == '25') {
    ++$indirect; //indirect inheritance
}


// Direct + Indirect;
$tot_inheritance = $direct + $indirect;  //total inheritance

$ci = $tot_inheritance;

$total_ci += $ci;


// Begin class identification

// $keywords = ['class', 'extends'];


// $w = 'class';
// $p =strpos($val,$w);
//echo "<br>";
//print_r($p);

//if($pos == true)
//echo $pr

?>



    <?php
if ($pos == true || $pos1 == true){

?>

    <tr>
        <td><?php echo ++$count; ?></td>
        <td style="text-align: left"><?php
        echo $pr;
        ?></td>
        <td><?php echo $direct; ?></td>
        <td><?php echo $indirect; ?></td>
        <td><?php echo $tot_inheritance; ?></td>
        <td><?php echo $ci; ?></td>


        <?php } ?>


        <?php
    $i++;

    $_SESSION['total_ci'] = $total_ci;


    }

    }

    ?>
    </tr>





                                                </tbody>
                                                <tfoot>

                                                </tfoot>
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