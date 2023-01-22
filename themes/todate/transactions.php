<?php
global $db;
$payments = $db->objectbuilder()->where('user_id',$profile->id)->orderBy('id', 'DESC')->get('payments');
?>
<div class="page-margin">
	<div class="container">
		<div class="valign-wrapper to_page_title">
			<h3 class="valign-wrapper"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3 3h18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm12 4v2h-4v2h4v2l3.5-3L15 7zM9 17v-2h4v-2H9v-2l-3.5 3L9 17z" fill="currentColor"></path></svg></span> <?php echo __( 'Transactions' );?></h3>
		</div>
		<div class="dt_sections">
        <?php
            if( empty( $payments ) ){
				echo '<div class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M0.93,4.2L2.21,2.93L20,20.72L18.73,22L16.73,20H4C2.89,20 2,19.1 2,18V6C2,5.78 2.04,5.57 2.11,5.38L0.93,4.2M20,8V6H7.82L5.82,4H20A2,2 0 0,1 22,6V18C22,18.6 21.74,19.13 21.32,19.5L19.82,18H20V12H13.82L9.82,8H20M4,8H4.73L4,7.27V8M4,12V18H14.73L8.73,12H4Z" /></svg>' . __( 'No transactions found.' ) . '</div>';
            }else{
        ?>
        <table class="highlight responsive-table">
            <thead>
            <tr>
                <th><?php echo __('Date');?></th>
                <th><?php echo __('Processed By');?></th>
                <th><?php echo __('Amount');?></th>
                <th><?php echo __('Type');?></th>
                <th><?php echo __('Notes');?></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($payments as $paymentlist) {
                echo '<tr>';
                echo '  <td>'.$paymentlist->date.'</td>';
                echo '  <td>'.$paymentlist->via.'</td>';
                echo '  <td>'.$config->currency_symbol . $paymentlist->amount.'</td>';
                echo '  <td>'.$paymentlist->type.'</td>';
                echo '  <td>';
                if( $paymentlist->pro_plan > 0 ){
                    if( $paymentlist->pro_plan == 1 ){
                        echo __('WEEKLY');
                    }
                    if( $paymentlist->pro_plan == 2 ){
                        echo __('MONTHLY');
                    }
                    if( $paymentlist->pro_plan == 3 ){
                        echo __('YEARLY');
                    }
                    if( $paymentlist->pro_plan == 4 ){
                        echo __('LIFETIME');
                    }
                }
                if($paymentlist->credit_amount > 0 ){
                    echo $paymentlist->credit_amount .' ' . __(' Credits');
                }
                echo '  </td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
        <?php } ?>
		</div>
	</div>
</div>