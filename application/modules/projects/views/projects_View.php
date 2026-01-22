<?php include VIEWPATH.'includes/backend/Header.php' ;?>
<?php include VIEWPATH.'includes/backend/Sidebar.php' ;?>  
<?php include VIEWPATH.'includes/backend/Topheader.php' ;?>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Admin</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Projects</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a class="btn btn-outline-primary" href="javascript:;" data-bs-toggle="modal" data-bs-target="#projects">New projects</a>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr/>
    <div class="card">
        <?php if(!empty($this->session->userdata('sms'))){
            echo $this->session->userdata('sms');
        } ?>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php $i=1; foreach ($projects as $value) {  ?>
    <tr>
        <td><?=$i++;?></td>
        <td>
        <a href="javascript:void()" data-bs-toggle="modal" data-bs-target="#Image_<?=$value['id']?>">
        <img src="<?=base_url()?>attachments/projects/<?=$value['image']?>" style="width:50px; height:50px; border-radius:50%;">
        </a>
        </td>
        <td><?=$value['title']?></td>
        <td>
    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#Status_<?= $value['id'] ?>">
        <?= $value['status'] == 'ongoing' ? 'En cours' : 'Terminé' ?>
    </a>
</td>

        <td><?=substr($value['description'], 0,20)?>...</td>
       
        <td>
           <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Options</button>
           <div class="dropdown-menu">
            <a class="dropdown-item text-info" href="javascript:void()"  data-bs-toggle="modal" data-bs-target="#update_<?=$value['id']?>">Update</a>
            <a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#delete_<?=$value['id']?>">Delete</a>
           </div> 
        </td>
    </tr>


<div class="modal fade" id="update_<?=$value['id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Update</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form action="<?=base_url('Projects/Updateprojects')?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?=$value['id']?>">
            <div class="modal-body">
                <div class="row">
                  <div class="mb-3 position-relative col-md-6">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" value="<?=$value['title']?>" name="title" placeholder="title" required="">
                  </div>
                
                </div>
                <div class="row">
                  <div class="mb-3 position-relative col-md-6">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="image">
                    <input type="hidden" name="HiddenImage" value="<?=$value['image']?>">
                  </div>
                
                </div>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;" required="" name="description"><?=$value['description']?></textarea>
                    <label for="floatingTextarea">Description</label>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-info">Save</button>  
            </div>                   
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="Image_<?=$value['id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Image</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
              <img src="<?=base_url()?>attachments/projects/<?=$value['image']?>" style="width: 750px; height:500px;">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> 
            </div>   
        </div>
    </div>
</div>


<div class="modal fade" id="delete_<?=$value['id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Do you really wnat to delete this content ?</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form action="<?=base_url('Projects/Deleteprojects')?>" method="POST">
            <input type="hidden" name="id" value="<?=$value['id']?>">
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-info">Delete</button>  
            </div>                   
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="Status_<?=$value['id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Do you really wnat to change the status ?</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form action="<?=base_url('Projects/ChangeStatus')?>" method="POST">
            <input type="hidden" name="id" value="<?=$value['id']?>">
            <input type="hidden" name="status" value="<?=$value['status']?>">
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-info">Save</button>  
            </div>                   
            </form>
        </div>
    </div>
</div>


<?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="projects" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">New projects</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form action="<?=base_url('Projects/Createprojects')?>" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="row">
                  <div class="mb-3 position-relative col-md-6">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" required="">
                  </div>
               
                </div>
                <div class="row">
                <div class="mb-3 position-relative col-md-6">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" required="">
                </div>
                </div>

                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;" required="" name="description"></textarea>
                    <label for="floatingTextarea">Description</label>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-info">Save</button>  
            </div>                   
            </form>
        </div>
    </div>
</div>

<?php include VIEWPATH.'includes/backend/Footer.php' ;?>