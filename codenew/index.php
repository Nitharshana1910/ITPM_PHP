<?php include 'include/header.php'; ?>

<?php

unset ($_SESSION["split_code"]);
unset ($_SESSION["trimmed"]);
unset ($_SESSION["filename"]);
unset ($_SESSION["row_count"]);
unset ($_SESSION["entireCode"]);

//unset($_SESSION['split_code']);
//The name of the folder.
$folder = 'uploads';

//Get a list of all of the file names in the folder.
$files = glob($folder . '/*');

//Loop through the file list.
foreach($files as $file){
    //Make sure that this is a file and not a directory.
    if(is_file($file)){
        //Use the unlink function to delete the file.
        unlink($file);
    }
}
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
   <div class="row">

<div class="col-lg-10">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
</div>
<div class="col-lg-2">
        <a class="btn btn-warning btn-lg" href="change_weight.php"><i class="fas fa-weight"></i>Change Weight</a>
        </div>
    </nav>


    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <!--Begin::Dashboard 3-->
        <!--Begin::Row-->
        <div class="row">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Upload a File From Your PC
                        </h3>
                    </div>
                </div>

                <!--begin::Form-->
                <form action="total_weight.php" method="post" enctype="multipart/form-data"
                    class="kt-form kt-form--label-right">
                    <div class="kt-portlet__body">

                        <!--begin::Form-->
                        <div class="form-group row">

                            <div class="col-lg-12 col-md-9 col-sm-12">
                                <div class="dropzone dropzone-default dropzone-success" id="kt_dropzone_3">
                                    <div class="dropzone-msg dz-message needsclick">
                                        <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                                        <span class="dropzone-msg-desc">Only C++, Java files or Zip files with C++, Java
                                            programs are allowed for uploading</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-lg-7 ml-lg-auto">

                                    <button type="submit" name="upload" id="upload"
                                        class="btn btn-warning btn-lg">Upload</button>
                                    <button onclick="location.href='index.php'" type="reset" id="reset"
                                        class="btn btn-lg btn-secondary">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
        <!--End::Row-->

        <!--end::Portlet-->


        <!--End::Dashboard 3-->
    </div>
    <!-- end:: Content -->
</div>

<?php include 'include/footer.php'; ?>