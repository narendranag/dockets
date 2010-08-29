<script src="<?php echo base_url(); ?>/web/statics/js/ajax/email_docket.js"></script>
<?php echo form_open('ajax/email_docket/' . $id, 'name=email_docket')  ;?>
<?php echo $message; ?>
<label>Email Address</label>
<input type="text" name="email" id="email" class="text" value="<?php echo set_value('email'); ?>"/>
<input type="hidden" name="id" id="id" value="<?php echo $id; ?>"/>
<span class="small block quiet">Enter the email address of a person to which you want send this Docket.</span>
<?php echo form_error('email'); ?>
<input type="submit" name="send_email" id="send_email" value="Send" class="" />
<?php form_close(); ?>