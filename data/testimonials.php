<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Data Testimonials
        </h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button class="btn mb-1 btn-danger"><i class="fas fa-trash"></i> delete all testimoni</button>
                </div>
                <div class="card-body">
                    <table id="datatables-basic" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Rate</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon WO</td>
                                <td>4.5/5</td>
                                <td>25-02-2022</td>
                                <td>
                                    <button class="btn btn-primary"><i class="fas fa-eye" data-toggle="modal" data-target="#centeredModalPrimary"></i></button>
                                    <a href="#" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Tayo</td>
                                <td>3.5/5</td>
                                <td>23-02-2022</td>
                                <td>
                                    <button class="btn btn-primary"><i class="fas fa-eye" data-toggle="modal" data-target="#centeredModalPrimary"></i></button>
                                    <a href="#" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Budiman</td>
                                <td>4.5/5</td>
                                <td>12-03-2022</td>
                                <td>
                                    <button class="btn btn-primary"><i class="fas fa-eye" data-toggle="modal" data-target="#centeredModalPrimary"></i></button>
                                    <a href="#" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Rudi tabuti</td>
                                <td>4/5</td>
                                <td>15-02-2022</td>
                                <td>
                                    <button class="btn btn-primary"><i class="fas fa-eye" data-toggle="modal" data-target="#centeredModalPrimary"></i></button>
                                    <a href="#" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Sinchan</td>
                                <td>4.5/5</td>
                                <td>15-02-2022</td>
                                <td>
                                    <button class="btn btn-primary"><i class="fas fa-eye" data-toggle="modal" data-target="#centeredModalPrimary"></i></button>
                                    <a href="#" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Username</th>
                                <th>Rate</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal testi view -->
<div class="modal fade" id="centeredModalPrimary" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail testimoni</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-3">
                <div class="form-group">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" value="Budiman" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label">Testimoni</label>
                    <textarea class="form-control" rows="5" readonly>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate impedit animi commodi ad, neque qui quasi repudiandae illum est voluptatem ducimus molestias dicta cumque necessitatibus maxime distinctio aut explicabo consectetur.</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
