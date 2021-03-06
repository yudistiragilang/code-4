<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $title; ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/modules/summernote/dist/summernote-bs4.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/css/components.css">
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>/public/favicon.ico"/>
</head>

<body>
  <div id="app">
    
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar justify-content-end">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav navbar-left mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </div>
        
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?php echo base_url(); ?>/public/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>">K-Means</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Km</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Menu</li>
              
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-tasks"></i><span>Transaction</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url(); ?>/transaction-users">Users</a></li>
                  <li><a class="nav-link" href="<?php echo base_url(); ?>/transaction-members">Member</a></li>
                  <li><a class="nav-link" href="<?php echo base_url(); ?>/transaction-products">Produk</a></li>
                </ul>
              </li>
              
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-book-reader"></i><span>Inquiry</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url(); ?>/inquiry-users">Users</a></li>
                  <li><a class="nav-link" href="<?php echo base_url(); ?>/inquiry-members">Member</a></li>
                  <li><a class="nav-link" href="<?php echo base_url(); ?>/inquiry-products">Produk</a></li>
                </ul>
              </li>
              
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-cogs"></i><span>Maintenance</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url(); ?>/maintenance-roles">Role</a></li>
                  <li><a class="nav-link" href="<?php echo base_url(); ?>/maintenance-users">Users</a></li>
                  <li><a class="nav-link" href="<?php echo base_url(); ?>/maintenance-members">Member</a></li>
                  <li class="active"><a class="nav-link" href="<?php echo base_url(); ?>/maintenance-products">Produk</a></li>
                </ul>
              </li>

            </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title; ?></h1>
          </div>
          <div class="row">

            <div class="col-md-2 offset-md-10">
              <button class="btn btn-primary" data-toggle="modal" data-target="#addproduct">Tambah Data</button>
            </div>
            <div class="section-title">Products</div>
            <div class="table-responsive">
              <table class="table table-striped table-md">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>Unit</th>
                    <th></th>
                  </tr>
                </thead>
                
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($products as $product) { ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $product['stock_name']; ?></td>
                    <td><?php echo $product['units']; ?></td>
                    <td>
                      <a href="#" class="btn btn-outline-info" data-toggle="modal" data-target="#editproduct<?= $product['stock_id'];?>"><i class="fas fa-edit"></i></a>
                      <a onclick="return hapus()" href="<?= base_url(); ?>/maintenance-products-delete/<?= $product['stock_id'];?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                    </td>
                  </tr>
                  <?php $no++; ?>
                  <?php } ?>
                
                </tbody>
              </table>
            </div>

          </div>
        </section>


        <!-- modal tambah -->
        <div class="modal fade" tabindex="-1" role="dialog" id="addproduct">
          <div class="modal-dialog" role="document">
            <form action="<?php echo base_url();?>/maintenance-products-add" method="POST">
              <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <div class="form-group">
                        <label for="stock_name">Nama Product</label>
                        <input type="text" class="form-control" id="stock_name" name="stock_name" placeholder="Nama Product . .">
                      </div>
                      <div class="form-group">
                        <label for="units">Unit Satuan</label>
                        <input type="text" class="form-control" id="units" name="units" placeholder="Unit Satuan . .">
                      </div>
                  </div>
                  <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
              </div>
            </form>
          </div>
        </div>
        <!-- modal tambah -->

        <!-- modal edit -->
        <?php foreach ( $products as $editproduct) : ?>
        <div class="modal fade" tabindex="-1" role="dialog" id="editproduct<?= $editproduct['stock_id'];?>">
          <div class="modal-dialog" role="document">
            <form action="<?php echo base_url();?>/maintenance-products-edit" method="POST">
              <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <input type="text" hidden="hidden" class="form-control" id="stock_id" name="stock_id" value="<?= $editproduct['stock_id']; ?>">
                      <div class="form-group">
                        <label for="stock_name">Nama Product</label>
                        <input type="text" class="form-control" id="stock_name" name="stock_name" value="<?= $editproduct['stock_name']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="units">Unit Satuan</label>
                        <input type="text" class="form-control" id="units" name="units" value="<?= $editproduct['units']; ?>">
                      </div>
                  </div>
                  <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
              </div>
            </form>
          </div>
        </div>
        <?php endforeach; ?>
        <!-- modal edit -->


      </div>
      
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; <?= date('Y'); ?> <div class="bullet"></div> Dev By <a href="">Yudhistira Gilang Adisetyo</a>
        </div>
      </footer>
    
    </div>
  </div>

  <script type="text/javascript" language="JavaScript">
    function hapus(){
      takon = confirm("Anda Yakin Akan Menghapus Data ?");
        if (takon == true) return true;
        else return false;
        }
  </script>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>/public/assets/js/stisla.js"></script>

  <!-- Template JS File -->
  <script src="<?php echo base_url(); ?>/public/assets/js/scripts.js"></script>

</body>
</html>
