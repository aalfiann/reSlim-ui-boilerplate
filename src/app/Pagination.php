<?php
    /**
     * A class for pagination data for blog only
     *
     * @package    Core reSlim
     * @author     M ABD AZIZ ALFIAN <github.com/aalfiann>
     * @copyright  Copyright (c) 2018 M ABD AZIZ ALFIAN
     * @license    https://github.com/aalfiann/reSlim-ui-boilerplate/blob/master/license.md  MIT License
     */
    class Pagination {

        /**
		 * Make Pagination
         *
         * @param $data = Input the data decoded json which is included metadata for pagination
         * @param $links = Input the current base url of page
		 * @return string html pagination
		 */
        public function makePagination($data,$links){
            echo '<nav aria-label="..."><ul class="pagination pagination-sm">'; // Start Pagination
                $itemsperpage = $data->metadata->{'items_per_page'};
                $pagenow = $data->metadata->{'page_now'};
                $pagetotal = $data->metadata->{'page_total'};

			    if ($pagenow <= $pagetotal)
                {
                    //Middle Pagination = If this page + 2 < total page
                    if (($pagenow + 2) < $pagetotal && $pagenow >= 3)
                    {
                        echo '<li class="page-item"><a class="page-link" href="'.$links.'&page='.($pagenow-1).'&itemsperpage='.$itemsperpage.'"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>';
                        for ($p=($pagenow-2);$p<=($pagenow+2);$p++)
                        {
                            echo '<li class="page-item '.(($p == $pagenow)?'active':'').'"><a class="page-link" href="'.$links.'&page='.$p.'&itemsperpage='.$itemsperpage.'">'.$p.'</a></li>';
                        }
                        echo '<li class="page-item"><a class="page-link" href="'.$links.'&page='.($pagenow+1).'&itemsperpage='.$itemsperpage.'"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>';
                    }
                    //Last Pagination = total page >= 5 and if this page + 2 >= total page
                    elseif (($pagenow + 2) >= $pagetotal && $pagetotal >= 5)
                    {
                        echo ((($pagenow-1)>0)?'<li class="page-item"><a class="page-link" href="'.$links.'&page='.($pagenow-1).'&itemsperpage='.$itemsperpage.'"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>':'');
                        for ($p=($pagetotal-4);$p<=$pagetotal;$p++)
                        {
                            echo '<li class="page-item '.(($p == $pagenow)?'active':'').'"><a class="page-link" href="'.$links.'&page='.$p.'&itemsperpage='.$itemsperpage.'">'.$p.'</a></li>';
                        }
                        echo (($pagenow<$pagetotal)?'<li class="page-item"><a class="page-link" href="'.$links.'&page='.($pagenow+1).'&itemsperpage='.$itemsperpage.'"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>':'');
                    }
                    //Last Pagination = total page < 5 and if this page + 2 >= total page
                    elseif (($pagenow + 2) >= $pagetotal && $pagetotal < 5)
                    {
                        echo ((($pagenow-1)>0)?'<li class="page-item"><a class="page-link" href="'.$links.'&page='.($pagenow-1).'&itemsperpage='.$itemsperpage.'"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>':'');
                        for ($p=($pagetotal-($pagetotal-1));$p<=$pagetotal;$p++)
                        {
                            echo '<li class="page-item '.(($p == $pagenow)?'active':'').'"><a class="page-link" href="'.$links.'&page='.$p.'&itemsperpage='.$itemsperpage.'">'.$p.'</a></li>';
                        }
                        echo (($pagenow<$pagetotal)?'<li class="page-item"><a class="page-link" href="'.$links.'&page='.($pagenow+1).'&itemsperpage='.$itemsperpage.'"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>':'');
                    }
                    //First pagination and if total page <= 5
                    elseif ($pagetotal <= 5) 
                    {
                        echo ((($pagenow-1)>0)?'<li class="page-item"><a class="page-link" href="'.$links.'&page='.($pagenow-1).'&itemsperpage='.$itemsperpage.'"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>':'');
                        for ($p=1;$p<=$pagetotal;$p++)
                        {
                            echo '<li class="page-item '.(($p == $pagenow)?'active':'').'"><a class="page-link" href="'.$links.'&page='.$p.'&itemsperpage='.$itemsperpage.'">'.$p.'</a></li>';
                        }
                        echo '<li class="page-item"><a class="page-link" href="'.$links.'&page='.($pagenow+1).'&itemsperpage='.$itemsperpage.'"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>';
                    }
                    //First pagination and if total page > 5
                    elseif ($pagetotal > 5 && $pagenow <=2) 
                    {
                        echo ((($pagenow-1)>0)?'<li class="page-item"><a class="page-link" href="'.$links.'&page='.($pagenow-1).'&itemsperpage='.$itemsperpage.'"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>':'');
                        for ($p=1;$p<=5;$p++)
                        {
                            echo '<li class="page-item '.(($p == $pagenow)?'active':'').'"><a class="page-link" href="'.$links.'&page='.$p.'&itemsperpage='.$itemsperpage.'">'.$p.'</a></li>';
                        }
                        echo '<li class="page-item"><a class="page-link" href="'.$links.'&page='.($pagenow+1).'&itemsperpage='.$itemsperpage.'"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>';
                    }
                }	
	    		echo '</ul></nav>'; // End Pagination
        }
    }