<div class="page-title" id="dashboard" data-user="<?php echo $found_user->LastName.','.$found_user->FirstName; ?>">
    <h3>Reservoir Monitoring System</h3>
</div>


 <!-- Multiple choices start -->
 <section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Water Level Details</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="dam">Dam</label>
                                    <select class="choices form-select" id="dam" name="dam">
                                        <?php
                                            $sql = Dynaset::load("Select * From consReservoirDam");
                                            while($row = mssql_fetch_assoc($sql)){
                                                echo "<option value='{$row['Dam']}'>{$row['Dam']}</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="current-water-level">Current Water Level</label>
                                    <input type="number" id="current-water-level" class="form-control" name="current-water-level" min="0" step="1"
                                        placeholder="200.0" required>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="spilling-level">Spilling Level</label>
                                    <input type="number" id="spilling-level" class="form-control" name="spilling-level" min="0" step="1"
                                        placeholder="200.00" required>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="date-visit">Date Visit</label>
                                    <input type="date" id="date-visit" class="form-control" name="date-visit"
                                        placeholder="3/26/2021" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="divider">
                                    <div class="divider-text">DAM DATA</div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="company-column">No. of Gate Open</label>
                                    <input type="number" id="no-gate-open" class="form-control" name="no-gate-open" min="0" step="1" data-bind="value:replyNumber"
                                        placeholder="3" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="email-id-column">Date Opened</label>
                                    <input type="date" id="date-opened" class="form-control" name="date-opened"
                                        placeholder="Date Opened" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="email-id-column">Time Opened</label>
                                    <fieldset>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="time-opened-hr" name="time-opened-hr" min="0" max="24" step="1"
                                                    data-bind="value:replyNumber" placeholder="hour" required>
                                            <input type="number" class="form-control" id="time-opened-mm" name="time-opened-mm" min="0" max="59" step="1"
                                                    data-bind="value:replyNumber" placeholder="minute" required>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="inflow">Inflow</label>
                                    <fieldset>
                                        <div class="input-group">
                                            <input type="number" id="inflow" name="inflow" aria-label="Inflow" class="form-control" min="0" step="1" data-bind="value:replyNumber"
                                                placeholder="1.0" required>
                                            <select id="inflow-unit" name="inflow-unit" class="form-control" aria-describedby="water-reading1" required>
                                                <option value="mm" selected>mm</option>
                                                <option value="m3">m3</option>
                                            </select>
                                            <span class="input-group-text" id="water-reading1">water reading</span>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="inflow">Outflow</label>
                                    <fieldset>
                                        <div class="input-group">
                                            <input type="number" id="outflow" aria-label="Outflow" name="outflow" class="form-control" min="0" step="1" data-bind="value:replyNumber"
                                                placeholder="1.0" required>
                                            <select id="outflow-unit" name="outflow-unit" class="form-control" aria-describedby="water-reading2" required>
                                                <option value="mm" selected>mm</option>
                                                <option value="m3">m3</option>
                                            </select>
                                            <span class="input-group-text" id="water-reading2">water reading</span>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="email-id-column">Hours Opened</label>
                                    <fieldset>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="hrs-opened-hr" name="hrs-opened-hr" min="0" max="24" step="1"
                                                    data-bind="value:replyNumber" placeholder="hour" required>
                                            <input type="number" class="form-control" id="hrs-opened-mm" name="hrs-opened-mm" min="0" max="59" step="1"
                                                    data-bind="value:replyNumber" placeholder="minute" required>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="email-id-column">Areas Affected</label>
                                    <select class="choices form-select multiple-remove" name="areas-affected" id="areas-affected" multiple="multiple" required>
                                        <?php
                                            $data = Dynaset::load("Select * From consReservoirAreasAffected");
                                            while($row = mssql_fetch_assoc($data)){
                                                echo "<option value='{$row['AreasAffected']}'>{$row['AreasAffected']}</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="status-alert-warning">Status Alert warning</label>
                                    <select name="status-alert-warning" id="status-alert-warning" class="choices form-select" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <div class='form-check'>
                                    <label for="">Send Notification?</label>
                                    <ul class="list-unstyled mb-0">
                                        <li class="d-inline-block me-2 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                    id="flexRadioDefault1" value="email" checked>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Email Only
                                                </label>
                                            </div>
                                        </li>
                                        <li class="d-inline-block me-2 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                    id="flexRadioDefault2" value="sms">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    SMS Only
                                                </label>
                                            </div>
                                        </li>
                                        <li class="d-inline-block me-2 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                    id="flexRadioDefault3" value="both">
                                                <label class="form-check-label" for="flexRadioDefault3">
                                                    SMS & Email
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" id="submit" class="btn btn-primary me-1 mb-1">Save</button>
                                <button type="reset" id="reset" class="btn btn-light-secondary me-1 mb-1">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Table Farmer Records -->
<div class="row" id="table-inverse">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Water Level Monitoring</h4>
            </div>
            <div class="card-content">
                <table class="table table-light mb-0" id="table1">
                    <thead>
                        <tr>
                            <th>Dam</th>
                            <th>Current Water</th>
                            <th>Spilling Level</th>
                            <th>No. of Gate</th>
                            <th>Date Opened</th>
                            <th>Time Opened</th>
                            <th>Inflow</th>
                            <th>Outflow</th>
                            <th>Hours Opened</th>
                            <th>Areas Affected</th>
                            <th>Status Alert Warning</th>
                        </tr>
                    </thead>
                    <tbody id="searchable">
                    <?php
                        
                        $d = Dynaset::load("Select PK, Dam, CurrentWaterLevel, SpillingLevel, DateVisit, GateOpen, DateOpened, CONVERT(varchar(5),TimeOpened, 108) TimeOpened, Inflow, InflowUnit, Outflow, OutflowUnit, CONVERT(varchar(5),HoursOpened, 108) HoursOpened, AreasAffected, StatusAlertWarning From ReservoirMonitoringSystem");
                        while($row = mssql_fetch_assoc($d)){

                    ?>

                    <tr class="table-row x-<?php echo $row['PK']; ?>" data-id="<?php echo $row['PK']; ?>">
                        <td class="editableColumn"><?php echo $row['Dam']; ?></td>
                        <td class="editableColumn"><?php echo $row['CurrentWaterLevel']; ?></td>
                        <td class="editableColumn"><?php echo $row['SpillingLevel']; ?></td>
                        <td class="editableColumn"><?php echo $row['GateOpen']; ?></td>
                        <td class="editableColumn"><?php echo $row['DateOpened']; ?></td>
                        <td class="editableColumn"><?php echo $row['TimeOpened']; ?></td>
                        <td class="editableColumn"><?php echo $row['Inflow'].' '.$row['InflowUnit']; ?></td>
                        <td class="editableColumn"><?php echo $row['Outflow'].' '.$row['OutflowUnit']; ?></td>
                        <td class="editableColumn"><?php echo $row['HoursOpened']; ?></td>
                        <td class="editableColumn"><?php echo $row['AreasAffected']; ?></td>
                        <td><span class="editableColumn"><?php echo $row['StatusAlertWarning']; ?></span>
                            <button class="btn icon btn-default" id="btn-edit-<?php echo $row['PK']; ?>" hidden><i data-feather="edit"></i></button>
                            <button class="btn icon btn-default" id="btn-del-<?php echo $row['PK']; ?>" hidden><i data-feather="trash"></i></button>
                            <button class="btn round icon btn-success" id="btn-sv-<?php echo $row['PK']; ?>" hidden><i data-feather="check"></i></button>
                            <button class="btn round icon btn-danger" id="btn-cl-<?php echo $row['PK']; ?>" hidden><i data-feather="x"></i></button>
                        </td>
                    </tr>

                    <?php
                        }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- modal encoding form -->
<div class="modal fade text-left modal-borderless" id="modal-dialogue"
    tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close rounded-pill"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <center><div class="d-lg-inline-block"><i data-feather="check-circle"></i></div></center>
                    <center><h2>Success!</h2></center>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary ml-1 aign-items-center justify-content-between"
                    data-bs-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block" id="save-button">OK</span>
                </button>
            </div>
        </div>
    </div>
</div>
