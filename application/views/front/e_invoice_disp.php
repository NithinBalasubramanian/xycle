<?php $this->load->view('front/include/header.php'); ?>
<?php $this->load->view('front/include/header_menu.php'); ?>
<?php 
$user_plan = $this->session->userdata('plan'); ?>

<?php $e_inv_data = $this->Admin_model->table_column('ecard','id',$data);
    foreach($e_inv_data as $row){ 
      $e_data = $this->Admin_model->table_column('e_invoice','ecard_id',$data);
      foreach($e_data as $row_1){  ?>
      <div class="e_inv">
<div class="main_content">
    <div class="post" style="height:auto;">
    <div class="flex">
    <div class="set_button" style="width:50%;">
    <div class="buttons">
        <a href="<?php echo base_url(); ?>View/front/e_invoice_edit/<?php echo $data; ?>" class="reset">Edit</a>
    </div>
    </div>
    <div class="back_home" style="width:50%;height:60px;">
        <i class="fa fa-chevron-left" aria-hidden="true" style="float:right;font-size: 20px;color: #20BA1A;padding:20px 20px 20px 0px"></i>  
        <i class="fa fa-chevron-left" aria-hidden="true" style="float:right;font-size: 20px;color: #20BA1A;padding:20px 0px 20px 0px;"></i>  
    </div>
      </div>
        <div class="container">
            <div class="main_e_invoice row">
                <div class="col-md-6">
                <div class="inv_logo">
                    <img src="<?php echo base_url(); ?>assets/user/e_invoice/image/<?php echo $row_1['logo_pic']; ?>" width="100%" height="100%" alt="">
                </div>
                </div>
                <div class="col-md-6">
               <div class="invoice_number">
                   <h5>Invoice : <?php echo $row_1['invoice']; ?></h5>
               </div>
                </div>
                <div class="col-md-6">
               <div class="inv_from">
                   <h6>From : </h6>
                   <div class="from_cont">Name : <?php echo $row_1['inv_from']; ?></div>
                   <div class="from_cont">Address : <?php echo $row_1['from_address']; ?></div>
                   <div class="from_cont">Email : <?php echo $row_1['from_email']; ?></div>
                   <div class="from_cont">Phone : <?php echo $row_1['from_phone']; ?></div>
                   <div class="from_cont">Business Number : <?php echo $row_1['from_bus_phone']; ?></div>
               </div>
                </div>
                <div class="col-md-6">
               <div class="inv_to">
                   <h6>Bill To : </h6>
                   <div class="from_cont">Name : <?php echo $row_1['inv_to']; ?></div>
                   <div class="from_cont">Address : <?php echo $row_1['to_address']; ?></div>
                   <div class="from_cont">Email : <?php echo $row_1['to_email']; ?></div>
                   <div class="from_cont">Phone : <?php echo $row_1['to_phone']; ?></div>
                   </div>
                </div>
                <hr>
                <div class="col-md-6">
                    <div class="inv_data">
                   <div class="date">Date : <?php echo $row['date']; ?></div>
                   <div class="detail">Terms : <?php echo $row_1['payment_terms']; ?></div>
                </div>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-stripped table-bordered">
                            <thead>
                                <tr>
                                    <td>S.No</td>
                                    <td>Item Description</td>
                                    <td>Rate</td>
                                    <td>Quantity</td>
                                    <td>Amount</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;
                                $inv_sub = $this->Admin_model->table_column('invoice_sub','inv_id',$row_1['id']);
                                foreach($inv_sub as $row_2){ ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row_2['item_detail']; ?></td>
                                    <td><?php echo $row_2['qty']; ?></td>
                                    <td><?php echo $row_2['rate']; ?></td>
                                    <td><?php echo $row_2['amount']; ?></td>
                                </tr>
                                <?php $i++;} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                    <div class="col-md-6">
                        <div class="amount_cont">
                            <div class="amt">Other Charges : Rs <?php echo $row_1['other_charges']; ?></div>
                            <div class="amt">Total : Rs <?php echo $row_1['total']; ?></div>
                            <div class="amt">Amount Paid : Rs <?php echo $row_1['amount_paid']; ?></div>
                            <div class="amt">Due Amount : Rs <?php echo $row_1['due']; ?></div>
                        </div>
                    </div>
            </div>
            </div>
    </div>
    <div class="set_button">
                <div class="buttons">
                    <div class="reset" onclick="printDiv('page_pdf')">Save </div>
                </div>
                <div class="buttons">
                    <button type="submit">Share</button>
                </div>
            </div>
</div>
</div>
    <?php } } ?>

<?php $this->load->view('front/include/footer.php'); ?>