
<div class="modal fade bs-example-modal-lg addOnModal show" tabindex="-1" role="dialog" aria-labelledby="addOnModal" aria-hidden="true" style="display: none;left:0">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-success text-light">
                        <h5 class="modal-title" id="addOnModal">Add Addon</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addOnForm">
                            <input type="hidden" value="" id="addOnBookingId" name="bookingID">
                              <div class="row">
 <div class="col-md-6 mb-3">
 <label>Select Service</label>
 <select  type="text" name="service" onchange="setServicePrice(this)" class="form-control" placeholder="Service">
    <option value="">Choose Service</option>
    <?php if(isset($services) && count($services)):
          foreach($services as $service):?>

            <option data-price="<?=$service['amount']?>" value="<?=$service['id']?>" ><?=$service['name']?></option>

        <?php endforeach;
    endif;
    ?>


 </select>
 </div>

 <div class="col-md-6 mb-3">
 <label>Amount</label>
  <input  type="text" name="amount" id="servicePrice" class="form-control" placeholder="Amount" style="padding-left:25px;">
 <span class="currency_icon"><?=system_setting('currency_icon')?></span>
 </div>

 <div class="col-md-12 mb-3">
 <label>Note</label>
 <textarea name="note" class="form-control" rows="5"></textarea>
 </div>


<div class="col-md-12 d-flex justify-content-end text-end">

 <div class="col-md-4 mb-3">
    <label>&nbsp;</label>
  <button class="btn btn-primary form-control serverSaveButton" type="submit">Save</button>
  <div class="text-center serverLoader d-none">
  <div class="spinner-border text-primary m-1" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div></div>
 </div>
</div>

 </div>
                        </form>
                     
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>