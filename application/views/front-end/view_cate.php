  <div class="clearfix"></div>
  <br>
  <br>
      <div class="panel panel-pro bg_img">
              <div class="panel-heading  navbar-default heading-cate">
                      <div class="navbar-header">
                      <button type="button" class="navbar-toggle button_menu" data-toggle="collapse" data-target=".nav-tittle">
                          <span class="icon-toggle">
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                          </span>
                      </button>
                          <a href="<?php echo base_url($result->slug)?>" class="navbar-brand"><?php echo $result->name ?></a>
                      </div>
                      <div class="navbar-collapse collapse nav-tittle">
                          <ul class="nav navbar-nav">
                              <?php 
                              $query=$this->db->get_where('category',array('parrent_id' => $result->id),4,0);
                                $result=$query->result_array();
                                foreach ($result as $value) {
                                  echo '<li><a href="'.$value['slug'].'">'.$value['name'].'</a></li>';
                                }
                                ?>
                          </ul>
                      </div>
              </div>
              <div class="panel-body product" >
                      <!-- result -->
            <?php foreach ($list as $value): ?>
            <div class="col-sm-6 col-md-3" style='height: 320px'>
                <div class="well text-center well-sm">
                    <div class="info">
                        <img src="<?php echo $value['img'] ?>" class="img-responsive" alt="">
                        <?php if ($value['description']!='') {
                          ?>
                            <span class="text-left">
                                <ul>
                                    <?php $tmp= explode('|', $value['description']);
                                    foreach ($tmp as  $val) {
                                         echo "<li class='line_height'>$val</li>";
                                     } ?>
                                </ul>
                            </span>
                          <?php 
                        } ?>
                    </div>
                    <div class="detail">
                        <h2 class="name"><a href="<?php echo base_url('dtdd/'.$value['slug'])?>"><?php echo $value['name'] ?></a></h2>
                        <hr>
                        <i class="price pull-left"><?php echo number_format($value['price']) ?>₫</i>
                        <a href="<?php echo base_url('dtdd/'.$value['slug'])?>" class="btn-link view pull-right"><small>Xem chi tiết </small></a>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
                </div>
            </div>

