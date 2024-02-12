<h2 align="center"> Payment History of <?php $id=$history[0]['student_id']; echo Registration::model()->findByPk($id)->name;  ?></h2>
<hr>
<h4 align="center">  </h4>
<div class="CSSTableGenerator" >
                <table >
                    <tr>
                        <td >
                            Date Of Payment
                        </td>
                        <td>
                            Mode Of Payment
                        </td>
						<td>
                            Next Payment Due
                        </td>
						<td>
                            Status
                        </td>
						<td> 
						   Tr no
						</td>
						<td> 
						   Payment Details
						</td>
						<td> 
						   Notes
						</td>
						<td>
                            Total fee
                        </td>
						<td>
                            paid amount
                        </td>
						<td> 
						   Balance
						</td>
						
                    </tr>
                    <?php  
$balance_sum=0; $total_fee_sum=0; $pay_now_sum=0;
$trans_no= array();
foreach($history as $pay) {
if (!in_array($pay->transaction_no, $trans_no))		
	{
      $trans_no[]=$pay->transaction_no; 
	  $total_fee_sum=$pay['total_fee']+$total_fee_sum;
	  $balance_sum=$pay['balnce']+$balance_sum;
	  
    }
//print_r($trans_no);	
$pay_now_sum=$pay['pay_now']+$pay_now_sum;

?>
<tr>
<td><?php echo $pay['payment_date']; ?> </td>
<td><?php echo $pay['mode_of_payment']; ?> </td>
<td><?php echo $pay['payment_due_date']; ?> </td>
<td><?php echo $pay['status']; ?> </td>
<td> <?php  echo $pay['transaction_no']; ?></td>
<td> <?php  echo $pay['reference']; ?></td>
<td> <?php  echo $pay['notes']; ?></td>
<td><?php echo $pay['total_fee']; ?> </td>
<td><?php echo $pay['pay_now']; ?> </td>
<td> <?php  echo $pay['balnce']; ?></td>

</tr>

<?php } ?>
      <tr >
<td colspan="7" >  </td>
<td > <?php echo $total_fee_sum; ?> </td>
<td> <?php echo $pay_now_sum; ?> </td>
<td style="color:red;"> <?php echo $balance_sum; ?> </td>
</tr>              
                </table>
				
				
            </div>



<style>
.CSSTableGenerator {
	margin:0px;padding:0px;
	width:100%;
	border:1px solid #000000;
	
	-moz-border-radius-bottomleft:14px;
	-webkit-border-bottom-left-radius:14px;
	border-bottom-left-radius:14px;
	
	-moz-border-radius-bottomright:14px;
	-webkit-border-bottom-right-radius:14px;
	border-bottom-right-radius:14px;
	
	-moz-border-radius-topright:14px;
	-webkit-border-top-right-radius:14px;
	border-top-right-radius:14px;
	
	-moz-border-radius-topleft:14px;
	-webkit-border-top-left-radius:14px;
	border-top-left-radius:14px;
}.CSSTableGenerator table{
    border-collapse: collapse;
        border-spacing: 0;
	width:100%;
	height:100%;
	margin:0px;padding:0px;
}.CSSTableGenerator tr:last-child td:last-child {
	-moz-border-radius-bottomright:14px;
	-webkit-border-bottom-right-radius:14px;
	border-bottom-right-radius:14px;
}
.CSSTableGenerator table tr:first-child td:first-child {
	-moz-border-radius-topleft:14px;
	-webkit-border-top-left-radius:14px;
	border-top-left-radius:14px;
}
.CSSTableGenerator table tr:first-child td:last-child {
	-moz-border-radius-topright:14px;
	-webkit-border-top-right-radius:14px;
	border-top-right-radius:14px;
}.CSSTableGenerator tr:last-child td:first-child{
	-moz-border-radius-bottomleft:14px;
	-webkit-border-bottom-left-radius:14px;
	border-bottom-left-radius:14px;
}.CSSTableGenerator tr:hover td{
	background-color:#e5e5e5;
		

}
.CSSTableGenerator td{
	vertical-align:middle;
		background:-o-linear-gradient(bottom, #ffffff 5%, #e5e5e5 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ffffff), color-stop(1, #e5e5e5) ); 
	background:-moz-linear-gradient( center top, #ffffff 5%, #e5e5e5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#ffffff", endColorstr="#e5e5e5");	background: -o-linear-gradient(top,#ffffff,e5e5e5);

	background-color:#ffffff;

	border:1px solid #000000;
	border-width:0px 1px 1px 0px;
	text-align:left;
	padding:7px;
	font-size:15px;
	font-family:Arial;
	font-weight:normal;
	color:#000000;
}.CSSTableGenerator tr:last-child td{
	border-width:0px 1px 0px 0px;
}.CSSTableGenerator tr td:last-child{
	border-width:0px 0px 1px 0px;
}.CSSTableGenerator tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.CSSTableGenerator tr:first-child td{
		background:-o-linear-gradient(bottom, #cccccc 5%, #b2b2b2 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #cccccc), color-stop(1, #b2b2b2) );
	background:-moz-linear-gradient( center top, #cccccc 5%, #b2b2b2 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#cccccc", endColorstr="#b2b2b2");	background: -o-linear-gradient(top,#cccccc,b2b2b2);

	background-color:#cccccc;
	border:0px solid #000000;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:14px;
	font-family:Arial;
	font-weight:bold;
	color:#000000;
}
.CSSTableGenerator tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #cccccc 5%, #b2b2b2 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #cccccc), color-stop(1, #b2b2b2) );
	background:-moz-linear-gradient( center top, #cccccc 5%, #b2b2b2 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#cccccc", endColorstr="#b2b2b2");	background: -o-linear-gradient(top,#cccccc,b2b2b2);

	background-color:#cccccc;
}
.CSSTableGenerator tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.CSSTableGenerator tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}
</style>
