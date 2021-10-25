<?php
 
  require_once('../usuario-admin/modelo/usuario-admin.php');
  $objUser = new Usuario();

  $usuariosReg = $objUser->verCantUsuariosRegistrados();


 ?>

<div class="content-wrapper">
  
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>


  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
