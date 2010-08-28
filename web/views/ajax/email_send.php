<label>Email Address</label>
<input type="text" name="email" id="email" class="text" value="<?php echo set_value('email'); ?>"/>
<span class="small block quiet">Enter the email address of a person to which you want send this Docket.</span>
<?php echo form_error('email'); ?>
<input type="submit" name="submit" id="submit" value="Send" class="" /> 