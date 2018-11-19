
<!--Add attachment modal-->
<div id="importModal" class="modal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="col-lg-12">
                    <i class="glyphicon glyphicon-lock"></i>
                    <h4 class="text-center">Import</h4>
                    <h5 class="text-center">Upload an excel file with the exact format.</h5>
                    
                </div>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="col"></div>
                    <!--Add attachment form-->
                    <div class="col-sm-12">
                        <form data-toggle="validator" method="post" action="Functions/doImportIssues.php" class="form-horizontal" role="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="form-row col-md-9">
                                    <label for="import_title" class="text-center">Select file to upload</label>
                                </div>
                                <br>
                                <input type="file" name="IssuesToUpload" id="fileToUpload" style="margin-bottom:20px">
                                <br>
                                <div class="col-sm-6 col-md-offset-9" style="margin-left: 200px;">
                                    <input type="submit" value="Upload" name="import" class="form-control btn btn-success text-center">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </div>
</div>
<!-- Add attachment modal end-->