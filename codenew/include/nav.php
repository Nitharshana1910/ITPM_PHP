<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #9E9E9E;">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php

                function getActiveUrl($url){
                    $link = $_SERVER['PHP_SELF'];
                    $link_array = explode('/',$link);
                    $page = end($link_array);

                    if ($page == $url) {
                        echo 'active';
                    }
                    else {
                        echo '';
                    }
                }
 
            ?>

            <li class="nav-item <?php getActiveUrl('index.php');?>">
                <a class="nav-link" href="index.php"><i class="fas fa-folder-plus"></i>Add New <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php getActiveUrl('total_weight.php');?>">
                <a class="nav-link" href="total_weight.php"><i class="fas fa-check-double"></i>Total Complexity</a>
            </li>
            <li class="nav-item <?php getActiveUrl('size.php');?>">
                <a class="nav-link" href="size.php"><i class="far fa-plus-square"></i>Size</a>
            </li>
            <li class="nav-item <?php getActiveUrl('variables.php');?>">
                <a class="nav-link" href="variables.php"><i class="fas fa-arrow-alt-circle-right"></i>Variables</a>
            </li>
            <li class="nav-item <?php getActiveUrl('methods.php');?>">
                <a class="nav-link" href="methods.php"><i class="fas fa-arrows-alt"></i>Methods</a>
            </li>
            <li class="nav-item <?php getActiveUrl('inheritance.php');?>">
                <a class="nav-link" href="inheritance.php"><i class="fas fa-cogs"></i>Inheritance</a>
            </li>
            <li class="nav-item <?php getActiveUrl('coupling.php');?>">
                <a class="nav-link" href="coupling.php"><i class="fas fa-check-circle"></i>Coupling</a>
            </li>
            <li class="nav-item <?php getActiveUrl('control_structures.php');?>">
                <a class="nav-link" href="control_structures.php"><i class="fas fa-tools"></i>Control Structures</a>
            </li>


        </ul>

    </div>
</nav>