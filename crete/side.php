<?php 
$d= dbConnect()->prepare("SELECT count(p_id) AS no FROM projects");
$d->execute();
$tr=$d->fetch();
$n=$tr['no'];



function get_menu_tree($parent_id, $grp) 
{   
    $menu = "";
    $getmenu = dbConnect()->prepare("SELECT * FROM menu_permission JOIN menus ON menus.id = menu_id where status= 1 and role_id = ? and parent_id='" .$parent_id . "' ");
    $getmenu->execute([$grp]);
    
    while ($row = $getmenu->fetch()) {
        if ($row['link']=="") {
            $class = "has-arrow";
            $href = 'javascript:void(0)';
        }else{
            $href = $row['link'];
            $class = "";
        }

        // $menu .= '<li> <a class="waves-effect waves-dark" href="'.$row['link'].'" aria-expanded="false"><i class="'.$row['icon'].'"></i><span class="hide-menu">"'.$row['menu'].'"</span></a></li>';

        $menu .= '<li> <a class="'.$class.' waves-effect waves-dark" href="'.$href.'" aria-expanded="false"><i class="'.$row['icon'].'"></i><span class="hide-menu">'.$row['menu'].'</span></a>';
        
            
            
            
            $menu .= '<ul aria-expanded="false" class="collapse">'.get_menu_tree($row['menu_id'], $grp).'</ul>';
            $menu .= "</li>";
        
    }
    // dbConnect();
    return $menu;
 
} 
?>
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                
                

                <?php echo get_menu_tree(0, $grp) ?>
                <!-- <li>
                    <a href="wages">Wages</a>
                </li>

                <li>
                    <a href="prd_category">Product Category</a>
                </li>

                <li>
                    <a href="lead">Lead</a>
                </li>

                <li>
                    <a href="paid_wages">Paid Wages</a>
                </li> -->
 
                    </ul>
                </nav>
               <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->