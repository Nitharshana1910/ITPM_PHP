<?php

if (!isset($_GET['reload'])) {
    echo '<meta http-equiv=Refresh content="0;url=coupling.php?reload=1">';
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
            <li class="breadcrumb-item active" aria-current="page">Coupling</li>
        </ol>
    </nav>

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <!--Begin::Dashboard 3-->
        <!--Begin::Row-->
        <div class="row">




            <div class="col-lg-12">

                <!--begin::Portlet-->
                <div style="background-color: #F4F7FF;" class="kt-portlet kt-portlet--skin-solid kt-portlet--">

                    <div class="kt-portlet__body kt-font-brand">


                        <div class="row">

                            <div class="col-lg-12">


                            <center><h1 style="font-family: 'Fira Code'; color:#000000">Ccp : <?php echo $total_ccp = $_SESSION['total_ccp']; ?></h1></center>


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
                                                    class="table table-striped- table-bordered table-hover"
                                                    id="kt_table_1">
                                                    <thead>
                                                        <tr class="kt-label-bg-color-1 my-table">
                                                            <th>Line No</th>
                                                            <th>Program Statements</th>
                                                            <th>Nr</th>
                                                            <th>Nmcms</th>
                                                            <th>Nmcmd</th>
                                                            <th>Nmcrms</th>
                                                            <th>Nmcrmd</th>
                                                            <th>Nrmcrms</th>
                                                            <th>Nrmcrmd</th>
                                                            <th>Nrmcms</th>
                                                            <th>Nrmcmd</th>
                                                            <th>Nmrgvs</th>
                                                            <th>Nmrgvd</th>
                                                            <th>Nrmrgvs</th>
                                                            <th>Nrmrgvd</th>
                                                            <th>Ccp
                                                            </th>


                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php


$lines = array();
$regularMethods = array();
$recursiveMethods = array();
$methods = array();
$global_var = array();

$nr = 0;
$nmcms = 0;
$nmcrms = 0;
$nrmcrms = 0;
$nrmcms = 0;
$nmrgvs = 0;
$nrmrgvs = 0;

$keyword = array('public','protected', 'private', 'static');





foreach ($lines as $line)  {
# code...

$nr_line = 0;
$nmcms_line = 0;
$nmcrms_line = 0;
$nrmcrms_line = 0;
$nrmcms_line = 0;
$nmrgvs_line = 0;
$nrmrgvs_line = 0;

foreach ($methods as $method){

    if(strpos($line, $method)){

        if ($methods[0] == $method){

            array_push($recursiveMethods, $method);
            $currentMethodType = 'recursive';
            $nr = $nr+1;
            $nr_line = $nr_line +1;

        }elseif (in_array($method, $recursiveMethods) && $currentMethodType == 'regular') {
            # code...
            $nmcrms = $nmcrms +1;
            $nmcrms_line = $nmcrms_line+1;

        }elseif (in_array($method, $recursiveMethods) && $currentMethodType == 'recursive') {
            # code...
            $nrmcrms_line = $nrmcrms_line +1;
            $nrmcrms = $nrmcrms+1;

        }elseif ($currentMethodType == 'recursive') {
            # code...
            $nrmcms = $nrmcms +1;
            $nrmcms_line = $nrmcms_line+1;

        }elseif ($currentMethodType == 'recursive') {
            # code...
            $nmcms = $nmcms+1;
            $nmcms_line = $nmcms_line+1;

        }
    }
}

if (!empty($methods)) {
    # code...
    $space_split_array = explode(" ", $line);
    $character_split_array = preg_split('/[^[:alnum:]]/', $line);

    foreach($global_var as $var){

        if (in_array($var, $space_split_array) || in_array($var, $character_split_array)) {
            # code...
            if ($currentMethodType == 'regular') {
                # code...
                $nmrgvs = $nmrgvs +1;
                $nmrgvs_line = $nmrgvs_line+1;

            }else {
                # code...
                $nmrgvs_line = $nmrgvs_line+1;
                $nmrgvs = $nmrgvs+1;

            }
        }
    }


}

preg_match('/"[^"]*"|((?=_[a-z_0-9]|[a-z])[a-z_0-9]+(?=\s*=))/', $line, $var);

if(isset($var[0]) && empty($methods)){

    array_push($global_var, $var[0]);

}


preg_match('/(public|protected|private|static|\s) +[\w\<\>\[\]]+\s+(\w+) *\([^\)]*\) *(\{?|[^;])/', $line, $match);

if (isset($match[1])){
    if(in_array($match[1], $keyword)){

        $currentMethodType = 'regular';
        array_push($methods, $match[2]);
        $methods = array_reverse($methods);

    }

}
?>
<tr>
    <td><?php echo $count = $count + 1; ?></td>
    <td style="text-align: left"><?php echo($line) ?></td>
    <td><?php echo($nr_line) ?></td>
    <td><?php echo($nmcms_line) ?></td>
    <td><?php echo($nmcrms_line) ?></td>
    <td><?php echo($nrmcrms_line) ?></td>
    <td><?php echo($nrmcms_line) ?></td>

</tr>

</tbody>

<?php

}

$ccp = $nr*2 + $nmcms*2 + $nmcrms*3 + $nrmcrms*4 + $nrmcms*3 + $nmrgvs*1 + $nrmrgvs*2;
$_SESSION['total_ccp'] = $ccp;

?>
                                                    </tbody>

                                                </table>
                                                <center>

                                            <a href="total_weight.php" class="btn btn-warning btn-lg">
                                                <span><i class="flaticon-home"></i></span> Total Complexity of the Program</a>
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


        </div>


        <!--End::Row-->

        <!--End::Dashboard 3-->
    </div>
    <!-- end:: Content -->
</div>


<?php include 'include/footer.php'; ?>