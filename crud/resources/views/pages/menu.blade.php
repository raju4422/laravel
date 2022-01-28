@extends('layout')
@section('content')
<style>
.first_level{
    display: none;
}
.level_2{
display: none;
}

.menu:hover .first_level{
    display:block;
}

.level_2_menu:hover .level_2{
    display:block;
}

</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="main_nav">
        <ul class="navbar-nav">
            <li class="nav-item"> <a class="nav-link" href="#"> First level 1 </a> </li>
            <li class="nav-item"> <a class="nav-link" href="#"> First level 2 </a></li>
            <?php foreach ($menu as $key => $value) {?>
            <li class="nav-item menu">
                <?php echo $value->name; ?>
                <?php if (!empty($value->data)) {?>
                <ul class="first_level">
                    <?php foreach ($value->data as $k => $v) {?>
                    <li class="level_2_menu">
                        <?php echo $v->level_2_name; ?>
                        <?php if (!empty($v->new_data)) {?>
                        <ul class="level_2">
                            <?php foreach ($v->new_data as $r => $j) {?>
                            <li>
                                <?php echo $j->level_3_name; ?>
                            </li>
                            <?php }?>
                        </ul>
                        <?php }?>
                    </li>
                    <?php }?>
                </ul>
                <?php }?>
            </li>
            <?php }?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> First level 3 </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#"> Second level 1 </a></li>
                    <li><a class="dropdown-item" href="#"> Second level 2 &raquo </a>
                        <ul class="submenu dropdown-menu">
                            <li><a class="dropdown-item" href=""> Third level 1</a></li>
                            <li><a class="dropdown-item" href=""> Third level 2</a></li>
                            <li><a class="dropdown-item" href=""> Third level 3 &raquo </a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item" href=""> Fourth level 1</a></li>
                                    <li><a class="dropdown-item" href=""> Fourth level 2</a></li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item" href=""> Second level 4</a></li>
                            <li><a class="dropdown-item" href=""> Second level 5</a></li>
                        </ul>
                    </li>
                    <li><a class="dropdown-item" href="#"> Dropdown item 3 </a></li>
                    <li><a class="dropdown-item" href="#"> Dropdown item 4 </a>
                </ul>
            </li>
            <li class="nav-item"> <a class="nav-link" href="#"> First level 1 </a> </li>
            <li class="nav-item"> <a class="nav-link" href="#"> First level 2 </a></li>
        </ul>
    </div> <!-- navbar-collapse.// -->
</nav>
@endsection
